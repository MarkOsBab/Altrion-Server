<?php
include 'assets/inc/conn.php';
include 'assets/inc/userClass.php';

$sql['host'] = 'localhost';
$sql['user'] = 'root';
$sql['pass'] = '';
$sql['name'] = 'altrion_v3';

$con = new mysqli($sql['host'], $sql['user'], $sql['pass'], $sql['name']);
if(isset($_POST['unm'])) {
	$username = $_POST['unm'];
	$password = $_POST['pwd'];
	$password = gen_token($_POST['pwd'], $username);
	$db = getDB();
	$success = false;
	$stmt = $db->prepare('SELECT id,UpgradeExpire,ActivationFlag,Age,Access,Email,UpgradeDays FROM meh_users WHERE Username="'.$username.'" AND Password="'.$password.'" LIMIT 1');
		$stmt->bindParam("id", $id,PDO::PARAM_STR);
		$stmt->bindParam("username", $username,PDO::PARAM_STR);
		$stmt->bindParam("password", $password,PDO::PARAM_STR);
		$stmt->bindParam("user_id", $user_id,PDO::PARAM_STR);
		$stmt->bindParam("UpgradeExpire", $UpgradeExpire,PDO::PARAM_STR);
		$stmt->bindParam("ActivationFlag", $ActivationFlag,PDO::PARAM_STR);
		$stmt->bindParam("Age", $Age,PDO::PARAM_STR);
		$stmt->bindParam("Access", $Access,PDO::PARAM_STR);
		$stmt->bindParam("Email", $Email,PDO::PARAM_STR);
		$stmt->bindParam("UpgradeDays", $UpgradeDays,PDO::PARAM_STR);
		$stmt->execute(); 

	$user_data = $db->prepare('SELECT * FROM meh_users WHERE  Username="'.$username.'" AND Password="'.$password.'" LIMIT 1');
	$user_data->execute();
	$resultado = $user_data->fetchAll();
	foreach ($resultado as $row) {
        $user_id = $row['id'];
        $user_access = $row['Access'];
        $user_upgradeexpire = $row['UpgradeExpire'];
        $user_activationflag = $row['ActivationFlag'];
        $user_age = $row['Age'];
        $user_email = $row['Email'];
        $user_upgradedays = $row['UpgradeDays'];
    }

		if($stmt->fetch()) {
			$success = true;
			$upg_date = preg_replace('/\s+/', 'T', $user_upgradeexpire); 
			$upg = ($user_upgradedays >= 0) ? 1 : 0;

			echo '<login bSuccess="1" userid="'.$user_id.'" iAccess="'.$user_access.'" iUpg="'.$upg.'" iAge="'.$user_age.'" sToken="'.$password.'" iUpgDays="'.$user_upgradedays.'" strEmail="'.$user_email.'" bCCOnly="0"  dUpgExp="'.$upg_date.'" strCountryCode="EN" unm="'.$username.'">';			
		} else {
			echo '<login bSuccess="0" sMsg="The username and password you entered did not match. Please check the spelling and try again."/>';
		}


	if($success) {
		/** List Servers **/
		$server_list = $con->query("SELECT * FROM meh_servers LIMIT 10");
		while ($server = $server_list->fetch_assoc()) {
			echo '<servers sName="'. $server['Name'] .'" sIP="'. $server['IP'] .'" iCount="'. $server['Count'] .'" iMax="'. $server['Max'] .'" bOnline="'. $server['Online'] .'" iChat="'. $server['Chat'] .'" bUpg="'. $server['Upgrade'] .'" sLang="it" iPort="5588"/>';
		}
		echo '</login>';
	}
	$con = null;
} else {
	echo '<login bSuccess="0" sMsg="Invalid Input"/>';
}

function gen_token($pass, $salt) {
        $salt = strtolower($salt);
        $str = hash("sha512", $pass.$salt);
        $len = strlen($salt);
        return strtoupper(substr($str, $len, 17));
}

?>