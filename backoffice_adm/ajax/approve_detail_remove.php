<?php 
    require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../../required/connect.php'); 
    $data_update = array(
        'del' => 1
    );
    $obj_db->update('question_detail',$data_update,'id='.(int)$_GET['id']);
?>
