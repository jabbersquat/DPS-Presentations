<?php
//
//
// Have you thought about?
//
  
$finalSlide_title = get_sub_field('final_slide_header');
?>
  

<section id="final" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-final.jpg">
  
  <?php if ($finalSlide_title) { ?>
    <h2 class="finalh2"><?php echo $finalSlide_title; ?></h2>
  <?php } else { ?>
  <h2 class="finalh2">Have you thought about?</h2>
  <?php } ?>
  
  <?php
    if( have_rows('final_slide_list') ) { ?>
    
    <ul class="haveyouthoughabout-items">
    
        <?php while ( have_rows('final_slide_list') ) : the_row();
          $finalslidelist_item = get_sub_field('final_slide_list_item');
        ?>
        <li><?php echo $finalslidelist_item; ?></li>
      
        <?php endwhile; ?>
    
    </ul>
    
  <?php } else { ?>
  
    <ul class="haveyouthoughabout-items">
      <li>Window Tint</li>
      <li>Leather Interior</li>
      <li>Paint Protection Film</li>
      <li>Remote Start & Security</li>
      <li>Appearance Protection</li>
      <li>Mobile Entertainment</li>
      <li>Vehicle Safety</li>
      <li>Sunroofs</li>
      <li>& More!</li>
    </ul>
  
  <?php } ?>
  
  <?php $finalLink = get_sub_field('final_url');
    if( $finalLink ): ?>
    
    <div class="final_button">
      <a id="final_btn_link" href="<?php echo $finalLink; ?>">
        <div id="behindButton"></div>
        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/final_button.png">
      </a>
    </div>
    
  <?php endif; ?>
  
  <?php $audioFinal = get_sub_field('final_audio');
  if( $audioFinal ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioFinal['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>