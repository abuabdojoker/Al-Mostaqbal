<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/18/2017
 * Time: 02:38 ص
 */

namespace MAAlMOSTAQBAL\MA_Models;


use MAAlMOSTAQBAL\ma_libs\MA_Database\MA_DataBaseHandler;

abstract class MA_AbstractModel
{
    const MA_DATA_TYPE_BOOL = \PDO::PARAM_BOOL;
    const MA_DATA_TYPE_STR = \PDO::PARAM_STR;
    const MA_DATA_TYPE_INT = \PDO::PARAM_INT;
    const MA_DATA_TYPE_DECIMAL = 4;


    /**
     * @param $MA_Type
     * @return string
     */
    protected static function MA_Bind_Params_Query($MA_Type)
    {
        $MA_Binned_Query = '';
        if ($MA_Type == "insert")
        {
            foreach (static::$MA_Table_Schema as $MA_Column_Name => $key) {
                $MA_Binned_Query .= $MA_Column_Name . "," ;
            }
        }elseif ($MA_Type == "value"){
            foreach (static::$MA_Table_Schema as $MA_Column_Name => $key) {
                $MA_Binned_Query .= ":z" . ucfirst($MA_Column_Name) . "," ;
            }
        }
        else
        {
            foreach (static::$MA_Table_Schema as $MA_Column_Name => $key) {
                $MA_Binned_Query .= $MA_Column_Name . '= ? ,';
            }
        }
        return trim($MA_Binned_Query, ', ');
    }

    /**
     * @param \PDOStatement $MA_PDOStatement
     */
    private function MA_PREPARE_VALUES(\PDOStatement &$MA_PDOStatement)
    {
        foreach (static::$MA_Table_Schema as $MA_Column_Name => $MA_Type)
        {
            if ($MA_Type = 4){
                $MA_Sanitized_Value = filter_var($this->$MA_Column_Name, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $MA_PDOStatement->bindValue(":{$MA_Column_Name}", $MA_Sanitized_Value);
            } else{
                $MA_PDOStatement->bindValue(":{$MA_Column_Name}", $this->$MA_Column_Name, $MA_Type);
            }
        }
    }

    /**
     * @param $MA_Params = array
     * @return int
     */
    public static function MA_INSERT_QUERY ($MA_Params = array()){

        $MA_SQL = "INSERT INTO " . static::$MA_Table_Name ."(" . self::MA_Bind_Params_Query('insert').") VALUES(" . self::MA_Bind_Params_Query('value') .")";
        var_dump($MA_SQL);
        $MA_Statement = MA_DataBaseHandler::MA_Factory()->MA_Prepare($MA_SQL,[
            self::MA_Bind_Params_Query("value")
        ])->rowCount();
        var_dump($MA_Statement);
        return $MA_Statement;
    }

    /**
     * @param $MA_ID
     * @return int
     */
    public function MA_DELETE_QUERY($MA_ID)
    {
        $MA_SELECT = MA_DataBaseHandler::MA_Factory()->MA_Prepare("SELECT * FROM ". static::$MA_Table_Name . " WHERE " . static::$MA_Primary_Key,$MA_ID)->rowCount();
        if ($MA_SELECT > 0) {
            $MA_Query = "DELETE FROM " . static::$MA_Table_Name . " WHERE " . static::$MA_Primary_Key . " = :zTable";
            $MA_Delete = MA_DataBaseHandler::MA_Factory()->MA_Prepare($MA_Query, $MA_ID, true)->rowCount();
        }
        return $MA_Delete;
    }


    /**
     * This Method For Update Data
     * @param $MA_ID
     * <p>this for determined the column by id</p>
     * @param $MA_Params
     * <p>the parameters for new data to update  </p>
     * @return int
     * <p>this result for determined if successful or failed</p>
     */
    public static function MA_Update($MA_ID , $MA_Params){
        $MA_Query = "UPDATE " . static::$MA_Table_Name . " SET " .self::MA_Bind_Params_Query("MA_Update") . " WHERE " . static::$MA_Primary_Key . ' = ' .$MA_ID  ;
        $MA_Statement = MA_DataBaseHandler::MA_Factory()->MA_Prepare($MA_Query,array($MA_Params))->rowCount();
        return $MA_Statement;
    }


    /**
     * This Method For Get All Data
     * @return array
     * <p>this result to used it in anywhere to you have used it </p>
     */
    public static function MA_getAll()
    {

        $MA_SQL = "SELECT * FROM " . static::$MA_Table_Name;

        $MA_Statement = MA_DataBaseHandler::MA_Factory()->MA_Prepare($MA_SQL)->fetchAll();

        return $MA_Statement;

    }

    /**
     * This Method For Get All Data By Id
     * @param $MA_Id
     * <p>int params</p>
     * @return mixed
     */
    public static function MA_getById(int $MA_Id)
    {
        $MA_Query = 'SELECT * FROM '. static::$MA_Table_Name.' WHERE ' .static::$MA_Primary_Key . ' = ' . $MA_Id;
        $MA_Statement = MA_DataBaseHandler::MA_Factory()->MA_Prepare($MA_Query)->fetch();
        return $MA_Statement;
    }

    public static function MA_getWithRowCount()
    {
        $MA_Query = "SELECT * FROM " . static::$MA_Table_Name;
        $MA_Query = MA_DataBaseHandler::MA_Factory()->MA_Prepare($MA_Query)->rowCount();
        return $MA_Query;
    }

    /**
     * This Method For Get All Data limited
     * @param int $Limit
     * @return array|string
     */
    public static function MA_getAllWithLimit(int $Limit)
    {
        $MA_Query ='SELECT * FROM MA_Products WHERE '. $Limit;
        $MA_Query = MA_DataBaseHandler::MA_Factory()->MA_Prepare($MA_Query)->fetchAll();
        return $MA_Query;
    }

}