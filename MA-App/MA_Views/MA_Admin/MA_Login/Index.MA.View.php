<style>
    .card-box{
        width: 420px;
        margin: 20vh auto;
    }
    .card-box .panel-heading h3{
        font-family: Cairo;
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
            <h3 class="text-center"> تسجيل الدخول ل <strong class="text-custom"> <?php echo $MA_SITE_TITLE['ma_title'] ?></strong> </h3>
        </div>

        <div class="ma-error-panel">
<!--            --><?php
//            foreach (@$MA_ERRORS as $MA_ERROR){
//                echo "<div class='alert alert-danger'>" . $MA_ERROR . "</div>";
//            }
//            ?>
        </div>

        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="" method="POST">

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
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit" name="ma_Login">تسجيل الدخول</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i>هل نسيت كلمة المرور؟ </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>