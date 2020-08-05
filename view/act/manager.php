<html>
<head>
	<?php require_once('inc/act/head.php'); ?>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/act/header.php'); ?>

	

	<!-- content -->
	<div class="bg-theme">
		<div class="container">
			<div class="col-md-12 text-center">
				<h3 class="text-white mb-0"><?php echo $lan['faculty']; ?></h3>
			</div>
		</div>
	</div>
	
	<?php 
	if ($_SESSION['head_cat_id'] == 2249) {
		$cat_person_branch = 120;
	} else if($_SESSION['head_cat_id'] == 3066) {
		$cat_person_branch = 305;
	} else if($_SESSION['head_cat_id'] == 3067) {
		$cat_person_branch = 838;
	} else if($_SESSION['head_cat_id'] == 3141) {
		$cat_person_branch = 894;
	} else if($_SESSION['head_cat_id'] == 3142) {
		$cat_person_branch = 659;
	} else if($_SESSION['head_cat_id'] == 3143) {
		$cat_person_branch = 508;
	} else if($_SESSION['head_cat_id'] == 3190) {
		$cat_person_branch = 930;
	} else if($_SESSION['head_cat_id'] == 3191) {
		$cat_person_branch = 966;
	} else if($_SESSION['head_cat_id'] == 3192) {
		$cat_person_branch = 1063;
	} else if($_SESSION['head_cat_id'] == 3193) {
		$cat_person_branch = 1017;
	} else if($_SESSION['head_cat_id'] == 3194) {
		$cat_person_branch = 1119;
	} else if($_SESSION['head_cat_id'] == 3195) {
		$cat_person_branch = 1155;
	} else if($_SESSION['head_cat_id'] == 3196) {
		$cat_person_branch = 1191;
	} else if($_SESSION['head_cat_id'] == 3309) {
		$cat_person_branch = 417;
	}
	?>
	
	<div style="background: url(); background-size: cover;">
		<div class="container">
			<div class="fh-page pt-5">
				<div class="row">
					<?php 
					$managers = $obj_db->cat('parent = '.$cat_person_branch.$hide_del_lan_order);
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
											<p><?php echo $value['detail']; ?></p>
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