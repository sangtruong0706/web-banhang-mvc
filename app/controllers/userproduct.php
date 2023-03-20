<?php
class userproduct extends DController
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
        Session::init();
    }
    public function index($page_num)
    {
        $this->paging($page_num);
    }
    // public function homeProduct()
    // {
    //     $categoryModel = $this->load->model('categoryModel');
    //     $productModel = $this->load->model('productModel');
    //     $postModel = $this->load->model('postModel');
    //     $tableCate = 'tbl_category';
    //     $tablePro = 'tbl_product';
    //     $tablePost = 'tbl_category_post';
    //     $data['category'] = $categoryModel->categoryHome($tableCate);
    //     $data['category_post'] = $postModel->categoryPostHome($tablePost);
    //     $data['all_product'] = $productModel->allProduct($tablePro);
    //     $data['product_paging'] = $productModel->productPaging($tablePro);


    //     $row_count = count($data['product_paging']);
    //     $page = ceil($row_count / 5);
    //     $data['page'] = $page;

    //     $this->load->view('user/header', $data);
    //     $this->load->view('user/homeProduct', $data);
    //     $this->load->view('user/footer');
    // }

    public function paging($page_num){
        if($page_num=='' || $page_num=='1'){
            $offset = '0';
        }else{
            $offset = ($page_num*5)-5;
        }
        // echo $offset; exit;
        $categoryModel = $this->load->model('categoryModel');
        $productModel = $this->load->model('productModel');
        $postModel = $this->load->model('postModel');

        $tableCate = 'tbl_category';
        $tablePro = 'tbl_product';
        $tablePost = 'tbl_category_post';
        $data['page_num'] = array(
            'page' =>$page_num
        );
        $data['category'] = $categoryModel->categoryHome($tableCate);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);

        $data['product_paging'] = $productModel->countProduct($tablePro); // đếm tổng số product để phân trang

        $data['all_product'] = $productModel->productPaging($tablePro, $offset);
    
        $row_count = count($data['product_paging']);
        $page = ceil($row_count / 5);
        $data['page'] = $page;
        $this->load->view('user/header', $data);
        $this->load->view('user/pagingProduct', $data);
        $this->load->view('user/footer');
        

    }
    public function categoryProduct($id)
    {
        // $this->load->view('user/slider');  
        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');
        $tableCate = 'tbl_category';
        $tablePro = 'tbl_product';
        $tablePost = 'tbl_category_post';
        $data['category'] = $categoryModel->categoryHome($tableCate);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);
        $data['category_id'] = $categoryModel->categoryIDHome($tableCate, $tablePro, $id);
        $this->load->view('user/header', $data);
        $this->load->view('user/categoryProduct', $data);
        $this->load->view('user/footer');
    }
    public function detailProduct($id)
    {
        $categoryModel = $this->load->model('categoryModel');
        $productModel = $this->load->model('productModel');
        $postModel = $this->load->model('postModel');

        $tableCate = 'tbl_category';
        $tablePost = 'tbl_category_post';
        $tablePro = 'tbl_product';


        $data['category'] = $categoryModel->categoryHome($tableCate);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);
        $data['detail_product'] = $productModel->detailProductHome($tableCate, $tablePro, $id);
        foreach ($data['detail_product'] as $key => $value) {
            $id_cate = $value['id_category'];
        }
        $cond = " $tableCate.id_category=$tablePro.id_category AND $tableCate.id_category='$id_cate' AND $tablePro.id_product NOT IN($id)";
        $data['related_product'] = $productModel->relatedProductHome($tableCate, $tablePro, $cond);

        $this->load->view('user/header', $data);
        // $this->load->view('user/slider');      
        $this->load->view('user/detailProduct', $data);
        $this->load->view('user/footer');
    }
}
