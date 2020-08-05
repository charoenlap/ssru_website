<?
session_start();
session_destroy();
setcookie("siteAuth", "", time()-3600);
header("Location: login.php");
?>