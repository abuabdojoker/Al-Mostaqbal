<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/16/2017
 * Time: 04:33 م
 */

namespace MAAlMOSTAQBAL\MA_Controllers\MA_Admin;

use MAAlMOSTAQBAL\MA_LIBS\MA_Actions;
use MAAlMOSTAQBAL\MA_LIBS\MA_FrontController;
use MAAlMOSTAQBAL\MA_LIBS\MA_Sessions;

class MA_AbstractController
{
	protected $_MA_Controller;
	protected $_MA_Action;
	protected $_MA_Params;

	protected $_MA_Data = [];

    public function MA_NotFound_Action(){
       $this->_MA_View();
    }

    /**
     * @param $MA_Controller_Name
     */
    public function setMAController($MA_Controller_Name){
    	$this->_MA_Controller = $MA_Controller_Name;
    	if ($MA_Controller_Name == "login"){
    	    if ($this->setSession()){
    	        MA_Actions::MA_Redirect("/admin");
            }
        } else{
    	    if (!$this->setSession()){
    	        MA_Actions::MA_Redirect("/admin/login");
            }
        }
    }

    /**
     * @param $MA_Action
     */
    public function setMAAction($MA_Action){
    	$this->_MA_Action = $MA_Action;
    }

    /**
     * @param $MA_Params
     */
    public function setMAParams($MA_Params){
    	$this->_MA_Params = $MA_Params;
    }


    /**
     * This For Set Session To Used It In All Controller
     * To Know Is The Session Are Found Or Not.
     * @return bool
     */
    public function setSession()
    {
        return MA_Sessions::MA_isIsset("MA_ADMIN_SESSION") ? true : false;
    }
    /**
     *
     */
    protected function _MA_View()
    {
        if ($this->_MA_Action == MA_FrontController::MA_NOT_FOUND_ACTION) {
            require_once MA_VIEWS_PATH . 'MA_NotFound' . MA_DS . 'NotFound.MA.View.php';
        } else {
            $MA_Admin_View = MA_VIEWS_PATH . 'MA_Admin' . MA_DS . 'MA_' . ucfirst($this->_MA_Controller) . MA_DS . ucfirst($this->_MA_Action) . '.MA.View.php';

            if (file_exists($MA_Admin_View)) {
                extract($this->_MA_Data);
                require_once MA_TEMP_PATH . "MA_Temp_Admin/MA-Header.php"; // This Is The Admin Header File.
                if ($this->_MA_Controller != "login") {
                    require_once MA_TEMP_PATH . "MA_Temp_Admin/MA-NavBar.php";
                }
                require_once $MA_Admin_View; // This Is The Admin View Content.
                if ($this->_MA_Controller != "login")
                    require_once MA_TEMP_PATH . "MA_Temp_Admin/MA-Footer.php"; // This Is The Admin Footer File.
            } else {
                require_once MA_VIEWS_PATH . 'MA_NotFound' . MA_DS . 'NotFound.MA.View.php';
            }
        }
    }


}