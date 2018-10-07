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

   $sql = "SELECT day_index ,start_time,end_time
               FROM 
			     wp_ab_staff_schedule_items 
			 
                WHERE wp_ab_staff_schedule_items.staff_id =".$_GET['id']." AND start_time IS NOT NULL";


   $result = $mysqli->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['day_index']] = $row['start_time'];
   }


   echo json_encode($json);
?>

