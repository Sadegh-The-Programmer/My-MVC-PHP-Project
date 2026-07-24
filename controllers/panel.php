<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 02/27/2019
 * Time: 05:11 PM
 */

class Panel extends Controller
{
    function __construct()
    {
        Model::session_init();
        $check=Model::session_get('user_id');
        if(!$check)
        {
            header('location:'.URL.'login/index/');
        }
    }

    function index()
    {
        $result=$this->objectModel->get_user_info();
        $statistics=$this->objectModel->get_stats();
        $messages=$this->objectModel->get_messages();
        $orders=$this->objectModel->get_orders();
        $data=['customer_info'=>$result,'statistics'=>$statistics,'messages'=>$messages,'orders'=>$orders];
        $this->view('panel/','index',$data);
    }
}