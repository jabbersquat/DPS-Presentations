<?php
//
//
// Dealer Benefits
//
?>   

  <section id="dealerbenefits" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-rears.jpg">
    <h2>Dealer Benefits</h2>
    
    
    <?php
      $benefitsText = get_sub_field('dealerbene_text');
      if ($benefitsText) {
        echo '<div id="benes-subhead" class="module-wrapper">'.$benefitsText.'</div>';
      }
    ?>
    
    <?php
      if( have_rows('dealerbene_benefits') ): ?>
      
      <ul id="benefitsUL">
      
        <?php while ( have_rows('dealerbene_benefits') ) : the_row();
          $bene = get_sub_field('dealerbene_benefit');
          $bene_icon = get_sub_field('dealerbene_icon');
        ?>
    
        <li class="col-benefit">
          <img class="bene_svg" src="<?php echo $bene_icon['url']; ?>">
          <?php echo $bene; ?>
        </li>	
      
        <?php endwhile; ?>
      
      </ul>
      
    <?php endif; ?>
    
    <?php $audioBene = get_sub_field('dealerbene_audio');
    if( $audioBene ): ?>
      <audio class="hiddenAudio">
        <source src="<?php echo $audioBene['url']; ?>" type="audio/mpeg">
      </audio>
    <?php endif; ?>
  </section>
  
  
  <div class="row">
    <?php if( have_rows('dealerinfo_hours_sales') ): ?>
    
      <div class="col-xs-6">
        <div id="saleshours" class="module-wrapper">
          <h3>Sales Hours</h3>
          <ul class="list-dayshours">
            <?php while ( have_rows('dealerinfo_hours_sales') ) : the_row(); 
              $salesday = get_sub_field('sales_day');
              $saleshours = get_sub_field('sales_hours');
              echo '<li>'.$salesday.'<span>'.$saleshours.'</span></li>';
            endwhile; ?>
          </ul>
        </div>
      </div>
      
    <?php endif; ?>
    <?php if( have_rows('dealerinfo_hours_service') ): 
      
      $servicehours = get_sub_field('dealerinfo_hours_service');
    ?>
      <div class="col-xs-6">
        <div id="servicehours" class="module-wrapper">
          <h3>Service Hours</h3>
          <ul class="list-dayshours">
            <?php while ( have_rows('dealerinfo_hours_service') ) : the_row(); 
              $serviceday = get_sub_field('service_day');
              $servicehours = get_sub_field('service_hours');
              echo '<li>'.$serviceday.'<span>'.$servicehours.'</span></li>';
            endwhile; ?>
          </ul>
        </div>
      </div>
  <?php endif; ?>
  
  </div>
  
  <?php $audioDealerInfo = get_sub_field('dealerinfo_audio');
  if( $audioDealerInfo ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioDealerInfo['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>