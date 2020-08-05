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
				<h3 class="text-white mb-0"><?php echo $lan['knowledge']; ?></h3>
			</div>
		</div>
	</div>
	<?php 
	$saranaroo = $obj_db->cat('ref_id = '.$head_cat[2]['id'].$hide_del_lan_order);
	// print_r($saranaroo);
	$saranaroo_detail = $obj_db->content('cat = '.$head_cat[2]['id'].$hide_del_lan_order);
	 ?>
	
	<section class="wow fadeInup mt-4 mb-5" data-wow-duration="1s"">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<img src="<?php echo $mdir.'upload/content/'.$saranaroo->row[$picture1]; ?>" alt="" class="w-100">
				</div>
			</div>
		</div>
	</section>
	
	<section class="wow fadeInup bg-theme p-4" data-wow-duration="2s">
		<div class="container">

			<div class="row">
				<?php foreach ($saranaroo_detail->rows as $key => $value) { ?>
					<div class="col-md-6">
						<h4 class="text-white"><?php echo $value['lang_name']; ?></h4>
						<p class="text-white"><?php echo cut_tag_p($value['detail']); ?></p>
					</div>
				<?php } ?>
				<!-- <div class="col-md-6">
					<h4 class="text-white">Q : Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
					<p class="text-white">A : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident debitis alias ullam iure ipsa consequuntur, tempora. Dignissimos ad, ipsam, recusandae fugit, libero voluptates soluta, ea itaque voluptatem inventore sequi optio.</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-white">Q : Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
					<p class="text-white">A : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident debitis alias ullam iure ipsa consequuntur, tempora. Dignissimos ad, ipsam, recusandae fugit, libero voluptates soluta, ea itaque voluptatem inventore sequi optio.</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-white">Q : Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
					<p class="text-white">A : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident debitis alias ullam iure ipsa consequuntur, tempora. Dignissimos ad, ipsam, recusandae fugit, libero voluptates soluta, ea itaque voluptatem inventore sequi optio.</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-white">Q : Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
					<p class="text-white">A : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident debitis alias ullam iure ipsa consequuntur, tempora. Dignissimos ad, ipsam, recusandae fugit, libero voluptates soluta, ea itaque voluptatem inventore sequi optio.</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-white">Q : Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
					<p class="text-white">A : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident debitis alias ullam iure ipsa consequuntur, tempora. Dignissimos ad, ipsam, recusandae fugit, libero voluptates soluta, ea itaque voluptatem inventore sequi optio.</p>
				</div> -->
			</div>
		</div>
	</section>

	




	<!-- footer -->
	<?php
		require_once('inc/act/footer.php');
		require_once('inc/act/script.php'); 
	?>
	<script>
		$('#knowledge').addClass('active');
	</script>

</body>
</html>