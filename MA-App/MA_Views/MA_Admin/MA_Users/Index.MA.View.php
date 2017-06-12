<style>
    td{
        line-height: inherit;
    }
    img{
        width: 35px;
        height: 35px;
    }
    .box-title{
        margin-bottom: 10px;
    }
</style>
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right m-t-15">
                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                    <ul class="dropdown-menu drop-menu-right" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>

                <h4 class="page-title">Editable Tables</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Ubold</a>
                    </li>
                    <li>
                        <a href="#">Tables</a>
                    </li>
                    <li class="active">
                        Editable tables
                    </li>
                </ol>
            </div>
        </div>


        <div class="panel">

            <div class="panel-body">
                <div class="row">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                <a class="btn btn-primary" href="/admin/users/add">إضافة عضو جديد</a>

                            </div>
                        </div><!-- /.box-header -->
                        <div id="msg">

                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>إسم المستخدم</th>
                                    <th>البريد الإلكترونى</th>
                                    <th>اللإسم كامل</th>
                                    <th>الصلاحية</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($MA_getAllUsers as $MA_getAllUser){
                                        ?>
                                        <tr class="<?php echo $MA_getAllUser['Username'] ?>">
                                            <td><?php echo $MA_getAllUser['UserId'] ?></td>
                                            <td><?php
                                                if (!empty($MA_getAllUser['Picture']))
                                                {
                                                    echo "<img src='" . $MA_getAllUser['Picture'] . "' alt=' " . $MA_getAllUser['Username'] ." '>";
                                                }
                                                else
                                                {
                                                    echo "<img src='/MA_Images/avatar5.png' alt='" . $MA_getAllUser['Username'] . "'>";
                                                }?></td>
                                            <td><?php echo $MA_getAllUser['Username'] ?></td>
                                            <td><?php echo $MA_getAllUser['Email'] ?></td>
                                            <td><?php echo $MA_getAllUser['FullName']  ?></td>
                                            <td><?php
                                                if ($MA_getAllUser['Permission']  == 1){
                                                    echo "مدير";
                                                } elseif($MA_getAllUser['Permission'] == 2){
                                                    echo "مسئول";
                                                } elseif($MA_getAllUser['Permission'] == 3){
                                                    echo "بائع";
                                                } else{
                                                   echo "مستخدم عادى";
                                                }
                                                ?></td>
                                            <td>
                                                <a href="/admin/users/edit/<?php echo $MA_getAllUser['UserId'] ?>" ><i class="fa fa-edit"></i></a>
                                                <?php
                                                if ($MA_getAllUser['Status'] == 0)
                                                    echo "<a id='approve' data-userID ='" . $MA_getAllUser['UserId'] . "' onClick='Approve_User(this.getAttribute('data-userID'))' <i class='fa fa-check-square-o'></i></a>"
                                                ?>
                                                <a href="/admin/users/delete/<?php echo $MA_getAllUser['UserId'] ?>"><i class="fa fa-times"></i></a>
                                                <a href="/<?php echo $MA_getAllUser['Username'] ?>" target="_blank"><i class="fa fa-info"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>إسم المستخدم</th>
                                    <th>البريد الإلكترونى</th>
                                    <th>اللإسم كامل</th>
                                    <th>الصلاحية</th>
                                    <th>التحكم</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                </div>
            </div>
            <!-- end: page -->

        </div> <!-- end Panel -->





    </div> <!-- container -->
</div>

<script type="text/javascript" src="/MA-Admin/MA-Js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/MA-Admin/MA-Js/plugins/dataTables.bootstrap.min.js"></script>
<script>
    var MA_Msg = document.getElementById("msg");

    var approve = document.getElementById("approve");
    var MA_delete = document.getElementById("approve");

    MA_delete.onclick = function () {
        MA_Ajax(this.getAttribute("data-userID"),"/ajax/delete/?Delete_User=",MA_delete,MA_Msg)
    };
    approve.onclick = function () {
        MA_Ajax(this.getAttribute("data-userID"),"/ajax/approve/?Approve_User=",approve,MA_Msg)

    };
    $(function () {
        $("#example1").DataTable();
    });
</script>
