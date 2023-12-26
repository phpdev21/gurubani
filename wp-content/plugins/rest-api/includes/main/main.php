<?php 
include_once( ABSPATH . 'wp-content/plugins/rest-api/includes/apicall/callapi.php' );
$apicall = new CallApi();
class Main{

    public function __construct()
    {
        add_action( 'rest_api_init', array($this, 'registerApiEndpoint') );
    }

    public function registerApiEndpoint(){
        register_rest_route( 'app/v1', '/register', array(
            'methods' => 'POST',
            'callback' => array( $this, 'userRegister' ),
            'permission_callback' => '__return_true',
        ) );
    }
    public function userRegister($request){
        $apicall = new CallApi();
        echo json_encode($apicall->userRegisterCall($request));
      }
}