<?php

define('BASE_DIR', __DIR__);

function globalConfig() {
    return array(
        'wm_merchant' => array(
            'passcode' => 'M_HASH',
            'secret_key' => 'M_SECRET_KEY',
            'merchant_code' => 'WMTEST',
            'production_mode' => false, // true if in production mode
        ),

        'order'  => array(
            'mTransactionID'    => '2345234234234',
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
        ),
        'products' => [
            'iphone6s' => [
                'product_name'  => 'Apple IPhone 6S 64GB',
                'image_name'     => 'iphone6s.png',
                'total_amount'   => 200,
                'description'   => 'Với những người dùng yêu thích điện thoại iPhone, chắc hẳn hầu hết đều có thói quen lưu giữ một lượng lớn hình ảnh cũng như video clip cá nhân trong máy để có thể xem lại bất cứ lúc nào những khoảnh khắc đáng nhớ mình đã trải qua trong cuộc sống. Đặc biệt với iPhone 6s, chiếc điện thoại mới nhất của&nbsp; Apple nay đã được hãng này nâng cấp camera lên đến 12MP, camera trước 5MP cùng nhiều công nghệ chụp ảnh mới thì chắc chắn số lượng hình ảnh mà bạn cần lưu giữ sẽ tăng lên gấp bội. Như vậy chúng ta cần có một chiếc điện thoại với bộ nhớ trong lớn hơn nữa vì iPhone không hỗ trợ thẻ nhớ ngoài nên phiên bản iPhone 6s 64GB này là lựa chọn sáng suốt.'
            ],
            'iphone6sp' => [
                'product_name'  => 'Apple IPhone 6S Plus 64GB',
                'image_name'     => 'iphone6sp.png',
                'total_amount'   => 220,
                'description'   => 'Tất cả các dòng luôn được giới công nghệ trên toàn thế giới săn đón và hứng thú, và bộ đôi Iphone 6S/ Iphone 6S Plus cũng vậy. Là hai chiếc điện thoại được trông chờ nhất cuối năm nay, cuối cùng Apple đã trình làng iPhone 6S và iPhone 6 Plus. So với người tiền nhiệm iPhone 6 Plus thì máy được nâng cấp hơn về phần cứng và trải nghiệm người dùng cùng camera lên đến 12 MP. Về thiết kế của máy hầu như không có sự thay đổi ngoại trừ việc Apple đã cho tung ra phiên bản màu vàng hồng, phiên bản đang tạo nên cơn sốt cho các tín đồ iPhone trên toàn thế giới.'
            ],
            'iphone5s'          => [
                'product_name'  => 'Apple IPhone 5S 16GB',
                'image_name'    => 'iphone5s.png',
                'total_amount'   => 85,
                'description'   => 'Tiên phong trong việc phát triển công nghệ 64 bit, Apple đem đến cho khách hàng một tuyệt phẩm công nghệ <strong>iP</strong><strong>hone 5S 16GB&nbsp;Gold</strong> khi kết hợp giữa thiết kế vỏ ngoài cao cấp và bộ xử lý bên trong mạnh mẽ. <strong>iP</strong><strong>hone 5S 16GB&nbsp;Gold </strong>áp dụng tính năng nhận diện dấu vân tay, cải tiến đèn LED Flash đôi - một công nghệ đi trước thời đại. Không giống như hướng phát triển khác, đó không phải là sự phát triển tràn lan. Đó là một sản phẩm tuyệt đẹp - siêu phẩm <strong>iP</strong><strong>hone 5S 16GB&nbsp;Gold</strong>.'
            ]
        ]
    );
}
