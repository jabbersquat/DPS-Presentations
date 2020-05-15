<?php
//
//
// Sound Inhibitor
//
?> 
  

<section id="soundinibitor" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg" data-state="sound">
  
  <h2>Sound Inhibitor</h2>
  <div class="row">
    <div class="col-xs-6 section-desc">
      <div class="module-wrapper">
        <p>Sound Protection creates a permanent underbody barrier that resists salt and water protecting against peeling, chipping and cracking due to drying out.</p>
      </div>
    </div>
    <div id="sound-videoembed" class="col-xs-6">
      <div class="embed-inner">
        <iframe src="https://www.youtube.com/embed/23bhAyYymOc?rel=0&amp;controls=0&loop=1" frameborder="0" data-autoplay allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <section>
    <div class="row">
      <div class="dps-table col-xs-12">
        <div class="table-hdr">
          <div class="col-xs-4">Protection Against</div>
          <div class="col-xs-4">Factory Coverage</div>
          <div class="col-xs-4">Additional Coverage</div>
        </div>
        
        <!-- Row 1 -->
        <div class="table-reg">
          <div class="col-xs-4">Professional Formula</div>
          <div class="col-xs-4">Not Covered</div>
          <div class="col-xs-4">7 Years & Renewable</div>
        </div>
        
        <!-- Row 2 -->
        <div class="table-reg">
          <div class="col-xs-4">Meets Military Specifications</div>
          <div class="col-xs-4">Not Covered</div>
          <div class="col-xs-4">7 Years & Renewable</div>
        </div>
        
        <!-- Row 3 -->
        <div class="table-reg">
          <div class="col-xs-4">Thermal Insulation</div>
          <div class="col-xs-4">Not Covered</div>
          <div class="col-xs-4">7 Years & Renewable</div>
        </div>
        
        <!-- Row 4 -->
        <div class="table-reg">
          <div class="col-xs-4">Will Not Crack or Peel</div>
          <div class="col-xs-4">Not Covered</div>
          <div class="col-xs-4">7 Years & Renewable</div>
        </div>
        
        <!-- Row 5 -->
        <div class="table-reg">
          <div class="col-xs-4">Will Not Flake</div>
          <div class="col-xs-4">Not Covered</div>
          <div class="col-xs-4">7 Years & Renewable</div>
        </div>
        
        <!-- Row 6 -->
        <div class="table-reg">
          <div class="col-xs-4">Black Protective Coating</div>
          <div class="col-xs-4">Not Covered</div>
          <div class="col-xs-4">7 Years & Renewable</div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="row">
      <div class="imgGrid col-xs-12">
        
        <div class="row-imgGrid">
          <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/sound/sound-underbody.jpg\');"';?>>
            <div class="imgGrid_desc">Vehicle Underbody</div>
          </div>
          <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/sound/sound-brakelines.jpg\');"';?>>
            <div class="imgGrid_desc">Vehicle Brake Lines</div>
          </div>
          <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/sound/sound-suspensioncomponents.jpg\');"';?>>
            <div class="imgGrid_desc">Vehicle Suspension Components</div>
          </div>
        </div>
                          
      </div>
    </div>
  </section>
  
  <?php $audioSound = get_sub_field('sound_audio');
  if( $audioSound ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioSound['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>