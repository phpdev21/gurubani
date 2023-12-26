<?php
require_once("../../../../wp-load.php");
global $wpdb;
$tablename = $wpdb->prefix.'gurubani';
$results = $wpdb->get_results( "SELECT * FROM $tablename WHERE page_number =".$_GET['page']);
{
    echo htmlspecialchars_decode($results[0]->page_data );
}