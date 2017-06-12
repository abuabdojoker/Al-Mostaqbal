<style>
    .list-group-item{
        height: 105px;
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

        <div class="col-lg-4">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading">
							<h3 class="panel-title">إختار صورتك</h3>
						</div>
						<div class="panel-body">
							<p class="ma-img">

                            </p>
						</div>

						<!-- List group -->
						<ul class="list-group">
							<li class="list-group-item">
                               <form>
                                   <div class="form-group">
                                       <div class="col-md-4">
                                           <label for="file">اختار صورة</label>
                                       </div>
                                       <div class="col-md-8">
                                           <input id="file" type="file" class="form-control" name="picture">
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <div class="col-md-12">
                                           <input type="submit" value="رفع" class="btn btn-primary">
                                       </div>
                                   </div>
                               </form>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
      	<div class="col-lg-8">
      		 <div class="panel panel-default">
      		    <div class="MA-panel-heading">
      		    	<div class="panel-title" >
                     <h4 style="float:right!important">إضافة مستخدم جديد</h4>
	                   <a class="btn btn-danger" href="/admin/users" style="float:left!important"> إلغاء <i class="fa fa-arrow-circle-o-left"></i></a>
	                </div>
      		    </div>
	            <div class="panel-body">
	                <div class="row">
	                    <div class="box">
                            <div class="massage-area">

                            </div>
	                        <div class="box-body">
	                        	<form method="POST">
	                        		<div class="form-group">
                                        <div class="col-md-3">
                                            <label for="user">إسم المستخدم</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="user" type="text" class="form-control" name="user" required="required" placeholder="إسم المستخدم">
                                        </div>
	                        		</div>

                                    <br/>

                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label for="name">اﻹسم كامل</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control" name="name" required="required" placeholder="اﻹسم كامل">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label for="email">البريد اﻹلكترونى</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="email" type="text" class="form-control" name="email" required="required" placeholder="البريد اﻹلكترونى">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label for="pass">كلمة المرور</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="pass" type="text" class="form-control" name="pass" required="required" placeholder="كلمة المرور">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label for="permission">الصلاحية</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="permission" class="form-control" name="perm">
                                                <option> إختيار صلاحية المستخدم </option>
                                                <option value="1">مدير</option>
                                                <option value="10">مسئول</option>
                                                <option value="2">محاسب</option>
                                                <option value="20">موظف</option>
                                                <option value="3">مستخدم عادى</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="MA_ADD_USER" value="إضافة العضو">
                                    </div>
	                        	</form>
	                        </div><!-- /.box-body -->
	                    </div>
	                </div>
	            <!-- end: page -->
	            </div> <!-- end Panel -->
      	    </div>
        </div>
    </div><!-- container -->
</div>
