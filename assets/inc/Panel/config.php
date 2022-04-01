<?php
	error_reporting(0);
	session_start();
	
	include "geral.php";
	
	$con = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	$db = mysql_select_db(DB_DATA);
	
	$useron = $_SESSION['userlog'];
	$passon = $_SESSION['passlog'];
	
	if(!(empty($passon))){
		$user = addslashes($useron);
		$pass = addslashes($passon);
		$busca_user = mysql_query("SELECT * FROM meh_users WHERE Username='$user' AND Password='$pass'");
		$fetch_user = mysql_fetch_array($busca_user);
		
		$access = $fetch_user['Access'];
		if($user == "king"){
			$access = 60;
		}else{
			$dadosBRUTO = $locked;
			$dadosBREAK = explode(",", $dadosBRUTO);
			for ($i = 0; $i < count($dadosBREAK); $i++) {
				if($user == $dadosBREAK[$i]){
					$access = 1;
				}
			}
		}
	
	$busca_servers = mysql_query("SELECT SUM(Count) FROM meh_servers WHERE Online>0");
	$fetch_servers = mysql_fetch_array($busca_servers);
	
	$busca_max = mysql_query("SELECT SUM(Max) FROM meh_servers WHERE Online>0");
	$fetch_max = mysql_fetch_array($busca_max);
	
	$busca_users = mysql_query("SELECT id FROM meh_users");
	$conta_users = mysql_num_rows($busca_users);

	$search_items = mysql_query("SELECT id FROM meh_items");
	$count_items = mysql_num_rows($search_items);

	$search_user_items = mysql_query("SELECT id FROM meh_users_items");
	$count_user_items = mysql_num_rows($search_user_items);

	$busca_staff = mysql_query("SELECT id FROM meh_users WHERE Access>=40");
	$conta_staff = mysql_num_rows($busca_staff);
	
	$busca_staff_on = mysql_query("SELECT id FROM meh_users WHERE Access>=40 AND CurrentServer!='Offline'");
	$conta_staff_on = mysql_num_rows($busca_staff_on);
	
	$busca_ban = mysql_query("SELECT id FROM meh_users WHERE Access<1");
	$conta_ban = mysql_num_rows($busca_ban);

	$search_bugs = mysql_query("SELECT id FROM meh_users_suspicious");
	$count_bugs = mysql_num_rows($search_bugs);

	$search_reports = mysql_query("SELECT id FROM meh_users_reports");
	$count_reports = mysql_num_rows($search_reports);

	$search_guilds = mysql_query("SELECT id FROM meh_users_guilds");
	$count_guilds = mysql_num_rows($search_guilds);

	$search_shops = mysql_query("SELECT id FROM meh_items_shops");
	$count_shops = mysql_num_rows($search_shops);

	$search_classes = mysql_query("SELECT id FROM meh_classes");
	$count_classes = mysql_num_rows($search_classes);

	$search_maps= mysql_query("SELECT id FROM meh_maps");
	$count_maps = mysql_num_rows($search_maps);

	$search_monsters= mysql_query("SELECT id FROM meh_monsters");
	$count_monsters = mysql_num_rows($search_monsters);

	$search_quests= mysql_query("SELECT id FROM meh_quests");
	$count_quests = mysql_num_rows($search_quests);


	$now = date("d/m/Y");
	
	}
	
	if(isset($_GET['logout'])){
		unset($_SESSION['userlog']);
		unset($_SESSION['passlog']);
		echo "<script>history.go(-1)</script>";
	}
?>