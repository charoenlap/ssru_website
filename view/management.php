<html>
<head>
	<?php require_once('inc/head.php'); ?>
	<link rel="stylesheet" href="assets/css/timeline.css?v=<?php echo time(); ?>">
	<!-- <link rel="stylesheet" href="assets/css/calendar.css"> -->
	<style>
		#main {
			position: absolute;
			width:100%;
			height: 100%;
		}
		.cardtimeline {
			position: absolute;
			top: 100px;
			width: 100%;
			opacity: 0.1;
			-webkit-transition: all .25s;
			   -moz-transition: all .25s;
			    -ms-transition: all .25s;
			     -o-transition: all .25s;
			        transition: all .25s;
	        transform: scale(0.5);
		}
		.cardtimeline.active {
			opacity: 1;
			transform: scale(1);
			z-index: 2;
		}
		.cardtimeline.out {
			opacity: 0;
		    animation-name: zoomOut;
		    animation-duration: .25s;
		}
		.cardtimeline.in {
			
		    animation-name: zoomIn;
		    animation-duration: .25s;
		}
		@keyframes zoomOut {
		    from {
				opacity: 1;
				transform: scale(1);
		    }
		    to {
				opacity: 0;
				transform: scale(3);
		    }
		}

		@keyframes zoomIn {
		    from {
				opacity: 0;
				transform: scale(3);
		    }
		    to {
				opacity: 1;
				transform: scale(1);
		    }
		}
		.card-body:before {
			content: "";
			width: 0;
			height: 0;
			border-style: solid;
			border-width: 50px 40px 0px 40px;
			border-color: #fff transparent transparent transparent;
			position: absolute;
			bottom: -45px;
			left: 45%;
		}
		.bg-timelines:before {
			content: '';
			width: 50%;
			height: 60%;
			left: -0%;
			margin-left: 22%;
			bottom: 40%;
			/*background: #000;*/
			background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.1) 20%,rgba(0,0,0,0.9) 80%);
			position: absolute;
			transform: perspective(500px) rotateX(70deg) translateY(30px);
		}
		.date-timelines {
			text-align: center;
			color: #fff;
			background: #f26422;
			position: absolute;
			top: -20px;
			left: 50%;
			transform: translate(-50%);
			width: 70px;
			height: 70px;
			border: 3px solid #fff;
		}
		.date-timelines h2 {
			line-height: 1;
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/header.php'); ?>

	

	<!-- content -->
	<?php $manager = $obj_db->cat('ref_id = '.get('id').$hide_del_lan_order); ?>
	<section class="bg-gray pt-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- <div class="row mb-5 mt-3">
						<div class="col-md-12 text-center">
							<img src="<?php echo $mdir.'upload/content/'.$manager->row[$picture1]; ?>" alt="" class="w-75">
							<div class="mt-2">
								<h5 class="text-primary"><?php echo $manager->row['lang_name']; ?></h5>
								<p class="text-primary"><?php echo cut_tag_p($manager->row['detail']); ?></p>
							</div>
						</div>
					</div> -->
					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-pills mb-2 justify-content-center" id="pills-tab" role="tablist">
								<?php $manager_profile = $obj_db->cat('parent = '.$manager->row['id'].$hide_del_lan_order);
								foreach ($manager_profile->rows as $key => $value) { ?>

								<?php if ($key=="1") { ?> 
								<li class="nav-item w-mobile">
									<a class="nav-link tab-four mb-0 shadow-lg <?php echo $key==0?'active':''; ?>" href="<?php echo route('timeline','id='.$value['id']); ?>" target="_blank"><?php echo $value['lang_name']; ?></a>
								</li>
								<?php }elseif ($key=="3") { ?>

								<?php }else{ ?>
								<li class="nav-item w-mobile">
									<a class="nav-link tab-four mb-0 shadow-lg <?php echo $key==0?'active':''; ?>" id="h-01" data-toggle="pill" href="#historyphp_<?php echo $key; ?>" role="tab" aria-controls="historyphp_<?php echo $key; ?>" aria-selected="true"><?php echo $value['lang_name']; ?></a>
								</li>
								<?php } ?>
								
								<!-- <li class="nav-item w-mobile">
									<a class="nav-link tab-four mb-0 shadow-lg <?php echo $key==0?'active':''; ?>" id="h-01" data-toggle="pill" href="#historyphp_<?php echo $key; ?>" role="tab" aria-controls="historyphp_<?php echo $key; ?>" aria-selected="true"><?php echo $value['lang_name']; ?></a>
								</li> -->
								<?php } ?>
							</ul>
							<!-- <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<?php $manager_profile = $obj_db->cat('parent = '.$manager->row['id'].$hide_del_lan_order);
								foreach ($manager_profile->rows as $key => $value) { ?>
									<a class="nav-link tab-two <?php echo $key==0?'active':''; ?>" id="h-01" data-toggle="pill" href="#historyphp_<?php echo $key; ?>" role="tab" aria-controls="historyphp_<?php echo $key; ?>" aria-selected="true"><?php echo $value['lang_name']; ?></a>
								<?php } ?>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="tab-content" id="v-pills-tabContent">
		<?php foreach ($manager_profile->rows as $key => $value) {
			if ($key == 0) { ?>
				<div class="tab-pane fade show active" id="historyphp_0" role="tabpanel" aria-labelledby="h-01">
					<div style="background: url(<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>); background-repeat: no-repeat; background-size: 100% 100%;">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="bg-portfolio">
										<div class="row px-5 py-5">
											<?php echo $value['detail']; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } elseif ($key == 1) { ?>
				<div class="tab-pane fade" id="historyphp_<?php echo $key; ?>" role="tabpanel" aria-labelledby="h-02">
					<div style="background: url(<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>); background-size: cover; overflow: hidden;">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="bg-portfolio">
										<div id="main">
											<div class="bg-timelines"></div>
											<div class="scrollevent">
												<div class="row cardtimeline active" data-num="1">
													<div class="col-6">
														<div class="card card-shadow border-0">
															<img class="card-img-top" src="assets/images/img01.jpg" alt="Card image cap">
															<div class="card-body">
																<div class="row">
																	<div class="col-md-12">
																		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis, possimus doloribus magni voluptate autem, vero eos porro iste ut deserunt, nemo. Voluptatibus necessitatibus soluta nisi. Dolorem velit, explicabo qui!
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-6">
														<!-- Empty -->
													</div>
													<div class="col-md-12 mt-timeline">
														<hr class="border-1 bg-white w-75">
														<div class="date-timelines rounded-circle">
															<h2>12</h2>
															<span>JAN</span>
														</div>
													</div>
												</div>
												<div class="row cardtimeline" data-num="2">
													<div class="col-6">
														<!-- Empty -->
													</div>
													<div class="col-6">
														<div class="card card-shadow border-0">
															<img class="card-img-top" src="assets/images/img01.jpg" alt="Card image cap">
															<div class="card-body">
																<div class="row">
																	<div class="col-md-12">
																		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem in, inventore deserunt voluptate sunt, nesciunt dolores a atque aut facere error neque exercitationem officiis earum quis expedita culpa odit ipsa!
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-timeline">
														<hr class="border-1 bg-white w-75">
														<div class="date-timelines rounded-circle">
															<h2>12</h2>
															<span>JAN</span>
														</div>
													</div>
												</div>
												<div class="row cardtimeline" data-num="3">
													<div class="col-6">
														<div class="card card-shadow border-0">
															<img class="card-img-top" src="assets/images/img01.jpg" alt="Card image cap">
															<div class="card-body">
																<div class="row">
																	<div class="col-md-12">
																		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus aliquid voluptatum enim magni molestiae, repudiandae iure recusandae aut ipsum, minima sit alias omnis. Commodi natus, earum, deleniti repellat aut at.
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-6">
														<!-- Empty -->
													</div>
													<div class="col-md-12 mt-timeline">
														<hr class="border-1 bg-white w-75">
														<div class="date-timelines rounded-circle">
															<h2>12</h2>
															<span>JAN</span>
														</div>
													</div>
												</div>
												<div class="row cardtimeline" data-num="4">
													<div class="col-6">
														<!-- Empty -->
													</div>
													<div class="col-6">
														<div class="card card-shadow border-0">
															<img class="card-img-top" src="assets/images/img01.jpg" alt="Card image cap">
															<div class="card-body">
																<div class="row">
																	<div class="col-md-12">
																		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum nobis, incidunt temporibus expedita, autem voluptatum magnam pariatur placeat commodi suscipit nemo maxime rem nostrum recusandae tempore. Corrupti numquam facilis obcaecati!
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-timeline">
														<hr class="border-1 bg-white w-75">
														<div class="date-timelines rounded-circle">
															<h2>12</h2>
															<span>JAN</span>
														</div>
													</div>
												</div>
												<div class="row cardtimeline" data-num="5">
													<div class="col-6">
														<div class="card card-shadow border-0">
															<img class="card-img-top" src="assets/images/img01.jpg" alt="Card image cap">
															<div class="card-body">
																<div class="row">
																	<div class="col-md-12">
																		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus aliquid voluptatum enim magni molestiae, repudiandae iure recusandae aut ipsum, minima sit alias omnis. Commodi natus, earum, deleniti repellat aut at.
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-6">
														<!-- Empty -->
													</div>
													<div class="col-md-12 mt-timeline">
														<hr class="border-1 bg-white w-75">
														<div class="date-timelines rounded-circle">
															<h2>12</h2>
															<span>JAN</span>
														</div>
													</div>
												</div>
												<div class="row cardtimeline" data-num="6">
													<div class="col-6">
														<!-- Empty -->
													</div>
													<div class="col-6">
														<div class="card card-shadow border-0">
															<img class="card-img-top" src="assets/images/img01.jpg" alt="Card image cap">
															<div class="card-body">
																<div class="row">
																	<div class="col-md-12">
																		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum nobis, incidunt temporibus expedita, autem voluptatum magnam pariatur placeat commodi suscipit nemo maxime rem nostrum recusandae tempore. Corrupti numquam facilis obcaecati!
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 mt-timeline">
														<hr class="border-1 bg-white w-75">
														<div class="date-timelines rounded-circle">
															<h2>12</h2>
															<span>JAN</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- <div class="timelines">
											<?php $exp = $obj_db->content('cat = '.$value['id'].$hide_del_lan_order);
											foreach ($exp->rows as $key => $value) { ?>
												<div class="tl <?php echo $key%2==1?'right':'left'; ?>">
													<div class="content">
														<h2><?php echo $value['lang_name']; ?></h2>
														<?php echo $value['detail']; ?>
													</div>
												</div>
											<?php } ?>
											<div class="tl right">
												<div class="content">
													<h2>2016</h2>
													<p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
												</div>
											</div>
											<div class="tl left">
												<div class="content">
													<h2>2015</h2>
													<p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
												</div>
											</div>
											<div class="tl right">
												<div class="content">
													<h2>2012</h2>
													<p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
												</div>
											</div>
											<div class="tl left">
												<div class="content">
													<h2>2011</h2>
													<p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
												</div>
											</div>
											<div class="tl right">
												<div class="content">
													<h2>2007</h2>
													<p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
												</div>
											</div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } elseif ($key == 2) { ?>
				<div class="tab-pane fade" id="historyphp_<?php echo $key; ?>" role="tabpanel" aria-labelledby="h-03">
					<div style="background: url(<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>); background-size: cover;">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="bg-portfolio">
										<div class="row px-5 py-5">
											<div class="col-md-12 text-right mb-5">
												<div class="nav nav-pills float-right" id="v-pills-tab" role="tablist" aria-orientation="vertical">
													<?php $portfolio = $obj_db->cat('parent = '.$value['id'].$hide_del_lan_order);
													foreach ($portfolio->rows as $key => $value) { ?>
														<a class="nav-link btn btn-sm btn-outline-light btn-theme-color rounded-0 <?php echo $key==0?'active':''; ?>" id="img-01" data-toggle="pill" href="#images_<?php echo $key; ?>" role="tab" aria-controls="images_<?php echo $key; ?>" aria-selected="false"><?php echo $value['lang_name']; ?></a>
													<?php } ?>
													<!-- <a class="nav-link btn btn-sm btn-outline-light rounded-0" id="img-02" data-toggle="pill" href="#images02" role="tab" aria-controls="images02" aria-selected="false">กิจกรรม</a>
													<a class="nav-link btn btn-sm btn-outline-light rounded-0" id="img-03" data-toggle="pill" href="#images03" role="tab" aria-controls="images03" aria-selected="false">อบรมสัมนา</a>
													<a class="nav-link btn btn-sm btn-outline-light rounded-0" id="img-04" data-toggle="pill" href="#images04" role="tab" aria-controls="images04" aria-selected="false">ผลงาน</a> -->
												</div>

												<!-- <a href="" class="btn btn-sm btn-outline-light rounded-0">ทั้งหมด</a>
												<a href="" class="btn btn-sm btn-outline-light rounded-0">กิจกรรม</a>
												<a href="" class="btn btn-sm btn-outline-light rounded-0">อบรมสัมนา</a>
												<a href="" class="btn btn-sm btn-outline-light rounded-0">ผลงาน</a> -->
											</div>
											<div class="tab-content" id="pills-tabContent">
												<?php foreach ($portfolio->rows as $key => $value) { ?>
													<div class="tab-pane fade show <?php echo $key==0?'active':''; ?>" id="images_<?php echo $key; ?>" role="tabpanel" aria-labelledby="img-01">
														<div class="row">
															<?php 
															$portfolio_img = $obj_db->content('cat = '.$value['id'].$hide_del_lan_order);
															$duration = 0.50;
															foreach ($portfolio_img->rows as $key => $value) { ?>
																<div class="col-md-3 mb-2">
																	<a href="<?php echo $value['id']; ?>" class="fc-end">
																		<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="" class="w-100 h-20 border border-light wow animate-img" data-wow-duration="<?php echo $duration; ?>s">
																		<p><?php echo $value['lang_name']; ?></p>
																	</a>
																</div>
															<?php 
															$duration += 0.25;
															} ?>
														</div>
													</div>
												<?php } ?>
												<!-- <div class="tab-pane fade" id="images02" role="tabpanel" aria-labelledby="img-02">
													<div class="row">
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="images03" role="tabpanel" aria-labelledby="img-03">
													<div class="row">
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="images04" role="tabpanel" aria-labelledby="img-04">
													<div class="row">
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
														<div class="col-md-3 mb-2">
															<img src="http://placehold.it/1920x2000/" alt="" class="w-100 border border-light">
														</div>
													</div>
												</div> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } elseif ($key == 3) { ?>
				<?php $cat_calendar = $value['id']; ?>
				<div class="tab-pane fade" id="historyphp_<?php echo $key; ?>" role="tabpanel" aria-labelledby="h-04">
					<div style="background: url(<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>); background-size: cover;">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="bg-portfolio">
										<div class="row mb-2 mt-5">
											<div class="col-md-12">
												<h5 class="text-white mb-5">CALENDAR</h5>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div id='calendar'></div>
												<!-- <img src="assets/images/managements/calendar.png" alt="" class="w-100"> -->
												<!-- <div id="calendar">
													<div id="calendar_header">
														<i class="fa fa-chevron-left"></i>
														<h1></h1>
														<i class="fa fa-chevron-right"></i> 
													</div>
													<div id="calendar_weekdays"></div>
													<div id="calendar_content"></div>
												</div> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
				



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="calendar_modal" tabindex="-1" role="dialog" aria-labelledby="calendar_title" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="calendar_title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="calendar_detail"></div>
				<div id="file_pdf"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>
	




	<!-- footer -->
	<?php
		require_once('inc/footer.php');
		require_once('inc/script.php'); 
	?>
	<!-- <script src="assets/js/calendar.js"></script> -->
	
	<script>
		$('#manager').addClass('active');
	</script>
	<script>
		$(document).ready(function() {
			// var lastScrollTop = 0;
			// $(window).scroll(function(event){
			//    var st = $(this).scrollTop();
			//    if (st > lastScrollTop){
			//        var now = $('.cardtimeline.active').data('num');
			//        slideNext(now);
			//    } else {
			//    }
			//    lastScrollTop = st;
			// });
			$('.scrollevent').bind('mousewheel', function(e){
			   console.log(e.originalEvent.detail);
			   console.log(e.originalEvent.deltaY);
			   if (e.originalEvent.deltaY > 60){
			       slideNext(); 
			   } else if (e.originalEvent.deltaY < -60) {
			       slidePrev();
			   }
			});
			$(window).keydown(function(e) {
				var code = e.keyCode || e.which;
				// console.log(code);
				if(code == 40) { 
					// Down
			       slideNext();
				}
				else if (code == 38) {
					// Top
			       slidePrev();
				}
			});

			function slideNext() {
				var now = parseInt($('.cardtimeline.active').data('num'));
				var next = now+1;
				// Check Max
				if (next <= parseInt($('.cardtimeline').length)) {
					
					$('.cardtimeline').each(function(index, el) {
						var num = $(this).data('num');
						if (num == next) {
							$(this).removeClass('out');
							$(this).addClass('active');
							$(this).removeClass('in');
						} else if (num < next) {
							$(this).removeClass('in');
							$('.cardtimeline').removeClass('active');
							$(this).addClass('out');
						} else if (num > next) {
							// $(this).removeClass('active');
							$(this).removeClass('out');

							// $(this).addClass('in');
						}
					});
				}
			}

			function slidePrev(now) {
				var now = parseInt($('.cardtimeline.active').data('num'));
				var next = now-1;
				if (next > 0) {
					
					$('.cardtimeline').each(function(index, el) {
						var num = $(this).data('num');
						if (num == next) {
							$(this).removeClass('out');
							$(this).addClass('active in');
							// console.log(1);
						} else if (num < next) {
							$(this).removeClass('out');
							$(this).removeClass('in');
							$(this).removeClass('active');
							// $(this).addClass('out');
							// console.log(2);
						} else if (num > next) {
							$(this).removeClass('active');
							$(this).removeClass('in');
							// $(this).addClass('in');
						}
					});
				}
			}

			function loopCheck(next) {
				$('.cardtimeline').each(function(index, el) {
					var num = $(this).data('num');
					if (num == next) {
						$(this).removeClass('out');
						$(this).addClass('active');
					} else if (num < next) {
						$('.cardtimeline').removeClass('active');
						$(this).addClass('out');
					} else if (num > next) {
						// $(this).removeClass('active');
						$(this).removeClass('out');
						// $(this).addClass('in');
					}
				});
			}
		});
	</script>
</body>
</html>