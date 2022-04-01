<?php
include("conn.php");
include('userClass.php');
$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';
$errorMsgPassChange='';
/* Game Login */
if (!empty($_POST['loginSubmit'])) {
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
/*/ USER VAR /*/
$db = getDB();
		$sql = $db->prepare("SELECT * FROM meh_users WHERE Username='$usernameEmail'");
		$sql->execute();
		$resultado = $sql->fetchAll();
		foreach ($resultado as $row) {
			$active = $row['active'];
		

if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 ) {
	$id=$userClass->userLogin($usernameEmail,$password);
	if ($active > 0) {
		if($id) {
			$url='/play/';
			header("Location: $url"); // Page redirecting to home 
			}
		else {
			$errorMsgLogin="Please check login details.";
			}
	} else {
		$errorMsgLogin='<p class="w3-text-red"><i class="fas fa-exclamation-circle"></i> Please active your account to login.</p>';
	}
}
}
}
/********************************************************************************************************************************************/

/* Manage Account Login */
if (!empty($_POST['accloginSubmit'])) {
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
/*/ USER VAR /*/
$db = getDB();
		$sql = $db->prepare("SELECT * FROM meh_users WHERE Username='$usernameEmail'");
		$sql->execute();
		$resultado = $sql->fetchAll();
		foreach ($resultado as $row) {
			$active = $row['active'];
		

if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 ) {
	$id=$userClass->userLogin($usernameEmail,$password);
	if ($active > 0) {
		if($id) {
			$url='/account/';
			header("Location: $url"); // Page redirecting to home 
			}
		else {
			$errorMsgLogin="Please check login details.";
			}
	} else {
		$errorMsgLogin='<p class="w3-text-red"><i class="fas fa-exclamation-circle"></i> Please active your account to login.</p>';
	}
}
}
}
/********************************************************************************************************************************************/

/* Store Login */
if (!empty($_POST['StoreloginSubmit'])) {
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
/*/ USER VAR /*/
$db = getDB();
		$sql = $db->prepare("SELECT * FROM meh_users WHERE Username='$usernameEmail'");
		$sql->execute();
		$resultado = $sql->fetchAll();
		foreach ($resultado as $row) {
			$active = $row['active'];
		

if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 ) {
	$id=$userClass->userLogin($usernameEmail,$password);
	if ($active > 0) {
		if($id) {
			$url='/Store/';
			header("Location: $url"); // Page redirecting to home 
			}
		else {
			$errorMsgLogin="Please check login details.";
			}
	} else {
		$errorMsgLogin='<p class="w3-text-red"><i class="fas fa-exclamation-circle"></i> Please active your account to login.</p>';
	}
}
}
}
/********************************************************************************************************************************************/

/* Char Login */
if (!empty($_POST['CharloginSubmit'])) {
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
/*/ USER VAR /*/
$db = getDB();
		$sql = $db->prepare("SELECT * FROM meh_users WHERE Username='$usernameEmail'");
		$sql->execute();
		$resultado = $sql->fetchAll();
		foreach ($resultado as $row) {
			$active = $row['active'];
		

if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 ) {
	$id=$userClass->userLogin($usernameEmail,$password);
	if ($active > 0) {
		if($id) {
			$url='/Char/?id=MarkOsBab';
			header("Location: $url"); // Page redirecting to home 
			}
		else {
			$errorMsgLogin="Please check login details.";
			}
	} else {
		$errorMsgLogin='<p class="w3-text-red"><i class="fas fa-exclamation-circle"></i> Please active your account to login.</p>';
	}
}
}
}
/********************************************************************************************************************************************/


/* Panel Login */
if (!empty($_POST['PanelloginSubmit'])) {
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
/*/ USER VAR /*/
$db = getDB();
		$sql = $db->prepare("SELECT * FROM meh_users WHERE Username='$usernameEmail'");
		$sql->execute();
		$resultado = $sql->fetchAll();
		foreach ($resultado as $row) {
			$active = $row['active'];
			$access = $row['Access'];
			$no_panel_access = $row['no_access_panel_login_ban'];	
			$useron = $row['Username'];

if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 ) {
	$id=$userClass->userLogin($usernameEmail,$password);
	if ($active > 0) {
		if ($access > 39) {		
			if($id) {
				$url='../home.php';
				header("Location: $url"); // Page redirecting to home 
				}
			else {
				$errorMsgLogin="Please check login details.";
				}
		} else {
			$errorMsgLogin='<h3 class="w3-text-red"><i class="fas fa-exclamation-circle"></i> YOU DONT HAVE ACCESS TO LOGIN IN THE PANEL! IF YOU TRY TO SIGN IN AGAIN ON THE PANEL WITHOUT ACCESS YOU WILL BE BANNED.</h3>';
			$update_no_panel_access = $db->prepare("UPDATE meh_users SET no_access_panel_login_ban=$no_panel_access+1 WHERE Username='$useron'");
			$update_no_panel_access->execute();
			if ($no_panel_access >= 2) {
				$ban_player = $db->prepare("UPDATE meh_users SET Access=0 WHERE Username='$useron'");
				$ban_player->execute();
				$errorMsgLogin='<h3 class="w3-text-red"><i class="fas fa-exclamation-circle"></i> YOUR ACCOUNT HAS BEN BANNED</h3>';
			}

		}
	} else {
		$errorMsgLogin='<p class="w3-text-red"><i class="fas fa-exclamation-circle"></i> Please active your account to login.</p>';
	}
}
}
}
/********************************************************************************************************************************************/


/* Change Password */
if (!empty($_POST['changePassword'])) {
	/*Hash Password */
	function gen_token($pass, $salt) {
        $salt = strtolower($salt);
        $str = hash("sha512", $pass.$salt);
        $len = strlen($salt);
        return strtoupper(substr($str, $len, 17));
    }
    /* Form Vars */
	$currentPass = $_POST['cPass'];
	$nPass = $_POST['nPass'];
	$CnPass = $_POST['CnPass'];
	$uID = $_POST['uID'];
	/* Account Info */
	$db = getDB();
	$userInfo = $db->prepare("SELECT Username, Password, Email FROM meh_users WHERE Username='$uID'");
	$userInfo->execute();
	$result = $userInfo->fetchAll();
	foreach ($result as $row) {
		$username = $row['Username'];
		$cPassword = $row['Password'];
		$email = $row['Email'];
		$hash_post_pass = gen_token($currentPass, $username);
		$hash_post_new_pass = gen_token($nPass, $username);
		$hash_post_confirm_new_pass = gen_token($CnPass, $username);
		$cPassword_hash_code = md5( rand(0,1000) );
		if (empty($currentPass)) {
			$errorMsgPassChange = "Please enter your current password.";
		} elseif (empty($nPass)) {
			$errorMsgPassChange = "Please enter your new password.";
		} elseif (empty($CnPass)) {
			$errorMsgPassChange = "Please enter the confirmation of your new password.";
		} elseif ($cPassword != $hash_post_pass) {
			if ($hash_post_new_pass != $hash_post_confirm_new_pass) {
				$errorMsgPassChange = "The current password is not correct.";
			} elseif ($hash_post_new_pass = $hash_post_confirm_new_pass) {
				$errorMsgPassChange = "The current password is not correct.";
			} elseif ($cPassword = $hash_post_new_pass || $cPassword = $hash_post_new_pass) {
				$errorMsgPassChange = "The current password is not correct.";
			} elseif ($hash_post_confirm_new_pass != $hash_post_new_pass) {
				$errorMsgPassChange = "The current password is not correct.";
			} elseif ($hash_post_new_pass != $hash_post_confirm_new_pass) {
				$errorMsgPassChange = "The current password is not correct.";
			}
		} elseif ($cPassword = $hash_post_pass) {
			if ($hash_post_confirm_new_pass != $hash_post_new_pass) {
				$errorMsgPassChange = "Please verify that the new password is the same as the confirmation.";
			} elseif ($hash_post_new_pass != $hash_post_confirm_new_pass) {
				$errorMsgPassChange = "Please verify that the new password is the same as the confirmation.";
			} elseif ($hash_post_new_pass = $hash_post_confirm_new_pass) {
				$errorMsgPassChange = "An email was sent to complete the password change.";
				$changePass = $db->prepare("UPDATE meh_users SET nPassword=:hash_post_new_pass, nPassword_hash='$cPassword_hash_code' WHERE Username='$uID'");
					$changePass->bindParam("hash_post_new_pass", $hash_post_new_pass,PDO::PARAM_STR) ;
					$changePass->execute();
					$errorMsgPassChange = "Please check your email to verify the password change.";
					/* Send Mail */
					require_once "mail/Exception.php";
				    require_once "mail/OAuth.php";
				    require_once "mail/PHPMailer.php";
				    require_once "mail/POP3.php";
				    require_once "mail/SMTP.php";

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

			        $mail->addAddress($email);

			        $mail->isHTML(true);

			        $mail->Subject = "Change your password | Verification";
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

			        <div class="title">Change your password!</div>
			        <br>

			        <div class="body-text">
			          To complete the password change please enter the link below.
			          <br><br>
			          Please click this link to activate your account:
			          http://25.53.170.105/changePassword?nPassword_hash='.$cPassword_hash_code.'&username='.$username.'&nPassword='.$hash_post_new_pass.'
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
		}
	}
}

/********************************************************************************************************************************************/

/* Signup Form */
if (!empty($_POST['signupSubmit'])) 
{
$username=$_POST['usernameReg'];
$email=$_POST['emailReg'];
$password=$_POST['passwordReg'];
$gender=$_POST['Gender'];
/* Regular expression check */
$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $email);
$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
$db = getDB();
$buscarCorreo = "SELECT * from meh_users WHERE Email='$email'";
$resultadoCorreo = $db->query($buscarCorreo);
$contadorEmail = $resultadoCorreo->fetchColumn();

$buscarUsername = "SELECT * from meh_users WHERE Username='$username'";
$resultadoUsername = $db->query($buscarUsername);
$contadorUsername = $resultadoUsername->fetchColumn();

if($username_check && $email_check && $password_check) 
{

if ($gender == 'M') {
	$idMale=$userClass->MaleRegistration($username,$password,$email,$gender);
	if($idMale) {
		$url='../logout';
		header("Location: $url"); // Page redirecting to home 
	} elseif ($contadorEmail >= 1) {
	 	$errorMsgReg="Email already exists.";
	 } elseif ($contadorUsername >= 1) {
	 	$errorMsgReg="Username already exists.";
	 }
} elseif ($gender == 'F') {
	$idFemale=$userClass->FemaleRegistration($username,$password,$email,$gender);

	if($idFemale) {
		$url='../logout';
		header("Location: $url"); // Page redirecting to home 
	} elseif ($contadorEmail >= 1) {
	 	$errorMsgReg="Email already exists.";
	 } elseif ($contadorUsername >= 1) {
	 	$errorMsgReg="Username already exists.";
	 }
}


}
}
/********************************************************************************************************************************************/
?>