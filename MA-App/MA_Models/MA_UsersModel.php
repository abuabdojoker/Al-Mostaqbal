<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/18/2017
 * Time: 03:18 م
 */

namespace MAAlMOSTAQBAL\MA_Models;

use MAAlMOSTAQBAL\ma_libs\MA_Database\MA_DataBaseHandler;

class MA_UsersModel extends MA_AbstractModel
{
    public $UserId;

    protected static $MA_Table_Name = "users";
    protected static $MA_Table_Schema = array(
      'Username'        => self::MA_DATA_TYPE_STR,
      'Email'           => self::MA_DATA_TYPE_STR,
      'Password'        => self::MA_DATA_TYPE_STR,
      'Permission'      => self::MA_DATA_TYPE_INT,
      'Picture'         => self::MA_DATA_TYPE_STR,
      'UserIp'          => self::MA_DATA_TYPE_DECIMAL,
      'ChangePass'      => self::MA_DATA_TYPE_STR,
      'MA_Active_Code'  => self::MA_DATA_TYPE_STR,
      'FullName'        => self::MA_DATA_TYPE_STR,
      'Status'          => self::MA_DATA_TYPE_INT,

    );
    protected static $MA_Primary_Key = "UserId";

    public static function MA_getByAuth($MA_Params = array())
    {
        $MA_Query = "SELECT * FROM " . static::$MA_Table_Name . " WHERE  Username = ? OR Email = ?";
        $MA_Statement = MA_DataBaseHandler::MA_Factory()->MA_Prepare($MA_Query,$MA_Params)->fetch();
        return $MA_Statement;
    }
    public static function MA_UpdateStatus($MA_ID)
    {
        $MA_Query = "UPDATE " .static::$MA_Table_Name . " SET Status = 10  WHERE " . static::$MA_Primary_Key  . " = " .$MA_ID;
        $MA_Query = MA_DataBaseHandler::MA_Factory()->MA_Prepare($MA_Query)->rowCount();
        return $MA_Query;
    }

}