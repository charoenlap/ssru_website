<?php require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); ?>
<?php require_once('include/inc.head.php');?>
<?php
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if(isset($_GET['act'])){
            if($_GET['act']=="contact"){
                $update = array(
                    'readed' => $_GET['type']
                );
                $obj_db->update(PREFIX.'contact',$update,'id='.$_GET['id']);
            }
        }
    }
?>
<div id="wrapper">
<?php require_once('include/inc.header.php');?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Member
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="main_cp.php">Backoffice</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> Member
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Member</h3>
                    </div>
                    <div class="panel-body" style="overflow: auto;">
                      <table class="table table-striped" id="tblBookingInfo">
                        <thead>
                          <tr>
                            <th>no</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>เลขสมาชิก</th>
                            <th>ประเทศที่มา</th>
                            <th>course</th>
                            <th>E-mail</th>
                            <th>โทร</th>
                            <th>Status ชำระเงิน</th>
                            <!-- <th>รูป</th> -->
                            <th>action</th>
                          </tr>
                        </thead>
                        <div class="row">
                          <div class="col-md-8 col-md-offset-2">
                            <div class="input-group">
                              <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default">
                                  <span>Filter by</span>
                                </button>
                                <!-- <ul class="dropdown-menu" role="menu">
                                  <li><a href="#bookingid">Booking ID</a></li>
                                  <li><a href="#date">Date</a></li>
                                  <li class="divider"></li>
                                  <li><a href="#all">Anything</a></li>
                                </ul> -->
                              </div>
                              <!-- <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                  <span id="search_concept">Filter by</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#bookingid">Booking ID</a></li>
                                  <li><a href="#date">Date</a></li>
                                  <li class="divider"></li>
                                  <li><a href="#all">Anything</a></li>
                                </ul>
                              </div> -->
                              <input type="hidden" name="search_param" value="all" id="search_param">
                              <input type="text" class="form-control" id="txtFilter" name="x" placeholder="Search...">
                              <i class="glyphicon glyphicon-search form-control-feedback"></i>
                            </div>
                          </div>
                        </div>
                        <div class="row" id="dateFilter" style="margin-top: 2%">
                          <div class="col-md-4 col-md-offset-2">
                            <input type="text" id="date_filterStart" class="form-control" placeholder="Start Date..">
                          </div>
                          <div class="col-md-4">
                            <input type="text" id="date_filterEnd" class="form-control" placeholder="End Date..">
                          </div>
                        </div>
                        <tbody>
                          <?php
                          // $result_member = $obj_db->getdata('user','user_status = 1 and del = 0');
                          $result_member = api('get_tb_user');

                          foreach ($result_member->rows as $key => $value) { ?>
                            <tr>
                              <td><?php echo $key+1; ?></td>
                              <td><?php echo $value->name; ?> <?php echo $value->lname; ?></td>
                              <td><?php echo $value->member_gen_id; ?></td>
                              <td>
                              <?php 
                              $result_country = api('getdata/country'); 
                              foreach ($result_country->rows as $key => $value_country) {
                                if ($value_country->country_id==$value->country_id) {
                                   echo $value_country->country_name;
                                 } 
                              }
                              ?>
                              </td>
                              <td><?php echo $value->course;?></td>
                              <td><?php echo $value->email; ?></td>
                              <td><?php echo $value->phone; ?></td>
                              <td><?php echo $value->user_status; ?></td>
                              <!-- <td>
                                <?php 
                                // $json_img_id = json_decode($value['food_img_id']);
                                // $arr = array();
                                  // foreach ($json_img_id as $key_1 => $value_1) {
                                  //   $arr[] = $value_1['food_img_id'];
                                  // }
                                  // print_r($value['food_img_id']);
                                  ?>
                                <select class="js-example-basic-multiple" name="" multiple="multiple">
                                <?php $result_img = $obj_db->getdata('food_img'); 
                                foreach ($result_img->rows as $key_2 => $value_2) { ?>
                                  <option value="<?php echo $value_2['food_img_id']; ?>"><?php echo $value_2['img_name']; ?></option>
                                  
                                <?php } ?>
                                </select>

                              </td> -->
							
                              <td>
                                <a href="view-booking.php?id=<?php echo $value->booking_id; ?>" class="btn btn-success btn-xs">View</a> &nbsp;
                                <a href="cp-user-detail.php?id=<?php echo $value->user_id; ?>" class="btn btn-primary btn-xs">Edit</a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php require_once('include/inc.footer.php');?>
<?php /*
 <!-- Morris Charts JavaScript -->
<script src="asset/js/plugins/morris/raphael.min.js"></script>
<script src="asset/js/plugins/morris/morris.min.js"></script>
<script src="asset/js/plugins/morris/morris-data.js"></script>
 <!-- Flot Charts JavaScript -->
<!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
<script src="asset/js/plugins/flot/jquery.flot.js"></script>
<script src="asset/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="asset/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="asset/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="asset/js/plugins/flot/flot-data.js"></script>
*/ ?>
<script src="asset/js/datatables.min.js"></script>
<script src="asset/js/moment.js"></script>
<script src="asset/js/pikaday.js"></script>
<script src="asset/js/select2.full.js"></script>
<script type="text/javascript">
  $(document).ready(function(e){
      $(".js-example-basic-multiple").select2();
      $('#dateFilter').hide();
      // $('#txtFilter').attr('disabled','false');
      var colVal = "0";
      var param = ""
      var filterStart = new Pikaday({
        field: $('#date_filterStart')[0],
        onSelect: function(date) {
          var formattedDate = this.getMoment().format('YYYY-MM-DD');
        }
      });

      var filterEnd = new Pikaday({
        field: $('#date_filterEnd')[0],
        onSelect: function(date) {
          var formattedDate = this.getMoment().format('YYYY-MM-DD');
          table.draw();
        }
      });

      var table = $('#tblBookingInfo').DataTable( {
        "sPaginationType" : "full_numbers",
        "bLengthChange" : true,
        "iDisplayLength" : 10,
        "bAutoWidth": true,
        "columns": [
          { "orderable": false },
          { "orderable": false },
          { "orderable": false },
          { "orderable": false },
          { "orderable": false },
          { "orderable": false },
          { "orderable": false },
          { "orderable": false },
          { "orderable": false }
        ],
        "bSort": true,
        "order" : [[ 0, "desc" ]],
        "dom" : 'rtip'
      } );

      // Filter by Date
      
      $.fn.dataTableExt.afnFiltering.push(
        function( oSettings, aData, iDataIndex ) {
        var filterstart = $('#date_filterStart').val()
        var filterend = $('#date_filterEnd').val()
        var iStartDateCol = 1;
        var iEndDateCol = 1;
        var tabledatestart = aData[iStartDateCol];
        var tabledateend= aData[iEndDateCol];

          if ( !filterstart && !filterend ) {
            return true;
          } else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && filterend === "") {
            return true;
          } else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isAfter(tabledatestart)) && filterstart === "") {
            return true;
          } else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && (moment(filterend).isSame(tabledateend) || moment(filterend).isAfter(tabledateend))) {
            return true;
          }
          return false;
          }
      );

      $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);

        if(param == "bookingid") {
          colVal = "0";
          $('#dateFilter').hide();
          table.search('').columns().search('').draw();
          $('#txtFilter').val("");
        } else if(param == "date") {
          $('#dateFilter').show();
          table.search('').columns().search('').draw();
          $('#txtFilter').val("");
        } else if(param == "all") {
          colVal = "";
          $('#dateFilter').hide();
          $('#txtFilter').val("");
          table.search('').columns().search('').draw();
        } else {
          colVal = "";
          $('#dateFilter').hide();
          $('#txtFilter').val("");
          table.search('').columns().search('').draw();
        }
      });

        $('#txtFilter').keyup(function() {
          var input = $(this).val();

          console.log("input" + input)
          console.log("colval" + colVal)
          console.log("param" + param)

          if(param == "bookingid") {
            table.column(colVal).search(input).draw();
          } else if(param == "all") {
            table.search(input).draw();            
          } else {
            table.search(input).draw();         
          }
          
        })
  });

</script>

<script>
$(function(){
    $('.cp_member').addClass('active');
});
</script>
