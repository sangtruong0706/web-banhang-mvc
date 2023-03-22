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
                        <div class="step current"> <span> <a href="#">Giỏ hàng</a></span> </div>
                        <?php
                        if (isset($_SESSION['customer'])){  
                        ?>
                            <div class="step"> <span><a href="<?=BASE_URL?>/cart/transport/<?php if(isset($_SESSION['id_customer'])){echo $_SESSION['id_customer'];}else{echo '';} ?>">Vận chuyển</a></span> </div>
                            <div class="step"> <span><a href="<?=BASE_URL?>/cart/infoPay/<?php if(isset($_SESSION['id_customer'])){echo $_SESSION['id_customer'];}else{echo '';} ?>">Thanh toán</a><span> </div>
                            <div class="step"> <span><a href="<?=BASE_URL?>/cart/historyCart/<?php if(isset($_SESSION['id_customer'])){echo $_SESSION['id_customer'];}else{echo '';} ?>">Lịch sử mua hàng</a><span> </div>
                        <?php
                        }
                        ?>
              
                    </div>
                </div>
            </div>
            <div class="clear"></div>

            <div class="box-title">
                <div class="title-bar">
                    <?php
                    if(isset($_SESSION['customer'])){
                    ?>
                    <h1>Giỏ hàng của: <?=$_SESSION['customer_name']?></h1>
                    <?php
                    }else{
                    ?>
                     <h1>Giỏ hàng </h1>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            if (!empty($_GET['msg'])) {
                $msg = unserialize(urldecode($_GET['msg']));
                foreach ($msg as $key => $value) {
                    echo '<span style="color:blue; font-weight:bold;" >' . $value . '</span>';
                }
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
                                                    <button min="1" style="box-shadow: none; margin-bottom: 5px;" class="btn btn-sm btn-warning" type="submit" value="<?= $value['product_quantity'] ?>" name="qty_minus[<?= $value['product_id'] ?>]"><i class="fa-solid fa-minus"></i></button>
                                                    <span style="margin: 0 5px;"><?= $value['product_quantity'] ?></span>
                                                    <button min="1" style="box-shadow: none; margin-bottom: 5px;" class="btn btn-sm btn-warning" type="submit" value="<?= $value['product_quantity'] ?>" name="qty_plus[<?= $value['product_id'] ?>]"><i class="fa-solid fa-plus"></i></button>
                                                   
                                                </div>
                                                <div class="clear"></div>
                                            </td>
                                            <td data-th="Thành tiền" class="text_center"><span class="color_red font_money"><?= number_format($sub_total, 0, ',', '.') . 'đ' ?></span></td>

                                            <td class="actions aligncenter" data-th="">

                                                <button style="box-shadow: none; margin-bottom: 5px;" class="btn btn-sm btn-warning" type="submit" value="<?= $value['product_id'] ?>" name="delete_cart">Xóa</button>



                                            </td>
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
                                <tr>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['customer'])) {
                                        ?>
                                            <a href="<?= BASE_URL?>/cart/transport/<?=$_SESSION['id_customer']?>">Đặt hàng</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="<?= BASE_URL ?>/customer/login">Đăng nhập để đặt hàng</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="sum_price_all">
                                            <span class="text_price">Giỏ hàng trống!!</span> <br>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr class="tr_last">
                                <td colspan="7">
                                    <a href="<?= BASE_URL ?>" class="btn_df btn_table floatleft"><i class="fa fa-long-arrow-left"></i> Tiếp tục mua hàng</a>
                                    <div class="clear"></div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- <div class="contact_form">
                    <div class="contact_left">
                        <div class="ch-contacts-details">
                            <ul class="contact-list">
                                <li class="addr">
                                    <strong class="title">Địa chỉ của chúng tôi</strong>
                                    <p><em><strong>3tmobile</strong></em><br />
                                    <p>Trung Tâm Bán Hàng:</p>
                                    <p>CN1: 333B Minh Phụng, Phường 2, Quận 11, HCM</p>
                                    <p>CN2: 548 Lý Thái Tổ, Phường 10, Quận 10, HCM</p>
                                    <p>N3: 297 Quang Trung, Phường 10, Q. Gò Vấp, HCM</p>
                                    <p> CN4: 72 Đinh Tiên Hoàng, Phường 01, Q. Bình Thạnh, HCM</p>
                                    <p> Hotline: 0888 70 8284 - 0936 11 7080 (zalo)</p>
                                    </p>
                                </li>
                            </ul>
                            <div class="hiring-box">
                                <strong class="title">Chào bạn!</strong>
                                <p>Mọi thắc mắc bạn hãy gửi về mail của chúng tôi <strong>3tmobile@webextrasite.com</strong> chúng tôi sẽ giải đáp cho bạn.</p>
                                <p><a href="." class="arrow-link"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Về trang chủ</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="contact_right">
                        <div class="form_contact_in">
                            <div class="box_contact">
                                <form name="FormDatHang" method="POST" action="<?= BASE_URL ?>/cart/checkOut">
                                    <div class="content-box_contact">
                                        <div class="row">
                                            <div class="input">
                                                <label>Họ và tên: <span style="color:red;">*</span></label>
                                                <input type="text" name="name" required class="clsip">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="input">
                                                <label>Số điện thoại: <span style="color:red;">*</span></label>
                                                <input type="text" name="phone_number" required onkeydown="return checkIt(event)" class="clsip">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="input">
                                                <label>Địa chỉ: <span style="color:red;">*</span></label>
                                                <input type="text" name="address" required class="clsip">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="input">
                                                <label>Email: <span style="color:red;">*</span></label>
                                                <input type="text" name="email" onchange="return KiemTraEmail(this);" required class="clsip">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="input">
                                                <label>Nội dung: <span style="color:red;">*</span></label>
                                                <textarea type="text" name="content" class="clsipa"></textarea>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        
                                        <div class="row btnclass">
                                            <div class="input ipmaxn ">
                                                <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Gửi đơn hàng">
                                                <input type="reset" class="btn-gui" value="Nhập lại">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                      
                                        <div class="clear"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
<div class="clear"></div>