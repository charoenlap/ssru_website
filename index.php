<?php 
	header('Content-Type: text/html; charset=utf-8');
	require_once('required/connect.php'); 
	// require_once("view/common/header.php");
	
	if(get('route')){ 
		if(get('route')==$landingpage){
			$keyword = "";
			require_once("view/".$landingpage.".php");
		}elseif(get('route')=="index.html"){
			header('location: index.php?route='.$landingpage);
			require_once("view/".$landingpage.".php");
		}elseif(file_exists("view/".get('route').".php")){
			require_once("view/".get('route').".php");
		}elseif(get('route')==$backoffice."/index.html"){
			header('location: '.$backoffice.'/index.php');
		}else{
			$result = $obj_db->getdata('seo',"seo='".get('route')."'");
			if($result->num_rows >0){
				require_once("view/".$result->row['rewrite'].".php");
			}else{
				header('location:'.url('index.php?route=404&'.get('route')));
			}
		}
	}else{
		
		require_once("view/".$landingpage.".php");
	}

	// require_once("view/common/footer.php");
?>