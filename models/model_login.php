<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 05/16/2019
 * Time: 01:02 PM
 */

class model_login extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function check_user($form)
    {
        $email = $form['email'];
        $pass = $form['password'];
        if (isset($form['remember_me'])) {
            $remember_me = $form['remember_me'];
        }
        $sql = 'select * from user where email=? and password=?';
        $result = $this->do_select($sql, [$email, $pass], true);

        if (sizeof($result) > 0) {
                parent::session_set('user_id',$result[0]['id']);
                return true;
        }
        else{
            return false;
        }
    }


}