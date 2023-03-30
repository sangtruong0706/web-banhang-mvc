<?php
    class product extends DController{

        public function __construct()
        {
            parent::__construct();
            Session::init();
        }
        // product
        public function index(){
            $this->addProduct();
        }
        public function addProduct(){
            $this->load->view('admin/header');

            $table = 'tbl_category';
            $tablePro = 'tbl_product';
            $categoryModel = $this->load->model('categoryModel'); //lấy dử liệu từ category truyền vào select
            $productModel = $this->load->model('productModel');
            $data['category'] = $categoryModel->category($table);
            $data['product'] = $productModel->product_list($tablePro);

            $this->load->view('admin/product/addProduct', $data);
            $this->load->view('admin/footer');
        }

        public function insertProduct(){

            $title = $_POST['title_product'];
            $price = $_POST['price_product'];
            $desc = $_POST['desc_product'];
            $hot = $_POST['product_hot'];
            $quantity = $_POST['quantity_product'];
            $cate = $_POST['category_product'];


            $images = $_FILES['img_product']['name'];
            $tmp_images = $_FILES['img_product']['tmp_name'];
            $div = explode('.', $images);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_uploads = "public/uploads/product/".$unique_image;


            $table = 'tbl_product';
            $data = array(
                'title_product' => $title,
                'price_product' => $price,
                'desc_product' => $desc,
                'quantity_product' => $quantity,
                'id_category' => $cate,
                'product_hot' => $hot,
                'img_product' => $unique_image
            );
            $productModel = $this->load->model('productModel');
            $result = $productModel->insertProduct($table, $data);
            if ($result == 1){
                move_uploaded_file($tmp_images, $path_uploads);
                Session::set('message','Thêm sản phẩm thành công!');
                header('Location:'.BASE_URL."/product/listProduct");
            }else{
                Session::set('message','Thêm sản phẩm thất bại!');
                header('Location:'.BASE_URL."/product/listProduct");
            }
        }

        public function listProduct(){
            $this->load->view('admin/header');
            $tablePro = 'tbl_product';
            $tableCate = 'tbl_category';
            $productModel = $this->load->model('productModel');
            $data['product'] = $productModel->product($tablePro, $tableCate);

            $this->load->view('admin/product/listProduct', $data);
            $this->load->view('admin/footer');
        }

        public function deleteProduct($id){
            $table = 'tbl_product';
            $cond = "id_product='$id'";
            $productModel = $this->load->model('productModel');
            $result = $productModel->deleteProduct($table, $cond);
            if ($result == 1){
                Session::set('message','Xóa sản phẩm thành công!');
                header('Location:'.BASE_URL."/product/listProduct");
            }else{
                Session::set('message','Xóa sản phẩm thất bại!');
                header('Location:'.BASE_URL."/product/listProduct");
            }
        }

        public function editProduct($id){
            $productModel = $this->load->model('productModel');

            $tablePro = 'tbl_product';
            $tableCate = 'tbl_category';
            $cond = "id_product='$id'";

            $data['category'] = $productModel->category($tableCate);

            $data['productID'] = $productModel->productID($tablePro, $cond);

            $this->load->view('admin/header');
            $this->load->view('admin/product/editProduct', $data);
            $this->load->view('admin/footer');
        }
        public function updateProduct($id){
            $productModel = $this->load->model('productModel');
            $table = 'tbl_product';
            $cond = "id_product='$id'";
            //du lieu
            $title = $_POST['title_product'];
            $price = $_POST['price_product'];
            $desc = $_POST['desc_product'];
            $hot = $_POST['product_hot'];
            $quantity = $_POST['quantity_product'];
            $cate = $_POST['category_product'];

            $images = $_FILES['img_product']['name'];
            $tmp_images = $_FILES['img_product']['tmp_name'];
            $div = explode('.', $images);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_uploads = "public/uploads/product/".$unique_image;

            if ($images){
                $data['productID'] = $productModel->productID($table, $cond);
                foreach ($data['productID'] as $key=>$value){
                    if ($value['img_product']){
                        unlink("public/uploads/product/".$value['img_product']);
                    }
                }

                 $data = array(
                    'title_product' => $title,
                    'price_product' => $price,
                    'desc_product' => $desc,
                    'quantity_product' => $quantity,
                    'id_category' => $cate,
                    'product_hot' => $hot,
                    'img_product' => $unique_image
                );
                move_uploaded_file($tmp_images, $path_uploads);
            }else{
                $data = array(
                    'title_product' => $title,
                    'price_product' => $price,
                    'desc_product' => $desc,
                    'quantity_product' => $quantity,
                    'product_hot' => $hot,
                    'id_category' => $cate
                    //'img_product' => $unique_image
                );
            }


            $result = $productModel->updateProduct($table, $data, $cond);
            if ($result == 1){
                Session::set('message','Cập nhật sản phẩm thành công!');
                header('Location:'.BASE_URL."/product/listProduct");
            }else{
                Session::set('message','Cập nhật sản phẩm thất bại!');
                header('Location:'.BASE_URL."/product/listProduct");
            }
            
        }


    }
