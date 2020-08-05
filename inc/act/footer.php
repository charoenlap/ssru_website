<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<h5 class="text-white font-weight-bold"><?php echo $lan['inform_system']; ?></h5>
				<ul class="list-unstyled">
					<li><a href="http://bi.ssru.ac.th/" class="text-white"><?php echo $lan['inform_system']; ?></a></li>
					<li><a href="https://mail.google.com/mail/u/0/" class="text-white"><?php echo $lan['ssru_mail']; ?></a></li>
					<li><a href="https://vpn2.ssru.ac.th" class="text-white"><?php echo $lan['vpn']; ?></a></li>
					<li><a href="http://erp.ssru.ac.th/login.php" class="text-white"><?php echo $lan['erp']; ?></a></li>
					<li><a href="<?php echo route('website'); ?>" class="text-white"><?php echo $lan['teacher_website']; ?></a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<h5 class="text-white font-weight-bold"><?php echo $lan['fms_name']; ?></h5>
				<ul class="list-unstyled">
					<li><a href="http://www.research.fms.ssru.ac.th/index.php/th/home" class="text-white" target="_blank"><?php echo $lan['footer-research']; ?></a></li>
					<li><a href="http://qa.fms.ssru.ac.th/home" class="text-white" target="_blank"><?php echo $lan['pdad']; ?> </a></li>
					<li><a href="http://journal.jms.ssru.ac.th/" class="text-white" target="_blank"><?php echo $lan['jms']; ?></a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<h5 class="text-white font-weight-bold"><?php echo $lan['questionnaire']; ?></h5>
				<ul class="list-unstyled">
					<li><a href="http://poll.ssru.ac.th/login.php" class="text-white"><?php echo $lan['questionnaire_online']; ?> </a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<h5 class="text-white font-weight-bold"><?php echo $lan['other']; ?></h5>
				<ul class="list-unstyled">
					<!-- <li><a href="" class="text-white"><?php echo $lan['other_agency']; ?></a></li>
					<li><a href="" class="text-white"><?php echo $lan['down_report']; ?></a></li> -->
					<li><a href="<?php echo route('index','head_cat_id=1') ?>" class="text-white"><?php echo $lan['website'].$lan['fms_name']; ?> </a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-right">
				<div class="">
					<a href="<?php echo $con_setting[3]['link_url']; ?>"><i class="fa fa-facebook text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[4]['link_url']; ?>"><i class="fa fa-instagram text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[5]['link_url']; ?>"><i class="fa fa-skype text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[6]['link_url']; ?>"><i class="fa fa-twitter text-white mr-3" aria-hidden="true"></i></a>
					<a href="<?php echo $con_setting[7]['link_url']; ?>"><i class="fa fa-youtube text-white mr-3" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>

	</div>
	<!-- <span class="text-center" style="display: block;">Copyright by <a href="http://friendlysoftpro.com" class="color_hide_footer" target="_bank">Friendlysoftpro Tik</a></span> -->
</footer>

<?php require_once('inc/modal.php');  ?>