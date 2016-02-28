<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-28 20:47:26
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-28 22:55:13
 */

namespace sample\models;

use WMMerchant\base\Model;

class Product extends Model {

    public $product_code;
    public $product_name;
    public $description;
    public $total_amount;
    public $image_name;


    /*
     * Attributes labels
     */
    public function attributeLabels() {

        return array(
            'product_code'      => 'Product Code',
            'product_name'      => 'Product Name',
            'description'       => 'Description',
            'total_amount'      => 'Total Amount',
            'image_name'        => 'Image Name',
        );
    }

    /**
     * Get all model attributes
     *
     * @return array $key => $value
     */
    public function getAttributes() {
        return array(
            'product_code'       => $this->product_code,
            'product_name'       => $this->product_name,
            'description'        => $this->description,
            'total_amount'       => $this->total_amount,
            'image_name'        => $this->image_name,
        );
    }
}
