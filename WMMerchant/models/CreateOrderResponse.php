<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-21 14:42:57
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-27 00:11:14
 */

namespace WMMerchant\models;

use WMMerchant\base\RequestModel;

/**
 * Create Order response class
 * Retrieves data if the request is successful
 */
class CreateOrderResponse extends RequestModel {

    /**
     * Transaction ID
     *
     * @var string
     */
    public $transactionID;
    /**
     * Redirect URL
     *
     * @var string
     */
    public $redirectURL;


    /*
     * Attributes labels
     */
    public function attributeLabels() {
        return array(
            'transactionID'    => 'Transaction ID',
            'redirectURL'      => 'Redirect URL',
        );
    }

    /**
     * Get all model attributes
     *
     * @return array $key => $value
     */
    public function getAttributes() {
        return array(
            'transactionID'       => $this->transactionID,
            'redirectURL'       => $this->redirectURL,
        );
    }


    /**
     * Return attribute names that will be used for encrypting checksum
     *
     * @return array
     */
    public function hashAttributes() {
        return array('transactionID', 'redirectURL');
    }
}
