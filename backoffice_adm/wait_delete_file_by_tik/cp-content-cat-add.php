<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
  $input = $_POST;
  $input["del"] = '0';
  $input["hide"]='0';
  $input['time'] = $ntime;
  
  if($_FILES["picture1"]["size"]>0){
    $path = "../upload/content/"; 
    $obj_pic->add_pic($_FILES["picture1"],$path,$setting['image_prefix']."_",$thumb=true);
    $input['picture1']= $obj_pic->picture; 
    if($obj_pic->picture_thumb!=""){$input['picture_thumb']=$obj_pic->picture_thumb;}
  }
  if($parent!=""){$cat="&cat=$parent";}

  unset($input['name'],$input['detail'],$input['detail_2'],$input['detail_3']);
  if($obj_db->insert("content_cat",$input)){ 
        $last_insert_id  = $obj_db->getLastId();
        $sql_language = $obj_con->getLanguage();
        $count_rows = $sql_language->num_rows;
        if($count_rows>0){
            while($FC=$sql_language->fetch_assoc()){
                $id_language='';
                if(!empty($FC['id'])) {
                    $id_language = $FC['id'];
                }
                $id_language=$FC['id'];
                $input_language = array(
                    'language_id'   => $FC['id'],
                    'ref_id'        => $last_insert_id,
                    'name'          => $_POST['name'][$id_language],
                    'detail'        => $_POST['detail'][$id_language],
                    'detail_2'        => $_POST['detail_2'][$id_language],
                    'detail_3'        => $_POST['detail_3'][$id_language],
                    'type'          => '0'
                );
                $obj_db->insert("language_detail",$input_language); 
            }
            header("Location: cp-content-cat.php?message=1$cat");
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
                        Content
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                              <a href="main_cp.php">Dashboard</a>
                         </li>
                        <? if(empty($cat)){?>
                         <li class="active"><a href="#">Content Category</a></li>
                         <? }else{?>
                         <li>
                              <a href="cp-content-cat.php">Content Category</a>
                         </li>
                         
                         <li><a href="cp-content-cat.php?cat=<?=$cat?>"><?=$obj_con->showcatnameBC($cat)?></a></li>
                         <? }?>
                         <li class="active"><a href="#">Add category</a></li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form id="validate" class="form-horizontal" method="post" action="?eid=<?=$eid?>" enctype="multipart/form-data">
                        <div class="text-right"><input type="submit" value="submit" class="btn btn-success"></div>
                        <?php require_once('cp-content-cat-form.php');?>
                        <div class="text-right"><input type="submit" value="submit" class="btn btn-success"></div>
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
</script>

<?/*?>

<!-- Right side -->
<div id="rightSide">

    <!-- Top fixed navigation -->
    
    
    
    <? require_once 'include/inc.top.php';?>
    
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Products Category</h5>
                <span>Add your product here .. :)</span>
            </div>
             <? require_once 'include/inc.mid_nav.php';?>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <!-- Page statistics and control buttons area -->
     <? require_once 'include/inc.top_control.php';?>
    
    <div class="line"></div>
    
    <!-- Main content wrapper -->
    <div class="wrapper">
    
     <!-- Breadcrumbs -->
<div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                 <li>
                      <a href="main_cp.php">Dashboard</a>
                 </li>
        <? if(empty($cat)){?>
                 <li class="current"><a href="#">Content Category</a></li>
                 <? }else{?>
                 <li>
                      <a href="cp-content-cat.php">Content Category</a>
                 </li>
                 
                 <li><a href="cp-content-cat.php?cat=<?=$cat?>"><?=$obj_pro->showcatname($cat)?></a></li>
                 <? }?>
                 <li class="current"><a href="#">Add category</a></li>
            </ul>
            <div class="clear"></div>    
        </div>


      <form id="validate" class="form" method="post" action=""  enctype="multipart/form-data">
            <fieldset>

      <div class="widget">
                   <div class="title"><img src="images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Input text fields</h6></div>
                   
                   
                   <ul class="tabs">
                <li><a href="#tab1">ไทย</a></li>
                <li><a href="#tab2">EN</a></li>
            </ul>
            
            <div class="tab_container">
                <div id="tab1" class="tab_content">
                
                  <div class="formRow">
                        <label>Category title:<span class="req">*</span></label>
                        <div class="formRight"><input type="text" class="validate[required]" name="name" id="name"/></div><div class="clear"></div>
                    </div>
                    
                    <div class="formRow">
                        <label>Category Details:</label>
                        <div class="formRight"><textarea  class="ckeditor" name="detail" rows="" cols=""></textarea></div><div class="clear"></div>
                    </div>
                    
                </div>
                <div id="tab2" class="tab_content">
                  <div class="formRow">
                        <label>Category title EN:<span class="req">*</span></label>
                        <div class="formRight"><input type="text" class="" name="name_en" id="name_en"/></div><div class="clear"></div>
                    </div>
                    
                    <div class="formRow">
                        <label>Category Details EN:</label>
                        <div class="formRight" style="height:200px;"><textarea class="ckeditor" name="detail_en" rows="" cols=""></textarea></div><div class="clear"></div>
                    </div>
                
                </div>
            </div>  
            <div class="clear"></div>
                    </div>
                    
                    
                    
                    <div class="widget">
                    
                    <div class="formRow">
                        <label>Cover image:</label>
                        <div class="formRight">
                          <input type="file" id="file" name="picture1" />
                        </div><div class="clear"></div>
                    </div>
        <a href="#" title="" onclick="$('#validate').submit();"class="button greenB" style="margin: 5px;"><span>ADD</span></a>
           </div>
             </fieldset>
             <? if(!empty($cat)){?><input type="hidden" name="parent" value="<?=$cat?>" /> <? }?>
             </form>
    

    
        <div class="clear"></div>






    
    </div>
    
    <!-- Footer line -->
    

</div>

<div class="clear"></div>
<?*/?>
