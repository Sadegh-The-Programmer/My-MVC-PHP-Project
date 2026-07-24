<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 07/28/2019
 * Time: 06:14 PM
 */

class model_checkout extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getOrderInfo($orderId)
    {
        $sql = "select * from customer_order where id=?";
        $result = $this->do_select($sql, array($orderId), false);
        $status_id=$result['status_id'];
        $sql = "select * from status where id=?";
        $status_result = $this->do_select($sql, array($status_id), false);
        $status_name=$status_result['title'];
        return [$result,$status_name];
    }
    function zarinpal_checkout($data)
    {
        $status=$data['Status'];
        $Authority=$data['Authority'];
        $payment=new Payment();
        $sql = "select * from customer_order where reservation_number=?";
        $result = $this->do_select($sql, [$Authority], false);
        $Amount = $result['amount'];

        $result=$payment->zarin_pal_verify($Amount,$Authority);
        $Status = 100;//$result['status'];
        $Error = $result['error'];
        $RefID = '256256';//$result['RefID'];

        if ($Status == 100) {

            $sql = "update customer_order set passed=1,reference_id=?,status_id=1 where reservation_number=?";
            $params = array($RefID, $Authority);
            $this->do_query($sql, $params);
        }
        $sql = "select * from customer_order where reservation_number=?";
        $result = $this->do_select($sql, array($Authority), false);
        $status_id=$result['status_id'];
        $sql = "select * from status where id=?";
        $status_result = $this->do_select($sql, [$status_id], false);
        $status_name=$status_result['title'];
        return [$result,$status_name];
    }
    function pay_online($order_id)
    {
        $orderInfo=$this->getOrderInfo($order_id)[0];
        $pay_type=$orderInfo['pay_type'];
        ///

        if($pay_type==4){

            $sql="update customer_order set pay_type=1 where id=?";
            $this->do_query($sql,array($order_id));
            $pay_type=1;

        }
        ///
       if($pay_type==1){
           $amount=$orderInfo['amount'];
           $emergency_tell = $orderInfo['mobile'];
           $payment = new Payment();
           $result = $payment->zarin_pal_request($amount, '', 'info@shaop.com', $emergency_tell);
           $status = 100;//$result['status'];
           $error = $result['error'];
           $Authority = '321654';//$result['authority'];
           $sql="update customer_order set reservation_number=? where id=?";
           $this->do_query($sql,[$Authority,$order_id]);
           ////

           /// Update custom order for set new Authority...
           ///
           if ($status == 100) {

              // header('location: https://www.zarinpal.com/pg/StartPay/' . $Authority);
               header('location:http://localhost/Digikala_MVC/checkout?Authority=321654&Status=100');

           } else {

               header('location:'.URL.'checkout/showerror?error='.$error.'&orderId='.$order_id);
           }
       }



    }
    function updateCreditCard($data,$orderId){

        $day=$data['day'];
        $month=$data['month'];
        $year=$data['year'];
        $creditcard=$data['creditcard'];
        $bank=$data['bank'];
        $hour=$data['hour'];
        $minute=$data['minute'];

        $sql="update customer_order  set pay_day=?,pay_month=?,pay_year=?,pay_card=?,pay_bank_name=?,pay_hour=?,pay_minute=?,pay_type=4,status_id=1 where id=?";
        $params=array($day,$month,$year,$creditcard,$bank,$hour,$minute,$orderId);
        $this->do_query($sql,$params);
    }
}