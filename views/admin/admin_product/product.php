<?php require_once 'head.php';
$products = $data[0];
$sub_categories = $data[1];
?>
    <main class="container">
        <h1 class="text-center">سیستم مدیریت محتوای</h1>
        <div class="myrow">
            <?php require_once 'views/admin/right_menu.php'; ?>
            <div id="left" class="col-xs-12 col-sm-10">
                <div class="myrow">
                    <h2 id="caption" class="text-right">مدیریت محصولات ها</h2>
                    <h3 class="text-right">
                    </h3>
                </div>
                <div class="myrow">
                    <form id="products" action="admin_product/delete_product" method="post">
                        <table class="table table-bordered">
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>گروه</th>
                                <th>قیمت</th>
                                <th class="text-center">نقد و بررسی</th>
                                <th>ویژه گی</th>
                                <th>ویرایش</th>
                                <th>گالری</th>
                                <th>انتخاب</th>
                            </tr>
                            <?php
                            foreach ($products as $product) {
                                $cat_name = '';
                                foreach ($sub_categories as $cat) {
                                    if ($cat['id'] === $product['cat'])
                                        $cat_name = $cat['title'];
                                }
                                ?>
                                <tr>
                                    <td><?= $product['id']; ?></td>
                                    <td><?= $product['title']; ?></td>
                                    <td><?= $cat_name ?></td>
                                    <td><?= $product['price']; ?></td>

                                    <td class="text-center"><a href="admin_product/analysis/<?= $product['id'] ?>"><img
                                                    src="public\images\analysis.png" </a></td>
                                    <td class="text-center"><a href="admin_product/attributes/<?= $product['cat'] ?>/<?= $product['id'] ?>/<?= urlencode($product['title']) ?>"><img src="public\images\plant.png" </a></td>
                                    <td><a href="admin_product/add_new_product/<?= $product['id']; ?>"
                                           class="update"><img src="public/images/icon_edit_16.png" </a></td>
                                    <td><a href="admin_product/gallery/<?=$product['id'];?>">تنطیم</a></td>
                                    <td><input name="id[]" type="checkbox" value="<?= $product['id'] ?>"></td>
                                </tr>

                            <?php } ?>
                        </table>
                    </form>
                    <!-- Add New product -->
                    <div class="myrow">
                        <a href="admin_product/add_new_product" class="btn btn-default">افزودن محصول جدید</a>
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
            $('#products').submit();
        });
    </script>
<?php require_once 'footing.php' ?>