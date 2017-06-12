<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/26/2017
 * Time: 02:40 م
 */

namespace MAAlMOSTAQBAL\MA_Controllers\MA_Admin;


use MAAlMOSTAQBAL\MA_LIBS\MA_Actions;
use MAAlMOSTAQBAL\MA_LIBS\MA_Filter;
use MAAlMOSTAQBAL\MA_LIBS\MA_Sessions;
use MAAlMOSTAQBAL\MA_Models\MA_MainModel;
use MAAlMOSTAQBAL\MA_Models\MA_UsersModel;

class MA_LoginController extends MA_AbstractController
{

    public function MA_Index_Action()
    {
            $this->_MA_Data['MA_Page_Name'] = "تسجيل الدخول";
            $this->_MA_Data['MA_SITE_TITLE'] = MA_MainModel::MA_getAll()[0]['ma_title'];

            if (isset($_POST['ma_Login'])) {
                $MA_Username = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['ma_Username']);
                $MA_Password = MA_Filter::MA_FILTER_INPUT_POST_STRING($_POST['ma_Password']);
                $MA_Errors = array();
                $MA_Login = MA_UsersModel::MA_getByAuth([$MA_Username, $MA_Username]);

                if ((empty($MA_Username)) && (empty($MA_Password))) {
                    $MA_Errors[] = "عفوا لايجب ترك الحقول فارغة";
                } else {
                    if (empty($MA_Username)) {
                        $MA_Errors[] = "عفوا! لايجب ترك إسم المستخدم فارغ";
                    } elseif (empty($MA_Password)) {
                        $MA_Errors = "عفوا! لايجب ترك كلمة المرور فارغة";
                    } else {
                        if ($MA_Login['Username'] != $MA_Username) {
                            $MA_Errors[] = "عفوا! إسم المستخدم غير صحيح";
                        } else {
                            if (sha1($MA_Password) != $MA_Login['Password']) {
                                $MA_Errors[] = "عفوا! كلمة المرور غير صحيحه";
                            } else {
                                if ($MA_Login['Permission'] != 1) {
                                    $MA_Errors[] = "Sorry! You Can’t Login Here Back To Home To Login";
                                }
                            }
                        }
                    }
                }
                if (empty($MA_Errors)) {
                    MA_Sessions::MA_setSession("MA_ADMIN_SESSION", $MA_Username);
                    MA_Sessions::MA_setSession("MA_ADMIN_SESSION_ID", $MA_Login['UserId']);
                    MA_Actions::MA_Redirect("/admin");
                } else {
                    $this->_MA_Data['MA_ERRORS'] = $MA_Errors;
                }
            }
            $this->_MA_View();
    }
}