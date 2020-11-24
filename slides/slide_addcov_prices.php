<?php 
//
//
// Additional Coverage Packages
// Single Column (2020)
//
?>
  

<section id="addcov_prices_additcoverage" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-brakelights.jpg" data-state="addcov_prices">
  <h2>Additional Coverage Package</h2>
  
  <div class="row">
    <div class="col-xs-12">
      
      <table id="addcov_prices-table" class="table table-dps table-striped table-bordered discount-<?php echo get_sub_field('addcov_prices_discount_type'); ?>">						
      
      <?php 
        $coverageColumns = get_sub_field('addcov_columns'); 
        $count_columns = count(get_sub_field('addcov_columns'));
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
            echo '<td style="width: '.$width_colOther.'%;">'.$cov['addcov_prices_column_name'].'</td>';
          } ?>
        </tr>
      </thead>
      
      <?php 
      if( have_rows('addcov_coverages') ):
        $total_price_col1 = 0;
        $total_price_col2 = 0;
        $total_price_col3 = 0;
        $total_price_col4 = 0;
        
        
        while ( have_rows('addcov_coverages') ) : the_row();

          $fmt = numfmt_create( 'en_US', NumberFormatter::CURRENCY );
          $fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 2);
          $coverage = get_sub_field('addcov_prices_coverage_name');
          $coverage_price_col1 = get_sub_field('addcov_prices_coverage_col1');
          $coverage_price_col2 = get_sub_field('addcov_prices_coverage_col2');
          $coverage_price_col3 = get_sub_field('addcov_prices_coverage_col3');
          $coverage_price_col4 = get_sub_field('addcov_prices_coverage_col4');
        ?>
          
        <tr>
          <td style="width: <?php echo $width_col1; ?>%;"><?php echo $coverage; ?></td>
          
          <?php 
            $n = 0;
            foreach ($coverageColumns as $cov) {
              if($coverageColumns[$n]) : 
                $n += 1; 
                $colNum = 'col'.$n; 
                $priceColNum = 'total_price_col'.$n; 
                $colPrice = 'coverage_price_col'.$n;

                if( is_numeric( $$colPrice ) ) {
                  $colPriceText = numfmt_format_currency($fmt, $$colPrice, 'USD');
                  $$priceColNum += $$colPrice;
                } else {
                  $colPriceText = '-';
                }
                ?>
                <td 
                  style="width: <?php echo $width_colOther; ?>%;text-align:center;" 
                  data-price="<?php echo $colPrice; ?>">
                  <?php echo $colPriceText; ?>
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
              $priceColNum2 = 'total_price_col'.$n2; 
              $priceColNum2Number = $$priceColNum2;
              $priceColNum2Text = numfmt_format_currency($fmt, $priceColNum2Number, 'USD');
              ?>
              <td style="width: <?php echo $width_colOther; ?>%;">
                <span 
                  id="total_price_col<?php echo $n2; ?>-beforeDiscount" 
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
    $addcov_prices_discountType = get_sub_field('addcov_prices_discount_type');
    $addcov_prices_single = get_sub_field('addcov_prices_single_discount_amount');
    if ($addcov_prices_discountType === 'single') {
      $single_amt_prices = $addcov_prices_single;
    } else {
      $single_amt_prices = '0';
    } 
  ?>
  <div id="addcov_prices_row-discount" class="" data-discount="<?php echo $single_amt_prices;  ?>">
    <div style="width: <?php echo $width_col1; ?>%;">DISCOUNT</div>
    <?php $n3 = 0;
    foreach ($coverageColumns as $cov) {
      if($coverageColumns[$n3]) : 
        $n3 += 1; ?>
        <div style="width: <?php echo $width_colOther; ?>%;text-align:center;"><span id="total_price_col<?php echo $n3; ?>_discount"></span></div>
      <?php endif; 
    } ?>
  </div>
  <div id="addcov_prices_row-todaysprice" class="">
    <div style="width: <?php echo $width_col1; ?>%;">TODAY'S PRICE</div>
    <?php $n4 = 0;
    foreach ($coverageColumns as $cov) {
      if($coverageColumns[$n4]) : 
        $n4 += 1; ?>
        <div style="width: <?php echo $width_colOther; ?>%;text-align:center;"><span id="total_price_col<?php echo $n4; ?>_todaysprice"></span></div>
      <?php endif; 
    } ?>
  </div>
  <?php if( have_rows('addcov_prices_discounts') ): ?>
  
    <div id="addcov_prices_buttons" class="row">

    <?php while ( have_rows('addcov_prices_discounts') ) : the_row();

      $discountSlug = get_sub_field('addcov_prices_discount_name');
      $discountCustom = get_sub_field('addcov_prices_custom');
      $discountAmount = get_sub_field('addcov_prices_discount_price');

    ?>
  

    <button id="discount-<?php echo $discountSlug['value'] ?>" type="button" class="btn btn-primary" data-discount="<?php echo $discountAmount ?>"><?php
        if ($discountSlug['value'] === 'custom') {
          echo $discountCustom;
        } elseif($discountSlug['value'] === 'veterans') { 
          get_template_part('slides/svg/veterans');

        } elseif($discountSlug['value'] === 'costcosams') { 
          get_template_part('slides/svg/costcosams');

        } elseif($discountSlug['value'] === 'aarp') { 
          get_template_part('slides/svg/aarp');

        } elseif($discountSlug['value'] === 'aaa') { 
          get_template_part('slides/svg/aaa');

        } elseif($discountSlug['value'] === 'firstresponder') { 
          get_template_part('slides/svg/firstresponders');
        } ?></button>

    <?php endwhile; ?>

  </div>

  <?php endif; ?>
  
  <?php $audioAddCov = get_sub_field('addcov_prices_audio');
  if( $audioAddCov ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioAddCov['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>