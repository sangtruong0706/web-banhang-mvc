<?php
    class order extends DController{
        public function __construct()
        {
            $data = array();
            Session::checkSession();
            parent::__construct();
            Session::init();
        }
        public function index(){
            $this->order();
        }
        public function order(){
            $table_order = 'tbl_order';
            $orderModel = $this->load->model('orderModel');
            $data['order'] = $orderModel->listOrder($table_order);
            $this->load->view('admin/header');
            $this->load->view('admin/order/order', $data);
            $this->load->view('admin/footer');
        }
        public function orderDetail($order_code){
            $this->load->view('admin/header');

            $table_order_detail = 'tbl_order_detail';
            $table_product = 'tbl_product';
            $orderModel = $this->load->model('orderModel');

            $cond = "$table_product.id_product=$table_order_detail.product_id AND $table_order_detail.order_code='$order_code' ";
            $cond_info = "$table_order_detail.order_code='$order_code' LIMIT 1";

            $data['order_detail'] = $orderModel->listOrderDetail($table_product,$table_order_detail, $cond);
            $data['order_info'] = $orderModel->infoCustomer($table_order_detail, $cond_info);

            $this->load->view('admin/order/orderDetail', $data);
            $this->load->view('admin/footer');
        }
        public function orderConfirm($order_code){
            $table_order = 'tbl_order';
            $orderModel = $this->load->model('orderModel');
            $cond = "$table_order.order_code='$order_code'";
            $data = array(
                'order_status' => '1'
            );
            $result = $orderModel->orderConfirm($table_order, $data, $cond);
            if ($result == 1){
                Session::set('message','Đã xử lý đơn hàng thành công!');
                header('Location:'.BASE_URL."/order");
            }else{
                Session::set('message','Đã xử lý đơn hàng thất bại!');
                header('Location:'.BASE_URL."/order");
            }
        }

    }
?>