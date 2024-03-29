<?php
/**
 * This makes our life easier when dealing with paths.
 * Everything is relative
 * to the application root now.
 */
//use Application\Model\Application;

chdir(dirname(__DIR__));

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(1);

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER ['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}
define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));

// Setup autoloading
require 'init_autoloader.php';
session_start();
// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();