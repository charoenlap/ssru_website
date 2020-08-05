<?php 
    require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../../required/connect.php'); 
    $status = $_GET['status'];
    $status = ($status==0?1:0);
    if($_GET['status']=="1"){
        $user_detail = $obj_db->getdata('question_detail LEFT OUTER JOIN chi_question ON chi_question_detail.ref_id = chi_question.id
	 INNER JOIN chi_user ON chi_question.user_id_add = chi_user.user_id','chi_question_detail.id='.(int)$_GET['id'],'*,chi_question.id as question_id');

        $obj_db->update('question',array('status'=>1),'id='.(int)$user_detail->row['question_id']);

        $to_email=$user_detail->row['email'];
        $msg="<p>Your question has been answer by doctor</p>";
        $subject="Your question has been answer by doctor";
        sendmailSmtp($to_email,$msg,$subject);
    }
    $data_update = array(
        'status' => $status
    );
    $obj_db->update('question_detail',$data_update,'id='.(int)$_GET['id']);
?>
