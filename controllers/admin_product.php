<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 03/25/2019
 * Time: 03:03 PM
 */

class Admin_product extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        if(isset($_POST['add']))
        {

            $this->objectModel->add_product($_POST,$_FILES['pic1'],$_FILES['pic2'],$_FILES['pic3']);
        }
        if(isset($_POST['update']))
        {
            $this->objectModel->update_product($_POST,$_FILES['pic1'],$_FILES['pic2'],$_FILES['pic3']);


        }
        $data = $this->objectModel->get_product();
        $this->view('admin/admin_product/product', $data, true);
    }
    function add_new_product($id=0)
    {
        $data = $this->objectModel->get_data($id);
        $this->view('admin/admin_product/add_product', $data, true);
    }
    function analysis($product_id)
    {
        if(isset($_POST['add']))
        {
            $this->objectModel->add_analyse($product_id,$_POST);
        }
        if(isset($_POST['update']))
        {
            $this->objectModel->update_analyse($_POST);
        }
        $analysis=$this->objectModel->get_analysis_data($product_id);
        $product_info=$this->objectModel->get_name_and_id($product_id);
        $data=['analysis'=>$analysis,'product_info'=>$product_info];
        $this->view('admin/admin_product/analysis', $data, true);
    }
    function add_new_analyze($product_id,$analyse_id=0)
    {
        $product_info=$this->objectModel->get_name_and_id($product_id);
        $analyse=$this->objectModel->get_special_analyse($analyse_id);
        $data=['product_info'=>$product_info,'analyse'=>$analyse];
        $this->view('admin/admin_product/add_analyse', $data, true);
    }
    function delete_analysis($product_id)
    {
        $this->objectModel->delete_analysis($_POST['id']);
        header('location:' . URL . 'admin_product/analysis/' . $product_id);

    }
    function delete_product()
    {
        $this->objectModel->delete_product($_POST['id']);
        header('location:' . URL . 'admin_product/index/');
    }
    function get_options_by_father()
    {
       $selected_father = $_POST['index'];
       if(isset($_POST['order'])){
           $selected=$_POST['order'];
       }
       else{$selected=0;}
       echo $this->objectModel->get_options_by_father($selected_father,$selected);
    }
    function attributes($cat,$id,$title)
    {
        if (isset($_POST['add'])) {
           $return= $this->objectModel->add_attribute($_POST);
           // print_r($_POST);
            if($return==='false'){echo 'we have error';}
        }
        if (isset($_POST['update'])) {
            $this->objectModel->update_attribute($_POST);
            //print_r($_POST);
        }
        $attributes=$this->objectModel->get_attributes_value($cat,$id);
        $data=['attributes'=>$attributes,'title'=>$title,'product_id'=>$id,'cat'=>$cat];
        $this->view('admin/admin_product/attributes', $data, true);
    }
    function delete_attributes($cat,$id,$title)
    {

        $this->objectModel->delete_attributes($_POST['id']);
        header('location:' . URL . 'admin_product/attributes/'.$cat.'/'.$id.'/'.$title);
    }
    function gallery($product_id)
    {
        if(isset($_POST['add_img']))
        {
            $this->objectModel->add_img_gallery($_FILES['img'],$product_id);
        }

        if(isset($_POST['add_3d_img'])){
            $this->objectModel->store_3d_img($product_id,$_FILES['img_mtl'],$_FILES['img_obj']);
        }
        if(isset($_POST['delete_3d_img'])){
            $this->objectModel->remove_3d_image($product_id);
        }
        $gallery=$this->objectModel->get_gallery($product_id);
        $has_3d_image=$this->objectModel->check_3d($product_id);
        $product_title=$this->objectModel->get_name_and_id($product_id)['title'];
        $data=['gallery'=>$gallery,'product_id'=>$product_id,'has_3d'=>$has_3d_image,'title'=>$product_title];
        $this->view('admin/admin_product/gallery', $data, true);
    }
    function delete_images($product_id)
    {
        $this->objectModel->delete_and_remove_image($_POST['id'],$product_id);
        header('location:' . URL . 'admin_product/gallery/'.$product_id);
    }
}