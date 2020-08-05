<?php 
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); 
header('Content-Type: application/json');
  $data = array();
  $content = $obj_db->content('ref_id = '.get('ref_id').$hide_del_lan_order)->row;
  $data['title'] = $content['lang_name'];
  $data['detail'] = $content['detail'];
  $data['picture2'] = $content['picture2'];
  

  echo json_encode($data);
  // echo json_encode('ss');
  // echo $_POST['cat'];
  // print_r($_POST);
?>