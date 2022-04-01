<?php
/*/ CONTACT /*/
include '../assets/inc/contact.php';
/*/ SESSION /*/
include '../assets/inc/acc_session.php';
/*/ USER VAR /*/
$userDetails=$userClass->userDetails($session_id);
$id = $userDetails->id;
$username = $userDetails->Username;
$email = $userDetails->Email;
$gender = $userDetails->Gender;
$gold = $userDetails->Gold;
$coins = $userDetails->Coins;
$donations = $userDetails->Donations;
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
    <img src="/assets/images/ManageAccount.png" style="width:100%; height: 380px;" draggable="false">
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

<!-- Manage Account -->
<div class="w3-container">
    <div>
        <h1 class="NavBar-Title text-center w3-red ml-5 mr-5">Hey <?php echo $username; ?>, here you can change your account info.</h1>
    </div>
    <!-- Acc Info -->
    <div class="w3-container" id="menu">
      <div class="w3-content" style="max-width:700px">
      
        <div class="w3-row w3-center w3-card w3-padding">
          <a href="javascript:void(0)" onclick="openMenu(event, 'Info');" id="myLink">
            <div class="w3-col s6 tablink w3-red">Info</div>
          </a>
          <a href="javascript:void(0)" onclick="openMenu(event, 'Password');">
            <div class="w3-col s6 tablink w3-red">Password</div>
          </a>
        </div>

        <div id="Info" class="w3-container menu w3-padding-48 w3-card w3-text-black">
          <ul>
              <li>
                  <p>Username: <?php echo $username; ?></p>
              </li>
              <li>
                  <p>Email: <?php echo $email; ?></p>
              </li>
              <li>
                  <p>Gender: <?php echo $gender; ?></p>
              </li>
              <li>
                  <p>Gold: <?php echo $gold; ?></p>
              </li>
              <li>
                  <p>Coins: <?php echo $coins; ?></p>
              </li>
              <li>
                  <p>Donations: $<?php echo $donations; ?></p>
              </li>
          </ul>
        </div>

        <div id="Password" class="w3-container menu w3-padding-48 w3-card">
            <div class="text-center w3-panel w3-text-red">
                <h4 style="text-shadow:1px 1px 0 #444"><b>Change your password</b></h4>
            </div>
            <form action="" method="post">
              <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                <div class="animated fadeInLeft" style="animation-delay: 0s;">
                  <input type="password" name="cPass" placeholder="Current Password" class="w3-input w3-border" required="">
                </div>
                <div class="animated fadeInLeft" style="animation-delay: 0.2s;">
                <div class="w3-half">
                  <div class="w3-col m10 pt-3">
                    <input type="password" name="nPass" class="w3-input w3-border" placeholder="New Password" required="">
                  </div>
                </div>
                </div>
                <div class="animated fadeInLeft" style="animation-delay: 0.4s;">
                <div class="w3-half">
                  <div class="w3-col m10 pt-3">
                    <input type="password" name="CnPass" class="w3-input w3-border" placeholder="Confirm New Password" required="">
                    <input type="text" name="uID" class="w3-input w3-border" placeholder="ID" value="<?php echo $username; ?>" required="" hidden="">
                  </div>
                </div>
                </div>
              </div>
              <div class="animated fadeInLeft" style="animation-delay: 0.6s;">
                <input class="w3-button w3-black w3-section btn-lg btn-block" type="submit" name="changePassword" value="CHANGE PASSWORD">
                <div class="errorMsg"><?php echo $errorMsgPassChange; ?></div>
              </div>
            </form>
        </div> 
      </div>
    </div>
    <!-- End Acc Info -->
</div>
<!-- End Manage Account -->

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
<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>
</body>
</html>