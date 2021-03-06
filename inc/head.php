<?php 
// if(get('head_cat_id')){
// 	$_SESSION['head_cat_id'] = get('head_cat_id');
// } else {
// 	if (!isset($_SESSION['head_cat_id'])) {
// 		$_SESSION['head_cat_id'] = 1;
// 	}
// }

$head_cat_id = 1;

$master_head_cat = $obj_db->cat('ref_id = '.$head_cat_id.$hide_del_lan_order)->row;


$head_cat = $obj_db->cat('parent = '.$head_cat_id.$hide_del_lan_order)->rows;

if (empty($head_cat)) {
	$head_cat = $obj_db->cat('parent = 1'.$hide_del_lan_order)->rows;
}
//$con_setting = array();

$con_setting = $obj_db->content('cat = '.$head_cat[6]['id'].$hide_del_lan_order)->rows; 

?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>คณะวิทยาการจัดการ มหาวิทยาลัยราชภัฎสวนสุนันทา</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<!-- Fontawsome -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<!-- owl carousel -->
<link rel="stylesheet" href="assets/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="assets/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">

<!-- animate css -->
<link rel="stylesheet" href="assets/css/animate.css">
<!-- magnific-popup -->
<link rel="stylesheet" href="assets/css/magnific-popup.css">

<link rel="stylesheet" href="assets/css/fullcalendar.css">
<!-- style css -->
<!-- <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>"> -->

<!-- responsive -->
<link rel="stylesheet" href="assets/css/responsive.css?v=<?php echo time(); ?>">

<!-- less -->
<link rel="stylesheet/less" type="text/css" href="assets/css/styles.less?v=<?php echo time(); ?>" />
<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.7.1/less.min.js" ></script>

<?php
if (empty($og_url)) {
     $og_url = $mdir;
}
if (empty($og_title)) {
     $og_title = "SSRU";
}
if (empty($og_description)) {
    $og_description = "description...";
}
if (empty($og_image)) { 
    $og_image = "http://www.website-thai.com/project/ssru/theme/assets/images/logo/logo.png";
}
$sub_str = substr($og_image, -3);
// echo $sub_str;
// echo $og_image;
// echo $sub_str; ?>


<meta property="fb:app_id"          content="371eaad5996558b66e8196e0bcb51e84">
<meta property="og:url"             content="<?php echo $og_url; ?>" />
<meta property="og:type"            content="website" />
<meta property="og:title"           content="<?php echo $og_title; ?>" />
<meta property="og:description"     content="<?php echo $og_description; ?>" />
<meta property="og:image"           content="<?php echo $og_image; ?>" />
<meta property="og:image:type"      content="<?php echo $sub_str; ?>">
<meta property="og:image:width"     content="500">
<meta property="og:image:height"    content="500">

<link rel="canonical" href="<?php echo $og_image; ?>" />

<script src="https://apis.google.com/js/platform.js" async defer>
</script>

<?php 
$head_cat_ref = $obj_db->cat('ref_id = '.$head_cat_id.$hide_del_lan_order)->row;
// f26422
$color = $head_cat_ref['color']; 
// f222d8
?>
<style>
	/*////////////////////////////////////// header */
li.nav-item a {
	color: #f26422;
}
.bg-topnav {
	background-color: #bcbdc0 !important;
}
.nav-custom {
  padding: 0;
  background-color: #fff !important;
  box-shadow: 0 3px 10px 0 rgba(0,0,0,0.2);
  z-index: 9999;
  transition: 0.7s;
}
ul.nav-menu {
  padding: 0;
  margin: 0;
  list-style-type: none;
}
ul.nav-menu li {
  float: left;
}
ul.nav-menu li a {
  display: block;
  padding: 27px 15px;
  color: #<?php echo $color; ?>!important;
  text-decoration: none;
  text-align: center;
  font-size: 22px;
}
ul.nav-menu li.active a {
  background: #<?php echo $color; ?>!important;
  color: #fff!important;
}
ul.nav-menu li a:hover, .dropdown:hover .dropbtn {
  background: #<?php echo $color; ?>!important;
  color: #fff!important;
}

ul.nav-menu li.dropdown {
  display: inline-block;
}

ul.nav-menu .dropdown-content {
  display: none;
  position: absolute;
  background: #fff !important;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  width: 450px;
  z-index: 9999;
  /*animation-duration: 0.55s;*/
  /*animation-delay: 0.85;*/
  /*animation-name: fadeInUp;*/
  animation: header-animate .3s ease forwards;
}
@keyframes header-animate {
  from { 
    opacity:0;
    transform:translate(0, 15px);
    }
  to{
    opacity:1;
    transform:translate(0, 0);
    }
  }
ul.nav-menu .dropdown-content a {
  color: black;
  padding: 5px 10px;
  text-decoration: none;
  display: block;
  text-align: left;
  color: #<?php echo $color; ?>;
}

ul.nav-menu .dropdown-content a:hover {
  background-color: #f36d21;
}

ul.nav-menu .dropdown:hover .dropdown-content {
  display: block;
}



/*////////////////////////////////////// background */
.content-tab {
	background: #e2e2dd;
	border-top: 40px solid #<?php echo $color; ?>!important;
}
.bg-orange {
	background: #<?php echo $color; ?>!important;
}
.text-title {
	background: #<?php echo $color; ?>!important;
  padding: 10px 0;
}
.text-title h3 {
  margin-bottom: 0;
}
.bg-calendar {
  border-bottom: 50px solid #d3d2ca;
}
.bg-overflow {
  background-color: #f26422;
  position: absolute;
  right: 0;
  width: 50%;
  /*height: 250px;*/
}
.bg-gray {
  /*background: #e2e2dd;*/
  background: #eee;
}
.bg-portfolio {
  background: url(../images/bg.jpg);
  background-size: cover;
}

/*////////////////////////////////////// footer */
footer {
	background: #<?php echo $color; ?>!important;
	padding: 20px 0 40px;
}


/*////////////////////////////////////// banner */
.overlay-banner {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: #000;
  opacity: 0.5;
}
.overlay-triangle {
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 0;
  border-left: 360px solid #f26422;
  border-right: 360px solid transparent;
  border-top: 360px solid #f26422;
  border-bottom: 360px solid transparent;
  opacity: 0.7;
}
.height-banner {
  height: 700px;
}
.ov-banner {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  /*background: rgba(0,0,0,0.3);*/
  /*background: linear-gradient(#fff,#333);*/
}


/*////////////////////////////////////// tab */
.nav-pills .tab-color.active {
  /*padding: 1.5rem 9rem;*/
  z-index: 2;
  background: url(../images/arrow-or.png);
  background-size: 100% 100%;
  background-repeat: no-repeat;
  -webkit-filter: drop-shadow(10px 15px 13px #444);
  filter: drop-shadow(10px 15px 13px #444);
  margin-right: -10px;
}
.tab-color:hover {
  color: #fff;
}
.tab-color {
  color: #fff;
  margin-bottom: 15px;
  padding: 1rem 1rem;
  text-align: center;
  background: url(../images/arrow-blue.png);
  background-size: contain;
  background-repeat: no-repeat;
}

.nav-pills .tab-two.active {
  background-color: #<?php echo $color; ?>;
  margin-left: -15px;
  margin-right: -15px;
  transition: all .2s;
}
.tab-two:hover {
  color: #fff;
}
.tab-two {
  background-color: #1d85c8;
  color: #fff;
  margin: 2px 0;
  padding: 1rem 1rem;
  text-align: center;
  border-radius: 0 !important;
}

.nav-pills .tab-three.active {
  background-color: #<?php echo $color; ?>!important;
  transition: all .2s;
}
.tab-three:hover {
  color: #fff;
}
.tab-three {
  background-color: #1d85c8;
  color: #fff !important;
  margin: 2px 0;
  padding: 1rem 1rem;
  text-align: center;
  margin-right: 15px;
  text-transform: uppercase;
  width: 220px;
  padding-bottom: 10px;
  position: relative;
  margin-bottom: 20px;
}
.active.tab-three:before {
  content: "";
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 15px 110px 0 110px;
  border-color: #<?php echo $color; ?> transparent transparent transparent;
  position: absolute;
  /*top: 49px;*/
  left: 0px;
  transition: all .3s;
  bottom: -14px;
}


/*////////////////////////////////////// width & height */
.w-120px {
  width: 120px;
}
.height-285 {
  height: 285px;
}
.height-520 {
  height: 520px;
}

/*////////////////////////////////////// margin */
.mt-100px {
  margin-top: 100px;
}


/*////////////////////////////////////// padding */
.padding-all {
  padding: 3rem;
}


/*////////////////////////////////////// button */
.btn-white {
  background-color: #fff;
  border-color: #fff;
  color: #f26422;
  text-transform: uppercase;
  border-radius: 0;
}
.btn-white:hover {
  color: #f26422;
}
.btn-theme {
  background-color: #<?php echo $color; ?>!important;
  border-color: #<?php echo $color; ?>!important;
  color: #fff;
  text-transform: uppercase;
  border-radius: 0;
}
.btn-theme:hover {
  color: #fff;
}



/*////////////////////////////////////// card */
.card-border-top {
  border-top: 5px solid #1d85c8;
  margin-left: 10px;
  margin-right: 10px;
  padding: 0.4rem;
}
.steps-title {
  font-weight: bold;
  color: #2f419a;
}


/*////////////////////////////////////// button arrow */
.btn-arrow-right,
.btn-arrow-left {
   position: relative;
   padding-left: 21px;
   padding-right: 21px;
}
.btn-arrow-right:after,
.btn-arrow-left:before {
   content: "";
   position: absolute;
   top: 3px;
   width: 21px;
   height: 22px;
   background: inherit;
   border: inherit;
   border-left-color: transparent;
   border-bottom-color: transparent;
   border-radius: 0px 0px 0px 0px;
   -webkit-border-radius: 0px 0px 0px 0px;
   -moz-border-radius: 0px 0px 0px 0px;
}
.btn-arrow-right:before,
.btn-arrow-right:after {
   transform: rotate(45deg);
   -webkit-transform: rotate(45deg);
   -moz-transform: rotate(45deg);
   -o-transform: rotate(45deg);
   -ms-transform: rotate(45deg);
}
.btn-arrow-left:before,
.btn-arrow-left:after {
   transform: rotate(225deg);
   -webkit-transform: rotate(225deg);
   -moz-transform: rotate(225deg);
   -o-transform: rotate(225deg);
   -ms-transform: rotate(225deg);
}
.btn-arrow-left:before {
   left: -12px;
}
.btn-arrow-right:after {
   right: -12px;
}
.btn-arrow-right:after,
.btn-arrow-left:before {
   z-index: 1;
}
.btn-arrow-right:before,
.btn-arrow-left:after {
   background-color: white;
}


/*////////////////////////////////////// main */
.border-or {
  border: 2px solid #f26422;
}

/*////////////////////////////////////// images */
.img-overlay {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  opacity: 0.5;
  background: #000;
  transition: all .25s;
}
.img-overlay:hover {
  opacity: 0;
  cursor: pointer;
}
.overlay-text {
  color: #fff;
  font-size: 14px;
  position: absolute;
  top: 80%;
  left: 50%;
  -webkit-transform: translate(-50%, -80%);
  -ms-transform: translate(-50%, -80%);
  transform: translate(-50%, -80%);
  text-align: center;
}



/*//////////////////////////////////////  Ca*/
#calendar {
  background: #fff;
  padding: 10px;
}








/*////////////////////////////////////// calendar */
/*html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}*/

.text-steps {
  color: #2f419a;
}
.section-header, .steps-header, .steps-name {
  color: #3498DB;
  font-weight: 400;
  font-size: 1.4em;
}

.steps-header {
  margin-bottom: 20px;
  text-align: center;
}

.steps-timeline {
  outline: 1px dashed rgba(255, 0, 0, 0);
}
@media screen and (max-width: 500px) {
  .steps-timeline {
    border-left: 2px solid #f26422;
    margin-left: 25px;
  }
}
@media screen and (min-width: 500px) {
  .steps-timeline {
    border-top: 2px solid #f26422;
    padding-top: 20px;
    margin-top: 40px;
    /*margin-left: 16.65%;
    margin-right: 16.65%;*/
    margin-left: 15px;
    margin-right: 15px;
  }
}
.steps-timeline:after {
  content: "";
  display: table;
  clear: both;
}

.steps-one,
.steps-two,
.steps-three,
.steps-four,
.steps-five {
  outline: 1px dashed rgba(0, 128, 0, 0);
}
@media screen and (max-width: 500px) {
  .steps-one,
  .steps-two,
  .steps-three,
  .steps-four,
  .steps-five {
    margin-left: -25px;
  }
}
@media screen and (min-width: 500px) {
  .steps-one,
  .steps-two,
  .steps-three,
  .steps-four,
  .steps-five {
    float: left;
    width: 19%;
    margin-top: -85px;
    /*margin-top: -50px;*/
  }
}

@media screen and (max-width: 500px) {
  /*.steps-one,
  .steps-two {
    padding-bottom: 40px;
  }*/
}

@media screen and (min-width: 500px) {
  .steps-0 {
    margin-left: 5px;
    margin-right: 5px;
  }
}

@media screen and (max-width: 500px) {
  /*.steps-three {
    margin-bottom: -100%;
  }*/
}
@media screen and (min-width: 500px) {
  /*.steps-three {
    margin-left: 16.65%;
    margin-right: -16.65%;
  }*/
}

.steps-img {
  display: block;
  margin: auto;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
@media screen and (max-width: 500px) {
  .steps-img {
    float: left;
    margin-right: 20px;
  }
}

.steps-name,
.steps-description {
  margin: 0;
}

@media screen and (min-width: 500px) {
  .steps-name {
    text-align: center;
  }
}

.steps-description {
  overflow: hidden;
}
@media screen and (min-width: 500px) {
  .steps-description {
    text-align: center;
  }
}
.h-20 {
  height: 20%!important;
}
.h150 {
  height: 150px;
}
.h200 {
  height: 200px;
}
.h230 {
  height: 230px;
}
.fs-17 {
  font-size: 17px;
}


.color_hide_footer {
  color: #f26422;
}



/*//////////////////////////////// //////////////////// index2 */
.border-top-or {
  border-top: 20px solid #f26422;
}
.border-bottom-gray {
  border-bottom: 40px solid #e2e2dd;
}
.tab-right {
  width: 33%;
  text-align: center;
  color: #f26422;
}
.tab-right.active {
  border-top: 5px solid #f26422 !important;
  color: #f26422 !important;
}
.tab-right:hover {
  border-top: 5px solid #f26422 !important;
  color: #f26422 !important;
}
/* hover readmore */
.hover-readmore {
  position: relative;
  background: #000;
}
.hr-images {
  transition: .5s ease;
  opacity: 1;
  display: block;
  width: 100%;
  /*height: auto;*/
}
.hr-overlay {
  transition: .5s ease;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
}
a.hr-text {
  opacity: 0;
  background: transparent;
  border: 2px solid #fff;
  color: #fff;
  padding: 0.1rem 0.2rem;
  cursor: pointer;
  text-decoration: none;
  font-size: 1rem;
}
.hr-share {
  opacity: 0;
  margin-top: 6px;
  /*margin-left: 0.6rem;*/
}
.hover-readmore:hover .hr-images {
  opacity: 0.4;
}
.hover-readmore:hover .hr-text {
  opacity: 1;
}
.hover-readmore:hover .hr-share {
  opacity: 1;
}
/* calendar index2 */
.cal {
  position: relative;
}
.cal .right-event {
  right: -15px;
  top: 20px;
  text-align: center;
  transform-style: preserve-3d;
  perspective: 300px;
}
.cal .right-event {
  position: absolute;
  z-index: 2;
}
.cal .right-event .fold {
  background-color: #f26422;
  padding: 5px 10px;
  will-change: transform;
  transform-origin: 100% 50%;
  transition: .3s ease;
}
.cal .right-event span.day {
  font-size: 2em;
  line-height: 1.1;
  font-weight: bold;
}
.cal .right-event span {
  display: block;
  color: #fff;
  text-transform: uppercase;
}
.cal .right-event span.month, 
.cal .right-event span.year {
  line-height: 1.1;
}
.cal .right-event .fold:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  /*background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.4));*/
  display: block;
  top: 0;
  left: 0;
  opacity: 0;
  transition: .3s ease;
}
.cal a:hover .right-event .fold:before {
  opacity: 1;
}
.cal a:hover .right-event .fold {
  transform: rotateY(40deg);
}

/*
.right-cal {
  position: absolute;
  top: 15px;
  right: -15px;
  transform-style: preserve-3d;
  perspective: 300px;
  z-index: 2;
}
.right-cal .fold {
  background: #f26422;
  padding: 5px 10px;
  will-change: transform;
  transform-origin: 100% 50%;
  transition: .3s ease;
}
.right-cal .fold:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.4));
  display: block;
  top: 0;
  left: 0;
  opacity: 0;
  transition: .3s ease;
}
.cal a:hover .right-cal .fold:before {
  opacity: 1;
  transform: rotateY(40deg);
}
.cal a:hover .right-cal .fold {
  transform: rotateY(40deg);
}
.right-cal .cal-title {
  font-size: 2rem;
  margin-bottom: 0;
  color: #fff;
}
.right-cal p {
  color: #fff;
  margin-bottom: 0;
  font-size: 16px;
  text-align: center;
  text-transform: uppercase;
}*/
.cal .content-cal {
  position: absolute;
  bottom: 0;
  background: rgb(0,0,0);
  background: rgba(0,0,0,0.5);
  color: #fff;
  width: 100%;
  padding: 10px;
}
/* tab */
.nav-pills .tab-four.active {
  background-color: #<?php echo $color; ?>!important;
  color: #fff !important;
  transition: all .2s;
}
.tab-four:hover {
  color: #fff;
}
.tab-four {
  background-color: #fbae84;
  color: #fff !important;
  margin-top: .5rem;
  padding: 0.5rem 0rem;
  text-align: center;
  margin-right: 15px;
  text-transform: uppercase;
  width: 180px;
  padding-bottom: 10px;
  position: relative;
  margin-bottom: 20px;
  z-index: 999;
  border-radius: 0.5rem !important;
}
.active.tab-four:before {
  content: "";
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 15px 90px 0 90px;
  border-color: #<?php echo $color; ?> transparent transparent transparent;
  position: absolute;
  left: 0px;
  transition: all .3s;
  bottom: -13px;
  z-index: 999;
  filter: drop-shadow(1px 2px 1px rgba(0,0,0,0.6));
}

.margin-top-12 {
  margin-top: -12px;
}
/*//////////////////////////////// //////////////////// end index2 */
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  animation-name: fadeInDown;
  animation-duration: 0.7s;
}

@font-face {
  font-family: FCLamoonLight;
  src: url('assets/fonts/FC Lamoon/FC Lamoon Light ver 1.00.ttf');
}
body {
  font-family: FCLamoonLight;
  font-size: 1.2rem;
}
.h5,h5 {
  font-size: 2rem;
}
.h-content-tab {
  padding-bottom: 120px !important;
}
.height470 {
  height: 470px;
}
.h180 {
  height: 180px;
}
.mt-timeline {
  margin-top: 60px;
}
.bg-calendar-in {
  background: #f26422;
}


/* calendar index2 */
.overflow {
  overflow: hidden;
  height: 202px;
}
#cal-img,
#cal-img2,
#cal-img3,
#cal-img4 {
  position: relative;
  object-fit: cover;
  width: 100%;
  height: 100%;
  transform: translate(0,0,0) scale(1.1);
}

/* images */
.animate-img {
  position: relative;
  animation-name: fadeInUp;
  /*animation-duration: 0.5s;*/
}


/* flip images */
.flip-box {
  background-color: transparent;
  width: 100%;
  height: 320px;
  perspective: 1000px;
  margin-bottom: 30px;
}
.flip-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}
.flip-box:hover .flip-box-inner {
  transform: rotateY(180deg);
}
.flip-box-front, .flip-box-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}
.flip-box-front {
  /*background-color: #bbb;*/
  /*color: black;*/
}
.flip-box-back {
  background-color: #f26422;
  color: #fff;
  transform: rotateY(180deg);
}
.flip-content-center {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
}
.height-flip-box {
  height: 320px;
}
/* calendar */
.fc-unthemed td.fc-today {
  background: #f26422;
}


/* collapse manager */
a.cl-link,
a.cl-link:hover {
  display: block;
  width: 100%;
  padding: 10px 20px;
  margin-bottom: 10px;
  text-align: center;
  color: #fff;
  text-decoration: none;
  background-color: #808285;
  background-image: linear-gradient(to right, #808285,#808285 15%,#f26422 15%,#f26422 85%, #808285 85%);
}
a.collapsed {
  display: block;
  width: 100%;
  padding: 10px 20px;
  margin-bottom: 10px;
  text-align: center;
  color: #fff;
  text-decoration: none;
  background-color: #808285;
  background-image: linear-gradient(to right, #f26422,#f26422 15%,#808285 15%,#808285 85%, #f26422 85%);
}

/* manager */
.blog-manager hr {
  margin: 0;
  border-top: 5px solid #f26422;
  z-index: 1;
}
.blog-manager {
  position: relative;
}
.bg-blogmanager {
  width: 150px;
  height: 150px;
  background: #f26422;
  border-radius: 50%;
}
.blog-manager img {
  width: 140px;
  height: 140px;
  border-radius: 50%;
  border: 5px solid #fff;
  position: absolute;
  top: 5px;
  left: 5px;
  z-index: 2;
}
.blog-manager-content {
  position: absolute;
  top: 50%;
  width: 100%;
  transform: translate(0,-50%);
}


/* management */
.btn-theme-color:not(:disabled):not(.disabled).active, 
.btn-theme-color:not(:disabled):not(.disabled):active, 
.show>.btn-theme-color.dropdown-toggle,
.btn-theme-color:hover {
  color: #fff;
  background-color: #f26422;
  border-color: #f26422;
}
.btn-theme-color {
  color: #fff;
  background-color: #fbae84;
  border-color: #fbae84;
}


/* navbar */
.link-white a {
  color: #fff !important;
}
.link-white p {
  margin-bottom: 0 !important;
}
/* timeline */
#button-updown {
  position: absolute;
  right: 10%;
  top: 40%;
}

/* card */
.h-fix-120 {
  min-height: 120px;
}

</style>