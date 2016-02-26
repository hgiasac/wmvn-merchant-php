<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-21 14:42:57
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-27 01:54:55
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
     * Customer name
     *
     * @var string
     */
    public $custName;
    /**
     * Customer address
     * @var string
     */
    public $custAddress;
    /**
     * Customer email
     *
     * @var string
     */
    public $custEmail;
    /**
     * Customer gender
     *
     * @var string
     */
    public $custGender;

    /**
     * Customer Phone
     *
     * @var string
     */
    public $custPhone;

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
     * Addition Information
     *
     * @var array
     */
    public $addInfo;

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
			'transactionID' => 'Transaction ID',
            'invoiceID'     => 'Invoice ID',
            'totalAmount'   => 'Total Amount',
            'description'   => 'Description',
            'custName'      => 'Customer Name',
            'custAddress'   => 'Customer Address',
            'custGender'    => 'Customer Gender',
            'custEmail'     => 'Customer Email',
            'custPhone'     => 'Customer Phone',
            'addInfo'       => 'Additional Information',
            'status'        => 'Transaction Status',
		);
	}

	public function getAttributes() {
		return array(
			'transactionID' 	=> $this->transactionID,
			'invoiceID' 		=> $this->invoiceID,
			'description' 		=> $this->description,
			'totalAmount' 		=> $this->totalAmount,
			'custName'      	=> $this->custName,
            'custAddress'   	=> $this->custAddress,
            'custGender'    	=> $this->custGender,
            'custEmail'     	=> $this->custEmail,
            'custPhone'     	=> $this->custPhone,
            'addInfo'       	=> $this->addInfo,
            'status'    		=> $this->status,
		);
	}


	/**
     * Returns hash attributes
     *
     * @return array Properties that need to be hashed
     */
    public function hashAttributes() {
        return ['transactionID', 'invoiceID', 'totalAmount', 'custName', 'custAddress', 'custGender', 'custEmail', 'custPhone', 'description', 'status'];
    }
}
