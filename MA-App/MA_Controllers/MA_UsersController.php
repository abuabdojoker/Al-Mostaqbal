<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/18/2017
 * Time: 03:18 م
 */

namespace MAAlMOSTAQBAL\MA_Controllers;


use MAAlMOSTAQBAL\MA_Models\MA_UsersModel;

class MA_UsersController extends MA_AbstractController
{

    public function MA_Index_Action()
    {
        $this->_MA_View();
    }
    public function MA_Edit_Action()
    {
        if (isset($_POST['MA_LOGIN'])){
            $MA_Params = array($_POST['Username'],$_POST['Email']);
            $MA_Edit = MA_UsersModel::MA_Update($this->_MA_Params[0],$MA_Params);
            if ($MA_Edit > 0){
                $MA_Msg = "<div class='alert alert-success'>تم تحديث بياناتك بنجاح</div>";
            } else{
                $MA_Msg = "<div class='alert alert-danger'>عفوا! لم يتم تحديث البياناتك</div>";
            }
        }
        $this->_MA_Data['MA_Edit'] = $MA_Msg;
        $this->_MA_View();
    }

}