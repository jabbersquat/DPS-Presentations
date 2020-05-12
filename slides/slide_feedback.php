<?php
//
//
// Online Feedback
//
?> 
  

<section id="onlinefeedback" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-rears.jpg">
  <h2>We Appreciate Your Online Feedback</h2>
  <div id="onlineFeedbackUL row">
    
    <?php
      if( have_rows('feedback_choices') ):
      while ( have_rows('feedback_choices') ) : the_row();
        $feedbackSource = get_sub_field('feedback_source');
        $feedbackURL = get_sub_field('feedback_url');
      ?>
      
      <div class="col-of col-xs-4">
        <div class="module-wrapper">
          <?php if($feedbackURL) { echo "<a href='".$feedbackURL."' target='_blank'>"; } ?>
            <img class="feedbackImg" src="<?php echo get_template_directory_uri(); ?>/img/feedback/<?php echo $feedbackSource; ?>.png">
          <?php if($feedbackURL) { echo "</a>"; } ?>
        </div>
      </div>
      <?php endwhile;
      endif; ?>
  </div>
  <?php $audioFeedback = get_sub_field('feedback_audio');
  if( $audioFeedback ): ?>
    <audio class="hiddenAudio">
      <source src="<?php echo $audioFeedback['url']; ?>" type="audio/mpeg">
    </audio>
  <?php endif; ?>
</section>