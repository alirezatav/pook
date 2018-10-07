

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


/*$sql = "INSERT INTO wp_ab_appointments 
(id, series_id, staff_id, service_id, start_date, end_date, google_event_id, extras_duration, internal_note)
 VALUES (NULL, NULL, '$_POST[staff_id]', '$_POST[service_id]', '$_POST[start_date]', '$_POST[end_date]', NULL, '0', NULL)
;";*/

$sql = "UPDATE Prescription
 SET status='approved' , services='$_POST[MAIN_Services]'
 WHERE id='$_POST[PID]'";



if ($mysqli->query($sql) === TRUE) {
 echo "success";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




?>