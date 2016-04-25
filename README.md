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

Thư viện yêu cầu passcode, merchant_code và secret_key, do Webmoney cung cấp, nhập vào hàm globalConfig trong file sample/config.php

```php
function globalConfig() {
    return array(
        'wm_merchant' => array(
            'passcode' => 'YOUR PASSCODE',
            'secret_key' => 'YOUR SECRET KEY',
            'merchant_code' => 'YOUR MERCHANT CODE',
            'production_mode' => false, // true if in production mode
        ),
        ...
    );
}
```

Khởi tạo instance với cấu hình yêu cầu

```php
$service = new WMService([
    'wm_merchant' => array(
        'passcode' => 'YOUR PASSCODE',
        'secret_key' => 'YOUR SECRET KEY',
        'merchant_code' => 'YOUR MERCHANT CODE',
        'production_mode' => false, // true if in production mode
    ),
]);
```
Class WMMerchant\WMService gồm có một số phương thức chính:
```php
    /**
     * Create order request
     *
     * @param  WMMerchant\models\CreateOrderRequest $request Request data
     *
     * @return WMMerchant\base\ResponseMmodel           Response model
     */
    public function createOrder($request)
```

Gửi HTTP POST đến Webmoney Merchant để tạo đơn hàng. Thông tin trả về bao gồm Transaction ID của giao dịch trên Webmoney và RedirectURL để chuyển đến cổng thanh toán

```php
/**
     * View order request
     *
     * @param  WMMerchant\models\CreateOrderRequest $request Request data
     *
     * @return WMMerchant\base\ResponseMmodel           Response model
     */
    public function viewOrder($request);
```

Gửi HTTP POST đến Webmoney Merchant để xem thông tin giao dịch.

```php
public string ValidateSuccessURL();
public string ValidateFailedURL();
public string ValidateCanceledURL();
```

Sau khi thanh toán thành công, hoặc giao dịch bị hủy. Cổng thành toán sẽ trả về URL của đối tác, bao gồm transaction ID của đơn hàng và checksum. Lúc đó cần sử dụng những phương thức này để kiểm tra

Giá trị trả về dưới dạng chuỗi string. Nếu chuỗi rỗng tức kiểm tra thành công. Ngược lại chuỗi đó là thông tin lỗi trả về
