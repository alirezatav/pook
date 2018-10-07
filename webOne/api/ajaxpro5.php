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

   $sql = "SELECT *
               FROM 
	
	        wp_ab_services
			 
                WHERE id =".$_GET['id']; 


   $result = $mysqli->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
         $json [] = $row;
   }


   echo json_encode($json);
?>