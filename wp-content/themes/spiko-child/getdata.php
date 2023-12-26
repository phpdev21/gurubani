<?php /* Template Name: Getdata */ ?>
<?php
global $wpdb;
$tablename = $wpdb->prefix.'gurubani';
$count = 0;
for ($k = 2 ; $k < 1500; $k++){
    $count++;
    $data = file_get_contents('https://ektuhi.com/getdata.php?page='.$k);
    $myVar = htmlspecialchars($data, ENT_QUOTES);
    echo $myVar."<br>";
    $wpdb->insert( $tablename, array(
        'page_number' => $count,
        'page_data' => $myVar
        )
    );
}
