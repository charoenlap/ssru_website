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
                        Content
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                        <a href="main_cp.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="#">Comment</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row" style="min-height:500px;">
                <div class="col-lg-12">
                    <?php $question_result = $obj_db->getdata('question_detail 
                        LEFT JOIN chi_question ON chi_question_detail.ref_id = chi_question.id 
                        LEFT JOIN chi_user ON chi_question_detail.user_id_add = chi_user.user_id','
                        chi_question_detail.del=0 and chi_user.user_level_id<>1 and chi_user.user_level_id<>5','
                        *,chi_question_detail.message as message,chi_question_detail.status as status,chi_question_detail.date_add as date_add,chi_question_detail.id as id');$i=1;?>
                    <div class="table-responsive">
                        <div id="table-answer">
                            <input class="search" placeholder="Search" />
                              <button class="sort" data-sort="status">
                                Sort by status
                              </button>
                            <table class="table table-bordered table-hover table-striped">
                               <thead>
                                  <tr>
                                    <th></th>
                                    <th>Message</th>
                                    <th>User</th>
                                    <th width="150">Date</th>
                                    <th>Report</th>
                                    <th width="100"></th>
                                  </tr>
                                </thead>
                                <tbody class="list">
                                    <?php 
                                        
                                        foreach ($question_result->rows as $key => $value) { ?>
                                            <?php 
                                            $result_report = $obj_db->getdata('report','id_question_detail='.(int)$value['id']);
                                        ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td class="msg"><?php echo mb_strimwidth($value['message'],0,70,"...",'utf8');?></td>
                                            <td class="doctor"><?php echo $value['name'];?> <?php echo $value['lname'];?></td>
                                            <td class="date"><?php echo $value['date_add'];?></td>
                                            <td><?php echo $result_report->num_rows;?></td>
                                            <td>
                                                <a href="#" class="btn btn-xs btn-warning btn-edit-msg" data-toggle="modal" data-target="#myModalcomment" data-message="<?php echo $value['message'];?>" data-id="<?php echo $value['id'];?>" data-user-id="<?php echo $value['user_id'];?>"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger btn-del-question" data-id="<?php echo $value['id'];?>"><i class="fa fa-eraser"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <ul class="pagination"></ul>
                        </div>
                    </div>
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
    $('.content').addClass('active');
    $('.btn-del-question').click(function(e){
      if(confirm('Do you want to delete')==true){
        var id = $(this).attr('data-id');
          $.ajax({
                url: 'ajax/approve_detail_remove.php',
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
    $('.btn-edit-question').click(function(e){
        var id = $(this).attr('data-id');
        var status = $(this).attr('data-status');
          $.ajax({
                url: 'ajax/approve_detail_status.php',
                type: 'GET',
                data: {id:id,status:status },
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
    });
    $('#btn-edit-ans-save').click(function(e){
        var question_detail_id = $(this).attr('data-question-detail-id');
        var data_user_id = $(this).attr('data-user-id');
        var message = $('#msg-edit').val();
        var message_doc = $('#msgtodoc').val();
        var check;
        if($('#chkAlertDoc').is(':checked')){
            check = 1;
        }else{
            check = 0;
        }
          $.ajax({
                url: 'ajax/update_doctor_status.php',
                type: 'GET',
                data: {question_detail_id:question_detail_id,data_user_id:data_user_id,message:message,check:check,message_doc:message_doc },
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
    });
});
</script>
<div class="modal fade" id="myModalcomment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Message</h4>
      </div>
      <div class="modal-body">
        <label>Edit Message</label>
        <textarea id="msg-edit" class="form-control" rows="5"></textarea>
      </div>
      <div class="modal-footer">
        
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-edit-ans-save" data-question-detail-id="" data-user-id="">Save changes</button>
      </div>
    </div>
  </div>
</div>