<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 05/18/2019
 * Time: 02:46 PM
 */

class model_cart extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function delete_basket_item($basket_item_id)
    {
        $sql='delete from basket where id=?';
        $this->do_query($sql,[$basket_item_id]);
    }
    function update_basket($data)
    {
        $count=$data['new_count'];
        $id=$data['id'];
        $sql='update basket set count=? where id=?';
        $this->do_query($sql,[$count,$id]);

    }
}