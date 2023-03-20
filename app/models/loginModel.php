<?php
    class loginModel extends DModel{
        public function __construct()
        {
            parent::__construct();
        }
        public function login($table_admin, $userName, $password){
            $sql = "SELECT * FROM $table_admin WHERE username=? AND password=?";
            return $this->db->affectedRows($sql, $userName, $password);
        }
        public function getLogin($table_admin, $userName, $password){
            $sql = "SELECT * FROM $table_admin WHERE username=? AND password=?";
            return $this->db->selectUser($sql, $userName, $password);
        }

        


    }