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
					<a href="<?php echo getpara('lang').'&lang=th&head_cat_id='.$head_cat_id; ?>"><img src="assets/images/th.png" alt="" width="20" class="mr-2"></a>
					<a href="<?php echo getpara('lang').'&lang=en&head_cat_id='.$head_cat_id; ?>"><img src="assets/images/en.png" alt="" width="20"></a>
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
				<a class="navbar-brand" href="index.php">
					<img src="assets/images/logo/logo.png" alt="" class="w-50">
					<?php if ($master_head_cat['id'] != 1) { ?>
						<img src="<?php echo $mdir.'upload/content/'.$master_head_cat['picture1']; ?>" alt="" class="w-50">
					<?php } ?>

				</a>
			</div>
			<?php 
			// $home_cat = $obj_db->cat('parent = '.$_SESSION['head_cat_id'].$hide_del_lan_order)->rows;
			// $home_con = $obj_db->content('cat = '.$_SESSION['head_cat_id'].$hide_del_lan_order)->rows; ?>
			<div class="col-md-9 pl-0">
				<ul class="nav-menu">
					<li id="history" class="dropdown">
						<?php 
						// print_r($head_cat[1]['id']);
						$head_menu = $obj_db->cat('ref_id = '.$head_cat[1]['id'].$hide_del_lan_order); 
						$menu = $obj_db->content('cat = '.$head_cat[1]['id'].$hide_del_lan_order); ?>
						<a href="<?php echo route('history','active='.$menu->row['id']); ?>" class="dropbtn"><?php echo $head_menu->row['lang_name']; ?></a>
						<div class="dropdown-content">
							<?php 
							foreach ($menu->rows as $key => $value) { ?>
								<a href="<?php echo route('history','active='.$value['id']); ?>"><?php echo $value['lang_name']; ?></a>
							<?php } ?>
							<!-- <a href="history.php">ประวัติความเป็นมา</a>
							<a href="#">ปรัชญา วิสัยทัศน์ พันธกิจ</a>
							<a href="#">อัตลักษณ์ เอกลักษณ์</a>
							<a href="#">ติดต่อคณะวิทยาการจัดการ</a> -->
						</div>
					</li>
					<li id="manager" class="dropdown">
						<?php 
						$head_menu = $obj_db->cat('ref_id = '.$head_cat[2]['id'].$hide_del_lan_order); 
						$menu = $obj_db->cat('parent = '.$head_cat[2]['id'].$hide_del_lan_order); ?>
						<a href="<?php echo route('manager','active='.$menu->row['id']); ?>" class="dropbtn"><?php echo $head_menu->row['lang_name']; ?></a>
						<div class="dropdown-content">
							<?php 
							foreach ($menu->rows as $key => $value) { ?>
								<a href="<?php echo route('manager','active='.$value['id']); ?>"><?php echo $value['lang_name']; ?></a>
							<?php } ?>
							<!-- <a href="#">โครงสร้างหน่วยงานภายในคณะฯ</a>
							<a href="manager.php">ผู้บริหาร</a>
							<a href="#">บุคลากรสายวิชาการ</a>
							<a href="#">บุคลากรสายสนับสนุนวิชาการ</a> -->
						</div>
					</li>
					<li class="dropdown">
						<?php 
						// $head_menu = $obj_db->cat('ref_id = '.$head_cat[3]['id'].$hide_del_lan_order);  ?>
						<a href="javascript:void(0)" class="dropbtn"><?php echo $lan['course']; ?></a>
						<div class="dropdown-content">
							<?php 
							$menu = $obj_db->cat('parent = 0'.$hide_del_lan_order);
							foreach ($menu->rows as $key => $value) {
								if ($key!=0) { ?>
									<a href="<?php echo route('act/index','head_cat_id='.$value['id']); ?>"><?php echo $value['lang_name']; ?></a>
								<?php 
								}
							} ?>
							<!-- <a href="<?php echo route('act/index'); ?>" rel="nofollow" target="_blank">สาขาวิชาการบัญชี</a>
                            <a href="http://www.bc.fms.ssru.ac.th/home" rel="nofollow" target="_blank">สาขาวิชาคอมพิวเตอร์ธุรกิจ</a>
                            <a href="http://www.be.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">สาขาวิชาเศรษฐศาสตร์ธุรกิจ</a>
                            <a href="http://www.ib.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">แขนงวิชาธุรกิจระหว่างประเทศ</a>
                            <a href="http://www.fin.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">แขนงวิชาการเงินการธนาคาร</a>
                            <a href="http://www.hrm.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">แขนงวิชาการบริหารทรัพยากรมนุษย์</a>
                            <a href="http://www.market.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">แขนงวิชาการตลาด</a>
                            <a href="http://www.bsm.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">แขนงวิชาการจัดการธุรกิจบริการ</a>
                            <a href="http://www.ents.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">แขนงวิชาการประกอบการธุรกิจ</a>
                            <a href="http://www.prr.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">แขนงวิชาการประชาสัมพันธ์และการสื่อสารองค์กร</a>
                            <a href="http://www.jrc.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">แขนงวิชาวารสารศาสตร์</a>
                            <a href="http://www.aim.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">สาขาวิชาการโฆษณาและการสื่อสารการตลาด</a>
                            <a href="http://www.brt.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">แขนงวิชาวิทยุกระจายเสียงและวิทยุโทรทัศน์</a>
                            <a href="http://www.cfd.fms.ssru.ac.th/th/home" rel="nofollow" target="_blank">แขนงวิชาภาพยนตร์และสื่อดิจิทัล</a> -->
						</div>
					</li>
					<li id="students" class="dropdown">
						<?php 
						$head_menu = $obj_db->cat('ref_id = '.$head_cat[3]['id'].$hide_del_lan_order); 
						$menu = $obj_db->content('cat = '.$head_cat[3]['id'].$hide_del_lan_order); ?>
						<a href="<?php echo route('students','id='.$menu->row['id']); ?>" class="dropbtn"><?php echo $head_menu->row['lang_name']; ?></a>
						<div class="dropdown-content">
							<?php 
							foreach ($menu->rows as $key => $value) { ?>
								<a href="<?php echo route('students','active='.$value['id']); ?>"><?php echo $value['lang_name']; ?></a>
							<?php } ?>
							<!-- <a href="students.php">การสมัครเข้าศึกษาต่อ</a>
							<a href="students.php">ค่าธรรมเนียม / ค่าใช้จ่ายในการศึกษา</a> -->
						</div>
					</li>
					<li id="current-student" class="dropdown">
						<?php 
						$head_menu = $obj_db->cat('ref_id = '.$head_cat[4]['id'].$hide_del_lan_order);
						$menu = $obj_db->cat('parent = '.$head_cat[4]['id'].$hide_del_lan_order);  ?>
						<a href="javascript:void(0)" class="dropbtn"><?php echo $head_menu->row['lang_name']; ?></a>
						<div class="dropdown-content">
							<?php 
							foreach ($menu->rows as $key => $value) { ?>
								<a href="<?php echo route('curriculum','id='.$value['id']); ?>"><?php echo $value['lang_name']; ?></a>

							<?php } ?>
							<!-- <a href="#">ภาคปกติ</a>
							<a href="#">การจัดการศึกษาภาคพิเศษ โครงการภาคสมทบคณะวิทยาการจัดการ</a>
							<a href="#">โครงการจัดการศึกษาภาคพิเศษนิเทศศาสตร์</a>
							<a href="#">ภาคพิเศษ (เสาร์ – อาทิตย์)</a>
							<a href="#">สาขาวิชานิเทศศาสตร์</a> -->
						</div>
					</li>
					<li id="research" class="dropdown">
						<?php 
						$head_menu = $obj_db->cat('ref_id = '.$head_cat[5]['id'].$hide_del_lan_order);  ?>
						<a href="<?php echo route('research') ?>" class="dropbtn"><?php echo $head_menu->row['lang_name']; ?></a>
						<div class="dropdown-content">
							<!-- <?php $menu = $obj_db->content('cat = '.$head_cat[5]['id'].$hide_del_lan_order);
							foreach ($menu->rows as $key => $value) { ?>
								<a href="<?php echo $value['link_url']; ?>"><?php echo $value['lang_name']; ?></a>
							<?php } ?> -->
						<!-- <a href="#">ICMSIT 2018</a>
						<a href="#">AEC 2018 JAPAN</a>
						<a href="#">ACE-2017 France</a> -->
						</div>
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
</div>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light nav-custom">
		<div class="container">
				<a class="navbar-brand w-120px mr-5" href="index.html"><img src="assets/images/logo/logo.png" alt="" class="w-100"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
						<ul class="nav-menu">
								<li class="dropdown active">
										<a href="javascript:void(0)" class="dropbtn">เกี่ยวกับคณะวิทยาการจัดการ</a>
										<div class="dropdown-content">
												<a href="#">ประวัติความเป็นมา</a>
												<a href="#">ปรัชญา วิสัยทัศน์ พันธกิจ</a>
												<a href="#">อัตลักษณ์ เอกลักษณ์</a>
												<a href="#">ติดต่อคณะวิทยาการจัดการ</a>
										</div>
								</li>
								<li class="dropdown">
										<a href="javascript:void(0)" class="dropbtn">การบริหารคณะวิทยาการจัดการ</a>
										<div class="dropdown-content">
												<a href="#">โครงสร้างหน่วยงานภายในคณะฯ</a>
												<a href="#">ผู้บริหาร</a>
												<a href="#">บุคลากรสายวิชาการ</a>
												<a href="#">บุคลากรสายสนับสนุนวิชาการ</a>
										</div>
								</li>
								<li class="dropdown">
										<a href="javascript:void(0)" class="dropbtn">หลักสูตร</a>
										<div class="dropdown-content">
												<a href="#">สาขาวิชาการบัญชี</a>
												<a href="#">สาขาวิชาเศรษฐศาสตรธุรกิจ</a>
												<a href="#">สาขาวิชาคอมพิวเตอร์ธุรกิจ</a>
												<a href="#">สาขาวิชาบริหารธุรกิจ</a>
												<a href="#">สาขาวิชานิเทศศาสตร์</a>
										</div>
								</li>
								<li class="dropdown">
										<a href="javascript:void(0)" class="dropbtn">ผู้สนใจเข้าศึกษา</a>
										<div class="dropdown-content">
												<a href="#">การสมัครเข้าศึกษาต่อ</a>
												<a href="#">ค่าธรรมเนียม / ค่าใช้จ่ายในการศึกษา</a>
										</div>
								</li>
								<li class="dropdown">
										<a href="javascript:void(0)" class="dropbtn">นักศึกษาปัจจุบัน</a>
										<div class="dropdown-content">
												<a href="#">ภาคปกติ</a>
												<a href="#">การจัดการศึกษาภาคพิเศษ โครงการภาคสมทบคณะวิทยาการจัดการ</a>
												<a href="#">โครงการจัดการศึกษาภาคพิเศษนิเทศศาสตร์</a>
												<a href="#">ภาคพิเศษ (เสาร์ – อาทิตย์)</a>
												<a href="#">สาขาวิชานิเทศศาสตร์</a>
										</div>
								</li>
								<li class="dropdown">
										<a href="javascript:void(0)" class="dropbtn">งานวิจัย</a>
										<div class="dropdown-content">
												<a href="#">ICMSIT 2018</a>
												<a href="#">AEC 2018 JAPAN</a>
												<a href="#">ACE-2017 France</a>
										</div>
								</li>
						</ul>
				</div>
		</div>
</nav> -->