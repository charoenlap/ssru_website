<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');
$act="";
if( isset( $_GET['act'] ) ) {
	$act = $_GET['act'];
}

$pid = '';
if (!empty($_GET['pid'])) {
    $pid = (int)get('pid');
    $FE=$obj_db->query("select * from ".PREFIX."content where id=$pid")->row;
} else {
    $pid = 0;
}

if (!empty($_GET['cat'])) {
    $cat = (int)get('cat');
} else {
    $cat = 0;
}


$path = "../upload/content/";
$input = array();
if($_SERVER['REQUEST_METHOD']=="POST"){
    // var_dump($_FILES);exit();
	if($_FILES["picture1"]["size"]>0){
        @unlink("$path/$FE[picture1]");
        @unlink("$path/$FE[picture_thumb]");
        $obj_pic->add_pic($_FILES["picture1"],$path,$setting['image_prefix']."_con_",$thumb=true);
        
        $input['picture1']= $obj_pic->picture; 
        if($obj_pic->picture_thumb!=""){$input['picture_thumb']=$obj_pic->picture_thumb;}
    }
    if($_FILES["picture1_en"]["size"]>0){
        @unlink("$path/$FE[picture1_en]");
        $obj_pic->add_pic($_FILES["picture1_en"],$path,$setting['image_prefix']."_con_",$thumb=true);
        
        $input['picture1_en']= $obj_pic->picture; 
    }
    if($_FILES["picture2"]["size"]>0){
        @unlink("$path/$FE[picture2]");
        $obj_pic->add_pic($_FILES["picture2"],$path,$setting['image_prefix']."_con_",$thumb=false);
        $input['picture2']= $obj_pic->picture; 
    }
    if($_FILES["picture3"]["size"]>0){
        @unlink("$path/$FE[picture3]");
        $obj_pic->add_pic($_FILES["picture3"],$path,$setting['image_prefix']."_con_",$thumb=false);
        $input['picture3']= $obj_pic->picture; 
    }
    if($_FILES["picture4"]["size"]>0){
        @unlink("$path/$FE[picture4]");
        $obj_pic->add_pic($_FILES["picture4"],$path,$setting['image_prefix']."_con_",$thumb=false);
        $input['picture4']= $obj_pic->picture; 
    }
    if($_FILES["picture5"]["size"]>0){
        @unlink("$path/$FE[picture5]");
        $obj_pic->add_pic($_FILES["picture5"],$path,$setting['image_prefix']."_con_",$thumb=false);
        $input['picture5']= $obj_pic->picture; 
    }

    
    $input['cat'] = get('cat');
    $input['calendar_day'] = $_POST['calendar_day'];
    $input['calendar_day_end'] = $_POST['calendar_day_end'];
    $input['link_url'] = $_POST['link_url'];
    $input['position_img'] = $_POST['position_img'];
    $input['date'] = $_POST['date'];

    // echo "test>";
    // var_dump($input);
    // echo "<test";
    // exit();

    if ($pid) {
        $input['time_update'] = $ntime;
        $obj_db->update("content",$input,"id=".$pid);
        $result_con = $obj_db->getdata('content','id = '.$pid)->row;
        $pid = $result_con['id'];
        $cat = $result_con['parent'];
    } else {
        $input['time'] = $ntime;
        $input['seq'] = $obj_db->getdata('content','cat='.get('cat').' and hide = 0 and del = 0')->num_rows+1;
        
        if ($obj_db->insert("content",$input)) {
            $result_con = $obj_db->getdata('content','id = '.$obj_db->getLastId())->row;
            $pid = $result_con['id'];
        } else {
            $pid = '';
        }
    }
    // if ($_POST['branch_id']) {
        $delete = $obj_db->delete('share_content','content_id = '.$pid);
        foreach ($_POST['branch_id'] as $key => $value) {
            $temp_arr = array(
                'branch_id'     =>  $value,
                'cat_id'     =>  get('cat'),
                'content_id'     =>  $pid,
                'type_name'     =>  $_POST['share_type'],
            );
            $insert = $obj_db->insert('share_content',$temp_arr);
        }
    // }

    if($pid){
        $sql_language = $obj_con->getLanguage();
        if($sql_language->num_rows>0){
            $i = 0;
            while($FC=$sql_language->fetch_assoc()){
                // print_r($FC);
                // echo "string";
                // exit();
                $id_language = $FC['id'];
                $input_language = array(
                    'name'          => $_POST['name'][$id_language],
                    'detail'        => $_POST['detail'][$id_language],
                    'detail_2'      => $_POST['detail_2'][$id_language],
                    'detail_3'      => $_POST['detail_3'][$id_language],
                    'type'          => '1',
                );
                $check_lang = $obj_db->getdata('language_detail','ref_id = '.$pid.' and language_id='.$FC['id'] . ' and type=1')->num_rows;
                if ($check_lang == 0) {
                    $input_language['language_id'] = $FC['id'];
                    $input_language['ref_id'] = $pid;
                    
                    $obj_db->insert("language_detail",$input_language);
                } else {
                // print_r($id_language);
                // echo $id_language;
                // exit();
                    $obj_db->update("language_detail",$input_language,'language_id='.$id_language.' and ref_id='.$pid.' and type=1');
                }
            }
        }
        if(empty($cat)){
            $cat = $_GET["cat"];
        }
        header("Location: cp-content.php?cat=".$cat); 
    }
}

if($act=="delpic1"){

		unlink($path."/".$FE['picture1']);
		unlink($path."/".$FE['picture_thumb']);
		$obj_db->query("update ".PREFIX."content set picture1='' , picture_thumb='' where id = $pid");
		$url = $_SERVER['PHP_SELF']."?message=2&cat=".$_GET['cat']."&pid=".$_GET['pid'];
		header("Location: $url");
}
if($act=="delpic1_en"){

        unlink($path."/".$FE['picture1_en']);
        $obj_db->query("update ".PREFIX."content set picture1_en='' where id = $pid");
        $url = $_SERVER['PHP_SELF']."?message=2&cat=".$_GET['cat']."&pid=".$_GET['pid'];
        header("Location: $url");
}
if($act=="delpic2"){

		unlink("$path/$FE[picture2]");
		$obj_db->query("update ".PREFIX."content set picture2='' where id = $pid");
		$url = $_SERVER['PHP_SELF']."?message=2&cat=".$_GET['cat']."&pid=".$_GET['pid'];
		header("Location: $url");
}
if($act=="delpic3"){

		unlink("$path/$FE[picture3]");
		$obj_db->query("update ".PREFIX."content set picture3='' where id = $pid");
		$url = $_SERVER['PHP_SELF']."?message=2&cat=".$_GET['cat']."&pid=".$_GET['pid'];
		header("Location: $url");
}
if($act=="delpic4"){

		unlink("$path/$FE[picture4]");
		$obj_db->query("update ".PREFIX."content set picture4='' where id = $pid");
		$url = $_SERVER['PHP_SELF']."?message=2&cat=".$_GET['cat']."&pid=".$_GET['pid'];
		header("Location: $url");
}
if($act=="delpic5"){

		unlink("$path/$FE[picture5]");
		$obj_db->query("update ".PREFIX."content set picture5='' where id = $pid");
		$url = $_SERVER['PHP_SELF']."?message=2&cat=".$_GET['cat']."&pid=".$_GET['pid'];
		header("Location: $url");
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
                         <li class="current"><i class="fa fa-dashboard"></i><a href="#">Content List</a></li>
                         <? }else{?>
                         <li><i class="fa fa-dashboard"></i>
                              <a href="cp-content-cat.php?cat=<?=$_GET["cat"]?>">Content List</a>
                         </li>

                        <? $obj_con->find_parent($cat)?>
                        <li><a href="cp-content.php?cat=<?=$_GET["cat"]?>"><?=$obj_con->showcatnameBC($cat)?></a></li>
                        <? $head_table = $obj_con->showcatname($cat);}?>
                        <?php if ($pid) {
                            $type = "Edit content";
                            } else {
                                $type = "Add content";
                            } ?>
                        <li class="active"><a href="#"><?php echo $type; ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form id="validate" class="form-horizontal" method="post" action="?pid=<?=$pid?>&cat=<?php echo get('cat'); ?>" enctype="multipart/form-data">
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
$('.datepicker').datepicker({
    autoclose: true,
    format: "yyyy-mm-dd",
    todayHighlight: true,
});

	var filterStart = new Pikaday({
        field: $('#date_filterStart')[0],
        onSelect: function(date) {
         var formattedDate = this.getMoment().format('YYYY-MM-DD');
        }
    });
    var filterEnd = new Pikaday({
        field: $('#date_filterEnd')[0],
        onSelect: function(date) {
        var formattedDate = this.getMoment().format('YYYY-MM-DD');
        table.draw();
        }
    });
</script>
<?php /* ob_start();session_start();
include dirname(__FILE__).DIRECTORY_SEPARATOR.'../connect.php';
include dirname(__FILE__).DIRECTORY_SEPARATOR.'../function.php';
//echo dirname(__FILE__).DIRECTORY_SEPARATOR;
$para = getpara("act");
if($_SESSION['AU'][level]!="admin"){header("Location: login.php?prev=cp-content-cat.php");}
$FE=mysql_fetch_assoc($obj_db->select("s_content_cat","id=$eid"));
$arr_var = explode(",",$FE[variations]);

$sql_v = $obj_db->select("s_variation_select_content","c_id=$eid");
$arr_var = array();
if(mysql_num_rows($sql_v)>0){
	while($FV = mysql_fetch_assoc($sql_v)){
		$arr_var[] =$FV[v_id];
	}
}

$path = "../upload/content/";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$input = $_POST;
	$input['time_update'] = $ntime;

	$a_variation = $input['variations'];
	unset($input['variations']);

	if($_FILES["picture1"]["size"]>0){
		@unlink("$path/$FE[picture1]");
		@unlink("$path/$FE[picture_thumb]");
		$obj_pic->add_pic($_FILES["picture1"],$path,$setting['image_prefix']."_",$thumb=true);
		$input[picture1]= $obj_pic->picture;
		if($obj_pic->picture_thumb!=""){$input[picture_thumb]=$obj_pic->picture_thumb;}
	}
	if($_FILES["picture2"]["size"]>0){
		@unlink("$path/$FE[picture2]");
		$obj_pic->add_pic($_FILES["picture2"],$path,$setting['image_prefix']."_",$thumb=false);
		$input[picture2]= $obj_pic->picture;
	}
	if($_FILES["picture3"]["size"]>0){
		@unlink("$path/$FE[picture3]");
		$obj_pic->add_pic($_FILES["picture3"],$path,$setting['image_prefix']."_",$thumb=false);
		$input[picture3]= $obj_pic->picture;
	}
	if($_FILES["picture4"]["size"]>0){
		@unlink("$path/$FE[picture4]");
		$obj_pic->add_pic($_FILES["picture4"],$path,$setting['image_prefix']."_",$thumb=false);
		$input[picture4]= $obj_pic->picture;
	}
	if($_FILES["picture5"]["size"]>0){
		@unlink("$path/$FE[picture5]");
		$obj_pic->add_pic($_FILES["picture5"],$path,$setting['image_prefix']."_",$thumb=false);
		$input[picture5]= $obj_pic->picture;
	}

	unset($input['old_pic'],$input['old_pic2'],$input['old_pic_t']);
	if($parent!=""){$cat="&cat=$parent";}
	if($obj_db->update("s_content_cat",$input,"id=$eid")){
	mysql_query("delete from s_variation_select_content where c_id = $eid");
	if($a_variation){
	foreach($a_variation as $val){
		mysql_query("insert into s_variation_select_content set c_id = $eid , v_id = $val");
	}
	}
	if(empty($cat)){
        $cat = $_GET["cat"];
    }
    header("Location: cp-content-cat-edit.php?cat=".$cat."&eid=".$_GET["eid"]);
	}

}
if($act=="delpic1"){

		@unlink($path/$FE["picture1"]);
		@unlink($path/$FE["picture_thumb"]);
		mysql_query("update s_content_cat set picture1='' , picture_thumb='' where id = $eid");
		$url = $_SERVER['PHP_SELF'].$para;
		header("Location: $url");
}
if($act=="delpic2"){

		@unlink($path/$FE["picture2"]);
		mysql_query("update s_content_cat set picture2='' where id = $eid");
		$url = $_SERVER['PHP_SELF'].$para;
		header("Location: $url");
}
if($act=="delpic3"){

		@unlink($path/$FE["picture3"]);
		mysql_query("update s_content_cat set picture3='' where id = $eid");
		$url = $_SERVER['PHP_SELF'].$para;
		header("Location: $url");
}
if($act=="delpic4"){

		@unlink($path/$FE["picture4"]);
		mysql_query("update s_content_cat set picture4='' where id = $eid");
		$url = $_SERVER['PHP_SELF'].$para;
		header("Location: $url");
}
if($act=="delpic5"){

		@unlink($path/$FE["picture5"]);
		mysql_query("update s_content_cat set picture5='' where id = $eid");
		$url = $_SERVER['PHP_SELF'].$para;
		header("Location: $url");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<title>CP - <?=$setting[title]?></title>
<link href="css/main.css" rel="stylesheet" type="text/css" />

<? require_once 'include/inc.script.php';?>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

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
                <h5>Contents Category</h5>
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
                 <? if(empty($cat)){
					$head_table = "Main Categories";
					?>
                 <li class="current"><a href="#">Content Category</a></li>
                 <? }else{?>
                 <li>
                      <a href="cp-content-cat.php?cat=<?=$_GET["cat"]?>">Content Category</a>
                 </li>

                 <? $obj_con->find_parent($cat)?>

                 <li><a href="cp-content-cat.php?cat=<?=$_GET["cat"]?>"><?=$obj_con->showcatname($cat)?></a></li>
                 <? $head_table = $obj_con->showcatname($cat);}?>
                 <li class="current"><a href="#">Add category</a></li>
            </ul>
            <div class="clear"></div>
        </div>



			<form id="validate" class="form" method="post" action="?eid=<?=$eid?>" enctype="multipart/form-data">
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
                        <div class="formRight"><input type="text" class="validate[required]" value="<?=$FE[name]?>" name="name" id="name"/></div><div class="clear"></div>
                    </div>

                    <div class="formRow">
                        <label>Category Details:</label>
                        <div class="formRight"><textarea  class="ckeditor"name="detail" rows="" cols=""><?=$FE[detail]?></textarea></div><div class="clear"></div>
                    </div>


                </div>
                <div id="tab2" class="tab_content">
                	<div class="formRow">
                        <label>Category title EN:</label>
                        <div class="formRight"><input type="text" class="validate[required]" value="<?=$FE[name_en]?>" name="name_en" id="name_en"/></div><div class="clear"></div>
                    </div>

                    <div class="formRow">
                        <label>Category Details EN:</label>
                        <div class="formRight"><textarea  class="ckeditor"name="detail_en" rows="" cols=""><?=$FE[detail_en]?></textarea></div><div class="clear"></div>
                    </div>


                </div>
            </div>
            <div class="clear"></div>
        </div>


            <div class="widget">
					<div class="formRow">
                        <label>Variation:</label>
                        <div class="formRight">
							<ul class="tabs">
								<? $sql = $obj_db->select("s_variation_content","parent=0");
								$i=0;
								while($F1=mysql_fetch_assoc($sql)){?>
								<li><a href="#variation_tab<?=$i++?>"><?=$F1[name]?></a></li>
								<?php }?>
							</ul>

							<div class="tab_container">
								<? $sql = $obj_db->select("s_variation_content","parent=0");
								$i=0;
								while($F1=mysql_fetch_assoc($sql)){ ?>
								<div id="variation_tab<?=$i++?>" class="tab_content" style="min-height:400px;overflow-y:scroll;">
									<div class="formRow">
										<? $sql2 = $obj_db->select("s_variation_content","parent=$F1[id]");
										while($F2=mysql_fetch_assoc($sql2)){?>
											<div class="variation">
											<input type="checkbox" name="variations[]"<? if(in_array($F2[id],$arr_var)){?> checked="checked"<? }?> class="sub_var" value="<?=$F2[id]?>"/>
											<?=$F2[name]?></div>
										<? }?>
									</div>
								</div>
								<?php } ?>
							</div>


                        </div><div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>File 1:</label>
                        <?	if($FE[picture1]!=""){ ?>
                        <div class="formRight">
                        	<a href="../upload/content/<?=$FE[picture1]?>" target="new">View File</a>
                            <br />
                            <a href="<?=$para?>&act=delpic1" class="redBack">Del</a>
                        </div>
                        <? }?>
                        <div class="formRight">
                        	<div style="height: 35px;">
                            	<input type="text" name="name_download_1" value="<?=$FE[name_download_1]?>" style="width:247px;" placeholder="File name 1">
                            </div>
                        	<div>
                                <input type="file" id="file" name="picture1" />
                            </div>
                            <div>
                                <label for="show_download_chk_1">
                                    <input type="hidden" name="show_download_1" value="0"/>
                                    <input type="checkbox" id="show_download_chk_1" name="show_download_1" <? if($FE["show_download_1"]=="1"){ echo "checked"; }?> value="1" onclick="validate.submit();">
                                    Check for show btn download
                                </label>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
					<div class="clear"></div>
					<div class="formRow">
                        <label>File 2:</label>
                        <?	if($FE[picture2]!=""){ ?>
                        <div class="formRight">
                        	<a href="../upload/content/<?=$FE[picture2]?>" target="new">View File</a>
                            <br />
                            <a href="<?=$para?>&act=delpic2" class="redBack">Del</a>
                        </div>
                        <? }?>
                        <div class="formRight">
                        	<div style="height: 35px;">
                            	<input type="text" name="name_download_2" value="<?=$FE[name_download_2]?>" style="width:247px;" placeholder="File name 2">
                            </div>
                        	<div>
                                <input type="file" id="file" name="picture2" />
                            </div>
                            <div>
                                <label for="show_download_chk_2">
                                    <input type="hidden" name="show_download_2" value="0"/>
                                    <input type="checkbox" id="show_download_chk_2" name="show_download_2" <? if($FE["show_download_2"]=="1"){ echo "checked"; }?> value="1" onclick="validate.submit();">
                                    Check for show btn download
                                </label>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
					<div class="clear"></div>
					<div class="formRow">
                        <label>File 3:</label>
                        <?	if($FE[picture3]!=""){ ?>
                        <div class="formRight">
                        	<a href="../upload/content/<?=$FE[picture3]?>" target="new">View File</a>
                            <br />
                            <a href="<?=$para?>&act=delpic3" class="redBack">Del</a>
                        </div>
                        <? }?>
                        <div class="formRight">
                        	<div style="height: 35px;">
                            	<input type="text" name="name_download_3" value="<?=$FE[name_download_3]?>" style="width:247px;" placeholder="File name 3">
                            </div>
                        	<div>
                                <input type="file" id="file" name="picture3" />
                            </div>
                            <div>
                                <label for="show_download_chk_3">
                                    <input type="hidden" name="show_download_3" value="0"/>
                                    <input type="checkbox" id="show_download_chk_3" name="show_download_3" <? if($FE["show_download_3"]=="1"){ echo "checked"; }?> value="1" onclick="validate.submit();">
                                    Check for show btn download
                                </label>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
					<div class="clear"></div>
					<div class="formRow">
                        <label>File 4:</label>
                        <?	if($FE[picture4]!=""){ ?>
                        <div class="formRight">
                        	<a href="../upload/content/<?=$FE[picture4]?>" target="new">View File</a>
                            <br />
                            <a href="<?=$para?>&act=delpic4" class="redBack">Del</a>
                        </div>
                        <? }?>
                        <div class="formRight">
                        	<div style="height: 35px;">
                            	<input type="text" name="name_download_4" value="<?=$FE[name_download_4]?>" style="width:247px;" placeholder="File name 4">
                            </div>
                        	<div>
                                <input type="file" id="file" name="picture4" />
                            </div>
                            <div>
                                <label for="show_download_chk_4">
                                    <input type="hidden" name="show_download_4" value="0"/>
                                    <input type="checkbox" id="show_download_chk_4" name="show_download_4" <? if($FE["show_download_4"]=="1"){ echo "checked"; }?> value="1" onclick="validate.submit();">
                                    Check for show btn download
                                </label>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
					<div class="clear"></div>
					<div class="formRow">
                        <label>File 5:</label>
                        <?	if($FE[picture5]!=""){ ?>
                        <div class="formRight">
                        	<a href="../upload/content/<?=$FE[picture5]?>" target="new">View File</a>
                            <br />
                            <a href="<?=$para?>&act=delpic5" class="redBack">Del</a>
                        </div>
                        <? }?>
                        <div class="formRight">
                        	<div style="height: 35px;">
                            	<input type="text" name="name_download_5" value="<?=$FE[name_download_5]?>" style="width:247px;" placeholder="File name 5">
                            </div>
                        	<div>
                                <input type="file" id="file" name="picture5" />
                            </div>
                            <div>
                                <label for="show_download_chk_5">
                                    <input type="hidden" name="show_download_5" value="0"/>
                                    <input type="checkbox" id="show_download_chk_5" name="show_download_5" <? if($FE["show_download_5"]=="1"){ echo "checked"; }?> value="1" onclick="validate.submit();">
                                    Check for show btn download
                                </label>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
					<div class="clear"></div>
				<a href="#" title="" onclick="$('#validate').submit();"class="button greenB" style="margin: 5px;"><span>EDIT</span></a>
       		 </div>



             </fieldset>
             <? if(!empty($cat)){?><input type="hidden" name="parent" value="<?=$cat?>" /> <? }?>
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