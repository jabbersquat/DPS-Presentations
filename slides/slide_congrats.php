<?php
//
//
// Congratulations / Start
// 

$logoUrl = get_query_var('presentation_logo');
$bg = get_sub_field('slide_congrats_bg');
?> 

<section id="congrats" 
  <?php if( !empty($bg) ): ?>data-background-image="<?php echo $bg['url']; ?>"<?php endif; ?>>
  <div class="row">
    <div class="congrats-jumbotron col-xs-10 col-xs-offset-1">
      <div class="module-wrapper">
        <div class="logo"><img src="<?php echo $logoUrl; ?>"></div>
        <p class="congrats-p">Congratulations on your purchase from </p>
        <h1><?php echo $name; ?></h1>
        
      </div>
    </div>
  </div>
  <?php $audioCongrats = get_sub_field('congrats_audio');
  if( $audioCongrats ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioCongrats['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
  
</section>