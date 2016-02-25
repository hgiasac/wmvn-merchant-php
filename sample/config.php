<?php

function globalConfig() {
    return array(
        'passcode' => 'M_HASH',
        'secret_key' => 'test@webmoney',
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
            'resultURL'         => 'localhost:8080',
            'description'       => 'Mua hàng tại merchant ABC',
            'totalAmount'       => 100,
        )
    );
}
