<?php
class Handler extends ContentCMS {
    var $UserData, $CurrentDate, $Country;
    
    function Handler($param = false) {
        $this->ContentCMS($param);
    	$this->ResetSettings();
    }
    
    function ResetSettings() {
        if (strlen(session_id()) < 1) {
            session_start();
        }
        
        if (isset($_SESSION['udata'])) {
            $this->UserData = $_SESSION['udata'];
            $this->UserData['Login'] = true;
        } else {
            $this->UserData = array();
            $this->UserData['Login'] = false;
        }
        
        $this->UserData['Address'] = trim(isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
        $this->UserData['Location'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $this->CurrentDate = date("F j, Y, g:i a");

        $GeoIP = geoip_open(dirname(__FILE__).'/geoip/GeoIP.dat', GEOIP_STANDARD);
        $this->Country = geoip_country_code_by_addr($GeoIP, $this->UserData['Address']);
        geoip_close($GeoIP);
    }
    
    function DestroySessions() {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    }    

    function getUserOnline() {
        $MYSQL_QUERY = $this->DBase('Query', array( 0 => "SELECT SUM(Count) AS TotalUsers FROM meh_servers" ));
        $MYSQL_DATA = $MYSQL_QUERY->fetch_assoc();
        
        return $MYSQL_DATA['TotalUsers'];
    }

    function Validate($type, $params) {
        switch (strtoupper($type)) {
            case 'USERDATA':
                $sql = $this->DBase('Query', array( 0 => "SELECT * FROM `meh_users` WHERE password='{$this->UserData['Password']}'" ));
                if ($sql->num_rows > 0) {
                    $_SESSION['udata'] = $sql->fetch_assoc();
                    $this->ResetSettings();
                } else {
                    $this->DestroySessions();
                    $this->UserData = null;                        
                    return false;
                }
                
                return true;
                break;
            case 'USEREMAIL':
                return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $params[0]);
                break;
        }
    }


    function Initialize($type, $params = array()) {
        switch (strtoupper($type)) {
            case 'USERDATA':
                $this->UserData = $params[0];
                break;
            case 'USERTOKEN':
                $params[1] = strtolower($params[1]);
                $str = hash("sha512", $params[0] . $params[1]);
                $len = strlen($params[1]);

                return strtoupper(substr($str, $len, 17));
                break;
            case 'USERITEMS':
                $ii = (int) 0;
                $xx = (int) 0;
                $strItem = null;
                $yey = null;

                $result = $this->DBase('Query', array( 0 => "SELECT itemid FROM meh_users_items WHERE userid = {$params[0]} AND equipment IN ('co','ar','pe','he','ba','Weapon','hi','ho')" ));        
                while ($data = $result->fetch_assoc()) {
                    if ($ii == 0) {
                        $strItem .= $data['itemid'];
                        $ii++;
                    } else 
                        $strItem .= "," . $data['itemid'];
                }
                
                $result = $this->DBase('Query', array( 0 => "SELECT id, ES, Name, Upg, Coins, Type, File, Link FROM meh_items WHERE id IN ($strItem) ORDER BY Type DESC" ));
                while ($data = $result->fetch_assoc()) {
                    $subresult = $this->DBase('Query', array( 0 => "SELECT equipped, quantity FROM meh_users_items WHERE userid = {$params[0]} AND itemid = {$data['id']}" ));
                    $subdata = $subresult->fetch_assoc();

                    $yey[$xx]['id'] = $data['id'];
                    $yey[$xx]['es'] = $data['ES'];
                    $yey[$xx]['name'] = $data['Name'];
                    $yey[$xx]['points'] = $data['ES'] == "ar" ? $subdata['quantity'] : null;
                    $yey[$xx]['upgr'] = $data['Upg'];
                    $yey[$xx]['coin'] = $data['Coins'];
                    $yey[$xx]['file'] = $data['File'];
                    $yey[$xx]['link'] = $data['Link'];    
                    $yey[$xx]['type'] = strtolower($data['Type']);
                    $yey[$xx]['equipped'] = $subdata['equipped'] == 1 ? true : false;                    
                    $xx++;
                } return $yey;
                break;
            case 'USERRANK':
                for ($a = 1; $a < 10; $a++) {
                    $rankExp = (pow(($a + 1), 3) * 100);
                    if ($a > 1)
                        $arrRanks[$a]=($rankExp + $arrRanks[($a - 1)]);
                    else
                        $arrRanks[$a]=($rankExp + 100);            
                }
            
                for ($i = 1; $i < 10; $i++) {
                    if ($arrRanks[$i] >= $params[0]) {
                        return $i;
                    }
                }
				
				return 10;
                break;
            case 'USERLEVEL':
                if ($params[0] < $params[1]) {
                    $maxLevelXP = $params[0] >= 100 ? 10000000 : 150000;
                    return round($params[0] * ($maxLevelXP / $params[1]));
                }
				
                return 200000000;
                break;
            case 'USERINVENTORY':
                $items = $params[0];
                
                $Object = new stdClass();
				$Object->Weapons = null;
				$Object->Armors = null;
				$Object->Houses = null;
				$Object->HouseItems = null;
				$Object->ClassPoints = 0;
				$Object->ClassRank = 1;

                $equipped = array();
                $equipped['helm'] = array();
                $equipped['pet'] = array();
                $equipped['cape'] = array();
                $equipped['armor'] = array();
                $equipped['class'] = array();
                $equipped['weapon'] = array();

                $equipped['cape']['name'] = null;
                $equipped['helm']['name'] = null;
                $equipped['pet']['name'] = null;
                $equipped['armor']['name'] = null;
                $equipped['class']['name'] = null;
                $equipped['weapon']['name'] = null;

                $equipped['cape']['type'] = null;
                $equipped['helm']['type'] = null;
                $equipped['pet']['type'] = null;
                $equipped['armor']['type'] = null;
                $equipped['class']['type'] = null;
                $equipped['weapon']['type'] = null;
				
                $equipped['class']['file'] = 'none';
                $equipped['class']['link'] = 'none';
                $equipped['weapon']['file'] = 'none';
                $equipped['weapon']['link'] = 'none';
                $equipped['helm']['file'] = 'none';
                $equipped['helm']['link'] = 'none';
                $equipped['pet']['file'] = 'none';
                $equipped['pet']['link'] = 'none';
                $equipped['cape']['file'] = 'none';
                $equipped['cape']['link'] = 'none';

                for ($ii = 0; $ii < count($items); $ii++) {                    
                    if ($items[$ii]['equipped'] == true) {
                        switch (strtolower($items[$ii]['es'])) {
                            case 'ar':
                                if (isset($equipped['class']['true'])) break;
                                $Object->ClassPoints = $items[$ii]['points'];
                                $Object->ClassRank = $this->Initialize('UserRank', array( 0 => $items[$ii]['points']));
                                $equipped['armor']['name'] = $items[$ii]['name'];
                                $equipped['class']['name'] = $items[$ii]['name'];
                                $equipped['class']['file'] = $items[$ii]['file'];
                                $equipped['class']['link'] = $items[$ii]['link'];
                                break;
                            case 'co':
                                $equipped['armor']['name'] = $items[$ii]['name'];
                                $equipped['class']['file'] = $items[$ii]['file'];
                                $equipped['class']['link'] = $items[$ii]['link'];
                                $equipped['class']['true'] = true;    
                                break;
                            case 'weapon':
                                $equipped['weapon']['name'] = $items[$ii]['name'];
                                $equipped['weapon']['file'] = $items[$ii]['file'];
                                $equipped['weapon']['link'] = $items[$ii]['link'];
                                $equipped['weapon']['type'] = $items[$ii]['type'];                                
                                break;
                            case 'ba':
                                $equipped['cape']['name'] = $items[$ii]['name'];
                                $equipped['cape']['file'] = $items[$ii]['file'];
                                $equipped['cape']['link'] = $items[$ii]['link'];                    
                                break;
                            case 'pe':
                                $equipped['pet']['name'] = $items[$ii]['name'];
                                $equipped['pet']['file'] = $items[$ii]['file'];
                                $equipped['pet']['link'] = $items[$ii]['link'];                    
                                break;
                            case 'he':
                                $equipped['helm']['name'] = $items[$ii]['name'];
                                $equipped['helm']['file'] = $items[$ii]['file'];
                                $equipped['helm']['link'] = $items[$ii]['link'];                    
                                break;
                        }
                    }            

                    if (strtolower($items[$ii]['type']) == "class")        
                        $Object->Armors .= "<li><a href='#' class='{$items[$ii]['type']}'>&nbsp;&nbsp;{$items[$ii]['name']}&nbsp;&nbsp;(Rank {$Object->ClassRank})</a></li>\n";
                    else if (strtolower($items[$ii]['type']) == "armor")        
                        $Object->Armors .= "<li><a href='#' class='{$items[$ii]['type']}'>&nbsp;&nbsp;{$items[$ii]['name']}</a></li>\n";
					else if (strtolower($items[$ii]['type']) == "house")   
                        $Object->Houses .= "<li><a href='#'><span class='bank icon'></span>&nbsp;&nbsp;{$items[$ii]['name']}</a></li>\n";
					else if (strtolower($items[$ii]['type']) == "wall item")   
                        $Object->HouseItems .= "<li><a href='#'><span class='display icon'></span>&nbsp;&nbsp;{$items[$ii]['name']}</a></li>\n";
					else if (strtolower($items[$ii]['type']) == "floor item")   
                        $Object->HouseItems .= "<li><a href='#'><span class='vases icon'></span>&nbsp;&nbsp;{$items[$ii]['name']}</a></li>\n";
                    else
                        $Object->Weapons .= "<li><a href='#' class='{$items[$ii]['type']}'>&nbsp;&nbsp;{$items[$ii]['name']}</a></li>\n";        
                }
 
                $Object->SwfData = "&strClassName={$equipped['class']['name']}&strClassFile={$equipped['class']['file']}&strClassLink={$equipped['class']['link']}&strArmorName={$equipped['armor']['name']}&strWeaponFile={$equipped['weapon']['file']}&strWeaponLink={$equipped['weapon']['link']}&strWeaponType={$equipped['weapon']['type']}&strWeaponName={$equipped['weapon']['name']}&strCapeFile={$equipped['cape']['file']}&strCapeLink={$equipped['cape']['link']}&strCapeName={$equipped['cape']['name']}&strHelmFile={$equipped['helm']['file']}&strHelmLink={$equipped['helm']['link']}&strHelmName={$equipped['helm']['name']}&strPetFile={$equipped['pet']['file']}&strPetLink={$equipped['pet']['link']}&strPetName={$equipped['pet']['name']}&bgindex=0";
                
                return $Object;
                break;
            case 'USERACHIEVEMENTS':
                $Achievements = null;
            
                $result[0] = $this->DBase('Query', array( 0 => "SELECT * FROM `meh_achievements` ORDER BY `id` ASC" ));                
                $result[1] = $this->DBase('Query', array( 0 => "SELECT `AchievementID` FROM `meh_users` WHERE Username='{$params[0]}'" ));              
                $data[1] = $result[1]->fetch_assoc();

                while ($data[0] = $result[0]->fetch_assoc()) {                
                    if (strpos($data[1]['AchievementID'], $data[0]['id']) !== false) {
                        $Achievements .= 
                            "<a href='#'><img width='98' height='89' src='images/badges/{$data[0]['Badge']}' /><span>
                            <strong>{$data[0]['Name']}</strong><br />{$data[0]['Description']}</span>
                            </a>";
                    }
                }

                return ($Achievements != null ?
                    "<span class='headerBlack'>Achievements</span>
                    <div class='achievements'>
                        {$Achievements}<br />
                    </div><br />" : null);
                break;
            default:
                return null;
                break;
        }
    }
    
    function HandleUser($type, $params = array()) {
        switch (strtoupper($type)) {
            case 'LOGIN':
                $token = isset($params[2]) ? $this->Initialize('UserToken', array( 0 => $params[2], 1 => $params[1] )) : $params[1];
                $sql = $this->DBase('Query', array( 0 => "SELECT * FROM `meh_users` WHERE password='{$token}'" ));
                if ($sql->num_rows > 0) {
                    $this->UserData = $_SESSION['udata'] = $sql->fetch_assoc();
                    $this->ResetSettings();
                    
                    if ($_SESSION['udata']['Access'] >= 40)
                         $this->HandleUser('Activity', array( 0 => "Successfuly logged in" ));
                    
                    return json_encode(array('output' => 'success'));
                } else {
                    $this->DestroySessions();
                    return json_encode(array('output' => 'failure'));
                }
                break;
            case 'ACTIVITY':                
                $this->DBase('Query',  array( 0 => 
                    "INSERT INTO  `meh_users_suspicious` (                     
                      `charname` ,
                      `reason` ,
                      `date` ,
                      `address`
                    ) VALUES (
                      '{$this->UserData['Username']}',  '{$params[0]}',  '" . date("Y-m-d H:i:s") . "',  '{$this->UserData['Address']}'
                    );" ));
                break;
        }
    }
}
?>