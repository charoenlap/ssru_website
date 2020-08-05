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
                            <a href="#">Approve Question</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row" style="min-height:500px;">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div id="table-approve">
                            <input class="search" placeholder="Search" />
                              <button class="sort" data-sort="topic">
                                Sort by topic
                              </button>
                              <button class="sort" data-sort="update">
                                Sort by Update
                              </button>
                                <?php $result_question = $obj_db->getdata('question INNER JOIN '.PREFIX.'user ON '.PREFIX.'question.user_id_add = '.PREFIX.'user.user_id',"del=0 and approveTo IS NULL"); $i=1;
                                ?>
                            <table class="table table-bordered table-hover table-striped">
                               <thead>
                                  <tr>
                                    <th width="30"></th>
                                    <th>Username</th>
                                    <th width="160">Date</th>
                                    <th width="300">Question</th>
                                    <th>Message</th>
                                    <th>Reply</th>
                                    <th>Update</th>
                                    <th width="70"></th>
                                  </tr>
                                </thead>
                                <tbody class="list">
                                    <?php 
                                        
                                        foreach ($result_question->rows as $key => $value) { ?>
                                        <?php 
                                            $count_reply = $question->getReply($value['id']);
                                            $count_replyUpdate = $question->getReplyUpdate($value['id']);
                                            $reply = (isset($count_reply->num_rows)?$count_reply->num_rows:0);
                                            $replyUpdate = (isset($count_replyUpdate->num_rows)?$count_replyUpdate->num_rows:0);
                                            $person_detail = $obj_db->getdata('user','user_id='.(int)$value['user_id_add']);
                                        ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $person_detail->row['name']." ".$person_detail->row['lname'];?></td>
                                            <td><?php echo $value['date_add'];?></td>
                                            <td class="topic"><?php echo mb_strimwidth($value['topic'],0,70,"...",'utf8');?></td>
                                            <td class="msg"><a href="#" class="title_popup" title="<?php echo $value['message'];?>"><?php echo mb_strimwidth($value['message'], 0, 30,'...','utf8');?></a></td>
                                            <td class="reply text-center"><?php echo $reply;?></td>
                                            <td class="update text-center <?php echo ($replyUpdate>0?'text-danger':'');?>"><?php echo $replyUpdate;?></td>
                                            <td>
                                                <a href="cp-approve-detail.php?id=<?php echo $value['id'];?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
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
    $(document).on('click','.btn-del-question',function(e){
      if(confirm('Do you want to delete')==true){
        var id = $(this).attr('data-id');
          $.ajax({
                url: 'ajax/approve_remove.php',
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