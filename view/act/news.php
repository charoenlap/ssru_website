<html>
<head>
	<?php require_once('inc/act/head.php'); ?>
	<style>
		.grid {
			width: 100%;
		}
		.grid-item {
			width: 100%;
			height: auto;
		}
		.is-checked {
		    color: #fff;
			background-color: #343a40;
			border-color: #343a40;
		}
	</style>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/act/header.php'); ?>

	<div class="bg-theme">
		<div class="container">
			<div class="col-md-12 text-center">
				<h3 class="text-white mb-0"><?php echo $lan['news']; ?></h3>
			</div>
		</div>
	</div>
	<section>
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-12 text-center mt-5">
					<div class="filter-button-group group">
						<button class="btn btn-outline-dark rounded-0 is-checked" id="all" data-filter="*" style="display: none;">ALL</button>
						<?php $vdo = $obj_db->cat('parent = '.get('id').$hide_del_lan_order);
						foreach ($vdo->rows as $key => $value) {?>
							<!-- <button class="btn btn-outline-dark rounded-0 " id="<?php echo $key==0?'all':''; ?>" data-filter=".<?php echo $value['id']; ?>"><?php echo $value['lang_name']; ?></button> -->
						<?php } ?>
						<!-- <button class="btn btn-outline-dark rounded-0" data-filter=".02">name two</button> -->
					</div>
				</div>
			</div>
			<?php 
			if (get('cat')) {
				$vdos = $obj_db->content('cat = '.get('cat').$hide_del_lan_order)->rows; 
			} else {
				$vdos = $obj_db->cat('parent = '.get('id').$hide_del_lan_order)->rows;
				$vdos_temp = array();
				$limit = '';
				if (get('limit')) {
					$limit = ' limit '.get('limit');
				}
				foreach ($vdos as $key => $value) {
					$temp = $obj_db->content('cat = '.$value['id'].$hide_del_lan_order.$limit)->rows; 
					// print_r($temp);exit();
					foreach ($temp as $key => $value) {
						$vdos_temp[] = $value;
					}
				}

				$check_branch = $obj_db->getdata('share_content','branch_id = '.$head_cat_id.' and type_name = "news"');
				foreach ($check_branch->rows as $key => $value) {
					$reslut = $obj_db->content('ref_id = '.$value['content_id'].' and hide = 0 and del = 0 and language_id = '.$lang_no.' and cat = 36');
					foreach ($reslut->rows as $key => $value) {
						$value['cat'] = '2253';
						$vdos_temp[] = $value;
					}
				}
				// shuffle($vdos_temp);
				$vdos = $vdos_temp;

			}
			// $vdos = array_chunk ($vdos,99);
			// if (get('page')) {
			// 	$page = get('page');
			// } else {
			// 	$page = 0;
			// }
			// print_r($vdos); ?>
			<div class="row">
				<div class="grid">
					<?php 
					foreach ($vdos as $key => $value) { ?>
						<div class="grid-item col-md-4 mb-5 <?php echo $value['cat'] ?>">
	                        <div class="card">
								<div class="card-imgz-top">
									<img src="<?php echo $mdir.'upload/content/'.$value[$picture1]; ?>" alt="" class="w-100 h200">
								</div>
								<div class="card-body h150">
									<label for=""><?php echo mb_strimwidth($value['lang_name'], 0, 40, "...","utf-8"); ?></label>
									<p><?php echo mb_strimwidth($value['detail'], 0, 80, "...","utf-8"); ?></p>	
								</div>
								<div class="card-footer bg-white">
									<a href="<?php echo route('news-detail','id='.$value['id']); ?>" class="btn btn-default btn-sm float-right btn-theme btn-arrow-left" target="_blank"><?php echo $lan['read_more']; ?></a>	
								</div>
							</div>
	                    </div>
                    <?php } ?>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-2">
					<div class="form-group input-group input-group-sm ">
						<label class="input-group-addon" for="input-limit">Show:</label>
						<select class="form-control" name="" onchange="location = this.value;">
							<option value="<?php echo getpara('limit').'&limit=5'; ?>" <?php echo get('limit')=='5'?'selected':''; ?> >5</option>
							<option value="<?php echo getpara('limit').'&limit=10'; ?>" <?php echo get('limit')=='10'?'selected':''; ?> >10</option>
							<option value="<?php echo getpara('limit').'&limit=20'; ?>" <?php echo get('limit')=='20'?'selected':''; ?> >20</option>
							<option value="<?php echo getpara('limit').'&limit=30'; ?>" <?php echo get('limit')=='30'?'selected':''; ?> >30</option>
							<option value="<?php echo getpara('limit').'&limit=40'; ?>" <?php echo get('limit')=='40'?'selected':''; ?> >40</option>
							<option value="<?php echo getpara('limit').'&limit=50'; ?>" <?php echo get('limit')=='50'?'selected':''; ?> >50</option>
						</select>
					</div>
				</div>
			</div>

		</div>
	</section>




	<!-- footer -->
	<?php
		require_once('inc/act/footer.php');
		require_once('inc/act/script.php'); 
	?>
	<script>
		$('#news').addClass('active');

		$(document).ready(function(){
			// setTimeout(function(){ 
				$('#all').trigger('click');
			// }, 300);
		  
		});
		//***ISOTOPE***
        // init Isotope
        var $grid = $('.grid').isotope({
          	itemSelector: '.grid-item',     
          	layoutMode: 'masonry'
        });


        // filter items on button click
        $('.filter-button-group').on( 'click', 'button', function() {
          	var filterValue = $(this).attr('data-filter');
          	$grid.isotope({ filter: filterValue });
        });


        // change is-checked class on buttons
        $('.group').each( function( i, buttonGroup ) {
          	var $buttonGroup = $( buttonGroup );
          	$buttonGroup.on( 'click', 'button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $( this ).addClass('is-checked');
          });
        });
	</script>
</body>
</html>