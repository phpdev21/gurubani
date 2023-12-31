<?php
/**
 * Template Name: Full Width Page
 *
 * @package spiko
 */
get_header();?>
<?php
if(is_front_page()){
	get_template_part('template-parts/content','home');
}else{ ?>
	<section class="section-space page">
		<div class="container<?php echo esc_html(spiko_container());?>">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<?php
					while ( have_posts()):
					the_post();
						get_template_part('template-parts/content','page');
						if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;
					endwhile;
					?>	
				</div>
			</div>
		</div>
	</section>
<?php } ?>
<?php get_footer();?>