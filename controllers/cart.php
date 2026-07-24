<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 02/26/2019
 * Time: 04:22 PM
 */

class Cart extends Controller
{
    function __construct()
    {
    }
    function index()
    {
        $basket=$this->objectModel->get_basket();
        $data=['basket'=>$basket[0],'all_price'=>$basket[1]];
        $this->view('cart/','index',$data);
    }
    function delete_item($basket_item_id)
    {
          $this->objectModel->delete_basket_item($basket_item_id);
          $basket=$this->objectModel->get_basket();
            echo json_encode($basket);
    }
    function update_basket()
    {
       $this->objectModel->update_basket($_POST);
        $basket=$this->objectModel->get_basket();
        echo json_encode($basket);
    }

}