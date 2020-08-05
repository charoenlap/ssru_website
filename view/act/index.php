<html>
<head>
	<?php require_once('inc/act/head.php'); ?>
	<style>
		@media (min-width: 1200px){
			.fixed-height-banner {
			    height: auto !important;
			}
		}

	</style>
</head>
<body>
	<?php require_once('inc/act/header.php'); ?>

	<?php
	// print_r($head_cat);
	$home_cat = $obj_db->cat('parent = '.$head_cat[0]['id'].$hide_del_lan_order)->rows;
	$home_con = $obj_db->content('cat = '.$head_cat[0]['id'].$hide_del_lan_order)->rows;
	// print_r($home_con);

	$link_share = route('news-detail');
	// echo $home_cat_id;
	// print_r($home_con);
	 ?>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<?php $banner = $obj_db->getdata('content_pic','pid = '.$home_con[0]['id']);
			foreach ($banner->rows as $key => $value) { ?>
			<div class="carousel-item <?php echo $key==0?'active':''; ?>">
				<a href="">  
					<img class="d-block w-100 fixed-height-banner" src="<?php echo $mdir.'upload/gallery/'.$value[$picture1]; ?>" alt="First slide">
					<!-- <img class="d-block w-100 height-banner" src="assets/images/banner/bannernew.jpg" alt="First slide"> -->
					<div class="ov-banner"></div>
				</a>
			</div>
			<ol class="carousel-indicators">
				<?php foreach ($banner->rows as $key => $value) { ?>
					<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key; ?>" class="<?php echo $key==0?'active':''; ?>"></li>
				<?php } ?>
			</ol>
			<?php } ?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<section class="position-relative" id="page_course">
		<?php $lugsood = $obj_db->cat('ref_id = '.$head_cat[1]['id'].$hide_del_lan_order); ?>
		<img src="<?php echo $mdir.'upload/content/'.$lugsood->row[$picture1]; ?>" alt="" class="w-100">
		<!-- <div class="overlay-banner-one">
			<h1>หลักสูตรบัญชีบัณฑิต</h1>
			<h1>หลักสูตรปรับปรุง</h1>
			<h1>พ.ศ. 2559</h1>
		</div>
		<div class="overlay-banner-two">
			<h1>ชื่อสถาบันอุดมศึกษา <small>มหาวิทยาลับราชภัฎสวนสุนันทา</small></h1>
			<h1>คณะ/วิทยาเขต/ภาควิชา <small>คณะวิทยาการจัดการ</small></h1>
			<br>
			<h1>หมวดที่ 1 ข้อมูลทั่วไป</h1>
			<br>
			<h1>รหัสและชื่อหลักสูตร</h1>
			<h1><small>ภาษาไทย : หลักสูตรบัญชีบัณฑิต</small></h1>
			<h1><small>ภาษาอังกฤษ : Bachelor of Accountancy Program</small></h1>
			<br>
			<h1>ชื่อปริญญาและสาขาวิชา</h1>
			<h1><small>ชื่อเต็ม (ภาษาไทย) : บัญชีบัณฑิติ</small></h1>
			<h1><small>ชื่อย่อ (ภาษาไทย) : บช.บ.</small></h1>
			<h1><small>ชื่อเต็ม (ภาษาอังกฤษ) : Bachelor of Accountancy</small></h1>
			<h1><small>ชื่อย่อ (ภาษาอังกฤษ) : B.Acc.</small></h1>
			<br>
			<h1>จำนวนหน่วยกิตที่เรียนตลอดหลักสูตร</h1>
			<h1><small>ไม่น้อยกว่า 129 หน่วยกิต</small></h1>
		</div> -->
		<div class="btn-overlay">
			<a href="<?php echo route('act/course'); ?>"><?php echo $lan['read_more']; ?></a>
		</div>
	</section>
	<!-- <?php 
	$event = $obj_db->cat('ref_id = '.$head_cat[1]['id'].$hide_del_lan_order)->row;
	// print_r($head_cat[0]['lang_name']); ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12 pt-4 pb-4 text-center">
					<h5 class="text-uppercase"><?php echo $head_cat[0]['lang_name']; ?></h5>
					<p class="mb-0"><?php echo cut_tag_p($event['detail']); ?> <a href="<?php echo route('act/news-detail','id='.$event['id']); ?>"> <?php echo $lan['read_more']; ?></a></p>
				</div>
			</div>
		</div>
	</section> -->
	<?php 
	// print_r($home_con); ?>
	<section class="bg-calendar-in">
		<div class="container">
			<?php $news = $obj_db->cat('ref_id = '.$home_cat[0]['id'].$hide_del_lan_order); ?>
			<div class="row">
				<div class="col-md-12 text-center">
					<h5 class="text-white mb-0 text-uppercase"><?php echo $news->row['lang_name']; ?></h5>
				</div>
			</div>
		</div>	
	</section>
	<section class="border-top-or wow fadeInUp" data-wow-duration="1s" style="border-top: 0;">
		<div class="container">
			<div class="row">
				<?php 
				if (!empty($home_cat[0]['id'])) { ?>
				<?php $news = $obj_db->cat('parent = '.$home_cat[0]['id'].$hide_del_lan_order);
				$news_reserv_tab = $news; ?>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
								<?php foreach ($news->rows as $key => $value) { ?>
								<li class="nav-item w-mobile">
									<a class="nav-link tab-four mb-0 <?php echo $key==0?'active':''; ?>" id="pills-home-tab_<?php echo $key; ?>" data-toggle="pill" href="#pills-home_<?php echo $key; ?>" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo $value['lang_name']; ?></a>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 bg-gray pt-3 margin-top-12">
						<!-- <div class="col-md-12 bg-gray pt-3 margin-top-12 h-content-tab"> -->
							<div class="tab-content" id="pills-tabContent">
								<?php foreach ($news->rows as $key => $value) {
								$i++; ?>
								<div class="tab-pane fade show <?php echo $key==0?'active':''; ?>" id="pills-home_<?php echo $key; ?>" role="tabpanel" aria-labelledby="pills-home-tab_<?php echo $key; ?>">
									<?php 
									$news_temp = array();
									$news_content = $obj_db->content('cat = '.$value['id'].$hide_del_lan_order_last.' LIMIT 5');
									foreach ($news_content->rows as $key => $value) {
										$news_temp[$value['time'].$key+1] = $value;
									}
									$check_branch = $obj_db->getdata('share_content','branch_id = '.$head_cat_id.' and type_name = "news"');
									foreach ($check_branch->rows as $key => $value) {
										$result = $obj_db->content('ref_id = '.$value['content_id'].' and hide = 0 and del = 0 and language_id = '.$lang_no);
										if ($result->num_rows) {
											$news_temp[$value['time'].$key] = $result->row;
										}
									}
									// print_r($check_branch);
									rsort($news_temp);
									$news_temp = array_slice($news_temp, 0,5);
									// print_r($news_temp);
									 ?>
									<div class="row pb-3">
										<div class="col-md-12">
											<div class="hover-readmore">
												<!-- <img src="" alt="" class="w-100 hr-images height470"> -->
												<div style="background:url('<?php echo $mdir.'upload/content/'.$news_temp[0][$picture1]; ?>');background-size:cover;background-position:top center;" class="w-100 hr-images height470"></div>
												<div class="hr-overlay">
													<a href="<?php echo route('act/news-detail','id='.$news_temp[0]['id']); ?>" class="hr-text" target="_blank"><?php echo $lan['read_more']; ?></a>
													<br>
													<div class="fb-share-button hr-share" data-href="<?php echo $link_share.'&id='.$value['id']; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<?php 
										unset($news_temp[0]);
										foreach ($news_temp as $key => $value) { ?>
										<div class="col-md-3">
											<div class="hover-readmore">
												<!-- <img src="" alt="" class="w-100 hr-images h150"> -->
												<div style="background:url('<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>');background-size:cover;background-position:center;" class="w-100 hr-images h150"></div>
												<div class="hr-overlay">
													<a href="<?php echo route('act/news-detail','id='.$value['id']); ?>" class="hr-text" target="_blank"><?php echo $lan['read_more']; ?></a>
													<br>
													<div class="fb-share-button hr-share" data-href="<?php echo $link_share.'&id='.$value['id']; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"></div>
												</div>
											</div>
											<label for=""><?php echo mb_strimwidth($value['lang_name'], 0, 40, "...","utf-8"); ?></label>
										</div>
										<?php } ?>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<a href="<?php echo route('act/news','id='.$home_cat[0]['id']); ?>"><?php echo $lan['read_more']; ?></a>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<nav>
								<div class="nav nav-tabs mt-2" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active tab-right" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Post</a>
									<a class="nav-item nav-link tab-right" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Popular</a>
									<a class="nav-item nav-link tab-right" id="nav-facebook-tab" data-toggle="tab" href="#nav-facebook" role="tab" aria-controls="nav-facebook" aria-selected="false">Facebook</a>
								</div>
							</nav>
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="row">
										<?php 
										$news_temp = array();
										foreach ($news_reserv_tab->rows as $key => $value) {
											$temp = $obj_db->content('cat = '.$value['id'].$hide_del_lan_order)->rows; 
											// print_r($temp);exit();
											foreach ($temp as $key => $value) {
												$news_temp[$value['time'].$key+1] = $value;
											}
										} 
										$check_branch = $obj_db->getdata('share_content','branch_id = '.$head_cat_id.' and type_name = "news"');
										foreach ($check_branch->rows as $key => $value) {
											$result = $obj_db->content('ref_id = '.$value['content_id'].' and hide = 0 and del = 0 and language_id = '.$lang_no);
											if ($result->num_rows) {
												$news_temp[$value['time'].$key+1] = $result->row;
											}
										}
										// print_r($check_branch);
										rsort($news_temp);
										$news_temp = array_slice($news_temp, 0,3);
										?>
										<?php foreach ($news_temp as $key => $value) { ?>
											<div class="col-md-12 py-2">
												<div class="hover-readmore">
													<!-- <img src="" alt="" class="w-100 hr-images h180"> -->
													<div style="background:url('<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>');background-size:cover;background-position:center;" class="w-100 hr-images h180"></div>
													
													<div class="hr-overlay">
														<a href="<?php echo route('act/news-detail','id='.$value['id']); ?>" class="hr-text">Read More</a>
														<br>
														<div class="fb-share-button hr-share" data-href="<?php echo $link_share.'&id='.$value['id']; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"></div>
													</div>
												</div>
												<label for=""><?php echo mb_strimwidth($value['lang_name'], 0, 70, "...","utf-8"); ?></label>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
									<div class="row">
										<?php 
										// $temp_cat = '(';
										// $news = $obj_db->cat('parent = '.$home_cat[0]['id'].$hide_del_lan_order);
										// foreach ($news->rows as $key => $value) {
										// 	$temp_cat .= $value['id'].',';
										// }
										// $temp_cat = substr($temp_cat, 0,-1).')';
										// $news_popular = $obj_db->getdata('content','del=0 and cat in '.$temp_cat.' order by view desc limit 3');
										$news_popular = $obj_db->content('view <> 0'.$hide_del_lan_order.' limit 3');
										// print_r($news_popular);
										foreach ($news_popular->rows as $key => $value) {
											// $news_data = $obj_db->content('ref_id = '.$value['id'].$hide_del_lan_order)->row; ?>
											<div class="col-md-12 py-2">
												<div class="hover-readmore">
													<!-- <img src="" alt="" class="w-100 hr-images h180"> -->
													<div style="background:url('<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>');background-size:cover;background-position:center;" class="w-100 hr-images h180"></div>
													<div class="hr-overlay">
														<a href="<?php echo route('act/news-detail','id='.$value['id']); ?>" class="hr-text" target="_blank">Read More</a>
														<br>
														<div class="fb-share-button hr-share" data-href="<?php echo $link_share.'&id='.$value['id']; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"></div>
													</div>
												</div>
												<label for=""><?php echo $value['lang_name']; ?></label>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-facebook" role="tabpanel" aria-labelledby="nav-facebook-tab">
									<div class="row">
										<div class="col-md-12 py-2">
											<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffmsssrubbk%2F&tabs=timeline&width=260&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="260" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	

	<section class="bg-calendar-in">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h5 class="text-white mb-0 text-uppercase"><?php echo $lan['calendar']; ?></h5>
				</div>
			</div>
		</div>	
	</section>

	<section class="border-bottom-gray py-5 wow fadeInUp" data-wow-duration="2s">
		<div class="container">
			<div class="row">
				<?php 
				$news_temp = array();
				$calendar = $obj_db->content('cat = '.$home_cat[1]['id'].' and hide = 0 and del = 0 and language_id = '.$lang_no.' ORDER BY calendar_day ASC LIMIT 4');
				foreach ($calendar->rows as $key => $value) {
					$news_temp[$value['time'].$key+1] = $value;
				}
				$check_branch = $obj_db->getdata('share_content','branch_id = '.$head_cat_id.' and type_name = "calendar"');
				foreach ($check_branch->rows as $key => $value) {
					$calendar = $obj_db->content('ref_id = '.$value['content_id'].' and hide = 0 and del = 0 and language_id = '.$lang_no);
					if ($calendar->num_rows) {
						$news_temp[$value['time'].$key+1] = $calendar->row;
					}
				}
				// print_r($check_branch);
				rsort($news_temp);
				$new_calendar = array_slice($news_temp, 0,4);

				foreach ($new_calendar as $key => $value) {
					$day = date("d", strtotime($value['calendar_day']));
					$month = date("M", strtotime($value['calendar_day']));
					$year = date("Y", strtotime($value['calendar_day'])); ?>
					<div class="col-md-3 mb-2">
						<div class="cal">
							<a href="<?php echo route('act/calendar-detail','id='.$value['id']); ?>" target="_blank">
								<div class="overflow">
									<!-- <img src="" alt="" class="w-100" id="cal-img<?php echo $key; ?>"> -->
									<div style="background:url('<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>');background-size:cover;background-position:top center;height:100%;" class="w-100" id="cal-img<?php echo $key; ?>"></div>
								</div>
								<span class="right-event">
									<span class="fold">
										<span class="day"><?php echo $day ?></span>
										<span class="month"><?php echo $month; ?></span>
										<span class="year"><?php echo $year; ?></span>
									</span>
								</span>
								<div class="content-cal">
									<h6><?php echo $value['lang_name']; ?></h6>
								</div>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-md-12 text-right">
					<a href="<?php echo route('act/calendar-all') ?>"><?php echo $lan['read_more']; ?></a>
				</div>
			</div>
		</div>
	</section>

	<?php 
	// echo $home_cat[2]['id'];
	if (!empty($home_cat[2]['id'])) {
		$vdo = $obj_db->cat('ref_id = '.$home_cat[2]['id'].$hide_del_lan_order)->row;
		 ?>
		<section class="wow fadeInUp" data-wow-duration="3s">
			<div class="text-title mb-3">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="text-uppercase text-white"><?php echo $vdo['lang_name'] ?></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<?php 
					$vdos = $obj_db->cat('parent = '.$vdo['id'].$hide_del_lan_order)->rows;
					// print_r($vdos);

					$get_cat_vdo = 'cat IN (';
					foreach ($vdos as $key => $value) {
						$get_cat_vdo .=	$value['id'].',';
					}
					
					$get_cat_vdo = substr($get_cat_vdo, 0,-1).')';
					$vdos = $obj_db->getdata('content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id',$get_cat_vdo.' and del = 0 and hide = 0 and type = 1 and language_id = 1 order by sl_content.id desc','','','3');
					// print_r($vdos);

					$vdos_temp_id = 'ref_id IN (';
					foreach ($vdos->rows as $key => $value) {
						$vdos_temp_id .= $value['ref_id'].',';
					}
					$check_branch = $obj_db->getdata('share_content','branch_id = '.$head_cat_id.' and type_name = "channel"');
					foreach ($check_branch->rows as $key => $value) {
						$channel = $obj_db->content('ref_id = '.$value['content_id'].' and hide = 0 and del = 0 and language_id = '.$lang_no);
						if ($channel->num_rows) {
							$vdos_temp_id .= $channel->row['id'].',';
						}
					}
					$vdos_temp_id = substr($vdos_temp_id, 0,-1).')';
					// echo $vdos_temp_id;
					$vdos = $obj_db->content($vdos_temp_id.' and hide = 0 and del = 0 and language_id = '.$lang_no.' limit 3');
					// print_r($check_branch);
					shuffle($vdos_temp);

					// $vdos = $vdos_temp;
					foreach ($vdos->rows as $key => $value) { ?>
						<div class="col-md-4 text-center">
							<div class="pretty-embed" data-pe-videoid="<?php echo $value['link_url']; ?>" data-pe-fitvids="true"></div>
							<label for=""><?php echo $value['name']; ?></label>
						</div>
					<?php } ?>
				</div>
				<div class="row mb-3">
					<div class="col-md-12 text-right">
						<a href="<?php echo route('act/video-all','id='.$vdo['id']); ?>"><?php echo $lan['read_more']; ?></a>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>

	<?php
		require_once('inc/act/footer.php');
		require_once('inc/act/script.php'); 
	?>
	<script>
		$().prettyEmbed({ useFitVids: true });
		<?php 
		$calendar = $obj_db->content('cat = '.$home_cat[1]['id'].' and hide = 0 and del = 0 and language_id = '.$lang_no.' ORDER BY calendar_day ASC LIMIT 4');
		foreach ($calendar->rows as $key => $value) { ?>
		moveHover("#cal-img<?php echo $key; ?>");

		<?php } ?>

		function moveHover(id) {
			var d = $(window);
			var bg = $(id);
			    
			bg.mousemove(function(event) {
			    var xPos = event.pageX;
			    var yPos = event.pageY;

			    var w = d.width();
			    var h = d.height();
			  
		      	var xShift = ((w/2 - xPos)/w*2)* 10;
			    var yShift = ((h/2 - yPos)/h*2) * 10;
			    
				bg.css('transform','translate3d(' + xShift + '%, ' + yShift + '%, ' + 0 + ') scale(1.1)' );

			});

		}
	</script>

	<script>
		$('#history').addClass('active');
	</script>
</body>
</html>