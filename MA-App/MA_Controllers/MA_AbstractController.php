<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/16/2017
 * Time: 04:33 م
 */

namespace MAAlMOSTAQBAL\MA_Controllers;
use MAAlMOSTAQBAL\MA_LIBS\MA_FrontController;
use MAAlMOSTAQBAL\MA_LIBS\MA_Sessions;

class MA_AbstractController
{
	protected $_MA_Controller;
	protected $_MA_Action;
	protected $_MA_Params;
	protected $_MA_Profile;

	protected $_MA_Data = [];

    public function MA_NotFound_Action(){
       $this->_MA_View();
       // echo "This Page Is Not Found";
    }

    public function setMAController($MA_Controller_Name){
    	$this->_MA_Controller = $MA_Controller_Name;
    }

    public function setMAProfile($MA_Username)
    {
        $this->_MA_Profile = $MA_Username;
    }

    public function setMAAction($MA_Action){
    	$this->_MA_Action = $MA_Action;
    }

    public function setMAParams($MA_Params){
    	$this->_MA_Params = $MA_Params;
    }

    protected function _MA_View($MA_Admin = null)
    {
        if ($this->_MA_Action == MA_FrontController::MA_NOT_FOUND_ACTION)
        {
    		require_once MA_VIEWS_PATH . 'MA_NotFound'. MA_DS . 'NotFound.MA.View.php';
    	}
    	else
    	{
    	    $MA_View = MA_VIEWS_PATH . 'MA_' . ucfirst($this->_MA_Controller). MA_DS . ucfirst($this->_MA_Action) .'.MA.View.php';
    	    $MA_Admin_View = MA_VIEWS_PATH . "MA_Admin" .MA_DS. 'MA_' .ucfirst($this->_MA_Controller) .MA_DS .  ucfirst($this->_MA_Action) .'.MA.View.php';

            if (file_exists($MA_View) or file_exists($MA_Admin_View)){
                extract($this->_MA_Data);
                if ($MA_Admin != null){
                    MA_Sessions::MA_Start();
                    require_once MA_TEMP_PATH . "MA_Temp_Admin/MA-Header.php"; // This Is The Admin Header File.

                    require_once $MA_Admin_View; // This Is The Admin View Content.

                    require_once MA_TEMP_PATH  . "MA_Temp_Admin/MA-Footer.php"; // This Is The Admin Footer File.
                }
                else
                {
                    require_once MA_TEMP_PATH . "MA_Temp/MA-Header.php"; // This Is The Header File.

                    require_once $MA_View; // This Is The View Content.

                    require_once MA_TEMP_PATH . "MA_Temp/MA_Footer.php"; // This Is The Footer File.
                }
            } else{
                require_once MA_VIEWS_PATH . 'MA_NotFound'. MA_DS . 'NotFound.MA.View.php';
            }
        }
    	
    }



}