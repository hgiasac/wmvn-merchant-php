<?php
/**
 * @Author: toan.nguyen
 * @Date:   2016-02-21 14:22:16
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-28 22:05:01
 */
require_once '../Autoload.php';

use sample\controllers\ProductController;

$ctrl = new ProductController();
$ctrl->index();
