<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web</title>
    <meta http-equiv="cleartype" content="on" />
    <link rel="icon" href="<?= ASSETS ?>/user/image/favicon.png" type="image/x-icon" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <!--tkw-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?= ASSETS ?>/user/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS ?>/user/css/process.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS ?>/user/css/product.css">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS ?>/user/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS ?>/user/css/owl.theme.default.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->

</head>

<body>
    <header>
        <div class="info_top">
            <div class="bg_in">
                <p class="p_infor">
                    <span><i class="fa fa-envelope-o" aria-hidden="true"></i>Email: sales@3tmobile.gmail</span>
                    <span><i class="fa fa-phone" aria-hidden="true"></i> Hotline: 0923-032-992</span>
                </p>
            </div>
        </div>
        <div class="header_top_menu">
            <div class="header_top_menu_all">
                <div class="header_top">
                    <div class="bg_in">
                        <div class="logo">
                            <a href="<?= BASE_URL ?>/index"><img src="<?= ASSETS ?>/user/image/logohere.jpeg" width="250" height="100" alt="logohere.jpeg" /></a>
                        </div>
                        <nav class="menu_top">
                            <form class="search_form" method="get" action="">
                                <input class="searchTerm" name="search" placeholder="Nhập từ cần tìm..." />
                                <button class="searchButton" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </nav>
                        <div class="cart_wrapper">
                            <div class="cols_50">
                                <div class="hot_line_top">
                                    <span><b>Trụ sở chính</b></span>
                                    <br />
                                    <span class="red">Trương Văn Sang Em</span>
                                </div>
                            </div>
                            <div class="cols_50">
                                <div class="hot_line_top">
                                    <span><b>Văn phòng chi nhánh</b></span>
                                    <br />
                                    <span class="red">
                                        <a href="<?= BASE_URL ?>/cart"><i class="fa-solid fa-cart-plus"></i></a>
                                    </span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="btn_menu_search">
                <div class="bg_in">
                    <div class="table_row_search">
                        <div class="menu_top_cate">
                            <div class="">
                                <div class="menu" id="menu_cate">
                                    <div class="menu_left">
                                        <i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm
                                    </div>
                                    <div class="cate_pro">
                                        <div id='cssmenu_flyout' class="display_destop_menu">
                                            <ul>
                                                <?php
                                                foreach ($category as $key => $value) {
                                                ?>
                                                    <li class='active has-sub'>
                                                        <a href="<?= BASE_URL ?>/userproduct/categoryProduct/<?= $value['id_category'] ?>"><span><?= $value['title_category'] ?></span></a>

                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="search_top">
                            <div id='cssmenu'>
                                <ul>
                                    <li class='active'><a href="<?= BASE_URL ?>/index">Trang chủ</a></li>
                                    <li class=''><a href="<?= BASE_URL ?>/index/contact">Giới thiệu</a></li>
                                   
                                    <li class=''><a href="<?= BASE_URL ?>/userproduct/paging/1">Sản phẩm</a></li>
                                    <li class=''>
                                        <a href="<?= BASE_URL ?>/userpost">Tin tức</a>
                                        <ul>
                                            <?php
                                            foreach ($category_post as $key => $pos) {
                                            ?>
                                                <li class='active '>
                                                    <a href="<?= BASE_URL ?>/userpost/category/<?= $pos['id_category_post'] ?>"><span><?= $pos['title_category_post'] ?></span></a>

                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>

                                    </li>

                                    <li class=''><a href="<?= BASE_URL ?>/cart">Giỏ hàng</a></li>
                                    <li class=''><a href="<?= BASE_URL ?>/index/contact">Liên hệ</a></li>
                                    <?php
                                    if (Session::get('customer')) {
                                    ?>
                                        <li class=''><a href="<?= BASE_URL ?>/customer/logout">Đăng xuất</a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li class=''><a href="<?= BASE_URL ?>/customer/login">Đăng nhập</a></li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </header>
    <div class="clear"></div>