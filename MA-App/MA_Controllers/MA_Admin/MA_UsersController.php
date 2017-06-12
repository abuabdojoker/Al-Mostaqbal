<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/27/2017
 * Time: 03:41 م
 */

namespace MAAlMOSTAQBAL\MA_Controllers\MA_Admin;


use MAAlMOSTAQBAL\ma_libs\MA_Database\MA_DataBaseHandler;
use MAAlMOSTAQBAL\ma_libs\MA_Filter;
use MAAlMOSTAQBAL\MA_Models\MA_UsersModel;

class MA_UsersController extends MA_AbstractController
{

    public function MA_index_Action()
    {

        $this->_MA_Data['MA_Page_Name'] = "المستخدمون";
        $this->_MA_Data['MA_getAllUsers'] = MA_UsersModel::MA_getAll();
        $this->_MA_View();
    }

    public function MA_Delete_Action()
    {
        // Have An Edit Because Is not Completed


//       $this->_MA_Data['MA_Delete_User'] = $MA_Delete;
//        header("Location: /admin/users");
    }
    
    public function MA_Approve_Action()
    {
          $MA_Approve = MA_DataBaseHandler::MA_Factory()->MA_Prepare("UPDATE users SET Status = 0001 WHERE UserId = ?",array($this->_MA_Params[0]))->rowCount();
          if ($MA_Approve > 0){
              $MA_Msg = "<div class='alert alert-success'>تم القبول</div>";
          }else{
              $MA_Msg = "<div class='alert alert-warning'>عفوا! لم يتم التفعيل</div>";
          }
          $this->_MA_Data['MA_Approve_Success'] = $MA_Msg;
          header("Location: /admin/users");
    }

    public function MA_Add_Action()
    {
        $this->_MA_Data['MA_Page_Name']= "إضافة مستخدم جديد";

        if (isset($_POST['MA_ADD_USER'])) {
            $MA_Msg = array();
            $MA_User  = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['user']);
            $MA_Name  = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['name']);
            $MA_Pass  = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['pass']);
            $MA_Email = MA_Filter::MA_FILTER_INPUT_POST_EMAIL($_POST['email']);
            $MA_Perm = MA_Filter::MA_FILTER_INPUT_POST_INT($_POST['perm']);
            $MA_Picture = MA_Filter::MA_FILTER_INPUT_POST_STRING(@$_POST['picture']);
            $MA_Picture = !empty($MA_Picture) ? $MA_Picture : "/MA_Images/avatar5.jpg";
            $AAC = md5(rand(10000,100000));

            $MA_Exists_user = MA_UsersModel::MA_getByAuth([$MA_User,$MA_Email]);
            if ($MA_Exists_user > 0){
                $MA_Msg[] = "<div class='alert alert-danger'>عفوا هذا المستخدم موجد مسبقا</div>";
            } else {
                $MA_Add = MA_UsersModel::MA_INSERT_QUERY([$MA_User, $MA_Email, $MA_Pass, $MA_Perm,$MA_Picture,$_SERVER['REMOTE_ADDR'], $AAC,$AAC, $MA_Name, "1" ]);
                var_dump($MA_Add);
                if ($MA_Add > 0) {
                    $MA_Msg[] = "<div class='alert alert-success'> تم الإضافة بنجاح </div>";
                } else {
                    $MA_Msg[] = "<div class='alert alert-danger'>لم يتم الإضافة </div>";
                }
            }
        }
        if (!empty($MA_Msg)) {
            foreach ($MA_Msg as $error) {
                $Msg = $error;
            }

            $this->_MA_Data['msg'] = $Msg;
        }


        $this->_MA_View();
    }

    public function MA_Edit_Action()
    {
        $this->_MA_Data['MA_Page_Name'] = "تعديل مستخدم";
        $MA_Password_DATABASE = MA_DataBaseHandler::MA_Factory()->MA_Prepare("SELECT UserId,Password FROM users WHERE UserId = ? ",array($this->_MA_Params[0]))->fetch();
        // Variables
        $MA_Msgs = array();
        $MA_Username = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['ma_Username']);
        $MA_Password = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['ma_Password']);
        $MA_Email    = MA_Filter::MA_FILTER_INPUT_POST_EMAIL($_POST['ma_Email']);

        $MA_Password =!empty($MA_Password) ? $MA_Password : $MA_Password_DATABASE;

        $MA_Exists_user = MA_DataBaseHandler::MA_Factory()->MA_Prepare("SELECT Username,Email FROM users WHERE Usernaem = ? OR Email = ?",array($MA_Username,$MA_Email))->rowCount();
        if ($MA_Exists_user > 0){
            $MA_Msgs[] = "<div class='alert alert-danger'>عفوا هذا المستخدم موجد مسبقا</div>";
        } else {

            $MA_Edit = MA_DataBaseHandler::MA_Factory()->MA_Prepare("UPDATE users SET Username = ?,Email = ? WHERE UserId = ?", array(
                $MA_Username, $MA_Email
            ,$this->_MA_Params[0]))->rowCount();  // This Is Have A params
            if ($MA_Edit > 0) {
                $MA_Msgs[] = "<div></div>";
            } else {
                $MA_Msgs[] = "<div class='alert alert-danger'>عفوا لم يكتمل إضافة عضو لوجد خطأ</div>";
            }
        }
        $this->_MA_Data['MA_Msgs'] = $MA_Msgs;
    }

    public function MA_Test_Action()
    {
        MA_UsersModel::MA_test();
    }
}