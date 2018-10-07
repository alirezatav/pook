        <?php


        define('DB_DATABASE', 'webone');

        define('DB_USER', 'root');

        define('DB_PASSWORD', '');

        define('DB_HOST', 'localhost');

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        mysqli_set_charset($mysqli, "utf8");
        $sql = "SELECT day_index ,start_time,end_time FROM wp_ab_staff_schedule_items WHERE wp_ab_staff_schedule_items.staff_id =1" ;
        $result = $mysqli->query($sql);
        $json = [];
        while ($row = $result->fetch_assoc()) {
            $json [] = $row;
        }
        echo json_encode($json); ?>