<?php                         
require_once("../../../../wp-load.php");
global $wpdb;
$table_name = $wpdb->prefix.'page_status';
$user_id = get_current_user_id();
$user_id= get_current_user_id();
if (isset($_POST['type'])) {
    $page_num = $_POST['page_num'];
    $user_id = $user_id; // Ensure $user_id is defined

    if ($_POST['type'] == 'read') {
        $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE page_number=%d AND user_id = %d", $page_num, $user_id));

        if ($count > 0) {
            $wpdb->update(
                $table_name,
                ['status' => 1],
                ['page_number' => $page_num, 'user_id' => $user_id]
            );
        } else {
            $wpdb->insert(
                $table_name,
                [
                    'user_id' => $user_id,
                    'page_number' => $page_num,
                    'status' => 1,
                    // Add more columns and values as needed
                ]
            );
        }
    } else {
        $wpdb->update(
            $table_name,
            ['status' => 0],
            ['page_number' => $page_num, 'user_id' => $user_id]
        );
    }
}



/* Check if read or not */
if(isset($_POST['page_num_check'])){
    $user_id = get_current_user_id();
    if (!metadata_exists('user', $user_id, 'recent_view_page'))
    {
        add_user_meta($user_id, 'recent_view_page', $_POST['page_num_check']);
    }else{
        update_user_meta( $user_id, 'recent_view_page', $_POST['page_num_check'] );
    }
    $results = $wpdb->get_results( "SELECT * FROM $table_name WHERE page_number =".$_POST['page_num_check']." AND user_id = ".$user_id);
    echo $results[0]->status;
}
