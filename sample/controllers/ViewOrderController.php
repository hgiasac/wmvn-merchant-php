<?php
/**
 * @Author: tongeek
 * @Date:   2016-02-21 15:15:38
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-26 23:58:50
 */

namespace sample\controllers;

use sample\inc\Controller;
use WMMerchant\WMService;
use WMMerchant\models\ViewOrderRequest;
use WMMerchant\models\ViewOrderResponse;

/**
 * Create Order controller
 */
class ViewOrderController extends Controller {

    protected function get($result) {

        $form = new ViewOrderRequest();
        $result['form'] = $form;

        return $result;
    }

    protected function post($result) {
        $form = new ViewOrderRequest();
        $form->setAttributes($_POST);

        $service = new WMService($this->config['wm_merchant']);
        $resp = $service->viewOrder($form);

        $result = array(
            'form' => $form,
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

        $this->render('view_order', $result);
    }
}
