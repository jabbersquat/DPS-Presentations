<?php
//
//
// Language Selection Screen
// 

$logoUrl = get_query_var('presentation_logo');
$languages = get_sub_field('languages'); 
?>

<section id="language">
  <div class="row">
    <div class="congrats-jumbotron col-xs-8 col-xs-offset-2">
      <div class="module-wrapper">
        <div class="logo"><img src="<?php echo $logoUrl; ?>"></div>
        <h2 class="audio-select">Choose a language</h2>
        <?php	if( $languages ): 
          foreach($languages as $language): 
          $langCode = $language['value'];
          $langLang = $language['label'];
        ?>
          <a class="btn btn-lg btn-audio" href="javascript:Localize.setLanguage('<?php echo $langCode; ?>');Reveal.next();"><?php echo $langLang; ?></a>
        <?php	endforeach;
        ?>
        <?php endif; ?>
        
      </div>
    </div>
  </div>
</section>