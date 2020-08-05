<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');
$para = getpara("act");

$id = "";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

// $sqlSetting = $obj_db->query("select * from ".PREFIX."setting  where branch = " . $id);



if($_SERVER['REQUEST_METHOD']=="POST"){
		$path = "../upload/setting/"; 
		$input = $_POST;
        // $input['branch'] = $id;
		if($_FILES["picture1"]["size"]>0){
			$obj_pic->add_pic($_FILES["picture1"],$path,$setting['image_prefix']."_",$thumb=true);
			$input['picture1']= $obj_pic->picture; 
			
// 			if($obj_pic->picture_thumb!=""){
// 				$input['picture_thumb']=$obj_pic->picture_thumb;
// 			}
		}
    // $input['branch'] = $_SESSION['branch'];

	// if($obj_db->update("setting",$input,"id=1")){
        // print_r($input);

    // if($sqlSetting->num_rows = 0) {
    //     $obj_db->insert("setting", $input);
    //     print_r($input);
    //     // header("Location: cp-setting.php?message=1");
    // } else if($sqlSetting->num_rows > 0) {
        // print_r($input);
        // exit();
        if($obj_db->update("setting",$input,'id= ' . $id)){
            header("Location: cp-setting.php?id=" . $id . "&message=1");
        }
    // }
    // exit;
}

$settings = $obj_db->getdata("setting",'id = '.$id);
$settings = $settings->row;
?>
<div id="wrapper">
<?php require_once('include/inc.header.php');?>
    <div id="page-wrapper">
        
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Setting
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="main_cp.php">Dashboard</a></li>
                         <li class="current"><a href="#">Setting</a></li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php if($message==1){?>
                    <div class="">
                        <p class="alert alert-success text-success"><strong>SUCCESS: </strong>Setting has been updated!!!!</p>
                    </div>
                    <?php }?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Setting</h3>
                        </div>
                        <div class="panel-body">
                            <form id="validate"  class="form-horizontal" method="post" action="?id=<?=$id?>&eid=<?=$eid?>" enctype="multipart/form-data">
                                <div class="text-right"><input type="submit" value="submit" class="btn btn-success"></div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">title head:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $settings['title_head'];?>" name="title_head"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">ที่อยู่:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $settings['address'];?>" name="address"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">เบอร์โทรศัพท์:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $settings['phone_home'];?>" name="phone_home"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">เบอร์โทรศัพท์มือถือ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $settings['phone'];?>" name="phone"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">อีเมล์</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $settings['email'];?>" name="email" id="email"/>
                                    </div>
                                </div>
                                <hr>
                                <p>Don't show use null</p>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Twitter:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $settings['twitter'];?>" name="twitter" id="twitter"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Facebook:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $settings['fb'];?>" name="fb" id="fb"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Vemio:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $settings['vemio'];?>" name="vemio" id="vemio"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Instragram:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $settings['ig'];?>" name="ig" id="ig"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Skype:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $settings['skype'];?>" name="skype" id="skype"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Line:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $settings['line'];?>" name="line" id="line"/>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">รูป</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="file" name="picture1" />
										<?  if($settings['picture1']!=""){ ?>
										  <a href="../upload/setting/<?=$settings['picture1']?>" target="new">View File</a> <a class="text-danger" href="<?=$para?>&act=delpic1">Del</a>
										<? }?>
                                    </div>
                                </div>
                                <hr>
                                <p>Wording</p>
                                <div class="form-group text">
                                    <label for="map_longitude" class="col-sm-2 control-label">map name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="map_name" value="<?php echo $settings['map_name'];?>">
                                    </div>
                                </div>
                                <div class="form-group text">
                                    <label for="map_longitude" class="col-sm-2 control-label">map api:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="map_api" value="<?php echo $settings['map_api'];?>">
                                    </div>
                                </div>
                                <div class="form-group text">
                                    <label for="map_longitude" class="col-sm-2 control-label">map iframe src:</label>
                                    <div class="col-sm-10">
                                         <textarea name="map_iframe" class="form-control" id="" cols="30" rows="10"><?php echo $settings['map_iframe'];?></textarea>
                                        <!-- <input type="text" class="form-control" name="map_iframe" value="<?php echo $settings['map_iframe'];?>"> -->
                                    </div>
                                </div>
                                <div class="form-group text">
                                    <label for="map_longitude" class="col-sm-2 control-label">Gmap Longitude:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="map_longitude" id="map_longitude" value="<?php echo $settings['map_longitude'];?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="map_latitude" class="col-sm-2 control-label">Gmap Latitude:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="map_latitude" id="map_latitude" value="<?php echo $settings['map_latitude'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="map_z" class="col-sm-2 control-label">Gmap:</label>
                                    <div class="col-sm-10">
                                        <div id="mapdiv"></div>
                                        <input type="hidden" class="form-control" name="map_z" id="map_z" value="16">
                                    </div>
                                </div>
                                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBlwf28jX4WluOF_LZUC4Hej081lkiH_Ek"></script>
                                <script>
                                    var mapdiv;
                                    function init_map() {
                                        var opts = { 'center': new google.maps.LatLng(<?php echo $settings['map_longitude'];?>,<?php echo $settings['map_latitude'];?>), 'zoom': 17, 'mapTypeId': google.maps.MapTypeId.ROADMAP }
                                            map = new google.maps.Map(document.getElementById('mapdiv'), opts);

                                            var myMarker = new google.maps.Marker({
                                                position: new google.maps.LatLng(<?php echo $settings['map_longitude'];?>,<?php echo $settings['map_latitude'];?>),
                                                draggable: true
                                            });

                                            google.maps.event.addListener(myMarker, 'dragend', function(evt){
                                                document.getElementById('map_longitude').value = evt.latLng.lat();
                                                document.getElementById('map_latitude').value = evt.latLng.lng();
                                            });

                                            google.maps.event.addListener(myMarker, 'dragstart', function(evt){
                                                
                                            });

                                            map.setCenter(myMarker.position);
                                            myMarker.setMap(map);
                                    } 
                                    google.maps.event.addDomListener(window, 'load', init_map);
                                </script>
                                <style>
                                    #mapdiv {
                                        width: 100%;
                                        height: 500px;
                                    }
                                </style>
                                <div class="text-right"><input type="submit" value="submit" class="btn btn-success"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php require_once('include/inc.footer.php');?>
<script>
$(function(){
    $('.setting').addClass('active');

    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    });
});
</script>