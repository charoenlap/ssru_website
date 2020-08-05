<html>
<head>
	<?php require_once('inc/head.php'); ?>
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
	<?php require_once('inc/header.php'); ?>

	<section>
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-12 text-center mt-5">
					<div class="filter-button-group group">
						<button id="all" class="btn btn-outline-dark rounded-0 is-checked" data-filter="*">ALL</button>
						<?php $vdo = $obj_db->cat('parent = '.get('id').$hide_del_lan_order);
						foreach ($vdo->rows as $key => $value) {?>
						<button class="btn btn-outline-dark rounded-0" data-filter=".01"><?php echo $value['lang_name']; ?></button>
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
			$vdos = array_chunk ($vdos,15);
			if (get('page')) {
				$page = get('page');
			} else {
				$page = 0;
			}
			// print_r($vdos); exit(); ?>
			<div class="row">

				<div class="grid">
					<?php 
					foreach ($vdos[$page] as $key => $value) { ?>
					<div class="grid-item col-md-4 mb-5">
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




	<!-- footer -->
	<?php
		require_once('inc/footer.php');
		require_once('inc/script.php'); 
	?>
	<script>
		$(document).ready(function(){
		  $('#all').trigger('click');
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