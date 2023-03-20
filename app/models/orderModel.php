<?php
    class orderModel extends DModel{
        public function __construct()
        {
            parent::__construct();
        }

        public function insertOrder($table_order, $data_order){
            return $this->db->insert($table_order, $data_order);
        }
        public function insertOrderDetail($table_order_detail, $data_detail){
            return $this->db->insert($table_order_detail, $data_detail);
        }
        public function listOrder($table_order){
            $sql = "SELECT * FROM $table_order ORDER BY order_id DESC ";
            return $this->db->select($sql);
        }
        public function listOrderDetail($table_product, $table_order_detail, $cond){
            $sql = "SELECT * FROM $table_order_detail, $table_product WHERE $cond";
            return $this->db->select($sql);
        }
        public function infoCustomer($table_order_detail, $cond_info){
            $sql = "SELECT * FROM $table_order_detail WHERE $cond_info";
            return $this->db->select($sql);
        }
        public function orderConfirm($table_order, $data, $cond){
            return $this->db->update($table_order, $data, $cond);
        }
    }