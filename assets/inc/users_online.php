<?php
$db = getDB();
$MYSQL_SELECT = $db->prepare("SELECT * FROM meh_servers LIMIT 1");
$MYSQL_SELECT->execute();
foreach ($MYSQL_SELECT as $SERVER) {
if ($SERVER['Count'] <= 0) { 
echo "{$SERVER['Count']}";
} else {
echo "{$SERVER['Count']}";
}
}

?>