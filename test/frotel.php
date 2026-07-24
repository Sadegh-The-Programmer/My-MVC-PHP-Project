<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../public/test/jquery.js"></script>
    <script src="../public/js/frotel/city.js"></script>
    <script src="../public/js/frotel/ostan.js"></script>
</head>
<body>
<form method="post">
    <select name="state" id="state"></select>
    <select name="city" id="city"></select>
 <input name="price" type="text" placeholder="هزینه کل سفارش">
 <input name="weight" type="text" placeholder="وزن کل سفارش">
 <input name="by_type" type="text" placeholder="شیوه خرید">
 <input name="post_type" type="text" placeholder="نوع پست">

    <input type="submit" name="send" value="Calculate">
</form>
<script>
    loadOstan('state');

    $('#state').change(function () {
        var i = $(this).find('option:selected').val();
        ldMenu(i, 'city');
    });
</script>
</body>
</html>
<?php
if (isset($_POST['send'])) {

    $obj = new helper('http://webservice1.link/ws/v1/rest/');
    $city=$_POST['city'];
    $price=$_POST['price'];
    $weight=$_POST['weight'];
    $by_type=$_POST['by_type'];
    $post_type=$_POST['post_type'];
    $price=  $obj->getPrices($city,$price,$weight,$by_type,$post_type);
    print_r($price);

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
?>