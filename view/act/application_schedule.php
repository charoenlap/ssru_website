<html>
<head>
	<?php require_once('inc/act/head.php'); ?>
</head>
<body>
	
	<!-- header -->
	<?php require_once('inc/act/header.php'); ?>
	<style>
		table th {
			background-color: #<?php echo $color; ?>;
			color:white;
		}
	</style>
	

	<!-- content -->
	<div class="bg-theme">
		<div class="container">
			<div class="col-md-12 text-center">
				<h3 class="text-white mb-0"><?php echo $lan['Application_schedule']; ?></h3>
			</div>
		</div>
	</div>
	
	<section class="mt-3 wow fadeInUp" data-wow-duration="1s">
		<?php $kubnod = $obj_db->content('ref_id = 38'.$hide_del_lan_order); ?>
		<?php echo $kubnod->row['detail_2']; ?>
		<!-- <div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="text-theme font-weight-bold">ตารางสรุปปฎิทินการดำเนินงานรับสมัครนักศึกษาภาคปกติ/ภาคพิเศษ ระดับปริญญาตรี ประจำปีการศึกษา 2562</h2>
				</div>
				<div class="col-md-12">
					<table class="table table-bordered">
						<thead>
							<tr class="bg-theme">
								<th class="text-white" rowspan="4">ที่</th>
								<th class="text-white" rowspan="4">กิจกรรม</th>
								<th class="text-white text-center" colspan="7">วันเวลาดำเนินการ</th>
							</tr>
							<tr class="bg-theme">
								<th class="text-white text-center" colspan="6">ภาคปกติ</th>
								<th class="text-white text-center">ภาคพิเศษ</th>
							</tr>
							<tr class="bg-theme">
								<th class="text-white text-center" rowspan="2">รอบที่ 1 (Portfolio)</th>
								<th class="text-white text-center" colspan="2">รอบที่ 2 (Quota)</th>
								<th class="text-white text-center" rowspan="2">รอบที่ 3 รับตรงร่วมกัน (ผ่าน TCAS)</th>
								<th class="text-white text-center" rowspan="2">รอบที่ 4 Admission (ผ่าน TCAS      )</th>
								<th class="text-white text-center" rowspan="2">รอบที่ 5 รับตรงอิสระ</th>
								<th class="text-white text-center" rowspan="2">รุ่น 18 (ภาคเรียนที่ 1 /2562)</th>
							</tr>
							<tr class="bg-theme">
								<th class="text-white text-center">ประเภทความสามารถทางวิชาการและพิเศษ</th>
								<th class="text-white text-center">ประเภททุนเพชรสุนันทา</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1.</td>
								<td>รับสมัครทางอินเตอร์เน็ตที่ <a href="">www.ssru.ac.th</a>, <a href="">www.admission.ssru.ac.th</a></td>
								<td>1-15 ธ.ค. 61</td>
								<td>4 ก.พ.-23 มี.ค. 62</td>
								<td>4 ก.พ.-23 มี.ค. 62</td>
								<td>17-29 เม.ย. 62</td>
								<td>9-19 พ.ค. 62 </td>
								<td>30 พ.ค.-10 มิ.ย. 62</td>
								<td>1 เม.ย.-30 มิ.ย. 62</td>
							</tr>
							<tr>
								<td>2.</td>
								<td>ประกาศรายชื่อผู้มีสิทธิ์สอบคัดเลือก พร้อมห้องสอบสัมภาษณ์</td>
								<td>25 ธ.ค. 61      </td>
								<td>28 มี.ค 62</td>
								<td>28 มี.ค 62  </td>
								<td>9 พ.ค. 62 </td>
								<td>29 พ.ค. 62</td>
								<td></td>
								<td>4 ก.ค. 62 </td>
							</tr>
							<tr>
								<td>3.</td>
								<td>สอบสัมภาษณ์/สอบปฎิบัติวิชาเฉพาะทาง (โควตาความสามารถพิเศษ)*</td>
								<td></td>
								<td>4 เม.ย. 62 </td>
								<td>4 เม.ย. 62 </td>
								<td></td>
								<td></td> 
								<td></td>
								<td></td>
							</tr>
							<tr class="bg-theme">
								<th class="text-white">4.</th>
								<th class="text-white">สอบสัมภาษณ์พรอมยื่น Portfolio</th>
								<th class="text-white">10-11 ม.ค. 62</th>
								<th class="text-white">4 เม.ย. 62</th>
								<th class="text-white">4 เม.ย. 62</th>
								<th class="text-white">14 พ.ค. 62</th>
								<th class="text-white">4 มิ.ย. 62</th>
								<th class="text-white">12 มิ.ย. 62</th>
								<th class="text-white">14 ก.ค. 2562</th>
							</tr>
							<tr>
								<td>5.</td>
								<td>สอบปฎิบัติวิชาเฉพาะทาง (ถ้ามี)</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>6.</td>
								<td>ส่งข้อมูลผู้ผ่านการคัดเลือกในรอบที่</td>
								<td>1-5 เข้าระบบ TCAS</td>
								<td>26 ม.ค. 62</td>
								<td>22 เม.ย. 62</td>
								<td>22 เม.ย. 62</td>
								<td>15 พ.ค. 62</td>
								<td>6 มิ.ย. 62</td>
								<td>15 มิ.ย. 62 </td>
							</tr>
							<tr>
								<td>7.</td>
								<td>ส่งข้อมูลผู้ผ่านการคัดเลือกหลักสูตรนานาชาติรอบที่</td>
								<td>1-5 เข้าระบบ TCAS</td>
								<td>26 ม.ค. 62 </td>
								<td>22 เม.ย. 62</td>
								<td>22 เม.ย. 62 </td>
								<td>15 ,b.p. 62</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>8.</td>
								<td>ประกาศรายชื่อผู้ผ่านการสอบสัมภาษณ์</td>
								<td>28 ม.ค. 62</td>
								<td>24 เม.ย. 62 </td>
								<td>24 เม.ย. 62</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr class="bg-theme">
								<th class="text-white">9.</th>
								<th class="text-white">ยืนยันสิทธิ์ Clearing House (ผ่านเว็บไซต์ TCAS)</th>
								<th class="text-white">30-31 ม.ค. 62</th>
								<th class="text-white">24-25 เม.ย. 62</th>
								<th class="text-white">24-25 เม.ย. 62 </th>
								<th class="text-white">ไม่มี</th>
								<th class="text-white"></th>
								<th class="text-white">17-18 มิ.ย. 62</th>
								<th class="text-white">       </th>
							</tr>
							<tr>
								<td>10.</td>
								<td>ประกาศรายชื่อผู้มีสิทธิ์เข้าศึกษา</td>
								<td>5 ก.พ. 62</td>
								<td>27 เม.ย. 62 </td>
								<td>27 เม.ย. 62</td>
								<td>17 พ.ค. 62  </td>
								<td>7 มิ.ย. 62</td>
								<td>20 มิ.ย. 62</td>
								<td>17 ก.ค. 62</td>
							</tr>
							<tr>
								<td>11.</td>
								<td>ดาวน์โหลดเอกสารรายงานตัวและบันทึกประวัตินักศึกษา ที่ <a href="">www.ssru.ac.th</a>, <a href="">www.reg.ssru.ac.th</a></td>
								<td>6-19 ก.พ. 62</td>
								<td>28 เม.ย. -7 พ.ค. 62 </td>
								<td>28 เม.ย. -7 พ.ค. 62 </td>
								<td>18-22 พ.ค. 62</td>
								<td>8-25 มิ.ย. 62</td>
								<td>21-25 มิ.ย. 62</td>
								<td>18-20 ก.ค. 62</td>
							</tr>
							<tr>
								<td>12.</td>
								<td>รายงานตัวและทำสัญญาทุนเพชรสุนันทา</td>
								<td></td>
								<td>23 พ.ค. 62 </td>
								<td>23 พ.ค. 62</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td> 
							</tr>
							<tr class="bg-theme">
								<th class="text-white">13.</th>
								<th class="text-white">รายงานตัวและชำระค่าธรรมเนียมเข้าศึกษา</th>
								<th class="text-white">20-21 ก.พ. 62</th>
								<th class="text-white">23-24 พ.ค. 62</th>
								<th class="text-white">23-24 พ.ค. 62</th>
								<th class="text-white">23-24 พ.ค. 62</th>
								<th class="text-white">26-27 มิ.ย. 62</th>
								<th class="text-white">26-27 มิ.ย. 62</th>
								<th class="text-white">21 ก.ค. 62</th>
							</tr> 
							<tr>
								<td>14.</td>
								<td>การปฐมนิเทศ</td>
								<td>(รอประกาศ)</td>
								<td>(รอประกาศ) </td>
								<td>(รอประกาศ)</td>
								<td>(รอประกาศ)</td>
								<td>(รอประกาศ)</td>
								<td>(รอประกาศ)</td>
								<td>(รอประกาศ)</td>
							</tr>
							<tr>
								<td>15.</td>
								<td>ลงทะเบียนเรียน (ติดต่อคณะ/วิทยาลัย)</td>
								<td>15 ส.ค. 62</td>
								<td>15 ส.ค. 62 </td>
								<td>15 ส.ค. 62</td>
								<td>15 ส.ค. 62</td>
								<td>15 ส.ค. 62</td>
								<td>15 ส.ค. 62</td>
								<td>17  ส.ค. 62</td>
							</tr>
							<tr>
								<td>16.</td>
								<td>เปิดภาคเรียน</td>
								<td>15 ส.ค. 62</td>
								<td>15 ส.ค. 62 </td>
								<td>15 ส.ค. 62</td>
								<td>15 ส.ค. 62</td>
								<td>15 ส.ค. 62</td>
								<td>15 ส.ค. 62</td>
								<td>17  ส.ค. 62</td>
							</tr>
						</tbody> 
					</table>
					<p class="font-weight-bold">หมายเหตุ * ความสามารถพิเศษ สอบสัมภาษณ์และสอบปฎิบัติวิชาเฉพาะทาง</p>
					<p class="font-weight-bold">ที่ กิจกรรม รอบที่2 (Quota)</p>
					<p class="font-weight-bold">วัน - เวลา ดำเนินการ</p>
				</div>
			</div>
		</div> -->
	</section>


	




	<!-- footer -->
	<?php
		require_once('inc/act/footer.php');
		require_once('inc/act/script.php'); 
	?>
	<script>
		$('#application_schedule').addClass('active');
	</script>

</body>
</html>