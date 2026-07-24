<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 02/27/2019
 * Time: 04:13 PM
 */

class Showcart4 extends Controller
{
    function __construct()
    {
    }

    function index($error='')
    {

        $data=['error'=>$error];
        $this->view('showcart4/','index',$data);
    }
    function check_card($code)
    {
        $result=$this->objectModel->check_card($code);
        if($result=='') {
            echo 'no';
        }else{
        echo $result;
            }
    }
    function calculate_final_price()
    {
        echo $this->objectModel->calculate_final_price();
    }
    function save_order()
    {
        $this->objectModel->save_order($_POST);
    }

}