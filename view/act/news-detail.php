<html>

<?php 
$news_content = $obj_db->content('ref_id = '.get('id').$hide_del_lan_order);

$og_url = route(get('route'),'id='.$news_content->row['id']);
$og_title = $news_content->row['lang_name'];
$og_description = cut_tag_p($news_content->row['detail']);
$og_image = $mdir.'upload/content/'.$news_content->row[$picture1]; ?>

<head>
	<?php require_once('inc/act/head.php'); ?>
	<style>
		.owl-nav.disabled {
			display: block !important;
		}
		.owl-nav {
			position: absolute;
			top: 35%;
			width: 100%;
		}
		.owl-carousel .owl-nav button.owl-prev {
			float: left;
			margin-left: -25px;
		}
		.owl-carousel .owl-nav button.owl-next {
			float: right;
			margin-right: -25px;
		}
	</style>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/act/header.php'); ?>

	

	<!-- content -->
	<section class="pt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-3">
					<img src="<?php echo $mdir.'upload/content/'.$news_content->row[$picture1]; ?>" alt="" class="w-100">
				</div>
				<div class="col-md-12 mb-5">
					<h3><?php echo $news_content->row['lang_name']; ?></h3>
					<?php echo $news_content->row['detail_2']; ?>
					<?php if (!empty($news_content->row['picture2'])) { ?>
						<p>ดาวน์โหลด ไฟล์ PDF <a href="<?php echo $mdir.'upload/content/'.$news_content->row['picture2']; ?>" download> คลิ๊ก</a></p>
					<?php } ?>
					<div class="shere text-right">
						<div class="fb-share-button" data-href="<?php echo $link_share; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"></div>
						<g:plus action="share" href="<?php echo $og_url; ?>"></g:plus>
					</div>
				</div>
				<div class="col-md-12 mb-3">
					<!-- <div class="owl-carousel owl-theme">
						<?php $news_content_img = $obj_db->getdata('content_pic','pid = '.get('id'));
						foreach ($news_content_img->rows as $key => $value) { ?>
							<div class="item"><img src="<?php echo $mdir.'upload/gallery/'.$value[$picture1]; ?>" alt="" class="w-100"></div>
						<?php } ?>
					</div> -->
				</div>
			</div>
		</div>
	</section>
	<div class="container mb-5">
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel owl-theme popup-gallery">
					<?php $news_content_img = $obj_db->getdata('content_pic','pid = '.get('id'));
					foreach ($news_content_img->rows as $key => $value) { ?>
						<div class="item"><a href="<?php echo $mdir.'upload/gallery/'.$value[$picture1]; ?>" title="Title"><img src="<?php echo $mdir.'upload/gallery/'.$value[$picture1]; ?>" class="w-100"></a></div>
					<?php } ?>
					<!-- <div class="item"><a href="assets/images/2.jpg" title="The Cleaner"><img src="assets/images/2.jpg" class="w-100"></a></div>
					<div class="item"><a href="assets/images/3.jpg" title="The Cleaner"><img src="assets/images/3.jpg" class="w-100"></a></div>
					<div class="item"><a href="assets/images/4.jpg" title="The Cleaner"><img src="assets/images/4.jpg" class="w-100"></a></div>
					<div class="item"><a href="assets/images/5.jpg" title="The Cleaner"><img src="assets/images/5.jpg" class="w-100"></a></div> -->
					<!-- <div class="item"><img src="assets/images/1.jpg" alt="" class="w-100"></div>
					<div class="item"><img src="assets/images/2.jpg" alt="" class="w-100"></div>
					<div class="item"><img src="assets/images/3.jpg" alt="" class="w-100"></div>
					<div class="item"><img src="assets/images/4.jpg" alt="" class="w-100"></div>
					<div class="item"><img src="assets/images/5.jpg" alt="" class="w-100"></div> -->
				</div>

			</div>
		</div>
	</div>


	




	<!-- footer -->
	<?php
		require_once('inc/act/footer.php');
		require_once('inc/act/script.php'); 
	?>
	<script>
		$('.owl-carousel').owlCarousel({
			items:5,
		    // loop:true,
		    margin:10,
		    autoplay:true,
		    autoplayTimeout:5000,
		    autoplayHoverPause:true,
		    dots:false,
		    nav:true,
		    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
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
		$(document).ready(function() {
			$('.popup-gallery').magnificPopup({
				delegate: 'a',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
					titleSrc: function(item) {
						// return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
					}
				}
			});
		});
	</script>

</body>
</html>