<?php
class cart extends DController
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
        Session::init();
    }
    public function index()
    {
        $this->cart();
    }

    public function cart()
    {

        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');
        $table = 'tbl_category';
        $tablePost = 'tbl_category_post';
        $data['category'] = $categoryModel->categoryHome($table);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);
        // include_once(DIR."/public_func.php");
        // $commonBlock[] = new commonBlock();
        // $data['category'] = $commonBlock;
        // $commonBlock['category_post'] = new commonBlock();

        $this->load->view('user/header', $data);
        // $this->load->view('user/slider');      
        $this->load->view('user/cart');
        $this->load->view('user/footer');
    }
    public function addCart()
    {

        // Session::destroy();
        if (isset($_SESSION['shopping_cart'])) {
            $available = 0;
            foreach ($_SESSION['shopping_cart'] as $key => $value) {
                if ($_SESSION['shopping_cart'][$key]['product_id'] == $_POST['product_id']) {
                    $available++;
                    $_SESSION['shopping_cart'][$key]['product_quantity'] += $_POST['product_quantity'];
                }
            }
            if ($available == 0) {
                $item = array(
                    'product_id' => $_POST['product_id'],
                    'product_title' => $_POST['product_title'],
                    'product_price' => $_POST['product_price'],
                    'product_image' => $_POST['product_image'],
                    'product_quantity' => $_POST['product_quantity']
                );
                $_SESSION['shopping_cart'][] = $item;
            }
        } else {
            $item = array(
                'product_id' => $_POST['product_id'],
                'product_title' => $_POST['product_title'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity']
            );
            $_SESSION['shopping_cart'][] = $item;
        }
        header("Location:" . BASE_URL . "/cart/cart");
    }
    public function checkOut($id_customer)
    {
        require_once(DIR . "/config.php");
        $table_order = 'tbl_order';
        $table_order_detail = 'tbl_order_detail';
        $table_ship = 'tbl_shipping';
        $orderModel = $this->load->model('orderModel');
        $customerModel = $this->load->model('customerModel');

        $name = $_POST['name'];
        $phone_number = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $content = $_POST['note'];
        $order_code = rand(0, 9999);
        date_default_timezone_set("asia/ho_chi_minh");
        $date = date("d/m/Y");
        $hour = date("h:i:sa");
        $order_date = $date . ' ' . $hour;
        $order_payment = $_POST['payment'];
        $total = 0;
        if (isset($_SESSION['shopping_cart'])) {
            foreach ($_SESSION['shopping_cart'] as $key => $cus) {
                $sub_total = $cus['product_price'] * $cus['product_quantity'];
                $total += $sub_total;
            }
        }

        //lấy id shipping
        $cond = "$table_ship.id_customer='$id_customer'";
        $data['get_shipping'] = $customerModel->infoShipping($table_ship, $cond);
        foreach ($data['get_shipping'] as $key => $get_ship) {
            $id_shipping = $get_ship['id_customer'];
        }
        // echo $id_shipping;exit;
        if ($order_payment == 'tienmat' || $order_payment == 'chuyenkhoan') {
            $data_order = array(
                'order_status' => '0',
                'order_code' => $order_code,
                'order_date' => $order_date,
                'order_payment' => $order_payment,
                'order_shipping' => $id_shipping
            );
            $result_order = $orderModel->insertOrder($table_order, $data_order);

            if (Session::get("shopping_cart") == true) {
                foreach (Session::get("shopping_cart") as $key => $value) {
                    $data_detail = array(
                        'order_code' => $order_code,
                        'product_id' => $value['product_id'],
                        'product_quantity' => $value['product_quantity'],
                        'name' => $name,
                        'phone_number' => $phone_number,
                        'address' => $address,
                        'email' => $email,
                        'content' => $content
                    );
                    $result_order_detail = $orderModel->insertOrderDetail($table_order_detail, $data_detail);
                }
                unset($_SESSION['shopping_cart']);
            }
            if ($result_order_detail == 1) {
                $message['msg'] = " Thanh toán thành công!";

                header("Location:" . BASE_URL . "/cart/thankYou?msg=" . urldecode(serialize($message)));
            } else {
                $message['msg'] = " Thanh toán thất bại!";
                header("Location:" . BASE_URL . "/cart/thankYou?msg=" . urldecode(serialize($message)));
            }
        } elseif ($order_payment == 'vnpay') {
            //config
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $vnp_TmnCode = "VHKWZDMW"; //Website ID in VNPAY System
            $vnp_HashSecret = "IJRCDIKQIAXXALPXPOOVVMZXADGZTPXO"; //Secret key
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost/web-banhang-mvc/cart/thankYou";
            $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
            //Config input format
            //Expire
            $startTime = date("YmdHis");
            $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
            //end config
            $vnp_TxnRef = $order_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh toán đơn hàng";
            $vnp_OrderType = "other";
            $vnp_Amount = $total * 100;
            $vnp_Locale = "vn";
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($_POST['redirect'])) {
                Session::set('order_code', $order_code);
                $data_order = array(
                    'order_status' => '0',
                    'order_code' => $order_code,
                    'order_date' => $order_date,
                    'order_payment' => $order_payment,
                    'order_shipping' => $id_shipping
                );
                $result_order = $orderModel->insertOrder($table_order, $data_order);

                if (Session::get("shopping_cart") == true) {
                    foreach (Session::get("shopping_cart") as $key => $value) {
                        $data_detail = array(
                            'order_code' => $order_code,
                            'product_id' => $value['product_id'],
                            'product_quantity' => $value['product_quantity'],
                            'name' => $name,
                            'phone_number' => $phone_number,
                            'address' => $address,
                            'email' => $email,
                            'content' => $content
                        );
                        $result_order_detail = $orderModel->insertOrderDetail($table_order_detail, $data_detail);
                    }
                    unset($_SESSION['shopping_cart']);
                }
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        } elseif ($order_payment == 'momo') {
            echo 'thanh toán momo';
        }
    }

    public function updateCart()
    {
        Session::init();
        if (isset($_POST['delete_cart'])) {
            if (isset($_SESSION['shopping_cart'])) {
                foreach ($_SESSION['shopping_cart'] as $key => $value) {
                    if ($_SESSION['shopping_cart'][$key]['product_id'] == $_POST['delete_cart']) {
                        unset($_SESSION['shopping_cart'][$key]);
                    }
                }
                header("Location:" . BASE_URL . "/cart/cart");
            } else {
                header("Location:" . BASE_URL);
            }
        } else {

            if (isset($_POST['qty_plus'])) {
                foreach ($_POST['qty_plus'] as $key => $qty) {
                    // echo $key; exit;
                    foreach ($_SESSION['shopping_cart'] as $session => $value) {
                        if ($value['product_id'] != $key) {
                            $_SESSION['shopping_cart'][$session]['product_quantity'] =  $_SESSION['shopping_cart'][$session]['product_quantity'];
                        } else {

                            $qty += 1;
                            $_SESSION['shopping_cart'][$session]['product_quantity'] = $qty;
                        }
                    }
                }
            } else {
                foreach ($_POST['qty_minus'] as $key => $qty_minus) {
                    // echo $key; exit;
                    foreach ($_SESSION['shopping_cart'] as $session => $value) {
                        if ($value['product_id'] == $key) {
                            $_SESSION['shopping_cart'][$session]['product_quantity'] =  $qty_minus - 1;
                        }
                        if ($_SESSION['shopping_cart'][$session]['product_quantity'] < 1) {
                            $_SESSION['shopping_cart'][$session]['product_quantity'] = 1;
                        }
                    }
                }
            }





            header("Location:" . BASE_URL . "/cart/cart");
        }
    }

    public function transport($id_customer)
    {

        $customerModel = $this->load->model('customerModel');
        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');

        $table = 'tbl_category';
        $tablePost = 'tbl_category_post';

        $data['category'] = $categoryModel->categoryHome($table);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);

        $table_ship = 'tbl_shipping';
        $cond = "$table_ship.id_customer='$id_customer'";
        $data['info_ship'] = $customerModel->infoShipping($table_ship, $cond);

        $this->load->view('user/header', $data);
        $this->load->view('user/process/transport', $data);
        $this->load->view('user/footer');
    }
    public function handlingShipping($id_customer)
    {

        $customerModel = $this->load->model('customerModel');
        if (isset($_POST['add_transport'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $note = $_POST['note'];

            $table_ship = 'tbl_shipping';
            $data = array(
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'email' => $email,
                'note' => $note,
                'id_customer' => $id_customer
            );
            $result = $customerModel->insertShip($table_ship, $data);
            if ($result == 1) {
                $message['msg'] = " Thêm thông tin vận chuyển thành công!";
                header("Location:" . BASE_URL . "/cart/transport/" . $id_customer . "?msg=" . urldecode(serialize($message)));
            } else {
                $message['msg'] = " Thêm thông tin vận chuyển thất bại!";
                header("Location:" . BASE_URL . "/cart/transport/" . $id_customer . "?msg=" . urldecode(serialize($message)));
            }
        }

        if (isset($_POST['update_transport'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $table_ship = 'tbl_shipping';
            $data_update = array(
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'email' => $email,
                'note' => $note,
                'id_customer' => $id_customer
            );
            $cond = "$table_ship.id_customer ='$id_customer'";
            $result = $customerModel->updateShip($table_ship, $data_update, $cond);
            if ($result == 1) {
                $message['msg'] = " Cập nhật thông tin vận chuyển thành công!";
                header("Location:" . BASE_URL . "/cart/transport/" . $id_customer . "?msg=" . urldecode(serialize($message)));
            } else {
                $message['msg'] = " Cập nhật thông tin vận chuyển thất bại!";
                header("Location:" . BASE_URL . "/cart/transport/" . $id_customer . "?msg=" . urldecode(serialize($message)));
            }
        }
    }
    public function infoPay($id_customer)
    {

        $customerModel = $this->load->model('customerModel');
        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');

        $table = 'tbl_category';
        $tablePost = 'tbl_category_post';
        $data['category'] = $categoryModel->categoryHome($table);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);


        $table_ship = 'tbl_shipping';
        $cond = "$table_ship.id_customer='$id_customer'";
        $data['info_ship'] = $customerModel->infoShipping($table_ship, $cond);
        $this->load->view('user/header', $data);
        // $this->load->view('user/slider');      
        $this->load->view('user/process/infoPay', $data);
        $this->load->view('user/footer');
    }


    public function thankYou()
    {

        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');
        $customerModel = $this->load->model('customerModel');

        $table = 'tbl_category';
        $tablePost = 'tbl_category_post';
        $table_vnpay = 'tbl_vnpay';

        $data['category'] = $categoryModel->categoryHome($table);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);

        if (isset($_GET['vnp_Amount'])) {
            $vnp_Amount = $_GET['vnp_Amount'];
            $vnp_BankCode = $_GET['vnp_BankCode'];
            $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
            $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
            $vnp_PayDate = $_GET['vnp_PayDate'];
            $vnp_TmnCode = $_GET['vnp_TmnCode'];
            $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
            $vnp_CardType = $_GET['vnp_CardType'];
            $order_code = $_SESSION['order_code'];
            $data_insert = array(
                'vnp_amount' => $vnp_Amount,
                'vnp_bankcode' => $vnp_BankCode,
                'vnp_banktranno' => $vnp_BankTranNo,
                'vnp_orderinfo' => $vnp_OrderInfo,
                'vnp_paydate' => $vnp_PayDate,
                'vnp_tmncode' => $vnp_TmnCode,
                'vnp_transactionno' => $vnp_TransactionNo,
                'vnp_cardtype' => $vnp_CardType,
                'order_code' => $order_code
            );
            $result = $customerModel->insertVNPay($table_vnpay, $data_insert);
            if ($result == 1) {
                $data['message'] = "Thanh toán thành công";
            } else {
                $data['message'] = "Thanh toán thất bại";
            }
        }



        $this->load->view('user/header', $data);
        // $this->load->view('user/slider');      
        $this->load->view('user/process/thankYou', $data);
        $this->load->view('user/footer');
    }

    public function historyCart($id_customer)
    {
        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');
        $customerModel = $this->load->model('customerModel');

        $table = 'tbl_category';
        $tablePost = 'tbl_category_post';


        $data['category'] = $categoryModel->categoryHome($table);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);

        $table_order = 'tbl_order';
        $cond = " $table_order.order_shipping = '$id_customer'";
        $data['history_cart'] = $customerModel->listHistoryCart($table_order, $cond);

        $this->load->view('user/header', $data);
        // $this->load->view('user/slider');      
        $this->load->view('user/process/historyCart', $data);
        $this->load->view('user/footer');
    }
    public function detailPayment($id_customer)
    {
        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');
        $customerModel = $this->load->model('customerModel');

        $table = 'tbl_category';
        $tablePost = 'tbl_category_post';


        $data['category'] = $categoryModel->categoryHome($table);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);

        $table_order = 'tbl_order';
        $cond = " $table_order.order_shipping = '$id_customer'";
        $data['history_cart'] = $customerModel->listHistoryCart($table_order, $cond);

        foreach ($data['history_cart'] as $key => $value) {
            $order_code =  $value['order_code'];
        }
        $table_vnpay = 'tbl_vnpay';
        $cond_vnpay = "$table_vnpay.order_code = '$order_code'";
        $data['detail_vnpay'] = $customerModel->detailVNPay($table_vnpay, $cond_vnpay);

        $this->load->view('user/header', $data);
        // $this->load->view('user/slider');      
        $this->load->view('user/process/detailPayment', $data);
        $this->load->view('user/footer');
    }
    public function detailCart($order_code)
    {
        $customerModel = $this->load->model('customerModel');
        $categoryModel = $this->load->model('categoryModel');
        $postModel = $this->load->model('postModel');
        $table = 'tbl_category';
        $tablePost = 'tbl_category_post';
        $data['category'] = $categoryModel->categoryHome($table);
        $data['category_post'] = $postModel->categoryPostHome($tablePost);

        $table_order_detail = 'tbl_order_detail';
        $table_product = 'tbl_product';
        // $tbl_shipping = 'tbl_shipping';
        $cond = "$table_product.id_product=$table_order_detail.product_id AND $table_order_detail.order_code='$order_code' ";
        $cond_info = "$table_order_detail.order_code='$order_code' LIMIT 1";

        $data['cart_detail'] =  $customerModel->listCartDetail($table_product, $table_order_detail, $cond);
        $data['cart_info'] =  $customerModel->infoCustomer($table_order_detail, $cond_info);


        $this->load->view('user/header', $data);
        $this->load->view('user/process/detailCart', $data);
        $this->load->view('user/footer');
    }
}
