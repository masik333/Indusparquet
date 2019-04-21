<?php

    class CIndex extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();
    	  	  $this->load->model("MIndex");

            $this->load->library("pagination");
            $this->load->helper('url');
    	  }
    	  function index() {
    	  	  $data["nuevoIngreso"] = $this->MIndex->nuevoIngreso();

            if (isset($_SESSION["id_usuario"])) {
               $idCliente = $_SESSION["id_usuario"];
               $data["total"] = $this->MIndex->totalCarrito($idCliente);
            }

    	  	  $this->load->view("VIndex", $data);
    	  }

          function filtrarProductos() {
              $busqueda = $_GET["busqueda"];
              
              $config = array();
              $config["base_url"] = base_url() . "CProductos";
              $config["total_rows"] = $this->MIndex->get_count_filtro($busqueda);
              $config["per_page"] = 9;
              $config["uri_segment"] = 2;

              $this->pagination->initialize($config);

              $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

              $data["links"] = $this->pagination->create_links();

              $data["categorias"] = $this->MIndex->traerCategorias(); //traemos las categorías para mostrarlas en el collapsible

              //traemos todas las subcategorias por cada una de las categorias y las guardaremos en un array
              $subCats = array();
              foreach($data["categorias"] as $cat){
                $subCats[$cat->id] = $this->MIndex->getSubCat($cat->id);
              }

              //lo enviaremos a la vista //guardamos la variable
              $data['subCats'] = $subCats;

              if (isset($_SESSION["id_usuario"])) {
                  $idCliente = $_SESSION["id_usuario"];
                  $data["total"] = $this->MIndex->totalCarrito($idCliente);
              } 

              if ($busqueda == "" || $busqueda == null || $busqueda == "undefined") {
                  redirect(base_url() . 'CIndex', 'refresh');
              }
              $data["resultadoProductos"] = $this->MIndex->filtrarProductos($config["per_page"], $page, $busqueda);
              $this->load->view("VProductos", $data);
          }
    }

?>