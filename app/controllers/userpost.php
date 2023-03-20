<?php
    class userpost extends DController{
        public function __construct()
        {
            $data = array();
            parent::__construct();
        }
        public function index(){
            $this->allPost();
        }
        public function allPost(){
            $categoryModel = $this->load->model('categoryModel');
            $postModel = $this->load->model('postModel');
            $table = 'tbl_category';
            $tableCatePost = 'tbl_category_post';
            $tablePost = 'tbl_post';
            $data['category'] = $categoryModel->categoryHome($table);
            $data['category_post'] = $postModel->categoryPostHome($tableCatePost);
            $data['all_post'] = $postModel->allPost($tablePost);
            $this->load->view('user/header', $data);
            // $this->load->view('user/slider');      
            $this->load->view('user/allPost', $data);
            $this->load->view('user/footer');
        }
        public function category($id){
            $categoryModel = $this->load->model('categoryModel');
            $postModel = $this->load->model('postModel');
            $table = 'tbl_category';
            $tableCatePost = 'tbl_category_post';
            $tablePost = 'tbl_post';
            $data['category'] = $categoryModel->categoryHome($table);
            $data['category_post'] = $postModel->categoryPostHome($tableCatePost);
            $data['category_post_id'] = $postModel->categoryPostIDHome($tablePost, $tableCatePost, $id);
            $this->load->view('user/header', $data);
            // $this->load->view('user/slider');      
            $this->load->view('user/categoryPost', $data);
            $this->load->view('user/footer');
        }
        public function detailPost($id){
            $categoryModel = $this->load->model('categoryModel');
            $postModel = $this->load->model('postModel');

            $tableCate = 'tbl_category';
            $tableCatePost = 'tbl_category_post';
            $tablePost = 'tbl_post';

            $cond = " $tableCatePost.id_category_post = $tablePost.id_category_post AND $tablePost.id_post='$id' ";

            $data['category'] = $categoryModel->categoryHome($tableCate);
            $data['category_post'] = $postModel->categoryPostHome($tableCatePost);
            $data['detail_post'] = $postModel->detailPostHome($tableCatePost, $tablePost, $cond);
            $this->load->view('user/header', $data);         
            $this->load->view('user/detailPost', $data);
            $this->load->view('user/footer');
        }
       

    }
?>