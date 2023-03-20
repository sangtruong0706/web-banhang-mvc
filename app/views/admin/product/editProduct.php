<main id="main" class="main">

    <div class="pagetitle">
        <h1>Cập nhật sản phẩm</h1>
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

                        <?php
                        foreach ($productID as $key => $value) {
                        ?>
                            <form class="row g-3" method="POST" action="<?= BASE_URL ?>/product/updateProduct/<?= $value['id_product'] ?>" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title_product" value="<?= $value['title_product'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Giá sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="price_product" value="<?= $value['price_product'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="50" style="height: 100px; resize: none;" name="desc_product"><?= $value['desc_product'] ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Số lượng</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="quantity_product" value="<?= $value['quantity_product'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="formFile" name="img_product">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <p class="form" id="formFile">
                                                <img width="100px" height="100px" src="<?= ROOT . "uploads/product/" . $value['img_product'] ?>" alt="Chưa cập nhật ảnh">
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Danh mục</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="category_product">
                                            <?php
                                            foreach ($category as $key => $cate) {
                                            ?>

                                                <option <?php if ($cate['id_category'] == $value['id_category']) {
                                                            echo 'selected';
                                                        }
                                                        ?> value="<?= $cate['id_category'] ?>"><?= $cate['title_category'] ?>
                                                </option>

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
                                            <?php
                                            if ($value['product_hot'] == 0) {
                                            ?>
                                                <option selected value="0">Không</option>
                                                <option value="1">Có</option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="0">Không</option>
                                                <option selected value="1">Có</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="text-center">
                                        <button type="submit" name="edit_product" class="btn btn-primary">Cập nhật sản phẩm</button>
                                    </div>
                                </div>

                            </form>
                        <?php
                        }
                        ?>

                    </div>
                </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->