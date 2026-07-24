<?php require_once 'head.php';
$sub_categories = $data[0];
$colors = $data[1];
$guarantees = $data[2];
$product = $data[3];
$color_for_product = $data[4];
$guarantee_for_product = $data[5];
?>
<style>
    .pic_img {
        display: block;
        border-radius: 30px;
        margin: 10px auto;
    }
</style>
<main class="container">
    <h1 class="text-center">سیستم مدیریت محتوای</h1>
    <div class="myrow">
        <?php require_once 'views/admin/right_menu.php'; ?>
        <div id="left" class="col-xs-12 col-sm-10">
            <div class="myrow">
                <h2 id="caption" class="text-right">مدیریت محصولات ها</h2>

                <h3 class="text-right">
                    <?php if (empty($product)) {
                        echo 'اضافه کردن محصول جدید';
                    } else {
                        echo 'بروزرسانی محصول';
                    }

                    ?>


                </h3>
            </div>
            <div class="myrow">
                <style>
                    form {
                        float: right;
                        width: 100%;
                        padding: 10px;
                    }

                </style>
                <form enctype="multipart/form-data" action="admin_product/index" method="post">
                    <div class="form-group">
                        <label for="name">نام محصول</label>
                        <input name="title" type="text" class="form-control" id="name"
                               value="<?= $product['title']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="price">قیمت</label>
                        <input name="price" type="text" class="form-control" id="pic"
                               value="<?= $product['price']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pic1">تصویر اول</label>
                        <input title="img1" name="pic1" type="file" class="profile-img" id="pic1">
                        <img id="img1" class="pic_img" src="<?php if($product){echo 'public/images/products/'.$product['id'].'/medium/product3.jpg';} ?>"  width="200px"/>
                    </div>
                    <div class="form-group">
                        <label for="pic2">تصویر دوم</label>
                        <input title="img2" name="pic2" type="file" class="profile-img" id="pic2">
                        <img id="img2" class="pic_img" src="<?php if($product){echo 'public/images/products/'.$product['id'].'/medium/product2.jpg';} ?>" width="200px"/>
                    </div>
                    <div class="form-group">
                        <label for="pic3">تصویر سوم</label>
                        <input title="img3" name="pic3" type="file" class="profile-img" id="pic3">
                        <img id="img3" class="pic_img" src="<?php if($product){echo 'public/images/products/'.$product['id'].'/medium/product1.jpg';} ?>"  width="200px"/>
                    </div>
                    <script type="text/javascript">
                        function readURL(input,str) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                   $('#'+str).attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $(".profile-img").change(function () {
                            readURL(this,$(this).attr('title'));
                        });
                    </script>

                    <div class="form-group">
                        <label for="mojodi">موجودی</label>
                        <input name="mojodi" type="text" class="form-control" id="mojodi"
                               value="<?= $product['mojodi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="discount">تخفیف</label>
                        <input style="width: 30%;display: inline-block;margin-left: 10px;" name="discount" type="text"
                               class="form-control" id="discount"
                               value="<?= $product['discount']; ?>"><span>بر حسب درصد</span>
                    </div>

                    <div class="form-group">
                        <label>دسته</label>
                        <select name="cat">
                            <?php
                            foreach ($sub_categories as $cat) { ?>
                                <option value="<?= $cat['id']; ?>" <?php if ($cat['id'] === $product['cat']) echo 'selected' ?>>
                                    <?= $cat['title']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>رنگ ها</label>
                        <select>
                            <?php

                            foreach ($colors as $color) { ?>
                                <option value="<?= $color['id']; ?>" title="<?= $color['hex'] ?>"
                                        onclick=add_color("<?= $color['name']; ?>",this,<?= $color['id']; ?>)>
                                    <?= $color['name']; ?>
                                </option>
                                <?php

                            }
                            ?>
                        </select>
                        <style>
                            .span_item {
                                padding: 5px 20px 5px 25px;
                                display: inline-block;
                                height: 28px;
                                color: #040a61;
                                background-color: #00b4a6;
                                text-align: right;
                                margin: 0 5px;
                                font-size: 10pt;
                                position: relative;
                            }

                            .span_item img {
                                left: 2px;
                                width: 15px;
                                height: 15px;
                                position: absolute;
                                border-radius: 50%;
                            }

                        </style>
                        <!-- Colors for Update -->
                        <?php foreach ($color_for_product as $cfp) {
                            foreach ($colors as $color) {
                                if ($cfp['color_id'] === $color['id']) {
                                    $my_color = $color['name'];
                                    $my_hex = $color['hex'];
                                    break;
                                }
                            }
                            ?>
                            <span style="background-color:#<?= $my_hex ?>" class="span_item"><input type="hidden"
                                                                                                    name="color[]"
                                                                                                    value="<?= $cfp['color_id']; ?>"><img
                                        onclick="remove_Item(this)"
                                        src="public/images/Delete.gif"/><?= $my_color ?></span>
                        <?php } ?>
                        <!-- End Color for Update -->
                    </div>
                    <div class="form-group">
                        <label>گارانتی ها</label>
                        <select>
                            <?php
                            foreach ($guarantees as $guarantee) { ?>
                                <option value="<?= $guarantee['id']; ?>" data-title="<?= $guarantee['name'] ?>"
                                        onclick=add_garanty(this,<?= $guarantee['id']; ?>)>
                                    <?= $guarantee['name']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <!-- guarantees for Update -->
                        <?php foreach ($guarantee_for_product as $gfp) {
                            foreach ($guarantees as $guarantee) {
                                if ($gfp['guarantees_id'] === $guarantee['id']) {
                                    $my_name = $guarantee['name'];
                                    break;
                                }
                            }
                            ?>
                            <span class="span_item"><input type="hidden" name="guarantee[]"
                                                           value="<?= $gfp['guarantees_id']; ?>"><img
                                        onclick="remove_garanty_Item(this)"
                                        src="public/images/Delete.gif"/><?= $my_name ?></span>
                        <?php } ?>
                        <!-- End guarantees for Update -->
                    </div>
                    <div class="form-group">
                        <label id="upperAddress" for="introduction">مشخصات</label>
                        <textarea name="description" class="introduction"
                                  id="introduction"><?= $product['introduction']; ?></textarea>
                        <script>
                            CKEDITOR.replace('introduction', {});
                        </script>
                    </div>
                    <?php if (empty($product)) { ?>
                        <input style="width: 100px" name="add" type="submit" value="ثبت" class="btn btn-primary"/>
                    <?php } else { ?>
                        <input style="width: 100px" name="update" type="submit" value="بروزرسانی"
                               class="btn btn-primary"/>
                        <input type="hidden" value="<?= $product['id']; ?>" name="id">
                    <?php } ?>


                </form>
            </div>
        </div>
    </div>
</main>
<script>
    var colorItems = [];
    var garantyItems = [];

    function add_color(color_name, tag, color_id) {

        var option_tag = $(tag);
        var parent = option_tag.parents('.form-group');
        var hex = '#' + option_tag.attr('title');

        var new_span = `<span style=background-color:${hex} class="span_item"><input type="hidden" name="color[]" value="${color_id}"><img onclick="remove_Item(this)" src="public/images/Delete.gif"/>${color_name}</span>`;

        if (!colorItems.includes(color_id)) {
            parent.append(new_span);
            colorItems.push(color_id);
        }
        console.log(colorItems);

    }

    function remove_Item(tag) {
        var remove_tag = $(tag);
        var parent = remove_tag.parents('.span_item');

        console.log(colorItems);
        var id = parent.find('input').attr('value');
        console.log(id);
        var index = colorItems.indexOf(parseInt(id));
        console.log(index);
        if (index > -1) {
            colorItems.splice(index, 1);
        }
        parent.remove();
    }

    //خود این تابع نباید داخل " باشد
    //onclick=add_color('رنگ',this) => این حالت صحیح است
    function add_garanty(tag, garanty_id) {

        var option_tag = $(tag);
        var parent = option_tag.parents('.form-group');
        var garanty_name = option_tag.attr('data-title');

        var new_span = `<span class="span_item"><input type="hidden" name="guarantee[]" value="${garanty_id}"><img onclick="remove_garanty_Item(this)" src="public/images/Delete.gif"/>${garanty_name}</span>`;

        if (!garantyItems.includes(garanty_id)) {
            parent.append(new_span);
            garantyItems.push(garanty_id);
        }


    }

    function remove_garanty_Item(tag) {
        var remove_tag = $(tag);
        var parent = remove_tag.parents('.span_item');

        var id = parent.find('input').attr('value');
        var index = garantyItems.indexOf(parseInt(id));
        if (index > -1) {
            garantyItems.splice(index, 1);
        }
        parent.remove();
    }


</script>
<?php require_once 'footing.php' ?>
