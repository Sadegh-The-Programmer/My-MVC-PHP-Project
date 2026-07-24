<?php

class model_showcart4 extends Model
{
    function __construct()
    {
        parent::__construct();
        Model::session_init();

    }

    function check_card($code)
    {
        $sql = 'select * from card where code=? and valid=1';
        $row = $this->do_select($sql, [$code], false);

        Model::session_set('discount_card', $row['percent']);
        return $row['percent'];
    }

    function calculate_final_price()
    {

        $post_price = parent::session_get('post_price');
        $basket_info = $this->get_basket();
        $total_money = $basket_info[1];
        $total_discount = $basket_info[2];
        $final_price = ($total_money + ($post_price / 10)) - $total_discount;
        return $final_price;
    }

    function save_order($data)
    {

        //// Pay_type=1 ==> Zarin Pal
        ///  Pay_type=2 ==> Bank Saman
        ///  Pay_type=3 ==> Bank Mellat
        ///  Pay_type=4 ==> کارت به کارت
        $user_address = unserialize(Model::session_get('user_address'));
        $discount_card = Model::session_get('discount_card');
        $status_id = 9;
        $user_id = $user_address['user_id'];
        $time=time();
        $name = $user_address['name'];
        $city = $user_address['city_name'];
        $state = $user_address['state_name'];
        $emergency_tell = $user_address['emergency_phone'];
        $postal_code = $user_address['post_code'];
        $cell_phone = $user_address['cell_phone'];
        $address = $user_address['address'];
/////////////////////////////////////////////
        $basket = $this->get_basket();
        $items = $basket[0];
        $sum_price = $basket[1];
        $sum_discount = $basket[2];
        $post_price = Model::session_get('post_price');
        $post_type = Model::session_get('post_type');
        $amount = ($sum_price + $post_price / 10) - $sum_discount;
        $amount = $amount - (($amount * $discount_card) / 100);
        $basket_rows = serialize($items);
        $passed = 0;
        $description = 'خرید از فروشگاه ما';
        $Authority='0';
        $pay_type = $data['pay_type'];

        if ($pay_type == 1) {
            $payment = new Payment();
            $result = $payment->zarin_pal_request($amount, $description, 'info@shaop.com', $emergency_tell);
            $status = 100;//$result['status'];
            $error = $result['error'];
            $Authority = '123456';//$result['authority'];
        }
        $sql = 'insert into customer_order(family,city,state,tell,mobile,post_code,address,basket_rows,amount,post_type,user_id,status_id,passed,reservation_number,pay_type,time_sabt) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $params = [$name, $city, $state, $cell_phone, $emergency_tell, $postal_code, $address, $basket_rows, $amount, $post_type, $user_id, $status_id, $passed, $Authority,$pay_type,$time];
        $this->do_query($sql, $params);
        if ($pay_type == 1) {
            if ($status == 100) {

                header('location:http://localhost/Digikala_MVC/checkout?Authority=123456&Status=100');
                //header('location: https://www.zarinpal.com/pg/StartPay/' . $Authority);

            } else {
                header('location:' . URL . 'showcart4/index/' . $status);
            }

        }
        if ($pay_type == 4) {
            $sql = "select * from customer_order order by id desc limit 1";
            $result = $this->do_select($sql, array(), false);
            header('location:' . URL . 'checkout/index/' . $result['id']);
        }

/// ////////////////////////////////////////


    }


}