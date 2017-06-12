<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 05/06/17
 * Time: 11:04 ص
 */

namespace MAAlMOSTAQBAL\MA_LIBS;

use function Couchbase\defaultDecoder;

ob_start();
define("MA_SESSION_SAVE_PATH",MA_APP_PATH.MA_DS."ma_libs" . MA_DS . "MA_Sessions");

class MA_Sessions extends \SessionHandler
{
    private $MA_SessionName = "MA_AL_MOSTAQBAL";
//    private $MA_SessionMaxLifetime = 0;
//    private $MA_SessionSSL = false;
//    private $MA_SessionHTTPOnly = true;
//    private $MA_SessionPath = "/";
//    private $MA_SessionDomain = ".almostaqbal.com";
//    private $MA_SessionSavePath = MA_SESSION_SAVE_PATH;
//    private $MA_SessionCipherAlgorithm = MCRYPT_BLOWFISH;
//    private $MA_SessionCipherMode = MCRYPT_MODE_ECB;
//    private $MA_SessionCipherKey = "MCRYPT@3Y82017MA";

//    private $MA_SessionStartTime;


    /**
     * MA_Sessions constructor.
     */
    public function __construct()
    {
        ini_set('session.use_cookies',1);
        ini_set('session.use_only_cookies',1);
//        ini_set('session.use_trans_sid',0);
//        ini_set('session.save_handler','files');


        session_name($this->MA_SessionName);

//        session_save_path($this->MA_SessionSavePath);
//
//        session_set_cookie_params($this->MA_SessionMaxLifetime,$this->MA_SessionPath,
//            $this->MA_SessionDomain,$this->MA_SessionSSL,
//            $this->MA_SessionHTTPOnly);
//
//        session_set_save_handler($this, true);
    }

    /**
     * @param $MA_Key
     * @param $MA_Value
     */
    public function __set($MA_Key, $MA_Value)
    {
        $this->MA_setSession($MA_Key,$MA_Value);
    }

    /**
     * @param $MA_Key
     * @return bool
     */
    public function __get($MA_Key)
    {
        return false != @$_SESSION[$MA_Key] ? @$_SESSION[$MA_Key] : false;
    }

    /**
     * @param $MA_Key
     * @return bool
     */
    public function __isset($MA_Key)
    {
        return isset($_SESSION[$MA_Key]) ? true : false;
    }

    /**
     * @return bool
     */
    public function start()
    {
        ob_start();
        $MA_Session_Start = session_start();
        ob_end_flush();

        if (session_id() === ''){
           return $MA_Session_Start;
        }
    }

    /**
     *
     */
    public static function MA_Start()
    {
        self::start();
    }

    /**
     * @return bool
     */
    public static function MA_isSessionStarted()
    {
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }

    /**
     * @param $MA_SessionName
     * @return bool
     */
    public static function MA_getSession($MA_SessionName)
    {
        if (isset($_SESSION[$MA_SessionName])){
            return $_SESSION[$MA_SessionName];
        }else{
            return false;
        }
    }

    /**
     * @param $MA_Key
     * @param $MA_Value
     */
    public static function MA_setSession($MA_Key, $MA_Value)
    {
        $_SESSION[$MA_Key] = $MA_Value;
    }

    /**
     * @param $MA_Session_name
     * <p>Session Name To know Is This Session Are Found Or Not</p>
     * @return bool
     */
    public static function MA_isIsset($MA_Session_name)
    {
        if (isset($_SESSION[$MA_Session_name])){
            return true;
        } else{
            return false;
        }
    }







//    public function MA_SetSessionStartTime()
//    {
//        if (!isset($this->sessionStartTime)){
//            $this->sessionStartTime = time();
//        }
//        return true;
//    }


//    public function read($MA_ID)
//    {
//        return mcrypt_decrypt($this->MA_SessionCipherAlgorithm,$this->MA_SessionCipherKey,parent::read($MA_ID),$this->MA_SessionCipherMode);
//    }
//
//    public function write($MA_ID,$MA_Data)
//    {
//       return parent::write($MA_ID,mcrypt_encrypt($this->MA_SessionCipherAlgorithm,$this->MA_SessionCipherKey,$MA_Data,$this->MA_SessionCipherMode));
//    }

}
