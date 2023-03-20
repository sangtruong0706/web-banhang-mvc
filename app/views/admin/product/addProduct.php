<main id="main" class="main">

    <div class="pagetitle">
        <h1 >Thêm sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/login/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
              <form class="row g-3" method="POST" action="<?= BASE_URL ?>/product/insertProduct" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title_product">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Giá sản phẩm</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="price_product">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả</label>
                  <div class="col-sm-10">
                    <textarea id="editor" class="form-control" rows="50" style="height: 100px; resize: none;" name="desc_product"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Số lượng</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="quantity_product">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="img_product">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Danh mục</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="category_product">
                      <option selected>Open this category menu</option>
                        <?php
                            foreach($category as $key=>$value)
                            {
                        ?>

                            <option value="<?=$value['id_category']?>"><?=$value['title_category']?></option>

                        <?php                
                            }
                        ?>
                        
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Sản phẩm hot</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="product_hot">
                      <option selected>Open this category menu</option>
                      <option value="0">Không</option>
                      <option value="1">Có</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                    <div class="text-center">
                        <button type="submit" name="add_product" class="btn btn-primary">Thêm sản phẩm</button>
                    </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->