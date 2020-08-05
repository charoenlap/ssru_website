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
					<?php 
					if (get('id')) {
						// echo $hide_del_lan_order;
						$result_one = $obj_db->cat('ref_id = '.get('id').$hide_del_lan_order);
						// $result_research = $obj_db->cat('parent = '.get('id').$hide_del_lan_order);
						$result_research = $obj_db->query("SELECT *, cc.id as id, l.`name` as lang_name FROM sl_content_cat cc LEFT JOIN sl_language_detail l ON l.ref_id = cc.id WHERE cc.hide = 0 AND cc.del = 0 AND cc.parent = ".(int)$_GET['id']." AND l.type = 0 AND l.language_id = ".($_SESSION['lang']=='en'?'2':'1')." ORDER BY seq ASC");
						// print_r($result_research->rows);
					} ?>
					<h1><?php echo $result_one->row['lang_name']; ?></h1>
					<div id="accordion">
						<?php 
						
						foreach ($result_research->rows as $key => $value) { ?>
							<a href="#" class="cl-link collapsed" data-toggle="collapse" data-target="#collapse_<?php echo $key; ?>" aria-expanded="true" aria-controls="collapse_<?php echo $key; ?>"><?php echo $value['lang_name']; ?></a>
							<div id="collapse_<?php echo $key; ?>" class="collapse" aria-labelledby="heading_1" data-parent="#accordion">
								<div class="row">
									<?php 
									// $result_research_detail = $obj_db->content('cat = '.$value['id'].$hide_del_lan_order);
									// echo "SELECT *, cc.id as id, l.`name` as lang_name FROM sl_content c LEFT JOIN sl_language_detail l ON l.ref_id = c.id WHERE c.hide = 0 AND c.del = 0 AND c.cat = ".$value['id']." AND l.language_id = 1 AND l.type = 1 ORDER BY seq ASC";
									$result_research_detail = $obj_db->query("SELECT *, c.id as id, l.`name` as lang_name FROM sl_content c LEFT JOIN sl_language_detail l ON l.ref_id = c.id WHERE c.hide = 0 AND c.del = 0 AND c.cat = ".$value['id']." AND l.language_id = 1 AND l.type = 1 ORDER BY seq ASC");
									foreach ($result_research_detail->rows as $key => $value2) { ?>
										<div class="col-md-3 mb-2">
											<div class="card card-shadow">
												<div class="card-img-top">
													<?php if (!empty($value[$picture1])) { ?>
													<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="" class="w-100 h200">
													<?php } ?>
												</div>
												<div class="card-body">
													<?php echo mb_strimwidth($value2['detail'], 0, 40, "...","utf-8"); ?>
												</div>
												<div class="card-footer bg-white">
													<a href="<?php echo route('research-detail','id='.$value2['id']); ?>" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">อ่านเพื่มเติม</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
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