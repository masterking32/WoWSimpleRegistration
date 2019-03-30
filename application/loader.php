<?php
/**
 * @author Amin Mahmoudi (MasterkinG)
 * @copyright	Copyright (c) 2019 - 2022, MsaterkinG32 Team, Inc. (https://masterking32.com)
 * @link	https://masterking32.com
 * @Description : It's not masterking32 framework !
 **/
use voku\helper\AntiXSS;
ob_start();
header("X-Powered-Framework:MasterkinG-Framework");
header("X-Powered-CMS:MasterkinG-CMS");
session_start();
define('ENVIRONMENT', 'production');
switch (ENVIRONMENT)
{
    case 'development':
        @error_reporting(-1);
        @ini_set('display_errors', 1);
        break;
    case 'production':
        @ini_set('display_errors', 0);
        if (version_compare(PHP_VERSION, '5.3', '>='))
        {
            @error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        }
        else
        {
            @error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
        }
        break;
    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1);
}
define('base_path',str_replace("application/loader.php","",str_replace("\\","/",__FILE__)));
define('app_path',str_replace("application/loader.php","",str_replace("\\","/",__FILE__))."application/");
require_once app_path.'vendor/autoload.php';
require_once app_path.'config/config.php';
require_once app_path.'include/functions.php';
require_once app_path.'include/database.php';
require_once app_path.'include/user.php';
require_once app_path.'include/status.php';
$antiXss = new AntiXSS();
if(!empty(get_config('script_version')))
{
    /* @TODO New Version Checker */
}else{
    echo "Use last version of config.php file.";
    exit();
}
database::db_connect();