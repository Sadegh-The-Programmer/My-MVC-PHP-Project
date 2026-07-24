<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 03/14/2019
 * Time: 05:17 PM
 */

class model_admin_category extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

    }

    function get_categories()
    {
        $sql = 'select * from top_category';
        return [$this->do_select($sql), 'parents' => []];
    }

    function get_category($id)
    {
        $sql = 'select * from category where parent=?';
        $children = $this->do_select($sql, [$id]);
        /////
        $sql = 'select * from top_category where id=?';
        $name = $this->do_select($sql, [$id], false);
        /////
        $sql = 'select * from top_category';
        $parents = $this->do_select($sql);
        /////
        $data = [$children, $name, 'parents' => $parents];
        return $data;
//Data 1=> sub_category 2=> top_category => category

    }

    function get_sub_category($id)
    {
        $sql = 'select * from sub_category where parent=?';
        $children = $this->do_select($sql, [$id]);
        /////
        $sql = 'select * from category where id=?';
        $name = $this->do_select($sql, [$id], false);
        //////
        $id_top_category = $name['parent'];
        $sql = 'select * from top_category where id=?';
        $top = $this->do_select($sql, [$id_top_category], false);
        //////
        $sql = 'select * from category';
        $parents = $this->do_select($sql);

        /////
        $data = [$children, $top, $name, 'parents' => $parents];
        return $data;


    }

    function add_category($title, $which = '', $parent = 0)
    {
        $sql = '';
        switch ($which) {
            case 'show_category':
                $sql = 'INSERT INTO top_category (title) VALUES (?) ';
                $stmt = self::$connect->prepare($sql);
                $stmt->bindValue(1, $title);
                break;
            case 'show_sub_category':

                $sql = 'INSERT INTO category (title,parent) VALUES (?,?) ';
                $stmt = self::$connect->prepare($sql);
                $stmt->bindValue(1, $title);
                $stmt->bindValue(2, $parent);
                break;
            case '':
                $sql = 'INSERT INTO sub_category (title,parent) VALUES (?,?) ';
                $stmt = self::$connect->prepare($sql);
                $stmt->bindValue(1, $title);
                $stmt->bindValue(2, $parent);
                break;
        }


        $stmt->execute();


    }

    function update_top_category($title, $id)
    {
        $sql = 'update top_category set title=? where id=?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1, $title);
        $stmt->bindValue(2, $id);
        $stmt->execute();
    }

    function update_category($title, $id, $parent)
    {
        $sql = 'update category set title=?,parent=? where id=?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1, $title);
        $stmt->bindValue(3, $id);
        $stmt->bindValue(2, $parent);
        $stmt->execute();
    }

    function update_sub_category($title, $id, $parent)
    {
        $sql = 'update sub_category set title=?,parent=? where id=?';
        $stmt = self::$connect->prepare($sql);
        $stmt->bindValue(1, $title);
        $stmt->bindValue(3, $id);
        $stmt->bindValue(2, $parent);
        $stmt->execute();
    }

    function delete_sub_category($cats, $parent)
    {
        $sql = 'delete 
          FROM `sub_category` 
         WHERE `id` IN (' . implode(',', array_map('intval', $cats)) . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
        header('location:' . URL . 'admin_category/show_sub_category/' . $parent);
    }

    function delete_category($cats, $parent)
    {
        ////
        //first delete children
        $sql = 'delete 
          FROM `sub_category` 
         WHERE `parent` IN (' . implode(',', array_map('intval', $cats)) . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();

        ////
        $sql = 'delete 
          FROM `category` 
         WHERE `id` IN (' . implode(',', array_map('intval', $cats)) . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
        header('location:' . URL . 'admin_category/show_category/' . $parent);
    }

    function delete_top_category($cats)
    {
        ///First delete children and push their IDs to an array
        $sql = 'select *
          FROM `category` 
         WHERE `parent` IN (' . implode(',', array_map('intval', $cats)) . ')';
        $stmt=self::$connect->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchAll();
        $sub_cat=[];
        foreach ($result as $row) {
            array_push($sub_cat, $row['id']);
        }
        $sql = 'delete 
          FROM `category` 
         WHERE `parent` IN (' . implode(',', array_map('intval', $cats)) . ')';
        $stmt=self::$connect->prepare($sql);
        $stmt->execute();
        ///
        ///Second delete children
        if($sub_cat!==[]) {
            $sql = 'delete 
          FROM `sub_category` 
         WHERE `parent` IN (' . implode(',', array_map('intval', $sub_cat)) . ')';
            $stmt = self::$connect->prepare($sql);
            $stmt->execute();
        }
        ///
        $sql = 'delete 
          FROM `top_category` 
         WHERE `id` IN (' . implode(',', array_map('intval', $cats)) . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
        header('location:' . URL . 'admin_category/');
    }
    function get_attributes($category_id)
    {
        $sql = 'select * from category_attr where category_id=?';
        $result = $this->do_select($sql, [$category_id]);
        return $result;
    }
    function get_category_title($category_id)
    {
        $sql = 'select * from category where id=?';
        return $this->do_select($sql, [$category_id],false)['title'];
    }
    function add_attribute($title,$category_id)
    {
        $sql='insert into category_attr(title,category_id) VALUES (?,?)';
        $this->do_query($sql,[$title,$category_id]);
    }
    function update_attribute($title,$id)
    {
        $sql='update category_attr set title=? where id=?';
        $this->do_query($sql,[$title,$id]);
    }
    function get_sub_attributes($sub_category_id)
    {
        $sql = 'select * from category_attr';
        $categories = $this->do_select($sql);
        $sql='select * from sub_category_attr where sub_category_id=?';
        $sub_categories=$this->do_select($sql,[$sub_category_id]);
        return ['cats'=>$categories,'sub_cats'=>$sub_categories];

    }
    function get_sub_category_title($sub_category_id){
        $sql = 'select * from sub_category where id=?';
        return $this->do_select($sql, [$sub_category_id],false)['title'];
    }
    function add_sub_attribute($title,$sub_category_id,$parent)
    {
        $sql='insert into sub_category_attr(title,sub_category_id,parent) VALUES (?,?,?)';
        $this->do_query($sql,[$title,$sub_category_id,$parent]);

    }
    function update_sub_attribute($title,$id,$parent)
    {
        $sql='update sub_category_attr set title=?,parent=? where id=?';
        $this->do_query($sql,[$title,$parent,$id]);
    }
    function delete_sub_attribute($sub_attr_cat_ids,$parent)
    {
        $sql = 'delete 
          FROM `sub_category_attr` 
         WHERE `id` IN (' . implode(',', array_map('intval', $sub_attr_cat_ids)) . ')';
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
        header('location:' . URL . 'admin_category/show_sub_attributes/'.$parent);
    }
    function delete_attribute($attr_cat_ids,$parent)
    {
        ////First delete sub_category_attr
        $sql = 'delete
          FROM `sub_category_attr` 
         WHERE `parent` IN (' . implode(',', array_map('intval', $attr_cat_ids)) . ')';
        $this->do_query($sql);
////////////////////////////////////Second delete category_attr
        $sql = 'delete
          FROM `category_attr` 
         WHERE `id` IN (' . implode(',', array_map('intval', $attr_cat_ids)) . ')';
        $this->do_query($sql);


        header('location:' . URL . 'admin_category/show_attributes/'.$parent);




    }
}