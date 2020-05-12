<?php
//
//
// Excess Wear & Tear
//
?> 
  

<section id="wearTear" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg">
  <h2>Excess Wear and Tear Protection</h2>
  <div class="row-main row">
    <div class="col-xs-7 section-desc">
      <div class="module-wrapper">
        <p>Our proprietary formulated polymers form an invisible barrier protecting your interior from damage.</p>
      </div>
    </div>
    <div id="excessivewear-imgMain" class="col-xs-5">
      <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/excesswear/ExcessiveWear.png">
    </div>
  </div>
  <div class="row-withOverlay row">
    <div class="dps-table col-xs-12">
      <div class="table-hdr">
        <div class="col-xs-4">Protection Against</div>
        <div class="col-xs-4">Factory Coverage</div>
        <div class="col-xs-4">Additional Coverage</div>
      </div>
      
      <!-- Row 1 -->
      <div class="table-reg">
        <div class="col-xs-4">Food & Beverage Stains</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 2 -->
      <div class="table-reg">
        <div class="col-xs-4">Dye & Ink Transfer</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 3 -->
      <div class="table-reg">
        <div class="col-xs-4">Pet Stains</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 4 -->
      <div class="table-reg">
        <div class="col-xs-4">Loss of Gloss</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 5 -->
      <div class="table-reg">
        <div class="col-xs-4">Fading</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 6 -->
      <div class="table-reg">
        <div class="col-xs-4">Rips, Tears & Burns</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
    </div>
  </div>
  
  <div class="fragment fade-in">
    <div class="overlayModule">
      <div class="row-imgGrid">
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-fadingcracking.jpg\');"';?>>
          <div class="imgGrid_desc">Fading & Cracking</div>
        </div>
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-coffeespill.jpg\');"';?>>
          <div class="imgGrid_desc">Food & Beverage Stains</div>
        </div>
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-dyeinktransfer.jpg\');"';?>>
          <div class="imgGrid_desc">Dye / Ink Transfer</div>
        </div>
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-lossofgloss.jpg\');"';?>>
          <div class="imgGrid_desc">Loss of Gloss</div>
        </div>
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-petstain.jpg\');"';?>>
          <div class="imgGrid_desc">Pet Stains</div>
        </div>
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-ripstearsburns.jpg\');"';?>>
          <div class="imgGrid_desc">Rip, Tears & Burns</div>
        </div>	
      </div>
    </div>
  </div>
  
  <?php $audioWearTear = get_sub_field('weartear_audio');
  if( $audioWearTear ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioWearTear['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>