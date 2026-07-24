<?php
require_once 'head.php';
$attributes = $data['attributes'];
$title = $data['title'];
?>
    <main class="container">
        <h1 class="text-center">سیستم مدیریت محتوای</h1>
        <div class="myrow">
            <?php require_once 'views/admin/right_menu.php'; ?>
            <div id="left" class="col-xs-12 col-sm-10">
                <div class="myrow">
                    <h2 id="caption" class="text-right">مدیریت ویژه گی ها</h2>
                    <h3 class="text-right">
                        برای دسته بندی
                    </h3>
                    <span>(<?= $title; ?>)</span>
                </div>
                <div class="myrow">
                    <form id="attributes" action="admin_category/delete_attribute/<?=$attributes[0]['category_id'];?>" method="post">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>ویرایش</th>
                                <th>انتخاب</th>
                            </tr>
                            <?php
                            foreach ($attributes as $attribute) {
                                ?>
                                <tr>
                      <td class="id"><?= $attribute['id'] ?></td>
                                    <td class="title_name"><?= $attribute['title'] ?></td>
                                    <td><a class="update"><img src="public/images/icon_edit_16.png" </a></td>
                                    <td><input name="id[]" type="checkbox" value="<?= $attribute['id'] ?>"></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </form>
                    <!-- Add New Category From -->
                    <div class="myrow">
                        <form method="post" class="form-inline">
                            <input type="submit" value="افزودن" class="btn btn-primary"/>
                            <input type="text" name="title" placeholder="نام ویژه گی" class="form-control input-sm"/>

                        </form>
                    </div>
                    <!-- Delete cat -->
                    <div class="myrow">
                        <button id="delete" class="btn btn-danger">حذف</button>
                    </div>
                    <div class="myrow">
                        <!-- Update Form -->
                        <form id="update_form" method="post" class="form-inline">
                            <input name="update" type="submit" value="ثبت ویرایش" class="btn btn-primary">
                            <input id="title" value="" type="text" name="new_title" class="form-control input-sm">
                            <input id="id" name="id" type="hidden" value="<?= $attribute['id'] ?>"/>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script>
    var older_name = '';
    var new_name = '';
    $('.update').click(function () {
        new_name = $(this).parents('tr').find('.title_name').text();
        if (new_name === older_name) {
            $('#update_form').fadeOut(200);
            older_name = '';
        } else {
            $('#update_form').fadeIn(200);
            $('#update_form #title').val(new_name);
            $('#update_form #id').val($(this).parents('tr').find('.id').text());
            older_name = $(this).parents('tr').find('.title_name').text();
        }
    });
    $('#delete').click(function () {
        $('#attributes').submit();
    });
</script>
<?php require_once 'footing.php' ?>