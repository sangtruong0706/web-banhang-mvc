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
                                <td><a href="<?=BASE_URL?>/cart/detailPayment/<?php if(isset($_SESSION['id_customer'])){echo $_SESSION['id_customer'];}else{echo '';} ?>"><?= $value['order_payment'] ?></a></td>
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
        <div class="card" style="font-size: 18px;">
            <div class="card-body">
                <h5 class="card-title">Chi tiết thanh toán</h5>

                <!-- Default Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">vnp_amount</th>
                            <th scope="col">vnp_bankcode</th>
                            <th scope="col">vnp_banktranno</th>
                            <th scope="col">vnp_orderinfo</th>
                            <th scope="col">vnp_paydate</th>
                            <th scope="col">vnp_tmncode</th>
                            <th scope="col">vnp_transactionno</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($detail_vnpay as $key => $vnpay) {
                        ?>
                            <tr>
                                <td><?= $vnpay['vnp_amount'] ?></td>
                                <td><?= $vnpay['vnp_bankcode'] ?></td>
                                <td><?= $vnpay['vnp_banktranno'] ?></td>
                                <td><?= $vnpay['vnp_orderinfo'] ?></td>
                                <td><?= $vnpay['vnp_paydate'] ?></td>
                                <td><?= $vnpay['vnp_tmncode'] ?></td>
                                <td><?= $vnpay['vnp_transactionno'] ?></td>
                                
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
                <!-- End Default Table Example -->
            </div>
        </div>
    </div>
</section>