<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-21 14:42:57
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-28 09:41:03
 */

namespace WMMerchant\base;

use WMMerchant\base\Model;

/**
 * Abstract model class
 * Implements some helper method, inspired by Yii framework
 *
 */
class RequestModel extends Model {

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
