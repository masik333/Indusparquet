<?php

    class MLoginUsuario extends CI_Model {
    	  function __construct() {
    	  	  parent::__construct();
            $this->tableName = 'clientes';
            $this->primaryKey = 'id';
    	  }
        public function checkUser($userData = array()) {
        
            if (!empty($userData)) {
                $this->db->select("*");
                $this->db->from($this->tableName);
                $this->db->where('email', $userData['email']);
                $prevQuery = $this->db->get();
                $prevCheck = $prevQuery->num_rows();
            
                if ($prevCheck > 0) {
                    $prevResult = $prevQuery->row_array();

                    $this->db->where("email", $userData["email"]);
                    $this->db->set("email", $userData["email"]); 
                    $this->db->update($this->tableName);

                    $userID = $prevResult['id'];
                } else {
                    $insert = $this->db->insert($this->tableName, $userData);
                    $userID = $this->db->insert_id();
                }
            }
            return $userID?$userID:FALSE;
        }
    	  function login($usuario, $claveEncriptada) {
            $this->db->select("*");
            $this->db->from("clientes");
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