<div class="clear"></div>
<section>
    <div class="bg_in">
        <?php
        if (!empty($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
                echo '<span style="color:blue; font-weight:bold;" >' . $value . '</span>';
            }
        }
        ?>
        <div class="contact_form">
            <form action="<?= BASE_URL ?>/customer/singUp" method="POST">
                <div class="contact_left">
                    <h3 style="margin: 20px;padding: 0;text-align: center;font-size: 24px;">Đăng kí khách hàng</h3>
                    <div class="form_contact_in">
                        <div class="box_contact">
                            <form name="FormDatHang" method="post" action="gio-hang/">
                                <div class="content-box_contact">
                                    <div class="row">
                                        <div class="input">
                                            <label>Họ và tên: <span style="color:red;">*</span></label>
                                            <input type="text" name="txtHoTen" required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                        <div class="input">
                                            <label>Số điện thoại: <span style="color:red;">*</span></label>
                                            <input type="text" name="txtDienThoai" required onkeydown="return checkIt(event)" class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                        <div class="input">
                                            <label>Địa chỉ: <span style="color:red;">*</span></label>
                                            <input type="text" name="txtDiaChi" required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                        <div class="input">
                                            <label>Email: <span style="color:red;">*</span></label>
                                            <input type="text" name="txtEmail" required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="row">
                                        <div class="input">
                                            <label>Mật khẩu: <span style="color:red;">*</span></label>
                                            <input type="text" name="txtPassword" required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row btnclass">
                                        <div class="input ipmaxn ">
                                            <input type="submit" class="btn-gui" name="singup" id="frmSubmit" value="Đăng kí">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="clear"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>

            <form action="<?= BASE_URL ?>/customer/loginCustomer" method="POST">
                <div class="contact_right">
                    <h3 style="margin: 20px;padding: 0;text-align: center;font-size: 24px;">Đăng nhập</h3>
                    <div class="form_contact_in">
                        <div class="box_contact">
                            <form name="FormDatHang" method="post" action="gio-hang/">
                                <div class="content-box_contact">
                                    <div class="row">
                                        <div class="input">
                                            <label>Email: <span style="color:red;">*</span></label>
                                            <input type="text" name="username"  required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="row">
                                        <div class="input">
                                            <label>Mật khẩu: <span style="color:red;">*</span></label>
                                            <input type="text" name="password" onchange="return KiemTraEmail(this);" required class="clsip">
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <!---row---->
                                    <div class="row btnclass">
                                        <div class="input ipmaxn ">
                                            <input type="submit" class="btn-gui" name="login" id="frmSubmit" value="Đăng nhập">

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="clear"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<div class="clear"></div>