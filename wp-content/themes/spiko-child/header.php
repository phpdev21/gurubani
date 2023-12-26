<?php
/**
 * The header for our theme
 *
 * @package spiko
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no, maximum-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <?php if (is_singular() && pings_open(get_queried_object())):
    echo '<link rel="pingback" href=" ' . esc_url(get_bloginfo('pingback_url')) . ' ">';
endif;
wp_head(); ?>   
    </head>
<?php
    /*     $follow_link = get_field('follow_link_section', 'option');
        $share_link = get_field('share_link_section', 'option');
 */
if (get_theme_mod('banner_enable', true) == true)
{
    $spiko_banner = 'banner';
}
else
{
    $spiko_banner = 'remove-banner';
}
if (get_theme_mod('spiko_layout_style', 'wide') == "boxed")
{
    $spiko_class = "boxed";
}
else
{
    $spiko_class = "wide";
} ?>

<body <?php body_class($spiko_class . " " . $spiko_banner . " " . get_theme_mod('spiko_color_skin', 'light')); ?> >
    <?php wp_body_open(); ?>
        
        <div class="top_bar">
            <div class="d-flex justify-content-between align-items-center">
                <?php the_custom_logo(); ?>	
                <!-- <div class="d-flex">
                    <div class="inner-top">
                        <span>Follow Us </span>
                        <ul class="social_list">
                            <li class="social_item"><a href="<?php //echo $follow_link[0]['follow_links']; ?>" class="social_link facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social_item"><a href="<?php //echo $follow_link[1]['follow_links']; ?>" class="social_link instagram"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="inner-top ms-md-4 d-md-flex d-none">
                        <span>Share </span>
                        <ul class="social_list">
                            <li class="social_item"><a href="<?php //echo $share_link[0]['share_link']; ?>" class="social_link facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social_item"><a href="<?php // echo $share_link[1]['share_link']; ?>" class="social_link twitter"><i class="fab fa-twitter"></i></a></li>
                            <li class="social_item"><a href="<?php// echo $share_link[2]['share_link']; ?>" class="social_link instagram"><i class="fab fa-instagram"></i></a></li>
                            <li class="social_item"><a href="<?php //echo $share_link[3]['share_link']; ?>" class="social_link email"><i class="fas fa-envelope"></i></a></li>
                            <li class="social_item"><a href="<?php // echo $share_link[4]['share_link']; ?>" class="social_link whatsapp"><i class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <div class="d-md-none d-flex justify-content-center mt-3">
                <div class="inner-top ms-md-4">
                    <span>Share </span>
                    <ul class="social_list">
                        <li class="social_item"><a href="<?php// echo $share_link[0]['share_link']; ?>" class="social_link facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="social_item"><a href="<?php // echo $share_link[1]['share_link']; ?>" class="social_link twitter"><i class="fab fa-twitter"></i></a></li>
                        <li class="social_item"><a href="<?php //echo $share_link[2]['share_link']; ?>" class="social_link instagram"><i class="fab fa-instagram"></i></a></li>
                        <li class="social_item"><a href="<?php //echo $share_link[3]['share_link']; ?>" class="social_link email"><i class="fas fa-envelope"></i></a></li>
                        <li class="social_item"><a href="<?php //echo $share_link[4]['share_link']; ?>" class="social_link whatsapp"><i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'spiko'); ?></a>
               <div id="wrapper"> 
               <nav class="navbar-custom navbar-expand-lg navbar-dark custom <?php if (get_theme_mod('sticky_header_enable', false) === true): ?>header-sticky<?php
                    endif; ?>">
                        <div class="">	
                            <div class="custom-logo-link-url"> 
                                <h2 class="site-title"><a class="site-title-name" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                </h2>
                            <?php
                            $spiko_description = get_bloginfo('description', 'display');
                                if ($spiko_description || is_customize_preview()): ?>
                                    <p class="site-description"><?php //echo $spiko_description; ?></p>
                                <?php
                    endif; ?>
		                    </div>
		<button class="navbar-toggler bck-blk" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'spiko'); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<div class="<?php echo (!is_rtl()) ? "ml-auto" : "mr-auto"; ?>">
			<?php
$spiko_shop_button = '<ul class="nav navbar-nav mr-auto">%3$s';
//Hence This condition only work when woocommerce plugin will be activate
if (get_theme_mod('after_menu_btn_new_tabl', false) == true)
{
    $spiko_target = "_blank";
}
else
{
    $spiko_target = "_self";
}
if ((get_theme_mod('after_menu_btn_txt') != '') && (get_theme_mod('after_menu_multiple_option') == 'menu_btn')):
    $spiko_shop_button .= '<li class="nav-item menu-item main-header-btn"><a target=' . $spiko_target . ' class="spiko_header_btn" href=' . get_theme_mod('after_menu_btn_link', '') . '>' . get_theme_mod('after_menu_btn_txt') . '</a></li>';
endif;
if ((get_theme_mod('after_menu_html') != '') && (get_theme_mod('after_menu_multiple_option') == 'html')):
    $spiko_shop_button .= '<li class="nav-item html menu-item lite-html">' . get_theme_mod('after_menu_html') . '</li>';

endif;
if (get_theme_mod('search_btn_enable', false) == true)
{
    $spiko_header_border = 'search_exists';
}
else
{
    $spiko_header_border = 'shop_exists';
}
$spiko_shop_button .= '<li class="nav-item"><div class="' . $spiko_header_border . ' header-module">';

//Hence This condition only work when woocommerce plugin will be activate
if (get_theme_mod('search_btn_enable', false) == true)
{
    $spiko_shop_button .= '<div class="nav-search nav-light-search wrap">
		                           			<div class="search-box-outer">
	                            				<div class="dropdown">
                  									<a href="#" title="' . esc_attr__('Search', 'spiko') . '" class="search-icon condition has-submenu" aria-haspopup="true" aria-expanded="false">
               										<i class="fa fa-search"></i>
             										<span class="sub-arrow"></span></a>
             										<ul class="dropdown-menu pull-right search-panel"  role="group" aria-hidden="true" aria-expanded="false">
                             							<li class="panel-outer">
                             								<div class="form-container">
                               									 <form role="' . esc_attr('Search', 'spiko') . '" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
                                									 <label>
                                  										<input type="search" class="search-field" placeholder="' . esc_attr__('Search', 'spiko') . '" value="" name="s" autocomplete="off">
                                 									 </label>
                                 									<input type="submit" class="search-submit" value="' . esc_attr__('Search', 'spiko') . '">
                                								 </form>                   
                               								</div>
                             							</li>
                           							</ul>
	                       						</div>
		                     				</div>
		                   				</div>';
}
if (class_exists('WooCommerce'))
{
    if (get_theme_mod('cart_btn_enable', false) == true)
    {
        $spiko_shop_button .= '<div class="cart-header">';
        global $woocommerce;
        $spiko_link = function_exists('wc_get_cart_url') ? wc_get_cart_url() : $woocommerce
            ->cart
            ->get_cart_url();
        $spiko_shop_button .= '<a class="cart-icon" href="' . esc_url($spiko_link) . '" >';

        if ($woocommerce
            ->cart->cart_contents_count == 0)
        {
            $spiko_shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
        }
        else
        {
            $spiko_shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
        }

        $spiko_shop_button .= '</a>';

        $spiko_shop_button .= '<a class="cart-total" href="' . esc_url($spiko_link) . '" ><span>' . sprintf(_n('%d <span>item</span>', '%d <span>items</span>', $woocommerce
            ->cart->cart_contents_count, 'spiko') , $woocommerce
            ->cart
            ->cart_contents_count) . '</span></a>';

    }
}
$spiko_shop_button .= '</li></div>';
$spiko_shop_button .= '</ul>';
$spiko_menu_class = '';
wp_nav_menu(array(
    'theme_location' => 'spiko-primary',
    'menu_class' => 'nav navbar-nav mr-auto ' . $spiko_menu_class . '',
    'items_wrap' => $spiko_shop_button,
    'fallback_cb' => 'spiko_fallback_page_menu',
    'walker' => new Spiko_Nav_Walker()
)); ?>
	        </div>
		</div>
</nav>
                    <div id="content">
