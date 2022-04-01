<?php
require_once "mail/Exception.php";
require_once "mail/OAuth.php";
require_once "mail/PHPMailer.php";
require_once "mail/POP3.php";
require_once "mail/SMTP.php";

if(isset($_POST["submit"])){
$hostname='localhost';
$username='root';
$password='';

try {


$realIp = $ip = $_SERVER['REMOTE_ADDR'];

$dbh = new PDO("mysql:host=$hostname;dbname=altrion_v3",$username,$password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql = "INSERT INTO meh_contact (Name, Email, Message, Ip, FechaEnvio)
VALUES ('".$_POST["Name"]."','".$_POST["Email"]."','".$_POST["Message"]."', '".$realIp."', CURRENT_TIMESTAMP)";
if ($dbh->query($sql)) {
echo "<script type= 'text/javascript'>alert('Message sent successfully, we will respond shortly.');</script>";
/*/ Si inscribe envia el email /*/
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        //Enable SMTP debugging. 
        $mail->SMTPDebug = 0;                               
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();            
        //Set SMTP host name                          
        $mail->Host = "smtp.ionos.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;                          
        //Provide username and password     
        $mail->Username = "altrion@maxfituy.com";                 
        $mail->Password = "M.g4089188";                           
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";                           
        //Set TCP port to connect to 
        $mail->Port = 587;                                   

        $mail->From = "altrion@maxfituy.com";
        $mail->FromName = "ALTRION";

        $mail->addAddress($_POST['Email'], $_POST['Name']);

        $mail->isHTML(true);

        $Name = $_POST['Name'];
        $message = $_POST['Message'];

        $mail->Subject = "Hello ". $Name ."!";
        $mail->Body = '
		<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" 
		 xmlns:v="urn:schemas-microsoft-com:vml"
		 xmlns:o="urn:schemas-microsoft-com:office:office">
		<head>
		  <!--[if gte mso 9]><xml>
		   <o:OfficeDocumentSettings>
		    <o:AllowPNG/>
		    <o:PixelsPerInch>96</o:PixelsPerInch>
		   </o:OfficeDocumentSettings>
		  </xml><![endif]-->
		  <!-- fix outlook zooming on 120 DPI windows devices -->
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
		  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
		  <meta name="format-detection" content="date=no"> <!-- disable auto date linking in iOS 7-9 -->
		  <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS 7-9 -->
		  <title>ALTRION V3</title>
		  <style type="text/css">
		  	body {
  margin: 0;
  padding: 0;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}

table {
  border-spacing: 0;
}

table td {
  border-collapse: collapse;
}

.ExternalClass {
  width: 100%;
}

.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
  line-height: 100%;
}

.ReadMsgBody {
  width: 100%;
  background-color: #ebebeb;
}

table {
  mso-table-lspace: 0pt;
  mso-table-rspace: 0pt;
}

img {
  -ms-interpolation-mode: bicubic;
}

.yshortcuts a {
  border-bottom: none !important;
}

@media screen and (max-width: 599px) {
  .force-row,
  .container {
    width: 100% !important;
    max-width: 100% !important;
  }
}
@media screen and (max-width: 400px) {
  .container-padding {
    padding-left: 12px !important;
    padding-right: 12px !important;
  }
}
.ios-footer a {
  color: #aaaaaa !important;
  text-decoration: underline;
}
.header,
.title,
.subtitle,
.footer-text {
  font-family: Helvetica, Arial, sans-serif;
}

.header {
  font-size: 24px;
  font-weight: bold;
  padding-bottom: 12px;
  color: #f44336;
}

.footer-text {
  font-size: 12px;
  line-height: 16px;
  color: #aaaaaa;
}
.footer-text a {
  color: #aaaaaa;
}

.container {
  width: 600px;
  max-width: 600px;
}

.container-padding {
  padding-left: 24px;
  padding-right: 24px;
}

.content {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #ffffff;
}

code {
  background-color: #eee;
  padding: 0 4px;
  font-family: Menlo, Courier, monospace;
  font-size: 12px;
}

hr {
  border: 0;
  border-bottom: 1px solid #cccccc;
}

.hr {
  height: 1px;
  border-bottom: 1px solid #cccccc;
}

.title {
  font-size: 18px;
  font-weight: 600;
  color: #374550;
}

.subtitle {
  font-size: 16px;
  font-weight: 600;
  color: #2469A0;
}
.subtitle span {
  font-weight: 400;
  color: #999999;
}

.body-text {
  font-family: Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 20px;
  text-align: left;
  color: #333333;
}

a[href^="x-apple-data-detectors:"],
a[x-apple-data-detectors] {
  color: inherit !important;
  text-decoration: none !important;
  font-size: inherit !important;
  font-family: inherit !important;
  font-weight: inherit !important;
  line-height: inherit !important;
}
		  </style>
		</head>
		<body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

		<!-- 100% background wrapper (grey background) -->
		<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
		  <tr>
		    <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

		      <br>

		      <!-- 600px container (white background) -->
		      <table border="0" width="600" cellpadding="0" cellspacing="0" class="container">
		        <tr>
		          <td class="container-padding header" align="left">
		            ALTRION V3
		          </td>
		        </tr>
		        <tr>
		          <td class="container-padding content" align="left">
		            <br>

		<div class="title">Hi '.$Name.', thanks for contacting us.</div>
		<br>

		<div class="body-text">
		  Your inquiry or report: '.$message.'. Will be answered shortly.
		  <br><br>

		  The altrion team greets you carefully!
		  <br><br>
		</div>

		          </td>
		        </tr>
		        <tr>
		          <td class="container-padding footer-text" align="left">
		            <br><br>
		            ALTRION: &copy; 2018.
		            <br><br>

		            Please do not reply to this email, we will respond as soon as possible.
		            <br><br>

		            <strong>Altrion &copy; 2018 / 2019</strong><br>
		            <a href="https://altriontm.org">altriontm.org</a><br>

		            <br><br>

		          </td>
		        </tr>
		      </table><!--/600px container -->


		    </td>
		  </tr>
		</table><!--/100% background wrapper-->

		</body>
		</html>
        ';
        if(!$mail->send()) 
        {
            
        } 
        else 
        {
            
        }
}
else{
echo "<script type= 'text/javascript'>alert('Message not sent.');</script>";
}
header("Refresh:0");
$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
?>