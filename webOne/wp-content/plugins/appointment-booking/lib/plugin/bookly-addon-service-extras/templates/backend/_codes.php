<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$codes = array(
    array( 'code' => 'category_name',     'description' => __( 'name of category', 'bookly' ), ),
    array( 'code' => 'number_of_persons', 'description' => __( 'number of persons', 'bookly' ), ),
    array( 'code' => 'service_info',      'description' => __( 'info of service', 'bookly' ), ),
    array( 'code' => 'service_name',      'description' => __( 'name of service', 'bookly' ), ),
    array( 'code' => 'service_price',     'description' => __( 'price of service', 'bookly' ), ),
    array( 'code' => 'staff_info',        'description' => __( 'info of staff', 'bookly' ), ),
    array( 'code' => 'staff_name',        'description' => __( 'name of staff', 'bookly' ), ),
    array( 'code' => 'total_price',       'description' => __( 'total price of booking', 'bookly' ), ),
);
\Bookly\Lib\Utils\Common::Codes( apply_filters( 'bookly_appearance_short_codes', $codes ) );