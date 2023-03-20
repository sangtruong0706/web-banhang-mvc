<?php
    class postModel extends DModel{
        public function __construct()
        {
            parent::__construct();
        }
        // function category product
        public function categoryPost($table){
            $sql = "SELECT * FROM $table ORDER BY id_category_post DESC ";
            return $this->db->select($sql);
        } 

        public function insertPost($table, $data){
            return $this->db->insert($table, $data);
        }

        public function post($tablePost, $tableCatePost){
            $sql = "SELECT * FROM $tablePost, $tableCatePost
            WHERE $tablePost.id_category_post=$tableCatePost.id_category_post ORDER BY $tablePost.id_post DESC ";
            return $this->db->select($sql);
        } 
        public function deletePost($table, $cond){
            return $this->db->delete($table, $cond);
        }

        public function postID($table, $cond){
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this->db->select($sql);
        }
        public function updatePost($table, $data, $cond){
            return $this->db->update($table, $data, $cond);
        }

        public function categoryPostIDHome($tablePost, $tableCatePost, $id){
            $sql = "SELECT * FROM $tablePost, $tableCatePost
            WHERE $tablePost.id_category_post=$tableCatePost.id_category_post AND $tablePost.id_category_post='$id' ORDER BY $tablePost.id_post DESC ";
            return $this->db->select($sql);
        }
        public function allPost($tablePost){
            $sql = "SELECT * FROM $tablePost ORDER BY $tablePost.id_post DESC ";
            return $this->db->select($sql);
        }
        public function categoryPostHome($table){
            $sql = "SELECT * FROM $table ORDER BY id_category_post DESC ";
            return $this->db->select($sql);
        } 
        public function detailPostHome($tableCatePost, $tablePost, $cond){
            $sql = "SELECT * FROM $tableCatePost, $tablePost WHERE $cond ";
            return $this->db->select($sql);
        } 

        


    }
