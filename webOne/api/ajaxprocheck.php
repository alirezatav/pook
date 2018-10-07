<?php
$NOW = date("Y-m-d h:i:s"); ;


define('DB_DATABASE', 'webone');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
mysqli_set_charset($mysqli,"utf8");




$sql = "SELECT start_date ,duration
FROM 
wp_ab_appointments 
left JOIN wp_ab_services
on wp_ab_appointments.service_id=wp_ab_services.id
WHERE staff_id ='$_POST[staff_id]' AND service_id ='$_POST[service_id]' "; 



$result = $mysqli->query($sql);


$json = [];
while($row = $result->fetch_assoc()){
$json []=$row;
}


echo json_encode($json);
?>

