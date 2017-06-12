<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/28/2017
 * Time: 07:54 م
 */

namespace MAAlMOSTAQBAL\MA_LIBS;


class MA_Filter
{


    public static function MA_FILTER_INPUT_POST_STRING($MA_INPUT_POST)
    {
      return filter_var(htmlentities($MA_INPUT_POST), FILTER_SANITIZE_STRING);
    }

    public static function MA_FILTER_INPUT_POST_EMAIL($MA_INPUT_POST)
    {
        return filter_var(htmlentities($MA_INPUT_POST), FILTER_SANITIZE_EMAIL);
    }

    public static function MA_FILTER_INPUT_POST_INT($MA_Input)
    {
        return filter_var(htmlentities($MA_Input),FILTER_SANITIZE_NUMBER_INT);
    }

    public static function MA_FILTER_URL_GET_INT($MA_URL_GET)
    {
        return is_numeric(filter_var(htmlentities($MA_URL_GET), FILTER_SANITIZE_NUMBER_INT));
    }

    public static function MA_FILTER_URL_GET_STR($MA_URL_GET)
    {
        return filter_var(htmlentities($MA_URL_GET), FILTER_SANITIZE_STRING);
    }

    public static function MA_FILTER_URL($MA_URL)
    {
        return filter_var(htmlentities($MA_URL),FILTER_SANITIZE_URL);
    }




}