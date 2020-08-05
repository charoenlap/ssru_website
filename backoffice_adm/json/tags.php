<?php 
    require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../../required/connect.php'); 
    $result_tags = $obj_db->getdata('question',"tags like '%".$_GET['data']."%'");
    $tags_all = "";
    $tagarray = array();
    foreach ($result_tags->rows as $key => $value) {
        $tags_all .= ','.$value['tags'];
    }
    $tagarray = explode(',', $tags_all);
    $tagarray = array_unique($tagarray);
    
    //$json = array('abc','def');
    $json = preg_replace("!\r?\n!", "", $tagarray);
    echo json_encode($json);
?>
