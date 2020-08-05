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
				<h3 class="text-white mb-0"><?php echo $lan['menu_contact']; ?></h3>
			</div>
		</div>
	</div>
	<?php $contact = $obj_db->content('ref_id = 37'.$hide_del_lan_order); ?>
	<!-- <?php echo $contact->row['detail_2']; ?> -->
	<style>
		.text-center > h3 {
			color: white;
		}
	</style>
	<section class="bg-theme pt-4 wow fadeInUp" data-wow-duration="1s">
		<?php echo $contact->row['detail_2']; ?>
	</section>


	




	<!-- footer -->
	<?php
		require_once('inc/act/footer.php');
		require_once('inc/act/script.php'); 
	?>
	<script>
		$('#contact').addClass('active');
	</script>

</body>
</html>