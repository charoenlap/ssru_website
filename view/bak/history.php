<html>
<head>
	<?php require_once('inc/head.php'); ?>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/header.php'); ?>

	

	<!-- content -->
	<section class="bg-gray mt-1">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">
							<div class="nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link tab-two active" id="h-01" data-toggle="pill" href="#history01" role="tab" aria-controls="history01" aria-selected="true">ประวัติความเป็นมา</a>
								<a class="nav-link tab-two" id="h-02" data-toggle="pill" href="#history02" role="tab" aria-controls="history02" aria-selected="false">ปรัชญา วิสัยทัศน์ พันธกิจ</a>
								<a class="nav-link tab-two" id="h-03" data-toggle="pill" href="#history03" role="tab" aria-controls="history03" aria-selected="false">อัตลักษณ์ เอกลักษณ์</a>
								<a class="nav-link tab-two" id="h-04" data-toggle="pill" href="#history04" role="tab" aria-controls="history04" aria-selected="false">ติดต่อคณะวิทยาการจัดการ</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9 mb-1 pl-0">
					<div class="tab-content" id="v-pills-tabContent">
						<!-- tab -->
      					<div class="tab-pane fade show active" id="history01" role="tabpanel" aria-labelledby="h-01">
							<div class="row">
								<div class="col-md-12">
									<div class="border-or">
										<img src="assets/images/history01.jpg" alt="" class="w-100">
									</div>
								</div>
							</div>
						</div>
						<!-- /tab -->
						<!-- tab -->
						<div class="tab-pane fade" id="history02" role="tabpanel" aria-labelledby="h-02">
							<div class="row">
								<div class="col-md-12">
									<div>
										<img src="assets/images/history02.jpg" alt="" class="w-100">
									</div>
								</div>
							</div>
						</div>
						<!-- /tab -->
						<!-- tab -->
						<div class="tab-pane fade" id="history03" role="tabpanel" aria-labelledby="h-03">
							<div class="row">
								<div class="col-md-12">
									<div class="border-or">
										<img src="assets/images/history03.jpg" alt="" class="w-100">
									</div>
								</div>
							</div>
						</div>
						<!-- /tab -->
						<!-- tab -->
						<div class="tab-pane fade" id="history04" role="tabpanel" aria-labelledby="h-04">
							<div class="row">
								<div class="col-md-12">
									<div>
										<img src="assets/images/history04.jpg" alt="" class="w-100">
									</div>
								</div>
							</div>
						</div>
						<!-- /tab -->
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
	

</body>
</html>