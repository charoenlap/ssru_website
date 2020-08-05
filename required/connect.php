<?php
	 //error_reporting(E_ALL);
	// ini_set('display_errors', 'on');
	
	ob_start();
	session_start();
	error_reporting(0);
	ini_set('display_errors', 'off');
	
	define('PREFIX', 'sl_');

	define('ADMIN_EMAIL', 'siamlaw@gmail.com');

	define('UPLOAD_IMG_PATH', 'upload/image/');
	define('UPLOAD_PROFILE_PATH', 'upload/profile/');
	define('UPLOAD_CONTENT_PATH', 'upload/content/');
	#Facebook
	define('fb_app_id', '1140190572668464');
	define('fb_app_secret', 'c701312babc38566a440c8e8776b2221');
	define('fb_link_callback', 'page_login_fb_callback.php');
	define('DEFAULT_LIMIT_PAGE', '6');
	//$user_id = "";
	#date_default_timezone_set('Etc/UTC');
	$_SESSION['lang_id'] = 1;
	$lang_no = 1;
	if(!isset($_SESSION['lang'])){
		$_SESSION['lang'] = "th";
	}
	if(isset($_GET['lang'])){
		$_SESSION['lang'] = $_GET['lang'];
	}
	$lang = $_SESSION['lang'];
	if($lang=="th"){
		$lang_no = 1;
	}else{
		$lang_no = 2;
	}
	$picture1 = 'picture1';
	if($lang_no == 2){
		$picture1 = 'picture1_en';
	}
	$lang = $_SESSION['lang'];
	$path = "";

	//$mdir = "http://localhost/".$path;
	//$mdir_api = "http://localhost/api/";


	$mdir = "http://203.155.54.138/".$path;
	$mdir_api = "http://203.155.54.138/api/";

	

	$name_website = "FMS";
	$title = "<title>".$name_website."</title>";
	$key = "MD";

	$fdir = str_replace('backoffice_adm', '', dirname(__FILE__));
	$backoffice="backoffice_adm";
	$cdir = "$mdir/".$backoffice;
	$nCOOKIE_SITE = $mdir;
	$PRIVATEhost_home="localhost";
	$PRIVATEuser_home="root";
	$PRIVATEpassword_home="P@ssw0rd";
	$PRIVATEdb_home="fsoftpro_fms";

	date_default_timezone_set('Asia/Bangkok');
	$route = "";
	if(isset($_GET['route'])){
		$route = $_GET['route'];
	}

	


	

	$method = $_SERVER['REQUEST_METHOD'];
	$path_index = dirname(__FILE__);
	$path_index = str_replace('required','',$path_index);

	
	require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'phpThumb/phpThumb.config.php';
	
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_db.php';
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_pic.php';
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_product.php';
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_content.php';
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_user.php'; 
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_permission.php';
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_utility.php';
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_dal.php';
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_question.php';
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_job.php';
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_customer.php';
	require_once $path_index.DIRECTORY_SEPARATOR.'model/class_master.php';
	
	require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'phpMailer/class.phpmailer.php';
	require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'language.php';
	
	$obj_db = new db($PRIVATEhost_home,$PRIVATEdb_home,$PRIVATEuser_home,$PRIVATEpassword_home);
	$obj_pic = new pic();
	$obj_pro = new product();
	$obj_con = new content();
	$user 		= new user($obj_db);
	$permission = new permission($obj_db);
	$dal		= new DataAccess($obj_db);
	$utility 	= new Utility(); 
	$dbUtility 	= new DBUtility(); 
	$question 	= new question($obj_db); 
	$job 		= new job($obj_db); 
	$cus 		= new customer($obj_db);
	$master 	= new master($obj_db);
	

	
	require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'function.php';
	$para = getpara('lang');
	$lan = $language[$lang];
	$landingpage = "index";

	/*$email_send = "no-reply@chiiwii.com <no-reply@chiiwii.com>";
	$email_username = "info@chiiwii.com";
	$email_password = "12345";
	$email_host = "mail.chiiwii.com"; // smtp.gmail.com
	$email_port = "465"; // or ( 465 or 587 gmail )
	$email_stmpsecure = "ssl";  
	$email_bcc = "";
	$email_detail = "";
	$email_detail_header = "";
	$email_detail_footer = "";*/
	$email_send = "labour.email.send@gmail.com <info@chiiwii.com>";
	$email_username = "labour.email.send@gmail.com";
	$email_password = "Labour12345";
	
	
	/*
	$email_send = "mahidol.email@gmail.com <mahidol.email@gmail.com>";
	$email_username = "mahidol.email@gmail.com";
	$email_password = "Mhd12345678";
	*/
	$email_host = "smtp.gmail.com"; // smtp.gmail.com
	$email_port = "465"; // or ( 465 or 587 gmail )
	$email_stmpsecure = "ssl";  
	$email_bcc = "";
	$email_detail = "";
	$email_detail_header = "";
	$email_detail_footer = "";

	extract($_GET);
	extract($_POST);
	extract($_COOKIE);
	extract($_FILES); 
	extract($_REQUEST); 
	$ntime= time();

	// config database
	/*$PRIVATEhost_home="localhost";
	$PRIVATEuser_home="systems2000";
	$PRIVATEpassword_home="Systadmin2013";
	$PRIVATEdb_home="systems2000";*/
	
	
	
	$setting = $obj_db->query("select * from ".PREFIX."setting  where id =1")->row;
	// $setting = $sqlSetting->row;
	// if($sqlSetting->num_rows > 0){
	// 	$email_send 			= $setting['email_title'];
	// 	$email_detail_header 	= $setting['email_detail_header'];
	// 	$email_detail_footer 	= $setting['email_detail_footer'];
	// 	$email_detail 			= $setting['email_detail'];
	// 	$email_bcc 				= $setting['email_bcc'];
	// 	$email_allow 			= $setting['email_allow'];
	// }
	
	$sesth = '1';
	
	if(!isset($_REQUEST)){ foreach($_REQUEST as $key => $val){ $val[$key] = mysql_real_escape_string($val[$key]);} }
	if(!isset($_POST)){ foreach($_POST as $key => $val){ $val[$key] = mysql_real_escape_string($val[$key]);	} }
	if(!isset($_GET)){ foreach($_GET as $key => $val){ $val[$key] = mysql_real_escape_string($val[$key]);	} }
	if(!isset($_SESSION)){ foreach($_SESSION as $key => $val){ $val[$key] = mysql_real_escape_string($val[$key]);	} }
	if(!isset($_COOKIE)){ foreach($_COOKIE as $key => $val){ $val[$key] = mysql_real_escape_string($val[$key]);	} }
	$user_id = 0;
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
	}



	// echo $_SESSION['head_cat_id'];
	
	$hide_del_lan_order = ' and hide = 0 and del = 0 and language_id = '.$lang_no.' ORDER BY seq ASC';
	$hide_del_lan_order_last = ' and hide = 0 and del = 0 and language_id = '.$lang_no.' ORDER BY seq DESC';

	// echo "test";exit();
	// var_dump($_GET);exit();
	// echo $landingpage;exit();
?>