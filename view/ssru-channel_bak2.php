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
					<?php $vdo = $obj_db->cat('parent = '.get('id').$hide_del_lan_order);
					foreach ($vdo->rows as $key => $value) {?>
						<!-- <a href="<?php echo route('vdo','id='.get('id').'&cat='.$value['id']); ?>" class="btn btn-outline-dark rounded-0"><?php echo $value['lang_name']; ?></a> -->
						<a href="<?php echo getpara('cat').'&cat='.$value['id']; ?>" class="btn btn-outline-dark rounded-0"><?php echo $value['lang_name']; ?></a>
					<?php } ?>
					<!-- <a href="" class="btn btn-sm btn-outline-dark rounded-0">อาจารย์/บุคลากร</a>
					<a href="" class="btn btn-sm btn-outline-dark rounded-0">นักศึกษา</a>
					<a href="" class="btn btn-sm btn-outline-dark rounded-0">ศิษย์เก่า</a> -->
				</div>
			</div>
			<?php 
			if (get('cat')) {
				$vdos = $obj_db->content('cat = '.get('cat').$hide_del_lan_order)->rows; 
			} else {
				$vdos = $obj_db->cat('parent = '.get('id').$hide_del_lan_order)->rows;
				$vdos_temp = array();
				foreach ($vdos as $key => $value) {
					$temp = $obj_db->content('cat = '.$value['id'].$hide_del_lan_order)->rows; 
					// print_r($temp);exit();
					foreach ($temp as $key => $value) {
						$vdos_temp[] = $value;
					}
				}
				shuffle($vdos_temp);
				$vdos = $vdos_temp;

			}
			$vdos = array_chunk ($vdos,9);
			if (get('page')) {
				$page = get('page');
			} else {
				$page = 0;
			}
			// print_r($vdos); exit(); ?>
			<div class="row mb-5">
				<?php 
				foreach ($vdos[$page] as $key => $value) { ?>
					<div class="col-md-4 mb-4">
						<!-- <img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="" class="w-100">
						<label for=""><?php echo $value['lang_name']; ?></label>
						<p><?php echo $value['detail']; ?></p> -->

						<div class="card">
							<div class="card-img-top">
								<iframe width="100%" height="250" src="https://www.youtube.com/embed/<?php echo $value['link_url'] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							</div>
							<div class="card-body">
								<label for=""><?php echo $value['lang_name']; ?></label>
								<p><?php echo $value['detail']; ?></p>
								
							</div>
						</div>

					</div>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-md-12 ">
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">
							<li class="page-item"><a class="page-link" href="<?php echo $page==0?'':getpara('page').'&page='.($page-1); ?>">Previous</a></li>
							<?php foreach ($vdos as $key => $value) { ?>
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