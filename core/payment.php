<?php
/**
 * Created by PhpStorm.
 * User: Sadeq Khan
 * Date: 06/20/2019
 * Time: 12:12 PM
 */
class Payment
{
    function __construct()
    {
            require_once 'public/nusoap/nusoap.php';
    }
    function zarin_pal_request($amount,$description,$email,$mobile)
    {
        $MerchantID = zarin_pall_merchant_ID;  //Required
        $Amount = $amount; //Amount will be based on Toman  - Required
        $Description = $description;  // Required
        $Email = $email; // Optional
        $Mobile = $mobile; // Optional
        $CallbackURL = zarin_pall_call_back_url;  // Required


        $client = new nusoap_client(zarin_pall_web_service_address, 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call('PaymentRequest', [
            [
                'MerchantID'     => $MerchantID,
                'Amount'         => $Amount,
                'Description'    => $Description,
                'Email'          => $Email,
                'Mobile'         => $Mobile,
                'CallbackURL'    => $CallbackURL,
            ],
        ]);

        //Redirect to URL You can do it also by creating a form
        $error='';
        $authority='';
        $status=$result['Status'];
        if ($status == 100) {
            $authority=$result['Authority'];
            //header('Location: https://www.zarinpal.com/pg/StartPay/'.$result['Authority']);
        } else {
            $error='Error in connection to bank';
        }
        $array=['status'=>$status,'error'=>$error,'authority'=>$authority];
        return $array;
    }
    function zarin_pal_verify($amount,$authority)
    {
        $client = new nusoap_client(zarin_pall_web_service_address, 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call('PaymentVerification', [
            [
                'MerchantID'     => zarin_pall_merchant_ID,
                'Authority'      => $authority,
                'Amount'         => $amount,
            ],
        ]);
        $refId='';
        $error='';
        $status=$result['Status'];
        if($status==100)
        {
            $refId=$result['RefID'];
        }
        else{
            $error='تراکنش نا معتبر است';
        }
        $array=['status'=>$status,'error'=>$error,'RefID'=>$refId];
        return $array;
    }


}