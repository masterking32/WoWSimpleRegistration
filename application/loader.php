<?php
/**
 * @author Amin Mahmoudi (MasterkinG)
 * @copyright    Copyright (c) 2019 - 2021, MasterkinG32. (https://masterking32.com)
 * @link    https://masterking32.com
 * @Description : It's not masterking32 framework !
 **/

use voku\helper\AntiXSS;

ob_start();
header('X-Powered-Framework:MasterkinG-Framework');
header('X-Powered-CMS:MasterkinG-CMS');
session_start();
define('base_path', str_replace('application/loader.php', '', str_replace("\\", '/', __FILE__)));
define('app_path', str_replace('application/loader.php', '', str_replace("\\", '/', __FILE__)) . 'application/');
require_once app_path . 'vendor/autoload.php';
require_once app_path . 'config/config.php';
require_once app_path . 'include/core_handler.php';
require_once app_path . 'include/functions.php';

/* Configuration check */
if(!get_config('disable_changepassword') && get_config('soap_for_register'))
{
	$config['disable_changepassword'] = true;
}

if (get_config('debug_mode')) {
    @error_reporting(-1);
    @ini_set('display_errors', 1);
} else {
    @ini_set('display_errors', 0);
    if (version_compare(PHP_VERSION, '5.3', '>=')) {
        @error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
    } else {
        @error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
    }
}

require_once app_path . 'include/database.php';
require_once app_path . 'include/user.php';
require_once app_path . 'include/vote.php';
require_once app_path . 'include/status.php';

if (!preg_match('/^([a-z-]+)$/i', strtolower(get_config('language'))) || !file_exists(app_path . 'language/' . strtolower(get_config('language')) . '.php')) {
    die('Language is not valid!');
}

require_once app_path . 'language/' . strtolower(get_config('language')) . '.php';

$antiXss = new AntiXSS();
if (!empty(get_config('script_version'))) {
    /* @TODO Add online version check! */
    if (version_compare(get_config('script_version'), '2.0.1', '<')) {
        echo 'Use last version of config.php file.';
        exit();
    }
} else {
    echo 'Use last version of config.php file.';
    exit();
}

if ($config['srp6_support'] == true && !extension_loaded('gmp')) {
    echo 'Please enable GMP in your php.ini';
    exit();
}

if ($config['soap_for_register'] == true && !extension_loaded('soap')) {
    echo 'Please enable SOAP in your php.ini';
    exit();
}

database::db_connect();