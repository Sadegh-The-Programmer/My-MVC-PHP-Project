<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 02/27/2019
 * Time: 03:58 PM
 */

class Showcart2 extends Controller
{
    function __construct()
    {
    }
    function index()
    {
        Model::session_init();
        $user_id=Model::session_get('user_id');
        $addresses=$this->objectModel->get_addresses_info($user_id);
        $post_types=$this->objectModel->get_post_types();
        $data=['addresses' => $addresses,'post_types'=>$post_types];
        $this->view('showcart2/','index',$data);
    }
    function add_address()
    {
        $this->objectModel->add_user_address($_POST);
    }
    function get_address_info()
    {
        $row= $this->objectModel->get_address_info($_POST['id']);
        echo json_encode($row);
    }
    function get_post_prices()
    {
        $this->objectModel->get_post_prices($_POST['city_id'],$_POST['id']);
    }
    function set_post_price_on_session()
    {
        $this->objectModel->set_post_price_on_session($_POST['post_price'],$_POST['post_type']);
    }
}