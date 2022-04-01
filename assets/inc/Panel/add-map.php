<?php
/*/ SESSION /*/
include '../../../assets/inc/game_session.php';
/*/ USER VAR /*/
$userDetails=$userClass->userDetails($session_id);
$useron = $userDetails->Username;

$db = getDB();
$sql = $db->prepare("SELECT * FROM meh_users WHERE Username='$useron'");
$sql->execute();
$resultado = $sql->fetchAll();

foreach ($resultado as $row) {
$u_id = $row['id'];
$name = $row['Username'];
$Access = $row['Access'];
}

if ($Access < 40) {
?>
<html>
  <head>
    <title>Restricted access - KOTF</title>
     <link rel="shortcut icon" href="http://vignette3.wikia.nocookie.net/dragonfable/images/5/5d/Sepulchure.png/revision/latest?cb=20150427114950">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <link rel='stylesheet' id='open-sans-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.0-alpha' type='text/css' media='all' />
  </head>
  <body>
    <div id="tudo">
      <div>&nbsp </div>
      <div id="conteudo" class="shadow">
        <p> &nbsp </p>
        <div style="height: 30px;">&nbsp </div>
        <p><center><img src="http://vignette3.wikia.nocookie.net/dragonfable/images/5/5d/Sepulchure.png/revision/latest?cb=20150427114950" alt=""> </br>only!</center></p>
        <p><a href="../"><center>&raquo Back to the game!</center></a></p>
      </div>
    </div>
  </body>
</html>
<?php } else { ?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KOTF | Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-info">KOTF</strong><strong>Panel</strong></div>
              <div class="brand-text brand-sm"><strong class="text-info">K</strong><strong class="text-info">O</strong><strong class="text-info">T</strong><strong class="text-info">F</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
                      
            <!-- Log out               -->
            <div class="list-inline-item logout"> <a id="logout" href="/cs" class="nav-link">Logout <i class="icon-logout"></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="title">
            <h1 class="h5 text-info"><?php echo $useron; ?></h1>
            <p><?php switch ($Access) {
                 case '1':
                   echo "User";
                   break;
                   case '2':
                   echo "Beta Player";
                   break;
                    case '3':
                   echo "Founder";
                   break;
                 case '10':
                    echo "Vip";
                 break;
                 case '20':
                   echo "Ambassador";
                   break;
                  case '40':
                    echo "Moderator";
                    break;
                  case '100':
                    echo "ALT Owner";
                    break;
                  default:
                  echo "Banned Player";
               }  ?></p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">List Menu</span>
        <ul class="list-unstyled">
                <li><a href="index.php"> <i class="icon-home "></i>Home Page</a></li>
                <li><a href="items.php"> <i class="icon-grid"></i>Items</a></li>
                <li><a href="shops.php"> <i class="icon-grid"></i>Shops</a></li>
                <li class="active"><a href="maps.php"> <i class="icon-grid text-info"></i>Maps</a></li>
                <li><a href="quests.php"> <i class="icon-grid"></i>Quests</a></li>
                <li><a href="monsters.php"> <i class="icon-grid"></i>Monsters</a></li>

                <li><a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>User Logs List</a>
                  <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
                    <li><a href="users-purchases.php">Users purchases</a></li>
                    <li><a href="users-items-sold.php">Users Items Sold</a></li>
                    <li><a href="users-items-drop.php">Users Items Drop</a></li>
                    <li><a href="users-open-open.php">Users Shop Open</a></li>
                  </ul>
                </li>
                
                <?php if ($Access == 100) { ?>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Owner List</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="users.php">Users</a></li>
                    <li><a href="#">Class</a></li>
                    <li><a href="#">Skills</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Badges</a></li>
                    <li><a href="#">Server Settings</a></li>
                  </ul>
                </li>
              <?php } ?>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
            </div>
          </div>
               
        
        
         <div class="block">
    <?php if(!(isset($_GET['edit']))){ ?>
      <div class="block full">
        <div class="block-title">
        <h6 class="heading-hr"><i class="icon-file"></i> Insert new map</h6>
                </ul>
          </div>
        <?php
          if(isset($_POST['add'])){
            $id = addslashes($_POST['id']);
            $nome = addslashes($_POST['add-term']);
            $FileName = addslashes($_POST['FileName']);
            $PlayersMax = addslashes($_POST['PlayersMax']);
            $monsters_info = addslashes($_POST['monsters_info']);
            $monsters_tree = addslashes($_POST['monsters_tree']);
            $monsters_frame = addslashes($_POST['monsters_frame']);
            $staffOnly = addslashes($_POST['staffOnly']);
            $ReqLevel = addslashes($_POST['ReqLevel']);
            $vipOnly = addslashes($_POST['vipOnly']);
            $FounderMap = addslashes($_POST['FounderMap']);
            
            $busca_it_add =  $db->prepare("SELECT Name FROM meh_maps WHERE id='$id'");
            $busca_it_add->execute();
            $conta_it_add = count($busca_it_add->fetchAll( PDO::FETCH_BOTH ) );
            
            if(empty($nome) || empty($id) || empty($ReqLevel) || empty($PlayersMax) || empty($FileName)){
              echo "<b>Fill out all fields!</b>";
              //}else if($conta_it_add > 0){
              //echo "<div class='alert alert-danger fade in block-inner'>
                    //<button type='button' class='close' data-dismiss='alert'>×</button>
                    //<i class='icon-cancel-circle'></i> ID in use!
                //</div>";
            }else{
              $insert_item_db = $db->prepare("INSERT INTO meh_maps (`id`, `Name`, `Label`, `FileName`, `PlayersMax`, `MapItems`, `monsters_info`, `monsters_tree`, `monsters_frame`, `Extra`, `pvpMap`, `staffOnly`, `memberOnly`, `ReqLevel`, `pkArea`, `vipOnly`, `FounderMap`, `isOcult`) VALUES ($id, '$nome', '0', '$FileName', '$PlayersMax', '0', '$monsters_info', '$monsters_tree', '$monsters_frame', '0', '0', '$staffOnly', '0', '$ReqLevel', '0', '$vipOnly', '$FounderMap', '0')");
              $insert_item_db->execute();
  if($insert_item_db){
                
$ip = $_SERVER['REMOTE_ADDR'];  
$insert_item_admin_db = $db->prepare("INSERT INTO meh_admin_logs (`id`,`Staff`, `Info`, `Date`, `IP`) VALUES (NULL,'$useron', 'Added the map: $nome', NOW( ), '$ip')");
                  $insert_item_admin_db->execute();
                
                  echo "<b>Sucess! Map name: $nome - Redirect in 5 seconds...</b><script type='text/javascript' language='JavaScript'>
setTimeout(function () { location.href = 'maps.php';
}, 5000);
</script>";              }else{
	
              echo "<b>MYSQL ERROR!</b>";
              }
            }
            echo "<br /><br />";
          }
        ?>
      </div>
      <form action="" method="POST">
        <table>
          <tr>
            <td class="pt-3"><font>ID: </font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="id" value="0"></td>

            <td class="pt-3 pl-3"><font>Map Name:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="add-term" value="<?php echo $_POST['add-term']; ?>"></td>
          </tr>

          <tr>
            <td class="pt-3">
              <font>Map Vip Only:</font>
              <select name="vipOnly" class="form-control mb-3 mb-3 bg-dark">
                <?php if(isset($_POST['vipOnly']) && $_POST['vipOnly'] > 0){ ?>
                  <option value="1">Yes</option>
                  <option value="-1">No</option>
                <?php }else{ ?>
                  <option value="-1">No</option>
                  <option value="1">Yes</option>
                <?php } ?>
              </select>
            </td>

            <td class="pt-3 pl-3">
              <font>Map Founder Only:</font>
              <select name="FounderMap" class="form-control mb-3 mb-3 bg-dark">
                <?php if(isset($_POST['FounderMap']) && $_POST['FounderMap'] > 0){ ?>
                  <option value="1">Yes</option>
                  <option value="-1">No</option>
                <?php }else{ ?>
                  <option value="-1">No</option>
                  <option value="1">Yes</option>
                <?php } ?>
              </select>
            </td>

            <td class="pt-3 pl-3">
              <font>Map Staff Only:</font>
              <select name="staffOnly" class="form-control mb-3 mb-3 bg-dark">
                <?php if(isset($_POST['staffOnly']) && $_POST['staffOnly'] > 0){ ?>
                  <option value="1">Yes</option>
                  <option value="-1">No</option>
                <?php }else{ ?>
                  <option value="-1">No</option>
                  <option value="1">Yes</option>
                <?php } ?>
              </select>
            </td>
          </tr>

          <tr>
            <td class="pt-3"><font>Monster Info: </font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="monsters_info"></td>

            <td class="pt-3 pl-3"><font>Monster Tree:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="monsters_tree"></td>

            <td class="pt-3 pl-3"><font>Monster Frame:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="monsters_frame"></td>
          </tr>

          <tr>
            <td class="pt-3"><font>Max Players: </font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="PlayersMax"></td>

            <td class="pt-3 pl-3"><font>Map Req. Level:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ReqLevel"></td>
          </tr>


          <tr>
            <td class="pt-3"><font>Map File Name: </font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="FileName"></td>
          </tr>

          <tr id="upload">
            <td class="pt-3"><div class="block bg-dark"><a href="#" onclick="window.open('upload-maps.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');" class="text-info">Send .swf</a></div>  </td>
          </tr>


          <tr><td><input class="btn btn-info btn-lg mt-2" type="submit" name="add" value="Insert MAP"></td></tr>
        </table>
      </form>
    <?php }else{ ?>
            <div class="block">
      <div class="block full">
        <div class="block-title">
        <h6 class="heading-hr"><i class="icon-file"></i> Edit Map</h6>
        <?php
          if(isset($_POST['edd'])){
            $ed_id = addslashes($_POST['ed_id']);
            $ed_name = addslashes($_POST['ed_name']);
            $ed_FileName = addslashes($_POST['ed_FileName']);
            $ed_PlayersMax = addslashes($_POST['ed_PlayersMax']);
            $ed_monsters_info = addslashes($_POST['ed_monsters_info']);
            $ed_monsters_tree = addslashes($_POST['ed_monsters_tree']);
            $ed_monsters_frame = addslashes($_POST['ed_monsters_frame']);
            $ed_staffOnly = addslashes($_POST['ed_staffOnly']);
            $ed_ReqLevel = addslashes($_POST['ed_ReqLevel']);
            $ed_vipOnly = addslashes($_POST['ed_vipOnly']);
            $ed_FounderMap = addslashes($_POST['ed_FounderMap']);

            if(empty($ed_name) || empty($ed_FileName)){
              echo "<b>Fill out all fields!</b>";
            }else{
               $insert_db = $db->prepare("UPDATE meh_maps SET Name='$ed_name', Label='', FileName='$ed_FileName', PlayersMax='$ed_PlayersMax', MapItems='', monsters_info='$ed_monsters_info', monsters_tree='$ed_monsters_tree', monsters_frame='$ed_monsters_frame', Extra='', pvpMap='0', staffOnly='$ed_staffOnly', memberOnly='0', ReqLevel='$ed_ReqLevel', pkArea='0', vipOnly='$ed_vipOnly', FounderMap='$ed_FounderMap', isOcult='0'  WHERE id='$ed_id'");
               $insert_db->execute();

              if($insert_db){
                
$ip = $_SERVER['REMOTE_ADDR'];  
$insert_db_admin = $db->prepare("INSERT INTO meh_admin_logs (`id`,`Staff`, `Info`, `Date`, `IP`) VALUES (NULL,'$useron', 'Edit the map: $ed_name', NOW( ), '$ip')");
                 $insert_db_admin->execute();
                
                  echo "<b>Sucess! - Redirect in 5 seconds...</b>
                    <script type='text/javascript' language='JavaScript'>
setTimeout(function () { location.href = 'maps.php';
}, 5000);
</script>";
              }else{
              echo "<b style='color: red;'>MYSQL ERROR!</b>";
              }
            }
          }
        ?>
      </div>
        <?php
          $edit = addslashes($_GET['edit']);
          $busca_edit = $db->prepare("SELECT * FROM meh_maps WHERE id=$edit");
          $busca_edit ->execute();
          $conta_edit = count($busca_edit->fetchAll( PDO::FETCH_BOTH ) );
          if($conta_edit > 0){
            $busca_edit = $db->prepare("SELECT * FROM meh_maps WHERE id=$edit");
            $busca_edit ->execute();
            $resultado = $busca_edit->fetchAll();
            foreach ($resultado as $fetch_edit) {
            $edit_id = $fetch_edit['id'];
            $edit_name = $fetch_edit['Name'];
            $edit_Label = $fetch_edit['Label'];
            $edit_FileName = $fetch_edit['FileName'];
            $edit_PlayersMax = $fetch_edit['PlayersMax'];
            $edit_MapItems = $fetch_edit['MapItems'];
            $edit_monsters_info = $fetch_edit['monsters_info'];
            $edit_monsters_tree = $fetch_edit['monsters_tree'];
            $edit_monsters_frame = $fetch_edit['monsters_frame'];
            $edit_Extra = $fetch_edit['Extra'];
            $edit_pvpMap = $fetch_edit['pvpMap'];
            $edit_staffOnly = $fetch_edit['staffOnly'];
            $edit_memberOnly = $fetch_edit['memberOnly'];
            $edit_ReqLevel = $fetch_edit['ReqLevel'];
            $edit_pkArea = $fetch_edit['pkArea'];
            $edit_vipOnly = $fetch_edit['vipOnly'];
            $edit_FounderMap = $fetch_edit['FounderMap'];
            $edit_isOcult = $fetch_edit['isOcult'];
          }
        ?>
          <form action="" method="POST">
            <table>
              <tr>
                <td class="pt-3"><font>ID:</font><input class="datepicker-trigger form-control hasDatepicker" type="text" readonly value="<?php echo $edit_id; ?>"></td>

                <td class="pt-3 pl-3"><font>Map Name:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_name" value="<?php echo $edit_name; ?>"></td>
              </tr>

          
          <tr>
                <td class="pt-3">
                  <font>Map Vip Only:</font>
                  <select name="ed_vipOnly" class="form-control mb-3 mb-3 bg-dark">
                    <?php if($edit_vipOnly > 0){ ?>
                  <option value="1">Yes</option>
                  <option value="-1">No</option>
                <?php }else{ ?>
                  <option value="-1">No</option>
                  <option value="1">Yes</option>
                    <?php } ?>
                  </select>
                </td>

                <td class="pt-3 pl-3">
                  <font>Map Founder Only:</font>
                  <select name="ed_FounderMap" class="form-control mb-3 mb-3 bg-dark">
                    <?php if($edit_FounderMap > 0){ ?>
                  <option value="1">Yes</option>
                  <option value="-1">No</option>
                <?php }else{ ?>
                  <option value="-1">No</option>
                  <option value="1">Yes</option>
                    <?php } ?>
                  </select>
                </td>

                <td class="pt-3 pl-3">
                  <font>Map Staff Only:</font>
                  <select name="ed_staffOnly" class="form-control mb-3 mb-3 bg-dark">
                    <?php if($edit_staffOnly > 0){ ?>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                <?php }else{ ?>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                    <?php } ?>
                  </select>
                </td>
              </tr>

              <tr>
                <td class="pt-3"><font>Monster Info:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_monsters_info" value="<?php echo $edit_monsters_info; ?>"></td>

                <td class="pt-3 pl-3"><font>Monster Tree:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_monsters_tree" value="<?php echo $edit_monsters_tree; ?>"></td>

                <td class="pt-3 pl-3"><font>Monster Frame:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_monsters_frame" value="<?php echo $edit_monsters_frame; ?>"></td>
              </tr>

              <tr>
                <td class="pt-3"><font>Max Players:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_PlayersMax" value="<?php echo $edit_PlayersMax; ?>"></td>

                <td class="pt-3 pl-3"><font>Map Req. Level:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_ReqLevel" value="<?php echo $edit_ReqLevel; ?>"></td>
              </tr>

              <tr>
                <td class="pt-3"><font>Map File Name:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_FileName" value="<?php echo $edit_FileName; ?>"></td>
              </tr>

              <tr id="upload">
                <td class="pt-3"><div class="block bg-dark"><a href="#" onclick="window.open('upload-maps.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');" class="text-info">Send .swf</a></div>  </td>
              </tr>
              
              
              <tr>
            
              <tr><td><input type="hidden" name="ed_id" value="<?php echo $edit_id; ?>"><input class="btn btn-info btn-lg mt-2" type="submit" name="edd" value="Update map"></td></tr>
            </table>
          </form>
      <?php
        }else{
              echo "<div class='alert alert-danger fade in block-inner'>
                    <button type='button' class='close' data-dismiss='alert'>×</button>
                    <i class='icon-cancel-circle'></i> Post not found!
                </div>";        }
      ?>
    
    <?php } ?>

         </div>
       </div>
     </div>
   </section>
 </div>
</div>




        
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              <p class="no-margin-bottom">2018 &copy; Kingdoms Of The Future Panel <a class="text-info" target="_blank" href="https://www.facebook.com/MarcosGarciaFern">MarkOsBab</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>
<?php } ?>