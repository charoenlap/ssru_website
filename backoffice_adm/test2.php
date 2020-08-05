<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php'); ?>
<html> <style>
body {
	    background-color: #fff;
}
</style>
	<body>
<?php 
	
	$db = array(
		'id' => 2,
		'parent_id' => 1,
		'rows' => array(
			array('id' => 29, 'parent_id' => 2, 'rows' => array()),
			array('id' => 35, 'parent_id' => 2,
				'rows' => array(
					array('id' => 36, 'parent_id' => 2, 'rows' => array()),
					array('id' => 37, 'parent_id' => 2, 'rows' => array()),
					array('id' => 38, 'parent_id' => 2, 'rows' => array())
				)
			)
		)
	);

	echo '<pre>';
	print_r($db);
	echo '</pre>';

	// $count = count($db['rows']);
	// $arr = $db['rows'];

	// getloop($count, $arr);

	// function getloop ($c, $a) {
	// 	while ($c > 0) {
	// 		foreach ($a as $val) {
	// 			echo $val['id'];
	// 			echo 'select insert';
	// 			$c = count($val['rows']);
	// 			getloop($c, $val['rows']);
	// 		}
	// 	}
	// }

		// $i=1;


		// do {
		// 	$id = 2;
		// 	// $query = $obj_db->cat('parent = ' . $id . $hide_del_lan_order);
		// 	// $count = $query->num_rows;
		// 	// foreach ($query->rows as $row) {

		// 	// 	if ($count > 0) {
		// 	// 		$id = $row['id'];
		// 	// 	} else {
		// 	// 		$id = 0;
		// 	// 	}
		// 	// 	echo $id;
		// 	// 	echo ' ';
		// 	// }
		// 	// echo '<br>';
		// } while ($id != 0);
?>
	</body>
</html>