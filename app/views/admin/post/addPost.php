<main id="main" class="main">

    <div class="pagetitle">
        <h1 >Thêm bài viết</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/login/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Thêm bài viết</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?php
        check_message('primary');
    ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
        <div class="card" style="font-size: 20px;">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- General Form Elements -->
              <form class="row g-3" method="POST" action="<?= BASE_URL ?>/post/insertPost" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tên bài viết</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title_post">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả bài viết</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="2" style="resize: none;" name="desc_post"></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Nội dung bài viết</label>
                  <div class="col-sm-10">
                    <textarea id="editor" class="form-control" style="resize: none;" name="content_post"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="img_post">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Danh mục bài viết</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="category_post">
                      <option selected>Open this category menu</option>
                        <?php
                            foreach($category as $key=>$value)
                            {
                        ?>

                            <option value="<?=$value['id_category_post']?>"><?=$value['title_category_post']?></option>

                        <?php                
                            }
                        ?>
                        
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                    <div class="text-center">
                        <button type="submit" name="add_product" class="btn btn-primary">Thêm bài viết</button>
                    </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->