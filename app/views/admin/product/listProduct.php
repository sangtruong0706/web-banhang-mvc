<main id="main" class="main">

    <div class="pagetitle">
        <h1 >Danh sách sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/login/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Sản phẩm</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?php
        check_message('primary');
    ?>
        <div class="card" style="font-size: 18px;">
            <div class="card-body">
              <h5 class="card-title">Danh sách sản phẩm</h5>

              <!-- Default Table -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Hot</th>
                    <th scope="col">Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $stt=1;
                    foreach ($product as $key=>$value)
                    {
                ?>
                        <tr>
                            <th scope="row"><?=$stt?></th>
                            <td><?=$value['title_product']?></td>
                            <td><?= number_format($value['price_product'],0,',','.').'đ' ?></td>
                            <td><?=$value['desc_product']?></td>
                            <td><?=$value['quantity_product']?></td>
                            <td><img width="100px" height="100px" src="<?= ROOT . "uploads/product/" . $value['img_product'] ?>" alt="Chưa cập nhật ảnh"></td>
                            <td><?=$value['title_category']?></td>
                            <td><?php 
                                if($value['product_hot']==0){
                                    echo 'Không có';
                                }else{
                                    echo 'Có';
                                }
                            ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>/product/editProduct/<?=$value['id_product']?>"><i title="Sửa" class="bi bi-wrench"></i></a> ||
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không??') " href="<?= BASE_URL ?>/product/deleteProduct/<?=$value['id_product']?>"><i title="Xóa" class="bi bi-trash3"></i></a>
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