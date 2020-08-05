<html>
<head>
	<?php require_once('inc/head.php'); ?>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/header.php'); ?>

	

	<!-- content -->
	<section class="bg-gray mt-1 mb-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php $cat_calendar = get('id'); ?>
					<div id='calendar'></div>
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
		$('#students').addClass('active');
	</script>
	<script>
		
	</script>
</body>
</html>