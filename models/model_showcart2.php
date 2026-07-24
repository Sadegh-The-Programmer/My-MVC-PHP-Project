<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 05/23/2019
 * Time: 11:42 PM
 */

class model_showcart2 extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function add_user_address($data)
    {
        parent::session_init();
        $name=$data['name'];
        $tell=$data['tell'];
        $phone=$data['phone'];
        $state_id=$data['state_id'];
        $city_id=$data['city_id'];
        $state_name=$data['state_name'];
        $city_name=$data['city_name'];
        $address=$data['address'];
        $post_code=$data['post_code'];

        $user_id=parent::session_get('user_id');
        $sql='insert into user_address(user_id,name,emergency_phone,cell_phone,state_id,city_id,state_name,city_name,address,post_code) values(?,?,?,?,?,?,?,?,?,?)';
        $params=[$user_id,$name,$tell,$phone,$state_id,$city_id,$state_name,$city_name,$address,$post_code];
        $this->do_query($sql,$params);



    }
    function get_addresses_info($user_id)
    {
        $sql='select * from user_address where user_id=?';
        $param=[$user_id];
        return $this->do_select($sql,$param);
    }
    function get_address_info($id)
    {
        $sql='select * from user_address where id=?';
        $param=[$id];
        return $this->do_select($sql,$param,false);
    }
    function get_post_types()
    {
        $sql='select * from post_type';
        return $this->do_select($sql,[]);
    }
    function set_post_price_on_session($post_price,$post_type)
    {
        parent::session_init();
        parent::session_set('post_price',$post_price);
        parent::session_set('post_type',$post_type);

    }
    function get_post_prices($city_id,$id)
    {
        $sql='select * from user_address where id=?';
        $result=$this->do_select($sql,[$id],false);
        self::session_init();
        self::session_set('user_address',serialize($result));

        $obj = new helper('http://webservice1.link/ws/v1/rest/');
        $city=$city_id;
        $sum_weight=0;
        $basket=$this->get_basket();
        $items=$basket[0];
            foreach($items as $item)
            {
                $weight=$item['weight'];
                $count=$item['count'];
                $item_weight=$weight*$count;
                $sum_weight+=$item_weight;
            }

        $price=$basket[1];
        $by_type=1;
        $price_type_1=  $obj->getPrices($city,$price,$sum_weight,$by_type,1);
        $price_type_2=  $obj->getPrices($city,$price,$sum_weight,$by_type,2);

        echo json_encode([$price_type_1,$price_type_2]);


    }

}
class helper
{
    private $url;
    private $api_key;
    const METHOD_POST = 'post';
    const METHOD_GET = 'get';
    /**
     * list of errors
     *
     * @var array
     */
    private $errors = array();

    /**
     * @param string $webserviceUrl
     * @param string $apiKey
     */
    public function __construct($webserviceUrl)
    {
        $this->url = $webserviceUrl;
        $this->api_key = 'F4960daa89D73A33332382fE661E7a18';
    }

    public function getPrices($des_city, $price, $weight, $buy_type, $delivery_type)
    {
        $params = array(
            'des_city' => $des_city,
            'price' => $price,
            'weight' => $weight,
            'buy_type' => $buy_type,
            'send_type' => $delivery_type
        );
        return $this->call('order/getPrices.json', $params);
    }


    private function call($url, $params, $methodType = helper::METHOD_POST)
    {
        // flush error list
        $this->errors = array();
        if (stripos($url, 'http://') === false)
            $url = $this->url . $url;
        $params['api'] = $this->api_key;
        $data = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, $methodType === helper::METHOD_POST);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        $result = json_decode($result, true);
        if (json_last_error() == JSON_ERROR_NONE)
            return $this->parseResponse($result);
        throw new FrotelResponseException('Failed to Parse Response (' . json_last_error() . ')');
    }

    /**
     * parse webservice response
     *
     * @param array $response
     * @return bool
     * @throws FrotelResponseException
     * @throws FrotelWebserviceException
     */
    private function parseResponse($response)
    {
        if (!isset($response['code'], $response['message'], $response['result']))
            throw new FrotelResponseException('پاسخ دریافتی از سرور معتبر نیست.');
        if ($response['code'] == 0)
            return $response['result'];
        $this->errors[] = $response['message'];
        throw new FrotelWebserviceException($response['message']);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
class FrotelResponseException extends Exception
{
}

class FrotelWebserviceException extends Exception
{
}