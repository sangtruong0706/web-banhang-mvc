<?php
    foreach($detail_post as $key=>$pos){
        $name_breadcrumb = $pos['title_category_post'];
    }
?>
<section>
    <div class="bg_in">
        <div class="wrapper_all_main">
            <div class="wrapper_all_main_right">
                <div class="breadcrumbs">
                    <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href=".">
                                <span itemprop="name">Trang chủ</span></a>
                            <meta itemprop="position" content="1" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <span itemprop="item">
                                <strong itemprop="name">
                                    <?=$name_breadcrumb?>
                                </strong>
                            </span>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                </div>
                <!--breadcrumbs-->
                <div class="content_page">
                    <?php
                    foreach($detail_post as $key=>$detailP)
                    {
                    ?>
                        <div class="box-title">
                            <div class="title-bar">
                                <h1><?=$detailP['title_post'] ?></h1>
                            </div>
                        </div>

                        <div class="content_text">
                            <?=$detailP['content_post']?>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="clear"></div>
                </div>
                <!-- tin tuc lien quan -->
                <div class="module_pro_all">
                        <div class="box-title">
                            <div class="title-bar">
                                <h3>Tin tức liên quan</h3>
                            </div>
                        </div>
                        <div class="pro_all_gird">
                            <div class="girds_all list_all_other_page ">
                                <div class="grids">
                                    <div class="grids_in">
                                        <div class="content">
                                            <div class="img-right-pro">

                                                <a href="sanpham.php">
                                                    <img class="lazy img-pro content-image" src="<?= ASSETS ?>user/image/iphone.png" data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
                                                </a>

                                                <div class="content-overlay"></div>
                                                <div class="content-details fadeIn-top">
                                                    <ul class="details-product-overlay">
                                                        <li>Màn hình : Super Amoled 4.5k</li>
                                                        <li>Độ phân giải : 2K+(1440x3040)</li>
                                                        <li>Ram : 8GB</li>
                                                        <li>CPU : Android 9.0</li>
                                                        <li>GPU : Mali-G76 MP12</li>
                                                        <li>SSD : 512MB</li>

                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="name-pro-right">
                                                <a href="chitietsp.php">
                                                    <h3>Iphone X 64GB</h3>
                                                </a>
                                            </div>
                                            <div class="add_card">
                                                <a onclick="return giohang(579);">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Đặt hàng
                                                </a>
                                            </div>
                                            <div class="price_old_new">
                                                <div class="price">
                                                    <span class="news_price">17.800.000đ </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <!-- end tin tuc lien quan -->
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</section>