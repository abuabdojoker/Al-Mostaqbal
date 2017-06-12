<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 05/06/17
 * Time: 05:02 م
 */

namespace MAAlMOSTAQBAL\MA_LIBS;


use MAAlMOSTAQBAL\MA_Models\MA_EmailModel;

class MA_Actions
{
    /**
     * This Function For Url Redirect
     * @param $MA_Url
     * This For Url To Go It.
     * @param null $MA_Time
     * For Determined The Time By Second To Redirect After Complete Time.
     */
    public static function MA_Redirect($MA_Url, $MA_Time = null)
    {
        $MA_URl = MA_Filter::MA_FILTER_URL(@$_GET['url']);
        if ($MA_Url == "/"){
            if ($_SERVER['HTTP_REFERER'] === null)
            {
                if ($MA_Time)
                {
                    header("refresh: $MA_Time; url:/index");
                    exit();
                }
                else
                {
                    header("Location: /index");
                    exit();
                }
            }
        }
        elseif ($MA_Url == "MA_Back")
        {
            if ($_SERVER['HTTP_REFERER'] === null)
            {
                if ($MA_Time)
                {
                    header("refresh: $MA_Time; url:/index");
                    exit();
                }
                else
                {
                    header("Location: /index");
                    exit();
                }
            }
            else
            {
                if ($MA_Time)
                {
                    header("refresh: $MA_Time; url: $MA_URl");
                    exit();
                }
                else
                {
                    header("Location: $MA_URl");
                    exit();
                }
            }
        }
        else
        {
            if ($MA_Time)
            {
                header("refresh: $MA_Time; url: /index");
                exit();
            }
            else
            {
                header("Location: $MA_Url");
                exit();
            }
        }
    }

    public static function MA_Email()
    {
        require MA_APP_PATH . "/ma_libs/MA_Plugins/phpmailer/PHPMailerAutoload.php";
        $Mailer = new \PHPMailer();
        $MA_Settings = MA_EmailModel::MA_getAll();
        $Mailer->isSMTP();                                      // Set mailer to use SMTP
//        $Mailer->Host = $MA_Settings[0]['MA_Host'];  // Specify main and backup SMTP servers
//        $Mailer->SMTPAuth = $MA_Settings[0]['MA_SMTPAuth'];                               // Enable SMTP authentication
//        $Mailer->Username = $MA_Settings[0]['MA_Username'];                 // SMTP username 'user@example.com'
//        $Mailer->Password = $MA_Settings[0]['MA_Password'];                           // SMTP password
//        $Mailer->SMTPSecure = $MA_Settings[0]['MA_SMTPSecure'];                            // Enable TLS encryption, `ssl` also accepted
//        $Mailer->Port = $MA_Settings[0]['MA_Port'];
        $Mailer->SMTPAuth = false;
        $Mailer->Host = "Smtp.gmail.com";
        $Mailer->Username = "abuabdojoker22@gmail.com";
        $Mailer->Password = "sara@mrdevelop";
        $Mailer->SMTPSecure = "ssl";
        $Mailer->Port = 465;

        $Mailer->setFrom('abuabdojoker22@gmail.com', 'Al-Mostaqbal ');
        $Mailer->addAddress('abuabdojoker22@gmail.com', 'Mohamed Abdul Almonem');     // Add a recipient
        $Mailer->addReplyTo('info@example.com', 'Information');

        $Mailer->isHTML(true);
        $Mailer->Subject = 'Here is the subject';
        $Mailer->Body    = 'This is the HTML message body <b>in bold!</b>';
        $Mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if (!$Mailer->send()){
            echo "Error: " . $Mailer->ErrorInfo;
        }else{
            echo "Success Sent";
        }

    }
    
    private function MA_SMTPEMAIL(){

    }
//    private function MA_Mailer(){
//
//        return$Mailer;
//    }


}