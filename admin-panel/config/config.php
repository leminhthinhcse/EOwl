<?php 

//Note: This file should be included first in every php page.

define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_FOLDER','simpleadmin');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));

date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once BASE_PATH.'/lib/MysqliDb.php';

/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
*/

define('DB_HOST', "mysql.hostinger.vn");
define('DB_USER', "u312006781_eowl");
define('DB_PASSWORD', "E2018owl");
define('DB_NAME', "u312006781_eowl");

/**
* Get instance of DB object
*/
function getDbInstance(){
	return new MysqliDb(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 
}