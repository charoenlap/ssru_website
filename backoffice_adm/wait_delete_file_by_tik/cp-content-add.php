<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');
	
if($_SERVER['REQUEST_METHOD']=="POST"){
  $path = "../upload/content/"; 
	$input = $_POST;
  $input["del"] = '0';
  $input["hide"]='0';
	$input['time'] = $ntime;
	if($_FILES["picture1"]["size"]>0){

		$obj_pic->add_pic($_FILES["picture1"],$path,$setting['image_prefix']."_",$thumb=true);
		$input['picture1']= $obj_pic->picture; 
		if($obj_pic->picture_thumb!=""){$input['picture_thumb']=$obj_pic->picture_thumb;}
	}

	if($_FILES["picture2"]["size"]>0){	
	
		$obj_pic->add_pic($_FILES["picture2"],$path,"file_",$thumb=false);
		$input['picture2']= $obj_pic->picture;
	}
	$result_content = $obj_db->select("content","cat=$input[cat]","max(seq)+1 as maxz");
	$F1 = $result_content->fetch_assoc();
	if(is_null($F1['maxz'])){$F1['maxz'] = 1;}
	$input['seq'] = $F1['maxz'];
  // $input['optional'] = serialize($input['optional']);
	unset($input['name'],$input['detail'],$input['detail_2']);
	if($obj_db->insert("content",$input)){
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
              'detail_2'      => $_POST['detail_2'][$id_language],
              'type'          => '1',
          );
          $obj_db->insert("language_detail",$input_language);
      }
      header("Location: cp-content.php?message=1&cat=$cat");
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
                        <? if(empty($cat)){
                        $head_table = "Main Categories";
                        ?>
                         <li class="current"><a href="#">Content Category</a></li>
                         <? }else{?>
                         <li>
                              <a href="cp-content-cat.php?cat=<?=$_GET["cat"]?>">Content Category</a>
                         </li>
                         
                         <?php /* $obj_con->find_parent($cat)?>
                         <li><a href="cp-content-cat.php?cat=<?=$_GET["cat"]?>"><?=$obj_con->showcatnameBC($cat)?></a></li>
                          <?php */?>
                         <? $head_table = $obj_con->showcatname($cat);}?>
                         <li><a href="#">Add Content</a></li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form id="validate" class="form-horizontal" method="post" action="?eid=<?=$eid?>" enctype="multipart/form-data">
                        <div class="text-right"><input type="submit" value="submit" class="btn btn-success"></div>
                        <?php require_once('cp-content-form.php');?>
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
<?php /*?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<title>CP - <?=$setting[title]?></title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<? require_once 'include/inc.script.php';?>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script>
	$(function(){
		$(".main_var").click(function(){
			idz = $(this).attr("vid");
			$(".variation_set#"+idz+" .sub_var").each(function(){
				$(this).css('display','none');
			});
		});
	});
</script>
</head>

<body>

<!-- Left side content -->
<? require_once 'include/inc.left.php';?>


<!-- Right side -->
<div id="rightSide">

    <!-- Top fixed navigation -->
    
    
    
    <? require_once 'include/inc.top.php';?>
    
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Products Category</h5>
                <span>Add your Content here .. :)</span>
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
				<? if(empty($cat)){
					$head_table = "Main Categories";
					?>
                 <li><a href="#">Content Category</a></li>
                 <? }else{?>
                 <li>
                      <a href="cp-content-cat.php">Content Category</a>
                 </li>
                 
                 <? $obj_con->find_parent($cat)?>
                 
                 <li><a href="cp-content.php?cat=<?=$cat?>"><?=$obj_con->showcatname($cat)?></a></li>
                 <? $head_table = $obj_con->showcatname($cat);}?>
                  <li  class="current"><a href="#">Add Content</a></li>
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
                        <label>Content title:<span class="req">*</span></label>
                        <div class="formRight"><input type="text" class="validate[required]" name="name" id="cat_name"/></div><div class="clear"></div>
                    </div>
                    
					
                    

                    
                    <div class="formRow">
                        <label>Intro:</label>
                        <div class="formRight">
                        	<textarea rows="3" cols="" name="intro" class="autoGrow lim" id="intro"></textarea>
                        </div><div class="clear"></div>
                    </div>
                    
                    <div class="formRow">
                        <label>Details:</label>
                        <div class="formRight"><textarea  class="ckeditor" name="detail" rows="" cols=""></textarea></div><div class="clear"></div>
                    </div>
                </div>
                
                
                <div id="tab2" class="tab_content">
                	<div class="formRow">
                        <label>Content title EN:<span class="req">*</span></label>
                        <div class="formRight"><input type="text"  class="ckeditor" name="name_en" id="cat_name"/></div><div class="clear"></div>
                    </div>
                    
					
                    

                    
                    <div class="formRow">
                        <label>Intro EN:</label>
                        <div class="formRight">
                        	<textarea rows="3" cols="" name="intro_en" class="autoGrow lim" id="intro"></textarea>
                        </div><div class="clear"></div>
                    </div>
                    
                    <div class="formRow">
                        <label>Details EN:</label>
                        <div class="formRight"><textarea class="editor" name="detail_en" rows="" cols=""></textarea></div><div class="clear"></div>
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
                    
                    <div class="formRow">
                        <label>Cover image 2:</label>
                        <div class="formRight">
                        	<input type="file" id="file" name="picture2" />
                        </div><div class="clear"></div>
                    </div>
                    
                    
           		    <div class="formRow">
                        <label for="tags">Tags:</label>
                        <div class="formRight"><input type="text" id="tags" name="tags" class="tags" value="" /></div>
                        <div class="clear"></div>
                    </div>
                    
                    
                    
				<a href="" title="" onclick="$('#validate').submit();return false;"class="button greenB" style="margin: 5px;"><span>ADD</span></a>
       		 </div>
             </fieldset>
             <input type="hidden" name="cat" value="<?=$cat?>" />
             </form>


		
        <div class="clear"></div>






    
    </div>
    
    <!-- Footer line -->
    <? require_once 'include/inc.footer.php';?>

</div>

<div class="clear"></div>

</body>
</html>
<?php */?>