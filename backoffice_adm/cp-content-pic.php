<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');

$para = getpara('message,act,fid');

$result_content = $obj_db->select("content","id=$pid");

// $FP=$result_content->rows;
if ($_SERVER['REQUEST_METHOD']=="POST"&&$act=="add"&&$_FILES['filesToUpload']['name'][0]!=''){

	$count_file =  count($_FILES['filesToUpload']['name']);	

	for($i=0;$i<=$count_file-1;$i++){
		$type = strrchr($_FILES['filesToUpload']['name'][$i],".");
		$type = strtolower($type);
		$pic_name = "pic_".time()."_".$i.$type;
		if(move_uploaded_file($_FILES['filesToUpload']['tmp_name'][$i] ,"../upload/gallery/".$pic_name)){ 
            $result_content_pic = $obj_db->select("content_pic","pid=$pid","max(seq)+1 as maxz");
			$F1 = $result_content_pic->rows;
			if(is_null($F1['maxz'])){$F1['maxz'] = 1;}
			$this_seq = $F1['maxz'];
			$obj_db->query("insert into ".PREFIX."content_pic set pid=$pid,picture1='$pic_name',seq=$this_seq");
		}
	}
	header("Location: cp-content-pic.php?pid=$pid&cat=$cat");
}

if($act=="del"){
	@unlink("../upload/gallery/$pic");
	$obj_db->query("delete from ".PREFIX."content_pic where id = $did");
	header("Location: cp-content-pic.php?cat=$cat&pid=$pid");
}

if($act=="seq"){
  // echo $fid;
  // exit();
  $title = str_replace("'", "\'", $title);
  $textPic = str_replace("'", "\'", $textPic);
	$obj_db->query("update ".PREFIX."content_pic set link = '$link',title = '$title', textPic='$textPic', seq = '$seq' where id = $fid");
	$sql = $obj_db->query("select id,seq from ".PREFIX."content_pic where pid='$pid' order by seq asc");
	$all_p =  $sql->num_rows;
	$i=1;

	header("Location: cp-content-pic.php?cat=$cat&pid=$pid");
	
}
?>
<div id="wrapper">
<?php require_once('include/inc.header.php');?>
<script>
// function makeFileList() {
//             var input = document.getElementById("filesToUpload");
//             var ul = document.getElementById("fileList");
//             while (ul.hasChildNodes()) {
//                 ul.removeChild(ul.firstChild);
//             }
//             for (var i = 0; i < input.files.length; i++) {
//                 var li = document.createElement("li");
//                 li.innerHTML = input.files[i].name;
//                 ul.appendChild(li);
//             }
//             if(!ul.hasChildNodes()) {
//                 var li = document.createElement("li");
//                 li.innerHTML = 'No Files Selected';
//                 ul.appendChild(li);
//             }
//         }
</script>
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
                              <a href="cp-content-cat.php">Content</a>
                         </li>
                        <? if(empty($cat)){
                            $head_table = "Main Categories";
                            ?>
                         <li class="current"><a href="#">content Category</a></li>
                         <? }else{?>
                         <li>
                         	<?php $result_cat = $obj_db->cat('ref_id = '.get('cat').' and hide = 0 and del = 0 and language_id = '.$lang_no.' ORDER BY seq ASC')->row; ?>
                              <a href="cp-content.php?cat=<?php echo $result_cat['id']; ?>"><?php echo $result_cat['lang_name']; ?></a>
                         </li>
                         <?php } ?>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="validate" class="form" method="post"  action="?act=add&pid=<?=$pid?>&cat=<?=$cat?>" enctype="multipart/form-data">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Image</h3>
                            </div>
                            <div class="panel-body">
                                <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="" onChange="makeFileList();" />
                                <span> <?php echo $size; ?></span>
                                <ul id="fileList"><li>No Files Selected</li></ul><br />
                                <input type="submit" class="btn btn-primary" value="Add" onclick="javascript:form1.submit();" />
                            </div>
                        </div>

                        <input type="hidden" name="ownerid" value="<?=$pid?>" />
                    </form>
                </div>
            </div>
            <!-- /.row -->
            <div class="row" style="min-height:500px;">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                           <thead>
                              <tr>
                                <th style="width:40%;">Gallery</th>
                                <th></th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php  $sqlT = $obj_db->getdata("content_pic","pid=$pid",NULL,"seq asc");
                                $count_rows = $sqlT->num_rows;
                                if($count_rows>0){
                                    foreach ($sqlT->rows as $key => $FT) { ?>
                                    <tr>
                                        <td>
                                            <img src="<?=$mdir?>/upload/gallery/<?=$FT['picture1']?>" class="img-responsive" />
                                        </td>
                                        <td>
                                           <form class="form" name="frm<?=$FT['id']?>" method="post" action="<?=$para?>&act=seq&fid=<?=$FT['id']?>">
                                                <!-- <div class="form-group">
                                                    <label>Type image : <?php echo $FT['type'];?></label>
                                                    <select name="type" class="form-control" onblur="frm<?=$FT['id']?>.submit();">
                                                      <option value="0" <?php echo ($FT['type']=="0"?'selected':'')?>>OVERVIEW</option>
                                                      <option value="1" <?php echo ($FT['type']=="1"?'selected':'')?>>LIVING ROOM</option>
                                                      <option value="2" <?php echo ($FT['type']=="2"?'selected':'')?>>I BEDROOM</option>
                                                      <option value="3" <?php echo ($FT['type']=="3"?'selected':'')?>>II BEDROOM</option>
                                                      <option value="4" <?php echo ($FT['type']=="4"?'selected':'')?>>BATHROOM</option>
                                                      <option value="5" <?php echo ($FT['type']=="5"?'selected':'')?>>KITCHEN</option>
                                                    </select>
                                                </div>  --> 
                                                <div class="form-group">
                                                  <label for="sort<?=$FT['id']?>">Sort : </label>
                                                  <input type="text" id="sort<?=$FT['id']?>" class="form-control" onblur="frm<?=$FT['id']?>.submit();"  name="seq" value="<?=$FT['seq']?>" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="link<?=$FT['id']?>">Title : </label>
                                                  <textarea id="title<?=$FT['id']?>" class="form-control" onblur="frm<?=$FT['id']?>.submit();"  placeholder="title" name="title"><?=$FT['title']?></textarea>
                                                </div>
                                                <div class="form-group">
                                                  <label for="link<?=$FT['id']?>">Text : </label>
                                                  <textarea id="textPic<?=$FT['id']?>" class="form-control" onblur="frm<?=$FT['id']?>.submit();"  placeholder="text" name="textPic"><?=$FT['textPic']?></textarea>
                                                  <!-- <textarea  class="ckeditor form-control" name="detail_2[<?php echo $FC['id'];?>]" rows="" cols=""/><?php echo (isset($input_language[$FC['id']]['detail_2'])?$input_language[$FC['id']]['detail_2']:'');?></textarea> -->
                                                </div>
                                                <div class="form-group">
                                                  <label for="link<?=$FT['id']?>">Link : </label>
                                                  <input type="text" id="link<?=$FT['id']?>" class="form-control" onblur="frm<?=$FT['id']?>.submit();"  placeholder="Link" name="link" value="<?=$FT['link']?>" />
                                                </div>
                                            </form>
                                        </td>  
                                        <td>
                                            <a href="?act=del&did=<?=$FT['id']?>&pid=<?=$pid?>&cat=<?=$cat?>&pic=<?=$FT['picture1']?>" class="btn btn-danger">DEL</a>
                                        </td>   
                                    </tr>
                                  <? }
                                }else{ ?>
                                  <tr>
                                    <td colspan="100">No result</td>
                                  </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
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
<script>
function makeFileList() {
			var input = document.getElementById("filesToUpload");
			var ul = document.getElementById("fileList");
			while (ul.hasChildNodes()) {
				ul.removeChild(ul.firstChild);
			}
			for (var i = 0; i < input.files.length; i++) {
				var li = document.createElement("li");
				li.innerHTML = input.files[i].name;
				ul.appendChild(li);
			}
			if(!ul.hasChildNodes()) {
				var li = document.createElement("li");
				li.innerHTML = 'No Files Selected';
				ul.appendChild(li);
			}
		}
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
                <h5>contents Category</h5>
                <span>Add your content here .. :)</span>
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
    	<? if($message==1){?>
<div class="nNote nSuccess hideit">
            <p><strong>SUCCESS: </strong>Category has been added!!!!</p>
 </div>
 <? }?>
     <!-- Breadcrumbs -->
<div class="bc">

            <ul id="breadcrumbs" class="breadcrumbs">
                 <li>
                      <a href="main_cp.php">Dashboard</a>
                 </li>
				<? if(empty($cat)){
					$head_table = "Main Categories";
					?>
                 <li class="current"><a href="#">content Category</a></li>
                 <? }else{?>
                 <li>
                      <a href="cp-content-cat.php">content Category</a>
                 </li>
                 
                 <? $obj_con->find_parent($cat)?>
                 
                 <li><a href="cp-content.php?cat=<?=$cat?>"><?=$obj_con->showcatname($cat)?></a></li>
                 
                 <li class="current"><a href="#"><?=$FP[name]?> images</a></li>
                 <? $head_table = $obj_pro->showcatname($cat);}?>
            </ul>
            <div class="clear"></div>    
        </div>

<?	$sqlC =  $obj_con->showchild($cat);
	
?>
			<div class="widget">
            <div class="title"><img src="images/icons/dark/images2.png" alt="" class="titleIcon" /><h6>Images gallery</h6></div>
			<div style="padding:10px;font-size:22px;">
				<?php if($_GET["cat"]==10 and $_GET["pid"]==13){
					echo "Example : http://www.google.com";
				}?>
			</div>
            <div class="">
               <ul>
               
               	<?	$sqlT = $obj_db->select("s_content_pic","pid=$pid",NULL,"seq asc");
					while($FT = mysql_fetch_assoc($sqlT)){?>
                    <li style="width:350px; float:left; margin:15px;">
                       <form name="frm<?=$FT[id]?>" method="post" action="<?=$para?>&act=seq&fid=<?=$FT[id]?>">
                       <div style="width:103px; float:left;">
                    <a href="<?=$mdir?>/upload/gallery/<?=$FT[picture1]?>" title="" rel="lightbox"><img src="<?=$mdir?>/upload/gallery/<?=$FT[picture1]?>" width="101" height="101" alt="" /></a>
             	</div>
                 
                           
              <div style="float:right; width:240px;">
                     
                        <input type="text" style="width:30px;bottom:0; border:1px solid #900; text-align:center;" 
                        onblur="frm<?=$FT[id]?>.submit();"  name="seq" value="<?=$FT[seq]?>" /><br />

                        
                        <input type="text" style="width:200px;bottom:0; border:1px solid #39F; margin:10px 0; text-align:center;" 
                        onblur="frm<?=$FT[id]?>.submit();"  placeholder="LINK" name="link" value="<?=$FT[link]?>" /><br />

                 
  <a href="?act=del&did=<?=$FT[id]?>&pid=<?=$pid?>&cat=<?=$cat?>&pic=<?=$FT[picture1]?>" title="" class="button dredB"><span>DEL</span></a>
  </div>
  <div class="clear"></div>
                        </form>
                    </li>
                    <? }?>
		
               </ul> 
               <div class="clear"></div>
               <div class="fix"></div>
           </div>
        </div>

<form id="validate" class="form" method="post"  action="?act=add&pid=<?=$pid?>&cat=<?=$cat?>" enctype="multipart/form-data">
                <div class="widget">     
                     <div class="formRow">
                    	<label>Image:</label>
                         <div class="formRight">
                         <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="" onChange="makeFileList();" /></div>
                         <div class="clear"></div>
                     </div>
                     
                     <div class="formRow">
                         <div class="formRight">
                         <ul id="fileList"><li>No Files Selected</li></ul><br />
<input type="submit" class="greyishB" value="Add" onclick="javascript:form1.submit();" /></div>
                         <div class="clear"></div>
                     </div>

                	
                <input type="hidden" name="ownerid" value="<?=$pid?>" />
                </div>
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