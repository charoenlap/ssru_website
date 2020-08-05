<?php 
    require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../../required/connect.php'); 
    $data_update = array(
        'user_del' => 1,
        'user_status'=>0
    );
    $obj_db->update('user',$data_update,'user_id='.(int)$_GET['id']);
?>
