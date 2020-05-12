<?php
//
//
// Plastic Sheets
//
?> 
  

<section id="plasticsheets" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-plasticsheet.jpg">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1">

      <div class="module-wrapper">
        <h3>Today, vehicle manufacturers are spending million’s of dollars to protect vehicles during transit</h3>
      </div>
      
    </div>
  </div>
  
  <?php $audiosheets = get_sub_field('sheets_audio');
  if( $audiosheets ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audiosheets['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>