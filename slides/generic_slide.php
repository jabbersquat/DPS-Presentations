<?php
//
//
// Generic Slide
//

$genericSlide_header = get_sub_field('genericSlide_header');
$genericSlide_desc = get_sub_field('genericSlide_desc');
$generic_featuredChoice = get_sub_field('generic_featured');
$genericSlide_img = get_sub_field('genericSlide_img');
$genericSlide_vid = get_sub_field('genericSlide_vid');
?> 

<section data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg">
<h2><?php echo $genericSlide_header; ?></h2>

<?php if ($genericSlide_desc): ?>

  <div class="row-main row">
    <?php if ($generic_featuredChoice == 'image'): ?>
      <div class="col-xs-7 section-desc">
        <div class="module-wrapper">
          <?php echo $genericSlide_desc; ?>
        </div>
      </div>
    <div id="excessivewear-imgMain" class="col-xs-5">
      <img class="img-responsive" src="<?php echo $genericSlide_img; ?>">
    </div>
    
    <?php elseif($generic_featuredChoice == 'video'): ?>
        
      <div class="col-xs-6 section-desc">
        <div class="module-wrapper">
          <?php echo $genericSlide_desc; ?>
        </div>
      </div>
      <div id="sound-videoembed" class="col-xs-6">
        <div class="embed-inner">
          <?php 
            // use preg_match to find iframe src
            preg_match('/src="(.+?)"/', $genericSlide_vid, $matches);
            $src = $matches[1];
            
            
            // add extra params to iframe src
            $params = array(
                'controls'    => 0,
                'rel'        => 0,
                'autoplay'    => 1,
                'loop'    => 1,
            );
            $new_src = add_query_arg($params, $src);
            $genericSlide_vid = str_replace($src, $new_src, $genericSlide_vid);
            
            // add extra attributes to iframe html
            $attributes = 'frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>';
            
            $genericSlide_vid = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $genericSlide_vid);
            
            
            echo $genericSlide_vid; 
          ?>
        </div>
      </div>
    
    <?php else: ?>
      <div class="row-main row">
        <div class="col-xs-12 section-desc">
          <div class="module-wrapper">
            <?php echo $genericSlide_desc; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>	
  </div>
<?php endif; ?>		

<?php
  if( have_rows('genericSlide_tablerow') ): ?>
  
  <div class="row-withOverlay row">
    <div class="dps-table col-xs-12">
      <div class="table-hdr">
        <div class="col-xs-4">Protection Against</div>
        <div class="col-xs-4">Factory Coverage</div>
        <div class="col-xs-4">Additional Coverage</div>
      </div>
  
      <?php while ( have_rows('genericSlide_tablerow') ) : the_row();
        $protectAgainst = get_sub_field('genericSlide_protectAgainst');
        $factoryCoverage = get_sub_field('genericSlide_factoryCoverage');
        $additionalCoverage = get_sub_field('genericSlide_additionalCoverage');
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

<?php
  if( have_rows('genericSlide_imagesMore') ): ?>
  <div class="fragment fade-in">
    <div class="overlayModule">
      <div class="row-imgGrid">
        
        <?php while ( have_rows('genericSlide_imagesMore') ) : the_row(); 
          $genericSlide_imgMore = get_sub_field('genericslide_imgMore');
          $genericSlide_imgMoreDesc = get_sub_field('genericSlide_imgMoreDesc');
        ?>
          
          <div class="col-xs-4" <?php echo 'style="background-image: url(\''.$genericSlide_imgMore["url"].');"';?>>
            <div class="imgGrid_desc"><?php echo $genericSlide_imgMoreDesc; ?></div>
          </div>
          
        <?php endwhile; ?>
        
      </div>	
    </div>
  </div>
<?php endif; ?>	


<?php $audioGeneric = get_sub_field('generic_audio');
if( $audioGeneric ): ?>
  <audio class="hiddenAudio">
    <source src="<?php echo $audioGeneric['url']; ?>" type="audio/mpeg">
  </audio>
<?php endif; ?>
</section>