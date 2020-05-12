<?php
//
//
// Generic Full Image
//

$fullimage = get_sub_field('slide_fullimage_main');
?> 

<section id="section-fullimage" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-engine.jpg">
  
  <div class="fullimage-image" <?php echo 'style="background-image: url(\''.$fullimage['url'].');"';?>>
  
  <?php $audioGenericFullimage = get_sub_field('generic_fullimage_audio');
  if( $audioGenericFullimage ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioGenericFullimage['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
  
</section>