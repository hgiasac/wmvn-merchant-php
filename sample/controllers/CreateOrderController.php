<?php
/**
 * @Author: tongeek
 * @Date:   2016-02-21 15:15:38
 * @Last Modified by:     hgiasac
 * @Last Modified time: 2 2016-03-01 14:10:08
 */

namespace sample\controllers;

use sample\inc\Controller;
use WMMerchant\WMService;
use WMMerchant\base\NetHelper;
use WMMerchant\models\CreateOrderRequest;
use WMMerchant\models\CreateOrderResponse;

/**
 * Create Order controller
 */
class CreateOrderController extends Controller {

    protected function get($result) {

        $model = new CreateOrderRequest();
        $model->setAttributes($this->config['order']);
        $model->mTransactionID = time();
        $model->resultURL = NetHelper::getBaseURL() . '/success.php';
        $model->cancelURL = NetHelper::getBaseURL() . '/cancel.php';
        $model->errorURL = NetHelper::getBaseURL() . '/failed.php';
        $result['order'] = $model;

        return $result;
    }

    protected function post($result) {
        $model = new CreateOrderRequest();
        $model->setAttributes($_POST);

        $service = new WMService($this->config['wm_merchant']);
        $resp = $service->createOrder($model);

        $result = array(
            'order' => $model,
            'response' => $resp,
        );

        return $result;
    }

    public function run() {
        $result = array();

        if (!empty($_POST)) {
            $result = $this->post($result);
        } else {
            $result = $this->get($result);
        }

        $this->render('create_order', $result);
    }
}
