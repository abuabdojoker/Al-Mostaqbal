<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/18/2017
 * Time: 07:30 م
 */

namespace MAAlMOSTAQBAL\ma_libs\MA_Database;


class MA_MYSQLI_DataBaseHandler extends MA_DataBaseHandler
{

    private static $_MA_Handler;

    private function __construct()
    {
        self::init();
    }

    protected static function init()
    {
        try{
            self::$_MA_Handler = new \PDO('mysql://hostname='.MA_DATABASE_HOST_NAME. ';dbname='.MA_DATABASE_DB_NAME , MA_DATABASE_USER_NAME, MA_DATABASE_PASSWORD);

        } catch (\PDOException $MA_E){

        }

    }

    public static function getInstance()
    {
        if (self::$_MA_Handler === null){
            self::$_MA_Handler = new self();
        }
        return self::$_MA_Handler;
    }


    
    
}