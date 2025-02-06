<?php

namespace App\Services\Payment\SmartPayGateWay;
use InvalidArgumentException;

class SmartPayService {
    /**
     * $paymentGateway 
     *
     */
    public static function create($payment_method)
    {
        $setting_currency_code = getSettings('currency_code');
        $currency_code = $setting_currency_code['currency_code'];
        $default_currency_code = strtoupper($currency_code);

        $default_currency_code = strtoupper($default_currency_code);
        switch ($payment_method) {
            case 1: // Mobile Money
                $smartpay_setting_api_key = getSettings('smartpay_api_key');
                $smartpay_api_key = $smartpay_setting_api_key['smartpay_api_key'];
                $smartpay_setting_merchant_key = getSettings('merchant_key');
                $merchant_key = $smartpay_setting_merchant_key['merchant_key'];
                $setting_currency_code = getSettings('smartpay_currency_code');
              
              
                // $merchant_key = "a18de448-2506-4aa6-9b89-8a32a72124a4";
                // $smartpay_api_key = "18B7A421F344A5E23A7D0F4C044F1511C401004B90191BEDD35E3EC6FDE64E12";
                // $currency_code = strtoupper($default_currency_code);
                
                return new MobileMoneyService($merchant_key,$smartpay_api_key,$currency_code);
        
            // case 4: //Flutterwave
            //     $setting_currency_code = getSettings('flutterwave_currency_code');
            //     $currency_code = $setting_currency_code['flutterwave_currency_code']  ?? $default_currency_code;        
            //     $currency_code = strtoupper($currency_code);
            //     $flutterwave_setting_secret_key = getSettings('flutterwave_secret_key');
            //     $flutterwave_secret_key = $flutterwave_setting_secret_key['flutterwave_secret_key'];
            //     return new FlutterwavePayment($currency_code,$flutterwave_secret_key);
            default:
                throw new \Exception("Invalid payment method selected");
        }
    }

}