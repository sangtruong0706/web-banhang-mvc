<main id="main" class="main">

    <div class="pagetitle">
        <h1>Danh sách đơn hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/login/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Danh sách</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?php
    check_message('primary');
    ?>
    <div class="card" style="font-size: 18px;">
        <div class="card-body">
            <h5 class="card-title">Danh sách đơn hàng</h5>

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
                    foreach ($order as $key => $value) {
                    ?>
                        <tr>
                            <th scope="row"><?= $stt ?></th>
                            <td><?= $value['order_code'] ?></td>
                            <td><?= $value['order_date'] ?></td>
                            <td>
                                <?php if ($value['order_status'] == 0) {
                                    echo 'Đơn hàng mới';
                                } else {
                                    echo "Đã xử lý";
                                }
                                ?>
                            </td>
                            <td><?= $value['order_payment'] ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>/order/orderDetail/<?= $value['order_code'] ?>"><i title="Xem chi tiết" class="bi bi-eye"></i></a>

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



</main><!-- End #main -->