<main id="main" class="main">

    <div class="pagetitle">
        <h1 >Cập nhật danh mục sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/login/dashboard">Home</a></li>
                <li class="breadcrumb-item active"> Cập nhật</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?php
        check_message('primary');
    ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- No Labels Form -->
                        <?php
                            foreach ($categoryID as $key=>$value)
                            {
                        ?>
                                <form autocomplete="off" class="row g-3" method="POST" action="<?= BASE_URL ?>/category/updateCategory/<?=$value['id_category']?>">
                                    <div class="col-md-12 my-4">
                                        <input type="text" name="title_category" class="form-control" placeholder="Tên danh mục" value="<?=$value['title_category']?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" name="desc_category" class="form-control" placeholder="Mô tả" value="<?=$value['desc_category']?>">                    
                                    </div>
                                    <div class="text-center" style="margin-top: 70px;">
                                        <button type="submit" name="editproduct_cate" class="btn btn-primary">Cập nhật danh mục</button>
                                    </div>
                                </form><!-- End No Labels Form -->
                        <?php
                            }
                        ?>

                    </div>
                </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->