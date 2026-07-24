<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 05/16/2019
 * Time: 06:56 PM
 */

class model_panel extends Model
{
    private $user_id;

    function __construct()
    {
        parent::__construct();
        $this->user_id=Model::session_get('user_id');
    }
    function get_user_info(){
        $user_id=$this->user_id;
        $sql='select * from user where id=?';
        $result=$this->do_select($sql,[$user_id],false);
        return $result;

    }
    function get_stats(){
        $user_id=$this->user_id;
        //// کد بیرون کشیدن تمامی سفارشات
        $sql1="select count(*) as 'all'  from  customer_order where user_id=?";
        $all=$this->do_select($sql1,[$user_id],false);
        /////// کد بیرون کشیدن تعداد سفارشات در حال انتظار
        $sql2="select count(*) as 'in_queue'  from  customer_order where user_id=? and status_id=1";
        $in_queue=$this->do_select($sql2,[$user_id],false);
        ///////
        /////// کد بیرون کشیدن سفارشات در حال پردازش
        $sql3="select count(*) as 'in_process'  from  customer_order where user_id=? and status_id=2";
        $in_process=$this->do_select($sql3,[$user_id],false);
        ///////
        /////// کد بیرون کشیدن تعداد سفارشات لغو شده
        $sql4="select count(*) as 'canceled'  from  customer_order where user_id=? and status_id=7";
        $canceled=$this->do_select($sql4,[$user_id],false);
        /////// کد بیرون کشیدن تعداد سفارشات ارسال شده
        $sql5="select count(*) as 'sent'  from  customer_order where user_id=? and status_id=4";
        $sent=$this->do_select($sql5,[$user_id],false);
        ///////
        return ['all'=>$all['all'],'in_queue'=>$in_queue['in_queue'],
            'in_process'=>$in_process['in_process'],
            'canceled'=>$canceled['canceled'],'sent'=>$sent['sent']];

    }
    // تابع بیرون کشیدن پیغام های رسیده به کاربر
    function get_messages(){
        $user_id=$this->user_id;
        $sql='select * from messages where user_id=?';
        $result=$this->do_select($sql,[$user_id],true);
        return $result;

    }
    function get_orders(){
        $user_id=$this->user_id;
        $sql='select customer_order.*,status.title from customer_order inner join status on customer_order.status_id =status.id where customer_order.user_id=?';
        $result=$this->do_select($sql,[$user_id],true);
        return $result;

    }
    function get_favorite_list(){}
    function get_discount_cards(){}
    function get_gift_card(){}


}