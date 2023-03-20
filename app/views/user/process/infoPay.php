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
            <div class="box-title">
                <div class="container" style="margin: 15px 0;">
                    <!-- Responsive Arrow Progress Bar -->
                    <div class="arrow-steps clearfix">
                        <div class="step current"> <span> <a href="<?= BASE_URL ?>/cart/cart">Giỏ hàng</a></span> </div>
                        <div class="step current"> <span><a href="<?= BASE_URL ?>/cart/transport/<?php if (isset($_SESSION['id_customer'])) {
                                                                                                        echo $_SESSION['id_customer'];
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?>">Vận chuyển</a></span> </div>
                        <div class="step current"> <span><a href="#">Thanh toán</a><span> </div>
                        <div class="step"> <span><a href="<?= BASE_URL ?>/cart/detailCart">Chi tiết đơn hàng</a><span> </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>

            <div class="content_text">
                <?php
                if (isset($_SESSION['customer']) && isset($_SESSION['shopping_cart'])) {
                    $total = 0;
                    if (isset($_SESSION['shopping_cart'])) {
                        foreach ($_SESSION['shopping_cart'] as $key => $cus) {
                            $sub_total = $cus['product_price'] * $cus['product_quantity'];
                            $total += $sub_total;
                        }
                    }
                    foreach ($info_ship as $key => $value) {

                ?>
                        <form action="<?= BASE_URL ?>/cart/checkOut/<?php if (isset($_SESSION['id_customer'])) {
                                                                        echo $_SESSION['id_customer'];
                                                                    } else {
                                                                        echo '';
                                                                    } ?>" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4><b>Thông tin thanh toán</b></h4>
                                    <ul class="list-group">
                                        <li>
                                            <span>Họ và tên vận chuyển: <b><?= $value['name'] ?></b></span>
                                            <input type="hidden" name="name" value="<?= $value['name'] ?>">
                                        </li>
                                        <li>
                                            <span>Số điện thoại: <b><?= $value['phone'] ?></b></span>
                                            <input type="hidden" name="phone" value="<?= $value['phone'] ?>">
                                        </li>
                                        <li>
                                            <span>Địa chỉ: <b><?= $value['address'] ?></b></span>
                                            <input type="hidden" name="address" value="<?= $value['address'] ?>">
                                        </li>
                                        <li>
                                            <span>Email: <b><?= $value['email'] ?></b></span>
                                            <input type="hidden" name="email" value="<?= $value['email'] ?>">
                                        </li>
                                        <li>
                                            <span>Ghi chú: <b><?= $value['note'] ?></b></span>
                                            <input type="hidden" name="note" value="<?= $value['note'] ?>">
                                        </li>

                                    </ul>
                                </div>
                                <!-- end info -->
                                <div class="col-md-6">

                                    <h4><b>Hình thức thanh toán</b></h4>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tienmat" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Tiền mặt
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="chuyenkhoan" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Chuyển khoản
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="momo" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Momo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="vnpay" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            VN-Pay
                                        </label>
                                    </div>
                                    <p style="float: left; color: tomato;">Tổng tiền cần thanh toán: <?= number_format($total, 0, ',', '.') . 'đ'  ?></p> <br>
                                    <button type="submit" name="redirect" id="redirect" class="btn btn-warning" style="box-shadow: none;">

                                        Thanh toán ngay
                                    </button>

                                </div>
                            </div>
                        </form>

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
                } else {
                    echo "Bạn hãy mua một vài sản phẩm nhé!!";
                }
                ?>
            </div>
            <div class="clear"></div>


        </div>
    </div>
</section>
<div class="clear"></div>