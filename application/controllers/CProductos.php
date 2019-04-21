<?php

    class CProductos extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();
    	  	  $this->load->model("MProductos");

    	  	  $this->load->library("pagination");
            $this->load->helper('url');
    	  }

    	  function index() {
    	  	    $config = array();
              $config["base_url"] = base_url() . "CProductos";
              $config["total_rows"] = $this->MProductos->get_count();
              $config["per_page"] = 9;
              $config["uri_segment"] = 2;

              $this->pagination->initialize($config);

              $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

              $data["links"] = $this->pagination->create_links();

              if (isset($_GET["idCategoria"]) || isset($_GET["idSubcategoria"])) {
                  $idCategoria = $_GET["idCategoria"];
                  $idSubCategoria = $_GET["idSubcategoria"];
                  $config["base_url"] = base_url() . "CProductos";
                  $config["total_rows"] = $this->MProductos->get_count_filtro_categoria($idCategoria, $idSubCategoria);
                  $config["per_page"] = 9;
                  $config["uri_segment"] = 2;

                  $this->pagination->initialize($config);

                  $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                  $data["links"] = $this->pagination->create_links();

                  //esto trae los productos segun filtrado
                  $data["resultado"] = $this->MProductos->filtrarDatos($config["per_page"], $page, $idCategoria, $idSubCategoria);
              } else {
                  $data["resultado"] = $this->MProductos->limite($config["per_page"], $page); 
              }

              $data["categorias"] = $this->MProductos->traerCategorias(); //traemos las categorías para mostrarlas en el collapsible

              //traemos todas las subcategorias por cada una de las categorias y las guardaremos en un array
              $subCats = array();
              foreach($data["categorias"] as $cat){
                $subCats[$cat->id] = $this->MProductos->getSubCat($cat->id);
              }

              $data['subCats'] = $subCats;

              if (isset($_SESSION["id_usuario"])) {
                  $idCliente = $_SESSION["id_usuario"];
                  $data["total"] = $this->MProductos->totalCarrito($idCliente);
              } 

    	   	    $this->load->view("VProductos", $data);
    	  }
 
        function filtrarProductos() {
              $busqueda = $_GET["busqueda"];

              $config = array();
              $config["base_url"] = base_url() . "CProductos";
              $config["total_rows"] = $this->MProductos->get_count_filtro($busqueda);
              $config["per_page"] = 9;
              $config["uri_segment"] = 1; 

              $this->pagination->initialize($config);

              $page = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;

              $data["links"] = $this->pagination->create_links();

              $data["categorias"] = $this->MProductos->traerCategorias(); //traemos las categorías para mostrarlas en el collapsible

              //traemos todas las subcategorias por cada una de las categorias y las guardaremos en un array
              $subCats = array();
              foreach ($data["categorias"] as $cat) {
                  $subCats[$cat->id] = $this->MProductos->getSubCat($cat->id);
              }

              //lo enviaremos a la vista //guardamos la variable
              $data['subCats'] = $subCats;

              if ($busqueda == "" || $busqueda == null || $busqueda == "undefined") {
                  redirect(base_url() . 'CIndex', 'refresh');
              }

              if (isset($_SESSION["id_usuario"])) {
                  $idCliente = $_SESSION["id_usuario"];
                  $data["total"] = $this->MProductos->totalCarrito($idCliente);
              }

              $data["resultadoProductos"] = $this->MProductos->filtrarProductos($config["per_page"], $page, $busqueda);

              $this->load->view("VProductos", $data);
          }
    }

?>