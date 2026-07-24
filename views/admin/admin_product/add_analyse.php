<?php require_once 'head.php';
$analyse=$data['analyse'];
$product_info=$data['product_info'];
?>
<main class="container">
    <h1 class="text-center">سیستم مدیریت محتوای</h1>
    <div class="myrow">
        <?php require_once 'views/admin/right_menu.php'; ?>
        <div id="left" class="col-xs-12 col-sm-10">
            <div class="myrow">
                <h2 id="caption" class="text-right">مدیریت محصولات ها</h2>

                <h3 class="text-right">
                    <?php if (empty($analyse)) { ?>
                    اضافه کردن نقد جدید برای
                    <?php }else{ ?>
                        ویرایش نقد برای محصول
                    <?php } ?>
                </h3>
                <span>(<?=$product_info['title'];?>)</span>
            </div>
            <div class="myrow">
                <style>
                    form {
                        float: right;
                        width: 100%;
                        padding: 10px;
                    }

                </style>
                <form id="cats" action="admin_product/analysis/<?= $product_info['id']; ?>" method="post">
                    <div class="form-group">
                        <label for="name">عنوان نقد</label>
                        <input name="title" type="text" class="form-control" id="name"
                               value="<?= $analyse['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label id="upperAddress" for="introduction">بدنه</label>
                        <textarea  name="description" class="introduction" id="introduction"><?= $analyse['value']; ?></textarea>
                        <script>
                            CKEDITOR.replace('introduction',{});
                        </script>
                    </div>
                    <?php if (empty($analyse)) { ?>
                        <input style="width: 100px" name="add" type="submit" value="ثبت" class="btn btn-primary"/>
                    <?php } else { ?>
                        <input style="width: 100px" name="update" type="submit" value="بروزرسانی"
                               class="btn btn-primary"/>
                    <input type="hidden" value="<?=@$analyse['id']?>" name="id">
                    <?php } ?>


                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once 'footing.php' ?>
