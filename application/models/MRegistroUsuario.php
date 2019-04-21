<?php

    class MRegistroUsuario extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function verificarEmail($email) {
            $this->db->select("email");
            $this->db->from("clientes");
            $this->db->where("email", $email);  
            $resultado = $this->db->get();
            return $resultado->row();
        }
    	  function registrarUsuario($param) {
    	  	  $this->db->insert("clientes", $param);
    	  }
    }

?>