<?php
//
//
// What's Not Covered
// 

?>

<section id="notCovered" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-engine.jpg" data-state="notcovered">
  <h2>What's Not Covered</h2>
  <div class="row">
    
    <?php
        if( have_rows('notCovered_list') ):
        echo '<div class="col-xs-5 section-desc">';
        echo '<ul id="notCovered-list">';
          
          while ( have_rows('notCovered_list') ) : the_row();
            $notCovered_listItem = get_sub_field('notCovered_listItem');
            
            echo '<li>'.$notCovered_listItem.'</li>';		
          
          endwhile;
        
        echo '</ul></div>';
        
      endif; ?>
    
    <?php
      $notCovered_hdr = get_sub_field('notcovered_hdr');
      $notCovered_text = get_sub_field('notCovered_text');

      if( $notCovered_hdr || $notCovered_text ): ?>
      <div id="notCovered-disclaimer" class="col-xs-7">
        <div class="module-wrapper">
          <?php if( $notCovered_hdr ){ ?><h4><?php echo $notCovered_hdr ?></h4><?php }; ?>
          <?php if( $notCovered_text ){ ?><div class="notCovered-text"><?php echo $notCovered_text ?></div><?php }; ?>
        </div>
      </div>
    <?php endif; ?>
    
    <div id="notCovered-imgs" class="col-xs-12">
      <div class="row">
        <div id="notCoveredImg1" class="notCovered-img col-xs-2"><div></div></div>
        <div id="notCoveredImg2" class="notCovered-img col-xs-2"><div></div></div>
        <div id="notCoveredImg3" class="notCovered-img col-xs-2"><div></div></div>
        <div id="notCoveredImg4" class="notCovered-img col-xs-2"><div></div></div>
        <div id="notCoveredImg5" class="notCovered-img col-xs-2"><div></div></div>
        <div id="notCoveredImg6" class="notCovered-img col-xs-2"><div></div></div>
      </div>
    </div>
  </div>
  <?php $audioNotCovered = get_sub_field('notCovered_audio');
  if( $audioNotCovered ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioNotCovered['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>