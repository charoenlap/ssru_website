<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');
// print_r($_SESSION['user_level_id']);
// exit();
$user_level_id = $_SESSION['user_level_id'];
$result_page = $obj_db->getdata('user_level_permission','user_level_id='.(int)$_SESSION['user_level_id']);
$pages_checked = array();
if($result_page->num_rows){
    foreach($result_page->rows as $val){
        $pages_checked[] = $val['page_id'];
    }
}
// print_r($pages_checked);
$cat=0;
$default=1;
if(isset($_GET['cat'])){
  $cat = $_GET['cat'];
  $default = $cat;
}
$para = getpara('message,act,fid');
//$act = "";
if($act!=""){
  if($obj_con->manage_category($act,$fid,$seq)){header("Location: cp-content-cat.php$para");}
}
// $get_cat = $obj_db->getdata('content_cat','id='.(int)$_GET['cat']);
// $get_cat = $get_cat->row;

// $result_la = $obj_db->getdata('language_detail','ref_id='.$get_cat['id'].' and type=0 and language_id = 1');
// $result_la = $result_la->row;
$get_cat = $obj_db->cat('ref_id='.(int)$_GET['cat'].$hide_del_lan_order)->row;


?>
<div id="wrapper">
<?php require_once('include/inc.header.php');?>
    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                      <?php echo empty($get_cat['lang_name'])?'Content':$get_cat['lang_name']; ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="cp-content-cat.php"> Content List</a>
                        </li>
                        <?php if(empty($cat)){
                          $head_table = "Main Categories";
                        ?>
                       <!-- <li class="active"><a href="#">Content Category</a></li> -->
                       <?php }else{ ?>
                       <li>
                            <a href="cp-content-cat.php">Content Category</a>
                       </li>
                       
                       <?php $obj_con->find_parent($cat)?>
                       
                       <li class="current"><a href="#"><?=$obj_con->showcatnameBC($cat)?></a></li>
                       <?php $head_table = $obj_con->showcatname($cat);}?>
                       
                    </ol>
                </div>
            </div>

            <div class="row" style="min-height:500px;">
                <div class="col-lg-12">
                    <div class="text-right">
                      <p><a href="cp-content-cat-add-edit.php<?=$para?>" title="Add category here" class="btn btn-xs btn-success"><span>Add category</span></a></p>
                    </div>
                    <?php
                      $sqlC =  $obj_con->showcat($cat);
                      $count_rows = $sqlC->num_rows;
                      // print_r($sqlC->fetch_assoc());
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                           <thead>
                              <tr>
                                <th></th>
                                <th>Category name</th>
                                <th width="150">Sort</th>
                                <th width="150">&nbsp;</th>
                                <?php if($_GET['cat']!=''){ ?>
                                  <th width="150">&nbsp;</th>
                                <?php  } ?>
                                <th width="150">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php

                                if($count_rows>0){
                                  $i=1;
                                  while($FC=$sqlC->fetch_assoc()){
                                    $sql_result_child = $obj_db->select("content_cat","parent = '$FC[id]'  and del=0");
                                    $num_child = $sql_result_child->num_rows;
                                    $sql_result_content = $obj_db->select("content","cat = '$FC[id]' and del=0");
                                    $num_content = $sql_result_content->num_rows;

                                    if (empty($_GET['cat'])) { ?>
                                      <?php if (in_array('cat_'.$FC['id'], $pages_checked)) { ?>
                                        <tr>
                                          <td><?php echo $i++;?></td>
                                          <td>
                                          <a href="cp-content-cat-add-edit.php<?=$para?>&eid=<?=$FC['id']?>">
                                            <?=$FC['lang_name']?>
                                          </a>
                                          <?php if($FC['picture_thumb']){?>
                                          <img src="../upload/content/<?=$FC['picture_thumb']?>" width="60" style="float:right"/>
                                          <?php }?>
                                          <?php if($FC['hide']==1){?><span class="text-warning text-right">HIDE</span><?php }?>
                                          </td>
                                          <td>
                                            <form name="frm<?=$FC['id']?>" method="post" action="<?=$para?>&act=seq&fid=<?=$FC['id']?>">
                                                  <input type="text" name="seq" size="5" value="<?=$FC['seq']?>" style="text-align:center;" onblur="frm<?=$FC['id']?>.submit();" />
                                            </form>
                                          </td>
                                          <td><a href="cp-content-cat.php?cat=<?=$FC['id']?>"  title="Show sub-category of this one">Sub-category (<?=$num_child?>)</span></a></td>
                                          <?php if($_GET['cat']!=''){ ?>
                                          <td>
                                            <a href="cp-content.php?cat=<?=$FC['id']?>" title="Show content in this category">list-content (<?=$num_content?>)</span></a>
                                          </td>
                                          <?php } ?>
                                          <td>
                                              <a href="cp-content-cat-add-edit.php<?=$para?>&eid=<?=$FC['id']?>" class="btn btn-xs btn-info">Edit</a>
                                              <? if($FC['hide']==1){?>
                                              <a href="<?=$para?>&act=show&fid=<?=$FC['id']?>" class="btn btn-xs btn-warning">Show</a>
                                              <? }else{ ?>
                                              <a href="<?=$para?>&act=hide&fid=<?=$FC['id']?>" class="btn btn-xs btn-success">Hide</a>
                                              <? }?>
                                              <a href="<?=$para?>&act=del&fid=<?=$FC['id']?>" class="btn btn-xs btn-danger btn-del">Delete</a>
                                          </td>
                                        </tr>
                                      <?php } ?>
                                    <?php } else { ?>
                                      <tr>
                                        <td><?php echo $i++;?></td>
                                        <td>
                                        <a href="cp-content-cat-add-edit.php<?=$para?>&eid=<?=$FC['id']?>">
                                          <?=$FC['lang_name']?>
                                        </a>
                                        <?php if($FC['picture_thumb']){?>
                                        <img src="../upload/content/<?=$FC['picture_thumb']?>" width="60" style="float:right"/>
                                        <?php }?>
                                        <?php if($FC['hide']==1){?><span class="text-warning text-right">HIDE</span><?php }?>
                                        </td>
                                        <td>
                                          <form name="frm<?=$FC['id']?>" method="post" action="<?=$para?>&act=seq&fid=<?=$FC['id']?>">
                                                <input type="text" name="seq" size="5" value="<?=$FC['seq']?>" style="text-align:center;" onblur="frm<?=$FC['id']?>.submit();" />
                                          </form>
                                        </td>
                                        <td><a href="cp-content-cat.php?cat=<?=$FC['id']?>"  title="Show sub-category of this one">Sub-category (<?=$num_child?>)</span></a></td>
                                        <td>
                                          <a href="cp-content.php?cat=<?=$FC['id']?>" title="Show content in this category">list-content (<?=$num_content?>)</span></a>
                                        </td>
                                        <td>
                                            <a href="cp-content-cat-add-edit.php<?=$para?>&eid=<?=$FC['id']?>" class="btn btn-xs btn-info">Edit</a>
                                            <? if($FC['hide']==1){?>
                                            <a href="<?=$para?>&act=show&fid=<?=$FC['id']?>" class="btn btn-xs btn-warning">Show</a>
                                            <? }else{ ?>
                                            <a href="<?=$para?>&act=hide&fid=<?=$FC['id']?>" class="btn btn-xs btn-success">Hide</a>
                                            <? }?>
                                            <a href="<?=$para?>&act=del&fid=<?=$FC['id']?>" class="btn btn-xs btn-danger btn-del">Delete</a>
                                        </td>
                                      </tr>
                                    <?php } ?>


                                  <?php } ?>


                                <?php } else{ ?>
                                  <tr>
                                    <td colspan="100">No result</td>
                                  </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                      <div class="text-right"><a href="cp-content-cat-add-edit.php<?=$para?>" title="Add category here" class="btn btn-xs btn-success"><span>Add category</span></a></div>
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
    $('.btn-del').click(function(e){
      if(confirm('Do you want to delete')==true){
        window.location = $(this).attr('href');
      }else{
        e.preventDefault();
      }
    });
});
</script>
