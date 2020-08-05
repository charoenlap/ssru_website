<html>
<head>
	<?php require_once('inc/head.php'); ?>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/header.php'); ?>

	<?php 
	// $hisroty_cat = $obj_db->cat('parent = '.$head_cat[1]['id'].$hide_del_lan_order)->rows;
	// $hisroty_con = $obj_db->content('cat = '.$head_cat[1]['id'].$hide_del_lan_order)->rows; ?>

	

	<!-- content -->

	<section class="bg-gray pt-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-pills mb-2 justify-content-center" id="pills-tab" role="tablist">
								<?php $manager_profile = $obj_db->content('cat = '.$head_cat[1]['id'].$hide_del_lan_order);
								foreach ($manager_profile->rows as $key => $value) { ?>
								<li class="nav-item w-mobile">
									<a class="nav-link tab-four mb-0 shadow-lg <?php echo $value['id']==get('active')?'active':''; ?>" id="h-01" data-toggle="pill" href="#historyphp_<?php echo $key; ?>" role="tab" aria-controls="historyphp_<?php echo $key; ?>" aria-selected="true"><?php echo $value['lang_name']; ?></a>
								</li>
								<?php } ?>
							</ul>
							<!-- <div class="nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<?php $manager_profile = $obj_db->content('cat = '.$head_cat[1]['id'].$hide_del_lan_order);
								foreach ($manager_profile->rows as $key => $value) { ?>
									<a class="nav-link tab-two <?php echo $value['id']==get('active')?'active':''; ?>" id="h-01" data-toggle="pill" href="#historyphp_<?php echo $key; ?>" role="tab" aria-controls="historyphp_<?php echo $key; ?>" aria-selected="true"><?php echo $value['lang_name']; ?></a>
								<?php } ?>
								<a class="nav-link tab-two active" id="h-01" data-toggle="pill" href="#history01" role="tab" aria-controls="history01" aria-selected="true">ประวัติความเป็นมา</a>
								<a class="nav-link tab-two" id="h-02" data-toggle="pill" href="#history02" role="tab" aria-controls="history02" aria-selected="false">ปรัชญา วิสัยทัศน์ พันธกิจ</a>
								<a class="nav-link tab-two" id="h-03" data-toggle="pill" href="#history03" role="tab" aria-controls="history03" aria-selected="false">อัตลักษณ์ เอกลักษณ์</a>
								<a class="nav-link tab-two" id="h-04" data-toggle="pill" href="#history04" role="tab" aria-controls="history04" aria-selected="false">ติดต่อคณะวิทยาการจัดการ</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<div class="tab-content" id="v-pills-tabContent">
		<?php foreach ($manager_profile->rows as $key => $value) { ?>
		<div class="tab-pane fade show <?php echo $value['id']==get('active')?'active':''; ?>" id="historyphp_<?php echo $key; ?>" role="tabpanel" aria-labelledby="h-01">
			<div style="background: url(<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>); background-repeat: no-repeat; background-size: 100% 100%;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="bg-portfolio pt-5">
								<div class="">
									<?php echo cut_tag_p($value['detail']); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>


	




	<!-- footer -->
	<?php
		require_once('inc/footer.php');
		require_once('inc/script.php'); 
	?>
	<script>
		$('#history').addClass('active');
	</script>

</body>
</html>