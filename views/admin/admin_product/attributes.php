<?php require_once 'head.php';
$attributes = $data['attributes'];
$title = $data['title'];
$cat=$data['cat'];
$header_attr = $attributes[1];
$attrs = $attributes[0];
$product_id = $data['product_id'];
?>
    <main class="container-fluid">
        <h1 class="text-center">سیستم مدیریت محتوای</h1>
        <div class="myrow">
            <?php require_once 'views/admin/right_menu.php'; ?>
            <div id="left" class="col-xs-12 col-sm-10">
                <div class="myrow">
                    <h2 id="caption" class="text-right">مدیریت محصولات</h2>
                    <h3 class="text-right">مشخصات فنی محصول </h3>
                    <span>(<?= $title ?>)</span>
                </div>
                <div class="myrow">
                    <form id="attributes" action="admin_product\delete_attributes\<?=$cat?>\<?=$product_id?>\<?=$title?>\" method="post">
                        <table class="table table-bordered">
                            <tr>
                                <th>عنوان</th>
                                <th>مقدار</th>
                                <th>ویرایش</th>
                                <th>انتخاب</th>
                            </tr>
                            <?php

                            foreach ($header_attr as $header) {

                                ?>
                                <tr>
                                    <td colspan="4" class="text-center"><?= $header['title']; ?></td>
                                </tr>
                                <?php foreach ($attrs as $attr) {
                                    if ($attr['parent'] == $header['id']) {
                                        ?>
                                        <tr title="<?=$attr['id']?>">
                                            <td title="<?=$attr['attr_id']?>" class="title_name"><?= $attr['title']; ?></td>
                                            <td class="value"><?php if (isset($attr['value'])) {
                                                    echo $attr['value'];
                                                } else {
                                                    echo '-';
                                                } ?></td>
                                            <td>
                                                <?php if (isset($attr['value'])) { ?>
                                                    <a title="<?= $header['id'] ?>" class="update"><img
                                                                src="public/images/icon_edit_16.png" </a>
                                                <?php } ?>
                                            </td>
                                            <td><input name="id[]" type="checkbox" value="<?= $attr['id'] ?>"></td>
                                        </tr>

                                    <?php }
                                }
                            }
                            ?>

                        </table>
                    </form>
                    <!-- Add New product -->
                    <div class="myrow">
                        <form method="post">
                            <select id="headers">
                                <?php foreach ($header_attr as $header) { ?>
                                    <option value="<?= $header['id'] ?>"><?= $header['title']; ?></option>
                                <?php } ?>
                            </select>
                            <select name="child" id="children">
                                <?php foreach ($attrs as $attr) {
                                    if ($attr['parent'] === $header_attr[0]['id']) {
                                        ?>
                                        <option value="<?= $attr['id']; ?>"><?= $attr['title'] ?></option>
                                    <?php }
                                } ?>
                            </select>
                            <input name="value" type="text" placeholder="مقدار">
                            <input class="btn btn-primary" type="submit" name="add" value="اضافه کردن ویژه گی">
                            <input type="hidden" value="<?= $product_id ?>" name="product_id">
                        </form>
                    </div>
                    <!-- Delete product -->
                    <div class="myrow">
                        <button id="delete" class="btn btn-danger">حذف</button>
                    </div>
                    <div class="myrow">
                        <!-- Update Form -->
                        <form id="update_form" method="post" class="form-inline">
                            <input name="update" type="submit" value="ثبت ویرایش" class="btn btn-primary">

                            <select id="new_parent">
                                <?php foreach ($header_attr as $header) { ?>
                                    <option value="<?= $header['id'] ?>"><?= $header['title']; ?></option>
                                <?php } ?>
                            </select>
                            <select id="new_child" name="new_child">

                            </select>

                            <input id="new_value" type="text" name="new_value" class="form-control input-sm">
                            <input id="id" name="id" type="hidden" value=""/>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script>
        ////
        var first = $('#headers').find('option').val();
        var url = "<?=URL?>admin_product/get_options_by_father";
        var data = {'index': first};
        $.post(url, data, function (msg) {
            //alert(msg);
            $('#children').html(msg);
        });
        /////
        $('#headers').on('change', function (e) {
            var optionSelected = $("option:selected", this).text();
            var valueSelected = this.value;
            $('#children').find('option').remove();
            var url = "<?=URL?>admin_product/get_options_by_father";
            var data = {'index': valueSelected};
            $.post(url, data, function (msg) {
                //alert(msg);
                $('#children').html(msg);
            });
        });
        $('#delete').click(function () {
            $('#attributes').submit();
        });
    </script>
    <script>
        var older_name = '';
        var new_name = '';
        var new_value = '';
        $('.update').click(function () {
            //alert('ok');

            new_name = $(this).parents('tr').find('.title_name').text();
            new_value = $(this).parents('tr').find('.value').text();
            if (new_name === older_name) {
                $('#update_form').fadeOut(200);
                older_name = '';
            } else {
                $('#update_form').fadeIn(200);
                older_name = $(this).parents('tr').find('.title_name').text();
                ///// گرفتن نام جدید
                $('#new_value').val(new_value);
                ///// تنظیم خصوصیت پدر
                var index=$(this).attr('title');
                $('#new_parent').val(index);
                ///// گرفتن خصوصیات فرزند از پدر مورد نظر و تنظیم آن
                var url = "<?=URL?>admin_product/get_options_by_father";
                var order=$(this).parents('tr').find('.title_name').attr('title');
                var data = {'index': index,'order':order};
                $.post(url, data, function (msg) {
                    //alert(msg);
                    $('#new_child').html(msg);
                });
                $('#id').val($(this).parents('tr').attr('title'));


            }

        });
        /////////  تنطیم نمایش خصوصیت فرزند برای بروزرسانی
        //اعمال کد های به روزرسانی در مدل و کنترلر
        // اعمال کد حذف در مدل و کنترلر
        $('#new_parent').on('change', function (e) {
            var valueSelected = this.value;
            $('#new_child').find('option').remove();
            var url = "<?=URL?>admin_product/get_options_by_father";
            var data = {'index': valueSelected};
            $.post(url, data, function (msg) {
                //alert(msg);
                $('#new_child').html(msg);
            });
        })


    </script>
<?php require_once 'footing.php' ?>