<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php'); ?>
<?php 
$_SESSION['ajax_token'] = md5(rand(0,9999));

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $input = $_POST;
    foreach ($_POST['user_status'] as $key => $value) {
        $arr = array(
            'user_status'   => $value,
            );
        $update_users = $obj_db->update('users',$arr,'user_id='.$input['user_id'][$key]);

        $result_user = $obj_db->getdata('users','user_id='.$input['user_id'][$key]);
        if ($result_user->row['user_status']==1) {
            if ($result_user->row['send_mail']==0) {
            $email = $result_user->row['email'];
            $subject = "ได้รับการตรสจสอบแล้ว";
            $msg = "
                <div style='padding: 20px;border-radius: 0 0 2px 2px;font-weight: 500;color: rgba(0,0,0,.6);    box-shadow: 0 2px 2px 0 rgba(0,0,0,.05),0 3px 1px -2px rgba(0,0,0,.08),0 1px 5px 0 rgba(0,0,0,.08); position: relative;margin: 0.5rem 0 1rem 0; background-color: #fff;transition: box-shadow .25s;border-radius: 2px;'>
                    <h1>ข้อมูลการติดต่อ</h1>
                    <p>ชื่อ : ".$result_user->row['name']."</p>
                    <p>เบอร์โทรศัพท์ : ".$result_user->row['phone']."</p>
                    <p>Email : ".$result_user->row['email']."</p>
                </div>
            ";
            @sendmailSmtp($email,$msg,$subject);
            $arr_mail = array(
                'send_mail'     =>  '1',
                );
            $update_send_mail = $obj_db->update('users',$arr_mail,'user_id='.$result_user->row['user_id']);
            }
        }
    }
    header('location:cp-user.php?result=success');

}
if (isset($_GET['send_mail'])) {
    $result_user_2 = $obj_db->getdata('users','user_id='.get('send_mail'));

    $email = $result_user_2->row['email'];
    $subject = "ได้รับการตรสจสอบแล้ว";
    $msg = "
        <div style='padding: 20px;border-radius: 0 0 2px 2px;font-weight: 500;color: rgba(0,0,0,.6);    box-shadow: 0 2px 2px 0 rgba(0,0,0,.05),0 3px 1px -2px rgba(0,0,0,.08),0 1px 5px 0 rgba(0,0,0,.08); position: relative;margin: 0.5rem 0 1rem 0; background-color: #fff;transition: box-shadow .25s;border-radius: 2px;'>
            <h1>ข้อมูลการติดต่อ</h1>
            <p>ชื่อ : ".$result_user_2->row['name']."</p>
            <p>เบอร์โทรศัพท์ : ".$result_user_2->row['phone']."</p>
            <p>Email : ".$result_user_2->row['email']."</p>
        </div>
    ";
    sendmailSmtp($email,$msg,$subject);
    header('location:cp-user.php?result=success');
}
if (isset($_GET['del'])) {
    if ($_GET['del']==0) {
        # code...
    } else {
        $update['del'] = 1;
        $last_del = $obj_db->update('users',$update,'user_id='.$_GET['del']);
    }
}
if (isset($_GET['status']) AND isset($_GET['user_id'])) {
    if (!empty($_GET['user_id'])) {
    	$update = array(
    		'user_status'=> $_GET['status'],
    	);
        $last_update = $obj_db->update('users',$update,'user_id='.(int)$_GET['user_id']);
        if ($last_update) {
        	header('location:cp-user.php?result=success');
        } else {
        	header('location:cp-user.php?result=fail');
        }
    }
}

if (isset($_GET['date_expired']) AND isset($_GET['user_id'])) {
    if (!empty($_GET['user_id'])) {
        $update = array(
            'date_expired'=> $_GET['date_expired'],
        );
        if ($last_update = $obj_db->update('users',$update,'user_id='.(int)$_GET['user_id'])) {
            header('location:cp-user.php?result=success');
        } else {
            header('location:cp-user.php?result=fail');
        }
    }
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
                    <!-- <a href="cp-user-detail-add.php" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i></a> -->
                    <br><br>
                    <?php if(isset($_GET['result'])){ ?>
                        <p class="alert text-success alert-success text-center"><?php echo $_GET['result'];?></p>
                        <?php } ?>
                    <form action="" method="post">
                        <div class="table-responsive">
                            <table class="table table-bordered " id="example">
                               <thead>
                                  <tr>
                                    <th>no</th>
                                    <th>Name Lastname</th>
                                    <th>phone</th>
                                    <th>Email</th>
                                    <th>date expired</th>
                                    <th>Position</th>
                                    <th>สถานะ</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php /*
                                        $i=1;
                                        $user_result = $obj_db->getdata('users','user_id<>0 and del=0 order by user_level_id DESC');
                                        foreach ($user_result->rows as $key => $value) { 
                                            $user_level_result = $obj_db->getdata('user_level','user_level_id='.(int)$value['user_level_id']);
                                        ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $value['name'];?> <?php echo $value['lname'];?></td>
                                            <td><?php echo $value['phone'];?></td>
                                            <td><?php echo $value['email'];?></td>
                                            <td>
                                                
                                            </td>
                                            <td><?php echo $user_level_result->row['level_name'];?></td>
                                            <td>
                                                <select name="user_status[]" class="form-control">
                                                    <option value="0" <?php echo $value['user_status']=='0' ? 'selected' : ''; ?>>ยังไม่ได้ตรวจสอบ</option>
                                                    <option value="1" <?php echo $value['user_status']=='1' ? 'selected' : ''; ?>>ตรวจสอบแล้ว</option>
                                                </select>
                                            <input type="hidden" name="user_id[]" value="<?php echo $value['user_id']; ?>">
                                            </td>
                                            <td>
                                                <a href="cp-user-detail.php?id=<?php echo $value['user_id'];?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn-del-user btn btn-xs btn-danger" data-id="<?php echo $value['user_id'];?>"><i class="fa fa-eraser"></i></a>
                                                <?php if ($value['user_status']==1) { ?>
                                                    <a href="cp-user.php?send_mail=<?php echo $value['user_id'];?>" onclick="return confirm('คุณต้องการส่งอีเมล์อีกครั้งใช่หรือไม่')" class="btn btn-xs btn-info"><i class="fa fa-reply"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php }  */ ?>
                                </tbody>
                            </table>
                            <input type="submit" class="btn btn-primary pull-right">
                        </div>
                    </form>
                    <!-- <a href="cp-user-detail-add.php" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i></a> -->
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
    // $(document).ready(function() {
    //     $('#example').DataTable( {
    //         "ajax": "data/arrays.txt"
    //     });
    // } );
    $(document).on('change','.status_update',function(e){
	   var option = $(this).find('option:selected').attr('user_id');
        window.location = 'cp-user.php?status='+$(this).val()+'&user_id='+option;
    });
    $(document).on('change','.dater_expired',function(e){
        // alert($(this).val());
        window.location = 'cp-user.php?date_expired='+$(this).val()+'&user_id='+$(this).attr('user_id');
    });
    $(document).ready(function(e){
        var ajax_token = '<?php echo $_SESSION['ajax_token']; ?>'
        var table = $('#example').DataTable({
            "processing":   true,
            "serverSide":   true,
            "ordering"  :   true,
            "pageLength":   5,
            "ajax":{
                url :"ajax/datatable/our_client.php?ajax_token="+ajax_token,
                type: "get",
                dataSrc: function(json){
                    $('#example').on('focus', 'input.datepicker', function(event) {
                        $(this).datepicker({
                            dateFormat: "yy-mm-dd",
                            // startDate: '-3d'
                        }).datepicker('show');
                    });
                    return json.data;
                },
                error: function(error){
                    console.log(error);
                }
            },
            "deferedLoading": 57,
        });
    });

    // $('.status_update').change(function(e){
    // 	alert('ss');
    //   if(confirm('Do you want to update status')==true){
    //     var id = $(this).attr('user_id');
    //       $.ajax({
    //             url: 'ajax/user_status_update.php',
    //             type: 'GET',
    //             data: {id:id },
    //         })
    //         .done(function() {
    //             location.reload();
    //         })
    //         .fail(function() {
    //             console.log("error");
    //         })
    //         .always(function() {
    //             console.log("complete");
    //         });
    //         e.preventDefault();
        
    //   }else{
    //     e.preventDefault();
    //   }
    // });

    

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