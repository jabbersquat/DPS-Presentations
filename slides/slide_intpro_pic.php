<?php
//
//
// Interior Protection with Pictures
//
?> 
  

<section id="interiorprotection_pictures" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg" data-state="intpropic">
  
  <h2>Interior Protection</h2>
  
  <div class="row">
    <div class="imgGrid col-xs-12">
      
      <div class="row-imgGrid">
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/interiorprotection/int-kid.jpg\');"';?>>
          <div class="imgGrid_desc">Children</div>
        </div>
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/interiorprotection/int-tear.jpg\');"';?>>
          <div class="imgGrid_desc">Rip, Tears & Burns</div>
        </div>
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-coffeespill.jpg\');"';?>>
          <div class="imgGrid_desc">Food & Beverage Stains</div>
        </div>
      </div>
      
      <div class="row-imgGrid">
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/interiorprotection/int-stain.jpg\');"';?>>
          <div class="imgGrid_desc">Stains</div>
        </div>
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/interiorprotection/int-pets.jpg\');"';?>>
          <div class="imgGrid_desc">Pets</div>
        </div>
        <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/interiorprotection/int-holes.jpg\');"';?>>
          <div class="imgGrid_desc">Holes</div>
        </div>
      </div>
      
    </div>
  </div>
  <div class="row">
    <div class="extraCopy col-xs-10 col-xs-offset-1">
      Stains and spills can be a hassle to remove, <span>and your factory warranties don’t protect against them.</span>
    </div>
  </div>
  
  
  <?php $audioIntProPic = get_sub_field('intpro_pic_audio');
  if( $audioIntProPic ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioIntProPic['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>