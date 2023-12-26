<?php /* Template Name: Gurubani */ 

get_header();
global $wpdb;
$table_name =  $wpdb->prefix.'gurubani';
$user_id = get_current_user_id();
$results = $wpdb->get_results( "SELECT * FROM $table_name");
$read_pages = $wpdb->get_results("SELECT * FROM wp_gurubani INNER JOIN wp_page_status ON wp_gurubani.page_number = wp_page_status.page_number WHERE wp_page_status.user_id = ".$user_id." AND wp_page_status.status = 1");
$unread_pages = $wpdb->get_results("SELECT wp_gurubani.page_number FROM wp_gurubani LEFT JOIN wp_page_status ON wp_gurubani.page_number = wp_page_status.page_number AND wp_page_status.user_id = ".$user_id." AND wp_page_status.status = 1 WHERE wp_page_status.page_number IS NULL");
$last_view_page = get_user_meta($user_id, 'recent_view_page', true);

?>
<section class="page-body">
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/jquery-1.7.1.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/turn.min.js"></script>
<div class="book_controls">
    <div id="controls">
     <div class="controls_center"><label for="page-number">ਅੰਕ </label> <input type="text" id="page-number" value="1"><span>of</span><span id="number-pages"></span><span class="page_nav prev-page" onclick="previous()" pagetype="prev" style="cursor:pointer;font-size: 18px;">&larr;</span><span class="page_nav next-page" onclick="next()" pagetype="next"style="cursor:pointer;font-size: 18px;">&rarr;</span></div><div class=""> <button class="mark_read" typeof="read">Mark As Read</button></div>
 
    </div>
</div>
<section class="inner_section book_section">
	<div class="container">
		<div class="inner_book">
			<img src="<?php echo get_stylesheet_directory_uri() ?>/img/sikh.png" class="sikh_img">
            <div class="book_popup" id="bokrea">
                <button class="book_btn"><i class="fa-solid fa-book"></i></button>
                <div class="book-page-popup">
                    <div class="popup-bar">
                        <ul class="nav nav-pills ms-0 book_tabs" id="pills-tab" role="tablist">
                            <li class="nav-item book-list" role="presentation">
                                <a class="tab_link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All</a>
                            </li>
                            <li class="nav-item book-list" role="presentation">
                                <a class="tab_link" id="pills-read-tab" data-bs-toggle="pill" data-bs-target="#pills-read" role="tab" aria-controls="pills-read" aria-selected="false"><span class="read_ind"></span>Read</a>
                            </li>
                            <li class="nav-item book-list" role="presentation">
                                <a class="tab_link" id="pills-unread-tab" data-bs-toggle="pill" data-bs-target="#pills-unread" role="tab" aria-controls="pills-unread" aria-selected="false"><span class="unread_ind"></span>Unread</a>
                            </li>
                        </ul>
                        <i class="fas fa-times close_book_popup"></i>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">    <ul class="page_wrapper ms-0">
                        <?php foreach($results as $result){ ?>
                            <li class="page_list_item">
                                    <a href="#" pagenumber="<?php echo $result->page_number; ?>" class="page_link jumpto <?php if($result->read_status == 1){ ?> read_page <?php } ?>"><?php echo $result->page_number;?></a>  
                            </li>
                       <?php  } ?>    
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-read" role="tabpanel" aria-labelledby="pills-read-tab">
                            <ul class="page_wrapper ms-0"> 
                                <?php foreach($read_pages as $result){ 
                                ?>
                            <li class="page_list_item">
                                <a href="#" pagenumber="<?php echo $result->page_number; ?>" class="page_link jumpto read_page "><?php echo $result->page_number;?></a>  
                            </li>
                           <?php }
                             ?>    
                            </ul>
                        </div> 
                        <div class="tab-pane fade" id="pills-unread" role="tabpanel" aria-labelledby="pills-unread-tab">
                            <ul class="page_wrapper ms-0">
                                <?php foreach($unread_pages as $result){ 
                                ?>
                                <li class="page_list_item">
                                    <a href="#" pagenumber="<?php echo $result->page_number; ?>" class="page_link jumpto"><?php echo $result->page_number;?></a>  
                            </li>
                            <?php } ?>  
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
			<div id="book">
			</div>
		</div>
	</div>
</section>


<script type="text/javascript">
 // Sample using dynamic pages with turn.js

 var numberOfPages = 1430; 


 // Adds the pages that the book will need
 function addPage(page, book) {
 // First check if the page is already in the book
 if (!book.turn('hasPage', page)) {
 // Create an element for this page
 var element = $('<div />', {'class': 'page '+((page%2==0) ? 'odd' : 'even'), 'id': 'page-'+page}).html('<i class="loader"></i>');
 // If not then add the page
 book.turn('addPage', element, page);
 // Let's assum that the data is comming from the server and the request takes 1s.
 setTimeout(function(){
 $.ajax({
 method: "POST",
 url: "<?php echo get_stylesheet_directory_uri() ?>/admin-ajax/gurubani-ajax.php",
 data: { "page": page}
 })
 .done(function( msg ) {
 element.html('<div class="data">'+msg+'</div>');
 });

 
 }, 500);
 }
 }

 function detectmob() { 
 if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 ){
 return true;
 }
 else {
 return false;
 }
 }

 $(window).ready(function(){
 if(!(detectmob)){
 $("#book").height($(window).height())
 }else{
 $("#book").height($(window).height())
 $("#book").css("overflow-y", "scroll")
 }
 $("#book").width($(window).width())
 $('#book').turn({
 acceleration: true,
 pages: numberOfPages,
 elevation: 800,
 duration:2000,
 gradients: !$.isTouch,
 display: 'single',
 when: {
 turning: function(e, page, view) {

 // Gets the range of pages that the book needs right now
 var range = $(this).turn('range', page);

 // Check if each page is within the book
 for (page = range[0]; page<=range[1]; page++) 

 addPage(page, $(this));

 },

 turned: function(e, page) {

 //$('#page-number').val(page);
 $.ajax({
            type: "POST",
            url: "<?php echo get_stylesheet_directory_uri() ?>/admin-ajax/read-unread.php",
            data: { 
                "page_num_check": page,
            },
            success: function(response) {
                if(response == 1){
                    $('.mark_read').attr('typeof','unread');
                    $('.mark_read').text('Mark As Unread');
                }else{
                    $('.mark_read').attr('typeof','read');
                    $('.mark_read').text('Mark As Read');
                }
            }
        });
 
 }
 }
 });

 $("#book").css("overflow-y", "scroll")

 $(".turn-page-wrapper").css("overflow-y", "scroll")

 $('#number-pages').html(numberOfPages);

 $('#page-number').keydown(function(e){
 if (e.keyCode==13)
 $('#book').turn('page', (parseInt($('#page-number').val())));
 });
 
 $("#zoom-view").bind("zoom.swipeRight", function(event) {
 $("#book").turn("previous");
 });
 });

 $(window).bind('keydown', function(e){

 if (e.target && e.target.tagName.toLowerCase()!='input')
 if (e.keyCode==37)
 $('#book').turn('previous');
 else if (e.keyCode==39)
 $('#book').turn('next');

 });
 function next(){
 $('#book').turn('next');
 }
 function previous(){
 $('#book').turn('previous');
 }


 $(document).ready(function(){
    window.addEventListener('load', function () {
    <?php if($last_view_page !=""){ ?>
        var recentpagenum = <?php echo $last_view_page;  ?>;
        setTimeout(function(){
            $('#book').turn('page', recentpagenum);
        },1000);
    <?php }
    ?>
    });
    $(".jumpto").click(function(){
        event.preventDefault();
        var pagenum = $(this).attr('pagenumber');
        $('#page-number').val(pagenum);
        $('#book').turn('page', pagenum);
    });

  /* Marked current page  as read */
    $(".mark_read").click(function(){
        var pagenum = $('#page-number').val();
        var type =  $(this).attr('typeof');
        $.ajax({
            type: "POST",
            url: "<?php echo get_stylesheet_directory_uri() ?>/admin-ajax/read-unread.php",
            data: { 
                "page_num": pagenum,
                "type": type
            },
            success: function(response) {
                if(type == 'read'){
                    $('.mark_read').attr('typeof','unread');
                    $('.mark_read').text('Mark As Unread');
                }else{
                    $('.mark_read').attr('typeof','read');
                    $('.mark_read').text('Mark As Read');
                }
                window.location.reload();
            }
        });
      
    });


    /* Check either read or not */
    $('.page_nav').click(function(){
        var pagetype = $(this).attr('pagetype');
        var pagenum = parseInt($('#page-number').val());
        if(pagetype == 'next'){
            if(pagenum < 1430){
                var pagenum = pagenum + 1;
            }else{
                var pagenum = 1430;    
            }
        }else{
            if(pagenum > 1){
                var pagenum = pagenum - 1;
            }else{
                var pagenum = 1;
            }
        }
        $('#page-number').val(pagenum);
        $.ajax({
            type: "POST",
            url: "<?php echo get_stylesheet_directory_uri() ?>/admin-ajax/read-unread.php",
            data: { 
                "page_num_check": pagenum,
            },
            success: function(response) {
                if(response == 1){
                    $('.mark_read').attr('typeof','unread');
                    $('.mark_read').text('Mark As Unread');
                }else{
                    $('.mark_read').attr('typeof','read');
                    $('.mark_read').text('Mark As Read');
                }
            }
        });
    });
}); 
</script>

</section>

<?php

get_footer();

?>