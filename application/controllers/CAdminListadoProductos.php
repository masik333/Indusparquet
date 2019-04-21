<?php
   
    class CAdminListadoProductos extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

              if (!isset($_SESSION["id_admin"])) {
                  redirect(base_url() . 'CLogin', 'refresh');
                  die();
              }

    	  	  $this->load->model("MAdminListadoProductos");
    	  }
    	  function index() {
    	  	  $data["resultado"] = $this->MAdminListadoProductos->traerProductos();
    	  	  $this->load->view("VAdminListadoProductos", $data);
    	  }
    	  function eliminarProducto() {
              $id = $_GET["id"];
              $this->MAdminListadoProductos->eliminarProductoCarrito($id); //Éste método eliminará el producto de todos los carritos de los clientes

              $imagePath = 'assets/img/productos/'; 

              $queryGetImage = $this->MAdminListadoProductos->traerImagenes($id);
              foreach ($queryGetImage as $record) {

                       $filename = $imagePath . $record->imagen; 
                       if (file_exists($filename)) {
                          unlink($filename);
                      }

                      $this->MAdminListadoProductos->eliminarProducto($id);
              }

              $mensaje = "Producto eliminado con éxito";
              echo json_encode($mensaje);
        }
        function filtrarProductos() {
            $busqueda = $_GET["busqueda"];

            if ($busqueda == "" || $busqueda == null || $busqueda == "undefined") {
                redirect(base_url() . 'CAdminListadoProductos', 'refresh');
            }
            $data["resultadoProductos"] = $this->MAdminListadoProductos->filtrarProductos($busqueda);
            $this->load->view("VAdminListadoProductos", $data);
        }
    }

?>