<?php
/**
 * @Author: tongeek
 * @Date:   2016-02-21 15:15:38
 * @Last Modified by:     hgiasac
 * @Last Modified time: 2 2016-03-01 13:52:57
 */

namespace sample\controllers;

use sample\inc\Controller;
use WMMerchant\WMService;
use WMMerchant\models\CreateOrderRequest;
use WMMerchant\models\CreateOrderResponse;
use WMMerchant\models\ViewOrderRequest;


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

            return $this->render('error', $result);
        } else {
            $result['type'] = $type;
            $result['transaction_id'] = $_GET['transaction_id'];

            $form = new ViewOrderRequest;
            $form->mTransactionID = $_GET['transaction_id'];
            $resp = $service->viewOrder($form);

            $result['response'] = $resp;
        }

        $this->render('payment_result', $result);
    }

    public function success() {
        $this->applyResult('success', WMService::SUCCESS_STATUS);
    }

    public function failed() {
        $this->applyResult('failed', WMService::FAILED_STATUS);
    }

    public function cancel() {
        $this->applyResult('cancel', WMService::CANCELED_STATUS);
    }
}
