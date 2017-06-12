<?php
use MAAlMOSTAQBAL\MA_Models\MA_EmailModel;

$MA_Settings = \MAAlMOSTAQBAL\MA_Models\MA_MainModel::MA_getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $MA_Settings[0]['MA_Description']  ?>">
    <meta name="author" content="MrDevelop Company" href="http://www.mrdevelop.com">
    <title><?php
        if (@isset($MA_Page_Name) && !empty(@$MA_Page_Name)){
            echo $MA_Page_Name . " | ";
        }
        ?> <?php echo $MA_Settings[0]['ma_title'] ?></title>
    <link href="/MA_Css/bootstrap.min.css" rel="stylesheet">
    <link href="/MA_Css/font-awesome.min.css" rel="stylesheet">
    <link href="/MA_Css/MA-Responsive.css" rel="stylesheet">
    <link href="/MA_Css/MA_Style.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo $MA_Settings[0]['MA_Ico']  ?>">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="callto:<?php echo $MA_Settings[0]['MA_Phone'] ?>"><i class="fa fa-phone"></i> <?php echo $MA_Settings[0]['MA_Phone'] ?></a></li>
                            <li><a href="mailto:<?php echo MA_EmailModel::MA_getAll()[0]['MA_Username']?>"><i class="fa fa-envelope"></i> <?php echo MA_EmailModel::MA_getAll()[0]['MA_Username']?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo $MA_Settings[0]['MA_Facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $MA_Settings[0]['MA_Twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $MA_Settings[0]['MA_Linkedin'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="<?php echo $MA_Settings[0]['MA_Google_Plus'] ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top. TheDesign Finished Here  -->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-right">
                        <?php
                        if ($MA_Settings[0]['MA_TitleOrIco'] == 0){
                            echo "<a href='/'><img src='" . $MA_Settings[0]['ma_title'] . "' alt='' /></a>";
                        } else{
                            $MA_Title = explode('-',$MA_Settings[0]['ma_title']);
                            echo "<h3><span>" . $MA_Title[0] . "</span>-" . $MA_Title[1] . "</h3>";
                        }
                        ?>

                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-left">
                        <!--
                            <li><a href="/checkout"><i class="fa fa-crosshairs"></i> الدفع</a></li>
                         -->
                        <ul class="nav navbar-nav">
                            <?php
                            if (!isset($_SESSION['MA_SESSION_USERNAME'])){
                                ?>
                                <li><a href="/auth/login"><i class="fa fa-lock"></i> تسجيل دخول</a></li>
                                <li><a href="/auth/register"><i class="fa fa-user-plus"></i> تسجيل جديد </a></li>
                                <?php
                            }
                            else
                            {
                                ?>
                                <li><a href="/users/edit/"><i class="fa fa-user"></i> حسابك</a></li>
                                <li><a href="/cart"><i class="fa fa-shopping-cart"></i> الطالبات</a></li>
                                <li><a href="#addProduct"><i class="fa fa-plus-circle"></i> منتج جديد</a></li>
                                <li><a href="/auth/logout/<?php echo MA_REFERER ?>"><i class="fa fa-sign-out"></i> تسجيل الخروج </a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">

                    <div class="mainmenu pull-right">
                        <nav class="navbar navbar-toggleable-md navbar-light navbar-inverse">
                            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/">الرئيسية <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#aboutus">عنا</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#ourproduct">منتجاتنا</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#ourphotos">صورنا</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contactus">اتصل بنا</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-3" style="position: relative">
                    <div class=" pull-left">
                        <form action="/action/search/" class="search_box">

                            <input type="text" name="MASearch" placeholder="بحث"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
<br />
<div class="msg">
    <?php
    if (isset($_COOKIE['MA_Register_Msg']) && !empty($_COOKIE['MA_Register_Msg'])){
        echo "<div class='alert alert-warning'>" .$_COOKIE['MA_Register_Msg'] . "</div>";
    }
    ?>
</div>