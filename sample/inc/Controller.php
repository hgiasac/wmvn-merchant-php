<?php

namespace sample\inc;

require_once "config.php";


/**
 * Base controller
 */
class Controller {

    public $config;

    function __construct() {
        $this->config = globalConfig();
    }

    public function render($view_name, $result = null) {
        $view_dir = 'views';
        $header_path = BASE_DIR . DIRECTORY_SEPARATOR . $view_dir . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . 'header.php';
        $footer_path = BASE_DIR . DIRECTORY_SEPARATOR . $view_dir . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . 'footer.php';
        $view_path = BASE_DIR . DIRECTORY_SEPARATOR . $view_dir . DIRECTORY_SEPARATOR . $view_name . '.php';

        include $header_path;
        include $view_path;
        include $footer_path;
    }

    public function renderPartial($view_name, $result = null) {
        $view_dir = 'views';
        $view_path = BASE_DIR . DIRECTORY_SEPARATOR . $view_dir . DIRECTORY_SEPARATOR . $view_name . '.php';

        include $view_path;
    }
}
