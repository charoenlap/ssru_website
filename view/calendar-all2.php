<html>
<head>
	<?php require_once('inc/head.php'); ?>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/header.php'); ?>

	

	<!-- content -->
	<section class="bg-portfolio">
		<div class="container py-5">
			<div class="row">
				<?php 
				$result_calendar = $obj_db->content('cat = 29'.$hide_del_lan_order);
				// print_r($result_calendar);
				foreach ($result_calendar->rows as $key => $value) {
				$day = date("d", strtotime($value['calendar_day']));
				$month = date("M", strtotime($value['calendar_day']));
				$year = date("Y", strtotime($value['calendar_day']));
				 ?>
				<div class="col-md-3 mb-4">
					<div class="cal">
						<a href="<?php echo route('calendar-detail','id='.$value['id']) ?>" target="_blank">
							<div class="overflow">
								<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="" class="w-100" id="cal-img<?php echo $key; ?>">
							</div>
							<span class="right-event">
								<span class="fold">
									<span class="day"><?php echo $day ?></span>
									<span class="month"><?php echo $month; ?></span>
									<span class="year"><?php echo $year; ?></span>
								</span>
							</span>
							<div class="content-cal">
								<h6><?php echo mb_strimwidth($value['lang_name'], 0, 40, "...","utf-8"); ?></h6>
							</div>
						</a>
					</div>
				</div>
				<?php } ?>
				<!-- <div class="col-md-3 mb-4">
					<div class="cal">
						<a href="">
							<div class="overflow">
								<img src="http://placehold.it/1200x1080/" alt="" class="w-100" id="cal-img1">
							</div>
							<span class="right-event">
								<span class="fold">
									<span class="day">28</span>
									<span class="month">Jan</span>
									<span class="year">2018</span>
								</span>
							</span>
							<div class="content-cal">
								<h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h6>
							</div>
						</a>
					</div>
				</div> -->
			</div>
		</div>		
	</section>



	




	<!-- footer -->
	<?php
		require_once('inc/footer.php');
		require_once('inc/script.php'); 
	?>
	<script>
		<?php 
		$result_calendar = $obj_db->content('cat = 29'.$hide_del_lan_order);
		foreach ($result_calendar->rows as $key => $value) { ?>
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
</body>
</html>