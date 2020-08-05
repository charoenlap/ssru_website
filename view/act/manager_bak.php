<html>
<head>
	<?php require_once('inc/act/head.php'); ?>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/act/header.php'); ?>

	

	<!-- content -->
	<?php $manager = $obj_db->cat('parent = '.$head_cat[2]['id'].$hide_del_lan_order); ?>
	<div class="bg-theme">
		<div class="container">
			<div class="col-md-12 text-center">
				<h3 class="text-white mb-0">คณาจารย์ประจำสาขา</h3>
			</div>
		</div>
	</div>

	
		<?php foreach ($manager->rows as $key_head => $value) {
			// print_r($value); exit();
			if ($key_head == 1) {  ?>
				<div style="background: url(<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>); background-size: cover;">
					<div class="container">
						<div class="fh-page pt-5">
							<div class="row">
								<?php 
								$managers = $obj_db->cat('parent = '.$value['id'].$hide_del_lan_order);
								foreach ($managers->rows as $key => $value) { ?>
									<div class="col-6 col-md-3 text-center wow fadeInUp" data-wow-duration="1s">
										<div class="flip-box">
											<div class="flip-box-inner">
												<div class="flip-box-front">
													<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="Paris" class="w-100 height-flip-box">
													<label for="" class="text-dark"><?php echo $value['lang_name']; ?></label>
												</div>
												<div class="flip-box-back">
													<div class="flip-content-center">
														<p><?php echo $value['lang_name']; ?></p>
														<!-- <a href="<?php echo route('management','id='.$value['id']); ?>" class="text-white" target="_blank">
															อ่านเพิ่มเติม
														</a> -->
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>

				



	




	<!-- footer -->
	<?php
		require_once('inc/act/footer.php');
		require_once('inc/act/script.php'); 
	?>
	<script>
		$('#manager').addClass('active');
	</script>
	
</body>
</html>