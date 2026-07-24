<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 03/14/2019
 * Time: 05:09 PM
 */

class Admin_category extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        if (isset($_POST['title'])) {
            $this->objectModel->add_category($_POST['title'], $_POST['which']);
        }
        if (isset($_POST['update'])) {
            $this->objectModel->update_top_category($_POST['new_title'], $_POST['id']);
        }
        $data = $this->objectModel->get_categories();
        $this->view('admin/admin_category/category', $data, true);

    }

    function show_category($id)
    {
        if (isset($_POST['title'])) {
            $this->objectModel->add_category($_POST['title'], $_POST['which'], $_POST['parent']);
        }
        if (isset($_POST['update'])) {
            //print_r($_POST);
            $this->objectModel->update_category($_POST['new_title'], $_POST['id'], $_POST['new_parent']);
        }
        $data = $this->objectModel->get_category($id);

        $this->view('admin/admin_category/category', $data, true);
    }

    function show_sub_category($id)
    {
        if (isset($_POST['title'])) {
            $this->objectModel->add_category($_POST['title'], $_POST['which'], $_POST['parent']);
        }
        if (isset($_POST['update'])) {
            //print_r($_POST);
            $this->objectModel->update_sub_category($_POST['new_title'], $_POST['id'], $_POST['new_parent']);
        }
        $data = $this->objectModel->get_sub_category($id);
        $this->view('admin/admin_category/category', $data, true);
    }

    function delete_category($parent,$type)
    {
        $cats = $_POST['id'];

        if ($type === '') {
            //delete sub_category
            $this->objectModel->delete_sub_category($cats,$parent);
        }
        if($type==='show_sub_category'){
            //delete category
            $this->objectModel->delete_category($cats,$parent);

        }
        if($type==='show_category')
        {
            //delete top_category
            $this->objectModel->delete_top_category($cats);

        }
    }

    function show_attributes($category_id)
    {
        if (isset($_POST['title'])) {
            $this->objectModel->add_attribute($_POST['title'],$category_id);
        }
        if (isset($_POST['update'])) {
            $this->objectModel->update_attribute($_POST['new_title'], $_POST['id']);
        }
        $attributes = $this->objectModel->get_attributes($category_id);
        $category_title=$this->objectModel->get_category_title($category_id);
        $data=['attributes'=>$attributes,'title'=>$category_title];
        $this->view('admin/admin_category/attributes',$data,true);
    }
    function show_sub_attributes($sub_category_id)
    {
        if (isset($_POST['title'])) {
            $this->objectModel->add_sub_attribute($_POST['title'],$sub_category_id,$_POST['parent']);

        }
        if (isset($_POST['update'])) {
            $this->objectModel->update_sub_attribute($_POST['new_title'], $_POST['id'],$_POST['new_parent']);
        }


        $master_data = $this->objectModel->get_sub_attributes($sub_category_id);
        $sub_category_title=$this->objectModel->get_sub_category_title($sub_category_id);
        $data=['master_data'=>$master_data,'title'=>$sub_category_title];
        $this->view('admin/admin_category/sub_attributes',$data,true);

    }
    function delete_sub_attribute($parent)
    {
        $sub_attr_cat_ids = $_POST['id'];
        $this->objectModel->delete_sub_attribute($sub_attr_cat_ids,$parent);
    }
    function delete_attribute($parent)
    {
        $attr_cat_ids = $_POST['id'];
        $this->objectModel->delete_attribute($attr_cat_ids,$parent);
    }

}