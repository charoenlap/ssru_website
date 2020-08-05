<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $input = $_POST;
    $input['password'] = md5($input['password']);
    $insert = $obj_db->insert("user",$input);
    header('location:cp-user-detail.php?id='.(int)$insert.'&result=success');
}
?>
<div id="wrapper">
<?php require_once('include/inc.header.php');?>
    <div id="page-wrapper">
        
        <div class="container-fluid">
          <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Content
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                        <a href="main_cp.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="#">User detail</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row" style="min-height:500px;">
                <div class="col-lg-12">
                    <form action="cp-user-detail-add.php" method="POST">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add User</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Lastame:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="lname" value="">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Password:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="password" value="">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">E-mail:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="email" value="">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Sex:</label>
                                <div class="col-sm-10">
                                  <select name="sex" class="form-control">
                                    <option value="M">ชาย</option>
                                    <option value="F">หญิง</option>
                                  </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Birthday:</label>
                                <div class="col-sm-10">
                                  <input type="text" name="birthday" class="form-control" value="">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">User level:</label>
                                <div class="col-sm-10">
                                  <select name="user_level_id" class="form-control">
                                    <?php 
                                        $user_level_result = $obj_db->getdata('user_level');
                                    ?>
                                    <?php foreach($user_level_result->rows as $value_level){ ?>
                                    <option value="<?php echo $value_level['user_level_id'];?>"><?php echo $value_level['level_name'];?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="user_status" class="col-sm-2 control-label">User status:</label>
                                <div class="col-sm-10">
                                  <select name="user_status" class="form-control">
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                  </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="save" class="btn btn-primary">
                                </div>
                                <div class="clearfix" id="msg"></div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php require_once('include/inc.footer.php');?>
<script>
$(function(){
    $('.user').addClass('active');
});
</script>