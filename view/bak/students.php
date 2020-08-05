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
					<nav>
						<div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active w-50 text-center px-5 py-5 border-0" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><button class="btn btn-default">การสมัครเข้าศึกษาต่อ</button></a>
							<a class="nav-item nav-link w-50 text-center px-5 py-5 border-0" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><button class="btn btn-default">ค่าธรรมเนียม / ค่าใช้จ่ายในการศึกษา</button></a>
						</div>
					</nav>
					<div class="tab-content bg-white px-2" id="nav-tabContent">
						<div class="tab-pane fade show active pt-5" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<div class="row">
								<div class="col-md-12">
									<h3 class="text-center">มหาวิทยาลัยราชภัฏสวนสุนันทา</h3>
									<p class="text-center">ตารางสรุปปฏิทินการดำเนินงานรับสมัครนักศึกษาภาคปกติ/ภาคพิเศษ ระดับปริญาตรี ประจำปีการศึกษา 2562</p>
									<img src="assets/images/grap.jpg" alt="" class="w-100 mb-3">
									<p>หมายเหตุ * ความสามารถพิเศษ สอบสัมภาษณ์และสอบปฏิบัติวิชาเฉพาะทาง</p>
									<p>ที่ กิจกรรม รอบที่2</p>
									<p>วัน - เวลา ดำเนินการ</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade pt-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							<div class="row">
								<div class="col-md-12">
									<img src="http://placehold.it/1920x2000/" alt="" class="w-100">
								</div>
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

</body>
</html>