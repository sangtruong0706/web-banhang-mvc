<?php
// define('BASE_URL', 'http://localhost/Mohinh_MVC');
define('WEBSITE_TITLE', "Cây xanh Store");
define('PROTOCOL', 'http');

/*root and asset paths*/

$path = str_replace("\\", "/", PROTOCOL . "://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

define('ROOT', str_replace("app/config", "public", $path));
define('ASSETS', str_replace("app/config", "public/assets", $path));

$url_tmp = str_replace("app/config", "", $path);
$url_tmp = rtrim($url_tmp, "/");
define('BASE_URL', $url_tmp);

define('DIR', __DIR__);
// echo DIR;exit;

// ROOT: http://localhost/pull-code-github/mohinh_mvc/public/
// ASSETS: http://localhost/pull-code-github/mohinh_mvc/public/assets/
//Cấu hình cổng giao dịch vnpay
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$vnp_TmnCode = "VHKWZDMW"; //Website ID in VNPAY System
$vnp_HashSecret = "IJRCDIKQIAXXALPXPOOVVMZXADGZTPXO"; //Secret key
$vnp_Url = " https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/web-banhang-mvc/cart/thankYou";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
