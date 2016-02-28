<?php
/**
 * @Author: tongeek
 * @Date:   2016-02-21 15:15:38
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-28 22:06:37
 */

namespace sample\controllers;

use sample\inc\Controller;
use WMMerchant\WMService;

use sample\models\Product;
use WMMerchant\models\CreateOrderRequest;
use WMMerchant\models\CreateOrderResponse;

/**
 * Create Order controller
 */
class ProductController extends Controller {

    public function index() {

        $products = [];
        foreach ($this->config['products'] as $code => $prod) {
            $product = new Product;
            $product->product_code = $code;
            $product->setAttributes($prod);

            array_push($products, $product);
        }
        $result['products'] = $products;

        $this->render('product/index', $result);
    }

    public function purchase() {
        $result = [];
        $product_code = $_GET['product_code'];

        if (empty($this->config['products'][$product_code])) {
            $result['error_message'] = 'Không tìm thấy sản phẩm';
            $this->render('error', $result);
        } else {
            $product = new Product;
            $form = new CreateOrderRequest();
            $product->setAttributes($this->config['products'][$product_code]);

            $result = array(
                'product' => $product,
                'form' => $form,
            );

            if (!empty($_POST)) {
                $result = $this->purchasePost($result);
            }

            $this->render('product/purchase', $result);
        }
    }

    protected function purchasePost($result) {
        $product = $result['product'];
        $model = $result['form'];

        $model->setAttributes($_POST);
        $model->mTransactionID = $model->createUniqueOrderId('IP');
        $model->description = $product->product_name;
        $model->totalAmount = $product->total_amount;

        $service = new WMService($this->config['wm_merchant']);
        $resp = $service->createOrder($model);

        if (!$resp->isError()) {
            header("Location: " . $resp->object->redirectURL);
            die();
        }

        $result['response'] = $resp;

        return $result;
    }
}
