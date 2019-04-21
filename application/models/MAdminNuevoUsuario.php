<?php

    class MAdminNuevoUsuario extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function verificarEmail($email) {
            $this->db->select("email");
            $this->db->from("usuarios");
            $this->db->where("email", $email);  
            $resultado = $this->db->get();
            return $resultado->row();
        }
    	  function registrarUsuario($param) {
    	  	  $this->db->insert("usuarios", $param);
    	  }
    }

?>