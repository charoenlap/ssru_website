<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');
?>
<div id="wrapper">
<?php require_once('include/inc.header.php');?>
    <div id="page-wrapper">
        
        <div class="container-fluid">
          <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                         กลุ่มผู้ใช้งาน
                    </h1>
                    <ol class="breadcrumb hidden">
                        <li>
                        <a href="main_cp.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="#">User</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row" style="min-height:500px;">
                <div class="col-lg-12">
                    <a href="cp-user-group-detail-add.php" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i></a>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                           <thead>
                              <tr>
                                <th width="80"></th>
                                <th>กลุ่มผู้ใช้งาน</th>
                                <th width="80"></th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    $user_result = $obj_db->getdata('user_level','user_level_id<>0 order by user_level_id ASC');
                                    foreach ($user_result->rows as $key => $value) { 
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $value['level_name'];?></td>
                                        <td>
                                            <?php if($value['user_level_id']!="5"){ ?>
                                                <a href="cp-user-group-detail.php?user_level_id=<?php echo $value['user_level_id'];?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn-del-user btn btn-xs btn-danger" data-id="<?php echo $value['user_level_id'];?>"><i class="fa fa-eraser"></i></a>
                                            <?php } ?>
                                            <?php if($value['user_level_id']=="5" && (int)$_SESSION['user_level_id']=="5"){ ?>
                                                <a href="cp-user-group-detail.php?user_level_id=<?php echo $value['user_level_id'];?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn-del-user btn btn-xs btn-danger" data-id="<?php echo $value['user_level_id'];?>"><i class="fa fa-eraser"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="cp-user-group-detail-add.php" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i></a>
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
    $('.btn-del-user').click(function(e){
      if(confirm('ยืนยันการลบ')==true){
        var id = $(this).attr('data-id');
          $.ajax({
                url: 'ajax/user_level_remove.php',
                type: 'GET',
                data: {id:id },
            })
            .done(function() {
                window.location.reload();
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            e.preventDefault();
        
      }else{
        e.preventDefault();
      }
    });
});
</script>