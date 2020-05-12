<?php
//
//
// Warranty Information
//
?>
  

<section id="warranties" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-engine.jpg" data-state="warranty">
<?php if( have_rows('warranty_set') ):
  $ws = 1; $warrantySetNum = 'warrantySet_'.$ws; 
  
  while ( have_rows('warranty_set') ) : the_row();?>
  
  <section id="warranty-<?php echo $warrantySetNum; ?>">
    <h2><?php the_sub_field('new_or_used'); ?> Car Warranties</h2>
    <div class="row">
      
      <?php
          if( have_rows('warranty_bars') ):
          echo '<div class="col-xs-10 col-xs-offset-1">';
            
            while ( have_rows('warranty_bars') ) : the_row();
              $warrantybar_title = get_sub_field('warrantybar_title');
              $warrantybar_left = get_sub_field('warrantybar_left');
              $warrantybar_right = get_sub_field('warrantybar_right');
              $warrantybar_info = get_sub_field('warrantybar__info');
              $htmlTitle = preg_replace('/\W+/','',strtolower(strip_tags($warrantybar_title)));
              $titleId = uniqid($htmlTitle, true);
            ?>
            
              <div class="warranty-wrapper">
                <h3 
                  id="<?php echo $titleId; ?>" 
                  class="warranty-title<?php if($warrantybar_info){ echo ' hasAfter'; } ?>"
                >
                <?php echo $warrantybar_title; ?>
                </h3>
                <div class="warranty-bar">
                  <div class="warranty-progress"></div>
                  <div class="warranty-terms"><?php echo $warrantybar_left; ?></div>
                  <div class="warranty-avail"><?php echo $warrantybar_right; ?></div>
                </div>
              </div>		
              
              <?php if($warrantybar_info) { ?>
              <div id="warranty-overlay-<?php echo $titleId; ?>" class="overlayModule warranty-overlay">
                <?php echo $warrantybar_info; ?>
                <div class="warrantyInfo_close">X</div>
              </div>
              <?php } ?>
              
            <?php endwhile; ?>
          
          </div>
        
        <?php endif; ?>
        
    </div>
    
  </section>
  
  <?php endwhile; ?>

<?php $ws += 1; ?>

<?php endif; ?>

<?php $audioWarranty = get_sub_field('warranty_audio');
if( $audioWarranty ): ?>
  <audio id="warrantyClip" class="hiddenAudio">
    <source src="<?php echo $audioWarranty['url']; ?>" type="audio/mpeg">
  </audio>
<?php endif; ?>	
    
</section>