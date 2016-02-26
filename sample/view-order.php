<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-21 14:22:16
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-26 23:56:50
 */
require_once '../Autoload.php';

use sample\controllers\ViewOrderController;

$ctrl = new ViewOrderController();
$ctrl->run();
