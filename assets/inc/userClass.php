<?php 
class userClass {
  /* User Login */
  public function userLogin($usernameEmail,$password) {
    try {

      /*/ HASH PASSWORD /*/
      function gen_token($pass, $salt) {
        $salt = strtolower($salt);
        $str = hash("sha512", $pass.$salt);
        $len = strlen($salt);
        return strtoupper(substr($str, $len, 17));
      }
      $hash_password = gen_token($password, $usernameEmail);
      $db = getDB();
      $stmt = $db->prepare("SELECT id FROM meh_users WHERE (username=:usernameEmail) AND password=:hash_password"); 
      $stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
      $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
      $stmt->execute();
      $count=$stmt->rowCount();
      $data=$stmt->fetch(PDO::FETCH_OBJ);
      $db = null;
      if($count) {
      $_SESSION['id']=$data->id; // Storing user session value
      return true;
      }
      else {
      return false;
      } 
    } catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
  }

  /* Male Registration */
  public function MaleRegistration($username,$password,$email,$gender) {
    try{
    /*/ HASH PASSWORD /*/
    function gen_token($pass, $salt) {
      $salt = strtolower($salt);
      $str = hash("sha512", $pass.$salt);
      $len = strlen($salt);
      return strtoupper(substr($str, $len, 17));
    }

    $db = getDB();
    $st = $db->prepare("SELECT id FROM meh_users WHERE username=:username OR email=:email"); 
    $st->bindParam("username", $username,PDO::PARAM_STR);
    $st->bindParam("email", $email,PDO::PARAM_STR);
    $st->execute();
    $count=$st->rowCount();
    $user_activation_code = md5( rand(0,1000) );
      if($count<1) {
      $stmt = $db->prepare("INSERT INTO meh_users
        (username,password,email,Gender,ColorHair,ColorSkin,ColorEye,ColorBase,ColorTrim,ColorAccessory,DateCreated,LastLogin,UpgradeExpire,UpgradeDays,BagSlots,HairID,HairFile,HairName,Founder,hash,active)
        VALUES (:username,:hash_password,:email,:gender,0,15388042,91294,0,0,0,NOW( ),NOW( ), NOW( ),-1,500,52,'hair/M/Default.swf','Default',-1,'$user_activation_code',0)");

      $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
      $hash_password = gen_token($password, $username);
      $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
      $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
      $stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
      $stmt->execute();
      $id=$db->lastInsertId(); // Last inserted row id
      $db = null;
      $_SESSION['id']=$id;

      $db = getDB();
      $st1 = $db->prepare("SELECT id FROM meh_users ORDER BY DateCreated DESC LIMIT 1");
      $st1->execute();
      $st1->bindParam("id", $id,PDO::PARAM_STR);

      $Weapon = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 1, 1, 'Weapon', 1, 1, 0, 1957, 1)");
      $Weapon->execute();

      $Armor = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 2, 1, 'ar', 1, 1, 0, 1957, 1)");
      $Armor->execute();

      require_once "mail/Exception.php";
      require_once "mail/OAuth.php";
      require_once "mail/PHPMailer.php";
      require_once "mail/POP3.php";
      require_once "mail/SMTP.php";
      $db = getDB();
        $stmt = $db->prepare("SELECT * FROM meh_users WHERE id=:id"); 
        $stmt->bindParam("id", $id,PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
        $user_username=$data->Username;
        $user_email=$data->Email;
        $user_user_activation_code=$data->hash;
        $name = $user_username;
        $email = $user_email;
        $activation_code= $user_user_activation_code;
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

        $mail->Subject = "Signup | Verification";
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

        <div class="title">Thanks for signing up!</div>
        <br>

        <div class="body-text">
          Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
          <br><br>
          Username: '.$name.'
          <br><br>
          Please click this link to activate your account:
          http://25.53.170.105/verify?email='.$email.'&hash='.$activation_code.'
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

      return true;
      }
      else {
      $db = null;
      return false;
      }

    } catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
  }

  /* Female Registration */
  public function FemaleRegistration($username,$password,$email,$gender) {
    try {
    /*/ HASH PASSWORD /*/
    function gen_token($pass, $salt) {
      $salt = strtolower($salt);
      $str = hash("sha512", $pass.$salt);
      $len = strlen($salt);
      return strtoupper(substr($str, $len, 17));
    }

    $db = getDB();
    $st = $db->prepare("SELECT id FROM meh_users WHERE username=:username OR email=:email"); 
    $st->bindParam("username", $username,PDO::PARAM_STR);
    $st->bindParam("email", $email,PDO::PARAM_STR);
    $st->execute();
    $count=$st->rowCount();
    $user_activation_code = md5( rand(0,1000) );

      if($count<1) {
      $stmt = $db->prepare("INSERT INTO meh_users
        (username,password,email,Gender,ColorHair,ColorSkin,ColorEye,ColorBase,ColorTrim,ColorAccessory,DateCreated,LastLogin,UpgradeExpire,UpgradeDays,BagSlots,HairID,HairFile,HairName,Founder,hash,active)
        VALUES (:username,:hash_password,:email,:gender,0,15388042,91294,0,0,0,NOW( ),NOW( ), NOW( ),-1,500,52,'hair/F/Pig1Bangs1.swf','Pig1Bangs1',-1,'$user_activation_code',0)");

      $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
      $hash_password = gen_token($password, $username);
      $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
      $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
      $stmt->bindParam("gender", $gender,PDO::PARAM_STR) ;
      $stmt->execute();
      $id=$db->lastInsertId(); // Last inserted row id
      $db = null;
      $_SESSION['id']=$id;

      $db = getDB();
      $st1 = $db->prepare("SELECT id FROM meh_users ORDER BY DateCreated DESC LIMIT 1");
      $st1->execute();
      $st1->bindParam("id", $id,PDO::PARAM_STR);

      $Weapon = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 1, 1, 'Weapon', 1, 1, 0, 1957, 1)");
      $Weapon->execute();

      $Armor = $db->prepare("INSERT INTO meh_users_items (userid, itemid, equipped, equipment, level, quantity, inbank, enhid, estado) VALUES ($id, 2, 1, 'ar', 1, 1, 0, 1957, 1)");
      $Armor->execute();

      $db = getDB();
        $stmt = $db->prepare("SELECT * FROM meh_users WHERE id=:id"); 
        $stmt->bindParam("id", $id,PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
        $user_username=$data->Username;
        $user_email=$data->Email;
        $user_user_activation_code=$data->hash;
        $name = $user_username;
        $email = $user_email;
        $activation_code= $user_user_activation_code;
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

        $mail->Subject = "Signup | Verification";
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

        <div class="title">Thanks for signing up!</div>
        <br>

        <div class="body-text">
          Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
          <br><br>
          Username: '.$name.'
          <br><br>
          Please click this link to activate your account:
          http://25.53.170.105/verify?email='.$email.'&hash='.$activation_code.'
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
        
      return true;
      }
      else {
      $db = null;
      return false;
      }

    } catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
  }

  /* User Details */
  public function userDetails($id) {
    try {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM meh_users WHERE id=:id"); 
    $stmt->bindParam("id", $id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
    $user_id=$data->id; // Storing user session value

    return $data;
    } catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
  }
}
?>