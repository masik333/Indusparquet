<?php

    class CCarrito extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();
              $this->load->model("MCarrito");

    	  	  if (!isset($_SESSION["id_usuario"])) {
                  redirect(base_url() . 'CLoginUsuario', 'refresh');
                  die();
            }
    	  }
    	  function index() {
            $id = $_SESSION["id_usuario"];

            $data["resultado"] = $this->MCarrito->traerCarrito($id);
    	  	  $this->load->view("VCarrito", $data);
    	  }
        function eliminarCompra() {
            $idCliente = $_SESSION["id_usuario"];
            $idProducto = $_GET["id"]; 

            $stockCliente = $this->MCarrito->traerStock($idProducto, $idCliente); //Esto traerá el stock que compró el cliente (mts²);

            $stockProd = $this->MCarrito->stockProd($idProducto); //Esto traerá el stock actual del producto

            $restaurarStock = (int)$stockCliente + (int)$stockProd;

            $this->MCarrito->actualizarStock($restaurarStock, $idProducto); //Esto actualizará el stock nuevamente al eliminar el producto

            $this->MCarrito->eliminarCompra($idCliente, $idProducto);            
        }
    }

?>