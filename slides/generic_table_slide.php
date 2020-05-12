<?php
//
//
// Generic Table Slide
//   

$tableSlide_header = get_sub_field('tableSlide_header');
?> 

<section data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg">
  <h2><?php echo $tableSlide_header; ?></h2>
  
  <?php
    if( have_rows('tableSlide_row') ): ?>
    
    <div class="row">
      <div class="dps-table col-xs-12">
        <div class="table-hdr">
          <div class="col-xs-4">Protection Against</div>
          <div class="col-xs-4">Factory Coverage</div>
          <div class="col-xs-4">Additional Coverage</div>
        </div>
    
        <?php while ( have_rows('tableSlide_row') ) : the_row();
          $protectAgainst = get_sub_field('tableSlide_protectAgainst');
          $factoryCoverage = get_sub_field('tableSlide_factoryCoverage');
          $additionalCoverage = get_sub_field('tableSlide_additionalCoverage');
        ?>
    
        <div class="table-reg">
          <div class="col-xs-4"><?php echo $protectAgainst; ?></div>
          <div class="col-xs-4"><?php echo $factoryCoverage; ?></div>
          <div class="col-xs-4"><?php echo $additionalCoverage; ?></div>
        </div>	
      
        <?php endwhile; ?>
    
      </div>
    </div>
    
  <?php endif; ?>
  
  <?php $audioGenericTable = get_sub_field('generic_table_audio');
  if( $audioGenericTable ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioGenericTable['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
  
</section>