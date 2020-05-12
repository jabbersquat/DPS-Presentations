<?php
//
//
// Audio Selection Screen
//

$logoUrl = get_query_var('presentation_logo');
?> 

  <section id="audio">
    <audio id="initiateMp3" class="hiddenAudio">
      <source src="<?php echo get_template_directory_uri(); ?>/audio/initiate.mp3" type="audio/mpeg">
    </audio>
    <div class="row">
      <div class="congrats-jumbotron col-xs-8 col-xs-offset-2">
        <div class="module-wrapper">
          <div class="logo"><img src="<?php echo $logoUrl; ?>"></div>
          <h2 class="audio-select">Select Presentation</h2> 
          <input id="playaudio" class="btn btn-default btn-lg btn-audio" type="button" value="Audio Presentation">
          <input id="muteaudio" class="btn btn-default btn-lg btn-audio" type="button" value="Standard Presentation">
          
        </div>
      </div>
    </div>
  </section>