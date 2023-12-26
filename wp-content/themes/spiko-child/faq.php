<?php /* Template Name: Faq page */  ?>
<?php get_header();?>
<style>
.faq-section{
    margin-top:100px !important;
    margin-bottom:150px !important;
    padding-top: 80px;
}
</style>
<div class="container">
<div class="faq-section">
    <section class="faq-heading">
        <div class="container">
    <h2>Frequently Asked Questions </h2>
<?php echo do_shortcode('[sp_easyaccordion id="160"]'); ?>
</div>
</section>
</div>
</div>
<?php get_footer(); ?>