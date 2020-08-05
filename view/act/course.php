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
				<h3 class="text-white mb-0"><?php echo $lan['course']; ?></h3>
			</div>
		</div>
	</div>
	<?php $lugsood = $obj_db->cat('ref_id = '.$head_cat[1]['id'].$hide_del_lan_order); ?>
	<section class="wow fadeInUp" data-wow-duration="1s">
		<img src="<?php echo $mdir.'upload/content/'.$lugsood->row[$picture1]; ?>" alt="" class="w-100">
	</section>
	<section class="wow fadeInUp" data-wow-duration="2s">
		<img src="<?php echo $mdir.'upload/content/'.$lugsood->row['picture2']; ?>" alt="" class="w-100">
	</section>
<?php 
	$event = $obj_db->cat('ref_id = '.$head_cat[1]['id'].$hide_del_lan_order)->row;
	// print_r($head_cat[0]['lang_name']); ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12 pt-4 pb-4 text-center">
					<h5 class="text-uppercase"><?php echo $head_cat[0]['lang_name']; ?></h5>
					<p class="mb-0"><?php echo cut_tag_p($event['detail']); ?> 
					<!-- <a href="<?php echo route('act/news-detail','id='.$event['id']); ?>"> <?php echo $lan['read_more']; ?></a> -->
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- <section class="position-relative wow fadeInUp" data-wow-duration="1s">
		<img src="assets/act/images/bg_course1.jpg" alt="" class="w-100">
		<div class="overlay-banner-one">
			<h1>หลักสูตรบัญชีบัณฑิต</h1>
			<h1>หลักสูตรปรับปรุง</h1>
			<h1>พ.ศ. 2559</h1>
		</div>
		<div class="overlay-banner-two">
			<h1>ชื่อสถาบันอุดมศึกษา <small>มหาวิทยาลับราชภัฎสวนสุนันทา</small></h1>
			<h1>คณะ/วิทยาเขต/ภาควิชา <small>คณะวิทยาการจัดการ</small></h1>
			<br>
			<h1>หมวดที่ 1 ข้อมูลทั่วไป</h1>
			<br>
			<h1>รหัสและชื่อหลักสูตร</h1>
			<h1><small>ภาษาไทย : หลักสูตรบัญชีบัณฑิต</small></h1>
			<h1><small>ภาษาอังกฤษ : Bachelor of Accountancy Program</small></h1>
			<br>
			<h1>ชื่อปริญญาและสาขาวิชา</h1>
			<h1><small>ชื่อเต็ม (ภาษาไทย) : บัญชีบัณฑิติ</small></h1>
			<h1><small>ชื่อย่อ (ภาษาไทย) : บช.บ.</small></h1>
			<h1><small>ชื่อเต็ม (ภาษาอังกฤษ) : Bachelor of Accountancy</small></h1>
			<h1><small>ชื่อย่อ (ภาษาอังกฤษ) : B.Acc.</small></h1>
			<br>
			<h1>จำนวนหน่วยกิตที่เรียนตลอดหลักสูตร</h1>
			<h1><small>ไม่น้อยกว่า 129 หน่วยกิต</small></h1>
		</div>
	</section>
	<section class="position-relative wow fadeInUp" data-wow-duration="2s">
		<img src="assets/act/images/bg_course2.jpg" alt="" class="w-100">
		<div class="overlay-banner-one">
			<h1 class="text-white">หลักสูตรบัญชีบัณฑิต</h1>
			<h1 class="text-white">หลักสูตรปรับปรุง</h1>
			<h1 class="text-white">พ.ศ. 2559</h1>
		</div>
		<div class="overlay-banner-two">
			<h1 class="text-theme">ชื่อสถาบันอุดมศึกษา <small>มหาวิทยาลับราชภัฎสวนสุนันทา</small></h1>
			<h1 class="text-theme">คณะ/วิทยาเขต/ภาควิชา <small>คณะวิทยาการจัดการ</small></h1>
			<br>
			<h1 class="text-theme">หมวดที่ 1 ข้อมูลทั่วไป</h1>
			<br>
			<h1 class="text-theme">รหัสและชื่อหลักสูตร</h1>
			<h1 class="text-theme"><small>ภาษาไทย : หลักสูตรบัญชีบัณฑิต</small></h1>
			<h1 class="text-theme"><small>ภาษาอังกฤษ : Bachelor of Accountancy Program</small></h1>
			<br>
			<h1 class="text-theme">ชื่อปริญญาและสาขาวิชา</h1>
			<h1 class="text-theme"><small>ชื่อเต็ม (ภาษาไทย) : บัญชีบัณฑิติ</small></h1>
			<h1 class="text-theme"><small>ชื่อย่อ (ภาษาไทย) : บช.บ.</small></h1>
			<h1 class="text-theme"><small>ชื่อเต็ม (ภาษาอังกฤษ) : Bachelor of Accountancy</small></h1>
			<h1 class="text-theme"><small>ชื่อย่อ (ภาษาอังกฤษ) : B.Acc.</small></h1>
			<br>
			<h1 class="text-theme">จำนวนหน่วยกิตที่เรียนตลอดหลักสูตร</h1>
			<h1 class="text-theme"><small>ไม่น้อยกว่า 129 หน่วยกิต</small></h1>
		</div>
	</section> -->




	<!-- footer -->
	<?php
		require_once('inc/act/footer.php');
		require_once('inc/act/script.php'); 
	?>
	<script>
		$('#course').addClass('active');
	</script>

</body>
</html>