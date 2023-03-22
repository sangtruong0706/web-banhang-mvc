<?php
class customerModel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }


    public function singUp($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function login($table_customer, $userName, $password)
    {
        $sql = "SELECT * FROM $table_customer WHERE customer_email=? AND customer_password=?";
        return $this->db->affectedRows($sql, $userName, $password);
    }
    public function getLogin($table_customer, $userName, $password)
    {
        $sql = "SELECT * FROM $table_customer WHERE customer_email=? AND customer_password=?";
        return $this->db->selectUser($sql, $userName, $password);
    }
    public function insertShip($table_ship, $data)
    {
        return $this->db->insert($table_ship, $data);
    }
    public function infoShipping($table_ship, $cond)
    {
        $sql = "SELECT * FROM $table_ship WHERE $cond ";
        return $this->db->select($sql);
    }
    public  function updateShip($table_ship, $data_update, $cond){
        return $this->db->update($table_ship, $data_update, $cond);
    }

    public function insertVNPay($table_vnpay, $data_insert){
        return $this->db->insert($table_vnpay, $data_insert);
    }

    public function listHistoryCart($table_order, $cond){
        $sql = "SELECT * FROM $table_order WHERE $cond ORDER BY order_id DESC ";
        return $this->db->select($sql);
    }
    public function listCartDetail($table_product, $table_order_detail, $cond){
        $sql = "SELECT * FROM $table_order_detail, $table_product WHERE $cond";
        return $this->db->select($sql);
    }
    public function infoCustomer($table_order_detail, $cond_info){
        $sql = "SELECT * FROM $table_order_detail WHERE $cond_info";
        return $this->db->select($sql);
    }
    public function detailVNPay($table_vnpay, $cond_vnpay){
        $sql = "SELECT * FROM $table_vnpay WHERE $cond_vnpay";
        return $this->db->select($sql);
    }
}
