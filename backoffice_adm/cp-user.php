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
                        User
                    </h1>
                    <ol class="breadcrumb">
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
                    <a href="cp-user-detail-add.php" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i></a>
                    <br><br>
                    <?php 
                    // $question_result = $question->getQuestion(); $i=1;?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="example">
                           <thead>
                              <tr>
                                <th>no</th>
                                <th>Name Lastname</th>
                                <th>Email</th>
                                <th>date expired</th>
                                <th>Position</th>
                                <th>active</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $user_result = $obj_db->getdata('user','user_id<>0 and user_level_id <>5 order by user_level_id ASC');
                                    $i=1;
                                    foreach ($user_result->rows as $key => $value) { 
                                        $user_level_result = $obj_db->getdata('user_level','user_level_id='.(int)$value['user_level_id']);
                                        // if(!empty($value['fb_id'])){
                                        //     $image = $value['image'];
                                        // }else{
                                        //     $image = $mdir.$value['image'];
                                        // }
                                        // if(empty($value['image'])){
                                        //     $image = "http://www.chiiwii.com/assets/img/rs-avatar-64x64.jpg";
                                        // }
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $value['name'];?> <?php echo $value['lname'];?></td>
                                        <td><?php echo $value['email'];?></td>
                                        <td><?php echo $value['date_add'];?></td>
                                        <td><?php echo $user_level_result->row['level_name'];?></td>
                                        <td>
                                            <a href="cp-user-detail.php?id=<?php echo $value['user_id'];?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn-del-user btn btn-xs btn-danger" data-id="<?php echo $value['user_id'];?>"><i class="fa fa-eraser"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="cp-user-detail-add.php" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i></a>
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
    $('.btn-del-user').click(function(e){
      if(confirm('Do you want to delete')==true){
        var id = $(this).attr('data-id');
          $.ajax({
                url: 'ajax/user_remove.php',
                type: 'GET',
                data: {id:id },
            })
            .done(function() {
                location.reload();
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