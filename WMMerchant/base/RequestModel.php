<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-21 14:42:57
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-25 15:06:59
 */

namespace WMMerchant\base;

/**
 * Abstract model class
 * Implements some helper method, inspired by Yii framework
 *
 */
class RequestModel {

    /**
     * Checksum string for security check
     *
     * @var string
     */
    public $checksum;

    /**
     * Set attribute value into model
     *
     * @param array  $data    array data, eg $_POST
     * @param array  $excepts Excepts attribute names
     */
    public function setAttributes($data, $excepts = array()) {
        foreach ($data as $key => $value) {
            if (in_array($key, $excepts)) {
                continue;
            }
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    /*
     * Attributes labels
     *
     * @return array $key => $label
     */
    public function attributeLabels() {
        throw new Exception("attributeLabels method is not implemented");

    }

    /**
     * Get all key => value attributes
     *
     * @return array
     */
    public function getAttributes() {
        throw new Exception("getAttributes method is not implemented");
    }

    /**
     * Return attribute names that will be used for encrypting checksum
     *
     * @return array
     */
    public function hashAttributes() {
        throw new Exception("hashAttributes method is not implemented");
    }

    /**
     * Hash checksum data with sha1 algorithm
     *
     * @param  $secret Secret key for encryption
     *
     */
    public function hashChecksum($passcode, $secret) {
        $this->checksum = Security::hashChecksumModel($this, $secret, $passcode);
    }

}
