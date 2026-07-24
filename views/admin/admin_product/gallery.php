<?php
require_once 'head.php';
$gallery = $data['gallery'];
$product_id=$data['product_id'];
$has_3d=$data['has_3d'];
$title=$data['title'];
?>
    <main class="container">
        <h1 class="text-center">سیستم مدیریت محتوای</h1>

        <div class="myrow">
            <?php require_once 'views/admin/right_menu.php'; ?>
            <div id="left" class="col-xs-12 col-sm-10">
                <div class="myrow">
                    <h2 id="caption" class="text-right">گالری برای محصول</h2>
                    <h3 class="text-right">
                        (<?= $title ?>)
                    </h3>
                </div>
                <div class="myrow text-left">
                    <button id="delete" class="btn btn-danger" <?php  if(empty($gallery)){echo 'disabled';} ?>>حذف</button>
                </div>
                <div class="myrow">
                    <form id="images" action="admin_product\delete_images\<?=$product_id;?>" method="post">
                        <table class="table table-bordered">
                            <tr>
                                <th>ردیف</th>
                                <th>نام فایل</th>
                                <th>تصویر</th>
                                <th>انتخاب</th>
                            </tr>
                            <?php
                            foreach ($gallery as $image) {
                                ?>
                                <tr>
                                    <td><?= $image['id']; ?></td>
                                    <td><?= $image['img']; ?></td>
                                    <td>
                                        <img src="public/images/products/<?= $image['product_id'] ?>/gallery/small/<?= $image['img'] ?>.jpg"
                                             class="img-responsive" width="100px"/></td>
                                    <td><input name="id[]" type="checkbox" value="<?= $image['id'] ?>"></td>
                                </tr>

                            <?php } ?>
                        </table>
                    </form>
                    <!-- Add New product -->
                    <style>
                        input[type='file']
                        {
                            width: 200px !important;
                        }
                    </style>
                    <div class="myrow text-center">
                        <form class="form-inline" method="post" enctype="multipart/form-data">
                            <label>عکس را انتخاب کنید</label>
                            <input style="display: inline" type="file" name="img">
                            <input class="btn btn-default" value="ارسال" type="submit" name="add_img">
                        </form>
                    </div>
                    <div class="myrow text-center">
                        <span style="color: red;"><?php
                            if($has_3d==true){echo 'این محصول عکس سه بعدی دارد';}else{echo 'این محصول عکس سه بعدی ندارد';}

                            ?></span>
                        <form class="form-inline" method="post" enctype="multipart/form-data">
                            <label>MTL فایل</label>
                            <input style="display: inline" type="file" name="img_mtl">
                            <label>OBJ فایل</label>
                            <input style="display: inline" type="file" name="img_obj">
                            <input class="btn btn-default" value="ثبت عکس سه بعدی" type="submit" name="add_3d_img" <?php if($has_3d==true)echo 'disabled' ?>><div style="margin-top: 30px" class="clearfix"></div>
                            <span>هر محصول فقط یک عکس سه بعدی می توان داشته باشد</span>
                            <input style="display: inline" name="delete_3d_img" value="حذف عکس سه بعدی" class="btn btn-danger" type="submit" <?php if($has_3d==false)echo 'disabled' ?>>
                        </form>
                    </div>
                    <!-- Delete image -->

                </div>
            </div>
        </div>
    </main>
    <script>
        $('#delete').click(function () {
            $('#images').submit();
        });
    </script>
<?php require_once 'footing.php' ?>