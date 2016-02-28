<div class="container">
    <div class="jumbotron">
        <h2><b>Webmoney Vietnam Merchant PHP Sample Code</b></h2>
        <p>&nbsp;</p>
        <p>Đây là thư viện sample code để tích hợp giao tiếp với cổng thanh toán Webmoney Merchant API, dành cho các đối tác của Webmoney Vietnam</p>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <h2>Yêu cầu</h2>
            <ul>
                <li>PHP 5.3+</li>
                <li>Curl và php-curl</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>Hướng dẫn sử dụng</h2>
            <p>Tải về và đặt trong thư mục chính của project (hoặc thư mục mà autoload có thể include được)</p>
            <p>WMService yêu cầu passcode và secret_key, do Webmoney cung cấp</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>Sample code</h2>
            <p>Thư viện yêu cầu passcode và secret_key, do Webmoney cung cấp, nhập vào hàm globalConfig trong file sample/config.php</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
    <pre><span class="pl-s1"><span class="pl-k">function</span> <span class="pl-en">globalConfig</span>() {</span>
<span class="pl-s1">    <span class="pl-k">return</span> <span class="pl-c1">array</span>(</span>
<span class="pl-s1">        <span class="pl-s"><span class="pl-pds">'</span>wm_merchant<span class="pl-pds">'</span></span> <span class="pl-k">=&gt;</span> <span class="pl-c1">array</span>(</span>
<span class="pl-s1">            <span class="pl-s"><span class="pl-pds">'</span>passcode<span class="pl-pds">'</span></span> <span class="pl-k">=&gt;</span> <span class="pl-s"><span class="pl-pds">'</span>YOUR PASSCODE<span class="pl-pds">'</span></span>,</span>
<span class="pl-s1">            <span class="pl-s"><span class="pl-pds">'</span>secret_key<span class="pl-pds">'</span></span> <span class="pl-k">=&gt;</span> <span class="pl-s"><span class="pl-pds">'</span>YOUR SECRET KEY<span class="pl-pds">'</span></span>,</span>
<span class="pl-s1">            <span class="pl-s"><span class="pl-pds">'</span>production_mode<span class="pl-pds">'</span></span> <span class="pl-k">=&gt;</span> <span class="pl-c1">false</span>, <span class="pl-c">// true if in production mode</span></span>
<span class="pl-s1">        ),</span>
<span class="pl-s1">        <span class="pl-k">...</span></span>
<span class="pl-s1">    );</span>
<span class="pl-s1">}</span></pre>
        </div>
    </div>
</div>
