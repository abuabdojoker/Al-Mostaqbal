<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/18/2017
 * Time: 12:45 ص
 */

namespace MAAlMOSTAQBAL\ma_libs\MA_Database;


class MA_DataBaseHandler
{

    private const MA_DATABASE_DRIVER_PDO    = 1;
    private const MA_DATABASE_DRIVER_MYSQLI = 2;
    private  $MA_Connection;
    private $MA_SQL;
    private static $_MA_Instance;

    private function __construct()
    {
        self::init();
    }

    protected function init(){
        $MA_DSN = 'mysql:host=' . MA_DATABASE_HOST_NAME . ';dbname=' . MA_DATABASE_DB_NAME ;
        $MA_USERNAME = MA_DATABASE_USER_NAME;
        $MA_PASSWORD = MA_DATABASE_PASSWORD;
        $MA_Option = array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );
        try {
            $this->MA_Connection = new \PDO($MA_DSN, $MA_USERNAME, $MA_PASSWORD, $MA_Option);
            $this->MA_Connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->MA_Connection; // variable
        } catch (\PDOException $MA_E){

        }

    }

    public function MA_Prepare($MA_SQl, $MA_Params = null,$MA_Delete= false)
    {
        $this->MA_SQL = $MA_SQl;
        $MA_Stmt = $this->init()->prepare($MA_SQl);
        if ($MA_Params != null)
        {
            if ($MA_Delete){
                $MA_Stmt->bindParam(':zTable',$MA_Params);
            } else {
                $MA_Stmt->execute(array($MA_Params));
            }
        }
        else
        {
            $MA_Stmt->execute();
        }
        return $MA_Stmt;
    }


    protected static function getInstance(){
        if (self::$_MA_Instance === null){
            self::$_MA_Instance = new self();
        }
        return self::$_MA_Instance;
    }

    public static function MA_Factory(){
        $MA_Driver = MA_DATABASE_CONN_DRIVER;
        if ($MA_Driver == self::MA_DATABASE_DRIVER_PDO){
            return MA_PDO_DataBaseHandler::getInstance();
        } else {
            return MA_MYSQLI_DataBaseHandler::getInstance();
        }
    }


}