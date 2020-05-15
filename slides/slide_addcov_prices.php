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
      
      <table id="addcov_prices-table" class="table table-dps table-striped table-bordered">						
      
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
                $n += 1; ?>
                <td style="width: <?php echo $width_colOther; ?>%;text-align:center;">
                  <?php 
                    $colNum = "col".$n; 
                    $priceColNum = 'total_price_col'.$n; 
                    $colPrice = 'coverage_price_col'.$n;
                    if( is_numeric( $$colPrice ) ) {
                      echo $$colPrice; 
                      $$priceColNum += $$colPrice;
                    } else {
                      echo '-';
                    }
                    
                  ?>
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
              $priceColNum2 = 'total_price_col'.$n2; ?>
              <td style="width: <?php echo $width_colOther; ?>%;">$<span id="total_price_col<?php echo $n2; ?>-beforeDiscount"><?php echo $$priceColNum2; ?></span></td>
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
  ?>
  <script type="text/javascript">
    var addcov_prices_disc_single = "";
    <?php if($addcov_prices_discountType === 'single') { ?>
      addcov_prices_disc_single = "<?php echo $addcov_prices_single ?>";
    <?php } ?>
  </script>
  <div id="addcov_prices_row-discount" class="">
    <div style="width: <?php echo $width_col1; ?>%;">DISCOUNT</div>
    <?php $n3 = 0;
    foreach ($coverageColumns as $cov) {
      if($coverageColumns[$n3]) : 
        $n3 += 1; ?>
        <div style="width: <?php echo $width_colOther; ?>%;text-align:center;">$<span id="total_price_col<?php echo $n3; ?>_discount"></span></div>
      <?php endif; 
    } ?>
  </div>
  <div id="addcov_prices_row-todaysprice" class="">
    <div style="width: <?php echo $width_col1; ?>%;">TODAY'S PRICE</div>
    <?php $n4 = 0;
    foreach ($coverageColumns as $cov) {
      if($coverageColumns[$n4]) : 
        $n4 += 1; ?>
        <div style="width: <?php echo $width_colOther; ?>%;text-align:center;">$<span id="total_price_col<?php echo $n4; ?>_todaysprice"></span></div>
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
  

    <button id="discount-<?php echo $discountSlug['value'] ?>" type="button" class="btn btn-primary" data-discount="<?php echo $discountAmount ?>">
      <?php
        if ($discountSlug['value'] === 'custom') {
          echo $discountCustom;
        } elseif($discountSlug['value'] === 'veterans') { 
          echo '<span>';
          get_template_part('slides/svg/veterans');
          echo '</span>';

        } elseif($discountSlug['value'] === 'costcosams') { 
          echo '<span>';
          get_template_part('slides/svg/costcosams');
          echo '</span>';

        } elseif($discountSlug['value'] === 'aarp') { 
          echo '<span>';
          get_template_part('slides/svg/aarp');
          echo '</span>';

        } elseif($discountSlug['value'] === 'aaa') { 
          echo '<span>';
          get_template_part('slides/svg/aaa');
          echo '</span>';

        } elseif($discountSlug['value'] === 'firstresponders') { 
          echo '<span>';
          get_template_part('slides/svg/firstresponders');
          echo '</span>';

        } ?>
      
      
    </button>

  <?php	
      
  endwhile; ?>

  </div>

  <?php endif; ?>
  
  <?php $audioAddCov = get_sub_field('addcov_prices_audio');
  if( $audioAddCov ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioAddCov['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>