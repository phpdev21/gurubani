<?php
/*
Plugin Name: Rest Api 
Plugin URI: https://www.avioxtechnologies.com/
Description: The easiest way to create powerful online communities and beautiful user profiles with WordPress
Version: 2.0
Author: Shagun Sharma
Author URI: https://www.avioxtechnologies.com/
Text Domain: shagun-sharma
*/

defined( 'ABSPATH' ) || exit;

require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
include_once('includes/main/main.php');
    new Main();