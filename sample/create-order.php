<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-21 14:22:16
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-25 00:52:11
 */
require_once '../Autoload.php';

use sample\controllers\CreateOrderController;

$ctrl = new CreateOrderController();
$ctrl->run();
