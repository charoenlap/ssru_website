<html>
<head>
	<?php require_once('inc/head.php'); ?>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/header.php'); ?>

	<!-- slider -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100 height-banner" src="assets/images/banner/banner01.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100 height-banner" src="assets/images/banner/banner01.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100 height-banner" src="assets/images/banner/banner01.jpg" alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- text banner -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12 pt-4 pb-4 text-center">
					<h2 class="text-uppercase text-primary">Lorem ipsum dolor sit amet</h2>
					<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum omnis optio commodi nobis.</h5>
				</div>
			</div>
		</div>
	</section>

	<!-- content -->
	<section class="content-tab">
		<div class="container">
			<div id="div-color" class="bg-overflow"></div>
			<div class="row">
				<div class="col-md-3 pr-0">
					<div class="row">
						<div class="col-md-12 pr-0">
							<div class="nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link tab-color active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">NEWS</a>
								<a class="nav-link tab-color" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">ACTIVITIES</a>
								<a class="nav-link tab-color" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">ANNOUNCE</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9 mb-3">
					<div class="tab-content" id="v-pills-tabContent">
						<!-- tab -->
      					<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row mb-3" id="main-post">
								<div class="col-md-6">
									<img src="assets/images/img01.jpg" alt="" class="w-100">
								</div>
								<div class="col-md-6 pt-3">
									<div class="row">
										<div class="col-md-12">
											<h3 class="text-primary">IPSUM DOLOR</h3>
											<p class="text-white">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium suscipit, temporibus saepe. Enim dignissimos commodi, accusantium at atque, facere error est beatae nisi aspernatur saepe, ratione in. Ad, explicabo, eos.
											</p>
											<a href="" class="btn btn-default btn-sm btn-white btn-arrow-right">Read more</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<img src="assets/images/img02.jpg" alt="" class="w-100">
									<h5>Lorem ipsum</h5>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet sequi porro iure, saepe totam? Nihil molestiae atque velit labore
									</p>
									<a href="" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">Read more</a>
								</div>
								<div class="col-md-4">
									<img src="assets/images/img03.jpg" alt="" class="w-100">
									<h5>Lorem ipsum</h5>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet sequi porro iure, saepe totam? Nihil molestiae atque velit labore
									</p>
									<a href="" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">Read more</a>
								</div>
								<div class="col-md-4">
									<img src="assets/images/img04.jpg" alt="" class="w-100">
									<h5>Lorem ipsum</h5>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet sequi porro iure, saepe totam? Nihil molestiae atque velit labore
									</p>
									<a href="" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">Read more</a>
								</div>
							</div>
						</div>
						<!-- /tab -->
						<!-- tab -->
						<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
							<div class="row mb-3">
								<div class="col-md-6">
									<img src="assets/images/img01.jpg" alt="" class="w-100">
								</div>
								<div class="col-md-6 pt-3">
									<div class="row">
										<div class="col-md-12">
											<h3 class="text-primary">IPSUM DOLOR</h3>
											<p class="text-white">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium suscipit, temporibus saepe. Enim dignissimos commodi, accusantium at atque, facere error est beatae nisi aspernatur saepe, ratione in. Ad, explicabo, eos.
											</p>
											<a href="" class="btn btn-default btn-sm btn-white btn-arrow-right">Read more</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<img src="assets/images/img02.jpg" alt="" class="w-100">
									<h5>Lorem ipsum</h5>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet sequi porro iure, saepe totam? Nihil molestiae atque velit labore
									</p>
									<a href="" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">Read more</a>
								</div>
								<div class="col-md-4">
									<img src="assets/images/img03.jpg" alt="" class="w-100">
									<h5>Lorem ipsum</h5>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet sequi porro iure, saepe totam? Nihil molestiae atque velit labore
									</p>
									<a href="" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">Read more</a>
								</div>
								<div class="col-md-4">
									<img src="assets/images/img04.jpg" alt="" class="w-100">
									<h5>Lorem ipsum</h5>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet sequi porro iure, saepe totam? Nihil molestiae atque velit labore
									</p>
									<a href="" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">Read more</a>
								</div>
							</div>
						</div>
						<!-- /tab -->
						<!-- tab -->
						<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
							<div class="row mb-3">
								<div class="col-md-6">
									<img src="assets/images/img01.jpg" alt="" class="w-100">
								</div>
								<div class="col-md-6 pt-3">
									<div class="row">
										<div class="col-md-12">
											<h3 class="text-primary">IPSUM DOLOR</h3>
											<p class="text-white">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium suscipit, temporibus saepe. Enim dignissimos commodi, accusantium at atque, facere error est beatae nisi aspernatur saepe, ratione in. Ad, explicabo, eos.
											</p>
											<a href="" class="btn btn-default btn-sm btn-white btn-arrow-right">Read more</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<img src="assets/images/img02.jpg" alt="" class="w-100">
									<h5>Lorem ipsum</h5>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet sequi porro iure, saepe totam? Nihil molestiae atque velit labore
									</p>
									<a href="" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">Read more</a>
								</div>
								<div class="col-md-4">
									<img src="assets/images/img03.jpg" alt="" class="w-100">
									<h5>Lorem ipsum</h5>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet sequi porro iure, saepe totam? Nihil molestiae atque velit labore
									</p>
									<a href="" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">Read more</a>
								</div>
								<div class="col-md-4">
									<img src="assets/images/img04.jpg" alt="" class="w-100">
									<h5>Lorem ipsum</h5>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet sequi porro iure, saepe totam? Nihil molestiae atque velit labore
									</p>
									<a href="" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left">Read more</a>
								</div>
							</div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
		</div>
	</section>


	<!--  -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12 pt-4 pb-4 text-center">
					<h3 class="text-uppercase text-primary">Lorem ipsum dolor sit amet</h3>
					<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum omnis optio commodi nobis.</h5>
				</div>
			</div>
		</div>
	</section>
	

	<section class="bg-calendar">
		<div class="text-title">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3 class="text-uppercase text-white">calendar</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div id="Steps" class="steps-section mb-5 mt-100px">
				<!-- <h2 class="steps-header">Responsive Semantic Timeline</h2> -->
				<div class="steps-timeline">
					<div class="steps-one steps-0">
						<p class="text-center steps-title">14 Feb</p>
						<img class="steps-img mb-3" src="assets/images/clock.png" alt="" />
						<div class="card card-shadow text-center">
							<div class="card-body card-border-top">
								<h5 class="text-steps">Lorem ipsum dolor sit amet</h5>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolore corrupti asperiores mollitia
							</div>
						</div>
					</div>
					<div class="steps-two steps-0">
						<p class="text-center steps-title">09 Mar</p>
						<img class="steps-img mb-3" src="assets/images/clock.png" alt="" />
						<div class="card card-shadow text-center">
							<div class="card-body card-border-top">
								<h5 class="text-steps">Lorem ipsum dolor sit amet</h5>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolore corrupti asperiores mollitia
							</div>
						</div>
					</div>
					<div class="steps-three steps-0">
						<p class="text-center steps-title">26 May</p>
						<img class="steps-img mb-3" src="assets/images/clock.png" alt="" />
						<div class="card card-shadow text-center">
							<div class="card-body card-border-top">
								<h5 class="text-steps">Lorem ipsum dolor sit amet</h5>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolore corrupti asperiores mollitia
							</div>
						</div>
					</div>
					<div class="steps-four steps-0">
						<p class="text-center steps-title">09 Jun</p>
						<img class="steps-img mb-3" src="assets/images/clock.png" alt="" />
						<div class="card card-shadow text-center">
							<div class="card-body card-border-top">
								<h5 class="text-steps">Lorem ipsum dolor sit amet</h5>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolore corrupti asperiores mollitia
							</div>
						</div>
					</div>
					<div class="steps-five steps-0">
						<p class="text-center steps-title">12 Aug</p>
						<img class="steps-img mb-3" src="assets/images/clock.png" alt="" />
						<div class="card card-shadow text-center">
							<div class="card-body card-border-top">
								<h5 class="text-steps">Lorem ipsum dolor sit amet</h5>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolore corrupti asperiores mollitia
							</div>
						</div>
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
		$(document).ready(function() {
			var h = $('#main-post').height();
			$('#div-color').height(h);
		});
	</script>
</body>
</html>