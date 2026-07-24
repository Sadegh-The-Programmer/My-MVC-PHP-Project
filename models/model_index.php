<?php

class model_index extends model
{
    function __construct()
    {
        parent::__construct();

    }

    function get_top_slider()
    {

        $sql = 'select * from top_slider';
        $result = $this->do_select($sql);
        return $result;
    }

    function get_modern_slider()
    {
        date_default_timezone_set('Asia/Tehran');
        $sql = 'select * from specials_product';
        $result = $this->do_select($sql);
        foreach ($result as $key => $row) {
            $startTime = $row['start_time'];
            $endTime = $startTime + ($row['days'] * 24 * 3600);
            $date = date('F d , Y h:i:s', $endTime);
            $result[$key]['end_date'] = $date;
        }
        $products_id = array();
        foreach ($result as $row) {
            array_push($products_id, $row['product_id']);
        }
        //print_r($products_id);
        $sql = 'SELECT * 
          FROM `product` 
         WHERE `id` IN (' . implode(',', array_map('intval', $products_id)) . ')';
        $result2 = $this->do_select($sql);

        foreach ($result2 as $key => $row) {
            $discount = $row['discount'];
            $price = $row['price'];
            $total_price = ((100 - $discount) * $price) / 100;
            $result2[$key]['total_price'] = $total_price;
        }
        return [$result2, $result];
    }
    function get_just_here()
    {
        $sql = 'select * from product where just_here=?';
        $result=$this->do_select($sql,[1]);
        return $result;
    }

    function get_most_viewed()
    {
        $sql = 'select * from product order by seen desc limit 5';
        $result=$this->do_select($sql);
        return $result;
    }
}