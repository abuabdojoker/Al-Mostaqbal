<?php
namespace MAAlMOSTAQBAL;
use MAAlMOSTAQBAL\MA_LIBS\MA_FrontController;
use MAAlMOSTAQBAL\MA_LIBS\MA_Sessions;

if (!defined('MA_DS')) {
	define('MA_DS',DIRECTORY_SEPARATOR);
}

require_once '..' . MA_DS . 'MA-App' . MA_DS . 'MA_Config.php';
require_once MA_APP_PATH . MA_DS . 'ma_libs' . MA_DS . 'MA_AutoLoad.php';

$MaFrontController = new MA_FrontController();
$MA_Session = new MA_Sessions();
$MA_Session->start();
$MaFrontController->MA_DisPatch();





