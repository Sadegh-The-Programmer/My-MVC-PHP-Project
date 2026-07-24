<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 03/25/2019
 * Time: 03:06 PM
 */

class model_admin_product extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_product()
    {
        $sql = 'select * from product';
        $products = $this->do_select($sql);
        $sql = 'select * from sub_category';
        $cats = $this->do_select($sql);
        return [$products, $cats];
    }

    function get_data($id = 0)
    {
        $sql = 'select * from sub_category';
        $cats = $this->do_select($sql);
        $sql = 'select * from color';
        $colors = $this->do_select($sql);
        $sql = 'select * from garanty';
        $guarantees = $this->do_select($sql);
        $sql = 'select * from product where id=?';
        $product = $this->do_select($sql, [$id], false);
        $sql = 'select * from color_for_product where product_id=?';
        $colors_for_product = $this->do_select($sql, [$id]);
        $sql = 'select * from guarantees_for_product where product_id=?';
        $guarantees_for_product = $this->do_select($sql, [$id]);
        return [$cats, $colors, $guarantees, $product, $colors_for_product, $guarantees_for_product];
    }

    function add_product($data = [], $file1 = [], $file2 = [], $file3 = [])
    {
        $colors = [];
        $guarantees = [];
        $title = $data['title'];
        $price = $data['price'];
        $mojodi = $data['mojodi'];
        $discount = $data['discount'];
        $description = $data['description'];
        $cat = $data['cat'];
        if (isset($data['color'])) {
            $colors = $data['color'];
        }
        if (isset($data['guarantee'])) {
            $guarantees = $data['guarantee'];
        }
        $sql = 'insert into product(title,price,cat,introduction,mojodi,discount,3d) VALUES (?,?,?,?,?,?,0)';
        $this->do_query($sql, [$title, $price, $cat, $description, $mojodi, $discount]);
        //get last generated id for product
        $id = $this::$connect->lastInsertId();
        //insert colors for this product
        foreach ($colors as $color) {
            $sql = 'insert into color_for_product(product_id,color_id) VALUES (?,?)';
            $this->do_query($sql, [$id, $color]);
        }
        //insert guarantees for this product
        foreach ($guarantees as $guarantee) {
            $sql = 'insert into guarantees_for_product(product_id,guarantees_id) VALUES (?,?)';
            $this->do_query($sql, [$id, $guarantee]);
        }

        mkdir('public/images/products/' . $id . '/');
        mkdir('public/images/products/' . $id . '/medium/');

        mkdir('public/images/products/' . $id . '/small/');
        mkdir('public/images/products/' . $id . '/large/');
        //////Move pics 1
        $this->move_pic_file($file1, 'product3', $id);


        ////move pic 2
        $this->move_pic_file($file2, 'product2', $id);

        /// move pic 3
        $this->move_pic_file($file3, 'product1', $id);
    }

    function move_pic_file($file, $new_name, $id)
    {
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_type = $file['type'];
        $file_temporary_name = $file['tmp_name'];
        $file_error = $file['error'];
        $can_upload = true;
        if ($file_type !== 'image/jpg' && $file_type !== 'image/jpeg') {
            $can_upload = false;
        }
        if ($file_size > 5242880) {
            $can_upload = false;
        }
        if ($can_upload) {
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $target = 'public/images/products/' . $id . '/large/' . $new_name . '.' . $extension;
            $medium_target = 'public/images/products/' . $id . '/medium/' . $new_name . '.' . $extension;
            $small_target = 'public/images/products/' . $id . '/small/' . $new_name . '.' . $extension;
            move_uploaded_file($file_temporary_name, $target);
            $this->create_thumbnail($target, $medium_target, 350, 350);
            $this->create_thumbnail($target, $small_target, 64, 64);
        }
    }

    function update_product($data = [], $file1 = [], $file2 = [], $file3 = [])
    {
        $colors = [];
        $guarantees = [];
        $id = $data['id'];
        $title = $data['title'];
        $price = $data['price'];
        $mojodi = $data['mojodi'];
        $discount = $data['discount'];
        $description = $data['description'];
        $cat = $data['cat'];
        if (isset($data['color'])) {
            $colors = $data['color'];
        }
        if (isset($data['guarantee'])) {
            $guarantees = $data['guarantee'];
        }
        $sql = 'update product set title=?,price=?,cat=?,introduction=?,mojodi=?,discount=? where id=?';
        $this->do_query($sql, [$title, $price, $cat, $description, $mojodi, $discount, $id]);

        //update colors for this product
        $sql = 'delete from color_for_product where product_id=?';
        $this->do_query($sql, [$id]);
        foreach ($colors as $color) {
            $sql = 'insert into color_for_product(product_id,color_id) VALUES (?,?)';
            $this->do_query($sql, [$id, $color]);
        }
        //update guarantees for this product
        $sql = 'delete from guarantees_for_product where product_id=?';
        $this->do_query($sql, [$id]);
        foreach ($guarantees as $guarantee) {
            $sql = 'insert into guarantees_for_product(product_id,guarantees_id) VALUES (?,?)';
            $this->do_query($sql, [$id, $guarantee]);
        }
        ////Replace Files
        if (!empty($file1['name'])) {
            unlink('public/images/products/' . $id . '/small/product3.jpg');
            $this->move_pic_file($file1, 'product3', $id);
        }
        if (!empty($file2['name'])) {
            unlink('public/images/products/' . $id . '/small/product2.jpg');
            $this->move_pic_file($file1, 'product2', $id);
        }
        if (!empty($file3['name'])) {
            unlink('public/images/products/' . $id . '/small/product1.jpg');
            $this->move_pic_file($file1, 'product1', $id);
        }

    }

    function get_analysis_data($product_id)
    {
        $sql = 'select * from analysis where product_id=?';
        return $this->do_select($sql, [$product_id]);

    }

    function get_name_and_id($id)
    {
        $sql = 'select id,title from product where id=?';
        $product = $this->do_select($sql, [$id], false);
        return $product;
    }

    function add_analyse($product_id, $data = [])
    {
        $title = $data['title'];
        $description = $data['description'];
        $sql = 'insert into analysis(title,value,product_id,link) VALUES (?,?,?,?)';
        $this->do_query($sql, [$title, $description, $product_id, mt_rand(100000, 999999)]);
    }

    function update_analyse($data = [])
    {
        $title = $data['title'];
        $description = $data['description'];
        $id = $data['id'];
        $sql = 'update analysis set title=?,value=? where id=?';
        $this->do_query($sql, [$title, $description, $id]);
    }

    function get_special_analyse($analyse_id)
    {
        $sql = 'select * from analysis where id=?';
        return $this->do_select($sql, [$analyse_id], false);
    }

    function delete_analysis($ids)
    {
        $sql = 'delete 
          FROM `analysis` 
         WHERE `id` IN (' . implode(',', array_map('intval', $ids)) . ')';
        $this->do_query($sql);
    }

    function delete_product($ids)
    {
        ////حذف خود محصولات
        $sql = 'delete 
          FROM `product` 
         WHERE `id` IN (' . implode(',', array_map('intval', $ids)) . ')';
        $this->do_query($sql);
        /////حذف نقد و بررسی های محصولات
        $sql = 'delete 
          FROM `analysis` 
         WHERE `product_id` IN (' . implode(',', array_map('intval', $ids)) . ')';
        $this->do_query($sql);
        ///// حذف گارانتی های محصولات
        $sql = 'delete 
          FROM `guarantees_for_product` 
         WHERE `product_id` IN (' . implode(',', array_map('intval', $ids)) . ')';
        $this->do_query($sql);
        /// حذف رنگ های محصولات
        $sql = 'delete 
          FROM `color_for_product` 
         WHERE `product_id` IN (' . implode(',', array_map('intval', $ids)) . ')';
        $this->do_query($sql);


    }

    function get_attributes_value($cat, $id)
    {
        $sql = 'select * from sub_category_attr left join product_attr_value on sub_category_attr.id=product_attr_value.attr_id  
 and product_attr_value.product_id=? where sub_category_attr.sub_category_id=?';


        $result = $this->do_select($sql, [$id, $cat]);
        $parents_id = array();
        foreach ($result as $row) {
            array_push($parents_id, $row['parent']);
        }
        $parents_id = array_unique($parents_id);
        $sql = 'SELECT * 
          FROM `category_attr`
         WHERE `id` IN (' . implode(',', array_map('intval', $parents_id)) . ')';
        $result2 = $this->do_select($sql);


        return [$result, $result2];
    }

    function get_options_by_father($selected, $selected_item = 0)
    {
        $sql = 'select * from sub_category_attr where parent=?';
        $results = $this->do_select($sql, [$selected]);
        $str = '';
        foreach ($results as $result) {
            if ($selected_item == $result['id']) {
                $select = 'selected';
            } else {
                $select = '';
            }
            $str .= '<option value="' . $result['id'] . '" ' . $select . '>' . $result['title'] . '</option>';
        }
        return $str;
    }

    function add_attribute($data)
    {
        $title = $data['child'];
        $value = $data['value'];
        $product_id = $data['product_id'];
        $sql = 'insert into product_attr_value(attr_id,value,product_id) VALUES (?,?,?)';
        try {
            $this->do_query($sql, [$title, $value, $product_id]);
        } catch (\PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                return 'false';
            }
        }
    }

    function update_attribute($data)
    {
        $attr_id = $data['new_child'];
        $value = $data['new_value'];
        $id = $data['id'];
        $sql = 'update product_attr_value set attr_id=?,value=? where id=?';
        $this->do_query($sql, [$attr_id, $value, $id]);
    }

    function delete_attributes($ids)
    {
        $sql = 'delete 
          FROM `product_attr_value` 
         WHERE `id` IN (' . implode(',', array_map('intval', $ids)) . ')';
        $this->do_query($sql);
    }

    function get_gallery($id)
    {
        $sql = 'select * from gallery where product_id=?';
        return $this->do_select($sql, [$id]);
    }

    function add_img_gallery($file, $id)
    {
        /////Upload File
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_type = $file['type'];
        $new_name = time();
        $file_temporary_name = $file['tmp_name'];
        $file_error = $file['error'];
        $can_upload = true;
        if ($file_type !== 'image/jpg' && $file_type !== 'image/jpeg') {
            $can_upload = false;
        }
        if ($file_size > 5242880) {
            $can_upload = false;
        }
        if ($can_upload) {
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            if (!file_exists('public/images/products/' . $id . '/gallery/')) {
                mkdir('public/images/products/' . $id . '/gallery/');
                mkdir('public/images/products/' . $id . '/gallery/large/');
                mkdir('public/images/products/' . $id . '/gallery/small/');
            }
            $target = 'public/images/products/' . $id . '/gallery/large/' . $new_name . '.' . $extension;
            $small_target = 'public/images/products/' . $id . '/gallery/small/' . $new_name . '.' . $extension;
            move_uploaded_file($file_temporary_name, $target);
            $this->create_thumbnail($target, $small_target, 115, 115);
        }
        /*
        $has3d = 0;

        */

        ///Insert Query
        $sql = 'insert into gallery(img,product_id) VALUES (?,?)';
        $this->do_query($sql, [$new_name, $id]);
    }

    public function delete_and_remove_image($ids, $product_id)
    {
        ////Select images for remove...
        $sql = 'select *
          FROM `gallery` 
         WHERE `id` IN (' . implode(',', array_map('intval', $ids)) . ')';
        $all_images = $this->do_select($sql);
        $images = array_column($all_images, 'img');
        print_r($images);
        ////remove from bank

        $sql = 'delete 
          FROM `gallery` 
         WHERE `id` IN (' . implode(',', array_map('intval', $ids)) . ')';
        $this->do_query($sql);

        ////Remove file from server
        foreach ($images as $image) {
            unlink('public/images/products/' . $product_id . '/gallery/large/' . $image . '.jpg');
            unlink('public/images/products/' . $product_id . '/gallery/small/' . $image . '.jpg');
        }

    }

    public function store_3d_img($product_id,$file_mtl,$file_obj)
    {
        ////First move files
        if (!empty($file_mtl['name']) && !empty($file_obj['name'])) {

            if ($file_mtl['size'] < 5242880 && $file_obj['size'] < 5242880) {
                if (!file_exists('public/images/products/' . $product_id . '/3d/')) {
                    mkdir('public/images/products/' . $product_id . '/3d/');
                }
                $mtl_extension = pathinfo($file_mtl['name'], PATHINFO_EXTENSION);
                $obj_extension = pathinfo($file_obj['name'], PATHINFO_EXTENSION);
                $mtl_target = 'public/images/products/' . $product_id . '/3d/' . 'product' . '.' . $mtl_extension;
                $obj_target = 'public/images/products/' . $product_id . '/3d/' . 'product' . '.' . $obj_extension;
                move_uploaded_file($file_mtl['tmp_name'], $mtl_target);
                move_uploaded_file($file_obj['tmp_name'], $obj_target);
                ////Update product table
                $sql = 'update product set 3d=1 where id=?';
                $this->do_query($sql, [$product_id]);

            }

        }


    }
    public function check_3d($product_id)
    {
        $sql='select * from product where id=?';
        $result=$this->do_select($sql,[$product_id],false);
        if($result['3d']==1){
            return true;
        }
        else
        {
            return false;
        }
    }
    public function remove_3d_image($product_id)
    {
        unlink('public/images/products/' . $product_id . '/3d/' . 'product' . '.mtl');
        unlink('public/images/products/' . $product_id . '/3d/' . 'product' . '.obj');
        $sql = 'update product set 3d=0 where id=?';
        $this->do_query($sql, [$product_id]);
    }
}