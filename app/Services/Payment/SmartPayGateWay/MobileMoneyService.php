<?php
namespace App\Services\Payment\SmartPayGateWay;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Facades\Log;

class MobileMoneyService {

  
    private string $currencyCode;
    private string $merchant_key;
    private string $apiKey;
      /**
     * MobileMoneyService constructor.
     * @param $merchant_key
     * @param $apiKey
     * @param $currencyCode
     */


    public function __construct($merchant_key,$apiKey,$currencyCode) {
      
        $this->currencyCode = $currencyCode;
        $this->apiKey = $apiKey;
        $this->merchant_key = $merchant_key;
    }

     /**
     * Create a payment intent using SmartPayGateWay
     * @param $amount
     * @param $customMetaData
    
     * @throws Exception
     */

     public function sendTransaction($amount, $customMetaData) {
        try {
            $finalAmount = $this->minimumAmountValidation($this->currencyCode, $amount);
            $smartpay_setting_webhook_url = getSettings('smartpay_webhook_url');
            $smartpay_pay_url = $smartpay_setting_webhook_url['smartpay_webhook_url'];
            // URL de l'API
            // $url = "http://localhost:5090/api/Transactionsts/Payment";
            $url = $smartpay_pay_url;
             // Headers requis
            $headers = [
                'x-apikey' => $this->apiKey,
                'x-merchantId' => $this->merchant_key,
                'environnment' => 'production'
            ];

            // Données de la requête
            $data = [                
                'amount' =>  $finalAmount,
                'msisdn' => $customMetaData['msisdn'],
                'otp' => $customMetaData['otp'],                
                'name' => $customMetaData['name'],
                'type' => 'mobile_money',
                'reference' => $customMetaData['reference'],
                'countryIsoCode' => 'CIV'
            ];

            // Envoyer la requête POST avec Laravel HTTP Client
            //** withoutVerifying(): empêche la vérification SSL  */
        $response = Http::withoutVerifying()
                         -> withHeaders($headers)
                         ->post($url, $data);

        // Vérification de la réponse
        $responseData = $response->json();
        
        return  $responseData;


        } catch (\Exception $e) {
       // Gérer les exceptions
       Log::error('API Request Exception: ', ['message' => $e->getMessage()]);

       return response()->json([
           'status' => 'error',
           'message' => 'Une exception s\'est produite lors de la communication avec l\'API.',
       ], 500);
        }

    }

     /**
     * Create and format a payment intent
     * @param $amount
     * @param $customMetaData
     * @return array
     */
    public function createGateWayPayment($amount, $customMetaData): array {
        $paymentIntent = $this->sendTransaction($amount, $customMetaData);
        return $paymentIntent;
    }

    
     /**
     * Validate the minimum amount based on currency
     * @param $currency
     * @param $amount
     * @return float|int
     */
    public function minimumAmountValidation($currency, $amount) {
        return max(1, $amount);
    }
}