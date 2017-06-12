<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/23/2017
 * Time: 06:26 ص
 */

namespace MAAlMOSTAQBAL\MA_Controllers;


use MAAlMOSTAQBAL\MA_LIBS\MA_Actions;
use MAAlMOSTAQBAL\MA_LIBS\MA_Filter;
use MAAlMOSTAQBAL\MA_LIBS\MA_Sessions;
use MAAlMOSTAQBAL\MA_Models\MA_UsersModel;

class MA_AuthController extends MA_AbstractController
{

    public function MA_Login_Action()
    {
        $this->_MA_Data['MA_Page_Name'] = "تسجيل الدخول";
        if (!isset($_SESSION['MA_SESSION_USERNAME'])) {
            if (isset($_POST['ma_Login'])) {

                $MA_isEmail = stristr("@", $_POST['ma_Username']);

                if ($MA_isEmail) {
                    $MA_Email = MA_Filter::MA_FILTER_INPUT_POST_EMAIL($_POST['ma_Username']);
                } else {
                    $MA_Username = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['ma_Username']);;
                }

                $MA_Password = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['ma_Password']);
                $MA_Selected = MA_UsersModel::MA_getByAuth([$MA_Username, @$MA_Email]);
                $MA_Errors = array();

                if (empty($MA_Username) && empty($MA_Password))
                {
                    $MA_Errors[] = "عفوا! لايجب ترك الحقول فارغة";
                }
                elseif (empty($MA_Username))
                {
                    $MA_Errors[] = "عفوا! لايجب ترك إسم المستخدم فارغ";
                }
                elseif (empty($MA_Password))
                {
                    $MA_Errors[] = "عفوا! لايجب ترك كلمة المرور فارغة";
                }
                else
                {
                    if (($MA_Username != $MA_Selected['Username']) && $MA_Password != $MA_Selected['Password'])
                    {
                        $MA_Errors[] = "عفوا! البيانات المدخلة غير صحيحة";
                    }
                    elseif ($MA_Username != $MA_Selected['Username'])
                    {
                        $MA_Errors[] = "عفوا! إسم المستخدم غير صحيحة";
                    }
                    else
                    {
                        if (sha1($MA_Password) != $MA_Selected['Password'])
                        {
                            $MA_Errors[] = "عفوا! كلمة غير صحيحة ";
                        }
                    }
                }
                if ($MA_Selected['Status'] == 0)
                {
                    $MA_Errors[] = "عفوا! برجاء تأكيد الحساب لتتمكن من الدخول";
                }

                if (empty($MA_Errors)) {
                    MA_Sessions::MA_setSession("MA_SESSION_USERNAME", $MA_Username);
                    MA_Sessions::MA_setSession("MA_SESSION_ID", $MA_Selected['UserId']);
                    MA_Actions::MA_Redirect("/", 0);
                } else {
                    foreach ($MA_Errors as $MA_Error) {
                        $MA_Error = "<div class='alert alert-danger'> " . $MA_Error . " </div>";
                    }
                    $this->_MA_Data['MA_ERROR'] = $MA_Error;
                }
            }

            $this->_MA_View();
        } else{
            MA_Actions::MA_Redirect("MA_Back");
        }
    }

    public function MA_Register_Action()
    {
        $MA_Session = MA_Sessions::MA_getSession("MA_SESSION_USERNAME");
        if (isset($MA_Session)) {
            $this->_MA_Data['MA_Page_Name'] = "إنشاء حساب جديد";
            if (isset($_POST['ma_Register'])) {
                $MA_Name = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['ma_Name']);
                $MA_User = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['ma_User']);
                $MA_Email = MA_Filter::MA_FILTER_INPUT_POST_EMAIL($_POST['ma_Email']);
                $MA_Pass = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['ma_Pass']);
                $MA_rePass = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['ma_RePass']);
                $MA_Errors = array();

                $MA_isUserNotExists = MA_UsersModel::MA_getByAuth([$MA_User, $MA_Email]);
                if ($MA_isUserNotExists > 0) {
                    $MA_Errors[] = "عفوا! هذا المستخدم موجود مسبقاَ";
                } else {
                    if (empty($MA_Name) && empty($MA_User) && empty($MA_Pass) && empty($MA_rePass)) {
                        $MA_Errors[] = "عفوا! جميع الحقول مطلوبة";
                    } elseif (empty($MA_Name)) {
                        $MA_Errors[] = "عفوا! لايجب ترك ﻹسم فارغ";
                    } elseif (empty($MA_User)) {
                        $MA_Errors[] = "عفوا! لايجب ترك إسم المستخدم فارغ";
                    } elseif (empty($MA_Email)) {
                        $MA_Errors[] = "عفوا! لايجب ترك البريد ﻹكترونى فارغ";
                    } elseif (empty($MA_Pass)) {
                        $MA_Errors[] = "عفوا لايجب ترك كلمة المرور فارغة";
                    } elseif (empty($MA_rePass)) {
                        $MA_Errors[] = "عفوا لايجب ترك إعادة كلمة المرور فارغة";
                    } else {
                        if (strlen($MA_Name) < 10) {
                            $MA_Errors[] = "عفوا! يجب ان يكون اﻹسم اكبر من 10 حروف";
                        } elseif (strlen($MA_User) < 6) {
                            $MA_Errors[] = "عفوا! يجب ان يكون إسم المستخدم اكبر من 6 حروف";
                        } elseif (strlen($MA_Pass) < 6) {
                            $MA_Error[] = "عفوا! كلمة المرور يجب ان تكون اكبر من 6 حروف";
                        } elseif (($MA_rePass != $MA_Pass) or ($MA_Pass != $MA_rePass)) {
                            $MA_Errors[] = "عفوا! كلمة المرور غير مطتابقة";
                        }

                    }
                }
                if (empty($MA_Errors)) {
                    echo "This Is Empty";
                    $MA_Add_User = MA_UsersModel::MA_INSERT_QUERY([$MA_User, $MA_Email, $MA_Pass, "3","",
                            $_SERVER['REMOTE_ADDR'],
                            md5(rand(10000,100000)),md5(rand(10000,100000)), $MA_Name, "1" ]
                    );
                    if ($MA_Add_User > 0) {

                        setcookie("MA_Register_Msg", "برجاء تأكيد حسابك بالرجوع الى الايميل الذى تم التسجيل بية", time() + 900, "/", $_SERVER['HTTP_HOST'], TRUE, TRUE);
                        $MA_Msg = "<div class='alert alert-success'>تم إنشاء حسابك بنجاح.<br /> برجاء تأكيد حسابك</div>";
                    } else {
                        $MA_Msg = "<div class='alert alert-danger'>عفوا لقد تم إضافة هذا الحساب بالفعل.<br> برجاء تأكيد حسابك</div>";
                    }
                    $MA_Add = empty($MA_Msg) ? false : $this->_MA_Data['MA_Msg'] = $MA_Msg;
                    $this->_MA_Data['MA_Add'] = $MA_Add;

//                    MA_Actions::MA_Redirect("/", 5);
                } else {
                    foreach ($MA_Errors as $MA_Error) {
                        $MA_Error = "<div class='alert alert-danger'>" . $MA_Error . "</div>";
                    }
                    $this->_MA_Data['MA_Error'] = $MA_Error;
                }
            }
            $this->_MA_View();
        }
        else{
            MA_Actions::MA_Redirect("/");
        }
    }

    public function MA_Logout_Action()
    {
        $this->_MA_Data['MA_Page_Name'] = "تسجيل الخرورج";
       MA_Sessions::MA_Start();
       if ($_SERVER['HTTP_REFERER'] = "/admin"){
           $MA_SESSION_NAME = MA_Sessions::MA_getSession("MA_ADMIN_SESSION");
           $MA_SESSION_ID = MA_Sessions::MA_getSession("MA_ADMIN_SESSION_ID");
           unset($MA_SESSION_NAME);
           unset($MA_SESSION_ID);
           session_destroy();
       } else {
           $MA_SESSION_NAME = MA_Sessions::MA_getSession("MA_SESSION_USERNAME");
           $MA_SESSION_ID = MA_Sessions::MA_getSession("MA_SESSION_ID");
           unset($MA_SESSION_NAME);
           unset($MA_SESSION_ID);
           session_destroy();
       }
       MA_Actions::MA_Redirect("/auth/login");
    }

    public function MA_Active_Action()
    {
        $this->_MA_Data['MA_Page_Name'] = "تفعيل حسابك";
        $MA_Active_ID = $this->_MA_Params[0];
        $MA_Active_Code = $this->_MA_Params[1];
        $MA_Msg = array();

        $MA_SQL = MA_UsersModel::MA_getById($MA_Active_ID);

        if ($MA_SQL['Status'] == 10)
        {
            $MA_Msg[] = "عفوا لقد تم تحديثة من قبل";
        }
        else
        {
            if ($MA_Active_Code === $MA_SQL['MA_Active_Code'])
            {
                $MA_SQL = MA_UsersModel::MA_UpdateStatus($MA_Active_ID);
                if ($MA_SQL > 0)
                {
                    MA_Sessions::MA_setSession("MA_SESSION_USERNAME", $MA_SQL['Username']);
                    MA_Sessions::MA_setSession("MA_SESSION_ID", $MA_SQL['UserId']);
                    $MA_Msg[] = true;
                }
                else
                {
                    $MA_Msg[] = "عفوا! لم يتم تفعيل حسابك";
                }
            }
            else
            {
                $MA_Msg[] = "عفوا! الرابط المتبع خطأ";
            }
        }

        $this->_MA_Data['MA_Msg'] = $MA_Msg;
        $this->_MA_View();
    }

    public function MA_Mail_Action()
    {
        MA_Actions::MA_Email();
    }

}