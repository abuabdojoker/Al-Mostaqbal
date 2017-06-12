<style>
    .card-box{
        width: 420px;
        margin: 17vh auto;
        font-family: Cairo;
    }
    .card-box input,button{
        font-family: Cairo;
    }
    .card-box input{
        background: #f0f0e9;
    }
    .card-box input[type=submit]{
        background: #fe980f;
    }
    .card-box input:focus{
        background:#F0F0E9;
    }
    .card-box .panel-heading h3{
        padding-bottom: 15px;
    }
    .MA-Right{
        float: right!important;
    }
    @media (max-width: 438px) {
        .MA-Customise{
            padding: 20px;
        }
        .card-box{
            width: 100%;
        }
    }
</style>
<?php
error_reporting(0);
?>
<div class="MA-Customise">
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> <strong>تسجيل حساب جديد</strong> </h3>
        </div>

        <div class="ma-error-panel" id="msg">
            <?php
            echo $MA_Add . "<br />";
            echo $MA_ERROR;
            ?>
        </div>

        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="/auth/register"  method="POST">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" id="name"  type="text" name="ma_Name" required="" placeholder="الإسم كامل">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" id="user" type="text" name="ma_User" required="" placeholder="إسم المستخدم">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" id="email" type="text" name="ma_Email" required="" placeholder="البريد الإلكترونى">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" id="pass" type="password" name="ma_Pass" required="" placeholder="كلمة المرور">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" id="rePass" type="password" name="ma_RePass" required="" placeholder="إعادة كلمة المرور">
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <input class="btn btn-pink btn-block text-uppercase" type="submit" name="ma_Register" value="تسجيل ">
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="auth/login" class="text-dark"><i class="fa fa-lock m-r-5"></i>هل لديك حساب مسبقاً؟ </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>