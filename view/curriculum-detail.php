<html>



<head>
	<?php require_once('inc/head.php'); ?>
	<style>
		.owl-nav.disabled {
			display: block !important;
		}
		.owl-nav {
			position: absolute;
			top: 35%;
			width: 100%;
		}
		.owl-carousel .owl-nav button.owl-prev {
			float: left;
			margin-left: -25px;
		}
		.owl-carousel .owl-nav button.owl-next {
			float: right;
			margin-right: -25px;
		}
	</style>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/header.php'); ?>

	

	<!-- content -->
	<section class="pt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-3">
					<img src="http://placehold.it/1200x1080/" alt="" class="w-100">
				</div>
				<div class="col-md-12 mb-5">
					<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, quidem repellendus. Perferendis voluptatum maxime numquam minus, iusto deleniti alias dicta! Vero necessitatibus eveniet perspiciatis aliquid earum beatae, sequi ipsa nihil!</p>
					<div class="shere text-right">
						<div class="fb-share-button" data-href="<?php echo $link_share; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"></div>
						<g:plus action="share" href="<?php echo $og_url; ?>"></g:plus>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="container mb-5">
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel owl-theme">
					<div class="item"><img src="assets/images/1.jpg" alt="" class="w-100"></div>
					<div class="item"><img src="assets/images/2.jpg" alt="" class="w-100"></div>
					<div class="item"><img src="assets/images/3.jpg" alt="" class="w-100"></div>
					<div class="item"><img src="assets/images/4.jpg" alt="" class="w-100"></div>
					<div class="item"><img src="assets/images/5.jpg" alt="" class="w-100"></div>
				</div>

			</div>
		</div>
	</div>


	




	<!-- footer -->
	<?php
		require_once('inc/footer.php');
		require_once('inc/script.php'); 
	?>
	<script>
		$('.owl-carousel').owlCarousel({
			items:5,
		    loop:true,
		    margin:10,
		    autoplay:true,
		    autoplayTimeout:5000,
		    autoplayHoverPause:true,
		    dots:false,
		    nav:true,
		    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:3
		        },
		        1000:{
		            items:5
		        }
		    }
		})

		$('#current-student').addClass('active');
	</script>

</body>
</html>