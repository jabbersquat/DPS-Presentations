<?php 
//
//
// Accessory Facts
//
?>
  

<section id="accFacts" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-brakelights.jpg">
  <h2>Accessory Facts</h2>
  
  <div class="row">
    <div class="col-xs-8 col-xs-offset-2">

      <div class="module-wrapper">
        <ul>
          <li>9 out of 10 consumers purchase accessories for their vehicles</li>
          <li>Most consumers prefer to purchase accessories from a new car dealership so they can add the cost to their payments</li>
        </ul>
      </div>
      
    </div>
  </div>
  
  <?php $audioAccFacts = get_sub_field('accfacts_audio');
  if( $audioAccFacts ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioAccFacts['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>