

<?php
error_reporting(0); 
include_once("required/gd/ThumbLib.inc.php");
include_once("required/gd/GdThumb.inc.php");
require_once('required/connect.php'); 


$sFIle = $_GET["file"]; 
$sFIle = explode(",", $sFIle); 
$nMode = $sFIle[0]; 
$nPath = $sFIle[1]; 
$nFile = $sFIle[2];
$nW = $sFIle[3];
$nH = $sFIle[4];
if(isset($sFIle[5])){
  $wm = $sFIle[5];
}



if ($nPath==1){$nPath="upload/content/";}
if ($nPath==2){$nPath="upload/gallery";}
if ($nPath==3){$nPath="";}
$PathFile = "$nPath/$nFile";
// echo $PathFile;
// exit();
  $thumb = PhpThumbFactory::create($PathFile);
  if ($nMode==1){
    $thumb->cropFromCenter($nW, $nH);
  }else if ($nMode==2){
    $thumb->adaptiveResize($nW, $nH);}

  if(isset($wm)){
      $thumb->showWatermask();
  }else{
      $thumb->show();
  }
  
?>