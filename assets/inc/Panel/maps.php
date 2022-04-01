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
               


            <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">

              <div class="col-lg-12">
                <div class="block">

    <div>
      <div class="full">
        <div class="block-title">
        <h6 class="heading-hr"><i class="icon-file"></i> Insert new Map</h6>
                </ul>
          </div>
        <form action="add-map.php" method="POST">
          <div class="input-group">
            <input type="text" id="search-term" name="add-term" class="form-control" placeholder="Item name">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search text-info"></i></button>
            </span>
          </div>
        </form>
      </div>
    </div>
    <div>
      <hr>

      <div class="full">
        <div class="block-title">
        <h6 class="heading-hr"><i class="icon-file"></i> Search Map</h6>
                </ul>
                </div>
        <form action="" method="post">
          <div class="input-group">
            <input type="text" id="search-term" name="search-term" class="form-control" placeholder="Item name">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search text-info"></i></button>
            </span>
          </div>
        </form>
      </div>
    </div>

<hr>
                <div class="title"><strong>Maps</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped table-hover">
                      <thead>

                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Players Max</th>
                          <th>Monsters</th>
                          <th>Edit</th>
                        </tr>

                      </thead>
                      <tbody>
                        <?php
      if(!(isset($_POST['search-term']))){
        $_BS['bypage'] = 30;

        $sql = "SELECT COUNT(*) AS total FROM `meh_maps`";
        $query = $db->prepare($sql);
        $query ->execute();
        $total = $query->rowCount($query, 0, 'total');

        $paginas =  (($total % $_BS['bypage']) > 0) ? (int)($total / $_BS['bypage']) + 1 : ($total / $_BS['bypage']);

        if (isset($_GET['page'])) {
          $pagina = (int)$_GET['page'];
        } else {
          $pagina = 1;
        }

        $pagina = max(min($paginas, $pagina), 1);
        $inicio = ($pagina - 1) * $_BS['bypage'];
        $sql = "SELECT * FROM `meh_maps` ORDER BY `id` DESC LIMIT ".$inicio.", ".$_BS['bypage'];
        $query = $db->prepare($sql);
        $query ->execute();
        $resultado = $query->fetchAll();

        foreach ($resultado as $row) {
          $id = $row['id'];
          $name = $row['Name'];
          $PlayersMax = $row['PlayersMax'];
          $monsters_info = $row['monsters_info'];
          
          echo "
            <tr>
              <td>$id</td>
              <td>$name</td>
              <td>$PlayersMax</td>";
              if($monsters_info >= 1){
                echo "<td>Yes</td>";
                }
              elseif ($monsters_info <= 0) {
                echo "<td>No</td>";
              }
              echo "
              
              <td>
              <a href='add-map.php?edit=$id'><i class='fa fa-pencil-square-o text-info'></i></a>
              </td>
            </tr>";
          
        }
        
        echo "</table>";

        if ($total > 0) {
          echo "<br /><br /><center>Other maps: ";
          for($n = 1; $n <= $paginas; $n++) {
            echo '<a href="?page='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
          }
          echo "</center>";
        }
      }else{
        $busca_prot = addslashes($_POST['search-term']);
        $busca_it = $db->prepare("SELECT * FROM meh_maps WHERE ((`Name` LIKE '%".$busca_prot."%') OR ('%".$busca_prot."%'))");
        $busca_it ->execute();
        $conta_it = count($busca_it->fetchAll( PDO::FETCH_BOTH ) );
        if($conta_it > 0){
            $busca_it = $db->prepare("SELECT * FROM meh_maps WHERE ((`Name` LIKE '%".$busca_prot."%') OR ('%".$busca_prot."%'))");
            $busca_it ->execute();
            $resultado = $busca_it->fetchAll();
            foreach ($resultado as $fetch_it) {
            $id = $fetch_it['id'];
            $name = $fetch_it['Name'];
            $PlayersMax = $fetch_it['PlayersMax'];
            $monsters_info = $fetch_it['monsters_info'];
             echo "
            <tr>
              <td>$id</td>
              <td>$name</td>
              <td>$PlayersMax</td>";
              if($monsters_info >= 1){
                echo "<td>Yes</td>";
                }
              elseif ($monsters_info <= 0) {
                echo "<td>No</td>";
              }
              echo "
              
              <td>
              <a href='add-map.php?edit=$id'><i class='fa fa-pencil-square-o text-info'></i></a>
              </td>
            </tr>";
          }
        }else{
          echo "
            <tr>
              <td>MAP</td>
              <td>NOT</td>
              <td>FOUND</td>
              <td>IN</td>
              <td>LIST</td>
            </tr>";
        }
        echo "</table>
        <center><a href='shops.php'><br /><br />All maps list</a></center>
        ";
      }
    ?>
                      </tbody>
                    </table>
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