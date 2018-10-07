

<?php

define('DB_DATABASE', 'webone');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'BP3FhCu29fspMV35');

/** MySQL hostname */
define('DB_HOST', 'localhost');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
mysqli_set_charset($mysqli,"utf8");

$sql = "INSERT INTO wp_ab_appointments 
(id, series_id, staff_id, service_id, start_date, end_date, google_event_id, extras_duration, internal_note)
 VALUES (NULL, NULL, '$_POST[staff_id]', '$_POST[service_id]', '$_POST[start_date]', '$_POST[end_date]', NULL, '0', NULL)
;";





	if ($mysqli->query($sql) === TRUE) {
		$last_id = $mysqli->insert_id;
		$sql2 = "INSERT INTO wp_ab_customer_appointments
(id,customer_id,appointment_id,location_id,payment_id,number_of_persons,extras,custom_fields,status,token,time_zone,time_zone_offset,locale,compound_service_id,compound_token,created_from,created)
 VALUES 
 (NULL, '$_POST[wp_user_id]', '$last_id ', NULL, NULL, '1', NULL, NULL, 'approved', NULL, NULL, NULL, NULL, NULL, NULL, 'frontend', SYSDATE())
;";
	//mysqli_query($mysqli,$sql2);

        if ($mysqli->query($sql2) === TRUE) {
            echo "sucsses";
        }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}




?>