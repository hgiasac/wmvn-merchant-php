<?php

namespace WMMerchant\base;

/**
 * Security helper methods
 * Used for encrypting checksum
 */
class Security {

    /**
     * Join all properties values from model as string
     *
     * @param  Model $model     Model to be hashed
     * @return string           Result Hash string
     */
    public static function joinHashText($model) {
        $plainString = '';
        $attributes = $model->hashAttributes();

        foreach ($attributes as $key) {
            $plainString = $plainString . $model->$key;
        }

        return $plainString;
    }

    /**
     * Hash checksum from model data, with secret key as salt
     * Concatenates all property, except checksum, then uses hash_hmac with secret key
     *
     * @param  Model $model     Class model to be hashed
     * @param  string $secret   Secret key
     * @return string           Result Hash string
     */
    public static function hashChecksumModel($model, $secret, $passcode = "") {

        if ($model == null) {
            throw new \Exception("Can not hash null Model");
        }
        $plainString = '';
        $attributes = $model->hashAttributes();

        foreach ($attributes as $key) {
            $plainString = $plainString . $model->$key;
        }

        if (!empty($passcode)) {
            $plainString = $plainString . $passcode;
        }
        return self::hashChecksum($plainString, $secret);
    }

    /**
     * Hash checksum from string, with secret key as salt
     * Concatenates all property, except checksum, then uses hash_hmac with secret key
     *
     * @param  string $text     Input text
     * @param  string $secret   Secret key
     * @return string           Result Hash string
     */
    public static function hashChecksum($text, $secret) {
        $hash =  hash_hmac('sha1', $text, $secret);

        return strtoupper($hash);
    }

    /**
     * Validates checksum
     *
     * @param  string $checksum Checksum hash
     * @param  string $text     The plain text to validate
     * @param  string $secret   The secret key which is provided by webmoney
     * @return boolean          Is checksum valid
     */
    public static function validateChecksum($checksum, $text, $secret) {
        $value = self::hashChecksum($text, $secret);
        return $checksum === $value;
    }

    /**
     * Validates checksum model
     *
     * @param  string $checksum Checksum hash
     * @param  string $model    The response model need to be validated
     * @param  string $secret   The secret key which is provided by webmoney
     * @param  string $passcode The passcode which is provided by webmoney
     * @return boolean          Is checksum valid
     */
    public static function validateChecksumModel($checksum, $model, $secret, $passcode = "") {
        $value = self::hashChecksumModel($model, $secret, $passcode);
        return $checksum === $value;
    }
}
