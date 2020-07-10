<?php 
//
//
// Additional Coverage Packages
//
?>
  

<section id="additcoverage" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-brakelights.jpg" data-state="addcov">
  <h2>Additional Coverage Package</h2>
  
  <div class="row">
    <div class="col-xs-12">
      
      <svg id="svgCheckX" viewBox="0 0 100 100" style="display:none;">
        <symbol id="addcov-check">
          <path class="check-path" fill="none" stroke="green" stroke-width="16"  d="M95,21L34,83L6,55"/>
        </symbol>
        <symbol id="addcov-ex">
          <path id="x1" fill="none" stroke="#fff" stroke-width="16" d="M62,94L6,38"/>
          <path id="x2" fill="none" stroke="#fff" stroke-width="16" d="M6,94l56-56"/>
        </symbol>
      </svg>
      
      <table id="addcov-table" class="table table-dps table-striped table-bordered">						
      
      <?php 
        $coverageColumns = get_sub_field('discount_columns'); 
        $count_columns = count(get_sub_field('discount_columns'));
        if($count_columns === 4) {
          $width_col1 = 33.333333333;
          $width_colOther = 16.7777777777;
        } elseif ($count_columns === 3) {
          $width_col1 = 50;
          $width_colOther = 16.7777777777;
        } elseif ($count_columns === 2) {
          $width_col1 = 50;
          $width_colOther = 25;
        } else {
          $width_col1 = 66.7777777777;
          $width_colOther = 33.333333333;
        }
        
      ?>
      <!-- Row Header -->
      <thead>
        <tr>
          <td style="width: <?php echo $width_col1; ?>%;">Coverage</td>
          <?php foreach ($coverageColumns as $cov) {
            echo '<td style="width: '.$width_colOther.'%;">'.$cov['discount_column_name'].'</td>';
          } ?>
        
        </tr>
      </thead>
      
      <?php
        
      if( have_rows('coverages') ):
        $price_col1 = 0;
        $price_col2 = 0;
        $price_col3 = 0;
        $price_col4 = 0;
        
        
        while ( have_rows('coverages') ) : the_row();

          $fmt1 = numfmt_create( 'en_US', NumberFormatter::CURRENCY );
          $fmt1->setAttribute(NumberFormatter::FRACTION_DIGITS, 2);
          $coverage = get_sub_field('coverage');
          $checked = get_sub_field('coverage_best');
          $price = get_sub_field('coverage_price');
        ?>
          
        <tr>
          <td style="width: <?php echo $width_col1; ?>%;"><?php echo $coverage; ?></td>
          
          <?php 
            $n = 0;
            foreach ($coverageColumns as $cov) {
              if($coverageColumns[$n]) : 
                $n += 1;
                $colNum = "col".$n; 
                $priceColNum = 'price_col'.$n;
                
                ?>
                <td style="width: <?php echo $width_colOther; ?>%;">
                  <?php 
                    if( is_array($checked) && in_array($colNum, $checked) ){ 
                    echo '<div class="addcov-CheckX"><svg viewBox="0 0 100 100"><use xlink:href="#addcov-check" x="0" y="0" /></svg></div>'; 
                    $$priceColNum += $price;
                  } else { echo '<div class="addcov-CheckX"><svg viewBox="0 0 100 100"><use xlink:href="#addcov-ex" x="0" y="0" /></svg></div>'; } ?>
                </td>
              <?php endif; ?>
            <?php } ?>
        </tr>
        
        <?php	
    
        endwhile;
      
      endif;
      
      ?>
      
      
      <!-- Row Footer -->
      <tfoot>
        <tr>
          <td style="width: <?php echo $width_col1; ?>%;">Total Price:</td>
          <?php $n2 = 0;
          foreach ($coverageColumns as $cov) {
            if($coverageColumns[$n2]) : 
              $n2 += 1;
              $priceColNum2 = 'price_col'.$n2;
              $priceColNum2Number = $$priceColNum2;
              $priceColNum2Text = numfmt_format_currency($fmt1, $priceColNum2Number, 'USD');
              ?>
              <td style="width: <?php echo $width_colOther; ?>%;">
                <span 
                  id="price_col<?php echo $n2; ?>-beforeDiscount"
                  data-price="<?php echo $priceColNum2Number ?>">
                  <?php echo $priceColNum2Text; ?>
                </span>
              </td>
            <?php endif; 
          } ?>
        </tr>
      </tfoot>
      
      </table>
      
    </div>
  </div>
  
  
  <?php 
    $discountType = get_sub_field('discount_type');
    $discountChoosen = get_sub_field('discount_choose');
    $veteran = get_sub_field('discount_veterans');
    $costcosams = get_sub_field('discount_costcosams');
    $aarp = get_sub_field('discount_aarp');
    $aaa = get_sub_field('discount_aaa');
    $firstresponder = get_sub_field('discount_firstresponder');
    $single = get_sub_field('discount_single');
  ?>
  <script type="text/javascript">
    var disc_single = "";
    <?php if($discountType === 'single') { ?>
      disc_single = "<?php echo $single ?>";
    <?php } ?>
  </script>
  <div id="row-discount" class="">
    <div style="width: <?php echo $width_col1; ?>%;">DISCOUNT</div>
    <?php $n3 = 0;
    foreach ($coverageColumns as $cov) {
      if($coverageColumns[$n3]) : 
        $n3 += 1; ?>
        <div style="width: <?php echo $width_colOther; ?>%;"><span id="price_col<?php echo $n3; ?>_discount"></span></div>
      <?php endif; 
    } ?>
  </div>
  <div id="row-todaysprice" class="">
    <div style="width: <?php echo $width_col1; ?>%;">TODAY'S PRICE</div>
    <?php $n4 = 0;
    foreach ($coverageColumns as $cov) {
      if($coverageColumns[$n4]) : 
        $n4 += 1; ?>
        <div style="width: <?php echo $width_colOther; ?>%;"><span id="price_col<?php echo $n4; ?>_todaysprice"></span></div>
      <?php endif; 
    } ?>
  </div>
  <?php if( $discountChoosen ) { ?>
  <div id="addcov-buttons" class="row">
    <?php if( $discountChoosen && in_array('veterans', $discountChoosen) ) { ?>
      <button id="discount-veteran" type="button" class="btn btn-primary" data-discount="<?php echo $veteran ?>">
        <?php get_template_part('slides/svg/veterans'); ?>
      </button>
    <?php }
      if( $discountChoosen && in_array('costcosams', $discountChoosen) ) { ?>
      <button id="discount-costcosams" type="button" class="btn btn-primary" data-discount="<?php echo $costcosams ?>">
        <?php get_template_part('slides/svg/costcosams'); ?>
      </button>
    <?php }
      if( $discountChoosen && in_array('aarp', $discountChoosen) ) { ?>
      <button id="discount-aarp" type="button" class="btn btn-primary" data-discount="<?php echo $aarp ?>">
        <?php get_template_part('slides/svg/aarp'); ?>
      </button>
    <?php }
      if( $discountChoosen && in_array('aaa', $discountChoosen) ) { ?>
      <button id="discount-aaa" type="button" class="btn btn-primary" data-discount="<?php echo $aaa ?>">
        <?php get_template_part('slides/svg/aaa'); ?>
      </button>
    <?php }
      if( $discountChoosen && in_array('firstresponder', $discountChoosen) ) { ?>
      <button id="discount-firstresponder" type="button" class="btn btn-primary" data-discount="<?php echo $firstresponder ?>">
        <?php get_template_part('slides/svg/firstresponders'); ?>
      </button>
    <?php } ?>
  </div>
  <?php } ?>
  
  <?php $audioAddCov = get_sub_field('addcov_audio');
  if( $audioAddCov ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioAddCov['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>