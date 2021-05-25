<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Softon\Indipay\Facades\Indipay;

class ZapakPayController extends Controller
{

    public function zapakpayPayment(Request $request)
    {

        //echo "test"; die;
        /* All Required Parameters by your Gateway will differ from gateway to gateway refer the gate manual */

        $parameters = [
            'merchantIdentifier' =>'3a482db538bf4252b8f80dc0da650a62',
            'orderId'=> $this->generateTransactionID(),
            'buyerEmail' => 'pawan@gmail.com',
            'amount' => 250000,
            'currency' => 'INR',
            'returnUrl' => url('/zapakpay/response'),
            'buyerFirstName' => 'pawan',
            'buyerLastName' => 'sahu',
            'buyerPhoneNumber' => 7895695896,
            'productDescription' => "Zaakpay subscription fee",
            'merchantIpAddress'=> '127.0.0.1',
            'buyerAddress'=> 'bangalore',
            'buyerCity' => 'bangalore',
            'buyerState' => 'karnataka',
            'buyerCountry' => 'india',
            'buyerPincode' => 560076,
            'txnType' => 1,
            'zpPayOption' => 1,
            'mode' => 1,
            'purpose'=> 1,
            'txnDate' =>  "2021-3-29",

        ];

        $order = Indipay::prepare($parameters);
        return Indipay::process($order);
    }

    public function generateTransactionID()
    {
        return substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    }

    public function responsePayment(Request $request)
    {
        $response = Indipay::response($request);
//        if ($response['responseCode']==100){
//            return 'success';
//        }else{
//            return 'fail';
//        }
        return response()->json($response);
    }
}
