<?php

namespace App\Http\Controllers;

use Cassandra\Date;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;

class PayumoneyController extends Controller
{
    public function payuPayment(Request $request)
    {

        //echo "test"; die;
        /* All Required Parameters by your Gateway will differ from gateway to gateway refer the gate manual */

        $parameters = [
            'orderid' => $this->generateTransactionID(),
            'txnid' => $this->generateTransactionID(),
            'furl' => url('payumoney/response'),
            'surl' => url('payumoney/response'),
            'firstname' => 'pawan',
            'lastname' => 'sahu',
            'email' => 'sad@gmail.com',
            'phone' => '7895695896',
            'productinfo' => 234567,
            'service_provider' => 'sbi',
            'amount' => 1200,
            'curl' => url('payumoney/response'),
            'zipcode' => '567890',
            'address1' => 'asdfg',
            'address2' => 'sdfgh',
            'city' => 'banfal',
            'state' => 'karana',
            'country' => 'india',
        ];

        $order = Indipay::prepare($parameters);
        return Indipay::process($order);
    }

    public function generateTransactionID()
    {
        return substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    }

    public function payuResponse()
    {

    }
}
