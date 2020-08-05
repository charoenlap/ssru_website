<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $input = $_POST;
    // print_r($input);
    // exit();
    // $path = '../upload/profile/';
    // if($_FILES["image"]["size"]>0){
    //     $obj_pic->add_pic($_FILES["image"],$path,"PF_".$input['user_id']."U_",$thumb=false);
    //     $input['image']= "upload/profile/".$obj_pic->picture; 
    // }
    // print_r($input); exit();
    $update = $obj_db->update("user",$input,"user_id=".(int)$_GET['id']);
    header('location:cp-user-detail.php?id='.(int)$_GET['id'].'&result=บันทึกเรียบร้อย');
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php 
                            $user_result = $obj_db->getdata('user','user_id='.(int)$_GET['id']);
                            $user_result = $user_result->row; 
                        ?>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit User</h3>
                        </div>
                        <?php if(isset($_GET['result'])){ ?>
                            <p class="alert text-success alert-success text-center"><?php echo strtoupper($_GET['result']);?></p>
                        <?php } ?>
                        <div class="panel-body">

                            <!-- <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">หมายเลขสมาชิก:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="user_code_no" value="<?php echo $user_result['user_code_no'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">ชื่อโรงพยาบาล:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name_hospital" value="<?php echo $user_result['name_hospital'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div> -->

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
                                <label for="name" class="col-sm-2 control-label">ชื่อ:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" value="<?php echo $user_result['name'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">นามสกุล:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="lname" value="<?php echo $user_result['lname'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="phone" value="<?php echo $user_result['phone'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">เบอร์โทรศัพท์มือถือ</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="telephone" value="<?php echo $user_result['telephone'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Username:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="username" value="<?php echo $user_result['username'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div> -->
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">E-mail:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="email" value="<?php echo $user_result['email'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">เลขที่</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="num" value="<?php echo $user_result['num'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">หมู่</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="moo" value="<?php echo $user_result['moo'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">ถนน</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="road" value="<?php echo $user_result['road'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">ตำบล</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="tumbon" value="<?php echo $user_result['tumbon'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">อำเภอ</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="aumper" value="<?php echo $user_result['aumper'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">รหัสไปรษณ๊ย์</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="postal" value="<?php echo $user_result['postal'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">โทรศัพท์</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="tel" value="<?php echo $user_result['tel'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">fax</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="fax" value="<?php echo $user_result['fax'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div> -->
                            <?php /*<div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Sex:</label>
                                <div class="col-sm-10">
                                  <select name="sex" class="form-control">
                                    <option value="M" <?php echo ($user_result['sex']=="M"?'selected':'');?>>ชาย</option>
                                    <option value="F" <?php echo ($user_result['sex']=="F"?'selected':'');?>>หญิง</option>
                                  </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>*/ ?>
                            <!-- <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Birthday:</label>
                                <div class="col-sm-10">
                                  <input type="text" name="birthday" class="form-control" value="<?php echo $user_result['birthday'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">วันหมดอายุ</label>
                                <div class="col-sm-10">
                                  <input type="date" class="form-control" name="user_time_out" value="<?php echo $user_result['user_time_out'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div> -->
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">User level:</label>
                                <div class="col-sm-10">
                                  <select name="user_level_id" class="form-control">
                                    <?php $user_level_result = $obj_db->getdata('user_level'); ?>
                                    <?php foreach($user_level_result->rows as $value_level){ ?>
                                        <option value="<?php echo $value_level['user_level_id'];?>" <?php echo ($value_level['user_level_id']==$user_result['user_level_id']?'selected':'');?>><?php echo $value_level['level_name'];?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php /*<div class="form-group ">
                                <label for="detail" class="col-sm-2 control-label">Details:</label>
                                <div class="col-sm-10">
                                  <textarea  class="ckeditor form-control" name="detail" rows="" cols=""/><?php echo $user_result['detail'];?></textarea>
                                  <div class="clearfix"></div>
                                </div>
                            </div>*/ ?>
                            <div class="clearfix"></div>
                            <?php /*<div class="form-group" style="margin-top:20px;">
                                <label for="name" class="col-sm-2 control-label">User status:</label>
                                <div class="col-sm-10">
                                  <select name="user_status" class="form-control" >
                                    <option value="1" <?php echo ($user_result['user_status']=="1"?'selected':'');?>>Enable</option>
                                    <option value="0" <?php echo ($user_result['user_status']=="0"?'selected':'');?>>Disable</option>
                                  </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>*/ ?>
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