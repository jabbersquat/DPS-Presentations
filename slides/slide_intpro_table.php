<?php
//
//
// Interior Protection with Table
//
?> 
  

<section id="interiorprotection_table" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg" data-state="intprotable">
  
  <h2>Interior Protection</h2>
  

  <div class="row">
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
        <div class="col-xs-4">Odors from Mold and Mildew</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 3 -->
      <div class="table-reg">
        <div class="col-xs-4">Oil-based Stains</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 4 -->
      <div class="table-reg">
        <div class="col-xs-4">Fading</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 5 -->
      <div class="table-reg">
        <div class="col-xs-4">Chewing Gum</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 6 -->
      <div class="table-reg">
        <div class="col-xs-4">Inks & Dyes</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 7 -->
      <div class="table-reg">
        <div class="col-xs-4">Lipstick & Makeup</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 8 -->
      <div class="table-reg">
        <div class="col-xs-4">Crayons</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 9 -->
      <div class="table-reg">
        <div class="col-xs-4">Urine & Vomit</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 10 -->
      <div class="table-reg">
        <div class="col-xs-4">Blood</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 11 -->
      <div class="table-reg">
        <div class="col-xs-4">Pet Stains</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 12 -->
      <div class="table-reg">
        <div class="col-xs-4">Loose Seam Stitching</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 13 -->
      <div class="table-reg">
        <div class="col-xs-4">Punctures or Tears</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
    </div>
  </div>
  <div class="fragment fade-in">
    <div class="overlayModule">
      <div class="row">
        <div class="imgGrid col-xs-12">
          
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
          </div>
          
          <div class="row-imgGrid">
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
    </div>
  </div>
  
  <?php $audioIntProTable = get_sub_field('intpro_table_audio');
  if( $audioIntProTable ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioIntProTable['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>