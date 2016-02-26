<?php
namespace WMMerchant\base;

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
     * Unique checksum of model
     *
     * @var string
     */
    public $checksum;

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
     * @return boolean
     */
    public function validateChecksum($secret) {
        return Security::validateChecksumModel($this->checksum, $this->object, $secret);
    }

    /**
     * Load response array data into model
     */
    public static function load($responseText, $secret, $model = null) {

        $response = json_decode($responseText, true);

        if ($response == null) {
            echo $responseText;
            die;
        }
        $resp = new self;
        if (isset($response['errorCode'])) {
            $resp->errorCode = $response['errorCode'];
        }
        if (isset($response['message'])) {
            $resp->message = $response['message'];
        }
        if (isset($response['uiMessage'])) {
            $resp->ui_message = $response['uiMessage'];
        }

        if (isset($response['checksum'])) {
            $resp->checksum = $response['checksum'];
        }

        if (!empty($response['object'])) {
            if ($resp->isError()) {
                $resp->object = $response['object'];
            } elseif (!empty($model)) {
                $model->setAttributes($response['object']);
                $resp->object = $model;
            } else {
                $resp->object = $response['object'];
            }

        }

        try {
            if (!$resp->isError()) {
                if (!$resp->validateChecksum($secret)) {
                    // $resp->object = null;
                    $resp->error_code = self::PARTNER_VALIDATION_FAILED;
                    $resp->message = 'Invalid checksum';
                }
            }
        } catch (\Exception $e) {
            var_dump($response);
            die;
        }

        return $resp;
    }
}
