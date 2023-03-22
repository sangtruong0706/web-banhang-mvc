<section>
    <div class="bg_in">
        <div class="content_page cart_page">
            <div class="breadcrumbs">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?= BASE_URL ?>">
                            <span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <span itemprop="item">
                            <strong itemprop="name">
                                Giỏ hàng
                            </strong>
                        </span>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </div>
            <?php
            if (!empty($_GET['msg'])) {
                $msg = unserialize(urldecode($_GET['msg']));
                foreach ($msg as $key => $value) {
                    echo '<span style="color:blue; font-weight:bold;" >' . $value . '</span>';
                }
            }
            ?>
            <div class="box-title">
                <div class="container" style="margin: 15px 0;">
                    <!-- Responsive Arrow Progress Bar -->
                    <div class="arrow-steps clearfix">
                        <div class="step current"> <span> <a href="<?= BASE_URL ?>/cart/cart">Giỏ hàng</a></span> </div>
                        <div class="step current"> <span><a href="#">Vận chuyển</a></span> </div>
                        <div class="step"> <span><a href="<?= BASE_URL ?>/cart/infoPay/<?php if (isset($_SESSION['id_customer'])) {
                                                                                            echo $_SESSION['id_customer'];
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>">Thanh toán</a><span> </div>
                        <div class="step"> <span><a href="<?=BASE_URL?>/cart/historyCart/<?php if(isset($_SESSION['id_customer'])){echo $_SESSION['id_customer'];}else{echo '';} ?>">Lịch sử mua hàng</a><span> </div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>

            <div class="content_text">
                <?php
                // if(!empty($info_ship)){
                //     echo "có giá trị";
                // }else{
                //     echo "mảng rỗng";
                // }
                // print_r($info_ship);exit;
                if (isset($_SESSION['customer']) && isset($_SESSION['shopping_cart']) && !empty($info_ship)) {
                    foreach ($info_ship as $key => $value) {
                ?>
                        <form action="<?= BASE_URL ?>/cart/handlingShipping/<?php if (isset($_SESSION['id_customer'])) {
                                                                                echo $_SESSION['id_customer'];
                                                                            } else {
                                                                                echo '';
                                                                            } ?>" method="POST">
                            <div class="form-group">
                                <label for="first_name">Họ và tên</label>
                                <input type="text" class="form-control" name="name" value="<?= $value['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" value="<?= $value['phone'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="<?= $value['address'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Email</label>
                                <input type="text" class="form-control" name="email" value="<?= $value['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Ghi chú</label>
                                <input type="text" class="form-control" name="note" value="<?= $value['note'] ?>">
                            </div>
                            <?php
                            if ($value['name'] == '' && $value['phone'] == '') {
                            ?>
                                <button type="submit" name="add_transport" class="btn btn-success" style="box-shadow: none;">Thêm vận chuyển</button>
                            <?php
                            } else {
                            ?>
                                <button type="submit" name="update_transport" class="btn btn-success" style="box-shadow: none;">
                                    <input type="hidden" name="id_ship" value="<?= $value['id_shipping'] ?>">
                                    Cập nhật vận chuyển
                                </button>
                            <?php
                            }
                            ?>
                        </form>
                        <div class="row">
                            <div class="step-thanhtoan"> <span><a class="btn-thanhtoan" href="<?= BASE_URL ?>/cart/infoPay/<?php if (isset($_SESSION['id_customer'])) {
                                                                                                                                echo $_SESSION['id_customer'];
                                                                                                                            } else {
                                                                                                                                echo '';
                                                                                                                            } ?>">Thanh toán</a><span> </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="content_text">
                        <div class="container_table">
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr class="tr tr_first">
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th style="width:100px;">Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th style="width:50px; text-align:center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['shopping_cart'])) {
                                    ?>
                                        <form action="<?= BASE_URL ?>/cart/updateCart" method="POST">
                                            <?php
                                            $total = 0;
                                            $cart = $_SESSION['shopping_cart'];
                                            foreach ($cart as $key => $value) {
                                                $sub_total = $value['product_price'] * $value['product_quantity'];
                                                $total += $sub_total;
                                            ?>
                                                <tr class="tr">
                                                    <td data-th="Hình ảnh">
                                                        <div class="col_table_image col_table_hidden-xs"><img src="<?= ROOT ?>/uploads/product/<?= $value['product_image'] ?>" class="img-responsive" /></div>
                                                    </td>
                                                    <td data-th="Sản phẩm">
                                                        <div class="col_table_name">
                                                            <h4 class="nomargin"><?= $value['product_title'] ?></h4>
                                                        </div>
                                                    </td>
                                                    <td data-th="Giá"><span class="color_red font_money"><?= number_format($value['product_price'], 0, ',', '.') . 'đ' ?></span></td>

                                                    <td data-th="Số lượng">
                                                        <div class="clear margintop5" style="display: flex; justify-content: center; align-items: center;">

                                                            <!-- <button min="1" style="box-shadow: none; margin-bottom: 5px;" class="btn btn-sm btn-warning" type="submit" value="<?= $value['product_quantity'] ?>" name="qty_plus[<?= $value['product_id'] ?>]"><i class="fa-solid fa-plus"></i></button> -->
                                                            <span style="margin: 0 5px;"><?= $value['product_quantity'] ?></span>
                                                            <!-- <button min="1" style="box-shadow: none; margin-bottom: 5px;" class="btn btn-sm btn-warning" type="submit" value="<?= $value['product_quantity'] ?>" name="qty_minus[<?= $value['product_id'] ?>]"><i class="fa-solid fa-minus"></i></button> -->
                                                        </div>
                                                        <div class="clear"></div>
                                                    </td>
                                                    <td data-th="Thành tiền" class="text_center"><span class="color_red font_money"><?= number_format($sub_total, 0, ',', '.') . 'đ' ?></span></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </form>
                                        <tr>
                                            <td colspan="7" class="textright_text">
                                                <div class="sum_price_all">
                                                    <span class="text_price">Tổng tiền thanh toán</span>:
                                                    <span class="text_price color_red"><?= number_format($total, 0, ',', '.') . 'đ' ?></span>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php
                } else if (isset($_SESSION['customer']) && isset($_SESSION['shopping_cart']) && empty($info_ship)) {
                ?>
                    <form action="<?= BASE_URL ?>/cart/handlingShipping/<?php if (isset($_SESSION['id_customer'])) {
                                                                            echo $_SESSION['id_customer'];
                                                                        } else {
                                                                            echo '';
                                                                        } ?>" method="POST">
                        <div class="form-group">
                            <label for="first_name">Họ và tên</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Địa chỉ</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Ghi chú</label>
                            <input type="text" class="form-control" name="note">
                        </div>

                        <button type="submit" name="add_transport" class="btn btn-success" style="box-shadow: none;">Thêm vận chuyển</button>


                    </form>
                    <div class="row">
                    <div class="step-thanhtoan"> <span><a class="btn-thanhtoan" href="<?= BASE_URL ?>/cart/infoPay/<?php if (isset($_SESSION['id_customer'])) {
                                                                                                                            echo $_SESSION['id_customer'];
                                                                                                                        } else {
                                                                                                                            echo '';
                                                                                                                        } ?>">Thanh toán</a><span> </div>
                        
                    </div>
                    <div class="content_text">
                        <div class="container_table">
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr class="tr tr_first">
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th style="width:100px;">Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th style="width:50px; text-align:center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['shopping_cart'])) {
                                    ?>
                                        <form action="<?= BASE_URL ?>/cart/updateCart" method="POST">
                                            <?php
                                            $total = 0;
                                            $cart = $_SESSION['shopping_cart'];
                                            foreach ($cart as $key => $value) {
                                                $sub_total = $value['product_price'] * $value['product_quantity'];
                                                $total += $sub_total;
                                            ?>
                                                <tr class="tr">
                                                    <td data-th="Hình ảnh">
                                                        <div class="col_table_image col_table_hidden-xs"><img src="<?= ROOT ?>/uploads/product/<?= $value['product_image'] ?>" class="img-responsive" /></div>
                                                    </td>
                                                    <td data-th="Sản phẩm">
                                                        <div class="col_table_name">
                                                            <h4 class="nomargin"><?= $value['product_title'] ?></h4>
                                                        </div>
                                                    </td>
                                                    <td data-th="Giá"><span class="color_red font_money"><?= number_format($value['product_price'], 0, ',', '.') . 'đ' ?></span></td>

                                                    <td data-th="Số lượng">
                                                        <div class="clear margintop5" style="display: flex; justify-content: center; align-items: center;">

                                                            <!-- <button min="1" style="box-shadow: none; margin-bottom: 5px;" class="btn btn-sm btn-warning" type="submit" value="<?= $value['product_quantity'] ?>" name="qty_plus[<?= $value['product_id'] ?>]"><i class="fa-solid fa-plus"></i></button> -->
                                                            <span style="margin: 0 5px;"><?= $value['product_quantity'] ?></span>
                                                            <!-- <button min="1" style="box-shadow: none; margin-bottom: 5px;" class="btn btn-sm btn-warning" type="submit" value="<?= $value['product_quantity'] ?>" name="qty_minus[<?= $value['product_id'] ?>]"><i class="fa-solid fa-minus"></i></button> -->
                                                        </div>
                                                        <div class="clear"></div>
                                                    </td>
                                                    <td data-th="Thành tiền" class="text_center"><span class="color_red font_money"><?= number_format($sub_total, 0, ',', '.') . 'đ' ?></span></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </form>
                                        <tr>
                                            <td colspan="7" class="textright_text">
                                                <div class="sum_price_all">
                                                    <span class="text_price">Tổng tiền thanh toán</span>:
                                                    <span class="text_price color_red"><?= number_format($total, 0, ',', '.') . 'đ' ?></span>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                }else{echo "Bạn hãy mua một vài sản phẩm nhé!";}
                ?>
            </div>
            <div class="clear"></div>


        </div>
    </div>
</section>
<div class="clear"></div>