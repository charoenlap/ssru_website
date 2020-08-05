<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="asset/css/bootstrap.min.css?v=1001" rel="stylesheet">
    <!-- <script src="asset/js/jquery.js?v=1001"></script> -->
    <!-- <link href="asset/css/jquery-ui.min.css?v=1001" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link href="asset/css/sb-admin.css?v=1001" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="asset/css/plugins/morris.css?v=1001" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="asset/font-awesome/css/font-awesome.min.css?v=1001" rel="stylesheet" type="text/css">
    <link href="asset/css/monthly.css?v=1001" rel="stylesheet">
    <link href="asset/css/fullcalendar.css?v=1001" rel="stylesheet">
    <!-- <link href="asset/css/fullcalendar.print.min.css?v=1001" rel="stylesheet"> -->
    <!--<link href="asset/css/trumbowyg.min.css?v=1001" rel="stylesheet">-->


    <!-- datepicker bootstrap -->
    <link href="asset/bootstrap-datepicker-master/css/bootstrap-datepicker3.min.css" rel="stylesheet">


    <link href="asset/css/print.css?v=1001" rel="stylesheet" type="text/css">
    <link href="asset/css/custom.css?v=1001" rel="stylesheet" type="text/css">
</head>

<?php 
$have_color = array(0);
// $have_color = array();

$check_cat_calendar_arr_cat = array();
// $check_cat_calendar_arr_cat = array(29,28);

$have_link_url_cat = array();
$have_size_banner = array();
$have_borihan_intro = array();
$have_borihan = array();
// $have_link_url_cat = array(33,41,110,111,112);
/*
$result_url = $obj_db->cat('parent = 0'.$hide_del_lan_order);
foreach ($result_url->rows as $key => $value) {
    $cat_head_temp = $obj_db->cat('parent = '.$value['id'].$hide_del_lan_order)->rows;
    if ($cat_head_temp) {
        #บริหาร------------------------------------------
        // $cat_temp = $obj_db->cat('parent = '.$cat_head_temp[2]['id'].$hide_del_lan_order)->rows;
        // $cat_temp = $obj_db->cat('parent = '.$cat_temp[1]['id'].$hide_del_lan_order)->rows;
        // foreach ($cat_temp as $key_temp => $value_temp) {
        //     $cat_temp = $obj_db->cat('parent = '.$value_temp['id'].$hide_del_lan_order)->rows;
        //     $check_cat_calendar_arr_cat[] = $cat_temp[3]['id'];
            
        // }
        #บริหาร------------------------------------------
        
        $cat_temp = $obj_db->cat('parent = '.$cat_head_temp[0]['id'].$hide_del_lan_order)->rows;
        $check_cat_calendar_arr_cat[] = $cat_temp[1]['id'];
        foreach ($cat_temp as $key_temp => $value_temp) {
            $have_link_url_cat[] = $value_temp['id'];
            if ($key_temp == 3) {
                $ssru_channel = $obj_db->cat('parent = '.$value_temp['id'].$hide_del_lan_order)->rows;
                foreach ($ssru_channel as $key_temp => $value_temp) {
                    $have_link_url_cat[] = $value_temp['id'];
                }
            }
        }

        $content = $obj_db->content('cat = '.$cat_head_temp[0]['id'].$hide_del_lan_order)->rows;
        $have_size_banner[] = $content[0]['id'];



        $have_link_url_cat[] = $cat_head_temp[5]['id'];
        $have_link_url_cat[] = $cat_head_temp[6]['id'];
        // print_r($have_link_url_cat); exit();
    }
}
*/
/*
$temp_eid = array(12,23,24);
foreach ($temp_eid as $key => $value) {
    $result_url = $obj_db->cat('parent = '.$value.$hide_del_lan_order);
    foreach ($result_url->rows as $key_temp => $value_temp) {
        $cat_head_temp = $obj_db->cat('parent = '.$value_temp['id'].$hide_del_lan_order)->rows;
        if ($value == 12) {
            $have_borihan_intro[] = $value_temp['id'];
            $have_borihan[] = $cat_head_temp[0]['id'];
        } else {
            foreach ($cat_head_temp as $key_temp => $value_temp) {
                $cat_head_temp = $obj_db->cat('parent = '.$value_temp['id'].$hide_del_lan_order)->rows;
                $have_borihan_intro[] = $cat_head_temp[0]['id'];
            }
        }
    }
}
*/
// new version @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$have_share_news_cat = array(36,37);
$have_share_calendar_cat = array(29);
$have_share_channel_cat = array(110,111);

if (get('cat') == 0) {
    $size = '218x132';
} else if(in_array(get('pid'), $have_size_banner)) {
    $size = '4000x1647px';
} else if(in_array(get('eid'), $have_borihan_intro)) {
    $size = '255x320px';
} else if(in_array(get('eid'), $have_borihan)) {
    $size = '300x400px';
} else if(get('cat') == 22) {
    $size = '140x140px';
} else {
    $size = '1200x800px';
}
// print_r($have_personnel);

// print_r($have_size_banner);
// $result_url = $obj_db->cat('parent = 0'.$hide_del_lan_order);
// foreach ($result_url->rows as $key => $value) {
//     $cat_temp = $obj_db->content('cat = '.$value[4]['id'].$hide_del_lan_order)->rows;
//     foreach ($cat_temp as $key => $value) {
//         $have_link_url_cat[] = $value['id'];
//     }
// }

 ?>