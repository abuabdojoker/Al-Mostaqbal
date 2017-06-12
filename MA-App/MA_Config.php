<?php 
namespace MA\MA_LIBS;


if (!defined('MA_DS')) {
	define('MA_DS', DIRECTORY_SEPARATOR);
}
/*
 * The Follow Url
 */
define("MA_REFERER",@$_SERVER['HTTP_REFERER']);
/*
 * Application Constants 
 */
define('MA_APP_PATH', dirname(realpath(__FILE__)));

/*
 * Views Constants
 */
define('MA_VIEWS_PATH', MA_APP_PATH . MA_DS . 'MA_Views' . MA_DS);

/*
 * Template Constants
 */
define('MA_TEMP_PATH', MA_APP_PATH . MA_DS . 'MA_Template' . MA_DS);

/*
 * DataBase Configure.
 */
defined("MA_DATABASE_HOST_NAME")   ? null : define("MA_DATABASE_HOST_NAME", "localhost");
defined("MA_DATABASE_USER_NAME")   ? null : define("MA_DATABASE_USER_NAME", "root");
defined("MA_DATABASE_PASSWORD")    ? null : define("MA_DATABASE_PASSWORD", "");
defined("MA_DATABASE_DB_NAME")     ? null : define("MA_DATABASE_DB_NAME", "almostaqbal");
defined("MA_DATABASE_PORT_NUMBER") ? null : define("MA_DATABASE_PORT_NUMBER", 3386);
defined("MA_DATABASE_CONN_DRIVER") ? null : define("MA_DATABASE_CONN_DRIVER", 1);