<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 02/27/2019
 * Time: 05:11 PM
 */

class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
        Model::session_init();
        if(model::session_get('user_id'))
        {
            header('location:' . URL . 'panel/index/');
        }
    }

    function index()
    {
        $this->view('login/','index');
    }

    function check_user()
    {
        if (isset($_POST['login'])) {
            Model::session_init();
            $check=$this->objectModel->check_user($_POST);
            if($check)
            {
                if(model::session_get('cart')){
                    header('location:' . URL . 'showcart2/index/');

                }else {
                    header('location:' . URL . 'panel/index/');
                }
            }
            else{
               header('location:'.URL.'login/index/');
            }

        }
    }
}