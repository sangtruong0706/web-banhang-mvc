<section>
    <div class="bg_in">
        <div class="module_pro_all">
            <div class="box-title">
                <div class="title-bar">
                    <h1>Sản phẩm HOT</h1>
                    <a class="read_more" href="sanpham.php">
                        Xem thêm
                    </a>
                </div>
            </div>
            <div class="pro_all_gird">
                <div class="girds_all list_all_other_page ">
                    <?php
                    foreach ($product_hot as $key => $pro) {
                        
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
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        foreach ($category as $key => $cate) {
            if ($cate != '') {
        ?>
                <div class="module_pro_all">
                    <div class="box-title">
                        <div class="title-bar">
                            <h1><?= $cate['title_category'] ?></h1>
                            <a class="read_more" href="sanpham.php">
                                Xem thêm
                            </a>
                        </div>
                    </div>
                    <div class="pro_all_gird">
                        <div class="girds_all list_all_other_page ">
                            <?php
                            foreach ($product as $key => $pro_cate) {
                                if ($cate['id_category'] == $pro_cate['id_category']) {
                            ?>
                                    <form action="<?= BASE_URL ?>/cart/addCart" method="POST" data>
                                        <input type="hidden" value="<?= $pro_cate['id_product'] ?>" name="product_id">
                                        <input type="hidden" value="<?= $pro_cate['title_product'] ?>" name="product_title">
                                        <input type="hidden" value="<?= $pro_cate['img_product'] ?>" name="product_image">
                                        <input type="hidden" value="<?= $pro_cate['price_product'] ?>" name="product_price">
                                        <input type="hidden" value="1" name="product_quantity">


                                        <div class="grids">
                                            <div class="grids_in">
                                                <div class="content">
                                                    <div class="img-right-pro">

                                                        <a href="<?= BASE_URL ?>/userproduct/detailProduct/<?= $pro_cate['id_product'] ?>">
                                                            <img class="lazy img-pro content-image" src="<?= ROOT ?>/uploads/product/<?= $pro_cate['img_product'] ?>" data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
                                                        </a>

                                                        <div class="content-overlay"></div>
                                                        <div class="content-details fadeIn-top">
                                                            <?= $pro_cate['desc_product'] ?>

                                                        </div>
                                                    </div>
                                                    <div class="name-pro-right">
                                                        <a href="<?= BASE_URL ?>/userproduct/detailProduct/<?= $pro_cate['id_product'] ?>">
                                                            <h3><?= $pro_cate['title_product'] ?></h3>
                                                        </a>
                                                    </div>
                                                    <div class="add_card">
                                                        <input type="submit" style="box-shadow:none" class="btn" value="Đặt hàng" name="add_cart">
                                                    </div>
                                                    <div class="price_old_new">
                                                        <div class="price">
                                                            <span class="news_price"><?= number_format($pro_cate['price_product'], 0, ',', '.') . 'đ' ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            <?php
                                }
                            }
                            ?>

                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
        <?php
            }
        }
        ?>


</section>
<!--end:body-->
<div class="clear"></div>