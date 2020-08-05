
<html>
<head>
	<?php require_once('inc/head.php'); ?>
	<link rel="stylesheet" href="assets/css/timeline2.css?v=<?php echo time(); ?>">
</head>
<body class="bg-gradient-timeline">
	<div class="container-fluid">
		<div id="main">
			<div class="bg-timelines"></div>
			<div class="scrollevent">
				<?php $result_timeline_index = $obj_db->content('cat = 1688'.$hide_del_lan_order);
				foreach ($result_timeline_index->rows as $key => $value) {
					$day = date("d", strtotime($value['date']));
					$month = date("M", strtotime($value['date']));
					$year = date("Y", strtotime($value['date'])); ?>
					<div class="row tl-mobile cardtimeline justify-content-center <?php echo $key==0?'active':''; ?>" data-num="<?php echo $key+1; ?>">
						<?php if ($value['position_img'] == "right") { ?>
							<div class="col-12 col-md-4">
								<!-- Empty -->
							</div>
						<?php } ?>
						<div class="col-12 col-md-4">
							<div class="card card-shadow border-0">
								<a href="<?php echo route('news-detail','id='.$value['id']); ?>">
									<?php if ($value['link_url']) { ?>
										<iframe width="100%" height="360" src="<?php echo $value['link_url']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<?php } else { ?>
										<img class="card-img-top" src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="Card image cap">
									<?php } ?>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<?php echo $value['lang_name']; ?>
												<?php echo $value['detail']; ?>
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="date-timelines rounded-circle">
								<h2><?php echo $day; ?></h2>
								<span><?php echo $month; ?></span>
							</div>
						</div>
						<?php if ($value['position_img'] == "left") { ?>
							<div class="col-12 col-md-4">
								<!-- Empty -->
							</div>
						<?php } ?>
						<div class="col-md-12 mt-timeline">
							<hr class="border-1 bg-white w-50">
						</div>
					</div>
				<?php } ?>
				<!-- <div class="row tl-mobile cardtimeline justify-content-center active" data-num="1">
					<div class="col-12 col-md-4">
					</div>
					<div class="col-12 col-md-4">
						<div class="card card-shadow border-0">
							<iframe width="100%" height="360" src="https://www.youtube.com/embed/v2FkxRhMVdE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										VTR คณะวิทยาการจัดการ มหาวิทยาลัยราชภัฏสวนสุนันทา
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4">
					</div>
					<div class="col-md-12 mt-timeline">
						<hr class="border-1 bg-white w-50">
						<div class="date-timelines rounded-circle">
							<h2>08</h2>
							<span>AUG</span>
						</div>
					</div>
				</div>
				<div class="row tl-mobile cardtimeline justify-content-center" data-num="2">
					<div class="col-12 col-md-4">
						<div class="card card-shadow border-0">
							<img class="card-img-top" src="assets/images/ld1.jpg" alt="Card image cap">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										ขอเชิญน้องๆพี่ๆที่สนใจ เข้าร่วมประกวดกระทง ในปีการศึกษา 2561 ในวันลอยกระทง วันที่ 22 พฤศจิกายน 2561 <a href="http://sdd.ssru.ac.th/th/news/view/sddssruloikathongs2018" target="_blank">คลิ๊ก</a>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4">
					</div>
					<div class="col-md-12 mt-timeline">
						<hr class="border-1 bg-white w-50">
						<div class="date-timelines rounded-circle">
							<h2>22</h2>
							<span>NOV</span>
						</div>
					</div>
				</div>
				<div class="row tl-mobile cardtimeline justify-content-center" data-num="3">
					<div class="col-12 col-md-4">
					</div>
					<div class="col-12 col-md-4">
						<div class="card card-shadow border-0">
							<img class="card-img-top" src="assets/images/ld2.jpg" alt="Card image cap">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										ประกาศ เรื่องการเก็บหน่วยชั่วโมงกิจกรรมงานวันลอบกระทง ประจำปี 2561
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 mt-timeline">
						<hr class="border-1 bg-white w-50">
						<div class="date-timelines rounded-circle">
							<h2>22</h2>
							<span>NOV</span>
						</div>
					</div>
				</div> -->
			</div>
			<!-- <div class="row tl-mobile cardtimeline justify-content-center active" data-num="1">
					<div class="col-12 col-md-4">
					</div>
					<div class="col-12 col-md-4">
						<div class="card card-shadow border-0">
							<iframe width="100%" height="360" src="https://www.youtube.com/embed/v2FkxRhMVdE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										VTR คณะวิทยาการจัดการ มหาวิทยาลัยราชภัฏสวนสุนันทา
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4">
					</div>
					<div class="col-md-12 mt-timeline">
						<hr class="border-1 bg-white w-50">
						<div class="date-timelines rounded-circle">
							<h2>08</h2>
							<span>AUG</span>
						</div>
					</div>
				</div> -->
		</div>
	</div>
	<div class="enter-website">
		<a href="<?php echo route('home'); ?>" class="btn btn-primary btn-enter-website shadow-lg">เข้าสู่เว็บไซต์</a>
	</div>

	<div id="button-updown" class="d-none d-sm-block">
		<button class="btn btn-dark rounded-0 w-75"><i class="fa fa-caret-up fa-2x"></i></button>
		<button class="btn btn-dark rounded-0 w-75"><i class="fa fa-caret-down fa-2x"></i></button>
	</div>

	<?php require_once('inc/script.php');  ?>
	<script>
			$(document).ready(function() {
				$('.scrollevent').bind('mousewheel', function(e){
				   console.log(e.originalEvent.detail);
				   console.log(e.originalEvent.deltaY);
				   if (e.originalEvent.deltaY > 60){
				       slideNext(); 
				   } else if (e.originalEvent.deltaY < -60) {
				       slidePrev();
				   }
				});
				// $(".scrollevent").click(function(event) {
				//     $("#text").html('swipe');
				// 	slideNext(); 
				// });
				// $(".scrollevent").dblclick(function() {
				// 	slidePrev();
				// });
				$(window).keydown(function(e) {
					var code = e.keyCode || e.which;
					// console.log(code);
					if(code == 40) { 
						// Down
				       slideNext();
					}
					else if (code == 38) {
						// Top
				       slidePrev();
					}
				});
				function slideNext() {
					var now = parseInt($('.cardtimeline.active').data('num'));
					var next = now+1;
					// Check Max
					if (next <= parseInt($('.cardtimeline').length)) {
						
						$('.cardtimeline').each(function(index, el) {
							var num = $(this).data('num');
							if (num == next) {
								$(this).removeClass('out');
								$(this).addClass('active');
								$(this).removeClass('in');
							} else if (num < next) {
								$(this).removeClass('in');
								$('.cardtimeline').removeClass('active');
								$(this).addClass('out');
							} else if (num > next) {
								// $(this).removeClass('active');
								$(this).removeClass('out');

								// $(this).addClass('in');
							}
						});
					}
				}

				function slidePrev(now) {
					var now = parseInt($('.cardtimeline.active').data('num'));
					var next = now-1;
					if (next > 0) {
						
						$('.cardtimeline').each(function(index, el) {
							var num = $(this).data('num');
							if (num == next) {
								$(this).removeClass('out');
								$(this).addClass('active in');
								// console.log(1);
							} else if (num < next) {
								$(this).removeClass('out');
								$(this).removeClass('in');
								$(this).removeClass('active');
								// $(this).addClass('out');
								// console.log(2);
							} else if (num > next) {
								$(this).removeClass('active');
								$(this).removeClass('in');
								// $(this).addClass('in');
							}
						});
					}
				}

				function loopCheck(next) {
					$('.cardtimeline').each(function(index, el) {
						var num = $(this).data('num');
						if (num == next) {
							$(this).removeClass('out');
							$(this).addClass('active');
						} else if (num < next) {
							$('.cardtimeline').removeClass('active');
							$(this).addClass('out');
						} else if (num > next) {
							// $(this).removeClass('active');
							$(this).removeClass('out');
							// $(this).addClass('in');
						}
					});
				}
			});
		</script>
		<script>
			if ($(window).width() <= 576) {
				$('.tl-mobile').removeClass('cardtimeline');
				$('.tl-mobile').removeClass('justify-content-center');
				$('.tl-mobile').removeClass('active');
			}
		</script>
</body>
</html>