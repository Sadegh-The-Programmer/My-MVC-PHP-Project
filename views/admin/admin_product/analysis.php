<?php require_once 'head.php';

$analysis=$data['analysis'];
$product_info=$data['product_info'];
?>
    <main class="container-fluid">
        <h1 class="text-center">سیستم مدیریت محتوای</h1>
        <div class="myrow">
            <?php require_once 'views/admin/right_menu.php'; ?>
            <div id="left" class="col-xs-12 col-sm-10">
                <div class="myrow">
                    <h2 id="caption" class="text-right">مدیریت محصولات</h2>
                    <h3 class="text-right">نقد و بررسی</h3>
                    <span>(<?=$product_info['title'];?>)</span>
                </div>
                <div class="myrow">
                    <form id="analysis" action="admin_product\delete_analysis\<?=$product_info['id'];?>" method="post">
                        <table class="table table-bordered">
                            <tr>
                                <th>عنوان</th>

                                <th>ویرایش</th>
                                <th>انتخاب</th>
                            </tr>
                            <?php
                            foreach ($analysis as $analyze) {

                                ?>
                                <tr>
                                    <td><?=$analyze['title'];?></td>


                                    <td><a href="admin_product/add_new_analyze/<?=$product_info['id'];?>/<?=$analyze['id'];?>" class="update"><img src="public/images/icon_edit_16.png" </a></td>
                                    <td><input name="id[]" type="checkbox" value="<?= $analyze['id']?>"></td>
                                </tr>

                            <?php } ?>
                        </table>
                    </form>
                    <!-- Add New product -->
                    <div class="myrow">
                        <a href="admin_product/add_new_analyze/<?=$product_info['id'];?>" class="btn btn-primary">افزودن نقد جدید</a>
                    </div>
                    <!-- Delete product -->
                    <div class="myrow">
                        <button id="delete" class="btn btn-danger">حذف</button>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script>
        $('#delete').click(function () {
            $('#analysis').submit();
        });
    </script>
<?php require_once 'footing.php' ?>