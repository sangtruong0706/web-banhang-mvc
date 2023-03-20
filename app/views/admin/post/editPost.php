<main id="main" class="main">

    <div class="pagetitle">
        <h1 >Cập nhật bài viết</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/login/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Cập nhật bài viết</li>
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
                foreach($postID as $key=>$pos)
                {
            ?>
                    <form class="row g-3" method="POST" action="<?= BASE_URL ?>/post/updatePost/<?=$pos['id_post']?>" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tên bài viết</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title_post" value="<?=$pos['title_post']?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="50" style="height: 100px; resize: none;" name="desc_post"><?=$pos['desc_post']?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nội dung</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="50" style="height: 100px; resize: none;" name="content_post"><?=$pos['content_post']?></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Hình ảnh</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" name="img_post">
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <p class="form" id="formFile" >
                                    <img width="100px" height="100px" src="<?= ROOT . "uploads/post/" . $pos['img_post'] ?>" alt="Chưa cập nhật ảnh">
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Danh mục</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="category_post">
                                <?php
                                    foreach($category as $key=>$cate)
                                    {
                                ?>

                                    <option  
                                    <?php if($cate['id_category_post']==$pos['id_category_post']){
                                        echo 'selected';
                                    }
                                    ?> 
                                     value="<?=$cate['id_category_post']?>"><?=$cate['title_category_post']?>
                                    </option>

                                <?php                
                                    }
                                ?>
                                
                            </select>
                        </div>
                        </div>

                        <div class="row mb-3">
                            <div class="text-center">
                                <button type="submit" name="edit_product" class="btn btn-primary">Cập nhật bài viết</button>
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