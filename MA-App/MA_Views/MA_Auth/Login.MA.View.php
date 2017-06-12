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
    .card-box input:focus{
        background:#F0F0E9;
    }
    .card-box input[type=submit] {
        background: #fe980f;
    }
    .card-box .panel-heading {
        padding-bottom: 35px;
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
            <h3 class="text-center"> تسجيل الدخول إلى <strong class="text-custom"> حسابك</strong> </h3>
        </div>

        <div class="ma-error-panel">
            <?php
            echo $MA_ERROR;
            ?>
        </div>

        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="/auth/login" method="POST">

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="ma_Username" required="" placeholder="إسم المستخدم">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="ma_Password" required="" placeholder="كلمة المرور">
                    </div>
                </div>

                <div class="form-group MA-Right">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                تذكرنى
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <input class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit" name="ma_Login" value="تسجيل الدخول">
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="/auth/restpass" class="text-dark"><i class="fa fa-lock m-r-5"></i>هل نسيت كلمة المرور؟ </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>