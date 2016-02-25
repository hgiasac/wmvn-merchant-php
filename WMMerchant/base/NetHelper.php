<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-25 09:18:45
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-25 14:05:22
 */

namespace WMMerchant\base;

/**
 * Network helper class
 */
class NetHelper {

    /*
     * Get IP address from client
     */
    public static function getIPAddress()
    {
        //Get User IP Address
        $ip_address = null;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        return $ip_address;
    }
}
