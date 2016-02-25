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
    public $error_code;
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
    public $ui_message;

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
        return $this->error_code != self::SUCCESS_CODE;
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

        $resp = new self;
        if (isset($response['error_code'])) {
            $resp->error_code = $response['error_code'];
        }
        if (isset($response['message'])) {
            $resp->message = $response['message'];
        }
        if (isset($response['ui_message'])) {
            $resp->ui_message = $response['ui_message'];
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

        if (!$resp->isError()) {
            if (!$resp->validateChecksum($secret)) {
                // $resp->object = null;
                $resp->error_code = self::PARTNER_VALIDATION_FAILED;
                $resp->message = 'Invalid checksum';
            }
        }

        return $resp;
    }
}
