<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');
$user_level_id = $_GET['user_level_id'];
$result_page = $obj_db->getdata('user_level_permission','user_level_id='.(int)$user_level_id);
$pages_checked = array();
if($result_page->num_rows){
    foreach($result_page->rows as $val){
        $pages_checked[] = $val['page_id'];
    }
}
if($_SERVER['REQUEST_METHOD']=="POST"){
    $input = $_POST;
    unset($input['chk']);
    $chk = $_POST['chk'];
    // print_r($chk);
    // exit();
    $obj_db->delete('user_level_permission','user_level_id='.(int)$input['user_level_id']);
    foreach ($chk as $key => $value) {
        $input_permission = array(
            'user_level_id' => (int)$input['user_level_id'],
            'page_id' =>$value
        );
        $obj_db->insert('user_level_permission',$input_permission);
    }
    $update = $obj_db->update("user_level",$input,"user_level_id=".(int)$input['user_level_id']);
    header('location:cp-user-group-detail.php?user_level_id='.(int)$input['user_level_id'].'&result=success');
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
                            <a href="#">User level detail</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row" style="min-height:500px;">
                <div class="col-lg-12">
                    <form action="cp-user-group-detail.php" method="POST" enctype="multipart/form-data">
                        <?php 
                            $user_level_result = $obj_db->getdata('user_level','user_level_id='.(int)$_GET['user_level_id']);
                            $user_level_result = $user_level_result->row; 
                        ?>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit user group</h3>
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
                                <label for="name" class="col-sm-2 control-label">ตั้งค่าการมองเห็น:</label>
                                <div class="col-sm-10">
                                    <div class="well">
                                        <?php $result_page = $obj_db->getdata('page'); 
                                        foreach($result_page->rows as $val){ 
                                            $checked = "";
                                            if(in_array($val['page_id'], $pages_checked)){
                                                $checked = "checked";
                                            }
                                        ?>
                                            <div><input type="checkbox" name="chk[<?php echo $val['page_id'];?>]" id="chk<?php echo $val['page_id'];?>" value="<?php echo $val['page_id'];?>" <?php echo $checked; ?>> <label for="chk<?php echo $val['page_id'];?>"> <?php echo $val['page_name']; ?></label></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">ตั้งของ หลักสูตร:</label>
                                <div class="col-sm-10">
                                    <div class="well">
                                        <?php $result_page = $obj_db->cat('parent = 0'.$hide_del_lan_order); 
                                        foreach($result_page->rows as $val){ 
                                            $checked = "";
                                            if(in_array('cat_'.$val['id'], $pages_checked)){
                                                $checked = "checked";
                                            } ?>
                                            <div>
                                                <input type="checkbox" name="chk[cat_<?php echo $val['id'];?>]" id="cat_chk<?php echo $val['id'];?>" value="cat_<?php echo $val['id'];?>" <?php echo $checked; ?>> 
                                                <label for="cat_chk<?php echo $val['id'];?>"> <?php echo $val['lang_name']; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="hidden" name="user_level_id" value="<?php echo (int)$_GET['user_level_id'];?>">
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
    $('.userlevel').addClass('active');
});
</script>