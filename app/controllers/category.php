<?php
    class category extends DController{
        public function __construct()
        {
            $data = array();
            parent::__construct();
            Session::init();
        }
        public function index(){
            $this->addCategory();
        }
        public function addCategory(){
            $this->load->view('admin/header');
            $this->load->view('admin/category/addCategory');
            $this->load->view('admin/footer');
        }
        public function insertCategory(){
            if (isset($_POST['addproduct_cate'])){
                $title = $_POST['title_category'];
                $desc = $_POST['desc_category'];
                $table = 'tbl_category';
                $data = array(
                    'title_category' => $title,
                    'desc_category' => $desc
                );
                $categoryModel = $this->load->model('categoryModel');
                $result = $categoryModel->insertCategory($table, $data);
                if ($result == 1){
                    Session::set('message','Thêm danh mục thành công!');
                    header('Location:'.BASE_URL."/category/listCategory");
                }else{
                    Session::set('message','Thêm danh mục thất bại!');
                    header('Location:'.BASE_URL."/category/listCategory");
                }
            }
        }
        public function listCategory(){
            $this->load->view('admin/header');
            $table = 'tbl_category';
            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel->category($table);

            $this->load->view('admin/category/listCategory', $data);
            $this->load->view('admin/footer');
        }
        public function deleteCategory($id){
            $table = 'tbl_category';
            $cond = "id_category='$id'";
            $categoryModel = $this->load->model('categoryModel');
            $result = $categoryModel->deleteCategory($table, $cond);
            if ($result == 1){
                Session::set('message','Xóa danh mục thành công!');
                header('Location:'.BASE_URL."/category/listCategory");
            }else{
                Session::set('message','Xóa danh mục thất bại!');
                header('Location:'.BASE_URL."/category/listCategory");
            }
        }
        public function editCategory($id){
            $table = 'tbl_category';
            $cond = "id_category='$id'";
            $categoryModel = $this->load->model('categoryModel');
            $data['categoryID'] = $categoryModel->categoryID($table, $cond);
            $this->load->view('admin/header');
            $this->load->view('admin/category/editCategory', $data);
            $this->load->view('admin/footer');
        }
        public function updateCategory($id){

            $table = 'tbl_category';
            $cond = "id_category='$id'";
            $title = $_POST['title_category'];
            $desc = $_POST['desc_category'];
            $data = array(
                'title_category' => $title,
                'desc_category' => $desc
            );
            $categoryModel = $this->load->model('categoryModel');
            $result = $categoryModel->updateCategory($table, $data, $cond);
            if ($result == 1){
                Session::set('message','Cập nhật danh mục thành công!');
                header('Location:'.BASE_URL."/category/listCategory");
            }else{
                Session::set('message','Cập nhật danh mục thất bại!');
                header('Location:'.BASE_URL."/category/listCategory");
            }
            
        }


    }
?>