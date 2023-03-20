<?php
class customer extends DController
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->historyCart();
    }
    public function historyCart()
    {
    }
    public function singUp()
    {
        $name = $_POST['txtHoTen'];
        $phone = $_POST['txtDienThoai'];
        $email = $_POST['txtEmail'];
        $address = $_POST['txtDiaChi'];
        $password = $_POST['txtPassword'];


        $table_customer = 'tbl_customer';
        $data = array(
            'customer_name' => $name,
            'customer_phone' => $phone,
            'customer_email' => $email,
            'customer_address' => $address,
            'customer_password' => $password

        );
        $customerModel = $this->load->model('customerModel');
        $result = $customerModel->singUp($table_customer, $data);
        if ($result == 1) {
            Session::init();
            Session::set('customer', true);
            Session::set('customer_name', $result[0]['customer_name']);
            Session::set('id_customer', $result[0]['id_customer']);
            $message['msg'] = " Đặt kí thành công!";
            header("Location:" . BASE_URL . "/customer/login?msg=" . urldecode(serialize($message)));
        } else {
            $message['msg'] = " Đặt kí thất bại!";
            header("Location:" . BASE_URL . "/customer/login?msg=" . urldecode(serialize($message)));
        }
    }
    public function loginCustomer()
    {
        Session::init();
        $userName = $_POST['username'];
        $password = $_POST['password'];
        $table_customer = 'tbl_customer';
        $customerModel = $this->load->model('customerModel');

        $count = $customerModel->login($table_customer, $userName, $password);

        if ($count == 0) {
            $message['msg'] = "Username or Password không chính xác";
            header("Location:" . BASE_URL . "/customer/login?msg=" . urldecode(serialize($message)));
        } else {

            $result = $customerModel->getLogin($table_customer, $userName, $password);

            Session::set('customer', true);
            Session::set('customer_name', $result[0]['customer_name']);
            Session::set('id_customer', $result[0]['id_customer']);

            $message['msg'] = "Đăng nhập thành công";
            header("Location:" . BASE_URL . "/cart/cart?msg=" . urldecode(serialize($message)));
        }
    }
    public function logout()
    {
        Session::init();
        Session::unset('customer');
        $message['msg'] = " Đăng xuất thành công!";
        header("Location:" . BASE_URL . "/customer/login?msg=" . urldecode(serialize($message)));
    }
    public function login()
    {

        $customerModel = $this->load->model('customerModel');
        $table = 'tbl_customer';
        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');
        $table = 'tbl_category';
        $tablePost = 'tbl_category_post';
        $data['category'] = $categoryModel->categoryHome($table);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);
        Session::init();
        $this->load->view('user/header', $data);
        // $this->load->view('user/slider');      
        $this->load->view('user/customerLogin');
        $this->load->view('user/footer');
    }
}
