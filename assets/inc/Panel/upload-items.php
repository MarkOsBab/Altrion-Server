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
	   <link rel="shortcut icon" href="images/favicon.png">
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
				<p><center><img src="images/staff-only.png" alt=""> </br>only!</center></p>
				<p><a href="../"><center>&raquo Back to the game!</center></a></p>
			</div>
		</div>
	</body>
</html>
<?php } else { ?>
	<head>
		<title>KOTF - Upload</title>
		<link rel="stylesheet" href="template/css/style.css">
		<link rel='stylesheet' id='open-sans-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.0-alpha' type='text/css' media='all' />
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
		<script>
			function exibeMsg(valor){
				switch (valor){
					case 'Class':
						document.getElementById('upload').innerHTML = '<b>Male:</b> <input type="file" name="arquivo" /><br /><b>Female:</b> <input type="file" name="arquivo1" />';
					break;
					case 'Armor':
						document.getElementById('upload').innerHTML = '<b>Male:</b> <input type="file" name="arquivo" /><br /><b>Female:</b> <input type="file" name="arquivo1" />';
					break;
					default:
						document.getElementById('upload').innerHTML = '<b>Arquivo:</b> <input type="file" name="arquivo" />';
					break;
				}
			}
		</script>
	</head>
	<body class="block">

	<div class="block">
<center>
	<h2>File Upload</h2>
	
	<?php if(isset($_GET['tipo'])){ ?>
	
		Diret�rio Atual
		<br />
	
	<?php }else{ ?>
		<?php
			if(isset($_POST['manda'])){
				$continua = true;
				$tipo = $_POST['tipo'];
				switch($tipo){
					case "Sword":
						$destino_file = "items/swords/";
					break;
					case "Dagger":
						$destino_file = "items/daggers/";
					break;
					case "Staff":
						$destino_file = "items/staves/";
					break;
					case "Polearm":
						$destino_file = "items/polearms/";
					break;
					case "Axe":
						$destino_file = "items/axes/";
					break;
					case "Mace":
						$destino_file = "items/maces/";
					break;
					case "Armor":
						$destino_file = "classes/";
					break;
					case "Class":
						$destino_file = "classes/";
					break;
					case "Pet":
						$destino_file = "items/pets/";
					break;
					case "Helm":
						$destino_file = "items/helms/";
					break;
					case "Cape":
						$destino_file = "items/capes/";
					break;
					case "assets";
					    $destino_file = "interface/Assets/";
					break;
					default:
						$continua = false;
					break;
				}
				
				$_UP['pasta'] = '../../../gamefiles/' . $destino_file;
				if(($tipo == "Class") || ($tipo == "Armor")){
					$_UP['pasta'] = '../../../gamefiles/' . $destino_file . 'M/';
				}

				$_UP['tamanho'] = 1024 * 1024 * 10;
				$_UP['extensoes'] = array('swf');
				$_UP['renomeia'] = false;

				if ($_FILES['arquivo']['error'] != 0) {
					$continua = false;
				}
				
				if($continua){
					$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
					if (array_search($extensao, $_UP['extensoes']) === false) {
						$continua = false;
					}else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
						$continua = false;
					}else {
						if ($_UP['renomeia'] == true) {
							$nome_final = time().'.swf';
						} else {
							$nome_final = $_FILES['arquivo']['name'];
						}
						
						if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
							#Sucesso
						} else {
							$continua = false;
						}
					}
				}
				
				if($continua && ($tipo == "Class" || $tipo == "Armor")){
					$_UP['pasta'] = '../../../gamefiles/' . $destino_file . 'F/';

					$_UP['tamanho'] = 1024 * 1024 * 10;
					$_UP['extensoes'] = array('swf');
					$_UP['renomeia'] = false;

					if ($_FILES['arquivo1']['error'] != 0) {
						$continua = false;
					}
					
					if($continua){
						$extensao = strtolower(end(explode('.', $_FILES['arquivo1']['name'])));
						if (array_search($extensao, $_UP['extensoes']) === false) {
							$continua = false;
						}else if ($_UP['tamanho'] < $_FILES['arquivo1']['size']) {
							$continua = false;
						}else {
							if ($_UP['renomeia'] == true) {
								$nome_final = time().'.swf';
							} else {
								$nome_final = $_FILES['arquivo1']['name'];
							}
							
							if (move_uploaded_file($_FILES['arquivo1']['tmp_name'], $_UP['pasta'] . $nome_final)) {
								#Sucesso
							} else {
								$continua = false;
							}
						}
					}
				}
				
				if($continua){
					echo "<b style='color: green;'>Sucess, close the window!<br /></b>";
				}else{
					echo "<b style='color: red;'>ERROR!<br /></b>";
				}
			}
		?>

		<form method="post" action="" enctype="multipart/form-data">
			<label>Type: </label>

			<select name="tipo" onchange="exibeMsg(this.value);">
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
				<option value="assets">Assets</option>
			</select>
			<br /><br />
			<p id="upload">
				<b>File:</b> <input type="file" name="arquivo" />
			</p>
			<br />
			<input class="btn btn-info btn-lg" type="submit" name="manda" value="Enviar" />
			</form>
		</center>
	</div>
</body>
<?php } ?>
<?php } ?>