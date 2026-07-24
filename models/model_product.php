<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 03/04/2019
 * Time: 03:46 PM
 */

class model_product extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_product_info($id)
    {
        $sql = 'select * from product where id=?';
        $result = $this->do_select($sql, [$id], false);
        $offer = 0;
        $date = '';
        $sql = 'select * from specials_product where product_id=:id';
        $stmt2 = self::$connect->prepare($sql);
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();
        if ($stmt2->rowCount() > 0) {
            $offer = 1;
            $result2 = $stmt2->fetch();
            $startTime = $result2['start_time'];
            $endTime = $startTime + ($result2['days'] * 24 * 3600);
            $date = date('F d , Y h:i:s', $endTime);
        }
        $price = $result['price'];
        $discount = $result['discount'];
        $price_discount = $this->get_discount($price, $discount);
        $result['price_discount'] = $price_discount;
        //////
        $sql = 'select * from color_for_product where product_id=?';
        $color = $this->do_select($sql, [$id]);
        $color_ids = array_column($color, 'color_id');
        $sql = 'SELECT * 
          FROM `color` 
         WHERE `id` IN (' . implode(',', array_map('intval', $color_ids)) . ')';
        $colors = $this->do_select($sql);

        //////
        $sql = 'select * from guarantees_for_product where product_id=?';
        $guarantee = $this->do_select($sql, [$id]);
        $guarantee_ids = array_column($guarantee, 'guarantees_id');
        $sql = 'SELECT * 
          FROM `garanty` 
         WHERE `id` IN (' . implode(',', array_map('intval', $guarantee_ids)) . ')';
        $guarantees = $this->do_select($sql);


        //////
        $cat = $result['cat'];
        $sql = 'select * from product where cat=? limit 0,5';
        $likes = $this->do_select($sql, [$cat]);
        ///
        return [$result, $offer, $date, $colors, $guarantees, $likes];

    }

    function get_analysis($id)
    {
        $sql = 'select * from analysis where product_id=?';
        $result = $this->do_select($sql, [$id]);
        return $result;
    }

    function get_properties($cat, $id)
    {
        $sql = 'select * from sub_category_attr left join product_attr_value on sub_category_attr.id=product_attr_value.attr_id  
 and product_attr_value.product_id=? where sub_category_attr.sub_category_id=?';


        $result = $this->do_select($sql, [$id, $cat]);
        $parents_id = array();
        foreach ($result as $row) {
            array_push($parents_id, $row['parent']);
        }
        $parents_id = array_unique($parents_id);
        $sql = 'SELECT * 
          FROM `category_attr`
         WHERE `id` IN (' . implode(',', array_map('intval', $parents_id)) . ')';
        $result2 = $this->do_select($sql);


        return [$result, $result2];
    }

    function get_comment_params($cat, $id)
    {
        $sql = 'select * from comment_param where sub_category_id=?';
        $params = $this->do_select($sql, [$cat]);
        //////
        $sql = 'select * from comment where product_id=?';
        $comments = $this->do_select($sql, [$id]);
        $sum = 0;
        $rank = 0;
        $total_product = 0;
        foreach ($params as $key => $param) {
            $comment_param_id = $param['id'];
            foreach ($comments as $comment) {
                if ($comment['product_id'] == $id) {
                    $total_product++;
                    $str = $comment['params'];
                    $array_params = unserialize($str);
                    $sum = $sum + $array_params[$comment_param_id];
                }

            }
            if ($total_product > 0)
                $rank = $sum / $total_product;
            $params[$key]['rank'] = $rank;
            $params[$key]['float_rank'] = $rank - floor($rank);
            $sum = 0;
            $total_product = 0;
        }
        return $params;
    }

    function get_comments($id)
    {
        $sql = 'select * from comment where product_id=?';
        $result = $this->do_select($sql, [$id]);
        return $result;
    }

    function get_questions_and_answers($id)
    {
        $sql = 'select * from question where product_id=?';
        $questions = $this->do_select($sql, [$id]);
        $question_id = array();
        foreach ($questions as $row) {
            array_push($question_id, $row['id']);
        }
        $sql = 'SELECT * 
          FROM `answer`
         WHERE `question_id` IN (' . implode(',', array_map('intval', $question_id)) . ')';
        $answers = $this->do_select($sql);
        return [$questions, $answers];

    }

    function get_gallery($id)
    {
        $sql = 'select * from gallery where product_id=?';
        $gallery = $this->do_select($sql, [$id]);
        return $gallery;
    }

    function add_to_basket($id,$color='',$guarantee='')
    {
        $cookie = self::get_basket_cookie();
        $sql = 'select * from basket where product_id=? and cookie=? and color_name=? and guarantee_name=?';
        $params = [$id, $cookie,$color,$guarantee];
        $result = $this->do_select($sql, $params);
        if (isset($result[0])) {

            $sql = 'update basket set count=count+1 where product_id=? and cookie=? and color_name=? and guarantee_name=?';

            $this->do_query($sql, $params);

        } else {
            $sql = 'insert into basket(product_id,cookie,count,color_name,guarantee_name) values (?,?,1,?,?)';
            $cookie = self::get_basket_cookie();
            $params=[$id,$cookie,$color,$guarantee];
            $this->do_query($sql, $params);
        }
        return $cookie;
    }

}