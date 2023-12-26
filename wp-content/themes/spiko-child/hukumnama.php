<?php /* Template Name: Daily Hukumnama */  ?>
<?php get_header();?>
<?php

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://app.akashdhami.com/hukamnama/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$response = curl_exec($curl);
if($e = curl_error($curl)) {
    echo $e;
} else {
     
    // Decoding JSON data
    $decodedData =
        json_decode($response, true);
         
    
}
curl_close($curl);
?>


<section class="who-we">
    <div class="container">
        <div class="who">
            <h2 class="who-we-heading">Daily Hukumnama</h2>
        </div>
    </div>
</section>
<section class="about-us mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="about-text pt-5">
                <h3 class="content-heading">Daily Hukumnama</h3>
				<p class="about-para">The Daily Hukamnama is a tradition in Sikhism to read a Shabad (passage) from the Sri Guru Granth Sahib, the Sikh holy scripture. Sikhs consider the passage as the divine "command of the Guru" for the day. Hukams are taken as guidance in specific situations or answers to questions. The Daily Hukamnama is direct from the Harmandir Sahib (Golden Temple) in Amritsar, India, the holiest temple of the Sikhs. The new Hukamnama is usually available between 4am-6am IST (Indian Standard Time).</p>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
            <img class="about-us-img" src="/wp-content/uploads/2022/05/pranjal-singh-v4azuGm_V5o-unsplash-1-1.png">
            </div> 
        </div>
    </div>
</section>
<section class="hukumnama-section mb-5">
	<div class="container">
		<div class="inner-hukumnama">
			<div class="hukumnama_box mb-4">
				<div class="d-flex justify-content-between date_box">
					<p class="today_date"><?php echo $decodedData['date']; ?> - <?php echo $decodedData['month']; ?> - <?php echo $decodedData['year']; ?></p>
					<p class="today_date_punjabi"><?php echo $decodedData['date']; ?> - <?php echo $decodedData['month']; ?> - <?php echo $decodedData['year']; ?></p>
				</div>
				<h3 class="jug_head">ju~go jug A~tl</h3>
				<h3 class="head_1">sRI gurU gRMQ swihb jI dw <br>s~cKMf sRI hirmMdr swihb qoN AwieAw</h3>
				<h3 class="head_today">A~j dw Purmwn</h3>
				<p class="hukumnama_text"><?php echo $decodedData['hukamnamaOrig'] ?></p>
			</div>
			<p class="meaning_punjabi mb-3"><span>ਅਰਥ: </span><?php echo $decodedData['punjabiTranslationUni'] ?></p>
			<p class="meaning_english"><span>Meaning: </span><?php echo $decodedData['englishTranslation'] ?></p>
		</div>
	</div>
</section>


<?php get_footer(); ?>