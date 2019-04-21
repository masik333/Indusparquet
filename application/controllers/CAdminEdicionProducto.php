<?php

    class CAdminEdicionProducto extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

            if (!isset($_SESSION["id_admin"])) {
                redirect(base_url() . 'CLogin', 'refresh');
                die();
            }
            
    	  	  $this->load->model("MAdminEdicionProducto");
    	  }
    	  function index() {
    	  	  $id = $_GET["id"];
    	  	  $data["categorias"] = $this->MAdminEdicionProducto->traerCategorias();
    	  	  $data["subcategorias"] = $this->MAdminEdicionProducto->traerSubCategorias();
              $data["resultado"] = $this->MAdminEdicionProducto->traerDatosProducto($id);
              $data["resultadoImagenes"] = $this->MAdminEdicionProducto->traerImagenesProducto($id);

              if ($data["resultado"]) {
    	  	      $this->load->view("VAdminEdicionProducto", $data);
              } else {
                  redirect(base_url() . 'CAdminListadoProductos', 'refresh');
              }
    	  }
    	  function traerSubCategoria() {
              $idCat = $this->input->post("categoria");
              $resultado = $this->MAdminEdicionProducto->traerSubCategoria($idCat);
              echo json_encode($resultado);
    	  }
        function modificarProducto($id) {
              $errores = array();
              $idCat = $this->input->post("categoria");
              $idSubCat = $this->input->post("subcategoria");
              $nombre = $this->input->post("nombre");
              $precioFijo = $this->input->post("precioFijo");
              $precioVariable = $this->input->post("precioVariable");
              $stock = $this->input->post("stock");
              $descripcion = $this->input->post("descripcion");
              $verificarProducto = $this->MAdminEdicionProducto->verificarProducto($id, $nombre);
              
              if ($nombre == "") {
                  $errores[] = "Se debe ingresar el nombre del producto";
              }

              if (strlen($nombre) > 50) {
                  $errores[] = "El nombre del producto no puede contener más de 50 caracteres";
              }

              if ($precioFijo && !is_numeric($precioFijo)) {
                  $errores[] = "El precio fijo debe contener únicamente números";
              }

              if ($precioVariable == "") {
                  $errores[] = "Se debe ingresar el precio variable del producto";
              }

              if ($precioVariable && !is_numeric($precioVariable)) {
                  $errores[] = "El precio variable debe contener únicamente números";
              }

              if ($stock < 0) {
                  $errores[] = "El stock debe ser mayor o igual a 0"; 
              }

              if (!is_numeric($stock)) {
                  $errores[] = "El stock de contener únicamente números";
              }

              if ($descripcion == "") {
                  $errores[] = "Se debe ingresar la descripción del producto";
              }

              if (strlen($descripcion) > 1000) {
                  $errores[] = "La descripción del producto no puede contener más de 1000 caracteres";
              }

              if ($verificarProducto != null) {
                  $errores[] = "Ya existe producto con dicho nombre";
              }

              $mensaje = "";
              
              if (sizeof($errores) == 0) {

                  $params = array(
                    "idCategoria" => $idCat,
                    "idSubCategoria" => $idSubCat,
                    "nombre" => $nombre,
                    "precioFijo" => $precioFijo,
                    "precioVariable" => $precioVariable,
                    "stock" => $stock,
                    "descripcion" => $descripcion,
                  );

                  $config['upload_path'] = 'assets/img/productos';
                  $config['allowed_types'] = 'jpg|png|jpeg';
                  $config['overwrite'] = TRUE;
                  $config['max_width']  = '1920';
                  $config['max_height']  = '1600';
                  $config['encrypt_name'] = TRUE;

                  $this->load->library('upload', $config);
                  $this->upload->initialize($config);
                  
                  $imagenesProducto = $this->MAdminEdicionProducto->traerImagenesProducto($id);

                  $lim_img = 3;

                  for ($i = 0 ; $i < $lim_img ; $i++) {
                      if ($this->upload->do_upload('file-'.$i)) {
                     
                      $fileData = $this->upload->data();
                      $nombreArchivo = $fileData['file_name'];

                      if (isset($imagenesProducto[$i])) {
                        
                        $id_imagen = $imagenesProducto[$i]->id;
                        $paramsImg = array('imagen' => $nombreArchivo);
                        $this->MAdminEdicionProducto->modificarImagen($id_imagen, $paramsImg);

                        $imagePath = 'assets/img/productos/'; 

                        $filename = $imagePath . $imagenesProducto[$i]->imagen; 
                            if (file_exists($filename)) {
                                unlink($filename);
                            }
                        
                      } else {
                        
                        $paramsImg = array('idProducto' => $id, 'imagen' => $nombreArchivo);
                        $this->MAdminEdicionProducto->registrarImagen($paramsImg);
                      }
  
                      if ($i == 0) {
                          $params["imagenPrincipal"] = $nombreArchivo;
                      }
                  }
              }

                  $idProducto = $this->MAdminEdicionProducto->modificarProducto($id, $params);

                  $mensaje = "Los datos del producto han sido modificados con éxito";
              } 

              if (sizeof($errores) > 0) {
                  foreach ($errores as $error) {
                      $mensaje = $error;
                  }     
              }
              echo json_encode($mensaje); 
          }
    }

?>