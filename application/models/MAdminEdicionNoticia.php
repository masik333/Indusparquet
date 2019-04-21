<?php

    class MAdminEdicionNoticia extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function traerDatosNoticia($id) {
    	  	  $this->db->select("*");
              $this->db->from("noticias");
              $this->db->where("id", $id);
              $result = $this->db->get();

              if ($result->num_rows() == 1) {
                  return $result->row();
              } else {
                  return null;
              }
    	  }
    	  function modificarNoticia($id, $param) {
    	  	    $this->db->where("id", $id);
              $this->db->update("noticias", $param);
    	  }
        function traerImagen($id) {
              $this->db->select("imagen");
              $this->db->from("noticias");
              $this->db->where("id", $id);
              $result = $this->db->get();
              return $result->row();
        }
    }

?>