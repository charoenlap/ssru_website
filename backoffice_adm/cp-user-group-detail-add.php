<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $input = $_POST;
    $last_insert_id = $obj_db->insert("user_level",$input);
    header('location:cp-user-group-detail.php?user_level_id='.(int)$last_insert_id.'&result=success');
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
                            <a href="#">Add user level</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row" style="min-height:500px;">
                <div class="col-lg-12">
                    <form action="cp-user-group-detail-add.php" method="POST" enctype="multipart/form-data">
                        <?php 
                            $user_level_result = $obj_db->getdata('user_level','user_level_id='.(int)$_GET['user_level_id']);
                            $user_level_result = $user_level_result->row; 
                        ?>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add user group</h3>
                        </div>
                        <?php if(isset($_GET['result'])){ ?>
                        <p class="alert text-success alert-success text-center"><?php echo $_GET['result'];?></p>
                        <?php } ?>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">User group name:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="level_name" value="<?php echo $user_level_result['level_name'];?>">
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