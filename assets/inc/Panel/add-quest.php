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
                <li><a href="maps.php"> <i class="icon-grid"></i>Maps</a></li>
                <li class="active"><a href="quests.php"> <i class="icon-grid text-info"></i>Quests</a></li>
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
        <h6 class="heading-hr"><i class="icon-file"></i> Insert new quest</h6>
                </ul>
          </div>
        <?php
          if(isset($_POST['add'])){
            $id = addslashes($_POST['id']);
            $nome = addslashes($_POST['add-term']);
            $iLvl = addslashes($_POST['iLvl']);
            $iGold = addslashes($_POST['iGold']);
            $turnin = addslashes($_POST['turnin']);
            $sEndText = addslashes($_POST['sEndText']);
            $bUpg = addslashes($_POST['bUpg']);
            $iExp = addslashes($_POST['iExp']);
            $sDifficult = addslashes($_POST['sDifficult']);
            $rewType = addslashes($_POST['rewType']);
            $oRewards = addslashes($_POST['oRewards']);
            $sDesc = addslashes($_POST['sDesc']);


            
            $busca_it_add = $db->prepare("SELECT sName FROM meh_quests WHERE id='$id'");
            $busca_it_add->execute();
            $conta_it_add = count($busca_it_add->fetchAll( PDO::FETCH_BOTH ) );
            
            if(empty($id) || empty($nome) || empty($sDesc) || empty($sEndText)){
              echo "<b>Fill out all fields!</b>";
              }else if($conta_it_add > 0){
              echo "<b>ID in use!</b>";
            }else{
               $insert_item_db = $db->prepare("INSERT INTO meh_quests (`id`, `sName`, `iLvl`, `factionID`, `iWar`, `iClass`, `iReqRep`, `iValue`, `iSlot`, `iGold`, `iCoins`, `iRep`, `turnin`, `sEndText`, `bUpg`, `iReqCP`, `iExp`, `sAuthor`, `sDifficult`, `rewType`, `oRewards`, `bOnce`, `sDesc`, `cValue`, `cSlot`, `iCP`, `iIndex`, `sField`, `IsOnce`, `sFaction`, `iBadgerID`, `iDiamante`) VALUES ('$id', '$nome', '$iLvl', '1', '0', '0', '0', '0', '-1', '$iGold', '0', '0', '$turnin', '$sEndText', '$bUpg', '0', '$iExp', '$useron', '$sDifficult', '$rewType', '$oRewards', '0', '$sDesc', '0', '0', '0', '0', '', '0', '1', '-1', '0')");
               $insert_item_db->execute();
              if($insert_item_db){
                
$ip = $_SERVER['REMOTE_ADDR'];  
$insert_item_admin_db = $db->prepare("INSERT INTO meh_admin_logs (`id`,`Staff`, `Info`, `Date`, `IP`) VALUES (NULL,'$useron', 'Added the quest: $nome', NOW( ), '$ip')");
                  $insert_item_admin_db->execute();
                
                  echo "<b>Sucess! Quest id: $id - Redirect in 5 seconds...</b><script type='text/javascript' language='JavaScript'>
setTimeout(function () { location.href = 'quests.php';
}, 5000);
</script>";              }else{

              echo "<b style='color: red;'>MYSQL ERROR!</b>";
              }
            }
            echo "<br /><br />";
          }
        ?>
      </div>
      <form action="" method="POST">
        <table>
          <tr>
            <td class="pt-3"><font>ID:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" value="<?php if(isset($_POST['id'])){ echo $_POST['id']; }else{ echo 0; } ?>" name="id"></td>

            <td class="pt-3 pl-3"><font>Quest Name:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="add-term" value="<?php echo $_POST['add-term']; ?>"></td>

            <td class="pt-3 pl-3">
              <font>Quest Difficult:</font>
              <select name="sDifficult" class="form-control bg-dark">
                <?php if(isset($_POST['sDifficult']) && $_POST['sDifficult'] > 0){ ?>
                  <option value="Very Easy">Very Easy</option>
                  <option value="Easy">Easy</option>
                  <option value="Normal">Normal</option>
                  <option value="Hard">Hard</option>
                  <option value="Very Hard">Very Hard</option>
                  <option value="Impossible">Impossible</option>
                <?php }else{ ?>
                  <option value="Impossible">Impossible</option>
                  <option value="Very Hard">Very Hard</option>
                  <option value="Hard">Hard</option>
                  <option value="Normal">Normal</option>
                  <option value="Easy">Easy</option>
                  <option value="Very Easy">Very Easy</option>
                <?php } ?>
              </select>
            </td>
          </tr>

          <tr>

            <td class="pt-3">
              <font>Quest Level:</font>
              <select name="iLvl" class="form-control bg-dark">
                <?php if(isset($_POST['iLvl']) && $_POST['iLvl'] > 0){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3">Level: 3</option>
                  <option value="4">Level: 4</option>
                  <option value="5">Level: 5</option>
                  <option value="6">Level: 6</option>
                  <option value="7">Level: 7</option>
                  <option value="8">Level: 8</option>
                  <option value="9">Level: 9</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php }else{ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3">Level: 3</option>
                  <option value="4">Level: 4</option>
                  <option value="5">Level: 5</option>
                  <option value="6">Level: 6</option>
                  <option value="7">Level: 7</option>
                  <option value="8">Level: 8</option>
                  <option value="9">Level: 9</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>
              </select>
            </td>

            <td class="pt-3 pl-3"><font>Quest Gold Reward:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="iGold"></td>

            <td class="pt-3 pl-3"><font>Quest Exp Reward:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="iExp"></td>

            <td class="pt-3 pl-3">
              <font>Quest Is Vip Only:</font>
              <select name="bUpg" class="form-control bg-dark">
                <?php if(isset($_POST['bUpg']) && $_POST['bUpg'] > 0){ ?>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                <?php }else{ ?>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                <?php } ?>
              </select>
            </td>
            
          </tr>


          <td class="pt-3">
              <font>Quest Reward Type:</font>
              <select name="rewType" class="form-control bg-dark">
                <?php if(isset($_POST['rewType']) && $_POST['rewType'] > 0){ ?>
                  <option value="C">Choose Reward</option>
                  <option value="R">Random Reward</option>
                  <option value="S">Normal Reward</option>
                <?php }else{ ?>
                  <option value="S">Normal Reward</option>
                  <option value="R">Random Reward</option>
                  <option value="C">Choose Reward</option>
                <?php } ?>
              </select>
            </td>

             <td class="pt-3 pl-3"><font>Quest Turnin Req Item:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="turnin"></td>

             <td class="pt-3 pl-3"><font>Completing quest reward:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="oRewards"></td>

          <tr>

            <tr>
              <td class="pt-3"><font>Quest Description:</font><textarea name="sDesc" class="elastic form-control required"></textarea></td>

              <td class="pt-3 pl-3"><font>Quest Text End:</font><textarea name="sEndText" class="elastic form-control required"></textarea></td>
            </tr>

                                            
          <tr><td><input type="submit" name="add" value="Insert quest" class="btn btn-info btn-lg mt-5"></td></tr>
        </table>
      </form>
    <?php }else{ ?>
            <div class="block">
      <div class="block full">
        <div class="block-title">
        <h6 class="heading-hr"><i class="icon-file"></i> Edit quest</h6>
        <?php

          if(isset($_POST['edd'])){
            $ed_id = addslashes($_POST['ed_id']);
            $ed_name = addslashes($_POST['ed_name']);
            $ed_iLvl = addslashes($_POST['ed_iLvl']);
            $ed_iGold = addslashes($_POST['ed_iGold']);
            $ed_turnin = addslashes($_POST['ed_turnin']);
            $ed_sEndText = addslashes($_POST['ed_sEndText']);
            $ed_bUpg = addslashes($_POST['ed_bUpg']);
            $ed_iExp = addslashes($_POST['ed_iExp']);
            $ed_sDifficult = addslashes($_POST['ed_sDifficult']);
            $ed_rewtype = addslashes($_POST['ed_rewtype']);
            $ed_oRewards = addslashes($_POST['ed_oRewards']);
            $ed_sDesc = addslashes($_POST['ed_sDesc']);


            if(empty($ed_name)){
              echo "<b>Fill out all fields!</b>";
            }else{

              $insert_db = $db->prepare("UPDATE meh_quests SET sName='$ed_name', iLvl='$ed_iLvl', factionID='1', iWar='0', iClass='0', iReqRep='0', iValue='0', iSlot='-1', iCoins='0', iRep='0', turnin='$ed_turnin', sEndText='$ed_sEndText', bUpg='$ed_bUpg', iReqCP='0', iExp='$ed_iExp', sAuthor='$useron', sDifficult='$ed_sDifficult', rewType='$ed_rewtype', oRewards='$ed_oRewards', bOnce='0', sDesc='$ed_sDesc', cValue='0', cSlot='0', iCP='0', iIndex='0', sField='', IsOnce='0', sFaction='1', iBadgerID='0', iDiamante='0', iGold='$ed_iGold' WHERE id='$ed_id'");
                $insert_db->execute();

              if($insert_db){
                
$ip = $_SERVER['REMOTE_ADDR'];  
$insert_db_admin = $db->prepare("INSERT INTO meh_admin_logs (`id`,`Staff`, `Info`, `Date`, `IP`) VALUES (NULL,'$useron', 'Edit the quest: $ed_name', NOW( ), '$ip')");        
$insert_db_admin->execute();        
                  echo "<b>Sucess! - Redirect in 5 seconds...</b><script type='text/javascript' language='JavaScript'>
setTimeout(function () { location.href = 'quests.php';
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
          $busca_edit = $db->prepare("SELECT * FROM meh_quests WHERE id=$edit");
          $busca_edit ->execute();
          $conta_edit = count($busca_edit->fetchAll( PDO::FETCH_BOTH ) );
          if($conta_edit > 0){
            $busca_edit = $db->prepare("SELECT * FROM meh_quests WHERE id=$edit");
            $busca_edit ->execute();
            $resultado = $busca_edit->fetchAll();
            foreach ($resultado as $fetch_edit) {
            $edit_id = $fetch_edit['id'];
            $edit_name = $fetch_edit['sName'];
            $edit_iLvl = $fetch_edit['iLvl'];
            $edit_iValue = $fetch_edit['iValue'];
            $edit_iSlot = $fetch_edit['iSlot'];
            $edit_iGold = $fetch_edit['iGold'];
            $edit_turnin = $fetch_edit['turnin'];
            $edit_sEndText = $fetch_edit['sEndText'];
            $edit_bUpg = $fetch_edit['bUpg'];
            $edit_iExp = $fetch_edit['iExp'];
            $edit_sAuthor = $fetch_edit['sAuthor'];
            $edit_sDifficult = $fetch_edit['sDifficult'];
            $edit_rewType = $fetch_edit['rewType'];
            $edit_oRewards = $fetch_edit['oRewards'];
            $edit_sDesc = $fetch_edit['sDesc'];

             }

        ?>
          <form action="" method="POST">
            <table>
              <tr>
               <td class="pt-3"><font>ID:</font><input class="datepicker-trigger form-control hasDatepicker" type="text" readonly value="<?php echo $edit_id; ?>"></td>

                <td class="pt-3 pl-3"><font>Quest Name:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_name" value="<?php echo $edit_name; ?>"></td>

              <td class="pt-3 pl-3">
              <font>Quest Difficult: </font>
              <select name="ed_sDifficult" class="form-control bg-dark">
                <?php if($edit_sDifficult > 0){ ?>
                  <option value="Very Easy">Very Easy</option>
                  <option value="Easy">Easy</option>
                  <option value="Normal">Normal</option>
                  <option value="Hard">Hard</option>
                  <option value="Very Hard">Very Hard</option>
                  <option value="Impossible">Impossible</option>
                <?php }else{ ?>
                  <option value="Very Easy">Very Easy</option>
                  <option value="Easy">Easy</option>
                  <option value="Normal">Normal</option>
                  <option value="Hard">Hard</option>
                  <option value="Very Hard">Very Hard</option>
                  <option value="Impossible">Impossible</option>
                <?php } ?>
              </select>
            </td>
              </tr>

              <tr>
                
                <td class="pt-3">
              <font>Quest Level: </font>
              <select name="ed_iLvl" class="form-control bg-dark">
                <?php if($edit_iLvl == 1){ ?>
                  <option value="1" selected>Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3">Level: 3</option>
                  <option value="4">Level: 4</option>
                  <option value="5">Level: 5</option>
                  <option value="6">Level: 6</option>
                  <option value="7">Level: 7</option>
                  <option value="8">Level: 8</option>
                  <option value="9">Level: 9</option>
                  <option value="10">Level: 10</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 2){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2" selected>Level: 2</option>
                  <option value="3">Level: 3</option>
                  <option value="4">Level: 4</option>
                  <option value="5">Level: 5</option>
                  <option value="6">Level: 6</option>
                  <option value="7">Level: 7</option>
                  <option value="8">Level: 8</option>
                  <option value="9">Level: 9</option>
                  <option value="10">Level: 10</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 3){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" selected>Level: 3</option>
                  <option value="4">Level: 4</option>
                  <option value="5">Level: 5</option>
                  <option value="6">Level: 6</option>
                  <option value="7">Level: 7</option>
                  <option value="8">Level: 8</option>
                  <option value="9">Level: 9</option>
                  <option value="10">Level: 10</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 4){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" selected>Level: 4</option>
                  <option value="5">Level: 5</option>
                  <option value="6">Level: 6</option>
                  <option value="7">Level: 7</option>
                  <option value="8">Level: 8</option>
                  <option value="9">Level: 9</option>
                  <option value="10">Level: 10</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 5){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" selected>Level: 5</option>
                  <option value="6">Level: 6</option>
                  <option value="7">Level: 7</option>
                  <option value="8">Level: 8</option>
                  <option value="9">Level: 9</option>
                  <option value="10">Level: 10</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 6){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" selected>Level: 6</option>
                  <option value="7">Level: 7</option>
                  <option value="8">Level: 8</option>
                  <option value="9">Level: 9</option>
                  <option value="10">Level: 10</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 7){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" selected>Level: 7</option>
                  <option value="8">Level: 8</option>
                  <option value="9">Level: 9</option>
                  <option value="10">Level: 10</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 8){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" selected>Level: 8</option>
                  <option value="9">Level: 9</option>
                  <option value="10">Level: 10</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 9){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" selected>Level: 9</option>
                  <option value="10">Level: 10</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 10){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" selected>Level: 10</option>
                  <option value="11">Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 11){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" selected>Level: 11</option>
                  <option value="12">Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 12){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" selected>Level: 12</option>
                  <option value="13">Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 13){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" selected>Level: 13</option>
                  <option value="14">Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 14){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" selected>Level: 14</option>
                  <option value="15">Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>
                
                <?php if($edit_iLvl == 15){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" selected>Level: 15</option>
                  <option value="16">Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 16){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" selected>Level: 16</option>
                  <option value="17">Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 17){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" selected>Level: 17</option>
                  <option value="18">Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 18){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" selected>Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 18){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" selected>Level: 18</option>
                  <option value="19">Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>
                  
                <?php if($edit_iLvl == 19){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" selected>Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 19){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" selected>Level: 19</option>
                  <option value="20">Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>

                <?php } ?>

                <?php if($edit_iLvl == 20){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" selected>Level: 20</option>
                  <option value="21">Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>
                  
                  <?php if($edit_iLvl == 21){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" selected>Level: 21</option>
                  <option value="22">Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 22){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" selected>Level: 22</option>
                  <option value="23">Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 23){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" selected>Level: 23</option>
                  <option value="24">Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 24){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" selected>Level: 24</option>
                  <option value="25">Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 25){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" selected>Level: 25</option>
                  <option value="26">Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 26){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" selected>Level: 26</option>
                  <option value="27">Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 27){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" selected>Level: 27</option>
                  <option value="28">Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 28){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" selected>Level: 28</option>
                  <option value="29">Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 29){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" selected>Level: 29</option>
                  <option value="30">Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 30){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" selected>Level: 30</option>
                  <option value="31">Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 31){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" selected>Level: 31</option>
                  <option value="32">Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 32){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" selected>Level: 32</option>
                  <option value="33">Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 33){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" selected>Level: 33</option>
                  <option value="34">Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 34){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" selected>Level: 34</option>
                  <option value="35">Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 35){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" selected>Level: 35</option>
                  <option value="36">Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 36){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" selected>Level: 36</option>
                  <option value="37">Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 37){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" selected>Level: 37</option>
                  <option value="38">Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 38){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" selected>Level: 38</option>
                  <option value="39">Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 39){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" selected>Level: 39</option>
                  <option value="40">Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 40){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" selected>Level: 40</option>
                  <option value="41">Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 41){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" selected>Level: 41</option>
                  <option value="42">Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 42){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" selected>Level: 42</option>
                  <option value="43">Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 43){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" selected>Level: 43</option>
                  <option value="44">Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 44){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" selected>Level: 44</option>
                  <option value="45">Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 45){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" selected>Level: 45</option>
                  <option value="46">Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 46){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" selected>Level: 46</option>
                  <option value="47">Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 47){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" selected>Level: 47</option>
                  <option value="48">Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 48){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" selected>Level: 48</option>
                  <option value="49">Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 49){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" selected>Level: 49</option>
                  <option value="50">Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 50){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" selected>Level: 50</option>
                  <option value="51">Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 51){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" selected>Level: 51</option>
                  <option value="52">Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 52){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" selected>Level: 52</option>
                  <option value="53">Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 53){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" selected>Level: 53</option>
                  <option value="54">Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 54){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" selected>Level: 54</option>
                  <option value="55">Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 55){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" >Level: 54</option>
                  <option value="55" selected>Level: 55</option>
                  <option value="56">Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 56){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" >Level: 54</option>
                  <option value="55" >Level: 55</option>
                  <option value="56" selected>Level: 56</option>
                  <option value="57">Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 57){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" >Level: 54</option>
                  <option value="55" >Level: 55</option>
                  <option value="56" >Level: 56</option>
                  <option value="57" selected>Level: 57</option>
                  <option value="58">Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 58){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" >Level: 54</option>
                  <option value="55" >Level: 55</option>
                  <option value="56" >Level: 56</option>
                  <option value="57" >Level: 57</option>
                  <option value="58" selected>Level: 58</option>
                  <option value="59">Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 59){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" >Level: 54</option>
                  <option value="55" >Level: 55</option>
                  <option value="56" >Level: 56</option>
                  <option value="57" >Level: 57</option>
                  <option value="58" >Level: 58</option>
                  <option value="59" selected>Level: 59</option>
                  <option value="60">Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 60){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" >Level: 54</option>
                  <option value="55" >Level: 55</option>
                  <option value="56" >Level: 56</option>
                  <option value="57" >Level: 57</option>
                  <option value="58" >Level: 58</option>
                  <option value="59" >Level: 59</option>
                  <option value="60" selected>Level: 60</option>
                  <option value="61">Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 61){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" >Level: 54</option>
                  <option value="55" >Level: 55</option>
                  <option value="56" >Level: 56</option>
                  <option value="57" >Level: 57</option>
                  <option value="58" >Level: 58</option>
                  <option value="59" >Level: 59</option>
                  <option value="60" >Level: 60</option>
                  <option value="61" selected>Level: 61</option>
                  <option value="62">Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 62){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" >Level: 54</option>
                  <option value="55" >Level: 55</option>
                  <option value="56" >Level: 56</option>
                  <option value="57" >Level: 57</option>
                  <option value="58" >Level: 58</option>
                  <option value="59" >Level: 59</option>
                  <option value="60" >Level: 60</option>
                  <option value="61" >Level: 61</option>
                  <option value="62" selected>Level: 62</option>
                  <option value="63">Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 63){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" >Level: 54</option>
                  <option value="55" >Level: 55</option>
                  <option value="56" >Level: 56</option>
                  <option value="57" >Level: 57</option>
                  <option value="58" >Level: 58</option>
                  <option value="59" >Level: 59</option>
                  <option value="60" >Level: 60</option>
                  <option value="61" >Level: 61</option>
                  <option value="62" >Level: 62</option>
                  <option value="63" selected>Level: 63</option>
                  <option value="64">Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 64){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" >Level: 54</option>
                  <option value="55" >Level: 55</option>
                  <option value="56" >Level: 56</option>
                  <option value="57" >Level: 57</option>
                  <option value="58" >Level: 58</option>
                  <option value="59" >Level: 59</option>
                  <option value="60" >Level: 60</option>
                  <option value="61" >Level: 61</option>
                  <option value="62" >Level: 62</option>
                  <option value="63" >Level: 63</option>
                  <option value="64" selected>Level: 64</option>
                  <option value="65">Level: 65</option>
                <?php } ?>

                <?php if($edit_iLvl == 65){ ?>
                  <option value="1">Level: 1</option>
                  <option value="2">Level: 2</option>
                  <option value="3" >Level: 3</option>
                  <option value="4" >Level: 4</option>
                  <option value="5" >Level: 5</option>
                  <option value="6" >Level: 6</option>
                  <option value="7" >Level: 7</option>
                  <option value="8" >Level: 8</option>
                  <option value="9" >Level: 9</option>
                  <option value="10" >Level: 10</option>
                  <option value="11" >Level: 11</option>
                  <option value="12" >Level: 12</option>
                  <option value="13" >Level: 13</option>
                  <option value="14" >Level: 14</option>
                  <option value="15" >Level: 15</option>
                  <option value="16" >Level: 16</option>
                  <option value="17" >Level: 17</option>
                  <option value="18" >Level: 18</option>
                  <option value="19" >Level: 19</option>
                  <option value="20" >Level: 20</option>
                  <option value="21" >Level: 21</option>
                  <option value="22" >Level: 22</option>
                  <option value="23" >Level: 23</option>
                  <option value="24" >Level: 24</option>
                  <option value="25" >Level: 25</option>
                  <option value="26" >Level: 26</option>
                  <option value="27" >Level: 27</option>
                  <option value="28" >Level: 28</option>
                  <option value="29" >Level: 29</option>
                  <option value="30" >Level: 30</option>
                  <option value="31" >Level: 31</option>
                  <option value="32" >Level: 32</option>
                  <option value="33" >Level: 33</option>
                  <option value="34" >Level: 34</option>
                  <option value="35" >Level: 35</option>
                  <option value="36" >Level: 36</option>
                  <option value="37" >Level: 37</option>
                  <option value="38" >Level: 38</option>
                  <option value="39" >Level: 39</option>
                  <option value="40" >Level: 40</option>
                  <option value="41" >Level: 41</option>
                  <option value="42" >Level: 42</option>
                  <option value="43" >Level: 43</option>
                  <option value="44" >Level: 44</option>
                  <option value="45" >Level: 45</option>
                  <option value="46" >Level: 46</option>
                  <option value="47" >Level: 47</option>
                  <option value="48" >Level: 48</option>
                  <option value="49" >Level: 49</option>
                  <option value="50" >Level: 50</option>
                  <option value="51" >Level: 51</option>
                  <option value="52" >Level: 52</option>
                  <option value="53" >Level: 53</option>
                  <option value="54" >Level: 54</option>
                  <option value="55" >Level: 55</option>
                  <option value="56" >Level: 56</option>
                  <option value="57" >Level: 57</option>
                  <option value="58" >Level: 58</option>
                  <option value="59" >Level: 59</option>
                  <option value="60" >Level: 60</option>
                  <option value="61" >Level: 61</option>
                  <option value="62" >Level: 62</option>
                  <option value="63" >Level: 63</option>
                  <option value="64" >Level: 64</option>
                  <option value="65" selected>Level: 65</option>
                <?php } ?>
              </select>

              <td class="pt-3 pl-3"><font>Quest Gold Reward:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_iGold" value="<?php echo $edit_iGold; ?>"></td>

              <td class="pt-3 pl-3"><font>Quest Exp Reward:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_iExp" value="<?php echo $edit_iExp; ?>"></td>

              <td class="pt-3 pl-3">
              <font>Quest Is Vip Only: </font>
              <select name="ed_bUpg" class="form-control bg-dark">
                <?php if($edit_bUpg == 0){ ?>
                  <option value="1">Yes</option>
                  <option value="0" selected>No</option>
                <?php }else{ ?>
                  <option value="1" selected>Yes</option>
                  <option value="0">No</option>
                <?php } ?>
              </select>
            </td>
              </tr>

              <tr>

              	<td class="pt-3"><font>Quest Reward Type:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_rewtype" value="<?php echo $edit_rewType; ?>"></td>
              	
              	<td class="pt-3 pl-3"><font>Quest Turnin Req Item:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_turnin" value="<?php echo $edit_turnin; ?>"></td>

              	<td class="pt-3 pl-3"><font>Completing quest reward:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_oRewards" value="<?php echo $edit_oRewards; ?>"></td>

              </tr>

              <tr>
              	
              	<td class="pt-3"><font>Quest Description:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_sDesc" value="<?php echo $edit_sDesc; ?>"></td>

              	<td class="pt-3 pl-3"><font>Quest Text End:</font><input type="text" class="datepicker-trigger form-control hasDatepicker" name="ed_sEndText" value="<?php echo $edit_sEndText; ?>"></td>

              </tr>

               
              

              <tr><td><input type="hidden" name="ed_id" value="<?php echo $edit_id; ?>"><input class="btn btn-info btn-lg mt-5" type="submit" name="edd" value="Update Quest"></td></tr>
            </table>
          </form>
      <?php
        }else{
              echo "<div class='alert alert-danger fade in block-inner'>
                    <button type='button' class='close' data-dismiss='alert'>×</button>
                    <i class='icon-cancel-circle'></i> Shop not found!
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