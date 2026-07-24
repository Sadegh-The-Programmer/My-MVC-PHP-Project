<?php require_once 'head.php';
$show = 'show_category';
$parent = 0;
$parents = $data['parents'];
if (isset($data[1])) {
    $top_category_name = $data[1];

    $parent = $top_category_name['id'];
    $show = 'show_sub_category';
    if (isset($data[2])) {
        $category_name = $data[2];
        $show = '';
        $parent = $category_name['id'];
    }
}
?>
    <main class="container">
        <h1 class="text-center">سیستم مدیریت محتوای</h1>
        <div class="myrow">
            <?php require_once 'views/admin/right_menu.php'; ?>
            <div id="left" class="col-xs-12 col-sm-10">
                <div class="myrow">
                    <h2 id="caption" class="text-right">مدیریت دسته ها</h2>
                    <h3 class="text-right"><?php
                        if ($show === 'show_category') {
                            echo 'ابر دسته ها';
                        }
                        if (isset($data[1])) echo $top_category_name['title']; ?>
                        <?php if (isset($data[2])) echo " - " . $category_name['title']; ?></h3>
                </div>
                <div class="myrow">
                    <form id="cats" action="admin_category/delete_category/<?=$parent?>/<?=$show?>" method="post">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <?php if (strlen($show) > 0) { ?>
                                    <th>زیردسته</th>
                                <?php } ?>
                                <th>ویرایش</th>
                           <?php if($show==='show_sub_category'){ ?>     <th>مدیریت ویژه گی</th>
                                <?php }else if($show===''){ ?>
                               <th>مدیریت زیر ویژه گی</th>
                                <?php } ?>
                                <th>انتخاب</th>
                            </tr>
                            <?php
                            //print_r($data);
                            $top_category = $data[0];


                            foreach ($top_category as $cat) {
                                ?>
                                <tr>
                                    <td class="id"><?= $cat['id'] ?></td>
                                    <td class="title_name"><?= $cat['title'] ?></td>
                                    <?php if (strlen($show) > 0) { ?>
                                        <td><a href="admin_category/<?= $show; ?>/<?= $cat['id']; ?>"><i
                                                    class="glyphicon glyphicon-eye-open"></i></a></td><?php } ?>
                                    <td><a class="update"><img src="public/images/icon_edit_16.png" </a></td>
                              <?php if($show==='show_sub_category'){ ?>
                                    <td><a href="admin_category/show_attributes/<?=$cat['id'];?>"><img src="public/images/plant.png" </a></td>

                              <?php }else if($show===''){ ?>
                                  <td><a href="admin_category/show_sub_attributes/<?=$cat['id'];?>"><img src="public/images/plant.png" </a></td>
                                    <?php } ?>
                                    <td><input name="id[]" type="checkbox" value="<?= $cat['id']?>"></td>
                                </tr>

                                <?php
                            } ?>
                        </table>
                    </form>
                    <!-- Add New Category From -->
                    <div class="myrow">
                        <form method="post" class="form-inline">
                            <input type="submit" value="افزودن" class="btn btn-primary">
                            <input type="text" name="title" placeholder="نام دسته" class="form-control input-sm">
                            <input name="which" type="text" value="<?= $show ?>"/> <input name="parent" type="text"
                                                                                          value="<?= $parent ?>"/>
                        </form>
                    </div>
                    <!-- Delete cat -->
                    <div class="myrow"><button id="delete" class="btn btn-danger">حذف</button></div>
                    <div class="myrow">
                        <!-- Update Form -->
                        <form id="update_form" method="post" class="form-inline">
                            <input name="update" type="submit" value="ثبت ویرایش" class="btn btn-primary">
                            <input id="title" value="" type="text" name="new_title" class="form-control input-sm">
                            <select id="new_parents" name="new_parent">
                                <?php
                                foreach ($parents as $p) { ?>
                                    <option value="<?= $p['id'] ?>" <?php if ($p['id'] === $parent) echo 'selected' ?>><?= $p['title'] ?></option>
                                <?php }
                                ?>
                            </select>
                            <input name="which" type="text" value="<?= $show ?>"/>
                            <input id="id" name="id" type="text" value=""/>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        <?php if($parent == 0){ ?>
        $('#new_parents').hide();
        <?php } ?>
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
            $('#cats').submit();
        });
    </script>
<?php require_once 'head.php' ?>