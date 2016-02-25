<?php
/**
 * @Author: tongeek
 * @Date:   2016-02-21 15:15:38
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-25 00:06:44
 */

namespace sample\controllers;

use sample\inc\Controller;

/**
 * Index controller
 */
class IndexController extends Controller {

    public function run() {
        $result = array();

        $this->render('index');
    }
}
