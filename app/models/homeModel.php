<?php
    class homeModel extends DModel{
        public function __construct()
        {
            parent::__construct();
        }
        public function Search($tablePro, $cond){
            $sql = "SELECT * FROM $tablePro WHERE $cond";
            return $this->db->select($sql);
        }

    }