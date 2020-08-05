<html>
<head>
	<?php require_once('inc/head.php'); ?>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/header.php'); ?>

	

	<!-- content -->
	<?php $manager = $obj_db->cat('parent = '.$head_cat[2]['id'].$hide_del_lan_order); ?>
	<section class="bg-gray pt-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-pills mb-2 justify-content-center" id="pills-tab" role="tablist">
								<?php 
								foreach ($manager->rows as $key => $value) { ?>
								<li class="nav-item w-mobile">
									<a class="nav-link tab-four mb-0 shadow-lg <?php echo $value['id']==get('active')?'active':''; ?>" id="h-02" data-toggle="pill" href="#manager_<?php echo $key; ?>" role="tab" aria-controls="manager<?php echo $key; ?>" aria-selected="true"><?php echo $value['lang_name']; ?></a>
								</li>
								<?php } ?>
							</ul>
							<!-- <div class="nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<?php 
								foreach ($manager->rows as $key => $value) { ?>
									<a class="nav-link tab-two <?php echo $value['id']==get('active')?'active':''; ?>" id="h-02" data-toggle="pill" href="#manager_<?php echo $key; ?>" role="tab" aria-controls="manager<?php echo $key; ?>" aria-selected="false"><?php echo $value['lang_name']; ?></a>
								<?php } ?>
								<a class="nav-link tab-color" id="h-01" data-toggle="pill" href="#history01" role="tab" aria-controls="history01" aria-selected="true">โครงสร้างหน่วยงานภายในคณะฯ</a>
								<a class="nav-link tab-color" id="h-03" data-toggle="pill" href="#history03" role="tab" aria-controls="history03" aria-selected="false">บุคลากรสายวิชาการ</a>
								<a class="nav-link tab-color" id="h-04" data-toggle="pill" href="#history04" role="tab" aria-controls="history04" aria-selected="false">บุคลากรสายสนับสนุนวิชาการ</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="tab-content" id="v-pills-tabContent">
		<!-- tab -->
			<!-- <div class="tab-pane fade" id="manager" role="tabpanel" aria-labelledby="h-01">
			<div class="row">
				<div class="col-md-12 pl-0">
					<div>
						<img src="http://placehold.it/1920x2000/" alt="" class="w-100">
					</div>
				</div>
			</div>
		</div> -->
		<!-- /tab -->
		<!-- tab -->
		<?php foreach ($manager->rows as $key_head => $value) {
			// print_r($value); exit();
			if ($key_head == 1) {  ?>
				<div class="tab-pane fade  <?php echo $value['id']==get('active')?'show active':''; ?>" id="manager_<?php echo $key_head; ?>" role="tabpanel" aria-labelledby="manager_<?php echo $key_head; ?>">
					<div style="background: url(<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>); background-size: cover;">
						<div class="container">
							<div class="fh-page pt-5">
								<div class="row">
									<?php $managers = $obj_db->cat('parent = '.$value['id'].$hide_del_lan_order);
									foreach ($managers->rows as $key => $value) { ?>
										<div class="col-6 col-md-3 text-center">
											<div class="flip-box">
												<div class="flip-box-inner">
													<div class="flip-box-front">
														<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="Paris" class="w-100 height-flip-box">
														<label for="" class="text-dark"><?php echo $value['lang_name']; ?></label>
													</div>
													<div class="flip-box-back">
														<div class="flip-content-center">
															<p><?php echo $value['lang_name']; ?></p>
															<a href="<?php echo route('management','id='.$value['id']); ?>" class="text-white" target="_blank">
																<?php echo $lan['read_more']; ?>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- <div class="col-6 col-md-3 mb-3 text-center">
											<a href="<?php echo route('management','id='.$value['id']); ?>">
												<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="" class="w-100">
												<label for="" class="text-dark"><?php echo $value['lang_name']; ?></label>
											</a>
										</div> -->
										<!-- <div class="col-md-3 px-0 py-0">
											<a href="<?php echo route('management','id='.$value['id']); ?>">
												<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="" class="w-100">
												<div class="img-overlay"></div>
												<div class="overlay-text">
													<?php echo $value['lang_name']; ?>
												</div>
											</a>
										</div> -->
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-md-12">
							<div class="bg-portfolio" style="background: url(<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>); background-size: cover;">
								<div class="row">
									<?php $managers = $obj_db->cat('parent = '.$value['id'].$hide_del_lan_order);
									foreach ($managers->rows as $key => $value) { ?>
										<div class="col-md-3 px-0 py-0">
											<a href="<?php echo route('management','id='.$value['id']); ?>">
												<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="" class="w-100">
												<div class="img-overlay"></div>
												<div class="overlay-text">
													<?php echo $value['lang_name']; ?>
												</div>
											</a>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			<?php } elseif ($key_head == 2 || $key_head == 3) { ?>
				<div class="tab-pane fade <?php echo $value['id']==get('active')?'show active':''; ?>" id="manager_<?php echo $key_head; ?>" role="tabpanel" aria-labelledby="manager_<?php echo $key_head; ?>">
					<div style="background: url(<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>); background-size: cover;">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div id="accordion" class="py-5">
										<?php 
										// print_r($manager);
										$result_group = $obj_db->cat('parent = '.$value['id'].$hide_del_lan_order);
										foreach ($result_group->rows as $key => $value) {
										// print_r($value); ?>
										<a href="#" class="cl-link" data-toggle="collapse" data-target="#collapse_<?php echo $value['id'] ?>" aria-expanded="true" aria-controls="collapse_<?php echo $value['id'] ?>"><?php echo $value['lang_name']; ?></a>
										<div id="collapse_<?php echo $value['id'] ?>" class="collapse <?php echo $key==0?'show':''; ?>" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="row">
												<?php $result_group_detail = $obj_db->cat('parent = '.$value['id'].$hide_del_lan_order);
												foreach ($result_group_detail->rows as $key => $value) { ?>
												<div class="col-6 col-md-3">
													<div class="flip-box">
														<div class="flip-box-inner">
															<div class="flip-box-front">
																<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="Paris" class="w-100 height-flip-box">
																<label for="" class="text-dark"><?php echo $value['lang_name']; ?></label>
															</div>
															<div class="flip-box-back">
																<div class="flip-content-center">
																	<?php echo $value['detail']; ?>
																	<a href="<?php echo route('management','id='.$value['id']); ?>" class="text-white" target="_blank">
																		อ่านเพิ่มเติม
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<?php } ?>
											</div>
										</div>
										<?php } ?>
										
										<!-- <a href="#" class="cl-link collapsed" data-toggle="collapse" data-target="#headingThree" aria-expanded="true" aria-controls="headingThree">Collapsible Group Item #3</a>
										<div id="headingThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											<div class="row">
												<div class="col-6 col-md-3">
													<div class="flip-box">
														<div class="flip-box-inner">
															<div class="flip-box-front">
																<img src="http://placehold.it/1200x1080/" alt="Paris" class="w-100 height-flip-box">
																<label for="" class="text-dark">Lorem ipsum dolor sit amet</label>
															</div>
															<div class="flip-box-back">
																<div class="flip-content-center">
																	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
																	<a href="#" class="text-white">
																		อ่านเพิ่มเติม
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="tab-pane fade <?php echo $value['id']==get('active')?'show active':''; ?>" id="manager_<?php echo $key_head; ?>" role="tabpanel" aria-labelledby="manager_<?php echo $key_head; ?>">
					<!-- <div style="background: url(<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>); background-size: cover;"> -->
					<div>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="bg-portfolio">
										<div class="row mt-5">
											<?php 
											$result_manager = $obj_db->content('cat=22'.$hide_del_lan_order);
											foreach ($result_manager->rows as $key => $value) { ?>
												<?php if ($key==0) { ?>
													<div class="col-md-4 mb-5"></div>
												<?php } ?>
												<div class="col-md-4 mb-5">
													<div class="blog-manager">
														<div class="bg-blogmanager">
															<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="">
														</div>
														<div class="blog-manager-content text-right">
															<p class="mb-0"><?php echo $value['lang_name']; ?></p>
															<hr>
															<p class="mb-0"><?php echo $value['detail']; ?></p>
														</div>
													</div>
												</div>
												<?php if ($key==0) { ?>
													<div class="col-md-4 mb-5"></div>
												<?php } ?>
												<?php if ($key==1) { ?>
													<div class="col-md-4 mb-5"></div>
												<?php } ?>
											<?php } ?>
											<!-- <div class="col-md-4 mb-5">
												<div class="blog-manager">
													<div class="bg-blogmanager">
														<img src="http://placehold.it/140x140/" alt="">
													</div>
													<div class="blog-manager-content text-right">
														<p class="mb-0">Lorem ipsum dolor sit amet,</p>
														<hr>
														<p class="mb-0">Lorem ipsum dolor sit amet</p>
													</div>
												</div>
											</div>
											<div class="col-md-4 mb-5">
												<div class="blog-manager">
													<div class="bg-blogmanager">
														<img src="http://placehold.it/140x140/" alt="">
													</div>
													<div class="blog-manager-content text-right">
														<p class="mb-0">Lorem ipsum dolor sit amet,</p>
														<hr>
														<p class="mb-0">Lorem ipsum dolor sit amet</p>
													</div>
												</div>
											</div>
											<div class="col-md-4 mb-5">
												<div class="blog-manager">
													<div class="bg-blogmanager">
														<img src="http://placehold.it/140x140/" alt="">
													</div>
													<div class="blog-manager-content text-right">
														<p class="mb-0">Lorem ipsum dolor sit amet,</p>
														<hr>
														<p class="mb-0">Lorem ipsum dolor sit amet</p>
													</div>
												</div>
											</div>
											<div class="col-md-4 mb-5">
												<div class="blog-manager">
													<div class="bg-blogmanager">
														<img src="http://placehold.it/140x140/" alt="">
													</div>
													<div class="blog-manager-content text-right">
														<p class="mb-0">Lorem ipsum dolor sit amet,</p>
														<hr>
														<p class="mb-0">Lorem ipsum dolor sit amet</p>
													</div>
												</div>
											</div>
											<div class="col-md-4 mb-5">
												<div class="blog-manager">
													<div class="bg-blogmanager">
														<img src="http://placehold.it/140x140/" alt="">
													</div>
													<div class="blog-manager-content text-right">
														<p class="mb-0">Lorem ipsum dolor sit amet,</p>
														<hr>
														<p class="mb-0">Lorem ipsum dolor sit amet</p>
													</div>
												</div>
											</div> -->
											<!-- <?php echo $value['detail']; ?> -->
											<!-- <div class="col-md-6">
												<img src="<?php echo $mdir.'upload/content/'.$manager->row[$picture1]; ?>" alt="" class="w-75">
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
		<!-- /tab -->
		<!-- tab -->
		<!-- <div class="tab-pane fade" id="history03" role="tabpanel" aria-labelledby="h-03">
			<div class="row">
				<div class="col-md-12 pl-0">
					<div>
						<img src="http://placehold.it/1920x2000/" alt="" class="w-100">
					</div>
				</div>
			</div>
		</div> -->
		<!-- /tab -->
		<!-- tab -->
		<!-- <div class="tab-pane fade" id="history04" role="tabpanel" aria-labelledby="h-04">
			<div class="row">
				<div class="col-md-12 pl-0">
					<div>
						<img src="http://placehold.it/1920x2000/" alt="" class="w-100">
					</div>
				</div>
			</div>
		</div> -->
		<!-- /tab -->
	</div>
				



	




	<!-- footer -->
	<?php
		require_once('inc/footer.php');
		require_once('inc/script.php'); 
	?>
	<script>
		$('#manager').addClass('active');
	</script>
	
</body>
</html>