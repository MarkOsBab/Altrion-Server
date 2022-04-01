<?php 
include('verify.php');
if(!empty($_SESSION['id'])) {
$session_id=$_SESSION['id'];
}
if(empty($session_id))
{
$url='login/';
header("Location: $url");
}

?>