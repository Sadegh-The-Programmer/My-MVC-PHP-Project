<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 02/27/2019
 * Time: 04:07 PM
 */

class Showcart3 extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        Model::session_init();
        $user_address =unserialize(Model::session_get('user_address'));

        $basket=$this->objectModel->get_basket();
        $items=$basket[0];
        $sum_price=$basket[1];
        $sum_discount=$basket[2];
        $post_price=Model::session_get('post_price');
        $data=['user_address'=>$user_address,'post_price'=>$post_price,'items'=>$items,'sum_price'=>$sum_price,'sum_discount'=>$sum_discount];

        $this->view('showcart3/','index',$data);
    }

}