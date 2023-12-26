<?php
require_once("../../../../wp-load.php");
global $wpdb;
$tablename = $wpdb->prefix.'gurubani';
$results = $wpdb->get_results( "SELECT * FROM $tablename");
$filename = 'gurubani.csv';
$file = fopen($filename,"w");
// Header row - Remove this code if you don't want a header row in the export file.
$employee_arr = array("Page number","Page data"); 
fputcsv($file, $employee_arr);
foreach ($results as $result) { 
    $employee_arr = array($result->page_number,htmlspecialchars_decode($result->page_data));
    fputcsv($file,$employee_arr); 
}  
fclose($file);
// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/csv; ");
readfile($filename);
// deleting file
// unlink($filename);
// exit();
?>
