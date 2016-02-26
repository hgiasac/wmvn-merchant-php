<?php
/**
 * @Author: tongeek
 * @Date:   2016-02-21 15:15:38
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-26 15:00:22
 */

namespace sample\controllers;

use sample\inc\Controller;
use WMMerchant\WMService;
use WMMerchant\models\CreateOrderRequest;
use WMMerchant\models\CreateOrderResponse;

/**
 * Create Order controller
 */
class ResultController extends Controller {

    protected function applyResult($type, $code) {
        $result = array();
        $service = new WMService($this->config['wm_merchant']);
        $valid = $service->validateResultURL($code);
        if ($valid !== true) {
            $result['error_message'] = $valid;
        } else {
            $result['type'] = $type;
            $result['transaction_id'] = $_GET['transaction_id'];
        }

        return $result;
    }

    public function success() {
        $result = $this->applyResult('success', WMService::SUCCESS_STATUS);
        $this->render('payment_result', $result);
    }

    public function failed() {
        $result = $this->applyResult('failed', WMService::FAILED_STATUS);
        $this->render('payment_result', $result);
    }

    public function cancel() {
        $result = $this->applyResult('cancel', WMService::CANCELED_STATUS);
        $this->render('payment_result', $result);
    }
}