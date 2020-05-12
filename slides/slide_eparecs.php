<?php
//
//
// EPA Recommends
//
?> 


<section id="eparecs" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-epa.jpg">
  <h2 class="epa-logo-h2"><img src="<?php echo get_template_directory_uri(); ?>/img/epa/epa-logo.svg"></h2>
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1">

      <div class="module-wrapper">
        <h3>The EPA recommends the use of protective coatings to protect your vehicle’s finish.</h3>
        <p>“These steps include frequent washing followed by hand drying, covering the vehicle during precipitation events and use of one of the protective coatings currently on the market that claim to protect the original finish."</p>
        <p>“The reported damage typically occurs on horizontal surfaces and appears as irregularly shaped, permanently etched areas.”</p>
        <p>“..(e.g. acid rain), decaying insects, bird droppings, pollen, and tree sap.”</p>
        <p>“Usually the damage is permanent; once it has occurred, the only solution is to repaint.”</p>
      </div>
      
    </div>
  </div>
  
  <?php $audioEPARec = get_sub_field('eparec_audio');
  if( $audioEPARec ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioEPARec['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>