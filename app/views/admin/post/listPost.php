<main id="main" class="main">

    <div class="pagetitle">
        <h1 >Danh sách bài viết</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/login/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Bài viết</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?php
        check_message('primary');
    ?>
        <div class="card" style="font-size: 18px;">
            <div class="card-body">
              <h5 class="card-title">Danh sách bài viết</h5>

              <!-- Default Table -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên bài viết</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $stt=1;
                    foreach ($post as $key=>$pos)
                    {
                ?>
                        <tr>
                            <th scope="row"><?=$stt?></th>
                            <td><?=$pos['title_post']?></td>
                            <td><?=$pos['desc_post']?></td>
                            <td><img width="100px" height="100px" src="<?= ROOT . "uploads/post/" . $pos['img_post'] ?>" alt="Chưa cập nhật ảnh"></td>
                            <td><?=$pos['title_category_post']?></td>
                            <td>
                                <a href="<?= BASE_URL ?>/post/editPost/<?=$pos['id_post']?>"><i title="Sửa" class="bi bi-wrench"></i></a> ||
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không??') " href="<?= BASE_URL ?>/post/deletePost/<?=$pos['id_post']?>"><i title="Xóa" class="bi bi-trash3"></i></a>
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