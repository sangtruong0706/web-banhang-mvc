<?php
    class login extends DController{
        public function __construct()
        {
            $message = array();
            $data = array();

            parent::__construct();
        }
        public function index(){
            $this->login();
        }
        public function login(){
            // $this->load->view('header');
            Session::init();
            if(Session::get('login') == true){
                header("Location:".BASE_URL."/login/dashboard");
            }
            $this->load->view('admin/login');
            // $this->load->view('footer');
        }
        public function dashboard(){
            Session::checkSession();
            $this->load->view('admin/header');
            $this->load->view('admin/dashboard');
            $this->load->view('admin/footer');
        }   
        public function authentication(){

            $userName = $_POST['username'];
            $password = $_POST['password'];
            $table_admin = 'tbl_admin';
            $loginModel = $this->load->model('loginModel');

            $count = $loginModel->login($table_admin, $userName, $password);

            if ($count == 0){
                $message['msg'] = "Usename or Password không chính xác";
                header("Location:".BASE_URL."/login");
            }else{

                $result = $loginModel->getLogin($table_admin, $userName, $password);

                Session::init();
                Session::set('login', true);
                Session::set('username', $result[0]['username']);
                Session::set('userID', $result[0]['id_admin']);

                header("Location:".BASE_URL."/login/dashboard");
            }
            
        }

        public function logout(){
            Session::init();
            Session::unset('login');
            header("Location:".BASE_URL."/login");
        }

       

    }
?>