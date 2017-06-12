<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/28/2017
 * Time: 02:20 م
 */

namespace MAAlMOSTAQBAL\MA_Controllers;


use MAAlMOSTAQBAL\MA_LIBS\MA_Actions;
use MAAlMOSTAQBAL\ma_libs\MA_Database\MA_DataBaseHandler;
use MAAlMOSTAQBAL\MA_LIBS\MA_Filter;
use MAAlMOSTAQBAL\MA_Models\MA_MailModel;

class MA_AjaxController extends MA_AbstractController
{

    // Admin users Control Admin Page
    public function MA_Approve_Action(){

        $MA_query = MA_DataBaseHandler::MA_Factory()->MA_Prepare("UPDATE users SET Status = 1 WHERE UserId = ?",array($_GET['Approve_User']))->rowCount();
        $MA_Msg="";
        if ($MA_query > 0){
            $MA_Msg = "<div class='alert alert-success'>تم التفعيل بنجاح</div>";
        } else{
            $MA_Msg = "<div class='alert alert-warning'>لم يكتمل تفعيل العضو</div>";
        }
        echo $MA_Msg;
    }

    public function MA_Delete_Action()
    {
        $MA_Query = MA_DataBaseHandler::MA_Factory()->MA_Prepare("DELETE FROM users WHERE UserId = ?", array($_GET['Delete_User']))->rowCount();
        if ($MA_Query > 0){
            $MA_Msg = "<div class='alert alert-success'>تم حذ العضو بنجاح</div>";
        } else{
            $MA_Msg = "<div class='alert alert-danger'>لم يتم حذف العضو بنجاح</div>";
        }
        echo $MA_Msg;
    }
    //.End

    //
    public function MA_Contact_Action()
    {
        $Name = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['n']);
        $Email = MA_Filter::MA_FILTER_INPUT_POST_EMAIL($_POST['e']);
        $MA_Sub = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['s']);
        $MA_Msg = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['m']);
        $MA_Mail = MA_MailModel::MA_INSERT_QUERY([$Name,$Email,$MA_Sub,$MA_Msg]);
        if ($MA_Mail > 0)
        {
            $MA_Msg = "<div class='alert alert-success'>تم إرسال الرسالة بنجاح</div>";
        }
        else
        {
            $MA_Msg = "<div class='alert alert-danger'>لم يتم إرسال الرسالة</div>";
        }
        echo $MA_Msg;
    }
}