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
				<?php $calendar_detail = $obj_db->content('ref_id = '.get('id').$hide_del_lan_order);
				// print_r($calendar_detail->row) ?>
				<div class="col-md-12 mb-3">
					<?php if ($calendar_detail->row[$picture1]) { ?>
						<img src="<?php echo $mdir.'upload/content/'.$calendar_detail->row[$picture1]; ?>" alt="" class="w-100">
					<?php } ?>
				</div>
				<div class="col-md-12 mb-5">
					<?php echo $calendar_detail->row['detail_2']; ?>
					<!-- <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid eius distinctio omnis modi. Maiores ipsum corporis, reprehenderit vero numquam asperiores omnis, nemo voluptatem natus ipsa tempore dignissimos, earum harum. Corporis!
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis nisi quos sit veritatis aliquam illo quae, beatae assumenda alias, maxime rem magnam, ea unde suscipit ipsam voluptatibus. Quidem qui, culpa!
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio amet vero aut perferendis fuga eveniet cumque veritatis saepe quod voluptas eos officia quo inventore architecto in repellat, beatae fugit ducimus?
					</p>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam itaque, iusto quaerat odit excepturi debitis molestiae ab. Quidem est aut id tempora quam, doloribus quae ipsa dolorum ipsum, laborum rem.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum nesciunt, vitae odit vero, aliquam repudiandae temporibus rerum minus officiis, perspiciatis dolores autem ad accusantium hic similique sint quisquam, dicta voluptates.
					</p> -->
				</div>
				<div class="col-md-12 mb-3">
					<div class="owl-carousel owl-theme">
						<?php $calendar_img = $obj_db->getdata('content_pic','pid = '.$calendar_detail->row['id']);
						foreach ($calendar_img->rows as $key => $value) { ?>
							<div class="item"><img src="<?php echo $mdir.'upload/gallery/'.$value[$picture1]; ?>" alt="" class="w-100"></div>
						<?php } ?>
						<!-- div class="item"><img src="http://placehold.it/1920x1080" alt="" class="w-100"></div>
						<div class="item"><img src="http://placehold.it/1920x1080" alt="" class="w-100"></div>
						<div class="item"><img src="http://placehold.it/1920x1080" alt="" class="w-100"></div>
						<div class="item"><img src="http://placehold.it/1920x1080" alt="" class="w-100"></div>
						<div class="item"><img src="http://placehold.it/1920x1080" alt="" class="w-100"></div> -->
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
		$('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:false,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:3
		        },
		        1000:{
		            items:5
		        }
		    }
		})
	</script>

</body>
</html>