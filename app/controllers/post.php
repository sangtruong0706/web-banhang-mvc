<?php
    class post extends DController{

        public function __construct()
        {
            parent::__construct();
            Session::init();
        }
        public function index(){
            $this->addCategory();
        }
        public function addCategory(){
            $this->load->view('admin/header');
            $this->load->view('admin/post/addCategory');
            $this->load->view('admin/footer');
        }
        public function insertCategory(){

            $title = $_POST['title_category_post'];
            $desc = $_POST['desc_category_post'];
            $table = 'tbl_category_post';
            $data = array(
                'title_category_post' => $title,
                'desc_category_post' => $desc
            );
            $categoryModel = $this->load->model('categoryModel');
            $result = $categoryModel->insertCategoryPost($table, $data);
            if ($result == 1){
                Session::set('message','Thêm danh mục bài viết thành công!');
                header('Location:'.BASE_URL."/post/listCategory");
            }else{
                Session::set('message','Thêm danh mục bài viết thất bại!');
                header('Location:'.BASE_URL."/post/listCategory");
            }
        
        }

        public function listCategory(){
            $this->load->view('admin/header');
            $table = 'tbl_category_post';
            $categoryModel = $this->load->model('categoryModel');
            $data['category'] = $categoryModel->postCategory($table);

            $this->load->view('admin/post/listCategory', $data);
            $this->load->view('admin/footer');
        }

        public function deleteCategory($id){
            $table = 'tbl_category_post';
            $cond = "id_category_post='$id'";
            $categoryModel = $this->load->model('categoryModel');
            $result = $categoryModel->deleteCategoryPost($table, $cond);
            if ($result == 1){
                Session::set('message','Xóa danh mục bài viết thành công!');
                header('Location:'.BASE_URL."/post/listCategory");
            }else{
                Session::set('message','Xóa danh mục bài viết thất bại!');
                header('Location:'.BASE_URL."/post/listCategory");
            }
        }

        public function editCategory($id){
            $table = 'tbl_category_post';
            $cond = "id_category_post='$id'";
            $categoryModel = $this->load->model('categoryModel');
            $data['categoryID'] = $categoryModel->categoryIDPost($table, $cond);
            $this->load->view('admin/header');
            $this->load->view('admin/post/editCategory', $data);
            $this->load->view('admin/footer');
        }
        public function updateCategory($id){

            $table = 'tbl_category_post';
            $cond = "id_category_post='$id'";
            $title = $_POST['title_category_post'];
            $desc = $_POST['desc_category_post'];
            $data = array(
                'title_category_post' => $title,
                'desc_category_post' => $desc
            );
            $categoryModel = $this->load->model('categoryModel');
            $result = $categoryModel->updateCategoryPost($table, $data, $cond);
            if ($result == 1){
                Session::set('message','Cập nhật danh mục bài viết thành công!');
                header('Location:'.BASE_URL."/post/listCategory");
            }else{
                Session::set('message','Cập nhật danh mục bài viết thất bại!');
                header('Location:'.BASE_URL."/post/listCategory");
            }    
        }
        /**--------------------------
         * POST
         */
        public function addPost(){
            $this->load->view('admin/header');

            $postModel = $this->load->model('postModel');
            $table = 'tbl_category_post';
            $data['category'] = $postModel->categoryPost($table);

            $this->load->view('admin/post/addPost', $data);
            $this->load->view('admin/footer');
        }
        public function insertPost(){
            $title = $_POST['title_post'];
            $content = $_POST['content_post'];
            $cate = $_POST['category_post'];
            $desc = $_POST['desc_post'];


            $images = $_FILES['img_post']['name'];
            $tmp_images = $_FILES['img_post']['tmp_name'];
            $div = explode('.', $images);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_uploads = "public/uploads/post/".$unique_image;


            $table = 'tbl_post';
            $data = array(
                'title_post' => $title,
                'content_post' => $content,
                'id_category_post' => $cate,
                'desc_post' => $desc,
                'img_post' => $unique_image
            );
            $postModel = $this->load->model('postModel');
            $result = $postModel->insertPost($table, $data);
            if ($result == 1){
                move_uploaded_file($tmp_images, $path_uploads);
                Session::set('message','Thêm bài viết thành công!');
                header('Location:'.BASE_URL."/post/listPost");
            }else{
                Session::set('message','Thêm bài viết thất bại!');
                header('Location:'.BASE_URL."/post/listPost");
            }
        }

        public function listPost(){
            $this->load->view('admin/header');
            $tablePost = 'tbl_post';
            $tableCatePost = 'tbl_category_post';
            $postModel = $this->load->model('postModel');
            $data['post'] = $postModel->post($tablePost, $tableCatePost);

            $this->load->view('admin/post/listPost', $data);
            $this->load->view('admin/footer');
        }

        public function deletePost($id){
            $table = 'tbl_post';
            $cond = "id_post='$id'";
            $postModel = $this->load->model('postModel');
            $result = $postModel->deletePost($table, $cond);
            if ($result == 1){
                Session::set('message','Xóa bài viết thành công!');
                header('Location:'.BASE_URL."/post/listPost");
            }else{
                Session::set('message','Xóa bài viết thất bại!');
                header('Location:'.BASE_URL."/post/listPost");
            }
        }
        public function editPost($id){
            $this->load->view('admin/header');

            $postModel = $this->load->model('postModel');
            $table = 'tbl_category_post';
            $tablePost = 'tbl_post';
            $cond = "id_post='$id'";
            $data['category'] = $postModel->categoryPost($table);
            $data['postID'] = $postModel->postID($tablePost, $cond);
            $this->load->view('admin/post/editPost', $data);
            $this->load->view('admin/footer');
        }

        public function updatePost($id){
            $postModel = $this->load->model('postModel');
            $table = 'tbl_post';
            $cond = "id_post='$id'";
            //du lieu
            $title = $_POST['title_post'];
            $content = $_POST['content_post'];
            $cate = $_POST['category_post'];
            $desc = $_POST['desc_post'];

            $images = $_FILES['img_post']['name'];
            $tmp_images = $_FILES['img_post']['tmp_name'];
            $div = explode('.', $images);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_uploads = "public/uploads/post/".$unique_image;

            if ($images){
                $data['postID'] = $postModel->postID($table, $cond);
                foreach ( $data['postID'] as $key=>$value){
                    if ($value['img_post']){
                        unlink("public/uploads/post/".$value['img_post']);
                    }
                }

                $data = array(
                    'title_post' => $title,
                    'content_post' => $content,
                    'id_category_post' => $cate,
                    'desc_post' => $desc,
                    'img_post' => $unique_image
                );
                move_uploaded_file($tmp_images, $path_uploads);
            }else{
                $data = array(
                    'title_post' => $title,
                    'content_post' => $content,
                    'id_category_post' => $cate
                    // 'img_post' => $unique_image
                );
            }


            $result = $postModel->updatePost($table, $data, $cond);
            if ($result == 1){
                Session::set('message','Cập nhật bài viết thành công!');
                header('Location:'.BASE_URL."/post/listPost");
            }else{
                Session::set('message','Cập nhật bài viết thất bại!');
                header('Location:'.BASE_URL."/post/listPost");
            }
            
        }




    }
