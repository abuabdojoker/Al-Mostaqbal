<?php
namespace MAAlMOSTAQBAL\MA_LIBS;
use MAAlMOSTAQBAL\ma_libs\MA_Database\MA_DataBaseHandler;

/**
* 
*/
class MA_FrontController
{
	const MA_NOT_FOUND_ACTION = "MA_NotFound_Action";
	const MA_NOT_FOUND_CONTROLLER = "MAAlMOSTAQBAL\\MA_Controllers\\MA_NotFoundController";

	private $_MA_Profile ;
	private $_MA_Controller = "index";
	private $_MA_Action = "index";
    private $_MA_Params = array();
    private $_MA_Admin;

    public function __construct(){
		$this->_MA_ParseUrl();
	}

	private function _MA_ParseUrl()
	{

		$MA_Url = explode('/', trim( parse_url( $_SERVER['REQUEST_URI'] , PHP_URL_PATH ) , '/' ) , 3);
		$MA_Url_Admin = explode('/', trim( parse_url( $_SERVER['REQUEST_URI'] , PHP_URL_PATH ) , '/' ) , 4);
        if ($MA_Url[0] == "admin")
		{
            $this->_MA_Admin = $MA_Url_Admin[0] ;
            if (isset($MA_Url_Admin[1]) && $MA_Url_Admin[1] != '') {
                $this->_MA_Controller = $MA_Url_Admin[1];
            }

            if (isset($MA_Url_Admin[2]) && $MA_Url_Admin[2] != '') {
                $this->_MA_Action = $MA_Url_Admin[2];
            }

            if (isset($MA_Url_Admin[3]) && $MA_Url_Admin[3] != '') {
                $this->_MA_Params = explode('/', $MA_Url_Admin[3]);
            }
        }
        else
        {
            if (isset($MA_Url[0]) && $MA_Url[0] != '') {
                $this->_MA_Controller = $MA_Url[0];
            }

            if (isset($MA_Url[1]) && $MA_Url[1] != '') {
                $this->_MA_Action = $MA_Url[1];
            }

            if (isset($MA_Url[2]) && $MA_Url[2] != '') {
                $this->_MA_Params = explode('/', $MA_Url[2]);
            }
        }
	}
	public function MA_DisPatch(){

        $MA_Controller_Class_Admin_Name = 'MAAlMOSTAQBAL\MA_Controllers\\MA_Admin\\MA_' . ucfirst($this->_MA_Controller) . "Controller";
		$MA_Controller_Class_Name = 'MAAlMOSTAQBAL\MA_Controllers\\MA_' . ucfirst($this->_MA_Controller) . "Controller";
		$MA_Action_Name = 'MA_' . ucfirst($this->_MA_Action) . '_Action';

		$MA_Session = new MA_Sessions();

		if ($this->_MA_Admin == "admin")
		{

            if (!class_exists($MA_Controller_Class_Admin_Name)){
                $MA_Controller_Class_Admin_Name = self::MA_NOT_FOUND_CONTROLLER;
            }

            $MA_Admin_Controller = new $MA_Controller_Class_Admin_Name();

            /*
             * set Not Found View For Admin Requests
             */
            if (!method_exists($MA_Admin_Controller,$MA_Action_Name)){
                $this->_MA_Action = $MA_Action_Name = self::MA_NOT_FOUND_ACTION;
            }

            /*
             * Set Admin Path
             */

            $MA_Admin_Controller->setMAController($this->_MA_Controller);
            $MA_Admin_Controller->setMAAction($this->_MA_Action);
            $MA_Admin_Controller->setMAParams($this->_MA_Params);
            $MA_Admin_Controller->$MA_Action_Name();


        }
        else
        {
            if (!class_exists($MA_Controller_Class_Name)) {
                $MA_Controller_Class_Name = self::MA_NOT_FOUND_CONTROLLER;
            }

            $MA_Controller = new $MA_Controller_Class_Name();

            /*
             * set Not Found View For Users Requests
             */
            if (!method_exists($MA_Controller, $MA_Action_Name)) {
                $this->_MA_Action = $MA_Action_Name = self::MA_NOT_FOUND_ACTION;
            }

            $MA_Controller->setMAController($this->_MA_Controller);
            $MA_Controller->setMAProfile($this->_MA_Profile);
            $MA_Controller->setMAAction($this->_MA_Action);
            $MA_Controller->setMAParams($this->_MA_Params);
            $MA_Controller->$MA_Action_Name();
        }

	}
}