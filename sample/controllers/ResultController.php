<?php
/**
 * @Author: tongeek
 * @Date:   2016-02-21 15:15:38
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-29 16:48:40
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
        $valid = $service->validateResultURL($code);
        if ($valid !== true) {
            $result['error_message'] = $valid;

            return $this->render('error', $result);
        } else {
            $result['type'] = $type;
            $result['transaction_id'] = $_GET['transaction_id'];

            $service = new WMService($this->config['wm_merchant']);
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
