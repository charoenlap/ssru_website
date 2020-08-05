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
				<?php 
				$time_line = $obj_db->content('cat = '.get('id'));
				// print_r($time_line); exit();
				foreach ($time_line->rows as $key => $value) {
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
								<img class="card-img-top" src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="Card image cap">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<?php echo $value['lang_name']; ?>
											<?php echo $value['detail']; ?>
										</div>
									</div>
								</div>
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
				<!-- <div class="row cardtimeline justify-content-center" data-num="2">
					<div class="col-12 col-md-4">
					</div>
					<div class="col-12 col-md-4">
						<div class="card card-shadow border-0">
							<img class="card-img-top" src="assets/images/img02.jpg" alt="Card image cap">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem in, inventore deserunt voluptate sunt, nesciunt dolores a atque aut facere error neque exercitationem officiis earum quis expedita culpa odit ipsa!
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 mt-timeline">
						<hr class="border-1 bg-white w-50">
						<div class="date-timelines rounded-circle">
							<h2>12</h2>
							<span>JAN</span>
						</div>
					</div>
				</div> -->
			</div>
		</div>
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