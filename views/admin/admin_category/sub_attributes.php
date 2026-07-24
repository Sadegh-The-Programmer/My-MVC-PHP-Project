<?php
$master_data = $data['master_data'];
$title = $data['title'];
$cats = $master_data['cats'];
$sub_cats = $master_data['sub_cats'];
require_once 'head.php';
?>
    <main class="container">
        <h1 class="text-center">سیستم مدیریت محتوای</h1>
        <div class="myrow">
            <?php require_once 'views/admin/right_menu.php'; ?>
            <div id="left" class="col-xs-12 col-sm-10">
                <div class="myrow">
                    <h2 id="caption" class="text-right">مدیریت زیر ویژه گی ها ویژه گی ها</h2>
                    <h3 class="text-right">
                        برای دسته بندی
                    </h3>
                    <span>(<?= $title; ?>)</span>
                </div>
                <div class="myrow">
                    <form id="sub_attributes" action="admin_category/delete_sub_attribute/<?=$sub_cats[0]['sub_category_id']?>" method="post">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>ویژه گی والد</th>
                                <th>ویرایش</th>
                                <th>انتخاب</th>
                            </tr>
                            <?php
                            $iterator = 0;
                            foreach ($sub_cats as $sub_cat) {
                                $iterator = 0;
                                $cat_name = '';
                                foreach ($cats as $cat) {
                                    $iterator++;
                                    if ($cat['id'] === $sub_cat['parent']) {
                                        $cat_name = $cat['title'];
                                        $num=$iterator;
                                    }
                                }
                                ?>
                                <tr>
                                    <td class="id"><?= $sub_cat['id'] ?></td>
                                    <td class="title_name"><?= $sub_cat['title'] ?></td>
                                    <td class="parent_name"><?= $cat_name ?></td>
                                    <td><a class="update"><img src="public/images/icon_edit_16.png"
                                                               title="<?= $num ?>"/></a></td>
                                    <td><input name="id[]" type="checkbox" value="<?= $sub_cat['id'] ?>"></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </form>
                    <!-- Add New Category From -->
                    <div class="myrow">
                        <form method="post" class="form-inline">
                            <input type="submit" value="افزودن" class="btn btn-primary"/>
                            <input type="text" name="title" placeholder="نام ویژه گی" class="form-control input-sm"/>
                            <label>ویژه گی والد</label>
                            <select name="parent">
                                <?php

                                foreach ($cats as $cat) { ?>
                                    <option value="<?= $cat['id']; ?>">
                                        <?= $cat['title']; ?>
                                    </option>
                                    <?php

                                }
                                ?>
                            </select>
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
                            <select id="new_parent" name="new_parent">
                                <?php
                                foreach ($cats as $cat) { ?>
                                    <option value="<?= $cat['id']; ?>">
                                        <?= $cat['title']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input id="id" name="id" type="text" value="<?= $attribute['id'] ?>"/>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        var older_name = '';
        var new_name = '';
        var new_parent = '';
        $('.update').click(function () {
            new_name = $(this).parents('tr').find('.title_name').text();

            if (new_name === older_name) {
                $('#update_form').fadeOut(200);
                older_name = '';
            } else {
                $('#update_form').fadeIn(200);
                $('#update_form #title').val(new_name);
                $('#update_form #id').val($(this).parents('tr').find('.id').text());
                $('#update_form #new_parent').val($(this).find('img').attr('title'));

                //
                older_name = $(this).parents('tr').find('.title_name').text();

            }

        });
        $('#delete').click(function () {
            $('#sub_attributes').submit();
        });
    </script>
<?php require_once 'footing.php' ?>