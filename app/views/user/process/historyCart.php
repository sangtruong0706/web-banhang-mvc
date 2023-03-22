
<section>
    <div class="bg_in">
        <div class="card" style="font-size: 18px;">
            <div class="card-body">
                <h5 class="card-title">Lịch sử mua hàng</h5>

                <!-- Default Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Hình thức thanh toán</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 1;
                        foreach ($history_cart as $key => $value) {
                        ?>
                            <tr>
                                <th scope="row"><?= $stt ?></th>
                                <td><?= $value['order_code'] ?></td>
                                <td><?= $value['order_date'] ?></td>
                                <td>
                                    <?php if ($value['order_status'] == 0) {
                                        echo 'Đang chờ xử lý';
                                    } else {
                                        echo "Đã được xử lý";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($value['order_payment']=='vnpay'){
                                    ?>
                                    <a href="<?=BASE_URL?>/cart/detailPayment/<?php if(isset($_SESSION['id_customer'])){echo $_SESSION['id_customer'];}else{echo '';} ?>"><?= $value['order_payment'] ?></a>
                                    <?php
                                        }else{echo $value['order_payment'];}
                                    ?>
                                    
                                    
                                </td>
                                <td>
                                    <a href="<?= BASE_URL ?>/cart/detailCart/<?= $value['order_code'] ?>">Xem chi tiết</a>

                                </td>
                            </tr>
                        <?php
                            $stt++;
                        }
                        ?>

                    </tbody>
                </table>
                <!-- End Default Table Example -->
            </div>
        </div>
    </div>
</section>