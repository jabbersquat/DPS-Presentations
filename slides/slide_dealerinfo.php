<?php
//
//
// Dealer Information
//

?>  

<section id="dealerinfo" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-customers.jpg">
    
  <h2 class="lightBG">Dealer Information</h2>
  
  <div class="row">
    <div class="col-xs-6">
      <?php $dealerWebImg = get_sub_field('dealerinfo_website_img');
        if( !empty($dealerWebImg) ): ?>
        <div class="websiteImage">
          <div class="websiteImageActual" <?php echo 'style="background-image: url(\''.$dealerWebImg['url'].');"';?>></div>
          <img class="ipad" src="<?php echo get_template_directory_uri(); ?>/img/dealerinfo/ipad.png">
        </div>
      <?php endif; ?>
      
    </div>
    <div class="col-xs-6">
    <?php
	    $dealerInfoBtns = [];      
      
      if( have_rows('dealerinfo_custombtn') ) {
	      
	      while( have_rows('dealerinfo_custombtn') ) : the_row();

        	$class = 'dealerinfo_custombtn_'.get_sub_field('dealerinfo_custombtn_color');
        	$buttonDetails = (object) [
			      'class' => $class,
	          'label' => get_sub_field('dealerinfo_custombtn_label'),
	          'url' => get_sub_field('dealerinfo_custombtn_url'),
	        ];
	        $dealerInfoBtns[] = $buttonDetails;

				endwhile;
				
      } else {
	      $service = get_sub_field('dealerinfo_scheduleservice');
	      if($service){
		      $buttonDetails = (object) [ 'class' => 'service', 'label' => 'Schedule Service', 'url' => $service, ];
	        $dealerInfoBtns[] = $buttonDetails;
	      }
	      $coupons = get_sub_field('dealerinfo_servicecoupons');
	      if($coupons){
		      $buttonDetails = (object) [ 'class' => 'coupons', 'label' => 'Service Coupons', 'url' => $coupons, ];
	        $dealerInfoBtns[] = $buttonDetails;
	      }
	      $browse = get_sub_field('dealerinfo_browseinventory');
	      if($coupons){
		      $buttonDetails = (object) [ 'class' => 'browse', 'label' => 'Browse Inventory', 'url' => $browse, ];
	        $dealerInfoBtns[] = $buttonDetails;
	      }
      }

      if( $dealerInfoBtns ): ?>
      <ul class="dealerinfo-buttons"> 
	      <?php foreach ($dealerInfoBtns as $btn) { ?>
	        <li><a class="btn btn-lg <?php echo $btn->class; ?>" href="<?php echo $btn->url; ?>" target="_blank"><?php echo $btn->label; ?></a></li>
        <?php } ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
  
  
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