<?php
namespace WMMerchant;

use WMMerchant\base\Curl;
use WMMerchant\base\Security;
use WMMerchant\base\NetHelper;
use WMMerchant\base\ResponseModel;
use WMMerchant\models\CreateOrderResponse;
/**
 * Webmoney service helpers
 */
class Service {


    const URL_CREATE_ORDER = 'http://apimerchant.webmoney.com.vn/payment/create-order';

    /**
     * Merchant passcode
     * Provided by Webmoney system
     *
     * @var string
     */
    public $passcode;
    /**
     * Merchant secret key
     * Provided by Webmoney system
     * Used for encrypting and compare checksum
     *
     * @var string
     */
    public $secret_key;

    /**
     * Set passcode and secret while initialization
     *
     * @param string $passcode Merchant passcode
     * @param string $secret   Merchant secret key
     */
    public function __construct($passcode, $secret) {
        $this->passcode = $passcode;
        $this->secret_key = $secret;
    }

    /**
     * Construct new curl object with application/json header
     *
     * @return Curl curl object
     */
    public function getCurl() {
        $curl = new Curl();
        $curl->setOption(CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'Authorization:' . $this->passcode,
            'X-Forwarded-Host:' . $_SERVER['HTTP_HOST'],
            'X-Forwarded-For:' . $_SERVER['SERVER_ADDR'],
        ));
        $curl->setOption(CURLOPT_TIMEOUT, 200);
        $curl->setOption(CURLOPT_CONNECTTIMEOUT, 200);
        return $curl;
    }

    /**
     * Validates passcode and secret key
     *
     */
    protected function validateCodes() {
        if (empty($this->passcode)) {
            throw new \Exception("Passcode has not been set.");
        }

        if (empty($this->secret_key)) {
            throw new \Exception("secret_key has not been set.");
        }
    }

    /**
     * Create order request
     *
     * @param  WMMerchant\models\CreateOrderRequest $request Request data
     *
     * @return WMMerchant\base\ResponseMmodel           Response model
     */
    public function createOrder($request) {
        $this->validateCodes();

        $curl = $this->getCurl();
        $request->clientIP = NetHelper::getIPAddress();
        $request->userAgent = $_SERVER['HTTP_USER_AGENT'];
        $request->hashChecksum($this->passcode, $this->secret_key);
        $json_data = json_encode($request);
        $resp = $curl->setOption(CURLOPT_POSTFIELDS, $json_data)->post(self::URL_CREATE_ORDER, false);

        $response = ResponseModel::load($resp, $this->secret_key, new CreateOrderResponse);

        return $response;
    }
}
