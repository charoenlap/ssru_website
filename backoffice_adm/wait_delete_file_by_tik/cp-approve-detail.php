<?php 
    require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php');
    require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/phpMailer/class.phpmailer.php');
?>
<?php require_once('include/inc.head.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $input = $_POST;
    // send mail to user 
    if($input['status']=="1"){
        $user_detail = $obj_db->getdata('user','user_id='.(int)$input['user_id']);
        $to_email=$user_detail->row['email'];

        $msg="<p>ท่านได้รับคำตอบจากชีวีแล้ว</p>";
        $subject="CHIIWII : ท่านได้รับคำตอบจากชีวีแล้ว";
        sendmailSmtp($to_email,$msg,$subject);
    }
    // send mail to doctor
    $doctor_detail = $obj_db->getdata('user','user_id='.(int)$input['approveTo']);
    $to_doctor_email=$doctor_detail->row['email'];
    $msg="<p>New question approve to you.</p>";
    $subject="New question";
    sendmailSmtp($to_doctor_email,$msg,$subject);

    unset($input['user_id']);
    $update = $obj_db->update("question",$input,"id=".(int)$input['id']);
    header('location:cp-approve-detail.php?id='.(int)$input['id'].'&result=success');
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
                            <a href="#">Approve Question</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row" style="min-height:500px;">
                <div class="col-lg-12">
                    <form action="cp-approve-detail.php" method="POST">
                        <?php 
                            $question_result = $question->getQuestion((int)$_GET['id']);
                            $question_result = $question_result->row; 
                        ?>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Question</h3>
                        </div>
                        <?php if(isset($_GET['result'])){ ?>
                        <p class="alert text-success alert-success text-center"><?php echo $_GET['result'];?></p>
                        <?php } ?>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">username:</label>
                                <div class="col-sm-10">
                                  <?php echo $question_result['username'];?>
                                  <input type="hidden" name="user_id" value="<?php echo $question_result['user_id'];?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Date:</label>
                                <div class="col-sm-10">
                                  <?php echo $question_result['date_add'];?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Topic:</label>
                                <div class="col-sm-10">
                                  <input type="text" name="topic" class="form-control" value="<?php echo $question_result['topic'];?>" name=""/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Message:</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="message" rows="11"><?php echo $question_result['message'];?></textarea>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Approve To:</label>
                                <div class="col-sm-10">
                                  <?php $doctor = $user->getusersDoctor();?>
                                  <select name="approveTo" class="form-control">
                                    <option value="">Please select</option>
                                    <?php foreach ($doctor->rows as $key => $value) { ?>
                                        <option value="<?php echo $value['user_id'];?>" <?php echo ($question_result['approveTo']==$value['user_id']?'selected':'');?>><?php echo $value['name'].' '.$value['lname'];?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Category:</label>
                                <div class="col-sm-10">
                                  <?php $mCate = $question->getMCate();$firstMCate = "";$countmain=0;?>
                                  <select name="main_cat_id" id="main_cat_id" class="form-control">
                                    <?php foreach ($mCate->rows as $key => $value) { 
                                        if($countmain == 0){$firstMCate=$value['id'];}
                                    ?>
                                    <option value="<?php echo $value['id'];?>" <?php echo $question_result['main_cat_id'] == $value['id'] ? "selected" : ""; ?>><?php echo $value['category_title'];?></option>
                                    <?php $countmain++;if($question_result['main_cat_id'] == $value['id']){ $firstMCate=$value['id'];} 
                                         

                                    }
                                    ?>
                                  </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Sub Category:</label>
                                <div class="col-sm-10">
                                  <div class="select_sub">
                                    <?php $mCate = $question->getSubCate($firstMCate);?>
                                    <select name="sub_cat_id" class="form-control">
                                      <?php foreach ($mCate->rows as $key => $value) { ?>
                                      <option value="<?php echo $value['id'];?>" <?php echo $question_result['sub_cat_id'] == $value['id'] ? "selected" : ""; ?>><?php echo $value['category_title'];?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Status:</label>
                                <div class="col-sm-10">
                                  <select name="status" id="select_status" class="form-control">
                                        <option value="1" <?php echo ($question_result['status']==1?'selected':'');?>>Enable</option>
                                        <option value="0" <?php echo ($question_result['status']==0?'selected':'');?>>Disable</option>
                                  </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="tags" class="col-sm-2 control-label">Tags:</label>
                                <div class="col-sm-10">
                                  <input type="text" name="tags" class="form-control" value="<?php echo $question_result['tags'];?>" id="tags"/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="hidden" name="id" value="<?php echo (int)$_GET['id'];?>">
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
    $('.content').addClass('active');
});
$(function() {
    var availableTags;
    

    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
    $("#tags").on('keyup',function(e){
        var data = $('#tags').val();
        //data = data.split(',');
        data = data.split(",").pop(-1);
        jQuery.getJSON('json/tags.php', {data: data}, function(json, textStatus) {
          availableTags = json;
        });
    });
    $( "#tags" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        

        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( "," );
          return false;
        }
      });
      $('#main_cat_id').on('change',function(e){
        $.ajax({
          url: 'ajax/select_category.php',
          type: 'GET',
          dataType: 'html',
          data: {id_sub: $(this).val()},
        })
        .done(function(html) {
          $('.select_sub').html(html);
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
        
      });
  });
</script>