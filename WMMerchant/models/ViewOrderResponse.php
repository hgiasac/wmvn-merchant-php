<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-21 14:42:57
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-26 23:05:25
 */
namespace WMMerchant\models;

use WMMerchant\base\RequestModel;

/**
 * Class contain data for sending POST request to webmoney server
 */
class ViewOrderResponse extends RequestModel {
	/**
     * Transaction ID
     *
     * @var string
     */
    public $transactionID;
    /**
     * Webmoney invoice ID
     *
     * @var [int
     */
    public $invoiceID;
    /**
     * Total amount
     *
     * @var int
     */
    public $totalAmount;

    /**
     * Description
     *
     * @var string
     */
    public $description;
    /**
     * Transaction status
     *
     * @var string
     */
    public $status;

	/*
		     * Attributes labels
	*/
	public function attributeLabels() {
		return array(
			'transactionID'        => 'Transaction ID',
            'invoiceID'            => 'Invoice ID',
            'totalAmount'          => 'Total Amount',
            'description'          => 'Description',
            'status'    => 'Transaction Status',
		);
	}

	public function getAttributes() {
		return array(
			'mTransactionID' => $this->mTransactionID,
			'invoiceID' => $this->invoiceID,
			'description' => $this->description,
			'totalAmount' => $this->totalAmount,
            'status'    => $this->status,
		);
	}


	/**
     * Returns hash attributes
     *
     * @return array Properties that need to be hashed
     */
    public function hashAttributes() {
        return ['transactionID',  'invoiceID', 'totalAmount', 'description', 'status'];
    }
}
