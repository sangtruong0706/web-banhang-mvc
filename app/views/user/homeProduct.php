<div class="clear"></div>
<section>

    <div class="bg_in">
        <div class="breadcrumbs">

            <ol itemscope itemtype="http://schema.org/BreadcrumbList">

                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">

                    <a itemprop="item" href="<?= BASE_URL ?>/index">

                        <span itemprop="name">Trang chủ</span></a>

                    <meta itemprop="position" content="1" />

                </li>

                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">

                    <a itemprop="item" href="sanpham.php">

                        <span itemprop="name">Tất cả sản phẩm</span></a>

                    <meta itemprop="position" content="2" />

                </li>


            </ol>

        </div><!-- end breadcrumbs -->

        <div class="module_pro_all">
            <div class="box-title">
                <div class="title-bar">
                    <h1>Tất cả sản phẩm</h1>
                </div>
            </div><!-- end box title -->

            <div class="pro_all_gird">
                <div class="girds_all list_all_other_page ">

                    <?php
                    foreach ($all_product as $key => $pro) {
                    ?>
                        <form action="<?= BASE_URL ?>/cart/addCart" method="POST" data>
                            <input type="hidden" value="<?= $pro['id_product'] ?>" name="product_id">
                            <input type="hidden" value="<?= $pro['title_product'] ?>" name="product_title">
                            <input type="hidden" value="<?= $pro['img_product'] ?>" name="product_image">
                            <input type="hidden" value="<?= $pro['price_product'] ?>" name="product_price">
                            <input type="hidden" value="1" name="product_quantity">


                            <div class="grids">
                                <div class="grids_in">
                                    <div class="content">
                                        <div class="img-right-pro">

                                            <a href="<?= BASE_URL ?>/userproduct/detailProduct/<?= $pro['id_product'] ?>">
                                                <img class="lazy img-pro content-image" src="<?= ROOT ?>/uploads/product/<?= $pro['img_product'] ?>" data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
                                            </a>

                                            <div class="content-overlay"></div>
                                            <div class="content-details fadeIn-top">
                                                <?= $pro['desc_product'] ?>

                                            </div>
                                        </div>
                                        <div class="name-pro-right">
                                            <a href="<?= BASE_URL ?>/userproduct/detailProduct/<?= $pro['id_product'] ?>">
                                                <h3><?= $pro['title_product'] ?></h3>
                                            </a>
                                        </div>
                                        <div class="add_card">
                                            <input type="submit" style="box-shadow:none" class="btn" value="Đặt hàng" name="add_cart">
                                        </div>
                                        <div class="price_old_new">
                                            <div class="price">
                                                <span class="news_price"><?= number_format($pro['price_product'], 0, ',', '.') . 'đ' ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                    }
                    ?>

                    <div class="clear"></div>
                    <div class="box-title">
                        <nav style="float: right;">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 1; $i <= $page; $i++) {
                                ?>
                                    <li><a href="<?=BASE_URL?>/userproduct/paging/<?=$i?>"><?=$i?></a></li>
                                <?php
                                }
                                ?>

                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>


</section>