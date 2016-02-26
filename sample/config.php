<?php

function globalConfig() {
    return array(
        'wm_merchant' => array(
            'passcode' => 'M_HASH',
            'secret_key' => 'test@webmoney',
            'production_mode' => false, // true if in production mode
        ),
        'order'  => array(
            'mTransactionID'    => '2345234234234',

            'merchantCode'      => 'WMTEST',
            'custName'          => 'Nguyen Van A',
            'custAddress'       => 'Ho Chi Minh City',
            'custGender'        => 'M',
            'custEmail'         => 'merchant@example.com',
            'custPhone'         => '012345678',
            'cancelURL'         => '',
            'errorURL'          => '',
            'resultURL'         => '',
            'description'       => 'Mua hàng tại merchant ABC',
            'totalAmount'       => 100,
        )
    );
}
