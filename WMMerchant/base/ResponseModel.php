<?php
namespace WMMerchant\base;

use WMMerchant\base\Model;
use WMMerchant\base\Security;

/**
 * Response model
 */
class ResponseModel {

    /**
     * Success code constant
     */
    const SUCCESS_CODE = 0;

    /**
     * Merchant validation failed code constant
     */
    const PARTNER_VALIDATION_FAILED = 1001;

    /**
     * Error Code
     *
     * @var string
     */
    public $errorCode;
    /**
     * Response object data
     *
     * @var array
     */
    public $object;

    /**
     * Error Message
     *
     * @var string
     */
    public $message;
    /**
     * UI Message
     *
     * @var string
     */
    public $uiMessage;

    /**
     * Check if response is error response
     *
     * @return boolean
     */
    public function isError() {
        return $this->errorCode != self::SUCCESS_CODE;
    }

    /**
     * Validate checksum of response model
     *
     * @param  string $secret Secret key
     *
     * @return boolean
     */
    public function validateChecksum($secret) {
        if ($this->isError() || empty($this->object)) {
            return true;
        }

        return Security::validateChecksumModel($this->object->checksum, $this->object, $secret);
    }

    /**
     * Load response array data into model
     *
     * @param  string $responseText Response text
     * @param  WMMerchant\base\Model $model Object model
     * @param  string $secret Secret key
     *
     * @return  ResponseModel Response data
     */
    public static function load($response_text, $model, $secret) {

        $response = json_decode($response_text, true);
        if ($response == null) {
            echo $response_text;
            die;
        }
        $resp = new self;
        if (isset($response['errorCode'])) {
            $resp->errorCode = $response['errorCode'];
        } else {
            var_dump($response_text);
            die;
        }
        if (isset($response['message'])) {
            $resp->message = $response['message'];
        }
        if (isset($response['uiMessage'])) {
            $resp->ui_message = $response['uiMessage'];
        }

        if (!$resp->isError()) {
            if (!empty($response['object'])) {

                if (empty($model)) {
                    throw new Exception("Model object must be set for loading data and validation");
                }

                $checksumFailedMessage = 'Invalid checksum. The response data is not requested from reliable source URL';
                if (empty($response['object']['checksum'])) {
                    return self::responseError(self::PARTNER_VALIDATION_FAILED, $checksumFailedMessage);
                }
                $model->setAttributes($response['object']);
                $model->checksum = $response['object']['checksum'];
                $resp->object = $model;

                try {
                    if (!$resp->validateChecksum($secret)) {
                        return self::responseError(self::PARTNER_VALIDATION_FAILED, $checksumFailedMessage);
                    }
                } catch (\Exception $e) {
                    var_dump($response);
                    die;
                }
            }
        }
        return $resp;
    }

    /**
     * Response error data
     *
     * @param  int $error_code Error code
     * @param  string $message Error Message
     *
     * @return Response Model
     */
    public static function responseError($error_code, $message) {
        $resp = new self;
        $resp->errorCode = $error_code;
        $resp->message = $message;

        return $resp;
    }
}
