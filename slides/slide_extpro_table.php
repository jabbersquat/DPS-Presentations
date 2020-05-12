<?php
//
//
// Exterior Protection with Table
//
?> 
  

<section id="exteriorprotection_table" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg" data-state="extprotable">
  
  <h2>Exterior Protection</h2>
  
  
  <div class="row">
    <div class="dps-table col-xs-12">
      <div class="table-hdr">
        <div class="col-xs-4">Protection Against</div>
        <div class="col-xs-4">Factory Coverage</div>
        <div class="col-xs-4">Additional Coverage</div>
      </div>
      
      <!-- Row 1 -->
      <div class="table-reg">
        <div class="col-xs-4">Weather-induced Fading</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 2 -->
      <div class="table-reg">
        <div class="col-xs-4">Loss of Gloss</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 3 -->
      <div class="table-reg">
        <div class="col-xs-4">Hard Water Etching</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 4 -->
      <div class="table-reg">
        <div class="col-xs-4">Industrial Fallout</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 5 -->
      <div class="table-reg">
        <div class="col-xs-4">Bird Waste</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 6 -->
      <div class="table-reg">
        <div class="col-xs-4">Acid Rain</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 7 -->
      <div class="table-reg">
        <div class="col-xs-4">Tree Sap</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 8 -->
      <div class="table-reg">
        <div class="col-xs-4">Oxidation</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 9 -->
      <div class="table-reg">
        <div class="col-xs-4">Insects</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 10 -->
      <div class="table-reg">
        <div class="col-xs-4">Road Salt</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 11 -->
      <div class="table-reg">
        <div class="col-xs-4">De-Icing Agents</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 12 -->
      <div class="table-reg">
        <div class="col-xs-4">Sand Abrasion</div>
        <div class="col-xs-4">Not Covered</div>
        <div class="col-xs-4">7 Years & Renewable</div>
      </div>
      
      <!-- Row 13 -->
      <div class="table-reg">
        <div class="col-xs-4">Accidental Paint Over Spray</div>
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
            <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-acidrain.jpg\');"';?>>
              <div class="imgGrid_desc">Acid Rain</div>
            </div>
            <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-birddroppings.jpg\');"';?>>
              <div class="imgGrid_desc">Bird Droppings</div>
            </div>
            <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-fading.jpg\');"';?>>
              <div class="imgGrid_desc">Fading</div>
            </div>
          </div>
          
          <div class="row-imgGrid">
            <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-etching.jpg\');"';?>>
              <div class="imgGrid_desc">Hard Water Etching</div>
            </div>
            <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-rust.jpg\');"';?>>
              <div class="imgGrid_desc">Surface Rust</div>
            </div>
            <div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-treesap.jpg\');"';?>>
              <div class="imgGrid_desc">Tree Sap</div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  
  <?php $audioExtProTable = get_sub_field('extpro_table_audio');
  if( $audioExtProTable ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioExtProTable['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>