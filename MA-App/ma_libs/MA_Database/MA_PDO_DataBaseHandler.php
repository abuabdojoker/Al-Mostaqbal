<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/18/2017
 * Time: 07:29 م
 */

namespace MAAlMOSTAQBAL\ma_libs\MA_Database;


class MA_PDO_DataBaseHandler extends MA_DataBaseHandler
{
    private static $_MA_Instance;
    private static $_MA_Handler;

    private function __construct()
    {
        self::init();
    }
//    public function __call($MA_Name,$MA_Arguments)
//    {
//        return call_user_func_array(array(self::$_MA_Handler, $MA_Name),$MA_Arguments);
//    }

//    protected static function init()
//    {
//        try{
//            self::$_MA_Handler = new \PDO('mysql://hostname='. MA_DATABASE_HOST_NAME . ';dbname='. MA_DATABASE_DB_NAME , MA_DATABASE_USER_NAME, MA_DATABASE_PASSWORD);
//
//        } catch (\PDOException $MA_E){
//            //$MA_Errors = new MA_Errors();
//        }
//
//    }

    public static function getInstance()
    {
        if (self::$_MA_Instance === null){
            self::$_MA_Instance = new self();
        }
        return self::$_MA_Instance;
    }
}

