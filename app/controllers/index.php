<?php
class index extends DController
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
        Session::init();
    }
    public function index()
    {
        $this->homePage();
    }
    public function homePage()
    {
        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');
        $productModel = $this->load->model('productModel');

        $table = 'tbl_category';
        $tablePost = 'tbl_category_post';
        $tablePro = 'tbl_product';

        $data['category'] = $categoryModel->categoryHome($table);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);
        $data['product'] = $productModel->listProductIndex($tablePro);
        $data['product_hot'] = $productModel->listProductHot($tablePro);



        $this->load->view('user/header', $data);
        $this->load->view('user/slider');
        $this->load->view('user/home', $data);
        $this->load->view('user/footer');
    }
    public function notFound()
    {
        $this->load->view('404');
    }

    public function contact()
    {
        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');
        $table = 'tbl_category';
        $tablePost = 'tbl_category_post';
        $data['category'] = $categoryModel->categoryHome($table);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);
        $this->load->view('user/header', $data);
        $this->load->view('user/contact');
        $this->load->view('user/footer');
    }
}
