<?php
/**
 * @Author: hgiasac
 * @Date:   2016-02-25 00:23:58
 * @Last Modified by:   hgiasac
 * @Last Modified time: 2016-02-25 00:51:02
 */


class Autoloader {

    static public function loader($className) {
        $filename = str_replace('\\', '/', $className) . '.php';
        $file_path = getcwd() . '/../' . $filename;

        if (file_exists($file_path)) {

            include($file_path);
            if (class_exists($className)) {
                return TRUE;
            }
        }
        return FALSE;
    }
}

spl_autoload_register('Autoloader::loader');
