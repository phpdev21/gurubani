<?php

function spiko_enqueue_script() {

    $suffix = ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_style('bootstrap', SPIKO_TEMPLATE_DIR_URI . '/assets/css/bootstrap' . $suffix . '.css', array(), '4.0.0');
    wp_style_add_data('bootstrap', 'rtl', 'replace');
    wp_enqueue_style('spiko-style', get_stylesheet_uri());
    wp_style_add_data('spiko-style', 'rtl', 'replace');
    wp_enqueue_style('jquery-starrtment', SPIKO_TEMPLATE_DIR_URI . '/assets/css/jquery.smartmenus.bootstrap-4.css');
    wp_style_add_data('jquery-starrtment', 'rtl', 'replace');   
    wp_enqueue_style('owl', SPIKO_TEMPLATE_DIR_URI. '/assets/css/owl.carousel.css');
    wp_enqueue_style('font-awesome', SPIKO_TEMPLATE_DIR_URI . '/assets/css/font-awesome/css/font-awesome' . $suffix . '.css', array(), '');
    
   if ( ! function_exists( 'spiko_plus_activate' ) ):
        require_once('custom_style.php');    
        if (get_theme_mod('custom_color_enable') == true) {
            add_action('wp_footer', 'spiko_custom_light');
        } else {
            wp_enqueue_style('spiko-default', SPIKO_TEMPLATE_DIR_URI . '/assets/css/default.css');
        }
        wp_enqueue_script('spiko-custom-js', SPIKO_TEMPLATE_DIR_URI . '/assets/js/custom.js', array('jquery'), '', true);    
    endif;

//js file
    wp_enqueue_script('spiko-widget-custom-js', SPIKO_TEMPLATE_DIR_URI . '/assets/js/widget-custom.js', array('jquery'), '', true);
    wp_enqueue_script('bootstrap', SPIKO_TEMPLATE_DIR_URI . '/assets/js/bootstrap' . $suffix . '.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-menu', SPIKO_TEMPLATE_DIR_URI . '/assets/js/smartmenus/jquery.smartmenus.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-menu-bootstrap', SPIKO_TEMPLATE_DIR_URI . '/assets/js/smartmenus/jquery.smartmenus.bootstrap-4.js', array('jquery'), '', true);
    wp_enqueue_script('owl', SPIKO_TEMPLATE_DIR_URI. '/assets/js/owl.carousel' . $suffix . '.js', array('jquery'), '', true);
    
    wp_enqueue_script('spiko-video-slider-js', SPIKO_TEMPLATE_DIR_URI . '/assets/js/jquery.mb.YTPlayer.js');    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'spiko_enqueue_script');

/**
* Added skip link focus
*/
function spiko_skip_link_fn() {
?>
<script>
/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
</script>
<?php
}
add_action( 'wp_print_footer_scripts', 'spiko_skip_link_fn' );


/**
* Added Close toggle after last menu's link focus
*/
function spiko_close_toggle_link_fn() {?>
    <script>

    jQuery('a,input').bind('focus', function() {
             if(!jQuery(this).closest(".menu-item").length ) {
                jQuery("li.dropdown ul").css("display", "none");
            }
    });  
       
    jQuery('a,input').bind('focus', function() {
    if(!jQuery(this).closest(".menu-item").length && !jQuery(this).closest(".search-box-outer").length && ( jQuery(window).width() <= 992) ) {
                jQuery('.navbar-collapse').removeClass('show');
        }
    })
    </script>
<?php
}
add_action( 'wp_print_footer_scripts', 'spiko_close_toggle_link_fn' );

if ( ! function_exists( 'spiko_plus_activate' ) ):

    function spiko_enqueue_scripts(){
    wp_enqueue_style('spiko-customize-css', SPIKO_TEMPLATE_DIR_URI . '/assets/css/spiko-customize.css');
    }
    add_action( 'customize_controls_enqueue_scripts', 'spiko_enqueue_scripts' );


    //Load script at admin side
    function spiko_admin_scripts() {
        wp_enqueue_script( 'spiko-admin-script', SPIKO_TEMPLATE_DIR_URI . '/assets/js/admin.js', array('jquery'));
    }
    add_action( 'customize_controls_enqueue_scripts', 'spiko_admin_scripts');
endif;
?>
