<?php
//
//
// Window Protection & Privacy
//
?> 
  

<section id="window-protection" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-snowroad.jpg">
  
  <h2>Window Protection & Privacy</h2>
  <div class="row">
    <div class="col-xs-7 section-desc">
      <div class="module-wrapper">
          <div class="col-xs-6">
            <img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_superior_heat_rejection.png">
            <span>Superior Heat Rejection</span>
          </div>
          <div class="col-xs-6">
            <img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_excellent_uv_rejection.png">
            <span>Excellent UV Rejection</span>
          </div>
          <div class="col-xs-6">
            <img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_wont_interfere_electronics.png">
            <span>Clear & Easy Connectivity</span>
          </div>
          <div class="col-xs-6">
            <img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_enhanced_style.png">
            <span>Custom Style</span>
          </div>
          <div class="col-xs-6">
            <img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_protect_interior_fading.png">
            <span>Help Reduce Fading</span>
          </div>
          <div class="col-xs-6">
            <img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_increase_privacy.png">
            <span>Help Increase Privacy</span>
          </div>
      </div>
    </div>
    <div class="col-xs-5">
      <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/tint2.jpg">
    </div>
  </div>
  
  <div class="row">
    <div class="imgGrid col-xs-12">
      <div class="row-imgGrid">
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/windowprotection/tint-style.jpg\');"';?>>
          <div class="imgGrid_desc">Enhanced Style and Appearance</div>
        </div>
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/windowprotection/tint-uvrays.jpg\');"';?>>
          <div class="imgGrid_desc">Block Dangerous UV Rays</div>
        </div>
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/windowprotection/tint-glare.jpg\');"';?>>
          <div class="imgGrid_desc">Reduce Heat and Distracting Glare</div>
        </div>
      </div>
      
    </div>
  </div>
  
  <?php $audioWindow = get_sub_field('window_audio');
  if( $audioWindow ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioWindow['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>