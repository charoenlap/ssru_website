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
                        Dashboard
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="main_cp.php">Backoffice</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php require_once('include/inc.footer.php');?>

<script>
$(function(){
    $('.main_cp').addClass('active');
});
</script>
