<?php
include_once('system/libs/Functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin</title>

  <!-- Favicons -->
  <link href="<?= ASSETS ?>admin/assets/img/favicon.png" rel="icon" type="image/x-icon">
  <link href="<?= ASSETS ?>admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="<?= ASSETS ?>admin/https://fonts.gstatic.com" rel="preconnect">
  <link href="<?= ASSETS ?>admin/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= ASSETS ?>admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= ASSETS ?>admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= ASSETS ?>admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= ASSETS ?>admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= ASSETS ?>admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= ASSETS ?>admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= ASSETS ?>admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= ASSETS ?>admin/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?= BASE_URL ?>/login/dashboard" class="logo d-flex align-items-center">
        <img src="<?= ROOT ?>/img/kirito.jpg" alt="">
        <span class="d-none d-lg-block">SangAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button style="display: flex;justify-content: center;align-items: center;margin-top: 7px;" type="submit" title="Search"><i class="bi bi-search fs-5"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= ROOT ?>/img/avatar.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Trương Văn Sang Em</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= BASE_URL ?>/login/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?= BASE_URL ?>/login/dashboard">
          <i class="bi bi-house-heart"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-list-ul"></i><span>Danh mục sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= BASE_URL ?>/category">
              <i class="bi bi-circle"></i><span>Thêm danh mục</span>
            </a>
          </li>
          <li>
            <a href="<?= BASE_URL ?>/category/listCategory">
              <i class="bi bi-circle"></i><span>Danh sách</span>
            </a>
          </li>

        </ul>
      </li><!-- End danh mục sản phẩm -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-boxes"></i><span>Sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= BASE_URL ?>/product/addProduct">
              <i class="bi bi-circle"></i><span>Thêm sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="<?= BASE_URL ?>/product/listProduct">
              <i class="bi bi-circle"></i><span>Danh sách sản phẩm</span>
            </a>
          </li>
        </ul>
      </li><!-- End sản phẩm-->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Danh mục bài viết</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= BASE_URL ?>/post">
              <i class="bi bi-circle"></i><span>Thêm danh mục</span>
            </a>
          </li>
          <li>
            <a href="<?= BASE_URL ?>/post/listCategory">
              <i class="bi bi-circle"></i><span>Danh sách</span>
            </a>
          </li>
        </ul>
      </li><!-- End danh mục bài viết-->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Bài viết</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= BASE_URL ?>/post/addPost">
              <i class="bi bi-circle"></i><span>Thêm bài viết</span>
            </a>
          </li>
          <li>
            <a href="<?= BASE_URL ?>/post/listPost">
              <i class="bi bi-circle"></i><span>Danh sách</span>
            </a>
          </li>
        </ul>
      </li><!-- End bài viết -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart-dash"></i><span>Đơn hàng</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= BASE_URL ?>/order">
              <i class="bi bi-circle"></i><span>Liệt kê đơn hàng</span>
            </a>
          </li>

        </ul>
      </li><!-- End Đơn hàng-->


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->