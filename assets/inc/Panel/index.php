<?php
/*/ Config /*/ 
include('../../../assets/inc/conn.php');
/*/ Session Info /*/
include('../../../assets/inc/session.php');

/*/If user is login /*/
if (!empty($useron)) {
  header("Location: ../../../assets/inc/panel/home.php");
}
/*/ If user is not login /*/
elseif (empty($useron))  {
  header("Location:  ../../../assets/inc/panel/Login/");
}
echo $useron;
?>
