<?php

    class MNoticias extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
    	  }
    	  function mostrarNoticias() {
    	  	  $this->db->select("*");
    	  	  $this->db->from("noticias");
    	  	  $this->db->order_by("fecha", "DESC");
    	  	  $result = $this->db->get();
    	  	  return $result->row();
    	  } 
        function filtrarNoticias($idNoticia) {
            $this->db->select("*");
            $this->db->from("noticias");
            $this->db->where("id", $idNoticia);
            $result = $this->db->get();
            return $result->row();
        }   	  
    	  function ultimasNoticias($id) {
    	  	  $this->db->select("*");
    	  	  $this->db->from("noticias");
            $this->db->where("id !=", $id);
    	  	  $this->db->order_by("fecha", "DESC");
    	  	  $this->db->limit(6);
    	  	  $result = $this->db->get();
    	  	  return $result->result();
    	  }
    }

?>