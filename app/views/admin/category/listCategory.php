<main id="main" class="main">

    <div class="pagetitle">
        <h1 >Danh sách danh mục</h1>
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
              <h5 class="card-title">Danh mục sản phẩm</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $stt=1;
                    foreach ($category as $key=>$value)
                    {
                ?>
                        <tr>
                            <th scope="row"><?=$stt?></th>
                            <td><?=$value['title_category']?></td>
                            <td><?=$value['desc_category']?></td>
                            <td>
                                <a href="<?= BASE_URL ?>/category/editCategory/<?=$value['id_category']?>"><i title="Sửa" class="bi bi-wrench"></i></a> ||
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không??')" href="<?= BASE_URL ?>/category/deleteCategory/<?=$value['id_category']?>"><i title="Xóa" class="bi bi-trash3"></i></a>
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