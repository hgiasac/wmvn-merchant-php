<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-21 14:22:16
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-25 00:30:22
 */

include '../Autoload.php';

use sample\controllers\IndexController;

$ctrl = new IndexController();
$ctrl->run();
