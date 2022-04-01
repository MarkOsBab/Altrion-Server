<?php
/*/ CONTACT /*/
include '../assets/inc/contact.php';
/*/ SESSION /*/
include '../assets/inc/char_session.php';
/*/ USER VAR /*/
$userDetails=$userClass->userDetails($session_id);
$username = $userDetails->Username;
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Header Info -->
    <title>Altrion v3</title>
    <link rel="icon" type="image/png" href="../assets/images/AltrionIconGoldenA.png"/>
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <!-- W3 -->
    <link rel="stylesheet" type="text/css" href="../assets/css/w3.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" type="text/css" href="../assets/css/all.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Facebook Plugins -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0"></script>

</head>
<body>

<!-- NavBar Start -->
    <div class="cover-container d-flex h-100  flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <nav class="navbar navbar-light navbar-expand-lg nav nav-masthead justify-content-center fixed-top fixed-top1 nav-padding animated fadeInDown" style="background: rgba(255, 255, 255, 0.8); padding: 1rem;">
            <a class="navbar-brand text-dark" style="font-size: 15px;" href="https://www.facebook.com/AltrionTM">WITH SUPPORT OF <span class="NavBar-Title text-danger"><div></div>ALTRION COMPANY</span></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse text-center" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li>
                    <a class="nav-link active animated fadeInLeft text-dark" href="../">
                        <i style="animation-delay: 0.1s;" class="fas fa-home animated fadeInDown"></i> HOME
                    </a>
                </li>
                <li>
                    <a class="nav-link animated fadeInTop text-dark" href="/register">
                        <i style="animation-delay: 0.2s;" class="fas fa-registered animated fadeInDown"></i> REGISTER</a>
                </li>
                <li>
                    <a class="nav-link animated fadeInDown text-dark" href="/play">
                        <i style="animation-delay: 0.3s;" class="fas fa-gamepad animated fadeInDown"></i> PLAY
                    </a>
                </li>
                <li>
                    <a class="nav-link animated fadeInRight text-dark" href="/store">
                        <i style="animation-delay: 0.4s;" class="fas fa-registered animated fadeInDown"></i> STORE
                    </a>
                </li>
                <li>
                    <a class="nav-link animated fadeInRight text-dark" href="/account">
                        <i style="animation-delay: 0.4s;" class="fas fa-user animated fadeInDown"></i> MANAGE ACCOUNT
                    </a>
                </li>
                <?php if (!empty($_SESSION['id'])) { ?>
                <li>
                    <a class="nav-link animated fadeInRight text-dark" href="/logout">
                        <i style="animation-delay: 0.4s;" class="fas fa-sign-out-alt animated fadeInDown"></i> LOGOUT
                    </a>
                </li>
              <?php } ?>
                </ul>
            </div>
          </nav>
        </div>          
      </header>
    </div>
<!-- End NavBar -->

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;">

<!-- Header Images -->
  <div class="w3-display-container w3-center">
    <img src="/assets/images/Play.png" style="width:100%; height: 380px;" draggable="false">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>
<!-- End Header Images -->

<!-- Server Name -->
    <div class="text-center pt-3 pb-3">
        <h1 class="NavBar-Title w3-text-red" style="font-size: 60px;">ALTRION</h1>
        <p>An AQW Private Server</p>
    </div>
<!-- End Server Name -->

<!-- Secondary Navbar -->
<nav class="nav w3-black justify-content-center">
  <button class="btn-4" data-toggle="modal" data-target="#RankingModal">
    <span>
        <a class="nav-link" data-toggle="modal" data-target="#RankingModal">
            <i class="fas fa-khanda"></i> Ranking
        </a>
    </span>
  </button>
  <button class="btn-4" data-toggle="modal" data-target="#MapsModal">
    <span>
        <a class="nav-link" data-toggle="modal" data-target="#MapsModal">
            <i class="fas fa-globe-americas"></i> Maps
        </a>
    </span>
  </button>
  <button class="btn-4" data-toggle="modal" data-target="#GuildsModal">
    <span>
        <a class="nav-link" data-toggle="modal" data-target="#GuildsModal">
            <i class="fas fa-users"></i> Guilds
        </a>
    </span>
  </button>
  <button class="btn-4">
    <span>
        <a class="nav-link" href="#">
            <i style="animation-delay: 0.4s;" class="fas fa-users animated fadeInDown"></i> Users Online: <?php include '../assets/inc/users_online.php'; ?>
        </a>
    </span>
  </button>
</nav>
<!-- End Secondary NavBar -->

<div class="p-b-100">
<?php

$db = getDB();
$id_user = $_GET['id'];
if ($id_user != ""){
    $objRS_query = $db->prepare("SELECT * FROM meh_users WHERE Username = '".$id_user."'");
    $objRS1_query = $db->prepare("SELECT * FROM meh_users WHERE Username = '".$id_user."'");
    $objRS_query->execute();
    $objRS1_query->execute();
    $objRS1 = $objRS1_query->fetch(PDO::FETCH_ASSOC);
    $i = 0;
    while ($objRS = $objRS_query->fetchAll()){
        $i = $i + 1;
    }
    if ($i != ""){
  $id = $objRS1['id'];
  $iAccess = $objRS1['Access'];
  $iGold = $objRS1['Gold'];
  $iCoins = $objRS1['Coins'];
  $iName = $objRS1['Username'];
    }
}
?>

<?php
$userid2 = $_GET['id'];
if ($userid2 != ""){
    $objRS_query = $db->prepare("SELECT * FROM meh_users WHERE Username = '".$userid2."'");
    $objRS1_query = $db->prepare("SELECT * FROM meh_users WHERE Username = '".$userid2."'");
    $objRS_query->execute();
    $objRS1_query->execute();
    $objRS1 = $objRS1_query->fetch(PDO::FETCH_ASSOC);
    $i = 0;
    while ($objRS = $objRS_query->fetchAll()){
        $i = $i + 1;        
    }
    if ($i != ""){
        $id = $objRS1['id'];
        $strUsername = $objRS1['Username'];
        $iLvl  = $objRS1['Level'];
        $bgindex  = $objRS1['ColorSkin'];
        $facecolors = $objRS1['ColorEye'];
        $armorcolors = $objRS1['ColorBase'];
        $bHelm = 1;
        $bPet = 1;
        $bCloak = 1;
        $regip = 1;
    } else {
  die('
<center><p>The user does not exist in our database!</p></center>
</td>
</tr>
</table></td>
</tr>
<tr>
<td colspan="2" class="cellScrollBottom">&nbsp;</td>
</tr>
</table>
      ');
    }
}
//CURRENT ARMOR
$current_arm = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'ar' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_arm->execute();

$carm = $current_arm->fetch(PDO::FETCH_ASSOC);
$current_a = $db->prepare("SELECT * FROM meh_items WHERE id = '".$carm['itemid']."'");
$current_a->execute();
$ca = $current_a->fetch(PDO::FETCH_ASSOC);


//CURRENT WEAPON
$current_wep = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'Weapon' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_wep->execute();
$cwep = $current_wep->fetch(PDO::FETCH_ASSOC);
$current_w = $db->prepare("SELECT * FROM meh_items WHERE id = '".$cwep['itemid']."'");
$current_w->execute();
$cw = $current_w->fetch(PDO::FETCH_ASSOC);



//CURRENT BACK ITEM
if($bCloak >= 1){
$current_ba = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'ba' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_ba->execute();
$cba = $current_ba->fetch(PDO::FETCH_ASSOC);
$current_b = $db->prepare("SELECT * FROM meh_items WHERE id = '".$cba['itemid']."'");
$current_b->execute();
$cb = $current_b->fetch(PDO::FETCH_ASSOC);

}


//CURRENT PET
if($bPet >= 1){
$current_pe = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'pe' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_pe->execute();
$cpe = $current_pe->fetch(PDO::FETCH_ASSOC);
$current_p = $db->prepare("SELECT * FROM meh_items WHERE id = '".$cpe['itemid']."'");
$current_p->execute();
$cp = $current_p->fetch(PDO::FETCH_ASSOC);

}

//CURRENT HELM
if($bHelm >= 1){
$current_he = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'he' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_he->execute();
$che = $current_he->fetch(PDO::FETCH_ASSOC);
$current_h = $db->prepare("SELECT * FROM meh_items WHERE id = '".$che['itemid']."'");
$current_h->execute();
$ch = $current_h->fetch(PDO::FETCH_ASSOC);
$helmhair = $ch['File'];
$helmhairl = $ch['Link'];

//Checks if there is not an Equipped Helm
//IF THERE IS NONE EQUIPPED WILL LOAD HAIR INSTEAD
$checkh = $current_h->fetchColumn();;
if ($checkh == 0) {
  $helmhair = 'none';
  $helmhairl = 'none';
}
  }

if($bHelm <= 0){
  $helmhair = 'none';
  $helmhairl = 'none';
}

//CURRENT OUTFIT
$current_ou = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'co' AND userid = '".$objRS1['id']."' AND equipped = 1 ORDER BY id ASC LIMIT 1");
$current_ou->execute();
$cur_ou = $current_ou->fetch(PDO::FETCH_ASSOC);
$current_o = $db->prepare("SELECT * FROM meh_items WHERE id = '".$cur_ou['itemid']."'");
$current_o->execute();
$cou = $current_o->fetch(PDO::FETCH_ASSOC);
$armco = $ca['File'];
$armcol = $ca['Link'];

//Checks if there is not an Equipped Outfit
//IF THERE IS NONE EQUIPPED WILL LOAD CURRENT CLASS INSTEAD
$checko = $current_o->fetchColumn();
if ($checko == 0) {
  $armco = $cou['File'];
  $armcol = $cou['Link'];
}
?>


<center>
<div class="embed-responsive embed-responsive-4by3 mt-5" style="width: 50%;>
     <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="640" height="430">
          <param name="movie" value="../gamefiles/ALT_Charpage.swf" />
          <param name="quality" value="high" />
          <param name="flashvars" value="
&intColorHair=<?php echo $objRS1['ColorHair']; ?>&intColorSkin=<?php echo $objRS1['ColorSkin']; ?>&intColorEye=<?php echo $objRS1['ColorEyes']; ?>&intColorTrim=<?php echo $objRS1['ColorTrim']; ?>&intColorBase=<?php echo $objRS1['ColorBase']; ?>&intColorAccessory=<?php echo $objRS1['ColorAccessory']; ?>&ia1=4768&strGender=<?php echo $objRS1['Gender']; ?>&strHairFile=<?php echo $objRS1['HairFile']; ?>&strHairName=<?php echo $objRS1['HairName']; ?>&strName=<?php echo $id_user ?>&intLevel=<?php echo $iLvl; ?>&strClassName=<?php echo $ca['Name']?>&strClassFile=<?php echo $armco ?>&strClassLink=<?php echo $armcol ?>&strArmorName=<?php echo $cou['Name']; ?>&strWeaponFile=<?php echo $cw['File'] ?>&strWeaponLink=<?php echo $cw['Link'] ?>&strWeaponType=<?php echo $cw['Type']; ?>&strWeaponName=<?php echo $cw['Name']; ?>&strCapeFile=<?php echo $cb['File']; ?>&strCapeLink=<?php echo $cb['Link']; ?>&strCapeName=<?php echo $cb['Name']; ?>&strHelmFile=<?php echo $helmhair; ?>&strHelmLink=<?php echo $helmhairl; ?>&strHelmName=<?php echo $ch['Name']; ?>&strPetFile=<?php echo $cp['File']; ?>&strPetLink=<?php echo $cp['Link']; ?>&strPetName=<?php echo $cp['Name']; ?>&bgindex=<?php echo $bgindex; ?> &strFaction=<?php echo $objRS1['Faction']; ?>">
          <embed src="../gamefiles/ALT_Charpage.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" flashvars="
&intColorHair=<?php echo $objRS1['ColorHair']; ?>&intColorSkin=<?php echo $objRS1['ColorSkin']; ?>&intColorEye=<?php echo $objRS1['ColorEyes']; ?>&intColorTrim=<?php echo $objRS1['ColorTrim']; ?>&intColorBase=<?php echo $objRS1['ColorBase']; ?>&intColorAccessory=<?php echo $objRS1['ColorAccessory']; ?>&ia1=4768&strGender=<?php echo $objRS1['Gender']; ?>&strHairFile=<?php echo $objRS1['HairFile']; ?>&strHairName=<?php echo $objRS1['HairName']; ?>&strName=<?php echo $id_user ?>&intLevel=<?php echo $iLvl; ?>&strClassName=<?php echo $ca['Name']?>&strClassFile=<?php echo $armco ?>&strClassLink=<?php echo $armcol ?>&strArmorName=<?php echo $cou['Name']; ?>&strWeaponFile=<?php echo $cw['File'] ?>&strWeaponLink=<?php echo $cw['Link'] ?>&strWeaponType=<?php echo $cw['Type']; ?>&strWeaponName=<?php echo $cw['Name']; ?>&strCapeFile=<?php echo $cb['File']; ?>&strCapeLink=<?php echo $cb['Link']; ?>&strCapeName=<?php echo $cb['Name']; ?>&strHelmFile=<?php echo $helmhair; ?>&strHelmLink=<?php echo $helmhairl; ?>&strHelmName=<?php echo $ch['Name']; ?>&strPetFile=<?php echo $cp['File']; ?>&strPetLink=<?php echo $cp['Link']; ?>&strPetName=<?php echo $cp['Name']; ?>&bgindex=<?php echo $bgindex; ?> &strFaction=<?php echo $objRS1['Faction']; ?>"></embed></object>
</div>
</center>
<center>
  <div class="pl-5">
<?php
//Connexion
$ach_query = $db->prepare("SELECT * FROM meh_users_badges WHERE UserID = '".$objRS1['id']."' ORDER BY BadgerID ASC");
$ach_query->execute();
foreach ($ach_query as $ach) {
$achieve_query = $db->prepare("SELECT * FROM meh_achievements WHERE id= '{$ach['BadgerID']}'");
$achieve_query->execute();

foreach ($achieve_query as $achieve) {
  $url=BASE_URL.'assets/images/badges/'.$achieve["Badge"];'';
//Funcion
echo '
<img alt="" draggable="false" class="p-t-30"  width="" height="" src="'.$url.'" />';
?>

<?php } }?>

<div class="pt-5">
<table width="500" cellspacing="0" cellpadding="0">
<tr valign="top"> 
<td width="">
<table width="100" cellpadding="3">
<tr>


<strong>Items</strong>
</tr>
</center>
<br>
<br>
<!---Início de Item Bags-->




<!---Final de Item Bags-->

<!---Início de Item Capas-->


<?php
$armors_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'ba' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$armors_query->execute();
foreach ($armors_query as $armors) {
                    
$inform1_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$armors['itemid']."'");
$inform1_query->execute();
$inform1 = $inform1_query->fetch(PDO::FETCH_ASSOC);
?>
<tr align="left" valign="top" class="pl-4">  
<td>
<?php echo '<img src="../assets/images/inven/cape.png">'; ?>

<span>
<?php echo $inform1['Name']; ?>
</span>
</td>
</tr>
                
<?php } ?>

<!---Fim de Item Capas-->

<!---Início de Item Capacete-->


<?php
$armors_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'he' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$armors_query->execute();
  foreach ($armors_query as $armors) {

                    
$inform1_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$armors['itemid']."'");
$inform1_query->execute();
$inform1 = $inform1_query->fetch(PDO::FETCH_ASSOC);
?>
<tr align="left" valign="top" class="pl-4"> 
<td width="99%">
  <?php echo '<img src="../assets/images/inven/helm.png">'; ?>
<span>
<?php echo $inform1['Name']; ?>
</span>
</td>
</tr>
                
<?php } ?>

<!---Fim de Item Capacete-->

<!---Início de Item Pet-->


<?php
$pet_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'pe' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$pet_query->execute();
foreach ($pet_query as $pet) {
                    
$inform1pe_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$pet['itemid']."'");
$inform1pe_query->execute();
$inform1pe = $inform1pe_query->fetch(PDO::FETCH_ASSOC);
?>
<tr align="left" valign="top" class="pl-4"> 
<td width="99%">
  <?php echo '<img class="bg-dark" src="../assets/images/inven/pet.png">'; ?>
<span>
<?php echo $inform1pe['Name']; ?>
</span>
</td>
</tr>
                
<?php } ?>  

<!---Fim de Item Pet-->

<!---Início de Item Weapon-->


<?php
$weapons_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment='weapon' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$weapons_query->execute();
foreach ($weapons_query as $weapons) {
$itemid = $weapons['itemid'];               
$inform_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$itemid."'");
$inform_query->execute();
$resultado = $inform_query->fetchAll();
foreach ($resultado as $inform) {
$It_Name = $inform['Name'];
}
?>

<tr align="left" valign="top" class="pl-4">
<td>
  <?php echo '<img src="../assets/images/inven/sword.png">'; ?>
<span>
<?php echo $It_Name; ?>
</span>
</td>
</tr>

<?php  } ?>

<!---Fim de Item Weapon-->

</table>
</td>

<td>
<table width="300" cellpadding="3" align="right"> 
<tr>
<strong class="pl-5 ml-4">Classes & armors</strong>
</tr>
<br>
<br>    
<?php
$armorsar_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'ar' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$armorsar_query->execute();

foreach ($armorsar_query as $armorsar) {
$inform1ar_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$armorsar['itemid']."'");
$inform1ar_query->execute();
$inform1ar = $inform1ar_query->fetch(PDO::FETCH_ASSOC);
?>
<tr align="" valign="top" class="pl-4"> 
<td>
  <?php echo '<img src="../assets/images/inven/class.png">'; ?>
<span>
<?php echo $inform1ar['Name']; ?>
</span>
</td>
</tr>

<?php } ?>  



<?php
$armorsco_query = $db->prepare("SELECT * FROM meh_users_items WHERE equipment = 'co' AND userid = '".$objRS1['id']."' ORDER BY id DESC");
$armorsco_query->execute();
foreach ($armorsco_query as $armorsco) {
$inform1co_query = $db->prepare("SELECT * FROM meh_items WHERE id = '".$armorsco['itemid']."'");
$inform1co_query->execute();
$inform1co = $inform1co_query->fetch(PDO::FETCH_ASSOC);
?>

<tr align="left" valign="top"> 

<td>
  <?php echo '<img src="../assets/images/inven/armor.png">'; ?>
<span>
<?php echo $inform1co['Name']; ?>
</span>
</td>
</tr>
         
<?php } ?>
</article>
</table>
</td>
</tr>

</table>



</table>
</div>
</center>
      </div>

        </section>

        </div>
      </center>
    </div>





  <!-- End About Section -->
  </div>
<!-- Grid -->
<div class="w3-row pt-5">


<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Contact -->
<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact" data-aos="fade-down" data-aos-duration="3000">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <p class="w3-center">For bug reports, help or inquiries contact us, we will be in touch with you shortly!</p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-envelope fa-lg" style="width:30px"> </i> contact@altriontm.org<br>
        <i class="fab fa-facebook fa-lg" style="width:30px"> </i><a style="text-decoration: none; color: black;" class="w3-hover-text-blue" href="https://www.facebook.com/ALTRIONServer/" target="_blank">Altrion</a><br>

      </div>
      <div class="w3-col m6">
        <form action="" method="post">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <p><b>We ask for this information to maintain contact with our players.</b></p>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="First Name" name="Name" id="name" required="required">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
            </div>
          </div>
          <textarea class="w3-input w3-border" type="text" placeholder="Message" required name="Message"></textarea>
          <input class="w3-button w3-black w3-section w3-right" type="submit" name="submit" value="SEND">
        </form>
      </div>
    </div>
  </div>
<!-- End Contact -->
</div>
<!-- End Page content -->

<!-- Footer -->
<footer class="page-footer font-small bg-danger">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="https://altriontm.org/">AltrionTM</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- End Footer -->

<!-- Ranking Modal -->
<div class="modal fade bd-example-modal-lg" id="RankingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ranking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<table id="top20" class="table table-striped table-bordered" style="width: 100%">
    <thead>
        <tr>
            <th>Username</th>
            <th>Level</th>
            <th>Kills</th>
            <th>Deaths</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $db = getDB();
        $sql = $db->prepare("SELECT * FROM meh_users WHERE Access < 40 AND Access>0 ORDER BY Kills DESC LIMIT 20");
        $sql->execute();
        $resultado = $sql->fetchAll();
        foreach ($resultado as $user) {
        ?>
        <tr class="odd gradeX bg-white text-dark">
        <td class="tablesell"><?php echo $user['Username'] ?></td>
        <td class="tablesell"><?php echo $user['Level'] ?></td>
        <td class="tablesell"><?php  echo $user['Kills'] ?></td>
        <td class="tablesell"><?php echo $user['Deaths'] ?></td>
        </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Ranking Modal -->

<!-- Maps Modal -->
<div class="modal fade bd-example-modal-lg" id="MapsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Maps</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <table id="tmaps" class=" table table-striped table-bordered rounded" style="width: 80%">
        <thead>
            <tr>
                <th style="color: black;">Map Name</th>
                <th style="color: black;">Max Players</th>
                <th style="color: black;">Is Vip?</th>
                <th style="color: black;">Required level</th>
            </tr>
        </thead>
        <tbody>
<?php
$db = getDB();
$sql = $db->prepare("SELECT * FROM meh_maps WHERE staffOnly <= 0");
$sql->execute();
$resultado = $sql->fetchAll();
foreach ($resultado as $row) {
echo '
<tr class="odd gradeX">
<td class="tablesell">' . $row['Name'] . '</td>
<td class="tablesell">' . $row['PlayersMax'] .'</td>
<td class="tablesell">' . $row['memberOnly'] . '</td>
<td class="tablesell">' . $row['ReqLevel'] . '</td>
</td>
</tr>
';
}
?>

        </tbody>

      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Maps Modal -->

<!-- Maps Modal -->
<div class="modal fade bd-example-modal-lg" id="GuildsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Guilds</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<table id="tguilds" class="table table-striped table-bordered justify-content-center" style="width: 100%">
    <thead>
    <tr>
        <th style="color: black;">Guild ID</th>
        <th style="color: black;">Guild Name</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $db = getDB();
        $sql = $db->prepare("SELECT * FROM meh_users_guilds WHERE staffOnly <= 0 ORDER BY id LIMIT 10");
        $sql->execute();
        $resultado = $sql->fetchAll();
        foreach ($resultado as $row) {
        echo '
        <tr>
        <td class="tablesell">' . $row['id'] . '</td>
        <td class="tablesell">' . $row['Name'] .'</td>
        </td>
        </tr>
        ';
        }
      
        ?>

    </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Maps Modal -->

<!-- JavaScript -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.js"></script>
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Datatable JS -->
<script type="text/javascript" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- Custom JS -->
<script src="../assets/js/custom.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>