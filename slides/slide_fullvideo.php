<?php
//
//
// Full Page Video Embed
// 

$embedcode = get_sub_field('slide_fullvideo_embed');
$fullvideo_title = get_sub_field('slide_fullvideo_title');

?> 

<section id="section-fullvideo" data-background-color="#000000">
  
  <?php if ($fullvideo_title) { ?>
  <h2><?php echo $fullvideo_title; ?></h2>
  <?php } ?>
  
  <div class="fullvideo-wrapper stretch">
    <iframe src="<?php echo $embedcode; ?>?controls=0" data-autoplay frameborder="0"></iframe>
    
  </div>
  
</section>