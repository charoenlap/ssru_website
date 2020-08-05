<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php'); ?>
 <style>
body {
	    background-color: #fff;
}
</style>
<?php 

function add_cats($copy_cat_id,$paste_cat_id) {
	global $obj_db;
	global $obj_con;
	$hide_del_lan_order = ' and hide = 0 and del = 0 and language_id = 1 ORDER BY seq ASC';
	$result_cat = $obj_db->cat('parent = '.$copy_cat_id.$hide_del_lan_order);
	// echo $copy_cat_id;
	if ($result_cat->num_rows > 0) {
		foreach ($result_cat->rows as $key => $value) {
	        $inp_arr = array(
	        	'time'	=>	time(),
	        	'parent'	=>	$paste_cat_id,
	        	'seq'	=>	$obj_db->getdata('content_cat','parent='.$paste_cat_id.' and hide = 0 and del = 0')->num_rows+1,
	        );
	        $insert_cat = $obj_db->insert("content_cat",$inp_arr);
	        $sql_language = $obj_con->getLanguage();
	        while($FC=$sql_language->fetch_assoc()){
	        	$get_lang_name = $obj_db->cat('ref_id = '.$value['id'].' and hide = 0 and del = 0 and language_id = '.$FC['id'].' ORDER BY seq ASC')->row['lang_name'];
	        	$input_language = array(
	        		'name'	=>	$get_lang_name,
	        		'language_id'	=>	$FC['id'],
	        		'ref_id'	=>	$insert_cat,
	        		'type'	=>	0,
	        	);
	            $obj_db->insert("language_detail",$input_language);
	        }

	        $check_more_con = $obj_db->content('cat = '.$value['id'].$hide_del_lan_order);
	        if ($check_more_con->num_rows > 0) {
	        	foreach ($check_more_con->rows as $key_con => $value_con) {
		        	$inp_arr = array(
			        	'time'	=>	time(),
			        	'cat'	=>	$insert_cat,
			        	'seq'	=>	$obj_db->getdata('content','cat='.$insert_cat.' and hide = 0 and del = 0')->num_rows+1,
			        );
			        $insert_con = $obj_db->insert("content",$inp_arr);

			        $sql_language = $obj_con->getLanguage();
			        while($FC=$sql_language->fetch_assoc()){
			        	$get_lang_name = $obj_db->content('ref_id = '.$value_con['id'].' and hide = 0 and del = 0 and language_id = '.$FC['id'].' ORDER BY seq ASC')->row['lang_name'];
			        	$input_language = array(
			        		'name'	=>	$get_lang_name,
			        		'language_id'	=>	$FC['id'],
			        		'ref_id'	=>	$insert_con,
			        		'type'	=>	1,
			        	);
			            $obj_db->insert("language_detail",$input_language);
			        }
			    }
	        }


	        $check_more_cat = $obj_db->cat('parent = '.$value['id'].$hide_del_lan_order);
	        if ($check_more_cat->num_rows > 0) {
				add_cats($value['id'],$insert_cat);
			}
			// echo $value['lang_name'];
			// exit();
		}
	}
	// return 'ss';
}


if (get('copy_cat_id')) {
	$copy_cat_id = get('copy_cat_id');
} else {
	echo "ใส่ copy_cat_id ที่ต้องการจะกอปปี้ก่อน";
	exit();
	// $copy_cat_id = 1;
}

if (get('paste_cat_id')) {
	$paste_cat_id = get('paste_cat_id');
} else {
	echo "ใส่ paste_cat_id ที่ต้องการจะวางก่อนนะจ๊ะ";
	exit();
	// $paste_cat_id = 34;
}

//www.website-thai.com/project/ssru/theme/backoffice_adm/clone_cat_con.php?copy_cat_id=13&paste_cat_id=171
if ($_SERVER['REQUEST_METHOD']=="POST") { 
	add_cats($copy_cat_id,$paste_cat_id);
	header("Location: clone_cat_con.php");
}
// header("Location: cp-content-cat.php");
 ?>

<form action="" method="post">
	<input type="submit">
</form>



















