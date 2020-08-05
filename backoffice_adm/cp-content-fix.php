<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');


$act = "";
if(isset($_GET['act'])){
    $act = $_GET['act'];
}
if(isset($_GET['fid'])){
    $fid = $_GET['fid'];
}
if(isset($_GET['seq'])){
    $seq = $_GET['seq'];
}
if(isset($_GET['cat'])){
    $cat = $_GET['cat'];
}
if(isset($_GET['calendar_day'])){
    $calendar_day = $_GET['calendar_day'];
}
$para = getpara('message,act,fid');
if($act!=""){
    if($obj_con->manage_child($act,$fid,$seq)){
        //header("Location: cp-content.php$para");
    }
}
if(isset($_GET['act2'])){
    if($_GET['act2']=="hot"){
        $obj_db->query("update ".PREFIX."content set show_hot = '$hot'  where id=$eid");
        header("Location:cp-content.php?cat=$cat");
    }
}
$get_cat = $obj_db->cat('ref_id='.(int)$_GET['cat'].$hide_del_lan_order)->row;

?>
<div id="wrapper">
<?php require_once('include/inc.header.php');?>
    <div id="page-wrapper">

        <div class="container-fluid">
          <!-- Page Heading -->
            <?php /*
				Error code
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							<?php echo empty($get_cat['lang_name'])?'Content':$get_cat['lang_name']; ?>
						</h1>
						<ol class="breadcrumb">
							<!-- <li>
							  <a href="main_cp.php">Dashboard</a>
							</li> -->
							<? if(empty($cat)){
								$head_table = "Main Categories";
								?>
							<li class="current"><i class="fa fa-dashboard"></i><a href="#"> Content List</a></li>
							<? }else{?>
							<li>
								  <i class="fa fa-dashboard"></i><a href="cp-content-cat.php"> Content List</a>
							</li>
							<? $obj_con->find_parent($cat)?>
							<li class="current"><a href="#"><?=$obj_con->showcatnameBC($cat)?></a></li>
							<? $head_table = $obj_con->showcatname($cat);}?>
						</ol>
					</div>
				</div>
			*/?>
            <!-- /.row -->
            <div class="row" style="min-height:500px;">
              <?php
				/*Error Code
				<div class="col-lg-12">
                <style>

                  body {
                    margin: 40px 10px;
                    padding: 0;
                    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
                    font-size: 14px;
                  }

                  #calendar {
                    max-width: 900px;
                    margin: 0 auto;
                  }

                </style>
                <!-- <?php if (in_array($_GET['cat'], $check_cat_calendar_arr_cat)) { ?>
                  <div id='calendar'></div>
                <?php } ?> -->
              </div>
				*/
			  ?>
              <div class="col-lg-12">
                <div class="text-right"><a href="cp-content-add-edit.php<?=$para?>" title="Add content here" class="btn btn-xs btn-info"><span><i class="fa fa-plus"></i></span></a></div>
                <br>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped datatable">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Category name</th>
                        <?php if (in_array($_GET['cat'], $check_cat_calendar_arr_cat)) { ?>
                          <th>day calendar start</th>
                          <th>day calendar end</th>
                        <?php } ?>
                        <th width="150">Sort</th>
                        <th width="150">Action</th>
                      </tr>
                    </thead>
					<tbody>
					<?php  
					$sqlC =  $obj_con->showchild($cat); 
					$count_rows = $sqlC->num_rows;
					if($count_rows>0){
					$i=1;
					while($FC=$sqlC->fetch_assoc()){
					$content_pic_result = $obj_db->select("content_pic","pid = '$FC[id]'");
					$num_pic = $content_pic_result->num_rows;
					$sql_language = $obj_con->getLanguageDetail('type=1 and ref_id='.(int)$FC['id'].' and language_id=1');
					$count_rows = $sql_language->num_rows;
					// print_r($sql_language);
					if($count_rows>0){
					$input_language = array();
					while($result_language=$sql_language->fetch_assoc()){
					$id_language='';
					if(!empty($result_language['id'])) {
					$id_language = $result_language['id'];
					}
					$id_language=$result_language['id'];
					$input_language = array(
					'name'          => $result_language['name'],
					);
					}
					}
					?>
					
					<?php }
					}else{ ?>
					<tr>
					<td colspan="100">No result</td>
					</tr>
					<?php  } ?>
					</tbody>
                  </table>
                  <div class="text-right"><a href="cp-content-add-edit.php<?=$para?>" title="Add content here" class="btn btn-xs btn-info"><span><i class="fa fa-plus"></i></span></a></div>
                </div>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php require_once('include/inc.footer.php');?>
<!-- <script src="asset/js/datatables.min.js"></script> -->
<!-- <script src="asset/js/moment.js"></script> -->
<!-- <script src="asset/js/pikaday.js"></script> -->
<!-- <script src="asset/js/select2.full.js"></script> -->
<script>
$(function(){
    
    $('.content').addClass('active');
    $('.btn-del').click(function(e){
      if(confirm('Do you want to delete')==true){
        window.location = $(this).attr('href');
      }else{
        e.preventDefault();
      }
    });
});
// $(document).ready(function(e){
//       $(".js-example-basic-multiple").select2();
//       $('#dateFilter').hide();
//       // $('#txtFilter').attr('disabled','false');
//       var colVal = "0";
//       var param = ""
//       var filterStart = new Pikaday({
//         field: $('#date_filterStart')[0],
//         onSelect: function(date) {
//           var formattedDate = this.getMoment().format('YYYY-MM-DD');
//         }
//       });

//       var filterEnd = new Pikaday({
//         field: $('#date_filterEnd')[0],
//         onSelect: function(date) {
//           var formattedDate = this.getMoment().format('YYYY-MM-DD');
//           table.draw();
//         }
//       });

//       var table = $('#tblBookingInfo').DataTable( {
//         "sPaginationType" : "full_numbers",
//         "bLengthChange" : true,
//         "iDisplayLength" : 10,
//         "bAutoWidth": true,
//         "columns": [
//           { "orderable": false },
//           { "orderable": false },
//           { "orderable": false },
//         ],
//         "bSort": true,
//         "order" : [[ 0, "desc" ]],
//         "dom" : 'rtip'
//       } );

//       // Filter by Date
      
//       $.fn.dataTableExt.afnFiltering.push(
//         function( oSettings, aData, iDataIndex ) {
//         var filterstart = $('#date_filterStart').val()
//         var filterend = $('#date_filterEnd').val()
//         var iStartDateCol = 1;
//         var iEndDateCol = 1;
//         var tabledatestart = aData[iStartDateCol];
//         var tabledateend= aData[iEndDateCol];

//           if ( !filterstart && !filterend ) {
//             return true;
//           } else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && filterend === "") {
//             return true;
//           } else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isAfter(tabledatestart)) && filterstart === "") {
//             return true;
//           } else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && (moment(filterend).isSame(tabledateend) || moment(filterend).isAfter(tabledateend))) {
//             return true;
//           }
//           return false;
//           }
//       );

//       $('.search-panel .dropdown-menu').find('a').click(function(e) {
//         e.preventDefault();
//         param = $(this).attr("href").replace("#","");
//         var concept = $(this).text();
//         $('.search-panel span#search_concept').text(concept);
//         $('.input-group #search_param').val(param);

//         if(param == "bookingid") {
//           colVal = "0";
//           $('#dateFilter').hide();
//           table.search('').columns().search('').draw();
//           $('#txtFilter').val("");
//         } else if(param == "date") {
//           $('#dateFilter').show();
//           table.search('').columns().search('').draw();
//           $('#txtFilter').val("");
//         } else if(param == "all") {
//           colVal = "";
//           $('#dateFilter').hide();
//           $('#txtFilter').val("");
//           table.search('').columns().search('').draw();
//         } else {
//           colVal = "";
//           $('#dateFilter').hide();
//           $('#txtFilter').val("");
//           table.search('').columns().search('').draw();
//         }
//       });

//         $('#txtFilter').keyup(function() {
//           var input = $(this).val();

//           // console.log("input" + input)
//           // console.log("colval" + colVal)
//           // console.log("param" + param)

//           if(param == "bookingid") {
//             table.column(colVal).search(input).draw();
//           } else if(param == "all") {
//             table.search(input).draw();            
//           } else {
//             table.search(input).draw();         
//           }
          
//         })
//   });



$(document).ready(function() {

  $('#calendar').fullCalendar({
    // editable: true,
    eventLimit: true, // allow "more" link when too many events
    eventColor: '#f36d21',
    // events: [
    //   {
    //     title: 'All Day Event',
    //     start: '2018-03-01'
    //   },
    //   {
    //     title: 'Long Event',
    //     start: '2018-03-07',
    //     end: '2018-03-10'
    //   },
    // ],
    events: {
      url: 'ajax/event_calendar.php',
      type: 'GET',
      data: {
        cat: '<?php echo get('cat'); ?>',
      },
      success:function(data){
        console.log(data)
      },
      error: function(data) {
        console.log("Unable to load events");
      }
    },
    dayClick: function(date, jsEvent, view) {
      d = date['_d'];
      var weekday = new Array(7);
      weekday[0] =  "Sunday";
      weekday[1] = "Monday";
      weekday[2] = "Tuesday";
      weekday[3] = "Wednesday";
      weekday[4] = "Thursday";
      weekday[5] = "Friday";
      weekday[6] = "Saturday";
      var day = weekday[d.getDay()];
      console.log(day);
      month = d.toLocaleString("en-us", { month: "short" });
      console.log(month);

      day = date.format()
      var get_cat = '<?php echo get('cat'); ?>'
      window.location.href = 'cp-content-add-edit.php?calendar_day='+day+'&cat='+get_cat;
  }
  });

});
</script>

