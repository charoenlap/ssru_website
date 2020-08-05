<?php 
    require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../../required/connect.php'); 
    $getQuestionID = $obj_db->getdata('question_detail','id='.(int)$_GET['question_detail_id']);


    $question_detail_id = $_GET['question_detail_id'];
    $data_user_id = $_GET['data_user_id'];
    $message = $_GET['message'];
    $check = $_GET['check'];
    $message_doc = $_GET['message_doc']."<br><a href='".$mdir."page_doctor_answer_question_detail.php?id=".$getQuestionID->row['ref_id']."'>ไปยังหน้าคำถาม</a>";
    if($check){
    	$data_update = array(
	        'status' => 2
	    );
	    $obj_db->update('question_detail',$data_update,'id='.(int)$_GET['question_detail_id']);

	    $get_noti = $obj_db->getdata('user','user_id='.(int)$_GET['data_user_id']);
	    $obj_db->update('user',array('noti_message'=>($get_noti->row['noti_message']+1)),'user_id='.(int)$_GET['data_user_id']);
	    $data_insert = array(
	    	'from_user_id' => 0,
	    	'to_user_id' => $data_user_id,
	    	'message'	=> $message_doc,
	    	'date_send' => date('Y-m-d H:i:s'),
	    	'read_message' => 1
	    );
	    $message_id  =  $obj_db->insert('message',$data_insert);
    }else{
    	$data_update = array(
	        'message' => $message
	    );
	    $obj_db->update('question_detail',$data_update,'id='.(int)$_GET['question_detail_id']);
    }
    
?>
