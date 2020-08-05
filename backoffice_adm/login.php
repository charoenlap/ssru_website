<?php 
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../required/connect.php'); 
$textresult = "";
$login = "";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$login = $_POST["login"];
	$password = $_POST["password"]; 
	$remMe = $_POST["remMe"]; 
	$_SESSION["euser"] = base64url_encode($login);
	$_SESSION["epass"] = base64url_encode($password);
    $textresult = "The username or password is incorrect.";
	if(check()){
        // $result_check = check();
        // echo 'result_check ' . $result_check;
		header("Location: main_cp.php");
	}
}else{
    unset($_SESSION["euser"]);
    unset($_SESSION["epass"]);
    unset($_SESSION["AU"]["user"]);
    unset($_SESSION['token']);
}
require_once('include/inc.head.php'); ?>
<style>
body {
    background-color: white;
}
</style>
<div id="wrapper" style="padding-left:0px;">
    <?php 
    // require_once('include/inc.header.php');?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <h1 class="page-header">
                        Login
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Backoffice</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> Login
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">

                    <form role="form" action="login.php" method="post">
                        <?php if($textresult){ ?>
                        <div class="alert alert-danger">
                            <strong>Error</strong> <?php echo $textresult;?>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label>Input Username</label>
                            <input class="form-control" type="text" name="login" placeholder="Enter username" value="<?php echo $login;?>">
                        </div>
                        <div class="form-group">
                            <label>Input Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('include/inc.footer.php');?>