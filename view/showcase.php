<html>
<head>
	<?php require_once('inc/head.php'); ?>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/header.php'); ?>

	

	<!-- content -->
	<section>
		<div class="container">

			<div class="row">
				<div class="col-md-12 text-center my-3">
					<a href="<?php echo getpara('cat'); ?>" class="btn btn-outline-dark rounded-0">ทั้งหมด</a>
					<?php $showcase = $obj_db->cat('parent = '.get('id').$hide_del_lan_order);
					foreach ($showcase->rows as $key => $value) {?>
						<!-- <a href="<?php echo route('showcase','id='.get('id').'&cat='.$value['id']); ?>" class="btn btn-sm btn-outline-dark rounded-0"><?php echo $value['lang_name']; ?></a> -->
						<a href="<?php echo getpara('cat').'&cat='.$value['id']; ?>" class="btn btn-outline-dark rounded-0"><?php echo $value['lang_name']; ?></a>
					<?php } ?>
					<!-- <a href="" class="btn btn-sm btn-outline-dark rounded-0">อาจารย์/บุคลากร</a>
					<a href="" class="btn btn-sm btn-outline-dark rounded-0">นักศึกษา</a>
					<a href="" class="btn btn-sm btn-outline-dark rounded-0">ศิษย์เก่า</a> -->
				</div>
			</div>
			<?php 
			if (get('cat')) {
				$showcases = $obj_db->content('cat = '.get('cat').$hide_del_lan_order)->rows; 
			} else {
				$showcases = $obj_db->cat('parent = '.get('id').$hide_del_lan_order)->rows;
				$showcases_temp = array();
				foreach ($showcases as $key => $value) {
					$temp = $obj_db->content('cat = '.$value['id'].$hide_del_lan_order)->rows; 
					// print_r($temp);exit();
					foreach ($temp as $key => $value) {
						$showcases_temp[] = $value;
					}
				}
				shuffle($showcases_temp);
				$showcases = $showcases_temp;

			}
			if (get('page')) {
				$page = get('page');
			} else {
				$page = 0;
			}
			$showcases = array_chunk ($showcases,3);
			// print_r($showcases); exit(); ?>
			<div class="row mb-5">
				<div class="col-md-12">
					<img src="<?php echo $mdir.'upload/content/'.$showcases[$page][0][$picture1]; ?>" alt="" class="w-100">
					<label for=""><?php echo $showcases[$page][0]['lang_name']; ?></label>
					<p><?php echo $showcases[$page][0]['detail']; ?></p>
				</div>
			</div>
			
			<div class="row mb-5">
				<?php 
				unset($showcases[$page][0]);
				foreach ($showcases[$page] as $key => $value) { ?>
					<div class="col-md-6">
						<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="" class="w-100">
						<label for=""><?php echo $value['lang_name']; ?></label>
						<p><?php echo $value['detail']; ?></p>

					</div>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-md-12 ">
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">
							<li class="page-item"><a class="page-link" href="<?php echo $page==0?'':getpara('page').'&page='.($page-1); ?>">Previous</a></li>
							<?php foreach ($showcases as $key => $value) { ?>
								<li class="page-item"><a class="page-link" href="<?php echo getpara('page').'&page='.$key; ?>"><?php echo $key+1; ?></a></li>
							<?php } ?>
							<li class="page-item"><a class="page-link" href="<?php echo $page==$key?'':getpara('page').'&page='.($page+1); ?>">Next</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>
			<!-- <div class="row mb-5">
				<div class="col-md-6">
					<img src="assets/images/img01.jpg" alt="" class="w-100">
					<label for="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore eligendi sit natus voluptate laboriosam perspiciatis minus, modi soluta aspernatur magnam rerum provident! Consequatur animi esse non rerum earum sint blanditiis.</label>
				</div>
				<div class="col-md-6">
					<img src="assets/images/img01.jpg" alt="" class="w-100">
					<label for="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore eligendi sit natus voluptate laboriosam perspiciatis minus, modi soluta aspernatur magnam rerum provident! Consequatur animi esse non rerum earum sint blanditiis.</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 ">
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">
							<li class="page-item"><a class="page-link" href="#">Previous</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
					</nav>
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