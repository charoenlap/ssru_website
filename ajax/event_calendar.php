<?php 
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); 
  header('Content-Type: application/json');

  
  $day_calendar = $obj_db->content('cat = '.$_GET['cat'].$hide_del_lan_order);
  $temp_arr = array();
  foreach ($day_calendar->rows as $key => $value) {
    $temp_arr[] = array(
      'title' =>  $value['lang_name'],
      'start' =>  $value['calendar_day'],
      // 'end' =>  $value['calendar_day_end'],
      'end' =>  date('Y-m-d',strtotime($value['calendar_day_end'] . "+1 days")),
      'url'   =>  $value['id'],
    );
  }

  echo json_encode($temp_arr);
  // echo json_encode('ss');
  // echo $_POST['cat'];
  // print_r($_POST);
?>