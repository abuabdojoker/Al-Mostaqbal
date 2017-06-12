<style>
    .panel{
        padding: 50px;
    }
    .panel i{
        font-size: 90px;
    }
    .fa-times-circle-o{
        color: #a94543;
    }
    .panel a{
        margin-top: 10px;
        color: #fff!important;
    }
</style>
<div class="panel">
    <div class="panel-body text-center">

    <?php
    use MAAlMOSTAQBAL\MA_LIBS\MA_Actions;

    foreach ($MA_Msg as $ma_msg){
        if ($ma_msg === true)
        {
            echo "<div class='alert alert-success'><div><i class='fa fa-check-circle-o '></i></div> تم تفعيل حسابك بنجاح <br /><a href='/' class='btn btn-primary'>الصفحة الرئيسية</a></div>";
        }
        else
        {
            echo "<div class='alert alert-danger'><div><i class='fa fa-times-circle-o'></i></div>" . $ma_msg . "<br /><a href='/' class='btn btn-primary'>الصفحة الرئيسية</a></div>";
        }
    }
//    echo "<a href='/' class='btn btn-primary'>الصفحة الرئيسية</a>";
    MA_Actions::MA_Redirect("/",5)
    ?>
    </div>
</div>