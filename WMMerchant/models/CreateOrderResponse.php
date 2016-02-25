<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-21 14:42:57
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-25 15:06:36
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
    public $transaction_id;
    /**
     * Redirect URL
     *
     * @var string
     */
    public $redirect_url;


    /*
     * Attributes labels
     */
    public function attributeLabels() {
        return array(
            'transaction_id'    => 'Transaction ID',
            'redirect_url'      => 'Redirect URL',
        );
    }

    /**
     * Get all model attributes
     *
     * @return array $key => $value
     */
    public function getAttributes() {
        return array(
            'transaction_id'       => $this->transaction_id,
            'redirect_url'       => $this->redirect_url,
        );
    }


    /**
     * Return attribute names that will be used for encrypting checksum
     *
     * @return array
     */
    public function hashAttributes() {
        return array('transaction_id', 'redirect_url');
    }
}
