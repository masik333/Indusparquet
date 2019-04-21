<?php
   
    class CAdminNuevoProducto extends CI_Controller {
    	  function __construct() {
    	  	  parent::__construct();

            if (!isset($_SESSION["id_admin"])) {
                redirect(base_url() . 'CLogin', 'refresh');
                die();
            }
            
    	  	  $this->load->model("MAdminNuevoProducto");
    	  }
    	  function index() {
    	  	  $data["resultado"] = $this->MAdminNuevoProducto->traerCategorias();
    	  	  $this->load->view("VAdminNuevoProducto", $data);
    	  }
        function traerSubCategoria() {
            $idCat = $this->input->post("idCat");
            $resultado = $this->MAdminNuevoProducto->traerSubCategoria($idCat);
            echo json_encode($resultado);
        }
        function registrarProducto() {
            $errores = array();
            $idCat = $this->input->post("idCat");
            $idSubCat = $this->input->post("subcategoria");
            $nombre = $this->input->post("nombre");
            $precioFijo = $this->input->post("precioFijo");
            $precioVariable = $this->input->post("precioVariable");
            $stock = $this->input->post("stock");
            $descripcion = $this->input->post("descripcion");
            $fecha = date('Y-m-d H:i:s');
            $verificarProducto = $this->MAdminNuevoProducto->verificarProducto($nombre); //Éste método verificará si existe un producto con el mismo nombre registrado

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

            if (empty($_FILES['file-1']['name']) && empty($_FILES['file-2']['name']) && empty($_FILES['file-3']['name'])) {
                $errores[] = "Se debe subir al menos una imagen del producto"; 
            }

            if ($verificarProducto != null) {
                $errores[] = "Ya existe un producto registrado con dicho nombre";
            }

            $mensaje = "";

            if (sizeof($errores) == 0) {

                $config['upload_path'] = 'assets/img/productos';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['overwrite'] = TRUE;
                $config['max_width']  = '1920';
                $config['max_height']  = '1600';
                $config['encrypt_name'] = TRUE;

                  $this->load->library('upload', $config);
                  $uploadData = array();

                  if (!empty($_FILES['file-1']['name']) || !empty($_FILES['file-2']['name']) || !empty($_FILES['file-3']['name'])) {

                      //Imagen 1...

                      $_FILES['file-1d']['name'] = $_FILES['file-1']['name'];
                      $_FILES['file-1d']['type'] = $_FILES['file-1']['type'];
                      $_FILES['file-1d']['tmp_name'] = $_FILES['file-1']['tmp_name'];
                      $_FILES['file-1d']['error'] = $_FILES['file-1']['error'];
                      $_FILES['file-1d']['size'] = $_FILES['file-1']['size'];

                      if ($this->upload->do_upload('file-1d')) {
                          $fileData = $this->upload->data();
                          $uploadData[0]['file_name'] = $fileData['file_name'];
                      }

                      //Imagen 2...

                      $_FILES['file-2d']['name'] = $_FILES['file-2']['name'];
                      $_FILES['file-2d']['type'] = $_FILES['file-2']['type'];
                      $_FILES['file-2d']['tmp_name'] = $_FILES['file-2']['tmp_name'];
                      $_FILES['file-2d']['error'] = $_FILES['file-2']['error'];
                      $_FILES['file-2d']['size'] = $_FILES['file-2']['size'];

                      if ($this->upload->do_upload('file-2d')) {
                          $fileData = $this->upload->data();
                          $uploadData[1]['file_name'] = $fileData['file_name'];
                      }

                      //Imagen 3...

                      $_FILES['file-3d']['name'] = $_FILES['file-3']['name'];
                      $_FILES['file-3d']['type'] = $_FILES['file-3']['type'];
                      $_FILES['file-3d']['tmp_name'] = $_FILES['file-3']['tmp_name'];
                      $_FILES['file-3d']['error'] = $_FILES['file-3']['error'];
                      $_FILES['file-3d']['size'] = $_FILES['file-3']['size'];

                      if ($this->upload->do_upload('file-3d')) {
                          $fileData = $this->upload->data();
                          $uploadData[2]['file_name'] = $fileData['file_name'];
                      }
                  }

                  $imagenPrincipal = "";

                  if (empty($_FILES['file-2']['name']) && empty($_FILES['file-1']['name'])) {
                      $imagenPrincipal = $uploadData[2]['file_name'];
                  } else {

                  if (empty($_FILES['file-3']['name']) && empty($_FILES['file-1']['name'])) {
                      $imagenPrincipal = $uploadData[1]['file_name'];
                  } else {

                  if (empty($_FILES['file-3']['name']) && empty($_FILES['file-2']['name'])) {
                      $imagenPrincipal = $uploadData[0]['file_name'];
                  } else {

                  if (empty($_FILES['file-1']['name'])) {
                      $imagenPrincipal = $uploadData[1]['file_name'];
                  } else {

                  if (empty($_FILES['file-2']['name'])) {
                      $imagenPrincipal = $uploadData[0]['file_name'];
                  } else {

                  if (empty($_FILES['file-3']['name'])) {
                      $imagenPrincipal = $uploadData[0]['file_name'];
                  } 
                }
              }
            }
          }
        }
                              
                  $params = array(
                    "idCategoria" => $idCat,
                    "idSubCategoria" => $idSubCat,
                    "nombre" => $nombre,
                    "precioFijo" => $precioFijo,
                    "precioVariable" => $precioVariable,
                    "stock" => $stock,
                    "descripcion" => $descripcion,
                    "imagenPrincipal" => $imagenPrincipal,
                    "fechaIngreso" => $fecha
                  );

                  $idProducto = $this->MAdminNuevoProducto->registrarProducto($params);

                  foreach ($uploadData as $imagenCargada) {

                           $imagend = array("idProducto" => $idProducto, "imagen" => $imagenCargada['file_name']);
                           $this->MAdminNuevoProducto->guardarArrayImagenes($imagend);
                
                  }
                  $mensaje = "Producto registrado con éxito";
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