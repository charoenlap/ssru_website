<?php
require_once('../../../required/connect.php');

$requestData = $_REQUEST;
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if($_GET['ajax_token'] == $_SESSION['ajax_token']) {
		if(!empty($requestData['search']['value'])) {
			$where .= ' AND name LIKE "%' . $requestData['search']['value'] . '%" ';
			$where .= ' OR lname LIKE "%' . $requestData['search']['value'] . '%" ';
			$where .= ' OR email LIKE "%' . $requestData['search']['value'] . '%" ';
			$user_result = $obj_db->getdata('users','user_id<>0 and del=0 ' . $where .' order by user_id DESC', NULL, NULL, $requestData['start']." ,".$requestData['length']);
		} else {
			$user_result = $obj_db->getdata('users','user_id<>0 and del=0 order by user_id DESC', NULL, NULL, $requestData['start']." ,".$requestData['length']);
		}
		$temp = array();
		$data = array();
		$requestData['start'] = $requestData['start']+1;
		foreach ($user_result->rows as $key => $value) {
		    $temp = array();
		    $temp[] = $requestData['start']++;
		    $temp[] = $value['name'].$value['lname'];
		    $temp[] = $value['phone'];
		    $temp[] = $value['email'];

		    $temp[] = '<input class="datepicker form-control dater_expired" user_id="'.$value['user_id'].'" data-date-format="yy-mm-dd" value="'.$value['date_expired'].'">';
		    $temp[] = '
		    	<select name="user_status[]" class="form-control status_update">
			    	<option value="0"'.($value['user_status']=="0" ? "selected" : "").' user_id="'.$value['user_id'].'">ยังไม่ได้ตรวจสอบ</option>
			        <option value="1"'.($value['user_status']=="1" ? "selected" : "").' user_id="'.$value['user_id'].'">ตรวจสอบแล้ว</option>
		        </select>';

		    if ($value['user_status']==1) {
				$temp[] = '<a href="cp-user-detail.php?id='.$value['user_id'].'" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
					<a href="cp-user.php?del='.$value['user_id'].'" class="btn-del-user btn btn-xs btn-danger" data-id="'.$value['user_id'].'"><i class="fa fa-eraser"></i></a>
		    		<a href="cp-user.php?send_mail='.$value['user_id'].'" onclick="return confirm("คุณต้องการส่งอีเมล์อีกครั้งใช่หรือไม่")" class="btn btn-xs btn-info"><i class="fa fa-reply"></i></a>';
		    } else {
		    	$temp[] = '<a href="cp-user-detail.php?id='.$value['user_id'].'" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
		    		<a href="cp-user.php?del='.$value['user_id'].'" class="btn-del-user btn btn-xs btn-danger" data-id="'.$value['user_id'].'"><i class="fa fa-eraser"></i></a>';
		    }
		    $data[] = $temp;
		}

		$json_data = array(
			'draw'            =>  intval($requestData['draw']),
			'recordsFiltered' =>  intval($user_result->num_rows),
			'recordsTotal'    =>  $user_result->num_rows,
			'data'            =>  $data,
			'sql'			  =>  $user_result->sql
		);
		echo json_encode($json_data);
	}
}

?>

