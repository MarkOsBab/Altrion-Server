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
                <li class="active"><a href="items.php"> <i class="icon-grid text-info"></i>Items</a></li>
                <li><a href="shops.php"> <i class="icon-grid"></i>Shops</a></li>
                <li><a href="maps.php"> <i class="icon-grid"></i>Maps</a></li>
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
                    <li><a href="news.php">News</a></li>
                    <li><a href="badges.php">Badges</a></li>
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
      <div style='padding: 10px 50px 10px 50px;'>
    <div class="block">
      <div class="block full">
        <div class="block-title">
        <h6 class="heading-hr"><i class="icon-file"></i> Insert new Item</h6>
                </ul>       <br />
        <?php
          if(isset($_POST['add'])){

            //Basic Functions
            $id = addslashes($_POST['itid']);
            $nome = addslashes($_POST['add-term']);
            $Upg = addslashes($_POST['Upg']);
            $Coins = addslashes($_POST['Coins']);
            $temp = addslashes($_POST['temp']);
            $level = addslashes($_POST['level']);
            $preco = addslashes($_POST['preco']);
            $estoque = addslashes($_POST['estoque']);
            $ReqItems = addslashes($_POST['ReqItems']);
            $tipo = addslashes($_POST['tipo']);
            $file = addslashes($_POST['file']);
            $link = addslashes($_POST['link']);
            $ReqQuests = addslashes($_POST['ReqQuests']);

            //News Functions
            $ItemRarity = addslashes($_POST['ItemRarity']);
            $tradeable = addslashes($_POST['isTradeable']);
            $founder = addslashes($_POST['Founder']);
            $stafff = addslashes($_POST['stafff']);
            $description = addslashes($_POST['description']);



            if($tipo == "Item" || $tipo == "Enhancement"){
              $file = "none";
              $link = "none";
            }
            
            
            if(isset($_POST['acumular'])){
              $acumular = addslashes($_POST['acumular']);
            }else{
              $acumular = 1;
            }
            
            $busca_it_add = $db->prepare("SELECT Name FROM meh_items WHERE id='$id'");
            $busca_it_add->execute();
            $conta_it_add = count($busca_it_add->fetchAll( PDO::FETCH_BOTH ) );

            if(empty($nome) || empty($id)){
              echo "<b>Fill out all fields! (Linkague or Name or Level or Price or Stock or Desc or Bag Stock is empty)
</b>";
            }else if($conta_it_add > 0){
              echo "<b>There is already an item with this ID!</b>";
            }else{
              $continua = true;
              if($tipo == "Class" && $classid <= 0){
                $continua = false;
              }
              
              switch($tipo){
                case "Sword":
                  //$destino_file = "items/swords/";
                  $es = "Weapon";
                  $icon = "iwsword";
                break;
                case "Dagger":
                  //$destino_file = "items/daggers/";
                  $es = "Weapon";
                  $icon = "iwdagger";
                break;
                case "Staff":
                  //$destino_file = "items/staves/";
                  $es = "Weapon";
                  $icon = "iwstaff";
                break;
                case "Polearm":
                  //$destino_file = "items/polearms/";
                  $es = "Weapon";
                  $icon = "iwpolearm";
                break;
                case "Axe":
                  //$destino_file = "items/axes/";
                  $es = "Weapon";
                  $icon = "iwaxe";
                break;
                case "Mace":
                  //$destino_file = "items/maces/";
                  $es = "Weapon";
                  $icon = "iwmace";
                break;
                case "Armor":
                  //$destino_file = "classes/";
                  $es = "co";
                  $icon = "iwarmor";
                break;
                
                  case "Class":
                  //$destino_file = "classes/";
                  $es = "ar";
                  $icon = "iiclass";
                break;
                
                case "Pet":
                  //$destino_file = "items/pets/";
                  $es = "pe";
                  $icon = "iipet";
                break;
                case "Helm":
                  //$destino_file = "items/helms/";
                  $es = "he";
                  $icon = "iihelm";
                break;
                case "Cape":
                  //$destino_file = "items/capes/";
                  $es = "ba";
                  $icon = "iicape";
                break;
                case "Item":
                  $es = "None";
                  $icon = "iibag";
                break;
                default:
                  $continua = false;
                break;
              }

             
              
              if($continua){
                $insert_item_db = $db->prepare("INSERT INTO meh_items (`id`, `Name`, `Upg`, `Coins`, `Temp`, `Cost`, `QtyRemain`, `ReqItems`, `Lvl`, `ES`, `Type`, `Icon`, `File`, `Link`, `Desc`, `Stk`, `ItemRarity`, `isTradeable`, `Founder`, `Staff`, `House`, `ClassID`, `Class`, `EnhID`, `EnhPatternID`, `FactionID`, `Faction`, `DPS`, `Qty`, `ReqCP`, `ReqRep`, `Rty`, `Elmt`, `PTR`, `ReqQuests`, `QSindex`, `Meta`, `QSvalue`, `Rng`, `ProcID`, `ReqClass`, `sQuest`, `Date`, `Author`) VALUES ('$id' , '$nome', '$Upg', '$Coins', '$temp', '$preco', '$estoque', '$ReqItems', '$level', '$es', '$tipo', '$icon', '$file', '$link', '$description', '$acumular', '$ItemRarity', '$tradeable', '$founder', '$stafff', '0', '0', '0', '1', '0', '1', '0', '100', '1', '0', '0', '10', 'None', '0', '$ReqQuests', '-1', '-1', '0', '100', '-1', '0', '0', CURRENT_TIMESTAMP, '$useron')");
                $insert_item_db->execute();
                if($insert_item_db){
                	$ip = $_SERVER['REMOTE_ADDR'];  
                  $insert_item_admin_db = $db->prepare("INSERT INTO meh_admin_logs (`id`,`Staff`, `Info`, `Date`, `IP`) VALUES (NULL,'$useron', 'Added the item: $nome', NOW( ), '$ip')");
                  $insert_item_admin_db->execute();

                  echo "
                     Sucess! Item name: $nome - Redirect in 5 seconds...<script type='text/javascript' language='JavaScript'>
setTimeout(function () { location.href = 'items.php';
}, 5000);
</script>
";
                  

                }else{
                  echo "<b style='color: red'>MYSQL ERROR</b>";
                }              }else{
                  echo "<b>Error! Check the fields!</b> ";
              }
            }
           
          }
        ?>
      </div>
      <form method="POST">
        <table>

            <tr>
            <td><font>ID</font><input type="text" class="form-control" value="<?php if(isset($_POST['itid'])){ echo $_POST['itid']; }else{ echo 0; } ?>" name="itid"></td>
            
            <td class="pl-3"><font>Item Name</font><input type="text" name="add-term" class="datepicker-trigger form-control hasDatepicker" value="<?php echo $_POST['add-term']; ?>" maxlength="50"></td>

            <td class="pt-3 pl-3">
              <font>Item Type:</font>
              <select name="tipo" class="form-control mb-3 mb-3 bg-dark" onchange="exibeMsg(this.value);">
                <option value="Sword">Sword</option>
                <option value="Dagger">Dagger</option>
                <option value="Staff">Staff</option>
                <option value="Polearm">Polearm</option>
                <option value="Axe">Axe</option>
                <option value="Mace">Mace</option>
                <option value="Armor">Armor</option>
                <option value="Class">Class</option>
                <option value="Pet">Pet</option>
                <option value="Helm">Helm</option>
                <option value="Cape">Cape</option>
                <option value="Item">Bag</option>
              </select>
            </td>
          <tr id="txt">
            <script>
              function exibeMsg(valor){
                switch (valor){
                  break;
                  case 'Item':
                    document.getElementById('txt').innerHTML = '<td style="border: 1px #000; padding: 10px 50px 10px 50px;" align="right">Bag Stock: <font color="red" style="font-size: 10px;">(Example: Bone Dust x50)</font> </td><td><input type="text" value="1" name="acumular" /></td>';
                    document.getElementById('sfile').innerHTML = '';
                    document.getElementById('slink').innerHTML = '';
                  break;
                  case 'Enhancement':
                    document.getElementById('sfile').innerHTML = '';
                    document.getElementById('slink').innerHTML = '';
                    document.getElementById('txt').innerHTML = '';
                  break;
                  default:
                    document.getElementById('txt').innerHTML = '';
                    document.getElementById('sfile').innerHTML = '<td style="border: 1px #000; padding: 10px 50px 10px 50px;" align="right">SWF File: </td><td><input type="text" name="file" value="<?php echo $_POST['file']; ?>" placeholder="Example: items/swords/Caladbolg.swf"></td>';
                    document.getElementById('slink').innerHTML = '<td style="border: 1px #000; padding: 10px 50px 10px 50px;" align="right">Linkage: </td><td><input type="text" name="link" value="<?php echo $_POST['link']; ?>" placeholder="Example: Caladbolg"></td>';
                  break;
                }
              }
            </script>
          </tr>

          <tr>
            <td class="pt-3">
              <font>Item is Vip: </font>
              <select name="Upg" class="form-control mb-3 mb-3 bg-dark">
                <?php if(isset($_POST['Upg']) && $_POST['Upg'] > 0){ ?>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                <?php }else{ ?>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                <?php } ?>
              </select>
            </td>

          <td class="pt-3 pl-3">
              <font>Item Is Staff:</font>
              <select name="stafff" class="form-control mb-3 mb-3 bg-dark">
                <?php if(isset($_POST['staff']) && $_POST['staff'] > 0){ ?>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                <?php }else{ ?>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                <?php } ?>
              </select>
            </td>

            <td class="pt-3 pl-3">
              <font>Item is Founder:</font>
              <select name="Founder" class="form-control mb-3 mb-3 bg-dark">

                <?php if(isset($_POST['Founder']) && $_POST['Founder'] >= 0){ ?>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                <?php }else{ ?>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                <?php } ?>
              </select>
            </td>
          </tr>

          <tr>
            
            <td class="pt-3 pr-3">
              <font>KCs:</font>
              <select name="Coins" class="form-control mb-3 mb-3 bg-dark">
                <?php if(isset($_POST['Coins']) && $_POST['Coins'] > 0){ ?>
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
            
         
            
            <td class="pt-3 pl-3">
              <font>Is Tradeable:</font>
              <select name="isTradeable" class="form-control mb-3 mb-3 bg-dark">

                <?php if(isset($_POST['isTradeable']) && $_POST['isTradeable'] >= 0){ ?>
                  <option value="0">Yes</option>
                  <option value="1">No</option>
                <?php }else{ ?>
                  <option value="0">Yes</option>
                  <option value="1">No</option>
                <?php } ?>
              </select>
            </td>

            
            <td class="pt-3 pl-3">
            	<font>Item Rarity:</font>
                       <select name="ItemRarity" class="form-control mb-3 mb-3 bg-dark">
                                  

                                  <?php if($ItemRarity >= 0){ ?>
                                     <option value="0" >Bad Rarity</option>
                                     <option value="1" >Unknown Rarity</option>
                                     <option value="2" >Common Rarity</option>
                                     <option value="3" >Rare Rarity</option>
                                     <option value="4" >Epic Rarity</option>
                                     <option value="5" >Legendary Rarity</option>
                                      <option value="6" >Mythical Rarity</option>
                                      <option value="7" >Unique Rarity</option>
                                      <option value="8" >Super Rarity</option>
                                      <option value="9" >Artifact Rarity</option>
                                      <option value="10" >Special Rarity</option>
                                      <option value="11" >Matinar Rarity</option>
                                      <option value="12" >Ultra Rarity</option>
                                      <option value="13" >Hiper Rarity</option>
                                      <option value="14" >Mega Rarity</option>
                                      <option value="15" >LQS Rarity</option>
                                      <option value="16" >Normal Rarity</option>
                                      <option value="17" >1% Rarity</option>
                                      <option value="18" >Event Rarity</option>
                                  <?php
                                    } else {
                                   ?>
                                   <option value="0" >Bad Rarity</option>
                                     <option value="1" >Unknown Rarity</option>
                                     <option value="2" >Common Rarity</option>
                                     <option value="3" >Rare Rarity</option>
                                     <option value="4" >Epic Rarity</option>
                                     <option value="5" >Legendary Rarity</option>
                                      <option value="6" >Mythical Rarity</option>
                                      <option value="7" >Unique Rarity</option>
                                      <option value="8" >Super Rarity</option>
                                      <option value="9" >Artifact Rarity</option>
                                      <option value="10" >Special Rarity</option>
                                      <option value="11" >Matinar Rarity</option>
                                      <option value="12" >Ultra Rarity</option>
                                      <option value="13" >Hiper Rarity</option>
                                      <option value="14" >Mega Rarity</option>
                                      <option value="15" >LQS Rarity</option>
                                      <option value="16" >Normal Rarity</option>
                                      <option value="17" >1% Rarity</option>
                                      <option value="18" >Event Rarity</option>
                                      <?php
                                    } 
                                   ?>
                            </select>
            </td>
        </tr>
          
          
          <tr>
            
            <td>
              <font>Temporal Item:</font>
              <select name="temp" class="form-control mb-3 mb-3 bg-dark">
                <?php if(isset($_POST['temp']) && $_POST['temp'] > 0){ ?>
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
          
          <tr>
            <td><font>Item Price</font><input type="text" class="datepicker-trigger form-control hasDatepicker" value="<?php if(isset($_POST['preco'])){ echo $_POST['preco']; }else{ echo 0; } ?>" name="preco"></td>

            <td class="pl-3"><font>Item Level</font><input type="text" class="datepicker-trigger form-control hasDatepicker" value="<?php if(isset($_POST['level'])){ echo $_POST['level']; }else{ echo 1; } ?>" name="level"></td>
          </tr>
          <tr>
            <td><font>Stock</font><input type="text" class="datepicker-trigger form-control hasDatepicker" value="<?php if(isset($_POST['estoque'])){ echo $_POST['estoque']; }else{ echo 0; } ?>" name="estoque"></td>

            <td class="pl-3"><font>Bag Stock:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" value="<?php if(isset($_POST['acumular'])){ echo $_POST['acumular']; }else{ echo 0; } ?>" name="estoque"></td>
          </tr>
          <tr>
            <td><font>Req. Items:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" value="<?php if(isset($_POST['ReqItems'])){ echo $_POST['ReqItems']; }else ?>" name="ReqItems"></td>
          
           <td class="pl-3"><font>Req. Quests:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" value="<?php if(isset($_POST['ReqQuests'])){ echo $_POST['ReqQuests']; }else{ echo 1; } ?>" name="ReqQuests"></td>
          </tr>
          
          <tr id="sfile">
            <td class="pt-3"><font>SWF File:</font><input type="text" name="file" class="datepicker-trigger form-control hasDatepicker" placeholder="Example: items/swords/Caladbolg.swf"></td>
          </tr>
          <tr id="slink">
            <td class="pt-3"><font>Linkage:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="link" placeholder="Example: Caladbolg"></td>
          </tr>
          <tr id="upload">
            <td class="pt-3"><div class="block bg-dark"><a href="#" onclick="window.open('upload-items.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');" class="text-info">Send .swf</a></div>  </td>
          </tr>
          
          <tr>
            <td><font>Description:</font><textarea name="description" class="elastic form-control required"></textarea></td>
          </tr>
          
          <tr><td class="pt-5"><input type="submit" name="add" value="Insert item!" class="btn btn-info btn-lg"></td></tr>
        </table>
      </form>
    <?php }else{ ?>
      <div style='padding: 10px 50px 10px 50px;'>
    <div class="block">
      <div class="block full">
        <div class="block-title">
        <h6 class="heading-hr"><i class="icon-file"></i>Edit item</h6>
                </ul>       <?php
          if(isset($_POST['edd'])){
            
            //Basic Functions
            $ed_id = addslashes($_POST['ed_id']);
            $ed_name = addslashes($_POST['ed_name']);
            $ed_Upg = addslashes($_POST['ed_Upg']);
            $ed_coins = addslashes($_POST['ed_coins']);
            $ed_temp = addslashes($_POST['ed_temp']);
            $ed_level = addslashes($_POST['ed_level']);
            $ed_preco = addslashes($_POST['ed_preco']);
            $ed_estoque = addslashes($_POST['ed_estoque']);
            $ed_reqitems = addslashes($_POST['ed_reqitems']);
            $ed_ReqQuest = addslashes($_POST['ed_ReqQuest']);
            $ed_type = addslashes($_POST['ed_type']);
            $ed_file = addslashes($_POST['ed_file']);
            $ed_link = addslashes($_POST['ed_link']);
            $ed_stk = addslashes($_POST['ed_stk']);
            $ed_desc = addslashes($_POST['ed_desc']);

            //News Functions
            $ed_ItemRarity = addslashes($_POST['ed_ItemRarity']);
            $ed_tradeable = addslashes($_POST['ed_tradeable']);
            $ed_founder = addslashes($_POST['ed_Founder']);
            $ed_staff = addslashes($_POST['ed_staff']);
            
            switch($ed_type){
                case "Sword":
                  $es = "Weapon";
                  $icon = "iwsword";
                break;
                case "Dagger":
                  $es = "Weapon";
                  $icon = "iwdagger";
                break;
                case "Staff":
                  $es = "Weapon";
                  $icon = "iwstaff";
                break;
                case "Polearm":
                  $es = "Weapon";
                  $icon = "iwpolearm";
                break;
                case "Axe":
                  $es = "Weapon";
                  $icon = "iwaxe";
                break;
                case "Mace":
                  $es = "Weapon";
                  $icon = "iwmace";
                break;
                case "Armor":
                  $es = "co";
                  $icon = "iwarmor";
                break;
                case "Class":
                  $es = "ar";
                  $icon = "iiclass";
                break;
                
                case "Pet":
                  $es = "pe";
                  $icon = "iipet";
                break;
                case "Helm":
                  $es = "he";
                  $icon = "iihelm";
                break;
                case "Cape":
                  $es = "ba";
                  $icon = "iicape";
                break;
                case "Item":
                  $es = "None";
                  $icon = "iibag";
                break;
                case "Enhancement":
                  $es = "Weapon";
                  $icon = "none";
                break;
                case "House":
                  $es = "ho";
                  $icon = "ihhouse";
                break;
                case "Floor Item":
                  $es = "hi";
                  $icon = "ihfloor";
                break;
                case "Wall Item":
                  $es = "hi";
                  $icon = "ihwall";
                break;
                default:
                  $continua = false;
                break;
              }

            $busca_edit = $db->prepare("SELECT * FROM meh_items");
            $busca_edit ->execute();
            $resultado = $busca_edit->fetchAll();
            foreach ($resultado as $fetch_edit) {


            //Basic Functions

            $edit_id = $fetch_edit['id'];
            $edit_name = $fetch_edit['Name'];
            $edit_upg = $fetch_edit['Upg'];
            $edit_coins = $fetch_edit['Coins'];
            $edit_temp = $fetch_edit['Temp'];
            $edit_level = $fetch_edit['Lvl'];
            $edit_cost = $fetch_edit['Cost'];
            $edit_estoque = $fetch_edit['QtyRemain'];
            $edit_reqitems = $fetch_edit['ReqItems'];
            $edit_reqquest = $fetch_edit['ReqQuests'];
            $edit_type = $fetch_edit['Type'];
            $edit_file = $fetch_edit['File'];
            $edit_link = $fetch_edit['Link'];
            $edit_desc = $fetch_edit['Desc'];
            $edit_es = $fetch_edit['ES'];
            $edit_stk = $fetch_edit['Stk'];

            //News Functions
            $edit_rarity = $fetch_edit['ItemRarity'];
            $edit_tradeable = $fetch_edit['isTradeable'];
            $edit_founder = $fetch_edit['Founder'];
            $edit_staff = $fetch_edit['Staff'];
          }
            
            if(empty($ed_name) || ($ed_preco < 0) || ($ed_level < 0) || ($ed_estoque < 0) || ($ed_stk < 0)){
                  echo "<b>Error! Check the fields!</b>";
            }else{
              $insert_db = $db->prepare("UPDATE meh_items SET `id`='$ed_id', `Name`='$ed_name', `Coins`='$ed_coins', `Upg`='$ed_Upg', `Temp`='$ed_temp', `Cost`='$ed_preco', `Lvl`='$ed_level', `QtyRemain`='$ed_estoque', `ReqItems`='$ed_reqitems', `File`='$ed_file', `Link`='$ed_link', `Desc`='$ed_desc', `Type`='$ed_type', `ES`='$es', `Icon`='$icon', `ItemRarity`='$ed_ItemRarity', `isTradeable`='$ed_tradeable', `Founder`='$ed_founder', `ReqQuests`='$ed_ReqQuest', `Staff`='$ed_staff', `Stk`='$ed_stk', `Date`=CURRENT_TIMESTAMP, `Author`='$useron' WHERE `id`='$ed_id'");
              $insert_db->execute();
            if($insert_db) {

              	 $ip = $_SERVER['REMOTE_ADDR'];  
                 $insert_db_admin = $db->prepare("INSERT INTO meh_admin_logs (`id`,`Staff`, `Info`, `Date`, `IP`) VALUES (NULL,'$useron', 'Edit the item: $ed_name', NOW( ), '$ip')");
                 $insert_db_admin->execute();
                echo "Sucess! - Redirect in 5 seconds...<script type='text/javascript' language='JavaScript'>
setTimeout(function () { location.href = 'items.php';
}, 5000);
</script>
                </div>";
              }else{
                echo "<b style='color: red'>MYSQL ERROR!</b>";
              }
            }
          }
        ?>
      </div>
        <?php
          $edit = addslashes($_GET['edit']);
          $busca_edit = $db->prepare("SELECT * FROM meh_items WHERE id=$edit");
          $busca_edit ->execute();
          $conta_edit = count($busca_edit->fetchAll( PDO::FETCH_BOTH ) );
          if($conta_edit > 0){
            $types = "Sword,Dagger,Staff,Polearm,Axe,Mace,Armor,Pet,Helm,Cape,Item,Enhancement,House,Floor Item,Wall Item";
            $busca_edit = $db->prepare("SELECT * FROM meh_items WHERE id=$edit");
            $busca_edit ->execute();
            $resultado = $busca_edit->fetchAll();
            foreach ($resultado as $fetch_edit) {


            //Basic Functions

            $edit_id = $fetch_edit['id'];
            $edit_name = $fetch_edit['Name'];
            $edit_upg = $fetch_edit['Upg'];
            $edit_coins = $fetch_edit['Coins'];
            $edit_temp = $fetch_edit['Temp'];
            $edit_level = $fetch_edit['Lvl'];
            $edit_cost = $fetch_edit['Cost'];
            $edit_estoque = $fetch_edit['QtyRemain'];
            $edit_reqitems = $fetch_edit['ReqItems'];
            $edit_reqquest = $fetch_edit['ReqQuests'];
            $edit_type = $fetch_edit['Type'];
            $edit_file = $fetch_edit['File'];
            $edit_link = $fetch_edit['Link'];
            $edit_desc = $fetch_edit['Desc'];
            $edit_es = $fetch_edit['ES'];
            $edit_stk = $fetch_edit['Stk'];

            //News Functions
            $edit_rarity = $fetch_edit['ItemRarity'];
            $edit_tradeable = $fetch_edit['isTradeable'];
            $edit_founder = $fetch_edit['Founder'];
            $edit_staff = $fetch_edit['Staff'];
          }
          
        ?>
          <form action="" method="POST">
            <table>
            	<tr>
            <td><font>ID</font><input type="text" class="form-control "  value="<?php echo $edit_id; ?>" name="ed_id"></td>

            <td class="pl-3"><font>Item Name</font><input type="text" name="ed_name" class="datepicker-trigger form-control hasDatepicker" value="<?php echo $edit_name; ?>" maxlength="50"></td>

                
                <td class="pt-3 pl-3">
                	<font>Item Type:</font>
                  <select name="ed_type" class="form-control mb-3 mb-3 bg-dark">
                    <?php
                      $tipos = explode(",", $types);
                      for ($b = 0; $b < count($tipos); $b++) {
                        if($edit_type == $tipos[$b]){
                          if($edit_type == 'Item' || $edit_type == 'None')
                            echo "<option value='Item'>{$tipos[$b]}</option>";
                          else
                            echo "<option value='{$tipos[$b]}'>{$tipos[$b]}</option>";
                        }
                      }
                      for ($c = 0; $c < count($tipos); $c++) {
                        if($edit_type != $tipos[$c]){
                            if($edit_type == 'Item' || $edit_type == 'None')
                              echo "<option value='Item'>{$tipos[$c]}</option>";
                            else
                              echo "<option value='{$tipos[$c]}'>{$tipos[$c]}</option>";
                          }
                      }
                    ?>
                  </select>
                </td>
              </tr>
          <tr>
            <td class="pt-3">
              <font>Item Is Vip: </font>
              <select name="ed_Upg" class="form-control mb-3 mb-3 bg-dark">
                <?php if($edit_upg > 0){ ?>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                <?php }else{ ?>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                <?php } ?>
              </select>
            </td>

            <td class="pt-3 pl-3">
              <font>Item is Staff: </font>
              <select name="ed_staff" class="form-control mb-3 mb-3 bg-dark">
                <?php if($edit_staff > 0){ ?>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                <?php }else{ ?>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                <?php } ?>
              </select>
            </td>

            <td class="pt-3 pl-3">
              <font>Item is Founder: </font>
              <select name="ed_Founder" class="form-control mb-3 mb-3 bg-dark">
                <?php if($edit_founder > 0){ ?>
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
          <td class="pt-3">
              <font>Kcs: </font>
              <select name="ed_coins" class="form-control mb-3 mb-3 bg-dark">
                <?php if($edit_coins > 0){ ?>
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
          

          <td class="pt-3 pl-3">
              <font>Item Is Tradeable: </font>
              <select name="ed_tradeable" class="form-control mb-3 mb-3 bg-dark">
                <?php if($edit_tradeable > 0){ ?>
                  <option value="1">No</option>
                  <option value="0">Yes</option>
                <?php }else{ ?>
                  <option value="0">Yes</option>
                  <option value="1">No</option>
                <?php } ?>
              </select>
            </td>

            <td class="pt-3 pl-3">
            	<font>Item Rarity:</font>
                                  <select name="ed_ItemRarity" class="form-control mb-3 mb-3 bg-dark">
                                  

                                  <?php if($ed_ItemRarity >= 0){ ?>
                                     <option value="0" >Bad Rarity</option>
                                     <option value="1" >Unknown Rarity</option>
                                     <option value="2" >Common Rarity</option>
                                     <option value="3" >Rare Rarity</option>
                                     <option value="4" >Epic Rarity</option>
                                     <option value="5" >Legendary Rarity</option>
                                      <option value="6" >Mythical Rarity</option>
                                      <option value="7" >Unique Rarity</option>
                                      <option value="8" >Super Rarity</option>
                                      <option value="9" >Artifact Rarity</option>
                                      <option value="10" >Special Rarity</option>
                                      <option value="11" >Matinar Rarity</option>
                                      <option value="12" >Ultra Rarity</option>
                                      <option value="13" >Hiper Rarity</option>
                                      <option value="14" >Mega Rarity</option>
                                      <option value="15" >LQS Rarity</option>
                                      <option value="16" >Normal Rarity</option>
                                      <option value="17" >1% Rarity</option>
                                      <option value="18" >Event Rarity</option>
                                  <?php
                                    } else {
                                   ?>
                                   <option value="0" >Bad Rarity</option>
                                     <option value="1" >Unknown Rarity</option>
                                     <option value="2" >Common Rarity</option>
                                     <option value="3" >Rare Rarity</option>
                                     <option value="4" >Epic Rarity</option>
                                     <option value="5" >Legendary Rarity</option>
                                      <option value="6" >Mythical Rarity</option>
                                      <option value="7" >Unique Rarity</option>
                                      <option value="8" >Super Rarity</option>
                                      <option value="9" >Artifact Rarity</option>
                                      <option value="10" >Special Rarity</option>
                                      <option value="11" >Matinar Rarity</option>
                                      <option value="12" >Ultra Rarity</option>
                                      <option value="13" >Hiper Rarity</option>
                                      <option value="14" >Mega Rarity</option>
                                      <option value="15" >LQS Rarity</option>
                                      <option value="16" >Normal Rarity</option>
                                      <option value="17" >1% Rarity</option>
                                      <option value="18" >Event Rarity</option>
                                      <?php
                                    } 
                                   ?>
                            </select>
            </td>
          </tr>

          <tr>
            <td class="pt-3">
              <font>Temporal Item: </font>
              <select name="ed_temp" class="form-control mb-3 mb-3 bg-dark">
                <?php if($edit_temp > 0){ ?>
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
            <td><font>Item Price</font><input type="text" name="ed_preco" class="datepicker-trigger form-control hasDatepicker" value="<?php echo $edit_cost; ?>" maxlength="50"></td>

            <td class="pl-3"><font>Item Level</font><input type="text" name="ed_level" class="datepicker-trigger form-control hasDatepicker" value="<?php echo $edit_level; ?>" maxlength="50"></td>
          </tr>

          <tr>
            <td class="pt-3"><font>Stock</font><input type="text" name="ed_estoque" class="datepicker-trigger form-control hasDatepicker" value="<?php echo $edit_estoque; ?>" maxlength="50"></td>

            <td class="pt-3 pl-3"><font>Bag Stock</font><input type="text" name="ed_stk" class="datepicker-trigger form-control hasDatepicker" value="<?php echo $edit_stk; ?>" maxlength="50"></td>
          </tr>

          <tr>
            <td class="pt-3"><font>Req. Items</font><input type="text" name="ed_reqitems" class="datepicker-trigger form-control hasDatepicker" value="<?php echo $edit_reqitems; ?>" maxlength="50"></td>

            <td class="pt-3 pl-3"><font>Req. Quests</font><input type="text" name="ed_ReqQuest" class="datepicker-trigger form-control hasDatepicker" value="<?php echo $edit_reqquest; ?>" maxlength="50"></td>
          </tr>
              
              
          <tr id="upload">
            <td class="pt-3"><div class="block bg-dark"><a href="#" onclick="window.open('upload-items.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');" class="text-info">Send .swf</a></div> </td>
          </tr>
              <tr>
                <td><font>SWF File:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_file" value="<?php echo $edit_file; ?>"></td>
              </tr>
              <tr>
                <td class="pt-3"><font>Item Linkague:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_link" value="<?php echo $edit_link; ?>"></td>
              </tr>
              <tr>
                <td><font>Item Description:</font>
                  <textarea name="ed_desc" class="elastic form-control required"><?php echo $edit_desc; ?></textarea></td>
              </tr>
              
           
            

              <tr><td><input type="hidden" name="ed_id" value="<?php echo $edit_id; ?>"><input type="submit" name="edd" value="Update" class="btn btn-info btn-lg"></td></tr>
            </table>
          </form>
      <?php
        }else{
          echo "<b>Item not FOUND!</b>";
        }
      ?>
    
    <?php } ?>

    </div>
  </div>
</tr>
</table>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

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