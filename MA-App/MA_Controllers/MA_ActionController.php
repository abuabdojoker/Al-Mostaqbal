<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Abdo
 * Date: 05/24/2017
 * Time: 02:36 م
 */

namespace MAAlMOSTAQBAL\MA_Controllers;


class MA_ActionController extends MA_AbstractController
{

    public function test($ma)
    {
        foreach ($ma as $MA){
            echo $MA . "<br>";
        }
    }

    public function MA_Index_Action()
    {
        $this->test(['mohamed','Ahmed','Ali','Mahmoud','Abdul Almonem','Taha','Safaa','Sara','Hanaa']);
    }

    public function MA_Contactus_Action()
    {

        if (isset($_POST['submit'])){
            echo $MA_Name    = "Your Name Is : " .  filter_var($_POST['name'],FILTER_SANITIZE_STRING) . "<br />";
            echo $MA_email   = "Your Email Is : "  . filter_var($_POST['email'],FILTER_SANITIZE_EMAIL). "<br />";
            echo $MA_Subject = "Your Subject is : " . filter_var($_POST['subject'],FILTER_SANITIZE_STRING) . "<br />";
            echo $MA_Message = "Your Message Is : " . filter_var($_POST['message'], FILTER_SANITIZE_STRING). "<br />";
        }

    }

    public function MA_Search_Action()
    {
        $this->_MA_Data['MA_Params'] = $_GET['MASearch'];
        $this->_MA_View();
    }
}