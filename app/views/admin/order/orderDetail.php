<main id="main" class="main">

    <div class="pagetitle">
        <h1>Chi tiết đơn hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/login/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Chi tiết</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?php
    check_message('primary');
    ?>
    <div class="card" style="font-size: 18px;">
        <div class="card-body">
            <h5 class="card-title">Thông tin khách hàng</h5>

            <!-- Default Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 1;
                    foreach ($order_info as $key => $info) {
                    ?>
                        <tr>
                            <th scope="row"><?= $stt ?></th>
                            <td><?= $info['name'] ?></td>
                            <td><?= $info['phone_number'] ?></td>
                            <td><?= $info['address'] ?></td>
                            <td><?= $info['email'] ?></td>
                            <td><?= $info['content'] ?></td>

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
            <h5 class="card-title">Chi tiết đơn hàng</h5>

            <!-- Default Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 1;
                    $total = 0;
                    foreach ($order_detail as $key => $ord) {
                        $total += $ord['product_quantity'] * $ord['price_product'];
                    ?>
                        <tr>
                            <th scope="row"><?= $stt ?></th>
                            <td><?= $ord['title_product'] ?></td>
                            <td><img width="100px" height="100px" src="<?= ROOT . "uploads/product/" . $ord['img_product'] ?>" alt="Chưa cập nhật ảnh"></td>
                            <td><?= $ord['product_quantity'] ?></td>
                            <td><?= number_format($ord['price_product'], 0, ',', '.') . 'đ' ?></td>
                            <td><?= number_format($ord['product_quantity'] * $ord['price_product'], 0, ',', '.') . 'đ' ?></td>

                            <td>
                                <!-- <a href="<?= BASE_URL ?>/order/orderDetail/<?= $ord['order_code'] ?>"><i title="Xem chi tiết" class="bi bi-eye"></i></a> -->

                            </td>
                        </tr>
                    <?php
                        $stt++;
                    }
                    ?>
                    <form action="<?= BASE_URL ?>/order/orderConfirm/<?=$ord['order_code']?>" method="POST">
                        <tr>
                            <td style="text-align: right;" colspan="6">Tổng tiền: <?= number_format($total, 0, ',', '.') . 'đ' ?> </td>
                            <td>
                                <div class="text-center" style="margin-top: 0px;">
                                    <button type="submit" name="update_order" class="btn btn-primary">Xử lý đơn hàng</button>
                                </div>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>



</main><!-- End #main -->