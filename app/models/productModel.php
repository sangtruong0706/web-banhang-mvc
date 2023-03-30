<?php
    class productModel extends DModel{
        public function __construct()
        {
            parent::__construct();
        }
        // function category product
        public function category($table){
            $sql = "SELECT * FROM $table ORDER BY id_category DESC ";
            return $this->db->select($sql);
        } 
        public function product($tablePro, $tableCate){
            $sql = "SELECT * FROM $tablePro, $tableCate
            WHERE $tablePro.id_category=$tableCate.id_category ORDER BY $tablePro.id_product DESC ";
            return $this->db->select($sql);
        } 
        public function productID($table, $cond){
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this->db->select($sql);
        }
        public function product_list($tablePro){
            $sql = "SELECT * FROM $tablePro";
            return $this->db->select($sql);
        }

        public function insertProduct($table, $data){
            return $this->db->insert($table, $data);
        }
        
        public function updateProduct($table, $data, $cond){
            return $this->db->update($table, $data, $cond);
        }
        public function deleteProduct($table, $cond){
            return $this->db->delete($table, $cond);
        }
        public function allProduct($tablePro){
            $sql = "SELECT * FROM $tablePro LIMIT 5";
            return $this->db->select($sql);
        }
        public function countProduct($tablePro){
            $sql = "SELECT * FROM $tablePro";
            return $this->db->select($sql);
        }
        public function productPaging($tablePro, $offset){
            $sql = "SELECT * FROM $tablePro  ORDER BY $tablePro.id_product DESC LIMIT $offset,5";
            return $this->db->select($sql);
        }
        public function listProductIndex($tablePro){
            $sql = "SELECT * FROM $tablePro ORDER BY $tablePro.id_product DESC";
            return $this->db->select($sql); 
        }

        public function listProductHot($tablePro){
            $sql = "SELECT * FROM $tablePro WHERE $tablePro.product_hot='1' ORDER BY $tablePro.id_product DESC LIMIT 5";
            return $this->db->select($sql); 
        }
        public function detailProductHome($tableCate, $tablePro, $id){
            $sql = "SELECT * FROM $tablePro, $tableCate WHERE $tableCate.id_category=$tablePro.id_category AND $tablePro.id_product='$id'";
            return $this->db->select($sql);
        }
        public function relatedProductHome($tableCate,$tablePro, $cond){
            $sql = "SELECT * FROM $tablePro, $tableCate WHERE $cond ";
            return $this->db->select($sql);
        }


    }
