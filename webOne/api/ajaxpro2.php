<?php


define('DB_DATABASE', 'webone');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
mysqli_set_charset($mysqli,"utf8");

   $sql = "SELECT wp_ab_staff.id , wp_ab_staff.full_name
               FROM 
			     wp_ab_staff join
			     wp_ab_staff_services
			 
			 
			   on wp_ab_staff_services.staff_id=wp_ab_staff.id
                WHERE wp_ab_staff_services.service_id =".$_GET['id']; 


   $result = $mysqli->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['id']] = $row['full_name'];
   }


   echo json_encode($json);
?>