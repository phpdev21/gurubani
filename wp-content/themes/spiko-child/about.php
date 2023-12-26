<?php /* Template Name: About */  ?>
<?php get_header();?>
<div class="about-us-full-page">
    <section class="who-we">
        <div class="container">
            <div class="who">
                <h2 class="who-we-heading">Who we are?</h2>
                <!-- <p class="who-we-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
            </div>
        </div>
    </section>

    <!-- section about us start -->
    <section class="about-us mb-5">
        <div class="container">
            <div class="row flex-lg-row flex-column-reverse">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="about-text pt-5">
                    <?php echo get_field( "about_content_1" ); ?>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12 text-end">
                    <img class="about-us-img" src="<?php echo get_field( "about_background_image" ); ?>">
                </div> 
            </div>
        </div>
    </section>
    <!-- section about us end  -->

    <!-- start our mission section -->
    <section class="our-mission mt-5 pb-lg-0 pb-5">
        <div class="container">
            <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <img class="our-mission-img" src="<?php echo get_field( "about_background_image_2" ); ?>">
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="mission-text">
                    <?php echo get_field( "about_content_2" ); ?>
                    </div>
                </div>            
            </div>
        </div>
    </section>
    <!-- end our mission section -->
   
   <!-- <section>
        <div class="container">-->
            <!-- start download our section -->
         <!--   <div class="download-our">
                <div class="download-headings">
                    <h3 class="download-ist-heading">Download Our App</h3>
                    <p class="download-para">You can download Gurbanity for both Android and IOS devices here.</p>
                </div>
                <div class="update-img">
                <a href=""> <img src="/wp-content/uploads/2022/03/pngwing-1.png"></a>
                <a href=""> <img src="/wp-content/uploads/2022/03/5a902db97f96951c82922874-1.png"></a>
                
                </div>
            </div> -->
            <!-- end download our section -->
      <!--  </div>  
    </section> -->

</div>
<?php get_footer(); ?>