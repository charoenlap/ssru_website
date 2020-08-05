<html>
<head>
	<?php require_once('inc/head.php'); ?>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/header.php'); ?>

	

	<section class="pt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>คลังข้อมูลสถานประกอบการ</h1>
					<div id="accordion">
							<a href="#" class="cl-link collapsed" data-toggle="collapse" data-target="#collapse_<?php echo $key; ?>" aria-expanded="true" aria-controls="collapse_<?php echo $key; ?>">Lorem ipsum dolor sit amet</a>
							<div id="collapse_<?php echo $key; ?>" class="collapse" aria-labelledby="heading_1" data-parent="#accordion">
								<div class="row">
								
									<div class="col-md-3 mb-2">
										<div class="card card-shadow">
											<div class="card-img-top">
												<img src="http://placehold.it/1200x1080/" alt="" class="w-100 h200">
											</div>
											<div class="card-body">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequatur,
												</p>
											</div>
											<div class="card-footer bg-white">
												<a href="<?php echo route('archives-detail'); ?>" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">อ่านเพื่มเติม</a>
											</div>
										</div>
									</div>
									<div class="col-md-3 mb-2">
										<div class="card card-shadow">
											<div class="card-img-top">
												<img src="http://placehold.it/1200x1080/" alt="" class="w-100 h200">
											</div>
											<div class="card-body">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequatur,
												</p>
											</div>
											<div class="card-footer bg-white">
												<a href="<?php echo route('archives-detail'); ?>" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">อ่านเพื่มเติม</a>
											</div>
										</div>
									</div>
									<div class="col-md-3 mb-2">
										<div class="card card-shadow">
											<div class="card-img-top">
												<img src="http://placehold.it/1200x1080/" alt="" class="w-100 h200">
											</div>
											<div class="card-body">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequatur,
												</p>
											</div>
											<div class="card-footer bg-white">
												<a href="<?php echo route('archives-detail'); ?>" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">อ่านเพื่มเติม</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<!-- <a href="#" class="cl-link collapsed" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" aria-controls="collapse_2">สาขาวิชาคอมพิวเตอร์ธุรกิจ</a>
						<div id="collapse_2" class="collapse" aria-labelledby="heading_2" data-parent="#accordion">
							<div class="row">
								<div class="col-md-12">
									
								</div>
							</div>
						</div> -->

					</div>
				</div>
			</div>
		</div>
	</section>



	




	<!-- footer -->
	<?php
		require_once('inc/footer.php');
		require_once('inc/script.php'); 
	?>
	<script>
		$('#current-student').addClass('active');
	</script>
</body>
</html>