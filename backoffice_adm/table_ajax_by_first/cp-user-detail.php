<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $input = $_POST;
    $path = '../upload/profile/';
    if($_FILES["image"]["size"]>0){
        $obj_pic->add_pic($_FILES["image"],$path,"PF_".$input['user_id']."U_",$thumb=false);
        $input['image']= "upload/profile/".$obj_pic->picture; 
    }
    $update = $obj_db->update("users",$input,"user_id=".(int)$input['user_id']);
    header('location:cp-user-detail.php?id='.(int)$input['user_id'].'&result=success');
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
                    <form action="cp-user-detail.php" method="POST" enctype="multipart/form-data">
                        <?php 
                            $user_result = $obj_db->getdata('users','user_id='.(int)$_GET['id']);
                            $user_result = $user_result->row; 
                        ?>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit User</h3>
                        </div>
                        <?php if(isset($_GET['result'])){ ?>
                        <p class="alert text-success alert-success text-center"><?php echo $_GET['result'];?></p>
                        <?php } ?>
                        <div class="panel-body">
                            <?php /*<div class="form-group">
                            <?php 
                            
                                if(!empty($user_result['fb_id'])){
                                    $image = $user_result['image'];
                                }else{
                                    $image = $mdir.$user_result['image'];
                                }
                                if(empty($user_result['image'])){
                                    $image = "http://www.chiiwii.com/assets/img/rs-avatar-64x64.jpg";
                                }
                            ?>
                                <label for="name" class="col-sm-2 control-label">รูป:</label>
                                <div class="col-sm-10">
                                    <img src="<?php echo $image;?>" alt="placeholder+image" style="width:auto;height:150px;">
                                    <input type="file" name="image">
                                </div>
                                <div class="clearfix"></div>
                            </div>*/ ?>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Full Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" value="<?php echo $user_result['name'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="email" value="<?php echo $user_result['email'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Tel.</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="phone" value="<?php echo $user_result['phone'];?>">
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
                                    <option value="<?php echo $value_level['user_level_id'];?>" <?php echo ($value_level['user_level_id']==$user_result['user_level_id']?'selected':'');?>><?php echo $value_level['level_name'];?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="hidden" name="user_id" value="<?php echo (int)$_GET['id'];?>">
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