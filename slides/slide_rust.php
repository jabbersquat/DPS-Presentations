<?php
//
//
// Rust Protection
//
?> 
  

<section id="rust" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-snowroad.jpg">
  <h2>Rust Inhibitor</h2>
  <div class="row-main row">
    <div class="col-xs-6 section-desc">
      <div class="module-wrapper">
        <p>Rust Inhibitor Protection creates a transparent barrier that resists salt and water.</p>
      </div>
    </div>
    <div id="sound-videoembed" class="col-xs-6">
      <div class="embed-inner">
        <iframe src="https://www.youtube.com/embed/G1y-futmeZ8?rel=0&amp;controls=0&loop=1" frameborder="0" data-autoplay allowfullscreen></iframe>
      </div>
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
        <div class="col-xs-4">Surface Corrosion Protection</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">5/10 Years</div>
      </div>
      
      <!-- Row 2 -->
      <div class="table-reg">
        <div class="col-xs-4">Resists Salt & Water</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">5/10 Years</div>
      </div>
      
      <!-- Row 3 -->
      <div class="table-reg">
        <div class="col-xs-4">Bonds To Metal Surfaces</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">5/10 Years</div>
      </div>
      
      <!-- Row 4 -->
      <div class="table-reg">
        <div class="col-xs-4">Electronic Fogging Method</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">5/10 Years</div>
      </div>
      
      <!-- Row 5 -->
      <div class="table-reg">
        <div class="col-xs-4">Meets Military Specifications</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">5/10 Years</div>
      </div>
    </div>
  </div>
  
  <div class="fragment fade-in">
    <div class="overlayModule">
      <div class="row">
        <div class="imgGrid col-xs-12">
          
          <div class="row-imgGrid">
            <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/rust/rust1.jpg\');"';?>>
              <div class="imgGrid_desc">Corrosion Perforation</div>
            </div>
            <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/rust/rust2.jpg\');"';?>>
              <div class="imgGrid_desc">Rust Spot</div>
            </div>
            <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/rust/rust3.jpg\');"';?>>
              <div class="imgGrid_desc">Surface Corrosion</div>
            </div>
          </div>
          
        </div>	
      </div>
    </div>
  </div>
  
  <?php $audioRust = get_sub_field('rust_audio');
  if( $audioRust ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioRust['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>