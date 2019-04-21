<?php

    class MLogin extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function login($usuario, $claveEncriptada) {
            $this->db->select("*");
            $this->db->from("usuarios");
            $this->db->where("email", $usuario);
            $this->db->where("clave", $claveEncriptada);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
        }
    }

?>