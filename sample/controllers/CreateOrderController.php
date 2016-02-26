<?php
/**
 * @Author: tongeek
 * @Date:   2016-02-21 15:15:38
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-25 23:07:15
 */

namespace sample\controllers;

use sample\inc\Controller;
use WMMerchant\WMService;
use WMMerchant\models\CreateOrderRequest;
use WMMerchant\models\CreateOrderResponse;

/**
 * Create Order controller
 */
class CreateOrderController extends Controller {

    protected function get($result) {

        $model = new CreateOrderRequest();
        $model->setAttributes($this->config['order']);
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
