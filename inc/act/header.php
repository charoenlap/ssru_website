<nav class="bg-topnav">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 pt-2 text-right bg-orange">
				<div class="">
					<a href="<?php echo $con_setting[3]['link_url']; ?>"><i class="fa fa-facebook text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[4]['link_url']; ?>"><i class="fa fa-instagram text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[5]['link_url']; ?>"><i class="fa fa-skype text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[6]['link_url']; ?>"><i class="fa fa-twitter text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[7]['link_url']; ?>"><i class="fa fa-youtube text-white mr-3" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="col-md-6 pt-2">
				<ul class="">
					<li class="list-inline-item link-white">
						<a class="text-white mr-2" href="#"><?php echo $con_setting[0]['lang_name']; ?></a>
					</li>
					<li  class="list-inline-item link-white">
						<a class="text-white mr-2" href="#"><i class="fa fa-phone"></i><?php echo $con_setting[1]['lang_name']; ?></a>
					</li>
					<li class="list-inline-item link-white">
						<a class="text-white mr-2" href="#"><?php echo $con_setting[2]['lang_name']; ?></a>
					</li>
				</ul>
			</div>
			<div class="col-md-3 pt-2">
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control form-control-sm mr-sm-2 col-md-4 rounded-0" type="search" placeholder="<?php echo $lan['search']; ?>" aria-label="Search">
					<!-- <button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit">Search</button> -->
					<a href="http://www.website-thai.com/project/ssru/theme/backoffice_adm"><i class="fa fa-user text-white mr-3"></i></a> <span><?php print_r($_SESSION['email']); ?></span>
					<a href="<?php echo getpara('lang').'&lang=th' ?>"><img src="assets/images/th.png" alt="" width="20" class="mr-2"></a>
					<a href="<?php echo getpara('lang').'&lang=en' ?>"><img src="assets/images/en.png" alt="" width="20"></a>
				</form>
			</div>
		</div>
	</div>
</nav>
<?php 
// print_r($head_cat); ?>
<nav class="nav-custom" id="navbar">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 text-right">
				<a class="navbar-brand" href="<?php echo route('index'); ?>">
					<img src="assets/images/logo/logo.png" alt="" class="w-25">
					<!-- <img src="assets/act/images/logoACT.jpg" alt="" class="w-25 mt-2"> -->
					<?php if ($master_head_cat['id'] != 1) { ?>
						<img src="<?php echo $mdir.'upload/content/'.$master_head_cat['picture1']; ?>" alt="" class="w-25 mt-2">
					<?php } ?>

				</a>
			</div>
			<div class="col-md-9 pl-0">
				<ul class="nav-menu">
					<li id="history" class="dropdown">
						<?php 
						// print_r($head_cat[1]['id']);
						$head_menu = $obj_db->cat('ref_id = '.$head_cat[0]['id'].$hide_del_lan_order); 
						$menu = $obj_db->content('cat = '.$head_cat[1]['id'].$hide_del_lan_order); ?>
						<a href="<?php echo route('act/index'); ?>" class="dropbtn"><?php echo $head_menu->row['lang_name']; ?></a>
					</li>
					<li id="course" class="dropdown">
						<a href="<?php echo route('act/index'); ?>#page_course" class="dropbtn"><?php echo $lan['course']; ?></a>
					</li>
					<li id="manager" class="dropdown">
						<?php 
						$head_menu = $obj_db->cat('ref_id = '.$head_cat[2]['id'].$hide_del_lan_order); 
						$menu = $obj_db->cat('parent = '.$head_cat[2]['id'].$hide_del_lan_order); ?>
						<a href="<?php echo route('act/manager'); ?>" class="dropbtn"><?php echo $lan['faculty']; ?></a>
					</li>
					<li id="application_schedule">
						<a href="<?php echo route('act/application_schedule'); ?>" class="dropbtn"><?php echo $lan['Application_schedule']; ?></a>
					</li>
					<li id="news">
						<?php 
						$news_1 = $obj_db->cat('parent = '.$head_cat[0]['id'].$hide_del_lan_order)->rows; 
						// $news_1 = $obj_db->cat('parent = '.$news_1[0]['id'].$hide_del_lan_order)->rows; 
						// $news_1 = $obj_db->cat('parent = '.$news_1[0]['id'].$hide_del_lan_order)->rows; 
						// print_r($news_1[0]);
						?>
						<a href="<?php echo route('act/news&id='.$news_1[0]['id']); ?>" class="dropbtn"><?php echo $lan['news']; ?></a>
					</li>
					<li id="knowledge">
						<a href="<?php echo route('act/knowledge'); ?>" class="dropbtn"><?php echo $lan['knowledge']; ?></a>
					</li>
					<li id="contact">
						<a href="<?php echo route('act/contact'); ?>" class="dropbtn"><?php echo $lan['menu_contact']; ?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
<div id="menu-mobile" class="fixed-top">
	<nav class="navbar navbar-expand-lg navbar-light bg-orange">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<a href="<?php echo $con_setting[3]['link_url']; ?>"><i class="fa fa-facebook text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[4]['link_url']; ?>"><i class="fa fa-instagram text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[5]['link_url']; ?>"><i class="fa fa-skype text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[6]['link_url']; ?>"><i class="fa fa-twitter text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[6]['link_url']; ?>"><i class="fa fa-line text-white mr-3" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</nav>
	<?php /* ?>
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
		<a href="<?php echo route('index'); ?>"><img src="assets/images/logo/logo.png" alt="" class="w-50"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						เกี่ยวกับคณะวิทยาการจัดการ
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php $menu = $obj_db->content('cat = '.$head_cat[1]['id'].$hide_del_lan_order); 
							foreach ($menu->rows as $key => $value) { ?>
							<a class="dropdown-item" href="<?php echo route('history','active='.$value['id']); ?>"><?php echo $value['lang_name']; ?></a>
						<?php } ?>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						การบริหารคณะวิทยาการจัดการ
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php $menu = $obj_db->cat('parent = '.$head_cat[2]['id'].$hide_del_lan_order);
							foreach ($menu->rows as $key => $value) { ?>
							<a class="dropdown-item" href="<?php echo route('manager','active='.$value['id']); ?>"><?php echo $value['lang_name']; ?></a>
						<?php } ?>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $lan['course']; ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php $menu = $obj_db->cat('parent = 0'.$hide_del_lan_order);
							foreach ($menu->rows as $key => $value) { ?>
							<a class="dropdown-item" href="<?php echo route('index','head_cat_id='.$value['id']); ?>"><?php echo $value['lang_name']; ?></a>
						<?php } ?>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						ผู้สนใจเข้าศึกษา
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php $menu = $obj_db->content('cat = '.$head_cat[3]['id'].$hide_del_lan_order); 
							foreach ($menu->rows as $key => $value) { ?>
							<a class="dropdown-item" href="<?php echo route('students','active='.$value['id']); ?>"><?php echo $value['lang_name']; ?></a>
						<?php } ?>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php 
						$head_menu = $obj_db->cat('ref_id = '.$head_cat[4]['id'].$hide_del_lan_order);  ?>
						<?php echo $head_menu->row['lang_name']; ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a href="https://fms.ssru.ac.th/page/03" rel="nofollow" target="_blank" class="dropdown-item">หลักสูตรการเรียนการสอน</a>
						<a href="https://fms.ssru.ac.th/page/f01" rel="nofollow" target="_blank" class="dropdown-item">คลังข้อมูลสถานประกอบการ</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php 
						$head_menu = $obj_db->cat('ref_id = '.$head_cat[5]['id'].$hide_del_lan_order);  ?>
						<?php echo $head_menu->row['lang_name']; ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php $menu = $obj_db->content('cat = '.$head_cat[5]['id'].$hide_del_lan_order);
							foreach ($menu->rows as $key => $value) { ?>
							<a class="dropdown-item" href="<?php echo $value['link_url']; ?>"><?php echo $value['lang_name']; ?></a>
						<?php } ?>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<?php */ ?>
</div>
