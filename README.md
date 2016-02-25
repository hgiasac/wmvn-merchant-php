# wmvn-merchant-php
===================
Webmoney Vietnam Merchant PHP SDK. Đây là thư viện tích hợp để giao tiếp với cổng thanh toán Webmoney Merchant API, dành cho các đối tác của Webmoney Vietnam


Yêu cầu
------------
- PHP 5.3+
- Curl và php-curl


Hướng dẫn sử dụng
-----------------------

Tải về và đặt trong thư mục chính của project (hoặc thư mục mà autoload có thể include được)

Sample code
---------------

Thư viện yêu cầu passcode và secret_key, do Webmoney cung cấp, nhập vào hàm globalConfig trong file sample/config.php

```function globalConfig() {
    return array(
        'passcode' => 'YOUR PASSCODE',
        'secret_key' => 'YOUR SECRET KEY',
        ...
    );
}
