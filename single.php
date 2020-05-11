<?php get_header('reveal'); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<?php if( have_rows('slides') ): ?>
		
		
		
		<?php $showAcc = get_field('showacc_btn_link');
			//Special button that always exists in the top right.
			
			if( $showAcc ): ?>
			
			<div id="showAcc">
				<a href="<?php echo $showAcc; ?>" class="btn btn-audio">Show Accessories</a>
			</div>
		
		<?php endif; ?>
		
			
		<div class="reveal" tabindex="0">
			
			<!--
				Embed a custom styles to update colors from backend.
			-->
			<?php $bgColor = get_field('background_color'); 
				if( $bgColor ): ?>
					<style>
						.reveal .slideone-wrapper span { color: <?php echo $bgColor; ?>; }
					</style>
			<?php endif; 
				
				$logo = get_field('dealer_logo');
				$name = get_field('dealer_name');
			?>
			
			
			<div class="slides">
					
			 
			<?php	while ( have_rows('slides') ) : 
					
					the_row(); 
					$layout = get_row_layout();
					
					//
					//
					// Generic Slide
					// 
					if( $layout == 'generic_slide') {   
						$genericSlide_header = get_sub_field('genericSlide_header');
						$genericSlide_desc = get_sub_field('genericSlide_desc');
						$generic_featuredChoice = get_sub_field('generic_featured');
						$genericSlide_img = get_sub_field('genericSlide_img');
						$genericSlide_vid = get_sub_field('genericSlide_vid');
					?> 

					<section data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg">
						<h2><?php echo $genericSlide_header; ?></h2>
						
						<?php if ($genericSlide_desc): ?>
						
							<div class="row-main row">
								<?php if ($generic_featuredChoice == 'image'): ?>
									<div class="col-xs-7 section-desc">
										<div class="module-wrapper">
											<?php echo $genericSlide_desc; ?>
										</div>
									</div>
								<div id="excessivewear-imgMain" class="col-xs-5">
									<img class="img-responsive" src="<?php echo $genericSlide_img; ?>">
								</div>
								
								<?php elseif($generic_featuredChoice == 'video'): ?>
										
									<div class="col-xs-6 section-desc">
										<div class="module-wrapper">
											<?php echo $genericSlide_desc; ?>
										</div>
									</div>
									<div id="sound-videoembed" class="col-xs-6">
										<div class="embed-inner">
											<?php 
												// use preg_match to find iframe src
												preg_match('/src="(.+?)"/', $genericSlide_vid, $matches);
												$src = $matches[1];
												
												
												// add extra params to iframe src
												$params = array(
												    'controls'    => 0,
												    'rel'        => 0,
												    'autoplay'    => 1,
												    'loop'    => 1,
												);
												$new_src = add_query_arg($params, $src);
												$genericSlide_vid = str_replace($src, $new_src, $genericSlide_vid);
												
												// add extra attributes to iframe html
												$attributes = 'frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>';
												
												$genericSlide_vid = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $genericSlide_vid);
												
												
												echo $genericSlide_vid; 
											?>
										</div>
									</div>
								
								<?php else: ?>
									<div class="row-main row">
										<div class="col-xs-12 section-desc">
											<div class="module-wrapper">
												<?php echo $genericSlide_desc; ?>
											</div>
										</div>
									</div>
								<?php endif; ?>	
							</div>
						<?php endif; ?>		
						
						<?php
							if( have_rows('genericSlide_tablerow') ): ?>
							
							<div class="row-withOverlay row">
								<div class="dps-table col-xs-12">
									<div class="table-hdr">
										<div class="col-xs-4">Protection Against</div>
										<div class="col-xs-4">Factory Coverage</div>
										<div class="col-xs-4">Additional Coverage</div>
									</div>
							
									<?php while ( have_rows('genericSlide_tablerow') ) : the_row();
										$protectAgainst = get_sub_field('genericSlide_protectAgainst');
										$factoryCoverage = get_sub_field('genericSlide_factoryCoverage');
										$additionalCoverage = get_sub_field('genericSlide_additionalCoverage');
									?>
							
									<div class="table-reg">
										<div class="col-xs-4"><?php echo $protectAgainst; ?></div>
										<div class="col-xs-4"><?php echo $factoryCoverage; ?></div>
										<div class="col-xs-4"><?php echo $additionalCoverage; ?></div>
									</div>	
								
									<?php endwhile; ?>
							
								</div>
							</div>
							
						<?php endif; ?>
						
						<?php
							if( have_rows('genericSlide_imagesMore') ): ?>
							<div class="fragment fade-in">
								<div class="overlayModule">
									<div class="row-imgGrid">
										
										<?php while ( have_rows('genericSlide_imagesMore') ) : the_row(); 
											$genericSlide_imgMore = get_sub_field('genericslide_imgMore');
											$genericSlide_imgMoreDesc = get_sub_field('genericSlide_imgMoreDesc');
										?>
											
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.$genericSlide_imgMore["url"].');"';?>>
												<div class="imgGrid_desc"><?php echo $genericSlide_imgMoreDesc; ?></div>
											</div>
											
										<?php endwhile; ?>
										
									</div>	
								</div>
							</div>
						<?php endif; ?>	
						
						
						<?php $audioGeneric = get_sub_field('generic_audio');
						if( $audioGeneric ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioGeneric['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>

					<?php } ?>
					

					<?php
					//
					//
					// Generic Table Slide
					// 
					if( $layout == 'generic_table_slide') {   
						$tableSlide_header = get_sub_field('tableSlide_header');
					?> 

					<section data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg">
						<h2><?php echo $tableSlide_header; ?></h2>
						
						<?php
							if( have_rows('tableSlide_row') ): ?>
							
							<div class="row">
								<div class="dps-table col-xs-12">
									<div class="table-hdr">
										<div class="col-xs-4">Protection Against</div>
										<div class="col-xs-4">Factory Coverage</div>
										<div class="col-xs-4">Additional Coverage</div>
									</div>
							
									<?php while ( have_rows('tableSlide_row') ) : the_row();
										$protectAgainst = get_sub_field('tableSlide_protectAgainst');
										$factoryCoverage = get_sub_field('tableSlide_factoryCoverage');
										$additionalCoverage = get_sub_field('tableSlide_additionalCoverage');
									?>
							
									<div class="table-reg">
										<div class="col-xs-4"><?php echo $protectAgainst; ?></div>
										<div class="col-xs-4"><?php echo $factoryCoverage; ?></div>
										<div class="col-xs-4"><?php echo $additionalCoverage; ?></div>
									</div>	
								
									<?php endwhile; ?>
							
								</div>
							</div>
							
						<?php endif; ?>
						
						<?php $audioGenericTable = get_sub_field('generic_table_audio');
						if( $audioGenericTable ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioGenericTable['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
						
					</section>

					<?php } ?>
					
					
					<?php
					//
					//
					// Generic Full Image
					// 
					if( $layout == 'slide_generic_fullimage') {   
						$fullimage = get_sub_field('slide_fullimage_main');
					?> 

					<section id="section-fullimage" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-engine.jpg">
						
						<div class="fullimage-image" <?php echo 'style="background-image: url(\''.$fullimage['url'].');"';?>>
						
						<?php $audioGenericFullimage = get_sub_field('generic_fullimage_audio');
						if( $audioGenericFullimage ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioGenericFullimage['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
						
					</section>

					<?php } ?>
					
					
					<?php
					//
					//
					// Full Page Video Embed
					// 
					if( $layout == 'slide_fullvideo') {   
						$embedcode = get_sub_field('slide_fullvideo_embed');
						$fullvideo_title = get_sub_field('slide_fullvideo_title');
					?> 

					<section id="section-fullvideo" data-background-color="#000000">
						
						<?php if ($fullvideo_title) { ?>
						<h2><?php echo $fullvideo_title; ?></h2>
						<?php } ?>
						
						<div class="fullvideo-wrapper stretch">
							<iframe src="<?php echo $embedcode; ?>?controls=0" data-autoplay frameborder="0"></iframe>
							
						</div>
						
					</section>

					<?php } ?>
					
					
					<?php
					//
					//
					// Audio Selection Screen
					// 
					if( $layout == 'slide_audio') {   
					?> 

					<section id="audio">
						<audio id="initiateMp3" class="hiddenAudio">
							<source src="<?php echo get_template_directory_uri(); ?>/audio/initiate.mp3" type="audio/mpeg">
						</audio>
						<div class="row">
							<div class="congrats-jumbotron col-xs-8 col-xs-offset-2">
								<div class="module-wrapper">
									<div class="logo"><img src="<?php echo $logo['url']; ?>"></div>
									<h2 class="audio-select">Select Presentation</h2> 
									<input id="playaudio" class="btn btn-default btn-lg btn-audio" type="button" value="Audio Presentation">
									<input id="muteaudio" class="btn btn-default btn-lg btn-audio" type="button" value="Standard Presentation">
									
								</div>
							</div>
						</div>
					</section>

					<?php } ?>
					
					
					<?php
					//
					//
					// Language Selection Screen
					// 
					if( $layout == 'slide_language') {   
					?> 
					<?php $languages = get_sub_field('languages'); ?>
					
					<section id="language">
						<div class="row">
							<div class="congrats-jumbotron col-xs-8 col-xs-offset-2">
								<div class="module-wrapper">
									<div class="logo"><img src="<?php echo $logo['url']; ?>"></div>
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

					<?php } ?>
					
					
					<?php
					//
					//
					// Congratulations / Start
					// 
					if( $layout == 'slide_congrats') {   
						$bg = get_sub_field('slide_congrats_bg');
					?> 

					<section id="congrats" 
						<?php if( !empty($bg) ): ?>data-background-image="<?php echo $bg['url']; ?>"<?php endif; ?>>
						<div class="row">
							<div class="congrats-jumbotron col-xs-10 col-xs-offset-1">
								<div class="module-wrapper">
									<div class="logo"><img src="<?php echo $logo['url']; ?>"></div>
									<p class="congrats-p">Congratulations on your purchase from </p>
									<h1><?php echo $name; ?></h1>
									
								</div>
							</div>
						</div>
						<?php $audioCongrats = get_sub_field('congrats_audio');
						if( $audioCongrats ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioCongrats['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
						
					</section>

					<?php } ?>
					
					
					
					<?php
					//
					//
					// Exterior Protection
					//
					if( $layout == 'slide_extpro_anim') { ?>
					<section id="exteriorProtection" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-engine.jpg" data-state="extproanim">
						<h2>Exterior Protection</h2>
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" style="display:none;" xml:space="preserve">
							<style type="text/css">
								.st0{fill:#58595B;}
								.st1{fill:#6D6E70;}
								.st2{fill:#929497;}
								.st3{fill:#A6A8AB;}
								.st4{fill:#231F20;}
								.st5{fill:#404041;}
								.st6{opacity:0.5;fill:#25A9E0;}
								.st7{opacity:0.3;fill:#2B388F;}
								.st8{opacity:0.15;fill:#2B388F;}
								.st9{opacity:0.75;}
								.st10{opacity:0.9;fill:#009345;}
								.st11{fill:#006838;}
								.st12{opacity:0.5;fill:#006838;}
								.st13{opacity:0.5;}
								.st14{fill:#FFFFFF;}
								.st15{font-family:"Roboto";}
								.st16{font-size:60px;}
								.st17{fill:none;stroke:#4CAF50;stroke-width:8;stroke-miterlimit:10;}
							</style>
								<symbol id="ext_body">
									<polygon class="st0" points="44.3,864 -1,922 1001,922 955.7,864 		"/>
									<rect x="-1" y="922" class="st1" width="1002" height="79"/>
								</symbol>
								<symbol id="ext_primer">
									<polygon class="st2" points="44.5,800.5 -1,852.5 1001,852.5 955.5,800.5 		"/>
									<rect x="-1" y="852.5" class="st3" width="1002" height="67.5"/>
								</symbol>
								<symbol id="ext_paint">
									<polygon class="st4" points="45.1,704.6 -1,747.6 1001,747.6 954.9,704.6 		"/>
									<rect x="-1" y="747.6" class="st5" width="1002" height="103"/>
								</symbol>
								<symbol id="ext_clearcoat">
									<path class="st6" d="M44.4,600.1L44.4,600.1C44.4,600.1,44.4,600.1,44.4,600.1l0.8-0.8c1.2-0.4,3.5-0.2,5.5,0.1l14,2.2
										c15.3,2.4,25.8,4.3,42.2,0.7l11.9,0.3c1.7-0.4,6.5-1.4,7.6-0.9l8.5,2.3c2.3,0.9,7.7,2.6,8.5,1.1c1.1-1.9,4.4-3.3,7.9-3.3
										c1.7-0.2,3.4,0.2,4.2,1l2.3,3.1c1.3,1.2,4.2,1.4,6.5,0.6c0.3-0.1,0.7-0.3,1-0.5c6-3.6,23.5-8.8,21.5-3.2c5.3-3,11.6-0.3,14.3,1.2
										c1.1,0.5,2.6,0.7,4.2,0.5l20.3-2.6c1.8-0.3,3.7,0,4.8,0.7c0.9,0.8,7.5,4.7,9.6,4.3c3.1-0.8,6.5-1,9.6-0.7c0.7,0.1,3.9-6,4.8-6.1
										l19.1,4.7l0.8-0.1l27.9-4.1c1.4-0.2,2.9-0.1,4.1,0.3c3.9,1.6,13.8,5.7,15,4.2l7.6-7c4.7,0.7,9.5,1.2,14.3,1.6
										c4.3-0.7,11,5.8,13.2,3.7c6.4-6.4,22.2-5.5,22.2-5.5c0.4-6.3,26.2,0.8,27.1,0.7c2.6-0.4,17.4-9.1,20.8-6.5s5.2,5.6,10.6,4.6
										c11.5-2,38.9,1,35.3,3.3c0,0-0.1,0-0.1,0.1c-0.1,0.1-0.1,0.1,0,0c0.7-0.4,6.3-3.7,10.7-3.5c14.3,0.7,46.2-5.3,65-2.9
										c5.6,0.7,11.1,1.9,16.3,3.6c10-1.5,32.7,7.6,48.8,2.8c3.3-1,13.8,2.6,15.7,0.9c3.6-1.7,8.4-2.6,13.5-2.4c5.2,0.6,8.8,0.3,13.9,1
										c2.2,0.3,15,0.8,24.3,1.6c9.3,0.7,21.5,3,24.5,2.6s5.5-0.7,8.7-1c3.2-0.2,14.3-2.6,20-1.5c4.8,0.6,9.6,0.9,14.3,1
										c6.2,0.5,12.4,1.5,18.3,3.1c0.3,0,18.6-1.6,19.1-1.4c5.5,1.6,11.3,2.8,17.2,3.6c1.6,0.1,10.7-1.5,14.3-1.8
										c13.5-1,25.1,5.6,36.6,5.4c7.7-0.1,17.5-0.2,18.8-2.3c1.2-2.1,12.7-1.1,14.7,0.2c3.4,1.8,7.8,2.8,12.2,2.8c0,0,11.1-0.8,11.7-0.7
										l6.9-3.5l37.8-7.3v0l45.4,29v118.3H-1V629.1L44.4,600.1z"/>
									<polygon class="st7" points="955.7,705.3 1001,747.3 -1,747.3 44.3,705.3 		"/>
									<path class="st8" d="M44.4,600.1L44.4,600.1C44.4,600.1,44.4,600.1,44.4,600.1l0.3-0.6c0.9-0.7,3.7-0.5,6-0.1l14,2.2
										c15.3,2.4,25.8,4.3,42.2,0.7l11.9,0.3c1.7-0.4,6.5-1.4,7.6-0.9l8.5,2.3c2.3,0.9,7.7,2.6,8.5,1.1c1.1-1.9,4.4-3.3,7.9-3.3
										c1.7-0.2,3.4,0.2,4.2,1l2.3,3.1c1.3,1.2,4.2,1.4,6.5,0.6c0.3-0.1,0.7-0.3,1-0.5c6-3.6,23.5-8.8,21.5-3.2c5.3-3,11.6-0.3,14.3,1.2
										c1.1,0.5,2.6,0.7,4.2,0.5l20.3-2.6c1.8-0.3,3.7,0,4.8,0.7c0.9,0.8,7.5,4.7,9.6,4.3c3.1-0.8,6.5-1,9.6-0.7c0.7,0.1,3.9-6,4.8-6.1
										l19.1,4.7l0.8-0.1l27.9-4.1c1.4-0.2,2.9-0.1,4.1,0.3c3.9,1.6,13.8,5.7,15,4.2l7.6-7c4.7,0.7,9.5,1.2,14.3,1.6
										c4.3-0.7,11,5.8,13.2,3.7c6.4-6.4,22.2-5.5,22.2-5.5c0.4-6.3,26.2,0.8,27.1,0.7c2.6-0.4,17.4-9.1,20.8-6.5s5.2,5.6,10.6,4.6
										c11.5-2,38.9,1,35.3,3.3c0,0-0.1,0-0.1,0.1c-0.1,0.1-0.1,0.1,0,0c0.7-0.4,6.3-3.7,10.7-3.5c14.3,0.7,46.2-5.3,65-2.9
										c5.6,0.7,11.1,1.9,16.3,3.6c10-1.5,32.7,7.6,48.8,2.8c3.3-1,13.8,2.6,15.7,0.9c3.6-1.7,8.4-2.6,13.5-2.4c5.2,0.6,8.8,0.3,13.9,1
										c2.2,0.3,15,0.8,24.3,1.6c9.3,0.7,21.5,3,24.5,2.6s5.5-0.7,8.7-1c3.2-0.2,14.3-2.6,20-1.5c4.8,0.6,9.6,0.9,14.3,1
										c6.2,0.5,12.4,1.5,18.3,3.1c0.3,0,18.6-1.6,19.1-1.4c5.5,1.6,11.3,2.8,17.2,3.6c1.6,0.1,10.7-1.5,14.3-1.8
										c13.5-1,25.1,5.6,36.6,5.4c7.7-0.1,17.5-0.2,18.8-2.3c1.2-2.1,12.7-1.1,14.7,0.2c3.4,1.8,7.8,2.8,12.2,2.8c0,0,11.1-0.8,11.7-0.7
										l6.9-3.5l37.8-7.3v0l45.4,29l-41.6,7.3l-7.6,3.5c-0.6-0.1-12.9,0.7-12.9,0.7c-4.9,0-9.8-1-13.5-2.8c-2.2-1.3-14.8-2.3-16.2-0.2
										c-1.4,2.1-12.3,2.2-20.7,2.3c-12.7,0.2-25.4-6.4-40.3-5.4c-4,0.3-14,1.9-15.8,1.8c-6.5-0.8-12.8-2-18.9-3.6
										c-0.5-0.2-20.7,1.4-21,1.4c-6.4-1.5-13.2-2.6-20.1-3.1c-5.3-0.1-10.5-0.4-15.8-1c-6.2-1.1-18.5,1.3-22,1.5c-3.5,0.2-6.3,0.6-9.6,1
										c-3.3,0.4-16.7-1.9-26.9-2.6s-24.3-1.3-26.7-1.6c-5.6-0.7-9.6-0.4-15.3-1c-5.5-0.2-10.8,0.7-14.8,2.4c-2.1,1.7-13.6-1.9-17.2-0.9
										c-17.7,4.9-42.6-4.3-53.6-2.8c-5.6-1.6-11.7-2.8-17.9-3.6c-20.7-2.4-55.7,3.6-71.5,2.9c-4.8-0.2-11,3.1-11.8,3.5c0,0,0,0,0.1-0.1
										c3.9-2.3-26.2-5.3-38.9-3.3c-5.9,1-8-2-11.7-4.6s-19.9,6.1-22.8,6.5c-1,0.1-29.4-7-29.8-0.7c0,0-17.4-0.9-24.4,5.5
										c-2.4,2.1-9.8-4.4-14.5-3.7c-5.3-0.4-10.6-0.9-15.8-1.6l-8.3,7c-1.3,1.5-12.2-2.6-16.5-4.2c-1.2-0.4-2.9-0.6-4.5-0.3l-30.7,4.1
										l-0.8,0.1l-21-4.7c-1,0.1-4.5,6.2-5.3,6.1c-3.4-0.4-7.1-0.1-10.5,0.7c-2.3,0.5-9.5-3.4-10.5-4.3c-1.2-0.8-3.2-1.1-5.3-0.7
										l-22.3,2.6c-1.7,0.2-3.4,0.1-4.6-0.5c-3-1.5-9.9-4.2-15.8-1.2c2.2-5.5-17-0.3-23.7,3.2c-0.3,0.2-0.7,0.3-1,0.5
										c-2.5,0.9-5.7,0.6-7.2-0.6l-2.6-3.1c-0.9-0.8-2.7-1.2-4.6-1c-3.9,0-7.5,1.4-8.7,3.3c-0.8,1.5-6.7-0.1-9.3-1.1l-9.4-2.3
										c-1.3-0.5-6.5,0.5-8.4,0.9l-13-0.3c-18,3.6-29.5,1.7-46.4-0.7L6,628.3c-1.9-0.3-4-0.4-5.4-0.2L44.4,600.1z"/>
									<path class="st8" d="M-1,629.1v118.3l45.3-42h0.1V600.1L-1,629.1z M1001,629.1l-45.4-29v105.3h0.1l45.3,42V629.1z"/>
								</symbol>
								<symbol id="ext_sealant" class="st9">
									<path class="st10" d="M44.5,480h910.9l45.5,20v130.1l-1.6-0.7l-39.9,7l-7.6,3.5c-0.6-0.1-12.9,0.7-12.9,0.7c-4.9,0-9.8-1-13.5-2.8
										c-2.2-1.3-14.8-2.3-16.2-0.2c-1.4,2.1-12.3,2.2-20.7,2.3c-12.7,0.2-25.4-6.4-40.3-5.4c-4,0.3-14,1.9-15.8,1.8
										c-6.5-0.8-12.8-2-18.9-3.6c-0.5-0.2-20.7,1.4-21,1.4c-6.4-1.5-13.2-2.6-20.1-3.1c-5.3-0.1-10.5-0.4-15.8-1
										c-6.2-1.1-18.5,1.3-22,1.5c-3.5,0.2-6.3,0.6-9.6,1c-3.3,0.4-16.7-1.9-26.9-2.6s-24.3-1.3-26.7-1.6c-5.6-0.7-9.6-0.4-15.3-1
										c-5.5-0.2-10.8,0.7-14.8,2.4c-2.1,1.7-13.6-1.9-17.2-0.9c-17.7,4.9-42.6-4.3-53.6-2.8c-5.6-1.6-11.7-2.8-17.9-3.6
										c-20.7-2.4-55.7,3.6-71.5,2.9c-4.8-0.2-11,3.1-11.8,3.5c0,0,0,0,0.1-0.1c3.9-2.3-26.2-5.3-38.9-3.3c-5.9,1-8-2-11.7-4.6
										c-3.7-2.7-19.9,6.1-22.8,6.5c-1,0.1-29.4-7-29.8-0.7c0,0-17.4-0.9-24.4,5.5c-2.4,2.1-9.8-4.4-14.5-3.7c-5.3-0.4-10.6-0.9-15.8-1.6
										l-8.3,7c-1.3,1.5-12.2-2.6-16.5-4.2c-1.2-0.4-2.9-0.6-4.5-0.3l-30.7,4.1l-0.8,0.1l-21-4.7c-1,0.1-4.5,6.2-5.3,6.1
										c-3.4-0.4-7.1-0.1-10.5,0.7c-2.3,0.5-9.5-3.4-10.5-4.3c-1.2-0.8-3.2-1.1-5.3-0.7l-22.3,2.6c-1.7,0.2-3.4,0.1-4.6-0.5
										c-3-1.5-9.9-4.2-15.8-1.2c2.2-5.5-17-0.3-23.7,3.2c-0.3,0.2-0.7,0.3-1,0.5c-2.5,0.9-5.7,0.6-7.2-0.6l-2.6-3.1
										c-0.9-0.8-2.7-1.2-4.6-1c-3.9,0-7.5,1.4-8.7,3.3c-0.8,1.5-6.7-0.1-9.3-1.1l-9.4-2.3c-1.3-0.5-6.5,0.5-8.4,0.9l-13-0.3
										c-18,3.6-29.5,1.7-46.4-0.7L6,628.3c-0.9-0.1-1.9-0.2-2.9-0.3l-4.1,2.1V500L44.5,480z"/>
									<path class="st11" d="M44.4,600.1L44.4,600.1C44.4,600.1,44.4,600.1,44.4,600.1l0.8-0.8c1.2-0.4,3.5-0.3,5.6,0.1l14,2.2
										c15.3,2.4,25.8,4.3,42.2,0.7l11.9,0.3c1.7-0.4,6.5-1.4,7.6-0.9l8.5,2.3c2.3,0.9,7.7,2.6,8.5,1.1c1.1-1.9,4.4-3.3,7.9-3.3
										c1.7-0.2,3.4,0.2,4.2,1l2.3,3.1c1.3,1.2,4.2,1.4,6.5,0.6c0.3-0.1,0.7-0.3,1-0.5c6-3.6,23.5-8.8,21.5-3.2c5.3-3,11.6-0.3,14.3,1.2
										c1.1,0.5,2.6,0.7,4.2,0.5l20.3-2.6c1.8-0.3,3.7,0,4.8,0.7c0.9,0.8,7.5,4.7,9.6,4.3c3.1-0.8,6.5-1,9.6-0.7c0.7,0.1,3.9-6,4.8-6.1
										l19.1,4.7l0.8-0.1l27.9-4.1c1.4-0.2,2.9-0.1,4.1,0.3c3.9,1.6,13.8,5.7,15,4.2l7.6-7c4.7,0.7,9.5,1.2,14.3,1.6
										c4.3-0.7,11,5.8,13.2,3.7c6.4-6.4,22.2-5.5,22.2-5.5c0.4-6.3,26.2,0.8,27.1,0.7c2.6-0.4,17.4-9.1,20.8-6.5s5.2,5.6,10.6,4.6
										c11.5-2,38.9,1,35.3,3.3c0,0-0.1,0-0.1,0.1c-0.1,0.1-0.1,0.1,0,0c0.7-0.4,6.3-3.7,10.7-3.5c14.3,0.7,46.2-5.3,65-2.9
										c5.6,0.7,11.1,1.9,16.3,3.6c10-1.5,32.7,7.6,48.8,2.8c3.3-1,13.8,2.6,15.7,0.9c3.6-1.7,8.4-2.6,13.5-2.4c5.2,0.6,8.8,0.3,13.9,1
										c2.2,0.3,15,0.8,24.3,1.6s21.5,3,24.5,2.6c3-0.4,5.5-0.7,8.7-1c3.2-0.2,14.3-2.6,20-1.5c4.8,0.6,9.6,0.9,14.3,1
										c6.2,0.5,12.4,1.5,18.3,3.1c0.3,0,18.6-1.6,19.1-1.4c5.5,1.6,11.3,2.8,17.2,3.6c1.6,0.1,10.7-1.5,14.3-1.8
										c13.5-1,25.1,5.6,36.6,5.4c7.7-0.1,17.5-0.2,18.8-2.3c1.2-2.1,12.7-1.1,14.7,0.2c3.4,1.8,7.8,2.8,12.2,2.8c0,0,11.1-0.8,11.7-0.7
										l6.9-3.5l37.8-7.3v0l45.4,29l-41.6,7.3l-7.6,3.5c-0.6-0.1-12.9,0.7-12.9,0.7c-4.9,0-9.8-1-13.5-2.8c-2.2-1.3-14.8-2.3-16.2-0.2
										c-1.4,2.1-12.3,2.2-20.7,2.3c-12.7,0.2-25.4-6.4-40.3-5.4c-4,0.3-14,1.9-15.8,1.8c-6.5-0.8-12.8-2-18.9-3.6
										c-0.5-0.2-20.7,1.4-21,1.4c-6.4-1.5-13.2-2.6-20.1-3.1c-5.3-0.1-10.5-0.4-15.8-1c-6.2-1.1-18.5,1.3-22,1.5c-3.5,0.2-6.3,0.6-9.6,1
										c-3.3,0.4-16.7-1.9-26.9-2.6s-24.3-1.3-26.7-1.6c-5.6-0.7-9.6-0.4-15.3-1c-5.5-0.2-10.8,0.7-14.8,2.4c-2.1,1.7-13.6-1.9-17.2-0.9
										c-17.7,4.9-42.6-4.3-53.6-2.8c-5.6-1.6-11.7-2.8-17.9-3.6c-20.7-2.4-55.7,3.6-71.5,2.9c-4.8-0.2-11,3.1-11.8,3.5c0,0,0,0,0.1-0.1
										c3.9-2.3-26.2-5.3-38.9-3.3c-5.9,1-8-2-11.7-4.6c-3.7-2.7-19.9,6.1-22.8,6.5c-1,0.1-29.4-7-29.8-0.7c0,0-17.4-0.9-24.4,5.5
										c-2.4,2.1-9.8-4.4-14.5-3.7c-5.3-0.4-10.6-0.9-15.8-1.6l-8.3,7c-1.3,1.5-12.2-2.6-16.5-4.2c-1.2-0.4-2.9-0.6-4.5-0.3l-30.7,4.1
										l-0.8,0.1l-21-4.7c-1,0.1-4.5,6.2-5.3,6.1c-3.4-0.4-7.1-0.1-10.5,0.7c-2.3,0.5-9.5-3.4-10.5-4.3c-1.2-0.8-3.2-1.1-5.3-0.7
										l-22.3,2.6c-1.7,0.2-3.4,0.1-4.6-0.5c-3-1.5-9.9-4.2-15.8-1.2c2.2-5.5-17-0.3-23.7,3.2c-0.3,0.2-0.7,0.3-1,0.5
										c-2.5,0.9-5.7,0.6-7.2-0.6l-2.6-3.1c-0.9-0.8-2.7-1.2-4.6-1c-3.9,0-7.5,1.4-8.7,3.3c-0.8,1.5-6.7-0.1-9.3-1.1l-9.4-2.3
										c-1.3-0.5-6.5,0.5-8.4,0.9l-13-0.3c-18,3.6-29.5,1.7-46.4-0.7L6,628.3c-1.9-0.3-4-0.4-5.4-0.2L44.4,600.1z"/>
									<path class="st12" d="M1001,630.1v-1l-1.6,0.3L1001,630.1z M1001,500l-45.4-19.9v120l45.4,29V500z M-1,500v130.1l4.1-2.1
										c0.9,0,1.9,0.2,2.9,0.3c-1.9-0.3-4-0.4-5.4-0.2l43.9-28v-120L-1,500z"/>
									<g class="st13">
										<g>
											<polygon class="st11" points="955.5,480 1001,500 -1,500 44.5,480 				"/>
										</g>
									</g>
								</symbol>
								
								<symbol id="effects-text">
									<text x="28" y="65" class="st4 st15 st16 effect1">TREE SAP</text>
									<text x="28" y="65" class="st4 st15 st16 effect2">ACID RAIN</text>
									<text x="28" y="65" class="st4 st15 st16 effect3">HARD WATER ETCHING</text>
									<text x="28" y="65" class="st4 st15 st16 effect4">INSECTS</text>
									<text x="28" y="65" class="st4 st15 st16 effect5">BIRD DROPPINGS</text>
									<text x="28" y="65" class="st4 st15 st16 effect6">ROAD SALT</text>
								</symbol>
							</svg>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-1 exteriorSVGwrap">
								<h3 class="exteriorSVG-hdr">Unprotected</h3>
								<div class="module-wrapper">
									
									<svg id="extpro_no" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" style="" xml:space="preserve">
										<use class="ext_layer" xlink:href="#ext_body" x="0" y="0" />
										<use class="ext_layer" xlink:href="#ext_primer" x="0" y="0" />
										<use class="ext_layer" xlink:href="#ext_paint" x="0" y="0" />
										<use class="ext_layer" xlink:href="#ext_clearcoat" x="0" y="0" />
										<g id="ext_text">
											<text x="28" y="975" id="ext_body_text" class="st14 st15 st16 ext_layerText">BODY PANEL</text>
											<text x="28" y="902" id="ext_primer_text" class="st14 st15 st16 ext_layerText">PRIMER</text>
											<text x="28" y="802" id="ext_paint_text" class="st14 st15 st16 ext_layerText">PAINT</text>
											<text x="28" y="688" id="ext_clearcoat_text" class="st14 st15 st16 ext_layerText">CLEAR COAT</text>
										</g>
										<g id="lines-nobounce">
											<line class="st17" x1="80" y1="272" x2="260" y2="612"/>
											<line class="st17" x1="280" y1="272" x2="460" y2="612"/>
											<line class="st17" x1="480" y1="272" x2="660" y2="612"/>
											<line class="st17" x1="680" y1="272" x2="860" y2="612"/>
										</g>
										<use xlink:href="#effects-text" x="0" y="0" />
									</svg>
								</div>
							</div>
							<div class="col-xs-5 exteriorSVGwrap">
								<h3 class="exteriorSVG-hdr">Protected</h3>
								<div class="module-wrapper">
									
									<svg id="extpro_yes" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" style="" xml:space="preserve">
										<use class="ext_layer" xlink:href="#ext_body" x="0" y="0" />
										<use class="ext_layer" xlink:href="#ext_primer" x="0" y="0" />
										<use class="ext_layer" xlink:href="#ext_paint" x="0" y="0" />
										<use class="ext_layer" xlink:href="#ext_clearcoat" x="0" y="0" />
										<use class="ext_layer" xlink:href="#ext_sealant" x="0" y="0" />
										<g id="ext_text">
											<text x="28" y="975" id="ext_body_text" class="st14 st15 st16 ext_layerText">BODY PANEL</text>
											<text x="28" y="902" id="ext_primer_text" class="st14 st15 st16 ext_layerText">PRIMER</text>
											<text x="28" y="802" id="ext_paint_text" class="st14 st15 st16 ext_layerText">PAINT</text>
											<text x="28" y="688" id="ext_clearcoat_text" class="st14 st15 st16 ext_layerText">CLEAR COAT</text>
											<text x="28" y="555" id="ext_sealant_text" class="st14 st15 st16 ext_layerText">SEALANT</text>
										</g>
										<g id="lines-bounce">
											<polyline class="st17" points="80,120 260,460 360,260 	"/>
											<polyline class="st17" points="280,120 460,460 560,260 	"/>
											<polyline class="st17" points="480,120 660,460 760,260 	"/>
											<polyline class="st17" points="680,120 860,460 960,260 	"/>
										</g>
										<use xlink:href="#effects-text" x="0" y="0" />
									</svg>
								</div>
							</div>
							<div class="col-xs-10 col-xs-offset-1 exteriorCopy">
								Paint sealant contains unique molecules that chemically bond to the clear coat surface. It does this by fusing into the Paint molecules creating a strong covalent bond. The bond utilizes nano-chemistry to strengthen and improve the paint.
							</div>
						</div>
						
						<?php $audioExterior = get_sub_field('extpro_anim_audio');
						if( $audioExterior ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioExterior['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>
					<?php } ?>



					<?php
					//
					//
					// What's Not Covered
					// 
					if( $layout == 'slide_notcovered') { ?>
					
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
					
					<?php } ?>
					
					
					<?php 
					//
					//
					// Warranty Information
					//
					if( $layout == 'slide_warranty') { ?>
					  

					<section id="warranties" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-engine.jpg" data-state="warranty">
						<?php if( have_rows('warranty_set') ):
							$ws = 1; $warrantySetNum = 'warrantySet_'.$ws; 
							
							while ( have_rows('warranty_set') ) : the_row();?>
							
							<section id="warranty-<?php echo $warrantySetNum; ?>">
								<h2><?php the_sub_field('new_or_used'); ?> Car Warranties</h2>
								<div class="row">
									
									<?php
											if( have_rows('warranty_bars') ):
											echo '<div class="col-xs-10 col-xs-offset-1">';
												
												while ( have_rows('warranty_bars') ) : the_row();
													$warrantybar_title = get_sub_field('warrantybar_title');
													$warrantybar_left = get_sub_field('warrantybar_left');
													$warrantybar_right = get_sub_field('warrantybar_right');
													$warrantybar_info = get_sub_field('warrantybar__info');
													$htmlTitle = preg_replace('/\W+/','',strtolower(strip_tags($warrantybar_title)));
													$titleId = uniqid($htmlTitle, true);
												?>
												
													<div class="warranty-wrapper">
														<h3 
															id="<?php echo $titleId; ?>" 
															class="warranty-title<?php if($warrantybar_info){ echo ' hasAfter'; } ?>"
														>
														<?php echo $warrantybar_title; ?>
														</h3>
														<div class="warranty-bar">
															<div class="warranty-progress"></div>
															<div class="warranty-terms"><?php echo $warrantybar_left; ?></div>
															<div class="warranty-avail"><?php echo $warrantybar_right; ?></div>
														</div>
													</div>		
													
													<?php if($warrantybar_info) { ?>
													<div id="warranty-overlay-<?php echo $titleId; ?>" class="overlayModule warranty-overlay">
														<?php echo $warrantybar_info; ?>
														<div class="warrantyInfo_close">X</div>
													</div>
													<?php } ?>
													
												<?php endwhile; ?>
											
											</div>
										
										<?php endif; ?>
										
								</div>
								
							</section>
							
							<?php endwhile; ?>

						<?php $ws += 1; ?>

						<?php endif; ?>
						
						<?php $audioWarranty = get_sub_field('warranty_audio');
						if( $audioWarranty ): ?>
							<audio id="warrantyClip" class="hiddenAudio">
								<source src="<?php echo $audioWarranty['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>	
						
					</section>

					<?php } ?>
					


					<?php
					//
					//
					// Dealer Information
					//
					
					if( $layout == 'slide_dealerinfo') { ?>  

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
								$coupons = get_sub_field('dealerinfo_servicecoupons');
								$browse = get_sub_field('dealerinfo_browseinventory');
								$service = get_sub_field('dealerinfo_scheduleservice');

								if( $coupons || $browse || $service ): ?>
								<ul class="dealerinfo-buttons">
									<?php if( $service ){ ?><li><a class="btn btn-lg service" href="<?php echo $service; ?>" target="_blank">Schedule Service</a></li><?php }; ?>
									<?php if( $coupons ){ ?><li><a class="btn btn-lg coupons" href="<?php echo $coupons; ?>" target="_blank">Service Coupons</a></li><?php }; ?>
									<?php if( $browse ){ ?><li><a class="btn btn-lg browse" href="<?php echo $browse; ?>" target="_blank">Browse Inventory</a></li><?php }; ?>
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

					<?php } ?>
					



					<?php
					//
					//
					// Dealer Benefits
					//
					if( $layout == 'slide_dealerbene') { ?>   

					<section id="dealerbenefits" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-rears.jpg">
						<h2>Dealer Benefits</h2>
						
						
						<?php
							$benefitsText = get_sub_field('dealerbene_text');
							if ($benefitsText) {
								echo '<div id="benes-subhead" class="module-wrapper">'.$benefitsText.'</div>';
							}
						?>
						
						<?php
							if( have_rows('dealerbene_benefits') ): ?>
							
							<ul id="benefitsUL">
							
								<?php while ( have_rows('dealerbene_benefits') ) : the_row();
									$bene = get_sub_field('dealerbene_benefit');
									$bene_icon = get_sub_field('dealerbene_icon');
								?>
						
								<li class="col-benefit">
									<img class="bene_svg" src="<?php echo $bene_icon['url']; ?>">
									<?php echo $bene; ?>
								</li>	
							
								<?php endwhile; ?>
							
							</ul>
							
						<?php endif; ?>
						
						<?php $audioBene = get_sub_field('dealerbene_audio');
						if( $audioBene ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioBene['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>

					<?php } ?>
					
					
					

					<?php
					//
					//
					// Customer Satisfaction
					//
					if( $layout == 'slide_custsat') { ?> 
					  

					<section id="custSat" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-rears.jpg" data-state="checking">
						<h2>Customer Satisfaction is our #1 Goal</h2>
						<div class="col-xs-6">
							<div class="custSat-form">
								<div class="custSat-form-hdr">
									<div class="custSat-form-logo">
										<img src="<?php echo $logo['url']; ?>">
									</div>
									<div class="custSat-form-hdrCopy">
										Thank you for your recent purchase of a new vehicle from <strong><?php echo $name; ?></strong> where we want your buying experience to be Fantastic! Please help us reach our goal of 100% fantastic sales experiences by answering some questions about your recent purchase.
									</div>
								</div>
								<div class="custSat-form-body-wrapper">
									<svg id="custSat-form-body" version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 600 650" xml:space="preserve">
										<style type="text/css">
	.custSatFormBody0{fill:#607D8B;}
	.custSatFormBody1{fill:#263238;}
	.custSatFormBody2{font-family:'HelveticaNeue-Roman';}
	.custSatFormBody3{font-size:13px;}
	.custSatFormBody4{fill:#FFFFFF;}
	.custSatFormBody5{font-family:'HelveticaNeue-Black';}
	.custSatFormBody6{fill:none;stroke:#263238;stroke-miterlimit:10;}
	.custSatFormBody7{font-size:9px;}
	.custSatFormBody8{fill:none;stroke:#263238;stroke-width:2;stroke-miterlimit:10;}
	.custSatFormBody9{opacity:0.75;fill:#4CAF50;enable-background:new    ;}
	.custSatFormBody10{opacity:0.75;fill:#F44336;enable-background:new    ;}
	.custSatFormBody11{fill:#FFFFFF;stroke:#231F20;stroke-width:5;stroke-miterlimit:10;}
</style>
<rect x="21.2" y="59.4" class="custSatFormBody0" width="557.6" height="28.9"/>
<rect x="21.2" y="293.4" class="custSatFormBody0" width="557.6" height="28.9"/>
<rect x="21.2" y="475.1" class="custSatFormBody0" width="557.6" height="28.9"/>
<text transform="matrix(1 0 0 1 42 135.2)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">1.  The manner in which you were greeted.</text>
<text transform="matrix(1 0 0 1 42 158.2)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">2.  Sincerity and honesty in dealing with</text>
<text transform="matrix(1 0 0 1 42 181.2)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">3.  Consideration of your time</text>
<text transform="matrix(1 0 0 1 42 204.2)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">4.  Ability to listen, understand and  </text>
<text transform="matrix(1 0 0 1 42 219.2)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">     answer your questions</text>
<text transform="matrix(1 0 0 1 42 242.2)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">5.  Knowledge of the product  </text>
<text transform="matrix(1 0 0 1 42 257.2)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">     features and benefits</text>
<text transform="matrix(1 0 0 1 42 280.2)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">6.  Fulfilled all commitments made to you</text>
<text transform="matrix(1 0 0 1 42 360.8667)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">7.  The vehicle and/or payments were </text>
<text transform="matrix(1 0 0 1 42 375.8667)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">     discussed in a thorough manner</text>
<text transform="matrix(1 0 0 1 42 398.8667)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">8.  Explanation of warranty coverages</text>
<text transform="matrix(1 0 0 1 42 421.8667)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">9.  The professional manner in which you </text>
<text transform="matrix(1 0 0 1 42 436.8667)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">     were treated</text>
<text transform="matrix(1 0 0 1 42 459.8667)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">10.Fulfilled all commitments made to you  </text>
<text transform="matrix(1 0 0 1 42 545.5334)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">11. If you’ve contacted this store by phone, </text>
<text transform="matrix(1 0 0 1 42 560.5334)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">      how satisfied are you with the way your </text>
<text transform="matrix(1 0 0 1 42 575.5334)" class="custSatFormBody1 custSatFormBody2 custSatFormBody3">      call was handled?</text>
<text transform="matrix(1 0 0 1 45 79.2)" class="custSatFormBody4 st5 st3">Please rate your SALESPERSON and</text>
<text transform="matrix(1 0 0 1 45 313.2)" class="custSatFormBody4 st5 st3">Please rate your SALE TEAM</text>
<text transform="matrix(1 0 0 1 45 493.8666)" class="custSatFormBody4 st5 st3">More about the buying experience:</text>
<g>
	<line class="custSatFormBody6" x1="41" y1="590.2" x2="559" y2="590.2"/>
	<line class="custSatFormBody6" x1="41" y1="607.2" x2="559" y2="607.2"/>
	<line class="custSatFormBody6" x1="41" y1="624.2" x2="559" y2="624.2"/>
	<line class="custSatFormBody6" x1="41" y1="641.2" x2="559" y2="641.2"/>
</g>
<text transform="matrix(1 0 0 1 304.5732 518.7)" class="custSatFormBody1 scustSatFormBody5 custSatFormBody7">completely </text>
<text transform="matrix(1 0 0 1 312.2732 528.7)" class="custSatFormBody1 scustSatFormBody5 custSatFormBody7">satisfied</text>
<text transform="matrix(1 0 0 1 538.334 523.7)" class="custSatFormBody1 scustSatFormBody5 custSatFormBody7">Poor</text>
<g>
	<rect x="333" y="537.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="548.1" y="537.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="494.3" y="537.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="440.5" y="537.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="386.8" y="537.9" class="custSatFormBody8" width="10" height="10"/>
</g>
<text transform="matrix(1 0 0 1 304.5732 333.7)" class="custSatFormBody1 scustSatFormBody5 custSatFormBody7">completely </text>
<text transform="matrix(1 0 0 1 312.2732 343.7)" class="custSatFormBody1 scustSatFormBody5 custSatFormBody7">satisfied</text>
<text transform="matrix(1 0 0 1 538.334 338.7)" class="custSatFormBody1 scustSatFormBody5 custSatFormBody7">Poor</text>
<g>
	<rect x="333" y="352.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="548.1" y="352.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="494.3" y="352.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="440.5" y="352.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="386.8" y="352.9" class="custSatFormBody8" width="10" height="10"/>
</g>
<text transform="matrix(1 0 0 1 304.5732 103.7)" class="custSatFormBody1 scustSatFormBody5 custSatFormBody7">completely </text>
<text transform="matrix(1 0 0 1 312.2732 113.7)" class="custSatFormBody1 scustSatFormBody5 custSatFormBody7">satisfied</text>
<text transform="matrix(1 0 0 1 538.334 108.7)" class="custSatFormBody1 scustSatFormBody5 custSatFormBody7">Poor</text>
<g>
	<rect x="333" y="122.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="548.1" y="122.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="494.3" y="122.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="440.5" y="122.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="386.8" y="122.9" class="custSatFormBody8" width="10" height="10"/>
</g>
<g>
	<rect x="333" y="149.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="548.1" y="149.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="494.3" y="149.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="440.5" y="149.9" class="custSatFormBody8" width="10" height="10"/>
	<rect x="386.8" y="149.9" class="custSatFormBody8" width="10" height="10"/>
</g>
<g>
	<rect x="333" y="174.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="548.1" y="174.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="494.3" y="174.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="440.5" y="174.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="386.8" y="174.2" class="custSatFormBody8" width="10" height="10"/>
</g>
<g>
	<rect x="333" y="200.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="548.1" y="200.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="494.3" y="200.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="440.5" y="200.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="386.8" y="200.2" class="custSatFormBody8" width="10" height="10"/>
</g>
<g>
	<rect x="333" y="234.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="548.1" y="234.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="494.3" y="234.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="440.5" y="234.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="386.8" y="234.2" class="custSatFormBody8" width="10" height="10"/>
</g>
<g>
	<rect x="333" y="268.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="548.1" y="268.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="494.3" y="268.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="440.5" y="268.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="386.8" y="268.2" class="custSatFormBody8" width="10" height="10"/>
</g>
<g>
	<rect x="333" y="388.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="548.1" y="388.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="494.3" y="388.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="440.5" y="388.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="386.8" y="388.2" class="custSatFormBody8" width="10" height="10"/>
</g>
<g>
	<rect x="333" y="416.5" class="custSatFormBody8" width="10" height="10"/>
	<rect x="548.1" y="416.5" class="custSatFormBody8" width="10" height="10"/>
	<rect x="494.3" y="416.5" class="custSatFormBody8" width="10" height="10"/>
	<rect x="440.5" y="416.5" class="custSatFormBody8" width="10" height="10"/>
	<rect x="386.8" y="416.5" class="custSatFormBody8" width="10" height="10"/>
</g>
<g>
	<rect x="333" y="454.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="548.1" y="454.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="494.3" y="454.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="440.5" y="454.2" class="custSatFormBody8" width="10" height="10"/>
	<rect x="386.8" y="454.2" class="custSatFormBody8" width="10" height="10"/>
</g>
<rect x="300.2" y="89.7" class="custSatFormBody9" width="73.5" height="495.5"/>
<rect x="379.2" y="89.7" class="custSatFormBody10" width="197.7" height="495.5"/>
<circle class="custSatFormBody11" cx="342" cy="107.2" r="102"/>
<g>
	<path d="M273.6,100.4c-0.1,2.2-1,8.7-9.7,9.8c-6.1,0.8-9.5-2.8-10.2-8.4c-0.9-6.8,2.7-13,9.8-13.9c4.7-0.6,9.1,0.9,10,7.2l-6.1,0.8
		c-0.2-2-1.3-3-3.3-2.7c-3.6,0.4-4.4,4.7-4,7.7c0.2,1.7,1,4.4,3.9,4c2-0.3,3-1.8,3.2-3.7L273.6,100.4z"/>
	<path d="M283.8,91.4c4.5-0.6,7.7,1.1,8.2,5.7c0.5,3.9-1,9.6-8,10.5c-4.2,0.5-7.9-1.1-8.5-6.2C274.9,96.5,277.6,92.1,283.8,91.4z
		 M283.8,103.3c2.3-0.3,2.7-3.8,2.5-5.1c-0.2-1.8-0.8-2.8-2.4-2.6c-2.3,0.3-2.7,3.9-2.5,5.5C281.6,102.3,282.1,103.5,283.8,103.3z"
		/>
	<path d="M295.3,90.3l5.6-0.7l-0.2,2h0.1c1-1.6,2.5-2.7,4.5-3s3.8,0.2,4.4,2c1.1-1.7,2.6-2.9,4.7-3.2c3-0.4,5,0.8,5.4,3.9
		c0.1,0.7,0,1.8,0,2.5l-0.8,8.9l-5.8,0.7l0.6-7.5c0-0.3,0.1-1.8,0.1-2.3c-0.1-1-0.7-1.4-1.7-1.3c-1.1,0.1-1.9,0.9-2,2l-0.8,9.5
		l-5.8,0.7l0.7-8.4c0-0.4,0.1-1,0.1-1.4c-0.1-1-0.7-1.3-1.6-1.2c-1.4,0.2-2.1,1.2-2.2,2.6l-0.8,9l-5.8,0.7L295.3,90.3z"/>
	<path d="M323.7,86.7l5.6-0.7l-0.1,1.8h0.1c0.8-1.5,2-2.4,3.8-2.6c4.3-0.5,6,2.9,6.3,5.6c0.6,4.5-1,10-6.2,10.7
		c-1.7,0.2-3.3,0.2-4.9-1.7l-0.5,7l-5.8,0.7L323.7,86.7z M333.6,92.1c-0.2-1.5-0.8-2.7-2.5-2.4c-2.6,0.3-2.6,4.1-2.4,5.4
		c0.1,0.6,0.5,2.5,2.4,2.2C333.5,97.1,333.9,94.1,333.6,92.1z"/>
	<path d="M343.3,78.5l5.8-0.7l-1.7,21.5l-5.8,0.7L343.3,78.5z"/>
	<path d="M366.6,92.3c-0.3,1.1-0.9,5-7.5,5.8c-5.4,0.7-8-2.1-8.4-5.8c-0.9-7,4.2-10,8-10.4c3.4-0.4,7.7,0.9,8.3,5.7
		c0.1,0.8,0.2,1.7,0,2.7l-10.9,1.4c0.2,1.6,0.9,2.9,2.8,2.7c1.3-0.2,1.9-0.8,2.2-1.4L366.6,92.3z M361.4,88c0-0.2,0-0.4,0-0.5
		c-0.1-1.1-1-2-2.5-1.8c-1.6,0.2-2.5,1.3-2.7,2.9L361.4,88z"/>
	<path d="M377.1,80l3.1-0.4l-0.4,3.7l-3.1,0.4l-0.4,5c-0.1,0.5-0.1,1.1-0.1,1.6c0.1,0.5,0.4,0.9,1.3,0.8c0.9-0.1,1.4-0.2,1.9-0.3
		l-0.4,4.3c-1,0.3-2,0.6-3.1,0.8c-1.2,0.2-2.6,0.3-3.7-0.2c-1.1-0.4-1.8-1.6-1.9-2.7c-0.1-0.8,0-1.4,0.1-2.1l0.6-6.4l-2.6,0.3
		l0.4-3.7l2.5-0.3l0.4-4.7l5.8-0.7L377.1,80z"/>
	<path d="M397.1,88.5c-0.3,1.1-0.9,5-7.5,5.8c-5.4,0.7-8-2.1-8.4-5.8c-0.9-7,4.2-10,8-10.4c3.4-0.4,7.7,0.9,8.3,5.7
		c0.1,0.8,0.2,1.7,0,2.7l-10.9,1.4c0.2,1.6,0.9,2.9,2.8,2.7c1.3-0.2,1.9-0.8,2.2-1.4L397.1,88.5z M391.9,84.2c0-0.2,0-0.4,0-0.5
		c-0.1-1.1-1-2-2.5-1.8c-1.6,0.2-2.5,1.3-2.7,2.9L391.9,84.2z"/>
	<path d="M401.5,71.2l5.8-0.7L405.6,92l-5.8,0.7L401.5,71.2z"/>
	<path d="M418.2,91.3c-1,2.7-1.7,4.3-7,4.9c-0.9,0.1-1.8,0.2-2.7,0.2l0.3-4.7c0.5,0,1,0,1.5-0.1c1.2-0.2,2.1-0.3,1.9-1.8l-4.5-13.7
		l5.9-0.7l2.1,9h0.1l2.8-9.6l6-0.8L418.2,91.3z"/>
	<path d="M288.7,127.6c-0.1-0.9-0.4-1.3-1-1.6c-0.5-0.3-1.2-0.3-1.9-0.2c-1.1,0.1-2.5,0.6-2.3,2c0.2,1.6,3.4,1.3,5.5,1.8
		c3.8,0.8,5.3,2.7,5.6,5.2c0.6,5.1-4,8-8.5,8.6c-4.8,0.6-9.4-1.1-9.8-6.4l6.3-0.8c0.1,1.1,0.5,1.8,1.1,2.3c0.6,0.4,1.4,0.4,2.4,0.2
		c1.3-0.2,2.7-1,2.6-2.4c-0.2-1.5-2.4-1.5-5.4-2.1c-2.7-0.5-5.3-1.6-5.7-5.1c-0.6-4.7,3.7-7.5,7.9-8c4.5-0.6,8.7,0.6,9.2,5.8
		L288.7,127.6z"/>
	<path d="M297.2,130.5c0.4-4.2,3.4-5.5,7.2-6c2.8-0.3,7.4-0.6,7.9,3.1c0.3,2.4-0.7,9.5-0.6,10.5c0.3,1.2,0.1,0.6,0.4,1.3l-5.7,0.7
		c-0.2-0.5-0.4-0.9-0.4-1.4h-0.1c-0.9,1.4-2.8,2.2-4.5,2.4c-2.6,0.3-5.1-0.5-5.4-3.4c-0.5-4,2.4-5.5,6.7-6.4c1.6-0.3,4.3-0.4,4-2.3
		c-0.1-1.1-1.1-1.2-2-1.1c-1.2,0.1-1.9,0.7-2.1,1.8L297.2,130.5z M303.8,137.4c2-0.2,2.6-1.8,2.6-4.1c-0.9,0.6-2,0.8-3,1.1
		c-1,0.2-1.8,0.8-1.7,1.9C301.9,137.4,302.9,137.5,303.8,137.4z"/>
	<path d="M322.8,122.7l3.1-0.4l-0.4,3.7l-3.1,0.4l-0.4,5c-0.1,0.5-0.1,1.1-0.1,1.6c0.1,0.5,0.4,0.9,1.3,0.8s1.4-0.2,1.9-0.3
		l-0.4,4.3c-1,0.3-2,0.6-3.1,0.8c-1.2,0.2-2.6,0.3-3.7-0.2c-1.1-0.4-1.8-1.6-1.9-2.7c-0.1-0.8,0-1.4,0.1-2.1l0.6-6.4l-2.6,0.3
		l0.4-3.7l2.5-0.3l0.4-4.7l5.8-0.7L322.8,122.7z"/>
	<path d="M328.2,122l5.8-0.7l-1.3,15.6l-5.8,0.7L328.2,122z M334.1,119.6l-5.8,0.7l0.3-4.2l5.8-0.7L334.1,119.6z"/>
	<path d="M340.8,130.8c0.1,0.6,0.3,1.1,0.7,1.3c0.4,0.2,0.9,0.3,1.6,0.2c1.6-0.2,1.6-1.2,1.6-1.6c-0.1-1.1-1.6-1-3.8-1.1
		c-1,0-4.2-0.1-4.6-3.4c-0.5-4.4,3.2-6.1,6.9-6.5c3.2-0.4,7.3-0.2,7.4,4l-5.2,0.7c0-0.6-0.2-1-0.6-1.2s-0.9-0.3-1.4-0.2
		c-0.8,0.1-1.6,0.5-1.5,1.4c0.1,0.8,0.7,1,1.5,1c4.4,0,6.7,0.7,7.1,3.9c0.4,3.5-2.3,6-7,6.6c-3.3,0.4-7.5,0.1-7.9-4.5L340.8,130.8z"
		/>
	<path d="M354.2,122.3l-2.4,0.3l0.3-3.7l2.3-0.3c0.3-4.6,1.8-6,6.3-6.6c1-0.1,2-0.2,3.1-0.2l-0.3,4c-0.4,0-0.9,0-1.6,0.1
		c-1.1,0.1-1.6,0.6-1.7,2.1l3-0.4l-0.3,3.7l-2.9,0.4l-0.9,12l-5.8,0.7L354.2,122.3z"/>
	<path d="M365.2,117.3l5.8-0.7l-1.3,15.6l-5.8,0.7L365.2,117.3z M371.1,114.9l-5.8,0.7l0.3-4.2l5.8-0.7L371.1,114.9z"/>
	<path d="M389,125.3c-0.3,1.1-0.9,5-7.5,5.8c-5.4,0.7-8-2.1-8.4-5.8c-0.9-7,4.2-10,8-10.4c3.4-0.4,7.7,0.9,8.3,5.7
		c0.1,0.8,0.2,1.7,0,2.7l-10.9,1.4c0.2,1.6,0.9,2.9,2.8,2.7c1.3-0.2,1.9-0.8,2.2-1.4L389,125.3z M383.8,121c0-0.2,0-0.4,0-0.5
		c-0.1-1.1-1-2-2.5-1.8c-1.6,0.2-2.5,1.3-2.7,2.9L383.8,121z"/>
	<path d="M401.8,126.5L401.8,126.5c-0.9,1.6-2.1,2.4-3.8,2.6c-4.9,0.6-6.1-3.6-6.4-5.5c-0.7-5.8,1.8-10.2,6.3-10.8
		c1.8-0.2,3.5,0.1,4.7,1.7l0.6-7.8l5.8-0.7l-1.7,21.5l-5.7,0.7L401.8,126.5z M402.3,119.4c-0.2-1.7-0.9-2.7-2.4-2.6
		c-2.3,0.3-2.7,3.2-2.5,5.4c0.2,1.4,0.9,2.4,2.5,2.2C402.1,124.3,402.5,121.3,402.3,119.4z"/>
</g>
<g>
	<path d="M257.5,323.5l20.8-4.1c7.7-1.5,13.5,1.8,15.4,11.1c1.6,8.5-4.1,17.2-15.1,19.3l-8.7,1.7l-0.2,13.2l-12.8,2.5L257.5,323.5z
		 M270,341.1l4.9-1c5.2-1,6.5-3.3,6-6.1c-0.6-3.2-3.6-3.2-6.3-2.7l-4.4,0.9L270,341.1z"/>
	<path d="M306.9,313.9l12.7-2.5l14.7,40.8l-12.7,2.5l-1.9-5.9l-13.7,2.7l-2.1,6.6l-13.2,2.6L306.9,313.9z M309,341.5l8.1-1.6
		l-3.9-12.3h-0.1L309,341.5z"/>
	<path d="M358.8,317c-0.3-1.7-1.1-2.7-2.1-3.2c-1.1-0.5-2.5-0.5-4-0.2c-2.2,0.4-4.9,1.6-4.3,4.4c0.6,3.2,7,2.1,11.4,2.8
		c7.8,1.2,11.1,4.7,12,9.7c2,10.1-6.9,16.8-16.1,18.6c-9.7,1.9-19.2-0.8-20.8-11.7l12.5-2.4c0.4,2.3,1.3,3.6,2.5,4.5
		c1.3,0.7,2.9,0.5,5,0.1c2.5-0.5,5.4-2.4,4.9-5.2c-0.6-3.1-5-2.6-11.2-3.4c-5.5-0.7-10.9-2.5-12.3-9.5c-1.8-9.5,6.5-15.6,15-17.3
		c9-1.7,17.7,0,19.5,10.5L358.8,317z"/>
	<path d="M398.1,309.4c-0.3-1.7-1.1-2.7-2.1-3.2c-1.1-0.5-2.5-0.5-4-0.2c-2.2,0.4-4.9,1.6-4.3,4.4c0.6,3.2,7,2.1,11.4,2.8
		c7.8,1.2,11.1,4.7,12,9.7c2,10.1-6.9,16.8-16.1,18.6c-9.7,1.9-19.2-0.8-20.8-11.7l12.5-2.4c0.4,2.3,1.3,3.6,2.5,4.5
		c1.3,0.7,2.9,0.5,5,0.1c2.5-0.5,5.4-2.4,4.9-5.2c-0.6-3.1-5-2.6-11.2-3.4c-5.5-0.7-10.9-2.5-12.3-9.5c-1.8-9.5,6.5-15.6,15-17.3
		c9-1.7,17.7,0,19.5,10.5L398.1,309.4z"/>
</g>
<g>
	<path d="M430,320.8l32.5-6.3l-0.1,11.2l-19.5,3.8l-0.1,5.5l16.5-3.2l-0.1,10.4l-16.5,3.2l-0.2,16.7l-13,2.5L430,320.8z"/>
	<path d="M474.7,312.1l12.7-2.5l14.7,40.8l-12.7,2.5l-1.9-5.9l-13.7,2.7l-2.1,6.6l-13.2,2.6L474.7,312.1z M476.8,339.8l8.1-1.6
		l-3.9-12.3h-0.1L476.8,339.8z"/>
	<path d="M505.5,306.1l13-2.5l-0.5,43.7l-13,2.5L505.5,306.1z"/>
	<path d="M525.3,302.3l13-2.5l-0.4,32.5l18.6-3.6l-0.1,11.2l-31.6,6.1L525.3,302.3z"/>
</g>
									</svg>

								</div>
							</div>
						</div>
						<div class="checkbox-wrapper col-xs-4 col-xs-offset-1">
							<div class="checkmark-box">
								<svg id="svgCheckmark" viewBox="0 0 100 100">
									<path id="checkmark" class="check" fill="none"  stroke="#4CAF50" stroke-width="8"  d="M95,18L34,80L6,52"/>
								</svg>
							</div>
							<div class="satisfied">Completely Satisfied</div>
						</div>
						
						<?php $audioCustSat = get_sub_field('custsat_audio');
						if( $audioCustSat ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioCustSat['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>
						
					<?php } ?>
					
					
						
						

					<?php
					//
					//
					// Online Feedback
					//
					if( $layout == 'slide_feedback') { ?> 
					  

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
					
					<?php } ?>
					
					
					
					<?php
					//
					//
					// EPA Recommends
					//
					if( $layout == 'slide_eparecs') { ?> 
					  

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
					
					<?php } ?>	
					
					
					<?php
					//
					//
					// Plastic Sheets
					//
					if( $layout == 'slide_plasticsheet') { ?> 
					  

					<section id="plasticsheets" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-plasticsheet.jpg">
						<div class="row">
							<div class="col-xs-10 col-xs-offset-1">

								<div class="module-wrapper">
									<h3>Today, vehicle manufacturers are spending million’s of dollars to protect vehicles during transit</h3>
								</div>
								
							</div>
						</div>
						
						<?php $audiosheets = get_sub_field('sheets_audio');
						if( $audiosheets ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audiosheets['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>
					
					<?php } ?>	
						
					

					<?php
					//
					//
					// Excess Wear & Tear
					//
					if( $layout == 'slide_weartear') { ?> 
					  

					<section id="wearTear" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg">
						<h2>Excess Wear and Tear Protection</h2>
						<div class="row-main row">
							<div class="col-xs-7 section-desc">
								<div class="module-wrapper">
									<p>Our proprietary formulated polymers form an invisible barrier protecting your interior from damage.</p>
								</div>
							</div>
							<div id="excessivewear-imgMain" class="col-xs-5">
								<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/excesswear/ExcessiveWear.png">
							</div>
						</div>
						<div class="row-withOverlay row">
							<div class="dps-table col-xs-12">
								<div class="table-hdr">
									<div class="col-xs-4">Protection Against</div>
									<div class="col-xs-4">Factory Coverage</div>
									<div class="col-xs-4">Additional Coverage</div>
								</div>
								
								<!-- Row 1 -->
								<div class="table-reg">
									<div class="col-xs-4">Food & Beverage Stains</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 2 -->
								<div class="table-reg">
									<div class="col-xs-4">Dye & Ink Transfer</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 3 -->
								<div class="table-reg">
									<div class="col-xs-4">Pet Stains</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 4 -->
								<div class="table-reg">
									<div class="col-xs-4">Loss of Gloss</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 5 -->
								<div class="table-reg">
									<div class="col-xs-4">Fading</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 6 -->
								<div class="table-reg">
									<div class="col-xs-4">Rips, Tears & Burns</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
							</div>
						</div>
						
						<div class="fragment fade-in">
							<div class="overlayModule">
								<div class="row-imgGrid">
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-fadingcracking.jpg\');"';?>>
										<div class="imgGrid_desc">Fading & Cracking</div>
									</div>
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-coffeespill.jpg\');"';?>>
										<div class="imgGrid_desc">Food & Beverage Stains</div>
									</div>
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-dyeinktransfer.jpg\');"';?>>
										<div class="imgGrid_desc">Dye / Ink Transfer</div>
									</div>
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-lossofgloss.jpg\');"';?>>
										<div class="imgGrid_desc">Loss of Gloss</div>
									</div>
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-petstain.jpg\');"';?>>
										<div class="imgGrid_desc">Pet Stains</div>
									</div>
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-ripstearsburns.jpg\');"';?>>
										<div class="imgGrid_desc">Rip, Tears & Burns</div>
									</div>	
								</div>
							</div>
						</div>
						
						<?php $audioWearTear = get_sub_field('weartear_audio');
						if( $audioWearTear ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioWearTear['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>
					
					<?php } ?>
					
					
					
					<?php
					//
					//
					// Rust Protection
					//
					if( $layout == 'slide_rust') { ?> 
					  

					<section id="rust" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-snowroad.jpg">
						<h2>Rust Inhibitor</h2>
						<div class="row-main row">
							<div class="col-xs-6 section-desc">
								<div class="module-wrapper">
									<p>Rust Inhibitor Protection creates a transparent barrier that resists salt and water.</p>
								</div>
							</div>
							<div id="sound-videoembed" class="col-xs-6">
								<div class="embed-inner">
									<iframe src="https://www.youtube.com/embed/G1y-futmeZ8?rel=0&amp;controls=0&autoplay=1&loop=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								</div>
							</div>
						</div>
						<div class="row-withOverlay row">
							<div class="dps-table col-xs-12">
								<div class="table-hdr">
									<div class="col-xs-4">Protection Against</div>
									<div class="col-xs-4">Factory Coverage</div>
									<div class="col-xs-4">Additional Coverage</div>
								</div>
								
								<!-- Row 1 -->
								<div class="table-reg">
									<div class="col-xs-4">Surface Corrosion Protection</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">5/10 Years</div>
								</div>
								
								<!-- Row 2 -->
								<div class="table-reg">
									<div class="col-xs-4">Resists Salt & Water</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">5/10 Years</div>
								</div>
								
								<!-- Row 3 -->
								<div class="table-reg">
									<div class="col-xs-4">Bonds To Metal Surfaces</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">5/10 Years</div>
								</div>
								
								<!-- Row 4 -->
								<div class="table-reg">
									<div class="col-xs-4">Electronic Fogging Method</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">5/10 Years</div>
								</div>
								
								<!-- Row 5 -->
								<div class="table-reg">
									<div class="col-xs-4">Meets Military Specifications</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">5/10 Years</div>
								</div>
							</div>
						</div>
						
						<div class="fragment fade-in">
							<div class="overlayModule">
								<div class="row">
									<div class="imgGrid col-xs-12">
										
										<div class="row-imgGrid">
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/rust/rust1.jpg\');"';?>>
												<div class="imgGrid_desc">Corrosion Perforation</div>
											</div>
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/rust/rust2.jpg\');"';?>>
												<div class="imgGrid_desc">Rust Spot</div>
											</div>
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/rust/rust3.jpg\');"';?>>
												<div class="imgGrid_desc">Surface Corrosion</div>
											</div>
										</div>
										
									</div>	
								</div>
							</div>
						</div>
						
						<?php $audioRust = get_sub_field('rust_audio');
						if( $audioRust ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioRust['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>
					
					<?php } ?>
					
					
					
					<?php
					//
					//
					// Sound Inhibitor
					//
					if( $layout == 'slide_sound') { ?> 
					  

					<section id="soundinibitor" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg" data-state="sound">
						
						<h2>Sound Inhibitor</h2>
						<div class="row">
							<div class="col-xs-6 section-desc">
								<div class="module-wrapper">
									<p>Sound Protection creates a permanent underbody barrier that resists salt and water protecting against peeling, chipping and cracking due to drying out.</p>
								</div>
							</div>
							<div id="sound-videoembed" class="col-xs-6">
								<div class="embed-inner">
									<iframe src="https://www.youtube.com/embed/23bhAyYymOc?rel=0&amp;controls=0&autoplay=1&loop=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								</div>
							</div>
						</div>
						<section>
							<div class="row">
								<div class="dps-table col-xs-12">
									<div class="table-hdr">
										<div class="col-xs-4">Protection Against</div>
										<div class="col-xs-4">Factory Coverage</div>
										<div class="col-xs-4">Additional Coverage</div>
									</div>
									
									<!-- Row 1 -->
									<div class="table-reg">
										<div class="col-xs-4">Professional Formula</div>
										<div class="col-xs-4">Not Covered</div>
										<div class="col-xs-4">7 Years & Renewable</div>
									</div>
									
									<!-- Row 2 -->
									<div class="table-reg">
										<div class="col-xs-4">Meets Military Specifications</div>
										<div class="col-xs-4">Not Covered</div>
										<div class="col-xs-4">7 Years & Renewable</div>
									</div>
									
									<!-- Row 3 -->
									<div class="table-reg">
										<div class="col-xs-4">Thermal Insulation</div>
										<div class="col-xs-4">Not Covered</div>
										<div class="col-xs-4">7 Years & Renewable</div>
									</div>
									
									<!-- Row 4 -->
									<div class="table-reg">
										<div class="col-xs-4">Will Not Crack or Peel</div>
										<div class="col-xs-4">Not Covered</div>
										<div class="col-xs-4">7 Years & Renewable</div>
									</div>
									
									<!-- Row 5 -->
									<div class="table-reg">
										<div class="col-xs-4">Will Not Flake</div>
										<div class="col-xs-4">Not Covered</div>
										<div class="col-xs-4">7 Years & Renewable</div>
									</div>
									
									<!-- Row 6 -->
									<div class="table-reg">
										<div class="col-xs-4">Black Protective Coating</div>
										<div class="col-xs-4">Not Covered</div>
										<div class="col-xs-4">7 Years & Renewable</div>
									</div>
								</div>
							</div>
						</section>
						<section>
							<div class="row">
								<div class="imgGrid col-xs-12">
									
									<div class="row-imgGrid">
										<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/sound/sound-underbody.jpg\');"';?>>
											<div class="imgGrid_desc">Vehicle Underbody</div>
										</div>
										<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/sound/sound-brakelines.jpg\');"';?>>
											<div class="imgGrid_desc">Vehicle Brake Lines</div>
										</div>
										<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/sound/sound-suspensioncomponents.jpg\');"';?>>
											<div class="imgGrid_desc">Vehicle Suspension Components</div>
										</div>
									</div>
																		
								</div>
							</div>
						</section>
						
						<?php $audioSound = get_sub_field('sound_audio');
						if( $audioSound ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioSound['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>
					
					<?php } ?>
					
					
					
					<?php
					//
					//
					// Interior Protection with Pictures
					//
					if( $layout == 'slide_intpro_pic') { ?> 
					  

					<section id="interiorprotection_pictures" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg" data-state="intpropic">
						
						<h2>Interior Protection</h2>
						
						<div class="row">
							<div class="imgGrid col-xs-12">
								
								<div class="row-imgGrid">
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/interiorprotection/int-kid.jpg\');"';?>>
										<div class="imgGrid_desc">Children</div>
									</div>
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/interiorprotection/int-tear.jpg\');"';?>>
										<div class="imgGrid_desc">Rip, Tears & Burns</div>
									</div>
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-coffeespill.jpg\');"';?>>
										<div class="imgGrid_desc">Food & Beverage Stains</div>
									</div>
								</div>
								
								<div class="row-imgGrid">
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/interiorprotection/int-stain.jpg\');"';?>>
										<div class="imgGrid_desc">Stains</div>
									</div>
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/interiorprotection/int-pets.jpg\');"';?>>
										<div class="imgGrid_desc">Pets</div>
									</div>
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/interiorprotection/int-holes.jpg\');"';?>>
										<div class="imgGrid_desc">Holes</div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="extraCopy col-xs-10 col-xs-offset-1">
								Stains and spills can be a hassle to remove, <span>and your factory warranties don’t protect against them.</span>
							</div>
						</div>
						
						
						<?php $audioIntProPic = get_sub_field('intpro_pic_audio');
						if( $audioIntProPic ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioIntProPic['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>
					
					<?php } ?>
					
					
					
					
					<?php
					//
					//
					// Interior Protection with Table
					//
					if( $layout == 'slide_intpro_table') { ?> 
					  

					<section id="interiorprotection_table" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg" data-state="intprotable">
						
						<h2>Interior Protection</h2>
						

						<div class="row">
							<div class="dps-table col-xs-12">
								<div class="table-hdr">
									<div class="col-xs-4">Protection Against</div>
									<div class="col-xs-4">Factory Coverage</div>
									<div class="col-xs-4">Additional Coverage</div>
								</div>
								
								<!-- Row 1 -->
								<div class="table-reg">
									<div class="col-xs-4">Food & Beverage Stains</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 2 -->
								<div class="table-reg">
									<div class="col-xs-4">Odors from Mold and Mildew</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 3 -->
								<div class="table-reg">
									<div class="col-xs-4">Oil-based Stains</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 4 -->
								<div class="table-reg">
									<div class="col-xs-4">Fading</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 5 -->
								<div class="table-reg">
									<div class="col-xs-4">Chewing Gum</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 6 -->
								<div class="table-reg">
									<div class="col-xs-4">Inks & Dyes</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 7 -->
								<div class="table-reg">
									<div class="col-xs-4">Lipstick & Makeup</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 8 -->
								<div class="table-reg">
									<div class="col-xs-4">Crayons</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 9 -->
								<div class="table-reg">
									<div class="col-xs-4">Urine & Vomit</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 10 -->
								<div class="table-reg">
									<div class="col-xs-4">Blood</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 11 -->
								<div class="table-reg">
									<div class="col-xs-4">Pet Stains</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 12 -->
								<div class="table-reg">
									<div class="col-xs-4">Loose Seam Stitching</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 13 -->
								<div class="table-reg">
									<div class="col-xs-4">Punctures or Tears</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
							</div>
						</div>
						<div class="fragment fade-in">
							<div class="overlayModule">
								<div class="row">
									<div class="imgGrid col-xs-12">
										
										<div class="row-imgGrid">
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-fadingcracking.jpg\');"';?>>
												<div class="imgGrid_desc">Fading & Cracking</div>
											</div>
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-coffeespill.jpg\');"';?>>
												<div class="imgGrid_desc">Food & Beverage Stains</div>
											</div>
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-dyeinktransfer.jpg\');"';?>>
												<div class="imgGrid_desc">Dye / Ink Transfer</div>
											</div>
										</div>
										
										<div class="row-imgGrid">
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-lossofgloss.jpg\');"';?>>
												<div class="imgGrid_desc">Loss of Gloss</div>
											</div>
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-petstain.jpg\');"';?>>
												<div class="imgGrid_desc">Pet Stains</div>
											</div>
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/excesswear/int-ripstearsburns.jpg\');"';?>>
												<div class="imgGrid_desc">Rip, Tears & Burns</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<?php $audioIntProTable = get_sub_field('intpro_table_audio');
						if( $audioIntProTable ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioIntProTable['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>
					
					<?php } ?>
					
					
					<?php
					//
					//
					// Exterior Protection with Table
					//
					if( $layout == 'slide_extpro_table') { ?> 
					  

					<section id="exteriorprotection_table" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-interior.jpg" data-state="extprotable">
						
						<h2>Exterior Protection</h2>
						
						
						<div class="row">
							<div class="dps-table col-xs-12">
								<div class="table-hdr">
									<div class="col-xs-4">Protection Against</div>
									<div class="col-xs-4">Factory Coverage</div>
									<div class="col-xs-4">Additional Coverage</div>
								</div>
								
								<!-- Row 1 -->
								<div class="table-reg">
									<div class="col-xs-4">Weather-induced Fading</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 2 -->
								<div class="table-reg">
									<div class="col-xs-4">Loss of Gloss</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 3 -->
								<div class="table-reg">
									<div class="col-xs-4">Hard Water Etching</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 4 -->
								<div class="table-reg">
									<div class="col-xs-4">Industrial Fallout</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 5 -->
								<div class="table-reg">
									<div class="col-xs-4">Bird Waste</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 6 -->
								<div class="table-reg">
									<div class="col-xs-4">Acid Rain</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 7 -->
								<div class="table-reg">
									<div class="col-xs-4">Tree Sap</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 8 -->
								<div class="table-reg">
									<div class="col-xs-4">Oxidation</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 9 -->
								<div class="table-reg">
									<div class="col-xs-4">Insects</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 10 -->
								<div class="table-reg">
									<div class="col-xs-4">Road Salt</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 11 -->
								<div class="table-reg">
									<div class="col-xs-4">De-Icing Agents</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 12 -->
								<div class="table-reg">
									<div class="col-xs-4">Sand Abrasion</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
								<!-- Row 13 -->
								<div class="table-reg">
									<div class="col-xs-4">Accidental Paint Over Spray</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">7 Years & Renewable</div>
								</div>
								
							</div>
						</div>
						<div class="fragment fade-in">
							<div class="overlayModule">
								<div class="row">
									<div class="imgGrid col-xs-12">
										
										<div class="row-imgGrid">
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-acidrain.jpg\');"';?>>
												<div class="imgGrid_desc">Acid Rain</div>
											</div>
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-birddroppings.jpg\');"';?>>
												<div class="imgGrid_desc">Bird Droppings</div>
											</div>
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-fading.jpg\');"';?>>
												<div class="imgGrid_desc">Fading</div>
											</div>
										</div>
										
										<div class="row-imgGrid">
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-etching.jpg\');"';?>>
												<div class="imgGrid_desc">Hard Water Etching</div>
											</div>
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-rust.jpg\');"';?>>
												<div class="imgGrid_desc">Surface Rust</div>
											</div>
											<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/exteriorprotection/ep-treesap.jpg\');"';?>>
												<div class="imgGrid_desc">Tree Sap</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						
						<?php $audioExtProTable = get_sub_field('extpro_table_audio');
						if( $audioExtProTable ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioExtProTable['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>
					
					<?php } ?>
						
						
						
					<?php
					//
					//
					// Window Protection & Privacy
					//
					if( $layout == 'slide_window') { ?> 
					  

					<section id="window-protection" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-snowroad.jpg">
						
						<h2>Window Protection & Privacy</h2>
						<div class="row">
							<div class="col-xs-7 section-desc">
								<div class="module-wrapper">
										<div class="col-xs-6">
											<img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_superior_heat_rejection.png">
											<span>Superior Heat Rejection</span>
										</div>
										<div class="col-xs-6">
											<img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_excellent_uv_rejection.png">
											<span>Excellent UV Rejection</span>
										</div>
										<div class="col-xs-6">
											<img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_wont_interfere_electronics.png">
											<span>Clear & Easy Connectivity</span>
										</div>
										<div class="col-xs-6">
											<img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_enhanced_style.png">
											<span>Custom Style</span>
										</div>
										<div class="col-xs-6">
											<img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_protect_interior_fading.png">
											<span>Help Reduce Fading</span>
										</div>
										<div class="col-xs-6">
											<img class="window_icon" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/auto_increase_privacy.png">
											<span>Help Increase Privacy</span>
										</div>
								</div>
							</div>
							<div class="col-xs-5">
								<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/windowprotection/tint2.jpg">
							</div>
						</div>
						
						<div class="row">
							<div class="imgGrid col-xs-12">
								<div class="row-imgGrid">
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/windowprotection/tint-style.jpg\');"';?>>
										<div class="imgGrid_desc">Enhanced Style and Appearance</div>
									</div>
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/windowprotection/tint-uvrays.jpg\');"';?>>
										<div class="imgGrid_desc">Block Dangerous UV Rays</div>
									</div>
									<div class="col-xs-4" <?php echo 'style="background-image: url(\''.get_template_directory_uri().'/img/windowprotection/tint-glare.jpg\');"';?>>
										<div class="imgGrid_desc">Reduce Heat and Distracting Glare</div>
									</div>
								</div>
								
							</div>
						</div>
						
						<?php $audioWindow = get_sub_field('window_audio');
						if( $audioWindow ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioWindow['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>
					
					<?php } ?>
						
						
						

					<?php 
					//
					//
					// Additional Coverage Package
					//
					if( $layout == 'slide_addcov') { ?>
					  

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
													$n += 1; ?>
													<td style="width: <?php echo $width_colOther; ?>%;">
														<?php $colNum = "col".$n; $priceColNum = 'price_col'.$n;
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
												$priceColNum2 = 'price_col'.$n2; ?>
												<td style="width: <?php echo $width_colOther; ?>%;">$<span id="price_col<?php echo $n2; ?>-beforeDiscount"><?php echo $$priceColNum2; ?></span></td>
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
									<div style="width: <?php echo $width_colOther; ?>%;">$<span id="price_col<?php echo $n3; ?>_discount"></span></div>
								<?php endif; 
							} ?>
						</div>
						<div id="row-todaysprice" class="">
							<div style="width: <?php echo $width_col1; ?>%;">TODAY'S PRICE</div>
							<?php $n4 = 0;
				    	foreach ($coverageColumns as $cov) {
								if($coverageColumns[$n4]) : 
						    	$n4 += 1; ?>
									<div style="width: <?php echo $width_colOther; ?>%;">$<span id="price_col<?php echo $n4; ?>_todaysprice"></span></div>
								<?php endif; 
							} ?>
						</div>
						<?php if( $discountChoosen ) { ?>
						<div id="addcov-buttons" class="row">
							<?php if( $discountChoosen && in_array('veterans', $discountChoosen) ) { ?>
								<button id="discount-veteran" type="button" class="btn btn-primary" data-discount="<?php echo $veteran ?>">
									<span>
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											 width="100px" height="50px" viewBox="0 0 100 50" style="enable-background:new 0 0 100 50;" xml:space="preserve">
										<style type="text/css">
											.military0{fill:#F0F0F0;}
											.military1{fill:#D80027;}
											.military2{fill:#101D7A;}
										</style>
										<rect y="0" class="military0" width="100.1" height="50"/>
										<g>
											<rect y="6.2" class="military1" width="100.1" height="6.2"/>
											<rect y="18.7" class="military1" width="100.1" height="6.2"/>
											<rect y="31.2" class="military1" width="100.1" height="6.2"/>
											<rect y="43.7" class="military1" width="100.1" height="6.2"/>
										</g>
										<rect y="0" class="military2" width="37.5" height="26.9"/>
										<g>
											<polygon class="military0" points="14.6,11 14,12.9 12.1,12.9 13.6,14 13,15.9 14.6,14.7 16.2,15.9 15.6,14 17.2,12.9 15.2,12.9 	"/>
											<polygon class="military0" points="15.2,19.6 14.6,17.7 14,19.6 12.1,19.6 13.6,20.7 13,22.6 14.6,21.4 16.2,22.6 15.6,20.7 17.2,19.6 	"/>
											<polygon class="military0" points="7,19.6 6.4,17.7 5.8,19.6 3.8,19.6 5.4,20.7 4.8,22.6 6.4,21.4 7.9,22.6 7.3,20.7 8.9,19.6 	"/>
											<polygon class="military0" points="6.4,11 5.8,12.9 3.8,12.9 5.4,14 4.8,15.9 6.4,14.7 7.9,15.9 7.3,14 8.9,12.9 7,12.9 	"/>
											<polygon class="military0" points="14.6,4.3 14,6.2 12.1,6.2 13.6,7.3 13,9.2 14.6,8 16.2,9.2 15.6,7.3 17.2,6.2 15.2,6.2 	"/>
											<polygon class="military0" points="6.4,4.3 5.8,6.2 3.8,6.2 5.4,7.3 4.8,9.2 6.4,8 7.9,9.2 7.3,7.3 8.9,6.2 7,6.2 	"/>
											<polygon class="military0" points="22.9,11 22.3,12.9 20.3,12.9 21.9,14 21.3,15.9 22.9,14.7 24.5,15.9 23.9,14 25.4,12.9 23.5,12.9 	"/>
											<polygon class="military0" points="23.5,19.6 22.9,17.7 22.3,19.6 20.3,19.6 21.9,20.7 21.3,22.6 22.9,21.4 24.5,22.6 23.9,20.7 25.4,19.6 	"/>
											<polygon class="military0" points="31.7,19.6 31.1,17.7 30.5,19.6 28.6,19.6 30.2,20.7 29.6,22.6 31.1,21.4 32.7,22.6 32.1,20.7 33.7,19.6 	"/>
											<polygon class="military0" points="31.1,11 30.5,12.9 28.6,12.9 30.2,14 29.6,15.9 31.1,14.7 32.7,15.9 32.1,14 33.7,12.9 31.7,12.9 	"/>
											<polygon class="military0" points="22.9,4.3 22.3,6.2 20.3,6.2 21.9,7.3 21.3,9.2 22.9,8 24.5,9.2 23.9,7.3 25.4,6.2 23.5,6.2 	"/>
											<polygon class="military0" points="31.1,4.3 30.5,6.2 28.6,6.2 30.2,7.3 29.6,9.2 31.1,8 32.7,9.2 32.1,7.3 33.7,6.2 31.7,6.2 	"/>
										</g>
										<path class="military2" d="M74.4,13.8c0,0-0.9,3.4,0,5.6c0,0,0.3,2.9,0.7,4.7l2.6,0.7l-0.1,2.1l-9.8,1l-3,2.6l-4.9,1.3l2.4-6.7l-0.4-1
											l3.2-0.7c0,0,3.2-2.1,4.3-4.8c0,0-0.6-0.8-1.8,0.2c0,0,3-4.3,3.6-6.2c0,0-0.2-0.4-0.8-0.7l0.4-0.8c0,0-0.4-0.3-1.3-0.6l-0.8,0.7
											l-1-0.2c0,0-1.1,0.5-2,1.2c0,0-0.2-0.1-0.7-0.3c0,0-5.3,3.1-8.6,11l-4.3-0.3c0,0-3.2,7.6-4.3,12.9c0,0,1.4,2.9,3.2,3.6
											c0,0,11,0.7,15.3,1.9L67,50l33-0.1l-0.1-18.5l-10.7-4.5l-0.8-3.3l-1.7,0.1c0,0,1-2.1,2.9-5.2c0,0,0.7-2.3,0.6-4.5c0,0,2.4,0.6,3.3-1
											c0,0,3-3.6-8.6-9.7c0,0-14.5-7.7-13,0.8l1.7,3.3l-0.4,1.5l-2.5,1l0.1,0.8c0,0,0.4,0.8,3.1,1.5L74.4,13.8z"/>
										</svg>									</span>
								</button>
							<?php }
								if( $discountChoosen && in_array('costcosams', $discountChoosen) ) { ?>
								<button id="discount-costcosams" type="button" class="btn btn-primary" data-discount="<?php echo $costcosams ?>">
									<span>
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="250px" height="50px" viewBox="0 0 250 50" style="enable-background:new 0 0 250 50;" xml:space="preserve">
									<style type="text/css">
										.costco0{fill:#FFFFFF;}
										.costco1{fill:#005DAA;}
										.costco2{fill:#E31837;}
										.costco3{fill:#005291;}
									</style>
									<title>Group 2</title>
									<g>
										<path id="Shape" class="costco0" d="M169.8,11.4c-2.9-3.5-8-5.5-14.1-5.5c-6.4,0-12.1,2.2-16.1,5.7l0.6-4.1L138.6,7
											c-2.4-0.7-5.1-1.1-7.8-1.1c-4.6,0-9,1.4-12.6,3.8l1-3.4H91.6l-0.3,1.1c-2.5-1-5.1-1.5-8.2-1.5c-5.7,0-11.8,2.2-15,6.5
											c-0.2-0.3-0.4-0.6-0.7-0.9C64.5,8,59.4,6,53.3,6c-6.2,0-11.8,2-15.7,5.4L39.1,2l-1.7-0.5c-3-0.9-6.3-1.3-9.6-1.3
											C15.6,0,4.6,7.7,2.7,17.5c-0.8,4.2,0.1,8.2,2.7,11.4c2.2,2.7,5.5,4.6,9.4,5.6h-12v15.3h61.1l0.1-0.2v0.2h7.3l1-1.6L72,49.9h16.6
											l0.2-1.3c1.5,0.9,3.4,1.5,5.5,1.5c2,0,3.8-0.4,5.3-1.1l-0.2,0.9h9.9h3.3h10.1v-0.2c1.1,0.2,2.2,0.4,3.3,0.4c0.7,0,1.3-0.1,2-0.2
											h8.9l0.7-1.4h0.6l0.2,1.4h4.1h5.5h4.4h3.3h10.1l1.4-7.2h-0.5l0.2-1h0.4l1.4-7.2h-0.8c0.6-0.6,1.1-1.3,1.2-2.1c0.2-1-0.1-2-0.7-2.7
											c-0.2-0.2-0.4-0.4-0.5-0.5c2.2-2.2,3.7-4.9,4.3-8C172.9,17.5,172.1,14.1,169.8,11.4L169.8,11.4z M154,42.2h-0.8l1.3-6.7
											c0.3,0,0.6-0.1,0.9-0.1L154,42.2L154,42.2z M134.4,20.5c-0.1,0.4-0.1,0.9-0.2,1.3c-1.8,1.2-3.6,1.8-5.4,1.8c-1.3,0-2.3-0.4-2.9-1.1
											c-0.3-0.4-0.4-0.8-0.3-1.3c0.3-1.7,2.6-3.2,5-3.2c1.4,0,2.8,0.5,4.1,1.6C134.5,19.8,134.4,20.1,134.4,20.5L134.4,20.5z M136.2,34.5
											l-0.9,1.5l-0.8-0.4c-0.5-0.3-1-0.5-1.6-0.7c0.4-0.1,0.8-0.2,1.1-0.3l1.1-0.4l1-4.5c0.1,0.2,0.3,0.4,0.4,0.6
											c1.6,1.9,3.8,3.3,6.5,4.3L136.2,34.5L136.2,34.5L136.2,34.5z M145.4,35.2l-0.4,1.9l-0.5-2.1C144.8,35,145.1,35.1,145.4,35.2
											L145.4,35.2z M154.2,18.2c1.1,0,2,0.3,2.4,0.8s0.4,1.1,0.3,1.6c-0.4,1.8-2.3,3.1-4.6,3.1c-1.2,0-2.1-0.3-2.5-0.8
											c-0.3-0.4-0.4-0.9-0.3-1.5C149.9,19.8,151.6,18.2,154.2,18.2L154.2,18.2z M102.2,35.9c-0.3-0.2-0.7-0.4-1-0.6h1.2L102.2,35.9
											L102.2,35.9z M95.8,42.2c-0.1,0.1-0.4,0.2-0.7,0.2C95.3,42.3,95.5,42.2,95.8,42.2L95.8,42.2z M94,18.4l-1.4,4.5
											c-0.1-1.2-0.5-2.3-1.1-3.3c-0.3-0.4-0.6-0.8-0.9-1.1L94,18.4L94,18.4z M54.4,20.6c-0.4,1.8-2.3,3.1-4.6,3.1c-1.2,0-2.1-0.3-2.5-0.8
											C47,22.5,46.9,22,47,21.4c0.3-1.6,2-3.2,4.6-3.2c1.1,0,2,0.3,2.4,0.8C54.6,19.5,54.5,20.2,54.4,20.6L54.4,20.6z M70.3,35.3
											L70.3,35.3L70.3,35.3L70.3,35.3L70.3,35.3z M90.7,29.3l-1.6,5.3h-6.2C86.1,33.5,88.9,31.8,90.7,29.3L90.7,29.3z M91.4,35.3h0.3
											c-0.1,0-0.3,0.1-0.4,0.2L91.4,35.3L91.4,35.3z M25.2,21.5c-1.8,0-3.3-0.6-4.1-1.5c-0.5-0.6-0.6-1.2-0.5-1.9
											c0.5-2.3,3.5-4.2,6.7-4.2c2.1,0,4.1,0.8,6,2.4c-0.5,1-0.9,2-1.2,3C29.8,20.8,27.6,21.5,25.2,21.5L25.2,21.5z M61.4,32.4l2,0.9
											c1.1,0.5,2.3,0.9,3.6,1.3h-3.7l-0.4,0.8v-0.8h-6.4C58.2,34,59.9,33.3,61.4,32.4L61.4,32.4z M110.1,42.2l1.4-7.6h-7l4.9-16.2
											l1.5,0.1c-0.3,0.7-0.5,1.5-0.7,2.3c-0.7,3.6,0.1,7.1,2.4,9.8c1.5,1.8,3.5,3.2,5.9,4.1h-6.2l-1.4,7.6L110.1,42.2L110.1,42.2
											L110.1,42.2z M31.7,34l1.1-0.4l0.9-3.9c0.1,0.2,0.3,0.4,0.4,0.6c1.6,1.9,3.8,3.3,6.5,4.3H29.5C30.3,34.4,31.1,34.2,31.7,34L31.7,34
											z M158.9,34.5c0.9-0.3,1.8-0.6,2.6-1c0.1,0.3,0.3,0.6,0.5,0.8l0.1,0.1h-3.2V34.5z"/>
										<path id="Shape_1_" class="costco1" d="M60.9,36.6l0.4,6.7h0.1c0.2-0.7,0.5-1.4,0.8-2.1l2.3-4.6h3.8l0.6,6.7H69c0.2-0.7,0.4-1.3,0.7-2
											l2.3-4.7h5.1l-6.9,11.2h-4.4l-0.4-6.1h-0.2c-0.2,0.6-0.3,1.1-0.6,1.7l-2.2,4.4h-4.2l-2.4-11.2H60.9L60.9,36.6z"/>
										<polygon id="Shape_2_" class="costco1" points="76.7,36.6 81.4,36.6 80.7,40.4 83.7,40.4 84.4,36.6 89.1,36.6 87,47.8 82.3,47.8 
											83,43.9 80,43.9 79.3,47.8 74.5,47.8 	"/>
										<path id="Shape_3_" class="costco1" d="M102.9,42.2c-0.7,3.6-4.4,5.8-8.5,5.8s-7-2.2-6.4-5.8c0.7-3.5,4.5-5.8,8.6-5.8
											C100.7,36.4,103.6,38.7,102.9,42.2L102.9,42.2z M92.9,42.3c-0.2,1.3,0.6,2.2,2.1,2.2s2.7-0.9,2.9-2.2c0.2-1.2-0.5-2.2-2.1-2.2
											C94.3,40.1,93.2,41.1,92.9,42.3L92.9,42.3z"/>
										<polygon id="Shape_4_" class="costco1" points="104,36.6 108.9,36.6 107.4,44.2 111.6,44.2 110.9,47.8 101.9,47.8 	"/>
										<path id="Shape_5_" class="costco1" d="M123.1,43.8l0.2,0.2c0.8,0.6,1.7,1,2.9,1c0.5,0,1.3-0.2,1.4-0.7s-0.5-0.5-1-0.6l-1-0.1
											c-1.9-0.3-3.3-1.2-3-3c0.5-2.7,3.7-4.2,6.6-4.2c1.5,0,2.9,0.3,4.1,1l-1.9,2.9c-0.8-0.5-1.6-0.9-2.7-0.9c-0.4,0-1.1,0.1-1.2,0.6
											c-0.1,0.4,0.5,0.5,0.9,0.5l1.1,0.2c2,0.4,3.3,1.3,3,3.2c-0.5,2.7-3.7,4-6.6,4c-1.7,0-3.6-0.4-5-1L123.1,43.8L123.1,43.8z"/>
										<path id="Shape_6_" class="costco1" d="M140,43.8l-0.2-2c0-0.5,0-1,0-1.4h-0.2l-1.5,3.4H140L140,43.8z M135.7,47.8h-5.2l6.8-11.2h5.4
											l2.7,11.2h-5.2l-0.2-1.4h-3.7L135.7,47.8L135.7,47.8z"/>
										<polygon id="Shape_7_" class="costco1" points="147.2,36.6 152.1,36.6 150.6,44.2 154.7,44.2 154,47.8 145,47.8 	"/>
										<polygon id="Shape_8_" class="costco1" points="157.1,36.6 166.1,36.6 165.5,39.7 161.4,39.7 161.2,40.7 165,40.7 164.4,43.7 
											160.7,43.7 160.5,44.8 164.7,44.8 164.1,47.8 154.9,47.8 	"/>
										<g id="Shape_9_">
											<polygon class="costco2" points="90.6,16.4 96.8,16.2 91.6,33.3 102.7,33.3 107.9,16.2 114,16.4 116.4,8.3 93.1,8.3 		"/>
											<path class="costco2" d="M67.7,20.9c-1.6,8-10.1,12.8-19.4,12.8s-16-4.8-14.4-12.8c1.5-7.9,10.1-13,19.4-13S69.2,13,67.7,20.9
												L67.7,20.9z M45,21c-0.5,2.9,1.4,4.8,4.8,4.8s6.1-2,6.6-4.8c0.5-2.6-1.2-4.9-4.8-4.9C48.2,16.1,45.6,18.3,45,21L45,21z"/>
											<path class="costco2" d="M64.2,31.4c3.2,1.4,7.5,2.3,11.3,2.3c6.6,0,13.8-3,15-8.9c0.8-4.2-2.2-6.3-6.7-7.2l-2.5-0.4
												c-0.8-0.2-2.2-0.3-2-1.2c0.2-1,1.7-1.3,2.6-1.3c2.4,0,4.4,0.8,6.1,1.9l4.2-6.4C89.5,8.7,86.4,8,82.9,8c-6.6,0-13.9,3.3-15,9.2
												c-0.8,3.9,2.5,6,6.7,6.6l2.2,0.3c1,0.2,2.4,0.3,2.2,1.4c-0.2,1.1-2,1.5-3.1,1.5c-2.6,0-4.7-1-6.5-2.3l-0.5-0.4L64.2,31.4
												L64.2,31.4z"/>
											<path class="costco2" d="M138,8.9c-2.2-0.7-4.7-1-7.3-1c-9,0-17.1,5.8-18.5,13.1c-1.4,7.1,4.4,12.7,13.1,12.7c2,0,6.2-0.3,8.1-1
												l2.1-9.3c-2.1,1.4-4.3,2.3-6.8,2.3c-3.3,0-5.8-2.1-5.2-4.9c0.5-2.7,3.7-4.9,7-4.9c2.5,0,4.5,1.2,6,2.5L138,8.9L138,8.9z"/>
											<path class="costco2" d="M155.8,7.9c-9.3,0-17.9,5.1-19.4,13c-1.6,8,5.1,12.8,14.4,12.8c9.3,0,17.8-4.8,19.4-12.8
												C171.7,13,165,7.9,155.8,7.9L155.8,7.9z M154.2,16.1c3.5,0,5.3,2.2,4.8,4.9c-0.5,2.9-3.3,4.8-6.6,4.8c-3.4,0-5.3-2-4.8-4.8
												C148,18.3,150.7,16.1,154.2,16.1L154.2,16.1z"/>
											<path class="costco2" d="M36.8,3.3c-2.8-0.8-5.9-1.2-9-1.2c-11.2,0-21.4,7-23.1,15.8c-1.8,8.6,5.4,15.3,16.2,15.3
												c2.5,0,7.7-0.4,10.1-1.2l2.7-11.3c-2.6,1.7-5.3,2.8-8.5,2.8c-4.1,0-7.2-2.6-6.5-5.9s4.6-5.9,8.7-5.9c3.1,0,5.6,1.4,7.5,3L36.8,3.3
												L36.8,3.3z"/>
											<path class="costco2" d="M163.3,32.1c0.2-0.9,1.1-1.6,2.2-1.6c1,0,1.8,0.7,1.6,1.6c-0.2,0.9-1.1,1.6-2.2,1.6
												C163.9,33.6,163.2,32.9,163.3,32.1L163.3,32.1z M166.6,32.1c0.1-0.7-0.4-1.2-1.2-1.2s-1.5,0.5-1.6,1.2c-0.1,0.7,0.4,1.2,1.2,1.2
												C165.8,33.2,166.5,32.8,166.6,32.1L166.6,32.1z M165.9,32.9h-0.5l-0.3-0.7h-0.3l-0.1,0.7h-0.4l0.3-1.7h1c0.4,0,0.7,0.1,0.6,0.5
												c-0.1,0.3-0.3,0.4-0.5,0.4L165.9,32.9L165.9,32.9z M165.3,31.9c0.2,0,0.4,0,0.4-0.2c0-0.1-0.2-0.1-0.4-0.1h-0.4l-0.1,0.3
												L165.3,31.9L165.3,31.9z"/>
										</g>
										<polygon id="Shape_10_" class="costco1" points="5.4,47.8 57.3,47.8 57.3,47.8 57.3,47.8 56.6,45 5.4,45 	"/>
										<polygon id="Shape_11_" class="costco1" points="5.4,43.8 56.4,43.8 55.7,40.9 5.4,40.9 	"/>
										<polygon id="Shape_12_" class="costco1" points="5.4,39.7 55.4,39.7 55.2,38.6 54.7,36.6 5.4,36.6 	"/>
										<polygon id="Shape_13_" class="costco1" points="113.9,36.6 123,36.6 122.4,39.7 118.3,39.7 118.1,40.7 121.8,40.7 121.3,43.7 
											117.5,43.7 117.3,44.8 121.6,44.8 121,47.8 111.8,47.8 	"/>
										<polygon id="Shape_14_" class="costco3" points="246.1,23.7 211.6,39.2 222.5,50 247.5,25 	"/>
										<path id="Shape_15_" class="costco3" d="M216.3,32.9c-0.3-0.5-1.7-1.1-3.8-0.1c-1.9,0.8-3.1,2.2-2.5,3.6c0.6,1.3,2.4,1.4,4.3,0.5
											c2.1-0.9,2.6-2,2.5-2.9l-1.5,0.7c0,0.4-0.5,1.1-1.3,1.4c-1,0.5-1.9,0.3-2.3-0.4c-0.4-0.9,0.5-1.6,1.2-1.9c1-0.4,1.6-0.3,1.9-0.1
											L216.3,32.9L216.3,32.9L216.3,32.9z"/>
										<polygon id="Shape_16_" class="costco3" points="220.2,29.4 218.6,30.1 220.3,33.9 225.5,31.6 225.2,30.8 221.6,32.4 	"/>
										<path id="Shape_17_" class="costco3" d="M232.5,23.8l-1.6,0.7l1.1,2.4c0.2,0.5,0,0.9-1.1,1.3c-0.7,0.3-1.3,0.3-1.6-0.2l-1-2.3l-1.6,0.7
											l1.1,2.5c0.2,0.4,0.5,0.6,1,0.7c0.8,0.1,1.9-0.3,2.5-0.6c1.8-0.8,2.8-1.8,2.4-2.8L232.5,23.8L232.5,23.8L232.5,23.8z"/>
										<path id="Shape_18_" class="costco3" d="M237.6,26.1l-1.7-3.8l3.6-1.6c1.8-0.8,2.5-0.4,2.7,0c0.2,0.5,0.1,0.8-0.2,1
											c0.6-0.1,1,0.1,1.2,0.6c0.1,0.3,0,0.7-0.3,1.1s-0.7,0.7-2.1,1.4L237.6,26.1L237.6,26.1L237.6,26.1z M238.3,23.8l0.4,0.9l1.8-0.8
											c0.7-0.3,1.1-0.6,1-1c-0.2-0.3-0.8-0.2-1.3,0L238.3,23.8L238.3,23.8L238.3,23.8z M237.7,22.4l0.3,0.7l1.7-0.8
											c0.6-0.3,1-0.6,0.9-0.9s-0.6-0.2-1.3,0.1L237.7,22.4L237.7,22.4L237.7,22.4z"/>
										<path id="Shape_19_" class="costco3" d="M204.1,31.7c0.2,0,0.3,0,0.5-0.1c0.4-0.1,0.9-0.2,1.2-0.3c0.8-0.4,1.1-0.9,0.9-1.4
											c-0.2-0.5-0.5-0.6-2-0.3c-1.3,0.2-2.1,0.2-2.8-0.1L204.1,31.7L204.1,31.7L204.1,31.7z"/>
										<path id="Shape_20_" class="costco3" d="M234.2,11.8c-0.3,0.1-0.6,0.2-0.9,0.3c-0.8,0.4-1.2,0.8-0.9,1.3c0.2,0.4,0.5,0.5,1.1,0.4
											c1.2-0.2,1.7-0.3,2.2-0.3c0.1,0,0.2,0,0.3,0L234.2,11.8L234.2,11.8L234.2,11.8z"/>
										<path id="Shape_21_" class="costco3" d="M238.8,16.4l2.3,2.3l-34.4,15.5l-0.5-0.5c0.3-0.1,0.6-0.2,0.8-0.3c2.1-0.9,3-3,2.2-4.8
											c-0.6-1.2-1.6-1.9-2.9-1.8c-0.6,0-1.1,0.1-2.2,0.3c-0.6,0.1-0.9,0-1.1-0.4c-0.2-0.5,0.1-1,0.9-1.3c0.3-0.2,0.7-0.3,1.1-0.3
											c0.9-0.2,1.3-0.1,2.3,0.3l-1.3-2.8c-1.3-0.2-2.3,0-3.4,0.5c-2.2,1-3.1,3-2.3,4.9l-2.7-2.7l25-25l9.5,9.5c0,0-0.1,0-0.1,0.1
											c-2.2,1-3.2,3-2.3,5c0.2,0.5,0.6,1,1,1.3c0.8,0.6,1.7,0.7,3.5,0.4c1.5-0.2,1.8-0.2,2,0.3s-0.1,1-0.9,1.4c-0.4,0.2-0.8,0.3-1.2,0.3
											c-0.9,0.1-1.3,0.1-2.4-0.3l1.2,2.6c0.3,0.1,0.5,0.1,0.7,0.1c0.9,0.1,2-0.2,2.9-0.6C238.1,19.4,239,18,238.8,16.4L238.8,16.4
											L238.8,16.4z M212.2,28.2l3.1-1.4l1.6,1.9l2.7-1.2l-7.3-8.6l-3.9,1.8l1.7,11.2l2.5-1.1L212.2,28.2L212.2,28.2L212.2,28.2z
											 M225.8,12.7l-3.9,1.7l2.1,8.2l-5-6.8l-3.7,1.7l4.5,9.9l2.5-1.1l-3.2-7l4.7,6.3l2.5-1.1l-1.5-7.8l3.2,7.1l2.4-1.1L225.8,12.7
											L225.8,12.7L225.8,12.7z M226.1,11.4c0.2,0.4,0.3,0.6,0.4,1c0.3,0.7,0.5,1.3,0.7,1.8c0.1,0.4,0.2,0.8,0.3,1.2l1.4-0.7
											c-0.1-1.3-0.2-2.1-0.4-2.8c-0.1-0.4-0.3-0.9-0.5-1.3L226.1,11.4L226.1,11.4L226.1,11.4z"/>
										<polygon id="Shape_22_" class="costco3" points="213.9,24.9 211.3,21.9 211.8,25.9 	"/>
									</g>
									</svg>

									</span>
								</button>
							<?php }
								if( $discountChoosen && in_array('aarp', $discountChoosen) ) { ?>
								<button id="discount-aarp" type="button" class="btn btn-primary" data-discount="<?php echo $aarp ?>">
									<span>
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											 width="150px" height="50px" viewBox="0 0 150 50" style="enable-background:new 0 0 150 50;" xml:space="preserve">
										<style type="text/css">
											.aarp0{fill:#EE2722;}
										</style>
										<path id="path3041" class="aarp0" d="M29,32.7L29,32.7L27,38h-0.1h-7.6h-0.1l1.9-4.5h0.2l0,0C21.8,33.4,25.4,33.4,29,32.7L29,32.7
											L29,32.7z M134.4,19.9c0,6-4.7,9.8-12.5,9.8h-4.7V38H96.1l-8.5-11.3v11.2H67.2l-2.3-6.2c-0.1,0-2.4-0.5-5.1-0.5
											c-2.7,0-5.1,0.4-5.2,0.5l-2.3,6.2H42l-1.7-4.7c2.6,0.6,4.5,1.7,5.5,2.3l0.4-1c-1.6-0.9-5.9-3.1-12.3-3.1c-4.9,0-8,1.2-13,1.2
											c-8.2,0-13.9-4-14.2-4.2l2.2-5.3c0.6,0.3,6,3.9,12.3,3.9c1,0,2-0.1,2.8-0.1L30.9,10h1h5.6h4.8L49,27.5L56.1,10h11.3l9.9,25.8V10H91
											c9.2,0,13.8,4.2,13.8,9.8c0,5.6-4.4,7.7-5.6,8.3l8,8.7V10.1h14.8C130.1,10.1,134.4,14.2,134.4,19.9L134.4,19.9z M37.7,26.2l-3.1-8.6
											l-3,8.3c0.5,0,1-0.1,1.7-0.1C35.7,25.8,37.5,26.2,37.7,26.2L37.7,26.2z M62.9,26l-3.1-8.3L56.7,26c0.2,0,1.9-0.2,3.1-0.2
											C61.2,25.8,62.8,26,62.9,26L62.9,26z M94.3,19.9c0-2.8-1.4-5.2-5.3-5.2h-1.5v10.4h1.5C92.5,25.1,94.3,23.1,94.3,19.9L94.3,19.9z
											 M124,19.9c0-3-1.6-5.2-4.7-5.2h-2v10.4h2C122.2,25.1,124,23.1,124,19.9L124,19.9z"/>
										<path id="path3045" class="aarp0" d="M137.2,10.1c1.6,0,2.8,1.3,2.8,2.8s-1.2,2.8-2.8,2.8s-2.8-1.2-2.8-2.8S135.7,10.1,137.2,10.1
											L137.2,10.1L137.2,10.1z M137.2,10.5c-1.2,0-2.3,1-2.3,2.4s1,2.4,2.3,2.4c1.3,0,2.3-1,2.3-2.4C139.5,11.6,138.5,10.5,137.2,10.5
											L137.2,10.5L137.2,10.5z M136.7,14.5h-0.5v-3.1c0.3-0.1,0.5-0.1,0.9-0.1c0.5,0,0.8,0.1,1,0.2c0.2,0.1,0.3,0.3,0.3,0.6
											c0,0.4-0.3,0.6-0.6,0.8l0,0c0.3,0.1,0.5,0.3,0.5,0.8c0.1,0.5,0.2,0.7,0.2,0.8h-0.5c-0.1-0.1-0.2-0.4-0.2-0.8
											c-0.1-0.4-0.3-0.5-0.7-0.5h-0.3v1.4H136.7z M136.7,12.8h0.3c0.4,0,0.8-0.2,0.8-0.5c0-0.3-0.2-0.6-0.8-0.6c-0.2,0-0.3,0-0.3,0V12.8
											L136.7,12.8z"/>
										</svg>

									</span>
								</button>
							<?php }
								if( $discountChoosen && in_array('aaa', $discountChoosen) ) { ?>
								<button id="discount-aaa" type="button" class="btn btn-primary" data-discount="<?php echo $aaa ?>">
									<span>
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											 width="80px" height="50px" viewBox="0 0 80 50" style="enable-background:new 0 0 80 50;" xml:space="preserve">
										<style type="text/css">
											.aaa0{fill:#FD000D;}
										</style>
										<path id="path3346" class="aaa0" d="M0,24.9C0,11.2,17.9,0,39.9,0C62.1,0,80,11.2,80,24.9C80,38.8,62.1,50,39.9,50
											C17.9,50,0,38.8,0,24.9L0,24.9L0,24.9L0,24.9L0,24.9z M22.6,5.5l7.6,26.1l0,0l8-29.5C32.6,2.4,27.2,3.5,22.6,5.5L22.6,5.5L22.6,5.5
											L22.6,5.5L22.6,5.5z M37.8,16.4l-4.1,15.2H42L37.8,16.4L37.8,16.4L37.8,16.4L37.8,16.4z M49.6,31.6l7.2-26.3
											c-4.7-1.9-10.1-3-15.7-3.1L49.6,31.6L49.6,31.6L49.6,31.6L49.6,31.6L49.6,31.6z M22.5,31.6l-4.1-15.2l-4.1,15.2H22.5L22.5,31.6
											L22.5,31.6L22.5,31.6z M69.9,34.6c2-2.9,3.1-6.2,3.1-9.7c0-6.7-4.1-12.6-10.8-16.9L69.9,34.6L69.9,34.6L69.9,34.6L69.9,34.6z
											 M61.5,31.6l-4.2-15.2l-4.2,15.2H61.5L61.5,31.6L61.5,31.6L61.5,31.6z M62.3,34.6h-10l-0.9,3.3l2.4,7.8c3.9-1.1,7.3-2.9,10.2-5
											L62.3,34.6L62.3,34.6L62.3,34.6L62.3,34.6z M26.4,45.7l-3-11.1h-10l-0.9,3.1c3.5,3.5,8.2,6.3,13.8,8.1L26.4,45.7L26.4,45.7
											L26.4,45.7L26.4,45.7z M42.9,34.6H32.8l-3.2,12.1c3.2,0.8,6.7,1.1,10.3,1.1c2.2,0,4.4-0.1,6.5-0.5L42.9,34.6L42.9,34.6L42.9,34.6
											L42.9,34.6z M17,8.6c-6.2,4.1-10,9.9-10,16.3c0,3.5,1.1,6.7,3,9.6L17,8.6L17,8.6L17,8.6z"/>
										</svg>
									</span>
								</button>
							<?php }
								if( $discountChoosen && in_array('firstresponder', $discountChoosen) ) { ?>
								<button id="discount-firstresponder" type="button" class="btn btn-primary" data-discount="<?php echo $firstresponder ?>">
									<span>
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="140px" height="50px" viewBox="0 0 140 50" xml:space="preserve">
                  <path fill="#FFFFFF" d="M111.8,4.2C100.3,4.2,91,13.5,91,25s9.4,20.8,20.8,20.8s20.8-9.4,20.8-20.8S123.3,4.2,111.8,4.2z"/>
                  <path fill="#FFFFFF" d="M46.7,18c-1-2.1-1.6-4.3-2.4-6.6c-3.1,2.5-6.2,5.1-9.2,7.7l-0.8-0.8c2.5-3,5.2-6.1,7.7-9.2
                    c-2.3-0.8-4.5-1.3-6.6-2.3c-2-0.9-3.6-2.4-6.2-2.7h-1.1c-2.5,0.2-4.7,1.5-6.7,2.5c-2.1,1-4.3,1.6-6.6,2.5c2.6,3.1,5.1,6.2,7.8,9.2
                    l-0.9,0.8c-3-2.6-6.1-5.2-9.2-7.7C11.7,13.8,11,16,10.1,18c-0.9,2-2.3,3.7-2.7,6.3v1.1c0.3,2.7,1.5,4.6,2.5,6.7
                    c1,2.1,1.8,4.3,2.6,6.6c3.1-2.6,6.2-5.1,9.2-7.8l0.9,0.6c-2.7,3-5.2,6.1-7.8,9.2c2.3,0.9,4.5,1.6,6.6,2.6c2.1,1,4,2.3,6.7,2.5h1.2
                    c2.5-0.3,4.2-1.7,6.2-2.7c2.1-1,4.3-1.5,6.6-2.3c-2.6-3.1-5.2-6.2-7.8-9.2l0.8-0.9c3,2.7,6.1,5.3,9.2,7.8c0.9-2.3,1.6-4.5,2.6-6.6
                    c1-2,2.3-4,2.5-6.7v-1C49,21.8,47.7,20,46.7,18z"/>
                  <path fill="#FFFFFF" d="M88,19.5c-0.1-1.1-0.2-2.3-0.4-3.3c-0.1-0.5-0.2-1-0.4-1.5s-0.3-0.9-0.5-1.4s-0.3-0.9-0.4-1.2
                    c-0.1-0.2-0.2-0.5-0.2-0.7c-0.3-0.9-0.6-1.7-0.9-2.5c-0.4-0.8-0.8-1.5-1.3-2.2c-1-1.4-2-2.6-3.3-3.7c-0.6-0.5-1.3-1.1-2.1-1.4
                    c-0.4-0.2-0.9-0.3-1.4-0.4c-0.5-0.1-1-0.1-1.5-0.1s-1,0.1-1.6,0.2c-0.2,0-0.5,0.1-0.7,0.2s-0.5,0.1-0.6,0.2
                    c-0.1,0.1-0.1,0.1-0.3,0.2c-0.2,0-0.4-0.1-0.5-0.1c-0.2,0-0.3-0.1-0.5-0.1c-0.9-0.1-1.9,0-2.7,0.3c-0.2,0.1-0.3,0.1-0.5,0.2
                    c-1-0.7-2.4-1.3-4-1c-0.7,0.1-1.4,0.3-2,0.6S61,2.4,60.5,2.7c-0.5,0.4-1,0.8-1.4,1.2c-0.4,0.4-0.9,0.9-1.3,1.4
                    c-0.4,0.5-0.8,1-1.1,1.5c-0.7,1-1.3,2.2-1.9,3.4c-0.5,1.2-1.1,2.4-1.5,3.7c-0.1,0.3-0.2,0.7-0.3,1c-0.1,0.3-0.2,0.7-0.3,1
                    c-0.1,0.3-0.2,0.7-0.2,1.1c-0.1,0.4-0.2,0.7-0.2,1.1c-0.1,0.8-0.1,1.5-0.2,2.3v1.2c0,0.3,0,0.7,0.1,1.1c0.1,1.2,0.3,2.3,0.6,3.3
                    c0.2,1.1,0.5,2.1,0.8,3.1c0.2,0.7,0.4,1.4,0.6,2c0.1,0.3,0.3,0.6,0.4,0.9c0.7,1.5,1.4,3,2.2,4.4c0.3,0.6,0.7,1.1,1,1.6
                    s0.7,1.1,1,1.6s0.7,1,1.1,1.5c0.4,0.5,0.8,1,1.2,1.4c0.6,0.7,1.2,1.4,1.9,2.1c0.2,0.2,0.4,0.4,0.7,0.6c1.4,1.2,3.1,2.2,4.8,3
                    c0.4,0.2,0.9,0.4,1.4,0.6c0.2,0.1,0.3,0.1,0.5,0.1c0.6-0.2,1.2-0.4,1.8-0.7c0.6-0.3,1.1-0.6,1.6-0.9c1-0.6,2-1.3,2.9-2.2
                    c0.9-0.8,1.7-1.6,2.5-2.5c0.6-0.6,1.3-1.6,2-2.6c0.3-0.5,0.7-1,1-1.5s0.6-1.1,0.9-1.6c0.3-0.5,0.6-1.1,0.9-1.6s0.6-1.1,0.9-1.7
                    c0.1-0.3,0.3-0.6,0.4-0.8c0.1-0.3,0.3-0.6,0.4-0.8c0.5-1.2,0.9-2.5,1.2-3.8c0.1-0.3,0.2-0.7,0.3-1s0.2-0.6,0.2-1
                    c0.3-1.6,0.6-3.1,0.7-4.8C88.1,20.8,88.1,20.2,88,19.5z"/>
                  <path fill="#58595B" d="M74,21.3C74,21.3,74,21.3,74,21.3c0,0.1,0,0.1,0,0.1C74,21.4,74.1,21.4,74,21.3C74,21.3,74,21.3,74,21.3z
                    M73.7,6.8c-0.2-0.1-0.3-0.3-0.4-0.5C73,6,72.9,5.7,72.8,5.5c0,0.5,0.2,0.8,0.4,1.1C73.4,6.6,73.5,6.7,73.7,6.8z M72.9,22.2
                    c-0.1,0-0.1-0.1-0.1-0.1l0,0c0,0.1,0,0.2,0,0.2L72.9,22.2z M73.8,22.2c0-0.1,0-0.2,0.1-0.2c0,0-0.1-0.1-0.1-0.2c0-0.1,0-0.1,0-0.2
                    c0,0,0-0.1,0-0.1c0-0.1,0-0.2,0.1-0.2c0,0-0.1-0.1-0.1-0.2c0-0.1,0-0.1,0-0.2c0,0,0-0.1,0-0.1c0-0.1,0-0.1,0-0.2c0,0,0-0.1,0-0.1
                    c0-0.1,0-0.2,0.1-0.2c0,0-0.1-0.1-0.1-0.2c0-0.1,0-0.1,0-0.2c0,0,0,0,0,0c0,0-0.1,0.1-0.1,0.1c0,0,0,0.1-0.1,0.2c0,0,0,0,0,0.1
                    c0,0.1,0,0.1-0.1,0.2c0,0.1-0.1,0.1-0.1,0.2v0.2c-0.1,0.2-0.2,0.3-0.2,0.3c0,0,0,0,0,0.1c0,0.1,0,0.1-0.1,0.2c0,0,0,0.1-0.1,0.1
                    c0,0.1,0,0.2,0,0.3c0,0.1-0.1,0.1-0.1,0.2v0.1c-0.1,0.2-0.2,0.3-0.2,0.3H74C74,22.5,73.8,22.3,73.8,22.2z M57.9,12.3
                    c-0.1,0.2-0.1,0.3-0.2,0.4c0,0.1,0,0.1,0,0.1c0-0.1,0.1-0.2,0.1-0.3C57.9,12.4,57.9,12.3,57.9,12.3z M74.1,21.6c0,0,0.1-0.1,0.1-0.1
                    c0,0-0.1-0.1-0.1-0.1c0,0,0,0,0,0s0,0-0.1,0c0,0,0,0.1,0,0.1C73.9,21.5,74,21.5,74.1,21.6z M73,21.8C73,21.8,73,21.8,73,21.8
                    C73,21.8,73,21.8,73,21.8c-0.1,0.1-0.1,0.1-0.1,0.1L73,21.8z M74.8,21.5C74.8,21.5,74.9,21.6,74.8,21.5c0,0,0.1,0,0.1,0
                    c0-0.1,0-0.1,0-0.1C74.9,21.4,74.9,21.5,74.8,21.5z M74.1,20.8C74.1,20.8,74.1,20.7,74.1,20.8C74.1,20.8,74,20.8,74.1,20.8
                    c-0.1,0-0.1,0-0.2-0.1c0,0,0,0,0,0.1c0,0,0.1,0.1,0.1,0.2C74.1,20.9,74.1,20.9,74.1,20.8z M74,21.7C74,21.7,74.1,21.7,74,21.7
                    c0-0.1,0-0.1,0-0.1S74,21.6,74,21.7C74,21.7,74,21.7,74,21.7z M66.3,19.4C66.3,19.4,66.3,19.4,66.3,19.4
                    C66.3,19.4,66.3,19.4,66.3,19.4C66.3,19.4,66.2,19.4,66.3,19.4c-0.1,0.1-0.1,0.1-0.1,0.1C66.3,19.5,66.3,19.4,66.3,19.4z M60.3,18.4
                    c-0.2,0.1-0.4,0.3-0.6,0.5C60,18.8,60.1,18.6,60.3,18.4z M74,20.7C74,20.7,74.1,20.7,74,20.7c0-0.1,0-0.1,0-0.1S74,20.6,74,20.7
                    C74,20.7,74,20.7,74,20.7z M85.1,30.5C85.1,30.5,85,30.5,85.1,30.5C85,30.5,85,30.5,85.1,30.5C85.1,30.5,85.1,30.5,85.1,30.5z
                    M74.6,20.9C74.6,20.9,74.6,20.9,74.6,20.9C74.6,20.9,74.6,20.9,74.6,20.9C74.6,20.9,74.6,20.9,74.6,20.9z M74.5,20.5L74.5,20.5
                    c0-0.1,0-0.2,0-0.2C74.5,20.4,74.5,20.4,74.5,20.5C74.4,20.5,74.5,20.6,74.5,20.5C74.5,20.5,74.5,20.5,74.5,20.5z M64.8,9.7
                    c0,0.1-0.1,0.2-0.1,0.3C64.7,9.9,64.7,9.9,64.8,9.7C64.7,9.8,64.8,9.7,64.8,9.7z M74.1,19.3c0,0,0.1,0.1,0.1,0.2L74.1,19.3
                    C74.1,19.4,74.1,19.3,74.1,19.3C74.1,19.3,74.1,19.3,74.1,19.3z M88,19.5c-0.1-1.1-0.2-2.3-0.4-3.3c-0.1-0.5-0.2-1-0.4-1.5
                    s-0.3-0.9-0.5-1.4s-0.3-0.9-0.4-1.2c-0.1-0.2-0.2-0.5-0.2-0.7c-0.3-0.9-0.6-1.7-0.9-2.5c-0.4-0.8-0.8-1.5-1.3-2.2
                    c-1-1.4-2-2.6-3.3-3.7c-0.6-0.5-1.3-1.1-2.1-1.4c-0.4-0.2-0.9-0.3-1.4-0.4c-0.5-0.1-1-0.1-1.5-0.1s-1,0.1-1.6,0.2
                    c-0.2,0-0.5,0.1-0.7,0.2s-0.5,0.1-0.6,0.2c-0.1,0.1-0.1,0.1-0.3,0.2c-0.2,0-0.4-0.1-0.5-0.1c-0.2,0-0.3-0.1-0.5-0.1
                    c-0.9-0.1-1.9,0-2.7,0.3c-0.2,0.1-0.3,0.1-0.5,0.2c-1-0.7-2.4-1.3-4-1c-0.7,0.1-1.4,0.3-2,0.6S61,2.4,60.5,2.7
                    c-0.5,0.4-1,0.8-1.4,1.2c-0.4,0.4-0.9,0.9-1.3,1.4c-0.4,0.5-0.8,1-1.1,1.5c-0.7,1-1.3,2.2-1.9,3.4c-0.5,1.2-1.1,2.4-1.5,3.7
                    c-0.1,0.3-0.2,0.7-0.3,1c-0.1,0.3-0.2,0.7-0.3,1c-0.1,0.3-0.2,0.7-0.2,1.1c-0.1,0.4-0.2,0.7-0.2,1.1c-0.1,0.8-0.1,1.5-0.2,2.3v1.2
                    c0,0.3,0,0.7,0.1,1.1c0.1,1.2,0.3,2.3,0.6,3.3c0.2,1.1,0.5,2.1,0.8,3.1c0.2,0.7,0.4,1.4,0.6,2c0.1,0.3,0.3,0.6,0.4,0.9
                    c0.7,1.5,1.4,3,2.2,4.4c0.3,0.6,0.7,1.1,1,1.6s0.7,1.1,1,1.6s0.7,1,1.1,1.5c0.4,0.5,0.8,1,1.2,1.4c0.6,0.7,1.2,1.4,1.9,2.1
                    c0.2,0.2,0.4,0.4,0.7,0.6c1.4,1.2,3.1,2.2,4.8,3c0.4,0.2,0.9,0.4,1.4,0.6c0.2,0.1,0.3,0.1,0.5,0.1c0.6-0.2,1.2-0.4,1.8-0.7
                    c0.6-0.3,1.1-0.6,1.6-0.9c1-0.6,2-1.3,2.9-2.2c0.9-0.8,1.7-1.6,2.5-2.5c0.6-0.6,1.3-1.6,2-2.6c0.3-0.5,0.7-1,1-1.5s0.6-1.1,0.9-1.6
                    c0.3-0.5,0.6-1.1,0.9-1.6s0.6-1.1,0.9-1.7c0.1-0.3,0.3-0.6,0.4-0.8c0.1-0.3,0.3-0.6,0.4-0.8c0.5-1.2,0.9-2.5,1.2-3.8
                    c0.1-0.3,0.2-0.7,0.3-1s0.2-0.6,0.2-1c0.3-1.6,0.6-3.1,0.7-4.8C88.1,20.8,88.1,20.2,88,19.5z M67.8,3.4c0.1-0.1,0.3-0.1,0.4-0.2
                    c0.3-0.1,0.6-0.2,0.9-0.3c0.2,0,0.3,0,0.5,0c-0.2,0-0.4,0.1-0.6,0.1c-0.3,0.1-0.6,0.2-0.8,0.4c0.1,0.1,0.1,0.2,0.3,0.2l0.1-0.1h0.3
                    c0.1,0,0.1-0.1,0.2-0.1c0,0,0.1,0,0.2,0c0.1,0,0.1-0.1,0.2-0.1s0.1,0.1,0.2,0.1c0-0.1,0.1-0.1,0.1-0.2c0.1,0,0.2,0.1,0.2,0.1
                    c0.1,0,0.1,0,0.1-0.1l0.1,0.1c0.1-0.1,0.1-0.1,0.2-0.2c0.2,0.2,0.5,0.1,0.7,0c0,0.1,0.2,0.2,0.4,0.1l0.1,0.1c0.1,0,0.2,0,0.3,0.1
                    c0,0.2-0.1,0.3-0.2,0.4c-0.1,0.1-0.2,0.1-0.2,0.2c0.3,0,0.5-0.2,0.8-0.3c0.1,0,0,0.2,0,0.3c0,0,0,0.1-0.1,0.1
                    c-0.2,0.2-0.4,0.5-0.5,0.7c0.2-0.1,0.4-0.2,0.5-0.4c0.1-0.1,0.3-0.2,0.3,0.1c0,0.4-0.2,0.5-0.4,0.6c0.3,0,0.5,0.2,0.3,0.4
                    c-0.1,0.2-0.3,0.2-0.5,0.3c0.2,0,0.3,0.1,0.3,0.4c-0.1,0.2-0.4,0-0.6,0.1c0.1,0.1,0.3,0.2,0.3,0.4s-0.4,0.1-0.5,0.1
                    c0.2,0.1,0.3,0.2,0.4,0.3c0,0.1,0,0.1,0,0.2c-0.1,0.2-0.3,0.1-0.6,0.1c0,0.1,0.1,0.1,0.1,0.2c0,0.1,0,0.2-0.1,0.3
                    c-0.1,0-0.2,0-0.3,0.1v0.4c-0.1,0.1-0.3,0-0.4-0.1c0,0.2,0,0.6-0.2,0.6c-0.3,0-0.3-0.3-0.5-0.3c-0.1,0.2-0.2,0.6-0.3,0.6
                    c-0.1,0-0.2,0-0.3-0.1c-0.1,0.1-0.1,0.2-0.2,0.3c0,0,0,0-0.1-0.1c0.1-0.5,0.3-1.4-0.4-1.4c-0.1-0.1-0.1-0.1-0.2-0.2
                    c-0.2-0.1-0.5,0-0.6,0.2c0,0.1,0,0.1-0.1,0.2c0,0-0.1,0-0.2,0c0-0.2,0-0.4-0.1-0.5c0-0.1,0-0.2-0.1-0.2C67.1,8,67,8.8,66.8,9.6
                    c0,0.1,0,0.2-0.1,0.3C66.6,10,66.4,10,66.3,10c0.1-0.7,0.3-1.4,0.4-2.1c0.1-0.4,0.2-0.7,0.1-1c0,0,0,0.2,0,0.3c-0.3,1-0.4,2-0.8,2.9
                    c-0.3,0-0.5,0.1-0.7,0.1c0.2-0.7,0.5-1.3,0.7-2s0.4-1.4,0.8-1.9c0.3,0.2,0.5,0.5,0.8,0.7c0.3,0.2,0.6,0.4,0.9,0.6
                    c0.1,0.1,0.3,0.2,0.4,0.3C69,8,69.1,8.2,69.3,8.2c0-0.2,0-0.4,0.1-0.4c0.2,0,0.2,0.2,0.3,0.2c0-0.1-0.2-0.6,0-0.6
                    c0.1,0,0.2,0.1,0.3,0.2c0.1,0.1,0.1,0.2,0.2,0.2c-0.1-0.1-0.1-0.2-0.2-0.4c-0.1-0.1-0.2-0.3,0-0.4c0.1,0,0.2,0.1,0.3,0.1
                    c0.1,0.1,0.1,0.1,0.2,0.1c0-0.2-0.3-0.3-0.3-0.6c0.2,0,0.3,0.1,0.5,0.1c-0.1-0.2-0.4-0.2-0.4-0.5c0.2-0.1,0.4,0.1,0.6,0.1
                    c-0.1-0.1-0.3-0.2-0.4-0.3c0.1-0.1,0.4,0,0.5-0.1c-0.1-0.1-0.4-0.1-0.5-0.3c0.1,0,0.3,0,0.5-0.1c-0.1-0.1-0.3,0-0.3-0.1
                    c0.2-0.1,0.5-0.1,0.7-0.2c-0.3-0.1-0.8-0.1-1-0.3c0.1-0.1,0.2-0.1,0.2-0.2c-0.2,0-0.3-0.2-0.2-0.3c-0.8,0.1-1.6-0.1-2.2-0.4
                    c-0.1-0.1-0.2-0.3-0.3-0.4h-0.3c-0.1,0-0.1,0-0.2,0C67.6,3.6,67.8,3.5,67.8,3.4z M72.6,3.6c0.4-0.3,0.8-0.5,1.2-0.7
                    c0.6-0.3,1.3-0.5,2.1-0.4c-0.1,0.2-0.3,0.2-0.5,0.2c-0.1,0-0.1,0-0.2,0S75.1,2.8,75,2.8c-0.1,0-0.3,0-0.4,0.1
                    c-0.1,0-0.2,0.1-0.3,0.2c-0.1,0-0.2,0.1-0.4,0.1c-0.1,0-0.2,0.1-0.3,0.2c0,0-0.1,0-0.2,0.1c-0.2,0.1-0.3,0.3-0.5,0.3
                    c0,0.1,0.1,0.1,0.2,0.2c0.1,0.2,0.1,0.5,0.2,0.8c0.1,0.5,0.3,1,0.4,1.5C73.8,6.5,73.9,6.8,74,7c-0.1,0-0.1,0-0.2-0.1
                    C74,7,74.1,7.1,74.2,7.1c0.1,1.1,0.5,2.1,0.7,3.2c-0.2,0-0.4,0-0.5-0.2c-0.1-0.1-0.1-0.2-0.1-0.3c-0.1-0.3-0.3-0.7-0.4-1
                    c-0.2-0.5-0.3-0.9-0.4-1.3c0,1,0.4,1.8,0.6,2.5h-0.5c-0.2-0.5-0.4-1-0.6-1.6c-0.2-0.6-0.2-1.2-0.3-1.7c-0.1,0.4,0,0.8,0.1,1.2h-0.3
                    c-0.1,0-0.1-0.2-0.2-0.2c-0.1-0.1-0.2-0.1-0.3-0.2c0.2-0.3,0.4-0.7,0.5-1.1C72.7,6,72.8,5.5,72.8,5S72.7,4,72.6,3.6z M80.8,31.5
                    L79.3,33c-0.1,0.1-0.2,0.1-0.3,0.2c-0.3-0.3-0.5-0.6-0.8-0.9c-0.3-0.4-0.6-0.7-0.9-1s-0.6-0.7-0.9-1l-0.6-0.6c0.7-0.6,1.3-1.2,1.9-2
                    c0.2,0.1,0.4,0.3,0.5,0.5c0,0,0.1,0.1,0.2,0.2c0,0.1-0.2,0.3-0.2,0.4c-0.3,0.3-0.6,0.6-0.9,0.9c0.2,0.2,0.4,0.5,0.6,0.7
                    c0.3-0.2,0.4-0.4,0.7-0.6c0,0,0,0,0-0.1c0,0,0,0,0.1-0.1c0.2,0.1,0.3,0.3,0.5,0.5c0,0,0.1,0.1,0.2,0.2c0,0.1-0.1,0.2-0.2,0.2
                    c-0.1,0.2-0.2,0.2-0.4,0.4c-0.1,0.1-0.2,0.1-0.2,0.2c0,0,0.2,0.2,0.3,0.3l0.3,0.3c0.5-0.3,0.8-0.7,1.2-1.2c0.2,0.1,0.3,0.3,0.5,0.5
                    c0,0.1,0.1,0.2,0.1,0.2C81,31.3,80.9,31.4,80.8,31.5z M80.9,33.5c-0.1,0.3-0.2,0.6-0.3,0.8c-0.3,0-0.3-0.4-0.3-0.8v-0.6
                    c0.2,0,0.2,0.1,0.4,0.2c0.1,0,0.2,0.1,0.2,0.2C81,33.2,80.9,33.4,80.9,33.5z M79.9,36c0,0.1-0.2,0.2-0.3,0.3
                    c-0.3,0.2-0.6,0.5-0.8,0.7c-0.2-0.2-0.4-0.5-0.7-0.7c-0.2-0.3-0.4-0.5-0.6-0.8h1.7c0.2,0.1,0.3,0.3,0.4,0.4
                    C79.8,35.9,79.9,35.9,79.9,36z M76.5,37.8c-0.3-0.6-0.7-1.2-1-1.8c0.3-0.1,0.6-0.2,0.8-0.4c0.1-0.1,0.1,0.1,0.2,0.2
                    c0.2,0.3,0.4,0.6,0.6,0.9c0.1,0.1,0.2,0.3,0.2,0.4c0,0.1-0.2,0.2-0.2,0.2C76.9,37.5,76.7,37.7,76.5,37.8z M76.6,38.7
                    C76.6,38.8,76.5,38.7,76.6,38.7L76.6,38.7z M62.1,31.5c-0.2-0.1-0.4-0.3-0.5-0.4c-0.5,0.4-0.9,0.9-1.4,1.2c-0.1-0.1-0.2-0.2-0.3-0.2
                    c-0.1-0.1-0.2-0.1-0.3-0.3c-0.1-0.1-0.2-0.2-0.2-0.3s0.1-0.2,0.2-0.2l2.3-2.3c0.2-0.2,0.4-0.4,0.6-0.6c0.1-0.1,0.2-0.2,0.2-0.2
                    c0.1,0,0.2,0.2,0.3,0.2l0.8,0.8c0.3,0.3,0.5,0.5,0.7,0.9v0.8c-0.1,0.3-0.4,0.7-0.7,0.9c-0.2,0.1-0.6,0.2-1,0.2
                    C62.5,31.8,62.3,31.6,62.1,31.5z M62.7,35.4c-0.3,0.6-0.8,1.1-1.2,1.6c-0.3-0.2-0.6-0.5-0.9-0.7c-0.1-0.1-0.3-0.2-0.3-0.3
                    s0.3-0.3,0.3-0.3c0.1-0.1,0.2-0.2,0.3-0.3c0.1-0.1,0.3,0,0.5,0H62.7z M62.4,17.3c0.2-0.4,0.4-0.6,0.8-0.7c0.2-0.1,0.3-0.2,0.5-0.2
                    c-0.1,0.2-0.3,0.4-0.4,0.5c-0.4,0.6-0.8,1.2-1.1,1.8c-0.4,0.9-0.7,2-0.7,3.1c-0.1,1.9,0.3,3.3,1,4.6c0.1,0.2,0.2,0.4,0.4,0.6
                    c0.1,0.2,0.3,0.4,0.4,0.6c-0.1,0-0.4,0.1-0.5,0.1l-0.2-0.2c-0.9-1.3-1.6-3.1-1.6-5.2C60.9,20.1,61.5,18.6,62.4,17.3z M61.3,17.8
                    c0.2-0.2,0.5-0.4,0.9-0.6v0.1c-0.1,0.3-0.3,0.6-0.5,0.8C61.5,18.1,61.4,17.9,61.3,17.8z M65.1,22.1C65.2,22.1,65.2,22,65.1,22.1
                    c0.1-0.2,0.1-0.2,0.1-0.3v-0.1l0,0c0-0.1,0-0.2,0.1-0.3c0,0,0,0,0,0c0-0.1,0-0.2,0.1-0.3c0.1-0.2,0.2-0.3,0.2-0.3v-0.1l0,0
                    c0-0.1,0-0.2,0.1-0.3c0,0,0,0,0,0c0-0.1,0-0.2,0.1-0.3c0.1-0.1,0.1-0.2,0.1-0.2c0-0.1,0-0.1,0.1-0.2c0,0,0,0,0,0
                    c0-0.1,0-0.2,0.1-0.3c0-0.1,0.1-0.1,0.1-0.2c0-0.1,0-0.1,0-0.2c0,0,0-0.1,0-0.1c-0.2-0.1-0.4-0.2-0.4-0.5V18H66v0.5
                    c0,0.1,0.1,0.2,0.2,0.3c0-0.1,0.1-0.2,0.1-0.2c0.1,0,0.1,0.1,0.1,0.2c0.1,0,0.2-0.1,0.2-0.3v-0.2H69c0-0.5,0.4-1,0.9-1.1v-0.9h0.2
                    c-0.2,0-0.4-0.2-0.4-0.4c0-0.2,0.2-0.4,0.4-0.4c0.2,0,0.4,0.2,0.4,0.4c0,0.2-0.2,0.4-0.4,0.4h0.3v1c0.5,0.1,0.8,0.5,0.8,1h2.4v0.2
                    c0,0.2,0.1,0.2,0.2,0.3c0-0.1,0.1-0.2,0.1-0.2s0.1,0,0.1,0.2c0.1-0.1,0.2-0.2,0.2-0.3V18h0.2v0.4c0,0.2-0.1,0.4-0.3,0.5
                    c0,0,0,0.1,0,0.1c0,0.1,0,0.1,0,0.1c0.1,0,0.1,0.1,0.1,0.3c0,0.1,0.1,0.1,0.1,0.2c0,0,0,0.1,0,0.1v0.1c0,0,0,0,0,0.1
                    c0,0,0,0.1,0.1,0.2c0,0,0,0,0,0c0,0.1,0,0.1-0.1,0.2c0,0,0,0.1,0,0.1c0-0.1,0-0.1,0.1-0.1v-0.1c0,0.1,0,0.1,0,0.1
                    c0.1,0,0.2,0.1,0.2,0.3c0,0,0,0,0,0.1c0,0,0.1,0.1,0.1,0.2c0,0,0,0,0,0.1c0,0,0,0.1,0.1,0.2c0,0,0,0,0,0c0,0.1,0,0.1-0.1,0.2
                    c0,0,0.1,0,0.1,0.1v-0.2c0,0.1,0.1,0.1,0.1,0.2c0,0,0,0.1,0,0.1v0.1c0.1,0,0.2,0.1,0.2,0.3c0.1,0.1,0.1,0.2,0.1,0.3c0,0,0,0.1,0,0.1
                    c0.1,0.1,0.1,0.2,0,0.3h0.2c-0.1,0.2-0.2,0.3-0.2,0.5c0,0.5-0.5,0.9-1.2,0.9s-1.2-0.4-1.2-0.9c0-0.2-0.1-0.4-0.2-0.5h0.2
                    c-0.1,0-0.1-0.2,0-0.4c0,0,0,0,0,0c0-0.1,0-0.2,0.1-0.3v-0.1l0,0c0-0.1,0-0.2,0.1-0.3c0,0,0,0,0,0c0-0.1,0-0.2,0.1-0.3
                    c0.1-0.2,0.2-0.3,0.2-0.3v-0.1l0,0c0-0.1,0-0.2,0.1-0.3c0,0,0,0,0,0c0-0.1,0-0.2,0.1-0.3c0.1-0.1,0.1-0.2,0.1-0.2
                    c0-0.1,0-0.1,0.1-0.2c0,0,0,0,0,0c0-0.1,0-0.2,0.1-0.3c0,0,0,0,0-0.1c0,0,0,0,0-0.1c0-0.1-0.1-0.1-0.1-0.3c0,0,0-0.1,0-0.1
                    c-0.2,0-0.4-0.2-0.4-0.5h-2.5v-0.2c0-0.4-0.2-0.6-0.5-0.7v7.7h-0.5v-7.8c-0.3,0.1-0.6,0.3-0.6,0.8v0.2h-2.5c0,0.3-0.2,0.4-0.4,0.5
                    c0,0,0,0.1,0,0.1c0,0.1,0,0.1,0,0.1c0.1,0,0.1,0.1,0.1,0.3c0,0.1,0.1,0.1,0.1,0.2c0,0,0,0.1,0,0.1v0.1c0,0,0,0,0,0.1
                    c0,0,0,0.1,0.1,0.2c0,0,0,0,0,0c0,0.1,0,0.1-0.1,0.2l0,0c0,0,0,0.1,0,0.1c0-0.1,0-0.1,0.1-0.1v-0.1c0,0.1,0,0.1,0,0.1
                    c0.1,0,0.2,0.1,0.2,0.3c0,0,0,0,0,0.1c0,0,0.1,0.1,0.1,0.2c0,0,0,0,0,0.1c0,0,0,0.1,0.1,0.2c0,0,0,0,0,0c0,0.1,0,0.1-0.1,0.2
                    c0,0,0.1,0,0.1,0.1v-0.2c0,0.1,0.1,0.1,0.1,0.2c0,0,0,0.1,0,0.1v0.1c0.1,0,0.2,0.1,0.2,0.3c0.1,0.1,0.1,0.2,0.1,0.3c0,0,0,0.1,0,0.1
                    c0.1,0.1,0.1,0.2,0,0.3h0.2c-0.1,0.1-0.2,0.3-0.2,0.5c0,0.5-0.5,0.9-1.2,0.9s-1.2-0.4-1.2-0.9c0-0.2-0.1-0.3-0.2-0.5h0.2
                    C65,22.5,65,22.3,65.1,22.1z M65.7,24.9c1.7-0.5,2.8-0.3,4.3,0.5c0.1,0,0.1,0.1,0.2,0.1c0,0,0.1,0,0.1-0.1c1.5-0.9,2.6-1,4.4-0.5
                    c1.8,0.5,2,0.5,3.4,0.3c-0.3,0.9-0.8,1.7-1.3,2.5c-0.6,0-0.9-0.1-2.1-0.4c-1.9-0.5-2.9-0.3-4.4,0.6c-0.1,0-0.1,0.1-0.2,0.1
                    c0,0-0.1,0-0.1-0.1c-1.5-0.9-2.5-1.2-4.3-0.6c-1.1,0.3-1.5,0.4-2.1,0.4c-0.6-0.7-1-1.6-1.3-2.5C63.7,25.4,63.8,25.4,65.7,24.9z
                    M78,17.7c0,0.1,0.1,0.2,0.1,0.3c0.9,1.5,1.4,3.9,0.9,6.1c-0.2,0.9-0.5,1.7-0.9,2.5c-0.1,0.3-0.3,0.5-0.5,0.8
                    c-0.1,0.1-0.2,0.2-0.2,0.2h-0.5c0.1-0.2,0.2-0.4,0.4-0.6c0.6-1,1.2-2.1,1.3-3.5c0.1-1.1,0.1-2.2-0.2-3.3c-0.3-1.3-0.9-2.3-1.6-3.3
                    c-0.1-0.2-0.3-0.4-0.4-0.6c0.3,0.1,0.5,0.2,0.7,0.3c0.3,0.2,0.4,0.5,0.6,0.8c0.2,0.1,0.2,0.2,0.2,0.2S77.9,17.7,78,17.7z M77.9,17.1
                    c0.3,0.1,0.6,0.3,0.8,0.5c-0.1,0.1-0.2,0.3-0.3,0.4C78.3,17.7,78,17.5,77.9,17.1z M81.3,19.6c0-0.1,0.2-0.2,0.3-0.3
                    c0.1-0.1,0.3-0.2,0.4-0.3c0.1,0.2,0.2,0.6,0.2,0.9c0,0.1,0.1,0.3,0.1,0.3c0,0.1-0.3,0.2-0.3,0.2c-0.6,0.3-1.2,0.7-1.8,1
                    c-0.2,0.1-0.5,0.3-0.7,0.4c0-0.3,0-0.6-0.1-1c0.5-0.3,1-0.7,1.5-1.1c0.1,0,0.2-0.1,0.2-0.1c0.1,0,0.1,0.1,0.2,0.1
                    C81.4,19.8,81.3,19.7,81.3,19.6z M80.1,19.3c-0.3,0.3-0.6,0.5-0.9,0.8c-0.1-0.4-0.3-0.8-0.4-1.2c0.2-0.2,0.4-0.4,0.6-0.7
                    c0.2,0.1,0.4,0.2,0.5,0.4c0.1,0.1,0.1,0.1,0.2,0.2c0.1,0.1,0.2,0.2,0.2,0.2C80.4,19.1,80.1,19.2,80.1,19.3z M81.7,23.8
                    c0,0.4-0.1,0.8-0.1,1.2c-0.9,0.2-1.8,0.3-2.7,0.5c0.1-0.4,0.2-0.7,0.3-1C80,24.3,80.9,24,81.7,23.8z M74.6,28
                    c-0.1,0-0.2-0.1-0.4-0.1c0,0,0,0,0.1,0C74.3,27.9,74.4,28,74.6,28z M72.3,29.8c0,0.1,0,0.1,0.1,0.2c0,0,0.1,0,0.1,0.1
                    c-0.2-0.1-0.3-0.1-0.3-0.2c0-0.1,0-0.2-0.1-0.2c0,0,0-0.1-0.1-0.1l-0.1,0.2c0,0.1,0,0.1,0.1,0.2l-0.4-0.1c0.1,0,0.1,0,0.2-0.1
                    l0.2-0.5c0-0.1,0-0.1-0.1-0.2l0.3,0.1l0-0.1h0.1c0,0,0.1,0.1,0.1,0.1c0.1,0,0.1,0.1,0.1,0.1c0,0.1,0.1,0.1,0,0.2
                    c0,0.1-0.1,0.1-0.3,0.1C72.2,29.6,72.2,29.8,72.3,29.8z M70,29.5h-0.4c0.1,0,0.1,0,0.1-0.1c0,0,0-0.1,0-0.2v-0.3c0-0.1,0-0.1,0-0.1
                    s-0.1,0-0.1-0.1h0.3l0.6,0.6V29c0-0.1,0-0.2,0-0.2c0,0,0,0,0-0.1l-0.2,0c0.2,0,0.2,0,0.2,0l0.2,0.1c-0.1,0-0.1,0-0.1,0.1
                    c0,0,0,0.1,0,0.2v0.5h-0.1l-0.7-0.7v0.3c0,0.1,0,0.2,0,0.2C69.8,29.5,69.8,29.5,70,29.5z M68.4,29.5L68,29.7l0.1,0.2
                    c0,0.1,0.1,0.1,0.2,0.1l-0.4,0.1c0.1,0,0.1-0.1,0.1-0.2l-0.2-0.5c0-0.1-0.1-0.1-0.2-0.1l0.4-0.1c-0.1,0-0.1,0.1-0.1,0.2l0.1,0.2
                    L68.4,29.5l-0.1-0.3c0-0.1-0.1-0.1-0.2-0.1l0.4-0.1c-0.1,0-0.1,0.1-0.1,0.2l0.2,0.5c0,0.1,0.1,0.1,0.2,0.1l-0.4,0.1
                    c0.1-0.1,0.1-0.1,0.1-0.2L68.4,29.5z M68.5,28.5c0.1,0,0.2,0,0.3-0.1c0,0,0.1,0,0.1,0C68.7,28.4,68.6,28.4,68.5,28.5z M68.5,29.3
                    c0-0.2,0.1-0.5,0.5-0.5c0.3,0,0.6,0.1,0.6,0.4c0,0.2-0.1,0.3-0.2,0.4c0,0-0.1,0.1-0.2,0.1c0,0,0,0,0,0c0,0,0,0-0.1,0
                    C68.8,29.7,68.5,29.6,68.5,29.3z M70.7,29.3c0-0.2,0.2-0.3,0.4-0.4c-0.1,0-0.2,0.1-0.2,0.3c0,0.2,0.1,0.4,0.3,0.5
                    c0.2,0,0.3-0.1,0.4-0.3c0-0.3-0.1-0.4-0.3-0.5c0.3,0,0.5,0.2,0.4,0.5c0,0.3-0.3,0.4-0.6,0.4C70.8,29.7,70.6,29.5,70.7,29.3z
                    M61,24.7c0.1,0.3,0.2,0.7,0.3,1c-0.9-0.1-1.8-0.3-2.7-0.4c-0.1-0.4-0.1-0.8-0.1-1.3C59.4,24.2,60.2,24.5,61,24.7z M58.8,21.9
                    c0.5,0.2,0.9,0.5,1.4,0.7c0.1,0.1,0.4,0.2,0.4,0.3v0.3c0,0.3,0.1,0.6,0.1,0.9c-0.1,0-0.2,0-0.2,0c-0.6-0.2-1.2-0.4-1.7-0.6
                    c-0.7-0.2-1.3-0.5-1.9-0.8c0-0.5,0-1-0.1-1.5C57.6,21.3,58.2,21.6,58.8,21.9z M57.7,20.4c0.1-0.4,0.1-0.9,0.3-1.2
                    c0.3,0.1,0.5,0.3,0.7,0.4c0.1,0.2,0,0.4,0.1,0.4c0.1,0,0.1-0.1,0.2-0.2c0.1,0,0.2,0.1,0.2,0.1c0.5,0.3,1.1,0.7,1.5,1.1
                    c0,0.3,0,0.6-0.1,1C59.6,21.5,58.7,21,57.7,20.4z M61.1,26.2h0.4c0.1,0,0.1,0.2,0.2,0.3c0.1,0.3,0.3,0.6,0.4,0.9
                    c-1.5,0-3,0.1-4.4,0.2c0-0.6-0.1-1.2-0.1-1.6C58.6,26,59.8,26.1,61.1,26.2z M61.9,27.9c0.1,0,0.2,0,0.2,0C62,28,62,28.1,61.9,28.2
                    l-0.5,0.5c-0.1,0.1-0.2,0.2-0.3,0.2c-0.1,0-0.2,0-0.3,0.1c-0.5,0.1-1.2,0.2-1.8,0.3c-0.1-0.4-0.2-0.7-0.3-1.1
                    C59.8,28.1,61,28,61.9,27.9z M59.9,33v1.3c0,0-0.1,0.1-0.2,0.1c-0.2-0.3-0.3-0.7-0.4-1C59.5,33.2,59.7,33.1,59.9,33z M64.9,31.4
                    c0.3-0.3,0.6-0.5,1-0.6c0.4-0.1,0.8,0,1.1,0.2c0.4,0.2,0.6,0.5,0.8,0.9c0.1,0.2,0.1,0.5,0,0.8c0,0.2,0,0.3-0.1,0.4
                    c-0.1,0.4-0.3,0.9-0.5,1.2c-0.3,0.6-0.7,1.2-1.5,1.2c-0.4,0-0.7-0.1-1-0.2c-0.2-0.1-0.4-0.3-0.6-0.5c-0.5-0.7-0.2-1.8,0.1-2.5
                    C64.4,32,64.6,31.7,64.9,31.4z M63.9,35.7c0.3,0.1,0.6,0.2,0.9,0.4c-0.3,0.6-0.6,1.3-1,1.9c-0.4-0.2-0.6-0.5-0.9-0.8
                    C63.3,36.6,63.6,36.1,63.9,35.7z M64.5,38.9c0.4-0.9,0.8-1.7,1.2-2.6c0.3,0.1,0.6,0.2,0.9,0.3c-0.5,1.3-0.9,2.6-1.4,3.9
                    c-0.1,0-0.2-0.2-0.3-0.2c-0.1-0.1-0.1-0.2-0.2-0.3l-0.5-0.5C64.3,39.3,64.4,39.1,64.5,38.9z M67.5,36.8c0.3,0,0.6,0.1,0.9,0.1
                    c-0.3,1.5-0.5,2.9-0.8,4.3c0,0.2-0.1,0.4-0.1,0.6c-0.1,0-0.2-0.1-0.3-0.2c-0.2-0.2-0.5-0.5-0.7-0.7C66.9,39.4,67.2,38.1,67.5,36.8z
                    M68.1,36.2c0.2-1.6,0.3-3.2,0.5-4.7c0.4,0,0.8,0.1,1.2,0.1c-0.1,1.2-0.3,2.5-0.4,3.8c0.4,0,1,0.1,1.5,0.1c0,0.3-0.1,0.7-0.1,1
                    c0,0,0,0,0,0c-0.1,0-0.2,0-0.3,0C69.7,36.4,68.9,36.3,68.1,36.2z M68.8,44c0.1-0.4,0.1-1,0.1-1.4c0.1-1.4,0.2-2.5,0.4-3.8
                    c0.1-0.7,0.1-1.3,0.2-1.8h1.4c0.2,2,0.4,3.9,0.5,5.8c0.1,0.6,0.1,1.1,0.2,1.7c-0.5,0.4-1,0.8-1.4,1.2c-0.4-0.3-0.7-0.6-1.1-1
                    c-0.1-0.1-0.3-0.2-0.3-0.3V44z M71.3,31.5c0.3-0.1,0.7-0.1,1.1-0.2c-0.1-0.1-0.1-0.1-0.2-0.2c0,0,0,0,0,0c-0.6-0.4-1.2-0.6-2.1-0.6
                    c-1.1,0-1.9,0.4-2.7,0.7c-0.2-0.3-0.2-0.8-0.4-1.1c-0.1,0-0.2,0-0.3,0.1c-0.1,0-0.2,0.1-0.3,0.1c0,0,0,0,0,0c-0.1,0-0.2-0.1-0.2-0.3
                    c0-0.1-0.1-0.3-0.1-0.3c-0.4,0-0.8,0.1-1.2,0c0,0,0,0,0,0c0,0,0,0,0,0c0.1-0.3,0.3-0.5,0.4-0.8c-0.3-0.1-0.5-0.3-0.8-0.5
                    c0,0,0,0,0,0c-0.1-0.1-0.2-0.1-0.2-0.2c0,0,0.1,0,0.1,0c0.2,0,0.4-0.1,0.6-0.1c0.2,0.2,0.5,0.2,0.7,0.4c-0.1,0.3-0.3,0.5-0.3,0.7
                    c0.2,0.1,0.5,0,0.7,0c0-0.3-0.2-0.7-0.2-1.1V28c0-0.1,0.1-0.1,0.2-0.2c0,0,0,0,0,0c0.1,0,0.1,0.1,0.2,0.2c0,0,0,0-0.1-0.1
                    c-0.1,0-0.1,0-0.1,0.2h0.2c0,0,0-0.1,0-0.1c0,0.1,0.1,0.2,0.1,0.3c-0.1,0-0.2,0-0.3,0c0.1,0.5,0.3,1,0.4,1.5c0.2,0,0.3-0.1,0.5-0.1
                    c-0.1-0.4-0.2-0.7-0.3-1.1c0.1-0.2,0.4-0.2,0.5-0.5c0.2,0,0.3,0.4,0.4,0.6c0.1,0,0.2,0,0.3-0.1c-0.3,0.1-0.5,0.2-0.9,0.4
                    c0.2,0.6,0.4,1.2,0.5,1.9c0.3-0.1,0.7-0.3,1.1-0.4c0.4-0.1,0.8-0.2,1.3-0.2c1.1-0.1,2,0.3,2.7,0.6c0.2-0.6,0.4-1.2,0.5-1.9
                    c-0.2-0.1-0.4-0.2-0.7-0.3c0.1-0.1,0.1-0.3,0.2-0.4c0-0.1,0.1-0.1,0.2-0.1c0.1,0,0.1,0,0.2,0.1c0.2,0.1,0.5,0.1,0.5,0.3
                    c0,0.1-0.1,0.2-0.1,0.3c-0.1,0.3-0.2,0.6-0.2,0.9c0.2,0,0.3,0.1,0.5,0.1c0-0.1,0.1-0.2,0-0.2c0.1-0.4,0.3-0.8,0.3-1.3
                    c-0.1,0-0.2-0.1-0.4-0.1c0-0.1,0.1-0.3,0.3-0.3c0,0.1,0,0.1,0.1,0.2c0,0,0-0.1,0-0.2c0,0,0.1,0,0.1,0c0.1,0.1,0.1,0.2,0.2,0.3
                    c-0.1,0.2-0.1,0.4-0.2,0.6c0,0.1-0.1,0.3-0.1,0.5c0.2,0.1,0.5,0.1,0.8,0.1c-0.1-0.3-0.2-0.5-0.3-0.8c0.2-0.2,0.4-0.2,0.6-0.4
                    c0.2,0,0.4,0,0.6,0.1c-0.1,0.2-0.3,0.3-0.4,0.4c-0.2,0.1-0.3,0.2-0.5,0.3c0.1,0.3,0.2,0.4,0.3,0.7c0,0,0,0,0,0.1c0,0,0,0.1,0,0.1
                    c-0.1,0-0.1,0-0.2,0.1c-0.1,0-0.2,0-0.3,0c-0.2,0-0.4,0-0.6-0.1c-0.1,0-0.1,0-0.2,0c-0.1,0.1-0.1,0.3-0.1,0.4c0,0.1,0,0.1-0.1,0.2
                    c-0.2,0-0.3,0-0.5-0.1c-0.1,0-0.1,0-0.2,0c-0.1,0.3-0.2,0.6-0.3,0.9c0,0,0,0,0,0.1c0,0.1-0.1,0.2-0.1,0.3c-0.1-0.1-0.1-0.1-0.2-0.2
                    c0.1,0.1,0.1,0.4,0.1,0.5c0.2,1.3,0.5,2.7,0.7,4.1c-0.4,0.1-0.8,0.1-1.2,0.2C71.8,34.7,71.6,33.1,71.3,31.5z M72.5,36.7
                    c0.1,0,0.2,0,0.2,0c0.1,0,0.1,0.2,0.1,0.2c0.2,0.6,0.3,1.2,0.5,1.8c0.1,0.5,0.3,1,0.4,1.5c0,0.1,0.2,0.4,0.1,0.5
                    c0,0.1-0.2,0.2-0.2,0.2l-0.7,0.7c-0.3-1.3-0.5-2.4-0.7-3.8c-0.1-0.2-0.2-0.6-0.2-1C72.1,36.8,72.3,36.7,72.5,36.7z M73.7,36.6
                    c0.1-0.1,0.3-0.1,0.4-0.2c0.1,0,0.3-0.1,0.4-0.1c0.1,0,0.2,0.3,0.2,0.4c0.2,0.4,0.4,0.8,0.6,1.2c0.3,0.6,0.5,1.1,0.8,1.6
                    c-0.3,0.4-0.6,0.7-1,1C74.7,39.2,74.2,37.9,73.7,36.6z M76.6,35c-0.4,0.3-1,0.3-1.5,0.1c-0.4-0.2-0.8-0.6-1-1.1
                    c-0.1-0.2-0.3-0.4-0.4-0.7s-0.2-0.5-0.2-0.8v-0.8c0-0.2,0.1-0.5,0.2-0.6c0.3-0.4,0.7-0.7,1.3-0.7c0.7,0,1.2,0.7,1.4,1.1
                    c-0.3,0.2-0.6,0.4-0.9,0.6c-0.1-0.2-0.3-0.7-0.7-0.6c-0.4,0.1-0.2,0.7-0.1,1c0.1,0.2,0.2,0.3,0.2,0.5c0.2,0.4,0.3,0.7,0.5,1
                    c0.1,0.1,0.3,0.4,0.5,0.3c0.1,0,0.2-0.1,0.3-0.2c0.2-0.3,0-0.6-0.1-0.9c0.3-0.2,0.5-0.4,0.8-0.5c0.1,0.1,0.2,0.3,0.3,0.5
                    c0.1,0.2,0.1,0.4,0.1,0.6C77.4,34.3,77,34.8,76.6,35z M79.8,29c-0.4-0.3-0.7-0.7-1-1.1c1,0,1.8,0.2,2.8,0.3c-0.1,0.3-0.2,0.7-0.3,1
                    C80.8,29.2,80.3,29.1,79.8,29z M78.1,27.2c0.1-0.3,0.3-0.5,0.4-0.8c0.1-0.1,0.1-0.2,0.2-0.3c0.1,0,0.3,0,0.5-0.1
                    c1.2-0.1,2.4-0.2,3.4-0.2c0,0.5,0,1-0.1,1.5C80.9,27.3,79.5,27.3,78.1,27.2z M79.3,23.8c0-0.4,0.1-0.8,0.1-1.2
                    c1.2-0.6,2.4-1.2,3.7-1.7c0.1,0,0,0.1,0,0.2c0.1,0.4,0.1,0.9,0,1.3C81.9,22.9,80.6,23.4,79.3,23.8z M82.2,17.1
                    c-0.6,0.5-0.9,1.3-1.1,2.2c-0.4-0.3-0.7-0.6-1-0.9c-1.1-0.9-2.3-1.7-3.6-2.3c-1.8-0.8-3.9-1.4-6.4-1.4c-1.9,0-3.6,0.4-5,0.9
                    c-1,0.3-1.9,0.8-2.7,1.3c-0.4,0.3-0.8,0.5-1.2,0.8c-0.3,0.2-0.6,0.5-0.9,0.7c0.1-0.1,0.1-0.1,0.2-0.1l0.7,0.7c0,0.4-0.1,0.8-0.3,1.1
                    c-0.5-0.3-0.8-0.7-1.3-1c0-0.1,0.1-0.1,0.1-0.2c-0.2,0.2-0.4,0.4-0.6,0.6c-0.3-1.9-1.4-3-3.3-3.3c0.1-0.1,0.2-0.2,0.3-0.3
                    c0.7-0.8,1.5-1.4,2.4-2.1c1-0.7,2-1.4,3.2-1.9c0.6-0.3,1.2-0.5,1.8-0.7c1.1-0.6,2.5-0.9,4-1.1c0.3,0,0.7-0.1,1.1-0.1
                    c1.1-0.1,2.5-0.1,3.6,0c0.8,0.1,1.5,0.2,2.2,0.4c1.5,0.3,2.7,0.8,3.9,1.3c1.8,0.8,3.4,1.8,4.8,3.1c0.2,0.2,0.5,0.4,0.7,0.6
                    c0.2,0.2,0.4,0.4,0.6,0.7C83.4,16.2,82.7,16.6,82.2,17.1z M64.9,3.9c-0.1,0-0.2,0.1-0.3,0c0.1-0.3,0.3-0.5,0.4-0.8h0.3
                    C65.2,3.4,65.1,3.8,64.9,3.9z M65.5,3.2c0.1,0,0.2,0,0.2,0.1c-0.1,0.3-0.2,0.6-0.6,0.6C65.3,3.7,65.5,3.5,65.5,3.2z M65,4.2
                    c0,0.2-0.2,0.3-0.3,0.3C64.8,4.4,64.8,4.2,65,4.2z M64.1,3.9c0.1-0.3,0.3-0.5,0.4-0.8c0.1,0,0.2,0,0.2,0.1
                    C64.7,3.5,64.6,3.9,64.1,3.9z M64.4,10.5c-0.1,0.2-0.3,0.2-0.5,0.2C64,9.9,64.3,9,64.5,8.3c0-0.1,0-0.3,0.1-0.3
                    c0-0.1,0.2-0.1,0.3-0.2c0.1-0.1,0.2-0.2,0.4-0.1c-0.1,0.5-0.2,1-0.4,1.4c-0.1,0.2-0.2,0.4-0.2,0.6c0.2-0.4,0.4-0.9,0.5-1.4
                    c0-0.1,0.1-0.2,0.1-0.4c0-0.1,0.1-0.3,0.1-0.4c0.1-0.1,0.4-0.2,0.5-0.1c-0.1,0.8-0.4,1.5-0.7,2.3c0,0.1-0.1,0.2-0.1,0.4
                    c0,0.1-0.1,0.3-0.2,0.3C64.8,10.5,64.7,10.5,64.4,10.5c0.1-0.2,0.2-0.3,0.2-0.5C64.6,10.2,64.5,10.4,64.4,10.5z M56.5,14.8
                    c-0.1,0.1-0.2,0.2-0.3,0.3c-0.1,0.1-0.2,0.2-0.4,0.2c0-0.6,0.3-1.2,0.5-1.7c0.2-0.5,0.4-1,0.6-1.6c0.2-0.5,0.4-1,0.6-1.6
                    c0.3-0.5,0.5-1,0.7-1.5c0.2,0.1,0.5,0,0.7,0c0.1,0,0,0.2,0,0.2c-0.1,0.5-0.3,1-0.5,1.6c-0.2,0.5-0.3,1-0.5,1.6
                    c0.1-0.3,0.2-0.5,0.3-0.9c0.3-0.8,0.6-1.7,0.9-2.6h0.6c0,0.4-0.1,0.9-0.3,1.3c-0.3,1.2-0.7,2.3-1.1,3.4c-0.2,0.1-0.3,0.2-0.5,0.3
                    c-0.2,0.1-0.3,0.3-0.5,0.3c0-0.3,0.1-0.5,0.2-0.7c0.1-0.2,0.1-0.3,0.2-0.6C57.4,13.5,57.1,14.3,56.5,14.8z M63.1,5.6
                    c-0.1,0-0.1,0-0.2-0.1c0.3-0.5,0.6-0.8,0.9-1.3h0.3c0,0.3-0.2,0.5-0.3,0.7C63.7,5.1,63.5,5.4,63.1,5.6z M63.4,5.7
                    c0,0.4-0.1,0.8-0.2,1.2c-0.1,0.4-0.3,0.7-0.5,1C62.6,8,62.4,8.2,62.3,8c0-0.3,0.2-0.7,0.4-1c0.1-0.4,0.2-0.8,0.3-1.2
                    C63.1,5.8,63.2,5.7,63.4,5.7z M63.5,4.6c-0.2,0.3-0.4,0.5-0.6,0.7c-0.1,0.1-0.2,0.2-0.4,0.2c0.2-0.3,0.5-0.6,0.7-1
                    c0.1-0.1,0.1-0.3,0.2-0.4h0.3C63.7,4.3,63.6,4.5,63.5,4.6z M62.9,5.7c0,0.3-0.1,0.6-0.2,0.9c-0.1,0.2-0.2,0.4-0.2,0.6
                    c-0.3,0.5-0.5,1.1-1.1,1.1c-0.2-0.1,0-0.2,0.1-0.4c0.4-0.6,0.7-1.4,1-2.1C62.6,5.7,62.7,5.7,62.9,5.7z M61.5,7.5
                    c-0.2,0.4-0.5,1-1.1,1.2c-0.1,0-0.3,0-0.3-0.1c0-0.1,0.1-0.2,0.2-0.3C60.5,8,60.8,7.7,61,7.4c0.3-0.6,0.4-1.1,0.7-1.5
                    c0.1,0,0.3-0.1,0.5,0C62,6.5,61.8,7,61.5,7.5z M61.3,6.2C61,7,60.5,8,59.8,8.4c-0.1,0-0.1,0.1-0.3,0.1c-0.1,0-0.2,0.1-0.3,0
                    c0-0.1,0.1-0.3,0.2-0.3c0.4-0.5,0.7-1,1-1.7c0.1-0.3,0.2-0.6,0.4-0.8c0.2,0,0.4,0,0.6,0.1C61.4,6,61.4,6.1,61.3,6.2z M60.7,5.5
                    c-0.1,0-0.3,0-0.4-0.1c0.1-0.1,0.3-0.2,0.4-0.3c0,0,0,0,0.1-0.1c0.1,0,0.1-0.1,0.2-0.2c0.1-0.1,0.1-0.1,0.2-0.2
                    c0.1-0.2,0.3-0.3,0.4-0.5c0,0.1,0.1,0.2,0.3,0.2c0,0.1,0,0.1,0,0.2c-0.1,0.2-0.3,0.4-0.5,0.6C61.2,5.3,61,5.5,60.7,5.5z M60.5,5.8
                    c0,0.4-0.2,0.6-0.3,0.9c-0.3,0.5-0.6,1-0.9,1.4c-0.2,0.2-0.4,0.4-0.7,0.5c-0.2,0-0.5,0-0.5-0.2c0-0.1,0.1-0.3,0.2-0.4
                    c0.3-0.3,0.6-0.6,0.8-0.9c0.2-0.2,0.3-0.5,0.4-0.7c0.1-0.3,0.2-0.5,0.4-0.8C60.2,5.7,60.3,5.8,60.5,5.8z M59,12.1
                    c0.3-1.1,0.6-2.2,1-3.3c0.2,0.1,0.4,0,0.6,0c0,0.4-0.1,0.8-0.1,1.1c-0.1,0.3-0.2,0.7-0.3,1c-0.1,0.4-0.3,1-0.5,1.4
                    c-0.1,0.1-0.2,0.3-0.2,0.4c-0.1,0.1-0.2,0.2-0.3,0.2C59.1,13,59,13,58.8,13.1C58.8,12.8,58.9,12.4,59,12.1z M60.5,10.6
                    c0.1-0.5,0.2-0.9,0.3-1.4c0-0.3,0-0.5,0.2-0.6c0.2-0.1,0.4-0.1,0.5,0.1c-0.1,0.6-0.3,1.3-0.5,1.9c-0.2,0.4-0.4,0.9-0.6,1.3
                    c-0.1,0.3-0.2,0.5-0.6,0.5C60.1,11.8,60.3,11.3,60.5,10.6z M60.9,11.2c0.4-0.8,0.6-1.7,0.9-2.7c0.1-0.1,0.3-0.2,0.4-0.2
                    c-0.1,0.6-0.3,1.2-0.4,1.8c-0.2,0.6-0.4,1.1-0.6,1.7c-0.2,0.1-0.3,0.2-0.5,0.3C60.6,11.7,60.8,11.5,60.9,11.2z M62.2,8.9
                    c0-0.1,0.1-0.3,0.1-0.4c0.1-0.1,0.4-0.3,0.6-0.3c0,0.3-0.1,0.5-0.1,0.8c-0.1,0.5-0.3,1.1-0.5,1.6c0,0.1-0.1,0.3-0.1,0.4
                    c-0.1,0.2-0.1,0.4-0.2,0.4c-0.2,0.1-0.4,0.2-0.6,0.3C61.6,10.8,62,9.8,62.2,8.9z M63.1,8.3c0.2-0.1,0.4-0.3,0.6-0.2
                    c0,0.3-0.1,0.6-0.2,0.8c-0.2,0.7-0.5,1.5-0.9,2.2c-0.1,0.1-0.3,0.2-0.5,0.2C62.5,10.3,62.9,9.3,63.1,8.3z M63.8,8.5
                    c0-0.1,0.1-0.3,0.1-0.3c0-0.1,0.2-0.2,0.3-0.2c0,0,0.1,0,0.2,0c-0.1,0.9-0.5,1.7-0.8,2.5c0,0.1-0.1,0.2-0.1,0.3
                    C63.4,10.9,63.1,11,63,11C63.2,10.2,63.6,9.3,63.8,8.5z M65.7,7.1c0.2-0.4,0.3-0.8,0.5-1.2c0.1,0,0.2,0.1,0.3,0.2
                    c0,0.3-0.2,0.7-0.4,1C66,7.2,65.8,7.3,65.7,7.1z M65.7,6.9c0,0.1-0.1,0.2-0.1,0.3c-0.1,0.1-0.4,0.3-0.4,0.1
                    c-0.1-0.1,0.1-0.3,0.1-0.4c0.1-0.4,0.2-0.9,0.4-1.2c0.2,0,0.3,0.1,0.4,0.2C66,6.2,65.9,6.6,65.7,6.9z M65.1,6.5
                    C65,6.9,65,7.2,64.8,7.4c0,0.1-0.1,0.2-0.2,0.2h-0.3c0-0.1,0.1-0.3,0.1-0.5c0.1-0.4,0.2-0.9,0.3-1.4c0.1-0.1,0.4-0.1,0.6-0.1
                    C65.3,5.9,65.2,6.2,65.1,6.5z M64.4,6.7c-0.1,0.4-0.1,0.7-0.3,0.9c-0.1,0.1-0.3,0.2-0.5,0.1c0-0.2,0.1-0.3,0.1-0.5
                    c0.1-0.2,0.1-0.3,0.1-0.5c0,0,0,0.1,0,0.1c-0.1,0.4-0.2,0.8-0.5,1C63.2,7.9,63,8,62.8,8c0.1-0.2,0.2-0.4,0.3-0.5
                    c0.2-0.5,0.3-1,0.5-1.6c0.1-0.1,0.2-0.2,0.4-0.2c0.1,0,0.2-0.1,0.4-0.1C64.6,6,64.5,6.4,64.4,6.7z M64.1,5.5c0-0.2,0.1-0.3,0.2-0.4
                    c0.1,0.1,0.1,0.2,0.1,0.3C64.3,5.6,64.1,5.6,64.1,5.5z M64.5,4.6C64.3,4.8,64.2,5,64,5.3c-0.1,0.1-0.2,0.2-0.4,0.2
                    c0-0.2,0.2-0.3,0.3-0.4c0.2-0.3,0.3-0.6,0.5-0.9c0.1,0,0.2,0,0.2,0C64.6,4.4,64.6,4.5,64.5,4.6z M64.1,3.6c-0.1,0.1-0.3,0.3-0.5,0.3
                    c0.1-0.3,0.3-0.6,0.4-0.8h0.3C64.3,3.3,64.3,3.5,64.1,3.6z M63.5,3.7c-0.1,0.1-0.3,0.2-0.4,0.1c-0.1,0,0-0.1,0,0
                    c0.1-0.1,0.3-0.4,0.4-0.6h0.3C63.8,3.4,63.7,3.6,63.5,3.7z M63.3,4.1c-0.1,0.2-0.2,0.3-0.3,0.5c-0.1,0.1-0.2,0.3-0.3,0.4
                    c-0.2,0.3-0.4,0.5-0.7,0.6c0,0-0.3,0.1-0.3,0c0-0.1,0.1-0.1,0.2-0.2C62,5.3,62,5.3,62.1,5.2c0.2-0.2,0.5-0.5,0.7-0.8
                    c0.1-0.1,0.1-0.3,0.2-0.3H63.3z M62.5,3.9c0.1-0.2,0.2-0.4,0.3-0.5H63C63,3.6,62.8,3.9,62.5,3.9z M62.6,4.2
                    c-0.1,0.3-0.3,0.6-0.5,0.8c-0.2,0.2-0.5,0.5-0.8,0.6H61c0.2-0.2,0.4-0.4,0.6-0.7c0.1-0.1,0.2-0.2,0.3-0.3c0.1-0.1,0.2-0.3,0.3-0.3
                    C62.3,4.1,62.5,4.2,62.6,4.2z M61.9,4c0,0-0.1,0-0.2,0c0.1-0.2,0.2-0.3,0.4-0.5h0.3C62.4,3.7,62.2,4,61.9,4z M61.8,3.7
                    c-0.2,0.2-0.6,0.6-1,0.4c0-0.2,0.2-0.3,0.4-0.4c0.2-0.1,0.3-0.3,0.5-0.3c0.1,0,0.2,0,0.2,0.1S61.8,3.7,61.8,3.7z M61.2,4.3
                    c-0.1,0.4-0.4,0.6-0.7,0.8c-0.1,0.1-0.3,0.2-0.5,0.2c-0.1,0-0.5,0.2-0.5-0.1c-0.1,0,0.1-0.2,0.2-0.2c0.2-0.2,0.4-0.3,0.6-0.5
                    c0.1-0.1,0.2-0.2,0.3-0.2H61.2z M59.6,5.6c0,0.4-0.2,0.7-0.3,0.9c-0.2,0.3-0.4,0.5-0.5,0.8c-0.3,0.3-0.7,0.7-1,0.9
                    c-0.1,0.1-0.3,0.2-0.5,0.2c0.1-0.2,0.3-0.4,0.5-0.6c0.3-0.5,0.6-1,0.9-1.5c0.2-0.3,0.4-0.6,0.7-0.7C59.5,5.6,59.6,5.6,59.6,5.6z
                    M57.7,8.7c0,0,0.1,0,0.2,0c0.1,0.2,0,0.3,0,0.5c-0.4,1-0.8,2.2-1.2,3.3c-0.1,0.3-0.2,0.6-0.4,0.9c-0.3,0.6-0.5,1.2-0.9,1.7
                    c-0.2,0.2-0.4,0.5-0.7,0.6c-0.1-0.3,0-0.4,0-0.5c0.6-1.9,1.1-3.9,2.1-5.6c0.1-0.3,0.3-0.5,0.4-0.7C57.3,8.8,57.6,8.7,57.7,8.7z
                    M67.1,9.1c0-0.1,0-0.6,0.1-0.7c0.1-0.1,0.2-0.1,0.3,0c0,0.4-0.1,0.6-0.1,0.9C67.3,9.4,67.1,9.3,67.1,9.1z M67.7,8.6
                    c0-0.2,0-0.3,0.1-0.4c0-0.1,0-0.2,0.2-0.2c0.3,0,0.2,0.3,0.2,0.5c0,0.3,0,1.1-0.3,1.2c-0.2,0.1-0.3-0.1-0.3-0.2
                    C67.5,9.1,67.6,8.8,67.7,8.6z M68.3,8.7c0-0.2,0-0.6,0.2-0.6s0.2,0.5,0.2,0.8c0,0.2-0.2,0.5-0.4,0.3C68.2,9.1,68.3,8.9,68.3,8.7z
                    M71.1,8.6c0-0.2,0-0.5,0.2-0.5c0.1,0,0.2,0.1,0.2,0.2c0.1,0.3,0,0.7-0.1,0.9C71.1,9.2,71.1,8.9,71.1,8.6z M71.6,8.4
                    c0-0.3,0-0.6,0.3-0.7c0.1,0,0.3,0.1,0.3,0.2v0.4c0,0.4-0.1,0.7-0.1,1.1c-0.1,0.1-0.2,0.1-0.3,0c-0.1-0.1-0.1-0.4-0.1-0.6
                    C71.6,8.7,71.6,8.5,71.6,8.4z M72.6,8.2c0.1-0.1,0.2,0.3,0.2,0.5c0,0.3-0.1,0.7-0.4,0.6C72.4,9,72.3,8.2,72.6,8.2z M73.4,4
                    c0.1,0,0.3-0.1,0.4-0.1C73.9,4.4,74,5,74.1,5.5c0.1,0.5,0.3,1,0.6,1.4c-0.3,0.1-0.4-0.2-0.5-0.4c-0.3-0.6-0.6-1.3-0.8-2
                    C73.5,4.4,73.4,4.1,73.4,4z M73.5,3.7c0-0.1,0.2-0.1,0.3,0C73.7,3.7,73.5,3.8,73.5,3.7z M81.5,12.2c0.2,0.4,0.4,0.9,0.5,1.4
                    c-0.3-0.1-0.6-0.4-0.9-0.6c-0.1-0.1-0.2-0.1-0.3-0.2c0-0.1-0.1-0.2-0.1-0.3c-0.3-1.4-0.6-2.6-0.9-3.9c0-0.2-0.1-0.4-0.1-0.7
                    c0.2,0,0.3,0,0.5,0.1c0.1,0.1,0.1,0.2,0.1,0.3C80.6,9.7,81,11,81.5,12.2z M80.4,7.9H81c0.4,1.2,0.7,2.5,1.2,3.6
                    c0.4,1.2,0.9,2.3,1.5,3.3c-0.4-0.3-0.8-0.7-1.2-0.9c-0.7-1.4-1.2-2.9-1.7-4.4C80.6,9,80.5,8.5,80.4,7.9z M75.3,6.3
                    c0,0.1,0.1,0.2,0.2,0.3c0,0.1,0.2,0.5-0.1,0.4c-0.1,0-0.1-0.1-0.2-0.1c-0.2-0.2-0.3-0.4-0.4-0.6c-0.1-0.2-0.2-0.5-0.3-0.7
                    c-0.2-0.5-0.3-1.1-0.4-1.6c0.1-0.1,0.4,0,0.5,0C74.8,4.8,75,5.5,75.3,6.3z M74.7,3.8c0.2,0,0.4,0,0.6,0.1c0.2,0.9,0.4,1.7,0.7,2.5
                    c0.1,0.3,0.2,0.5,0.3,0.8C76.1,7.3,76,7.1,75.9,7c-0.3-0.4-0.5-0.8-0.6-1.3c-0.2-0.4-0.3-0.9-0.5-1.4C74.8,4.1,74.7,3.9,74.7,3.8z
                    M75.5,7.3c0.1,0,0.3-0.2,0.5-0.1c0.1,0.1,0.1,0.4,0.1,0.5c0.1,0.5,0.2,1,0.3,1.3c0.2,0.6,0.3,1.2,0.5,1.7c-0.2,0-0.5-0.1-0.8-0.2
                    c-0.4-0.7-0.6-1.5-0.7-2.4c-0.1-0.3-0.1-0.6-0.1-0.8C75.4,7.2,75.4,7.3,75.5,7.3z M76.5,9.2c-0.2-0.6-0.3-1.1-0.3-1.8
                    c0.1,0,0.2-0.1,0.3-0.1h0.1c0.2,0.1,0.2,0.6,0.3,0.9c0.2,1,0.4,1.9,0.7,2.8c-0.2,0-0.4-0.1-0.6-0.2C76.8,10.3,76.6,9.8,76.5,9.2z
                    M77.3,9.4C77.1,8.8,77,8.1,77,7.5c0.1-0.1,0.4-0.2,0.5,0c0.1,0.1,0.1,0.4,0.1,0.5c0.1,0.5,0.1,1,0.2,1.5c0.1,0.7,0.3,1.3,0.5,1.9
                    c-0.2-0.1-0.4-0.1-0.5-0.2c-0.1-0.1-0.1-0.3-0.2-0.4C77.5,10.3,77.4,9.9,77.3,9.4z M77.8,7.6c0.2-0.2,0.5-0.1,0.6,0.1
                    c0.1,0.8,0.3,1.6,0.5,2.3c0.2,0.7,0.5,1.4,0.7,2.1c-0.3-0.1-0.5-0.2-0.8-0.4c-0.1,0-0.2-0.1-0.3-0.1c-0.1-0.1-0.1-0.3-0.2-0.4
                    C78.1,10,77.8,8.9,77.8,7.6z M79.1,10c-0.2-0.8-0.5-1.6-0.5-2.4c0.1,0,0.2,0,0.3,0.1c0.2,0,0.4-0.1,0.5,0c0.1,0.1,0.1,0.4,0.2,0.6
                    c0.1,0.6,0.2,1.3,0.4,1.8c0.2,0.9,0.4,1.6,0.5,2.4c-0.1,0-0.2-0.1-0.3-0.1s-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.3-0.3-0.5
                    C79.5,11.2,79.3,10.6,79.1,10z M79.6,7.6c-0.3-0.1-0.5-0.5-0.7-0.8c-0.4-0.6-0.6-1.3-1-2c0-0.1-0.1-0.3-0.1-0.5
                    c-0.1-0.2-0.2-0.4-0.1-0.5C78,3.7,78,4.1,78.1,4.3c0.4,0.8,0.8,1.7,1.3,2.4C79.6,7,79.8,7.3,80,7.6H79.6z M78.6,6.4
                    C78.7,6.7,78.8,7,79,7.2c0.1,0.1,0.1,0.1,0.2,0.2c-0.3,0.1-0.5-0.2-0.7-0.4c-0.3-0.4-0.5-0.9-0.7-1.3c-0.3-0.7-0.5-1.3-0.7-1.9
                    c0.3-0.2,0.4,0.2,0.5,0.4C77.9,5,78.2,5.7,78.6,6.4z M78.3,7c0.1,0.1,0.2,0.3,0.2,0.4c-0.2,0-0.3-0.1-0.4-0.2
                    c-0.3-0.2-0.4-0.5-0.6-0.7c-0.1-0.1-0.1-0.2-0.2-0.4c0.1,0.2,0.2,0.5,0.3,0.7c0.1,0.1,0.2,0.3,0.2,0.4c-0.2,0.1-0.3,0-0.4-0.2
                    c-0.3-0.3-0.5-0.8-0.7-1.3c-0.3-0.6-0.4-1.4-0.5-2h0.3C77,3.6,77,4,77.1,4.3C77.4,5.3,77.8,6.1,78.3,7z M76.9,6.8
                    C77,6.9,77.1,7.1,77,7.2c-0.4,0-0.6-0.4-0.7-0.7C76,6,75.8,5.4,75.6,4.8c0-0.1-0.1-0.3-0.1-0.5s-0.1-0.4-0.1-0.5h0.4
                    C76,4.1,76,4.4,76.1,4.7C76.3,5.4,76.6,6.1,76.9,6.8z M75.4,3.6c-0.1,0-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.2-0.3
                    C75,3,75.1,3,75.2,2.9c0.1,0.2,0.3,0.3,0.5,0.5l0.1,0.1C75.8,3.6,75.5,3.6,75.4,3.6z M75,3.6c-0.1,0.1-0.3,0-0.4,0
                    c-0.1,0-0.3-0.2-0.2-0.3c0-0.1,0.2-0.2,0.3-0.2c0,0,0.2,0.1,0.2,0.2C74.9,3.4,75,3.5,75,3.6z M74.4,3.6c0,0.1-0.3,0.1-0.4,0.1
                    s-0.2-0.1-0.2-0.2s0.1-0.1,0.2-0.2c0.1,0,0.2,0,0.3,0.1C74.4,3.5,74.5,3.6,74.4,3.6z M74.9,7.1C75,7.2,75,7.3,75,7.5
                    c0.1,0.4,0.1,0.8,0.3,1.3c0.1,0.6,0.3,1.1,0.5,1.7c-0.2,0-0.4-0.1-0.6-0.1c-0.2-0.5-0.4-1-0.5-1.5c-0.2-0.6-0.3-1.1-0.3-1.7
                    C74.6,7.2,74.8,7.2,74.9,7.1z M83.5,14c-0.7-1.1-1.2-2.5-1.6-3.9c-0.2-0.7-0.4-1.4-0.6-2.1c0.2,0,0.3-0.1,0.4-0.1
                    c0.7,1.1,1.1,2.5,1.6,3.8c0.2,0.6,0.5,1.3,0.8,2c0.1,0.3,0.3,0.6,0.4,0.9c0.1,0.1,0.2,0.2,0.3,0.4c0,0.1,0.3,0.3,0.1,0.4
                    c-0.1,0.1-0.4-0.2-0.4-0.2C84.1,14.9,83.8,14.4,83.5,14z M83.8,12.4c-0.4-1.2-0.9-2.4-1.4-3.5c-0.1-0.2-0.2-0.5-0.3-0.7
                    C82.1,8.1,82,8,82,8c0.1,0,0.3,0,0.4,0.1c0.1,0,0.3,0,0.4,0.1c0.3-0.1,0.4,0.4,0.5,0.6c0.4,0.9,0.8,1.8,1.2,2.7
                    c0.3,0.6,0.5,1.2,0.7,1.9c0.2,0.5,0.3,1,0.5,1.5c0,0,0.2,0.4,0,0.5c-0.1,0-0.3-0.2-0.4-0.2C84.6,14.5,84.1,13.5,83.8,12.4z
                    M82.2,7.7c-0.4-0.1-0.8-0.5-1.1-0.8c-0.3-0.3-0.6-0.7-0.9-1.1c0.2,0.3,0.4,0.6,0.6,0.9C81,7,81.3,7.3,81.5,7.6
                    c-0.2,0.2-0.5-0.1-0.7-0.2C80.4,7,80,6.5,79.7,6c0.3,0.6,0.7,1.1,0.9,1.6c-0.2,0.1-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.2-0.3-0.3
                    c0,0,0,0-0.1,0c0-0.1-0.2-0.2-0.3-0.4c-0.5-0.6-0.8-1.3-1.2-2.1c0-0.2-0.2-0.5-0.2-0.9c0.1-0.1,0.2,0,0.3,0c0.2,0.4,0.3,0.7,0.5,1.1
                    c-0.1-0.2-0.2-0.3-0.2-0.5c-0.1-0.2-0.2-0.4-0.2-0.6h0.3c0,0,0,0.1,0.1,0.1c0,0,0-0.1,0-0.1c0.4-0.2,0.5,0,0.6,0.1
                    c0.6,0.5,1.1,1.1,1.5,1.7c0.4,0.5,0.8,1,1.2,1.6c0.1,0.2,0.3,0.3,0.3,0.6H82.2z M78,3c0.2,0,0.3,0.1,0.5,0.1
                    c0.1,0.1,0.2,0.1,0.2,0.3C78.5,3.6,78,3.2,78,3z M78.1,3.4c-0.2,0.2-0.4,0-0.5-0.2c-0.1-0.1-0.2-0.2-0.1-0.3c0.2,0,0.3,0.1,0.4,0.3
                    C78,3.3,78.1,3.4,78.1,3.4z M77.6,3.5c-0.2,0.2-0.4-0.1-0.6-0.2c-0.1-0.2-0.2-0.3-0.2-0.5c0.3-0.1,0.4,0.2,0.5,0.4
                    C77.4,3.3,77.5,3.4,77.6,3.5z M77,3.5c-0.1,0.2-0.4,0-0.5-0.1c-0.2-0.1-0.3-0.3-0.3-0.5c0.1-0.1,0.2-0.2,0.3-0.1
                    c0.1,0.1,0.2,0.3,0.3,0.4C76.9,3.3,77,3.4,77,3.5z M76.3,3.4c0,0.2-0.4,0-0.4,0c-0.1,0-0.4-0.3-0.4-0.4s0.1-0.1,0.2-0.2
                    c0.1,0,0.1,0,0.2,0.1C76,3,76.1,3,76.1,3.1C76.2,3.2,76.3,3.3,76.3,3.4z M67.7,3.8c0.3,0.5,0.9,0.8,1.8,0.8c0.2,0,0.6,0,0.4,0.2
                    c0,0.1,0.2,0.2,0.2,0.3c0,0.1-0.1,0.1-0.2,0.1c0,0.2,0.2,0.2,0.2,0.4c0,0.1-0.2,0.1-0.3,0c0,0.1,0.2,0.2,0.1,0.3
                    C69.9,6,69.7,6,69.6,6c0,0.1,0.1,0.3,0,0.4c-0.1,0.1-0.2,0-0.3,0.1c0,0.1,0.1,0.2,0.1,0.3c-0.1,0-0.2,0-0.3,0.1c0,0.1,0,0.2-0.1,0.3
                    c-0.1,0-0.1-0.1-0.2-0.1c0,0,0,0.1-0.1,0.2c-0.2,0-0.4-0.1-0.5-0.2c-0.4-0.3-0.8-0.6-1.1-1c-0.2-0.2-0.5-0.4-0.8-0.6
                    c-0.3-0.2-0.7-0.2-1.1-0.3c0.1,0,0.1,0,0.2-0.1c0.2,0,0.4,0,0.5,0.1c0.2,0,0.3,0.1,0.5,0.1C66.2,5.1,65.7,5,65.3,5
                    c-0.3,0-0.5,0.2-0.6,0.4c-0.2-0.1-0.2-0.4,0-0.6c0.2-0.3,0.8-0.4,1.2-0.5C66.2,3.8,67,3.7,67.7,3.8z M63.1,2.8
                    c0.4-0.1,0.8-0.3,1.3-0.3c0.4-0.1,0.8,0,1.2,0.1c0.4,0.1,0.8,0.3,1.1,0.6c0,0,0.1,0.1,0.3,0.2c0,0,0,0.1,0,0.1
                    c-0.5,0.1-1,0.3-1.2,0.7c-0.1,0.1-0.3,0.2-0.5,0.1c0.1-0.3,0.3-0.4,0.5-0.5c0.1,0,0.2-0.1,0.3-0.1c0.1-0.1,0.2-0.1,0.3-0.2
                    c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1,0-0.1,0-0.2,0C65.5,3,65.4,3,65.4,3c-0.1,0-0.1,0-0.2,0S65,2.9,64.8,2.9
                    H64c-0.1,0-0.2,0-0.2,0.1h-0.4c-0.1,0-0.2,0.1-0.3,0.2c-0.1,0.1-0.2,0.1-0.4,0.1c-0.2,0.1-0.5,0.2-0.7,0.1
                    C62.3,3.1,62.7,2.9,63.1,2.8z M66.1,3.5c0,0.1-0.1,0.1-0.2,0.1C65.8,3.4,66.1,3.4,66.1,3.5z M87.3,20.3c0,0.6-0.2,1-0.4,1.4
                    c0,0,0.1,0,0.1,0.1v0.3c0,0.3-0.1,0.6-0.1,0.9c0,0.4-0.1,0.8-0.2,1.2c0.1,0,0.1-0.1,0.3-0.1c-0.1,0.6-0.4,1.2-0.5,1.8
                    c-0.1,0.4-0.2,0.9-0.3,1.4c0,0.1-0.1,0.3-0.1,0.4c0,0.1,0.1,0.1,0.1,0.2c0,0.1,0,0.3-0.1,0.5c0,0.2-0.1,0.4-0.1,0.5
                    c-0.1,0.4-0.2,0.7-0.3,1.1c-0.2,0.8-0.6,1.2-1,1.7H85c-0.1,0.2-0.3,0.4-0.4,0.6c-0.1,0.2-0.2,0.5-0.2,0.7c-0.1,0.5-0.4,0.9-0.8,1.2
                    c-0.2,0.1-0.4,0.2-0.6,0.3c-0.4,0.2-0.7,0.6-0.6,1.3c0,0.1,0,0.3,0.1,0.4c0,0.1,0.1,0.2,0.1,0.4c0,0.2-0.2,0.5-0.4,0.7
                    s-0.4,0.4-0.6,0.5c-0.1,0-0.2,0-0.2,0c-0.1,0.9-0.4,1.5-0.9,2.1c-0.3,0.4-0.6,0.9-0.9,1.4c-0.1,0.2-0.1,0.3-0.3,0.5
                    c-0.1,0-0.2-0.2-0.3-0.2c-0.1,0-0.2,0.2-0.2,0.3c-0.1,0.2-0.2,0.4-0.3,0.7c0,0.1,0,0.3-0.1,0.3c-0.2,0-0.3-0.2-0.5-0.2
                    c-0.1,0-0.2,0.3-0.3,0.4c-0.2,0.3-0.4,0.5-0.6,0.8c-0.1,0.1-0.2,0.3-0.3,0.4c-0.1-0.1-0.1-0.3-0.1-0.5c-0.1,0-0.1,0.1-0.2,0.2
                    c-0.3,0.5-0.7,1-1.1,1.4c-0.1,0-0.1-0.1-0.1-0.1c-0.2,0.2-0.3,0.4-0.4,0.6c-0.4,0.6-0.9,1.1-1.6,1.5c-0.4,0.3-1,0.4-1.5,0.5
                    c-0.3,0.1-0.5,0.2-0.8,0.2c-0.3,0.1-0.5,0.2-0.8,0.3c-0.1,0-0.3-0.1-0.4-0.1c-0.4-0.1-0.8-0.3-1.1-0.4c-0.5-0.2-1.1-0.3-1.5-0.5
                    c-1-0.4-1.5-1.3-2-2.1c-0.1,0-0.1,0.1-0.1,0.1c-0.4-0.3-0.7-0.7-1.1-1.1c0-0.1-0.1-0.1-0.2-0.2c0-0.1-0.1-0.2-0.2-0.2
                    c-0.1,0,0,0.2-0.1,0.2c-0.1,0-0.3-0.3-0.4-0.3c-0.2-0.3-0.4-0.5-0.6-0.8c-0.1-0.1-0.2-0.3-0.3-0.4c-0.1,0.1-0.2,0.2-0.2,0.3
                    c-0.3-0.2-0.4-0.7-0.6-1.1c-0.1-0.1-0.1-0.3-0.3-0.3c-0.1,0-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.2,0.2c-0.2-0.3-0.3-0.7-0.5-1
                    c-0.6-0.8-1.2-1.7-1.5-2.9c-0.1-0.1-0.2-0.1-0.3-0.1c-0.1,0-0.1-0.1-0.2-0.2c-0.2-0.1-0.3-0.1-0.4-0.3c-0.1-0.3,0-0.8,0-1.2
                    c0-0.9-0.7-1.1-1.2-1.5c-0.4-0.3-0.7-0.6-0.9-1.2c0-0.2-0.1-0.4-0.2-0.5c0-0.1,0-0.2-0.1-0.2c-0.1-0.2-0.2-0.4-0.3-0.6
                    c0-0.1,0.1,0,0.2,0c-0.2-0.2-0.4-0.4-0.6-0.7c-0.3-0.5-0.5-1.2-0.7-1.9c-0.1-0.3-0.2-0.6-0.3-1c0.2,0,0.3,0.1,0.4,0.2
                    c-0.2-0.6-0.5-1.3-0.7-2c-0.1-0.5-0.2-1.1-0.4-1.6c0-0.2-0.1-0.3-0.1-0.5c0.1,0,0.1,0.1,0.2,0c0-0.2-0.1-0.4-0.2-0.6
                    c-0.1-0.5-0.3-1.1-0.2-1.7c0-0.1,0.1-0.2,0.1-0.3c0-0.1-0.1-0.2-0.1-0.3c-0.2-0.7-0.3-1.5-0.3-2.3c0-0.1,0.1-0.2,0.2-0.2
                    c0-0.4,0-0.9,0.2-1.2c0.1-0.2,0.2-0.3,0.3-0.4c0.1-0.1,0.2-0.3,0.3-0.4c0.1-0.2,0-0.4,0-0.6s0-0.4,0.1-0.5c0.1-0.3,0.3-0.6,0.4-0.9
                    c0.3-0.6,0.4-1.4,0.6-2.1c0.4-1.2,0.7-2.4,1.3-3.4c0.1-0.1,0.2-0.3,0.2-0.4c0-0.1-0.1-0.2-0.1-0.4s0.3-0.4,0.4-0.6
                    c0.5-0.6,0.8-1.2,1.3-1.8c0.1-0.1,0.2-0.2,0.3-0.3c0.1-0.1,0.2-0.2,0.3-0.4c0-0.1,0-0.2,0.1-0.2c0.1-0.2,0.3-0.3,0.5-0.5
                    C58.8,5.1,58.9,5.1,59,5c0.1-0.1,0.2-0.1,0.3-0.2c0.1-0.1,0.2-0.3,0.2-0.4C59.7,4.2,60,4,60.3,3.8c0.1-0.1,0.2-0.2,0.3-0.3
                    c0.1-0.1,0.2-0.2,0.4-0.3c0.3-0.2,0.7-0.3,1-0.4C62,2.9,61.8,3,61.7,3.1c-0.3,0.2-0.5,0.4-0.8,0.6c-0.1,0.1-0.3,0.2-0.4,0.3
                    c-0.1,0.1-0.1,0.2-0.1,0.3c-0.1,0.2-0.4,0.4-0.6,0.5c-0.1,0.1-0.6,0.3-0.6,0.5c0,0.1,0.1,0.2,0,0.3c0,0-0.1,0.1-0.2,0.2
                    c-0.4,0.4-0.8,0.8-1.1,1.3c-0.3,0.4-0.5,0.8-0.8,1.2c-0.1,0.1-0.3,0.3-0.3,0.4c0,0.1,0,0.2,0.1,0.3c-0.3,0.5-0.6,1.1-0.9,1.7
                    c-0.3,0.6-0.5,1.2-0.7,1.9c-0.2,0.6-0.4,1.3-0.6,1.9s-0.5,1.3-0.7,1.9c0.3,0.3-0.1,0.9-0.2,1.2h-0.1c-0.1,0.1-0.2,0.3-0.3,0.4
                    c-0.1,0.2-0.1,0.4-0.2,0.7c0,0.2,0,0.4,0.1,0.6c0,0.1,0.1,0.5,0,0.5c-0.1,0.1-0.2-0.2-0.3-0.2c0,0.8,0.1,1.5,0.4,2.2
                    c0.1,0.1,0.1,0.2,0.2,0.3c-0.1-0.1-0.1-0.3-0.2-0.4c-0.1-0.3-0.3-0.8-0.2-1.1c0.6,0.4,0.9,1,1.3,1.7v-0.4c-0.3-1-1.2-1.6-1.1-3
                    c0-0.3,0.1-0.5,0.2-0.8c0.2,0.2,0.3,0.5,0.5,0.8c0.1,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.1,0.3,0.2,0.4c0.1-0.6,0.3-1.1,0.6-1.5
                    c0.2-0.3,0.4-0.6,0.7-0.9c0.1-0.2,0.2-0.3,0.4-0.5c0.1,0.1,0,0.2,0.1,0.3c0.1,0.7-0.1,1.4-0.3,1.9c-0.2,0.6-0.6,1.1-0.7,1.8
                    c0.1-0.1,0.2-0.2,0.3-0.3c0.2-0.2,0.3-0.4,0.5-0.7c0.1-0.1,0.3-0.5,0.4-0.2v0.6c-0.1,0.4-0.3,0.9-0.5,1.4c-0.1,0.3-0.3,0.6-0.4,0.9
                    c-0.1,0.3-0.2,0.7-0.2,1c0,0.4,0,0.7,0.1,1.1c0.1-0.1,0.1-0.3,0.1-0.4c0.1-0.5,0.2-1.1,0.5-1.5c0.1-0.1,0.2-0.2,0.3-0.3
                    c0.1,0.1,0,0.3,0,0.4c0,0.4-0.1,1-0.2,1.4c-0.1,0.6-0.3,1.3-0.1,1.9c0.2-0.5,0.3-1,0.6-1.5c0.1-0.1,0.1-0.3,0.3-0.4
                    c0.2,0.9,0,1.9-0.2,2.7c-0.1,0.3-0.1,0.6-0.1,0.9c-0.1,0.6,0,1.2,0.2,1.7c0-0.6,0.1-1.2,0.3-1.7c0-0.1,0.2-0.4,0.3-0.4
                    s0.1,0.4,0.2,0.5c0.1,0.7,0.1,1.7,0.1,2.4v1.3c0,0.2,0.1,0.4,0.1,0.6c0.1,0.2,0.1,0.4,0.2,0.5c0-0.6,0.1-1.2,0.4-1.6
                    c0.2,0.1,0.2,0.4,0.3,0.5c0.1,0.3,0.2,0.7,0.2,1.2v1.4c0,0.7,0,1.4,0.1,2c0,0.1,0,0.2,0.1,0.3c0,0.1,0.1,0.2,0.1,0.3
                    c-0.1,0-0.1,0.1-0.2,0.1v0c-0.1,1.2,0.3,2,0.8,2.7c0.3,0.5,0.7,0.9,0.9,1.5c0,0.1,0.1,0.2,0.1,0.2c0.1,0,0.2-0.3,0.3-0.3
                    c-0.4-0.5-0.7-0.9-1-1.5c-0.3-0.5-0.6-1.1-0.6-1.8v-0.5c0-0.7,0.1-1.2-0.1-1.9c-0.1-0.2-0.2-0.4-0.2-0.7c0.1-0.2,0.3,0,0.4,0.2
                    c0.2,0.6,0,1.4,0.3,1.9c0.4,0.7,1.6,0.6,2,1.2h-0.6c0.4,0.3,1,0.4,1.5,0.6c0.1,0,0.2,0.1,0.2,0.1c0.1,0.1,0.2,0.2,0.3,0.2
                    c0,0.1-0.1,0.1-0.2,0.1c-0.3,0.1-0.6,0-0.9,0c0.1,0.1,0.3,0.2,0.4,0.3c0.2,0.1,0.3,0.1,0.5,0.2c0,0,0,0,0.1,0c0,0,0,0,0.1,0.1
                    c0.1,0.1,0.3,0.2,0.4,0.3c0.1,0.1,0.3,0.2,0.3,0.4c-0.1,0.1-0.5,0-0.7,0c0.1,0.1,0.1,0.1,0.2,0.2c0.4,0.3,0.9,0.5,1.4,0.8
                    c0.2,0.1,0.4,0.2,0.4,0.4c-0.5,0-0.9-0.1-1.3-0.3c0.3,0.3,0.7,0.5,1.1,0.7c0.2,0.1,0.4,0.2,0.6,0.3c0.2,0.1,0.4,0.2,0.5,0.4
                    c-0.3,0.1-0.7,0-1,0c0.4,0.4,1,0.6,1.5,0.9c0.2,0.1,0.3,0.2,0.5,0.3c-0.2,0.1-0.5,0-0.8,0c0.5,0.4,1.2,0.6,2,0.8
                    c0,0.1-0.1,0.1-0.2,0.1c0.1,0.1,0.2,0.1,0.3,0.2c0.1,0.1,0.2,0.1,0.3,0.3c-0.4,0-0.6-0.1-0.8-0.2c0.3,0.2,0.5,0.5,0.7,0.9
                    c-0.3-0.1-0.5-0.3-0.7-0.4c0,0.2,0.2,0.5-0.1,0.6c-0.2-0.4-0.5-0.8-0.9-1c0,0.2,0.1,0.4,0.1,0.6c-0.6-0.1-0.7-0.7-1.1-1
                    c0.1,0.2,0.2,0.4,0.3,0.7c-0.4-0.2-0.8-0.4-1-0.8c-0.2-0.4-0.4-0.8-0.6-1.1c0.1,0.3,0.2,0.6,0.2,1c-0.3-0.1-0.4-0.4-0.6-0.6
                    c-0.5-0.7-0.8-1.6-1.2-2.4c0.1,0.5,0.3,1,0.3,1.6c-0.2-0.1-0.4-0.4-0.5-0.6c-0.4-0.7-0.5-1.8-1-2.4c0.1,0.5,0.5,1.1,0.3,1.8
                    c-0.6-0.7-0.8-1.6-1.2-2.5C61,40,61.4,40.6,61.2,41c0.1,0,0.2,0.2,0.3,0.3c0.2,0.2,0.3,0.5,0.4,0.8c0,0.1,0.1,0.3,0.2,0.4
                    c0.1-0.1,0.1-0.4,0.3-0.5c0.3,0.6,0.5,1.3,1.1,1.6c0-0.1,0-0.2,0.1-0.3c0.5,0.6,0.8,1.3,1.4,1.7c0,0,0-0.1,0-0.2
                    c0.5,0.3,0.6,0.8,0.9,1.2c0.3,0.4,0.7,0.7,1.1,1s1,0.4,1.5,0.6c0.5,0.1,1,0.3,1.4,0.4c0.1,0,0.1,0.1,0.2,0.1c0.1,0,0.2-0.1,0.4-0.1
                    c0.3-0.1,0.7-0.2,1.1-0.3c1-0.3,1.8-0.6,2.5-1.2c0.3-0.2,0.5-0.5,0.6-0.8c0.1-0.1,0.1-0.2,0.1-0.4c0-0.1,0.2-0.2,0.2-0.3
                    c0.1-0.1,0.2-0.2,0.2-0.3c0.1,0,0.1,0.1,0.2,0.2c0.4-0.4,0.7-0.9,1-1.3c0,0,0.1-0.1,0.1-0.2c-0.1,0.1-0.2,0.2-0.2,0.3
                    c-0.2,0.3-0.3,0.5-0.6,0.7c0-0.5,0.2-0.9,0.3-1.3c-0.1,0.2-0.3,0.4-0.4,0.6c-0.3,0.7-0.7,1.4-1.4,1.6c0-0.4,0.2-0.6,0.3-0.9L73.9,45
                    c-0.2,0.2-0.4,0.4-0.7,0.5c0-0.2,0.1-0.3,0.1-0.5c-0.2,0.1-0.4,0.2-0.5,0.4c-0.1,0.1-0.3,0.3-0.3,0.5c-0.2-0.1-0.2-0.4-0.1-0.6
                    c-0.3,0.1-0.4,0.3-0.7,0.4c0.2-0.5,0.7-0.8,1.2-1s1-0.4,1.5-0.7c0.9-0.6,1.6-1.4,2.2-2.2c0.3-0.4,0.6-0.9,0.9-1.3
                    c0.6-0.8,1.3-1.6,2-2.4c0.2-0.2,0.4-0.4,0.5-0.6c0.2-0.2,0.4-0.4,0.4-0.7c-0.1,0-0.1,0.1-0.1,0.1c-0.3,0.3-0.6,0.7-0.9,1
                    c-0.3,0.4-0.7,0.7-1,1.1c-0.7,0.8-1.2,1.6-1.8,2.5c-0.6,0.9-1.2,1.6-2.1,2.2c-0.4,0.3-0.9,0.5-1.4,0.7c-0.5,0.2-0.9,0.5-1.5,0.6
                    c0.1-0.2,0.3-0.3,0.5-0.5c0-0.1-0.1,0-0.1-0.1c0.6-0.3,1.5-0.4,2-0.8c-0.2,0-0.6,0.1-0.8,0c0.1-0.2,0.3-0.3,0.5-0.4
                    c0.4-0.2,0.8-0.3,1.1-0.5c0.2-0.1,0.4-0.2,0.5-0.4c-0.3,0-0.7,0.1-1,0.1c0.2-0.4,0.7-0.6,1.1-0.8c0.4-0.2,0.9-0.4,1.1-0.8
                    c-0.4,0.2-0.8,0.4-1.3,0.4c0.1-0.2,0.3-0.3,0.4-0.4c0.2-0.1,0.4-0.2,0.6-0.3c0.4-0.2,0.8-0.3,1-0.8c-0.2,0-0.5,0.2-0.7,0.1
                    c0-0.1,0.1-0.2,0.2-0.2c0.5-0.4,1.2-0.6,1.6-1h-0.1c-0.3,0-0.7,0-0.9-0.1c0.3-0.7,1.4-0.5,2-1c-0.2,0-0.5,0-0.7-0.1
                    c0.3-0.2,0.6-0.3,0.9-0.5c0.4-0.1,0.8-0.2,1-0.6c0.3-0.4,0.2-1.1,0.2-1.7c0-0.2,0.1-0.4,0.2-0.5c0,0,0,0,0.1,0
                    c0.2,0.2,0.1,0.6,0,0.8c-0.1,0.2-0.1,0.4-0.1,0.6c0,0.2,0,0.5,0,0.7c0-0.1,0.1-0.3,0.3-0.4c0,0.3-0.1,0.6-0.1,0.9
                    c0,0.2,0.1,0.4,0.2,0.5c0.3,0,0.5-0.2,0.6-0.5c0.1-0.1,0.1-0.3,0.1-0.4c0-0.1-0.1-0.2-0.1-0.3c-0.2-0.6,0-1.3,0.4-1.6
                    c0.2-0.2,0.4-0.3,0.7-0.4c0.2-0.1,0.5-0.2,0.6-0.4c0.2-0.2,0.2-0.5,0.4-0.8c0.1-0.3,0.2-0.6,0.3-0.9c-0.2-0.1-0.4,0.1-0.6,0.1
                    c0.5-0.5,1-0.9,1.3-1.5c-0.2,0.3-0.4,0.6-0.7,0.8c-0.4,0.3-0.8,0.6-1.2,1.1c-0.1,0.2-0.3,0.4-0.3,0.7c0.3-0.2,0.6-0.5,1-0.6
                    c0,0,0,0.1-0.1,0.1v0.1c0,0.2-0.1,0.4-0.2,0.5c-0.1,0.2-0.2,0.3-0.3,0.4c-0.2,0.1-0.3,0.3-0.5,0.4s-0.4,0.2-0.6,0.3
                    c-0.1,0.1-0.2,0.3-0.3,0.4c-0.2,0.3-0.2,0.7-0.1,1.2c0,0.3,0.2,0.7-0.1,0.9l-0.2,0.1c-0.1,0-0.2-0.2-0.2-0.3c0-0.3,0.1-0.5,0.1-0.7
                    v-3.3c0-0.1,0-0.3,0.1-0.4c0.1-0.4,0.2-0.8,0.4-1.2c0.3,0.2,0.3,0.8,0.3,1.4c0,0.1,0,0.2,0,0.2c0.1-0.1,0.1-0.3,0.1-0.4
                    c0.2-0.9,0.2-2.1,0.2-3.4c0-0.6,0-1.1,0.2-1.6c0.4,0.3,0.4,1,0.5,1.7c0,0.1,0,0.2,0.1,0.2c0.1-0.1,0.1-0.2,0.1-0.3c0,0,0,0,0.1-0.1
                    c0.1-0.8-0.1-1.7-0.2-2.5c-0.1-0.5-0.2-1.1-0.2-1.7c0-0.2,0.1-0.5,0.2-0.5s0.2,0.3,0.2,0.4c0.2,0.4,0.4,0.8,0.5,1.3
                    c0.1-0.1,0-0.3,0-0.4c0-0.5-0.2-1-0.3-1.6c-0.1-0.6-0.1-1.1-0.2-1.6c0.2,0,0.3,0.2,0.4,0.3c0.1,0.2,0.2,0.3,0.3,0.5
                    c0.1,0.4,0.2,0.8,0.3,1.2c0.1-0.1,0.1-0.2,0.1-0.3c0.1-0.6-0.1-1.5-0.3-2c-0.3-0.6-0.7-1.2-0.8-2c0-0.2,0-0.4,0.1-0.6
                    c0.5,0.2,0.8,0.8,1.1,1.2c0-0.1,0-0.3-0.1-0.4c-0.2-0.5-0.4-0.9-0.6-1.4c-0.1-0.2-0.2-0.5-0.2-0.8c-0.1-0.3-0.2-1,0.1-1.2
                    c0.3,0.4,0.7,0.8,0.9,1.2c0.3,0.5,0.4,1,0.5,1.6c0.2-0.2,0.4-0.5,0.5-0.8c0.1-0.3,0.3-0.6,0.4-0.9c0.4,0.6,0.3,1.6,0,2.1
                    c-0.2,0.3-0.3,0.6-0.5,0.9c-0.2,0.3-0.3,0.6-0.4,1c0.1-0.1,0.2-0.3,0.3-0.4c0.3-0.4,0.5-0.8,0.9-1.1c0.2,0.2,0.2,0.4,0.3,0.6
                    c0.2-0.5,0.2-1.2,0.1-1.7c0,0.1,0.1,0.2,0.1,0.2c0-0.3,0.1-0.7,0-1c-0.1-0.3-0.1-0.5-0.3-0.8c-0.2,0-0.3-0.1-0.4-0.4
                    c-0.1-0.3-0.2-0.7-0.2-0.9h-0.1c0.1,0,0-0.2,0-0.3c0,0,0.1,0,0.2,0c0.1-0.2,0-0.5-0.1-0.7c-0.2-0.5-0.3-1.1-0.5-1.5
                    c-0.2-0.7-0.4-1.4-0.7-2c-0.2-0.6-0.5-1.3-0.8-1.9c-0.2-0.4-0.5-0.9-0.7-1.3c-0.1-0.2-0.3-0.4-0.2-0.6c-0.2-0.4-0.6-0.8-0.9-1.1
                    c-0.3-0.4-0.6-0.7-0.9-1.1c-0.6-0.7-1.2-1.5-1.9-2.1c-0.1-0.2-0.2-0.3-0.4-0.4c-0.9-0.5-2.1-0.8-3.2-0.9h-0.5c-0.5,0-1,0.1-1.4,0.3
                    c-0.4,0.2-0.9,0.6-1.4,0.7c-0.3,0.1-0.6,0-0.8-0.1c0,0-0.1-0.1-0.1-0.1c0.1,0,0.2,0,0.4,0c0.3-0.1,0.5-0.2,0.8-0.4
                    c0.3-0.1,0.5-0.3,0.8-0.3c1.8-0.6,3.2-0.4,4.2,0c0.4,0.1,0.7,0.2,1.1,0.4c0.3,0.1,0.8,0.3,1,0.6c0,0.1,0.1,0.2,0.1,0.3
                    c0.1,0.1,0.2,0.2,0.3,0.2c0.3,0.2,0.5,0.5,0.7,0.8c0.6,0.7,1.2,1.4,1.8,2.2c0.1,0.2,0.3,0.4,0.4,0.5c0.2,0.2,0.5,0.5,0.4,0.9
                    c0.6,1.2,1.2,2.3,1.7,3.7c0.4,1.1,0.8,2.4,1.1,3.6c0,0.2,0.1,0.4,0.1,0.6c0,0.1-0.1,0.1-0.2,0.2c-0.1,0.2,0.1,0.7,0.1,0.8
                    c0.1,0.1,0.2,0.2,0.3,0.4C87,18,87,18.5,87.1,19c0.1,0,0.1,0,0.2,0V20.3z M75,22.3c0-0.1-0.1-0.2-0.1-0.3c0,0,0-0.1,0-0.1
                    c-0.1,0-0.2-0.1-0.2-0.3v-0.1c-0.1,0-0.1-0.2-0.1-0.3c0,0,0,0,0-0.1c0,0-0.1-0.1-0.1-0.2c0,0,0,0,0,0c-0.1,0-0.1-0.2-0.1-0.3
                    c0,0,0-0.1,0-0.1c-0.1,0-0.2-0.1-0.2-0.3v-0.1c-0.1,0-0.1-0.1-0.1-0.2c0,0,0,0,0,0c0,0,0,0.1,0,0.1c0,0,0,0.1,0,0.1c0,0,0,0,0,0.1
                    c0,0,0,0,0,0c0,0.1,0,0.1-0.1,0.1c0,0,0.1,0.1,0.1,0.2c0,0.1,0,0.1,0,0.2c0,0,0,0.1,0,0.1c0,0.1,0,0.1,0,0.2c0,0,0,0.1,0,0.1
                    c0,0,0,0,0,0.1c0,0,0,0,0,0c0,0.1,0,0.1-0.1,0.1c0,0,0.1,0.1,0.1,0.2c0,0.1,0,0.1,0,0.2c0,0,0,0.1,0,0.1c0,0.1,0,0.2-0.1,0.2
                    c0,0,0.1,0.1,0.1,0.2c0,0.2-0.1,0.3-0.1,0.3h1.1C75.1,22.5,75,22.4,75,22.3z M73.4,20.8C73.4,20.8,73.4,20.8,73.4,20.8
                    c-0.1,0-0.1,0-0.1,0C73.4,20.8,73.4,20.8,73.4,20.8L73.4,20.8z M75,21.9C75,21.9,75,21.9,75,21.9c0.1,0,0.1-0.1,0.1-0.2
                    c0-0.1-0.1-0.1-0.1-0.1C75,21.7,75,21.8,75,21.9C75,21.9,75,21.9,75,21.9z M65.6,21.1L65.6,21.1c0,0.1,0,0.1,0,0.2l0,0
                    C65.6,21.2,65.6,21.1,65.6,21.1z M65.4,21.5C65.4,21.5,65.5,21.5,65.4,21.5L65.4,21.5l0.1-0.1C65.5,21.4,65.4,21.5,65.4,21.5z
                    M66.4,20.6C66.4,20.6,66.4,20.6,66.4,20.6c-0.1,0-0.1,0-0.1,0C66.3,20.7,66.3,20.7,66.4,20.6C66.3,20.7,66.4,20.7,66.4,20.6z
                    M66,20.1L66,20.1c0,0.1,0,0.1,0,0.2l0,0L66,20.1C66,20.1,66,20.1,66,20.1z M73.9,19.5C73.8,19.5,73.8,19.5,73.9,19.5L73.9,19.5
                    C73.8,19.5,73.8,19.5,73.9,19.5z M66.4,21.6C66.4,21.6,66.4,21.6,66.4,21.6c-0.1,0-0.1,0-0.1,0C66.3,21.7,66.3,21.7,66.4,21.6
                    C66.3,21.7,66.4,21.7,66.4,21.6z M66.6,4.7c0.4-0.2,0.6,0.1,0.7-0.2c-0.2,0-0.3-0.2-0.5-0.2h-0.5C66.3,4.6,66.4,4.7,66.6,4.7z
                    M66.3,19.1C66.4,19.1,66.4,19.1,66.3,19.1c0.1,0,0.1-0.1,0.1-0.1c0,0,0-0.1,0-0.1c0,0-0.1,0-0.1,0s-0.1,0-0.1,0
                    C66.2,18.9,66.2,19,66.3,19.1C66.2,19.1,66.3,19.1,66.3,19.1C66.3,19.1,66.3,19.1,66.3,19.1z M74,21.1C74,21.1,74,21.1,74,21.1
                    c-0.1,0-0.1,0.1-0.1,0.1c0,0,0.1,0,0.1,0.1C74.1,21.3,74.1,21.2,74,21.1L74,21.1C74.1,21.1,74,21.1,74,21.1z M67.4,22.3
                    C67.4,22.3,67.4,22.3,67.4,22.3c0-0.1-0.1-0.1-0.1-0.2v0.1C67.3,22.3,67.4,22.4,67.4,22.3z M73.8,19.9L73.8,19.9c0-0.1,0-0.1,0-0.2
                    l0,0L73.8,19.9C73.8,19.8,73.8,19.8,73.8,19.9z M74.1,22c0,0,0.1-0.1,0.1-0.2c0,0,0-0.1,0-0.1c0,0.1-0.1,0.1-0.1,0.1s0,0-0.1-0.1
                    c0,0,0,0,0,0.1C73.9,21.8,73.9,21.9,74.1,22C74,21.9,74,21.9,74.1,22z M82.3,14.5c-1.3-1-2.8-1.9-4.5-2.7c-1.1-0.5-2.3-0.8-3.6-1.1
                    c-1.9-0.4-4.5-0.5-6.4-0.3c-2,0.2-3.8,0.8-5.5,1.5c-1.6,0.8-3.1,1.7-4.4,2.8c-0.5,0.3-0.9,0.7-1.3,1.1c0.6,0.3,1.2,0.5,1.7,1
                    c0.4,0.4,0.8,1,1,1.6c0.1,0,0.2-0.1,0.3-0.2c0.3-0.2,0.5-0.4,0.8-0.6c1.8-1.4,3.8-2.5,6.4-3c1-0.2,2.1-0.4,3.2-0.4
                    c1.2,0,2.3,0.1,3.4,0.3c2.1,0.5,3.8,1.2,5.3,2.2c0.7,0.4,1.3,0.9,1.9,1.4c0.1,0.1,0.2,0.2,0.3,0.2c0.5-1.3,1.4-2.2,2.7-2.7
                    c-0.2-0.2-0.4-0.4-0.6-0.6S82.6,14.6,82.3,14.5z M59.5,17.2l-0.1-0.1c0.2-0.2,0.2-0.2,0-0.4l-0.7-1c-0.2-0.2-0.2-0.2-0.4-0.1
                    l-0.1-0.1l0.7-0.5c0.2-0.1,0.3-0.2,0.5-0.2s0.3,0.1,0.4,0.2c0.2,0.3,0.1,0.7-0.1,0.9L59.6,16l-0.2,0.1l0.3,0.4
                    c0.2,0.2,0.2,0.2,0.4,0.1l0.1,0.1L59.5,17.2z M61.5,15.4c-0.1-0.1-0.3-0.2-0.5-0.3c-0.1,0-0.2-0.1-0.3,0h-0.1l0.2,0.4
                    c0.1,0.2,0.2,0.2,0.4,0.1v0.1l-0.8,0.4V16c0.2-0.1,0.2-0.2,0.1-0.4l-0.6-1c-0.1-0.2-0.2-0.2-0.4-0.1v-0.1l0.7-0.4
                    c0.2-0.1,0.4-0.2,0.5-0.2s0.3,0.1,0.4,0.2c0.1,0.2,0.1,0.4-0.1,0.6c0.1,0.1,0.3,0.2,0.4,0.2c0.2,0.1,0.3,0.1,0.4,0.2
                    c0.3,0.2,0.3,0.2,0.4,0.3C61.8,15.5,61.7,15.5,61.5,15.4z M63.1,14.9c-0.5,0.2-1.1,0-1.4-0.5c-0.2-0.5-0.1-1.1,0.5-1.4
                    c0.5-0.2,1.1,0,1.4,0.5C63.9,14.1,63.6,14.7,63.1,14.9z M65.3,14.1l-0.9,0.3v-0.1c0.2-0.1,0.3-0.1,0.2-0.4l-0.5-1.4H64
                    c-0.2,0.1-0.3,0.1-0.3,0.2V13h-0.1c-0.1-0.2-0.1-0.4-0.2-0.6h0.1c0.1,0.1,0.1,0,0.2,0l1.2-0.4c0.1,0,0.1-0.1,0.1-0.1h0.1
                    c-0.1,0.2,0,0.4,0,0.6c-0.1-0.1-0.1-0.2-0.2-0.2c-0.1,0-0.1,0-0.3,0l-0.2,0.1l0.5,1.4C65,14,65,14.1,65.3,14.1L65.3,14.1z
                    M67.1,13.6l-1.5,0.3v-0.1c0.3-0.1,0.3-0.1,0.2-0.4l-0.3-1.2c-0.1-0.3-0.1-0.3-0.3-0.2v-0.1l1.4-0.3c0,0.1,0.1,0.3,0.1,0.4h-0.1
                    c-0.1-0.1-0.1-0.2-0.2-0.2c-0.1,0-0.1,0-0.3,0h-0.2c-0.1,0-0.1,0-0.1,0.1l0.2,0.6l0.2-0.1c0.3-0.1,0.3-0.1,0.3-0.3h0.1l0.1,0.6h-0.1
                    c-0.1-0.2-0.1-0.2-0.4-0.1L66,12.7l0.1,0.5c0,0.1,0.1,0.2,0.1,0.2h0.3c0.2,0,0.3-0.1,0.3-0.2c0-0.1,0.1-0.2,0.1-0.3l0.2,0.2V13.6z
                    M68.8,13.3c-0.1,0-0.3,0.1-0.5,0.2c-0.8,0.1-1.2-0.4-1.2-0.9c-0.1-0.6,0.3-1.1,1-1.2h0.6c0,0.2,0.1,0.3,0.1,0.5h-0.1
                    c-0.1-0.3-0.4-0.4-0.6-0.4c-0.5,0.1-0.7,0.5-0.6,1c0.1,0.6,0.4,0.9,0.9,0.8c0.3,0,0.4-0.2,0.5-0.5C68.9,12.9,68.8,13.2,68.8,13.3z
                    M70.6,11.8c0-0.2-0.1-0.2-0.1-0.3c-0.1-0.1-0.1-0.1-0.3-0.1H70v1.5c0,0.2,0,0.3,0.3,0.3v0.1h-1v-0.1c0.3,0,0.3,0,0.3-0.3v-1.5h-0.1
                    c-0.3,0-0.3,0-0.4,0.1c0,0.1-0.1,0.2-0.1,0.3h-0.1v-0.6H69c0,0.1,0.1,0.1,0.2,0.1h1.2c0.1,0,0.1,0,0.2-0.1h0.1
                    C70.7,11.3,70.7,11.6,70.6,11.8z M73,12.5l-0.3,0.3c0.2,0.2,0.3,0.5,0.4,0.7c-0.3,0-0.4-0.1-0.5-0.2c0,0-0.1-0.2-0.2-0.3
                    c-0.2-0.2-0.3-0.4-0.6-0.7c-0.1,0.1-0.2,0.2-0.2,0.3c0,0.3,0.2,0.5,0.4,0.5c0.1,0.1,0.2,0,0.3,0c-0.2,0.1-0.3,0.2-0.5,0.2
                    c-0.4,0-0.6-0.4-0.6-0.6c0-0.3,0.2-0.4,0.5-0.5c-0.1-0.1-0.2-0.3-0.2-0.5c0-0.3,0.3-0.5,0.6-0.4c0.3,0,0.5,0.2,0.4,0.5
                    c0,0.1-0.1,0.2-0.2,0.2c-0.1,0-0.1,0-0.2,0.1c0,0,0,0,0,0c0,0,0,0,0,0c0,0-0.1,0-0.1,0c0.1,0.1,0.3,0.3,0.4,0.5
                    c0.1-0.1,0.1-0.2,0.2-0.3c0.1-0.1,0.1-0.2-0.2-0.2V12l1,0.3C73.2,12.3,73.1,12.3,73,12.5z M74.3,13.7c-0.1,0-0.2-0.1-0.3-0.1
                    c-0.1,0-0.1-0.1-0.2-0.1V13h0.1c0,0.2,0.1,0.6,0.4,0.6c0.2,0,0.4-0.1,0.4-0.2c0-0.2-0.1-0.3-0.3-0.5c-0.2-0.2-0.4-0.4-0.4-0.7
                    c0.1-0.3,0.4-0.5,0.8-0.4c0.2,0,0.3,0.1,0.4,0.2c0,0.1,0,0.2-0.1,0.4c0-0.2-0.1-0.4-0.3-0.5c-0.2,0-0.3,0.1-0.4,0.2
                    c0,0.2,0.1,0.3,0.3,0.5c0.2,0.2,0.4,0.4,0.4,0.7C75,13.6,74.7,13.8,74.3,13.7z M74.9,13.8c0.3,0.1,0.3,0.1,0.4-0.2l0.4-1.1
                    c0.1-0.3,0.1-0.3-0.1-0.4V12l1.3,0.5c0,0.1-0.1,0.3-0.1,0.4h-0.1v-0.3c0-0.1-0.1-0.1-0.3-0.2l-0.2-0.1c-0.1,0-0.1,0-0.1,0.1L75.9,13
                    l0.2,0.1c0.3,0.1,0.3,0.1,0.4-0.1h0.1l-0.3,0.7h-0.1c0-0.2,0-0.2-0.2-0.3l-0.2-0.1l-0.2,0.5c0,0.1-0.1,0.2,0,0.3
                    c0,0,0.1,0.1,0.3,0.1c0.2,0.1,0.3,0.1,0.4,0c0-0.1,0.1-0.2,0.3-0.2c-0.1,0.1-0.2,0.4-0.3,0.4l-1.4-0.5V13.8z M78.1,13.7
                    C78,13.9,77.8,14,77.5,14c0,0.1,0,0.3,0.1,0.5c0,0.2,0.1,0.3,0.1,0.4C78,15,78,15.1,78,15.2c-0.4-0.2-0.5-0.3-0.5-0.5s0-0.4-0.1-0.5
                    c0-0.1,0-0.2-0.2-0.2h-0.1l-0.2,0.4c-0.1,0.2-0.1,0.3,0.1,0.4v0.1l-0.8-0.4v-0.1c0.2,0.1,0.3,0.1,0.4-0.2l0.5-1.1
                    c0.1-0.2,0.1-0.3-0.1-0.4v-0.1l0.7,0.3c0.2,0.1,0.4,0.2,0.4,0.3C78.2,13.3,78.2,13.5,78.1,13.7z M78.6,15.5c0.1-0.6,0.2-1.3,0.3-1.7
                    c0-0.2,0-0.3-0.1-0.4v-0.1l0.7,0.4v0.1c-0.2-0.1-0.2-0.1-0.2,0.1c0,0.2-0.1,0.9-0.2,1.3c0.3-0.3,0.7-0.6,0.9-0.8
                    c0.2-0.1,0.2-0.2,0-0.3V14l0.5,0.4c-0.2-0.1-0.2-0.1-0.5,0.1c-0.2,0.1-0.8,0.6-1.3,1.1L78.6,15.5z M81.8,15.5L81.8,15.5
                    c-0.1-0.1,0-0.2,0-0.3c0-0.1-0.1-0.1-0.2-0.3l-0.1-0.1c-0.1-0.1-0.1-0.1-0.2,0l-0.4,0.5l0.2,0.1c0.2,0.2,0.3,0.2,0.4,0l0.1,0.1
                    L81.3,16l-0.1-0.1c0.1-0.2,0.1-0.2-0.1-0.4l-0.2-0.1l-0.3,0.4c-0.1,0.1-0.1,0.2-0.1,0.2c0,0.1,0.1,0.1,0.2,0.2
                    c0.2,0.1,0.2,0.1,0.3,0.1c-0.1,0.3,0,0.3,0.2,0.3c-0.1,0.1-0.3,0.3-0.4,0.3L79.5,16l0.1-0.1c0.2,0.1,0.3,0.1,0.4-0.1l0.7-1
                    c0.2-0.2,0.1-0.2,0-0.4l0.1-0.1l1.2,0.8C82,15.2,81.9,15.3,81.8,15.5z M64,5.7C64,6,64,6.4,63.9,6.7C64,6.5,64,6.3,64,6
                    C64,5.9,64.1,5.8,64,5.7z M73.5,20.5c0,0-0.1,0-0.1-0.1L73.5,20.5C73.4,20.5,73.4,20.6,73.5,20.5L73.5,20.5z M66.4,20.9
                    C66.4,20.9,66.4,20.9,66.4,20.9c-0.1,0-0.1,0-0.1,0C66.3,21,66.3,21,66.4,20.9C66.3,21,66.4,21,66.4,20.9z M66.3,20
                    C66.3,20,66.3,20,66.3,20c0.1,0,0.1,0,0.1,0C66.4,19.9,66.4,19.9,66.3,20C66.3,19.9,66.3,19.9,66.3,20z M74,19.5
                    C74,19.5,74,19.5,74,19.5c0,0.1,0,0.1,0,0.1c0,0,0,0,0,0C74.1,19.6,74.1,19.6,74,19.5C74.1,19.6,74.1,19.6,74,19.5
                    C74.1,19.5,74.1,19.5,74,19.5L74,19.5c0.1-0.1,0.1-0.1,0-0.1C74.1,19.4,74.1,19.4,74,19.5z M74,19.1C74.1,19.1,74.1,19.1,74,19.1
                    C74.1,19.1,74.1,19,74,19.1c0.1-0.1,0-0.2,0-0.2c0,0-0.1,0-0.1,0C74,18.9,73.9,19,74,19.1C73.9,19.1,74,19.1,74,19.1
                    C74,19.1,74,19.1,74,19.1z M66.3,20.8C66.4,20.8,66.4,20.8,66.3,20.8c0.1,0,0.1,0,0.1,0c0-0.1,0-0.1,0-0.2
                    C66.4,20.7,66.3,20.8,66.3,20.8z M74,20.1C74,20.1,74,20.1,74,20.1c-0.1,0-0.1,0.1-0.1,0.1c0,0,0.1,0,0.1,0.1
                    C74.1,20.3,74.1,20.2,74,20.1C74.1,20.1,74.1,20.1,74,20.1C74.1,20.1,74,20.1,74,20.1z M73.9,19.4L73.9,19.4l0,0.1
                    C73.8,19.5,73.9,19.4,73.9,19.4z M66.5,19.8C66.6,19.8,66.6,19.8,66.5,19.8L66.5,19.8c0.1-0.1,0.1-0.1,0.1-0.1
                    C66.6,19.7,66.6,19.8,66.5,19.8z M66.3,20.2C66.4,20.2,66.4,20.2,66.3,20.2c0.1,0,0.1,0,0.1-0.1c0-0.1,0-0.1,0-0.2
                    c0,0.1-0.1,0.2-0.1,0.2c-0.1,0-0.1,0-0.1-0.1c0,0,0,0,0,0.1C66.2,20.1,66.2,20.2,66.3,20.2C66.3,20.2,66.3,20.2,66.3,20.2z
                    M66.3,19.8C66.4,19.8,66.4,19.8,66.3,19.8C66.4,19.9,66.4,19.9,66.3,19.8c0.1,0,0-0.1,0-0.1C66.4,19.7,66.3,19.7,66.3,19.8
                    c0-0.1-0.1-0.1-0.1-0.2C66.3,19.7,66.2,19.7,66.3,19.8C66.2,19.8,66.2,19.8,66.3,19.8C66.3,19.8,66.3,19.8,66.3,19.8z M66.3,20.8
                    c-0.1,0-0.1,0-0.1-0.1C66.2,20.7,66.2,20.8,66.3,20.8C66.2,20.8,66.2,20.8,66.3,20.8C66.3,20.8,66.3,20.8,66.3,20.8z M66.3,20.5
                    C66.4,20.5,66.4,20.5,66.3,20.5c0.1,0,0.1,0,0.1,0c0-0.1,0-0.1-0.1-0.2C66.4,20.4,66.3,20.4,66.3,20.5c0-0.1,0-0.1-0.1-0.2
                    C66.3,20.4,66.2,20.4,66.3,20.5C66.2,20.5,66.2,20.5,66.3,20.5C66.3,20.5,66.3,20.5,66.3,20.5z M74,19.7C74,19.7,74.1,19.7,74,19.7
                    c0-0.1,0-0.1,0-0.1S74,19.6,74,19.7C74,19.7,74,19.7,74,19.7z M81,37.3c0,0,0-0.1,0-0.1c0,0.1,0,0.3,0,0.4C81,37.5,81,37.4,81,37.3z
                    M58.6,37.2c-0.1-0.1-0.2-0.1-0.3-0.2c-0.1-0.1,0-0.4,0-0.6v-0.6c0-0.6-0.3-1-0.7-1.3c-0.2-0.1-0.4-0.2-0.7-0.4
                    c-0.2-0.2-0.4-0.3-0.5-0.5c-0.1-0.2-0.2-0.5-0.3-0.8c0.3,0,0.5,0.1,0.6,0.2c0.2,0.1,0.3,0.3,0.4,0.4c0-0.1-0.1-0.3-0.1-0.4
                    c-0.1-0.3-0.3-0.5-0.5-0.7c-0.3-0.3-0.7-0.6-1-1c-0.4-0.5-0.8-1-0.7-1.8c0.2,0,0.3,0.2,0.5,0.3c0.1,0.1,0.3,0.2,0.4,0.3
                    c0.1,0.1,0.1,0.2,0.2,0.2c-0.3-0.8-0.8-1.4-1.2-2.1c-0.2-0.4-0.4-0.7-0.5-1.1c-0.1-0.4-0.3-0.8-0.3-1.3c0.3,0.2,0.6,0.5,0.8,0.8
                    c0.1,0.2,0.2,0.3,0.3,0.5c0.1,0.2,0.2,0.3,0.3,0.5c-0.2-0.8-0.7-1.5-1.1-2.1c-0.2-0.3-0.4-0.7-0.5-1c0.1,0.3,0.2,0.6,0.3,0.9
                    c-0.1-0.1-0.2-0.2-0.4-0.3c0.2,0.8,0.4,1.6,0.7,2.4c0.3,0.7,0.7,1.4,1,2c-0.3-0.1-0.5-0.3-0.8-0.4c0,0.1,0.1,0.3,0.1,0.4
                    c0.2,0.5,0.2,1,0.4,1.4c0.3,0.7,0.9,1.1,1.4,1.6c0.1,0.1,0.2,0.1,0.2,0.2c-0.2,0-0.4-0.2-0.6-0.2c-0.1,0.1,0,0.2,0,0.3
                    c0.1,0.3,0.1,0.5,0.2,0.7s0.2,0.4,0.3,0.6c0.2,0.2,0.5,0.4,0.7,0.5c0.3,0.2,0.6,0.3,0.7,0.5c0.3,0.4,0.1,1,0.1,1.6
                    c0,0.1,0,0.3,0.1,0.4c0,0.1,0.3,0.4,0.4,0.4c0.1,0.1,0.3,0,0.3-0.1c0.1-0.1,0.1-0.3,0.1-0.4C58.7,37.1,58.6,37.1,58.6,37.2z
                    M74,19.4C74,19.4,74,19.4,74,19.4c0,0-0.1,0.1-0.1,0.1C74,19.5,74,19.4,74,19.4C74,19.4,74,19.4,74,19.4z M66.2,19.5
                    C66.2,19.4,66.2,19.4,66.2,19.5L66.2,19.5C66.2,19.5,66.2,19.5,66.2,19.5z M79,4.8c0,0,0,0.1,0.1,0.1c0.2,0.4,0.4,0.8,0.7,1.1
                    c-0.1-0.1-0.1-0.2-0.2-0.3C79.4,5.4,79.2,5.1,79,4.8z M66.4,19.3c0,0,0,0.1,0,0.2c0,0,0,0,0,0c0,0,0,0,0,0
                    C66.4,19.5,66.4,19.5,66.4,19.3C66.4,19.4,66.4,19.4,66.4,19.3C66.4,19.3,66.4,19.3,66.4,19.3z M58.8,36c-0.1,0.3,0.1,0.6,0.1,0.9
                    c0,0,0,0,0,0.1c0.1,0,0.1-0.1,0.2-0.1v-0.5C59.1,36.2,58.9,36.1,58.8,36z M66.3,21.2C66.4,21.2,66.4,21.2,66.3,21.2
                    c0.1,0,0.1,0,0.1-0.1c0-0.1,0-0.1,0-0.2c0,0.1-0.1,0.2-0.1,0.2c-0.1,0-0.1,0-0.1-0.1c0,0,0,0,0,0.1C66.2,21.1,66.2,21.2,66.3,21.2
                    C66.3,21.2,66.3,21.2,66.3,21.2z M54.4,24.3c-0.1-0.6-0.3-1.1-0.6-1.6c0,0.1,0.1,0.2,0.1,0.3c-0.1-0.1-0.2-0.2-0.2-0.2
                    c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1,0.2,0,0.5,0,0.7c0,0,0-0.1,0-0.1C53.9,23.4,54.1,24,54.4,24.3z M53.4,23.5c0-0.1,0-0.1,0-0.2
                    c0,0.4,0.1,0.8,0.3,1.2c0,0,0,0,0,0c0-0.1-0.1-0.2-0.1-0.3C53.5,24,53.4,23.7,53.4,23.5z M66.4,19.5L66.4,19.5
                    C66.4,19.4,66.4,19.4,66.4,19.5C66.4,19.5,66.4,19.5,66.4,19.5z M66.7,20.5C66.7,20.5,66.8,20.6,66.7,20.5
                    C66.8,20.5,66.8,20.5,66.7,20.5L66.7,20.5c0.1-0.1,0.1-0.2,0.1-0.2C66.8,20.4,66.8,20.4,66.7,20.5z M65.8,20.5c0,0-0.1,0-0.1-0.1
                    L65.8,20.5C65.7,20.5,65.7,20.6,65.8,20.5L65.8,20.5z M66.1,19.9L66.1,19.9c0-0.1,0-0.1,0-0.2l0,0L66.1,19.9
                    C66.1,19.8,66.1,19.8,66.1,19.9z M66.4,20.5C66.4,20.5,66.4,20.5,66.4,20.5c0,0.1,0,0.2,0,0.3c0,0,0,0,0,0.1c0,0,0,0.1,0,0.2
                    c0,0.1,0,0.1,0,0.2c0,0,0,0.1,0,0.2c0,0,0,0,0,0.1c0,0,0,0.1,0,0.2c0,0.1,0,0.1,0,0.2c0,0,0,0.1,0,0.2c0,0.2-0.1,0.3-0.1,0.3h1.1
                    c0,0-0.1-0.1-0.1-0.2c0-0.1-0.1-0.2-0.1-0.3c0,0,0-0.1,0-0.1c-0.1,0-0.2-0.1-0.2-0.3v-0.2c-0.1,0-0.1-0.1-0.1-0.2c0,0,0,0,0-0.1
                    c0,0-0.1-0.1-0.1-0.2c0,0,0,0,0-0.1c0,0-0.1-0.1-0.1-0.2c0,0,0-0.1,0-0.1c-0.1,0-0.2-0.1-0.2-0.3v-0.1c-0.1,0-0.1-0.1-0.1-0.2
                    c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0.1,0,0.2c0,0.1,0,0.1,0,0.2C66.4,20.3,66.4,20.4,66.4,20.5z M75,22.2C75,22.3,75.1,22.4,75,22.2
                    C75.1,22.3,75.1,22.3,75,22.2C75.1,22.2,75.1,22.2,75,22.2L75,22.2z M73.1,21.5C73.1,21.5,73.2,21.5,73.1,21.5L73.1,21.5l0.1-0.1
                    C73.2,21.4,73.1,21.5,73.1,21.5z M73.3,21.1L73.3,21.1c0,0.1,0,0.1,0,0.2l0,0C73.3,21.2,73.3,21.1,73.3,21.1z M77.1,5.4
                    C77,5,76.8,4.6,76.7,4.1c-0.1-0.1-0.1-0.3-0.2-0.4c0.1,0.4,0.2,0.7,0.3,1C76.9,4.9,77,5.2,77.1,5.4z M65.7,20.8
                    C65.7,20.8,65.7,20.8,65.7,20.8C65.7,20.8,65.7,20.8,65.7,20.8C65.7,20.8,65.7,20.8,65.7,20.8L65.7,20.8z M66.3,21.9
                    C66.4,21.9,66.4,21.9,66.3,21.9c0.1,0,0.1,0,0.1-0.1c0-0.1,0-0.1,0-0.2c0,0.1-0.1,0.2-0.1,0.2c-0.1,0-0.1,0-0.1-0.1c0,0,0,0.1,0,0.1
                    C66.2,21.8,66.2,21.9,66.3,21.9C66.3,21.9,66.3,21.9,66.3,21.9z M66.3,21.5C66.4,21.5,66.4,21.5,66.3,21.5c0.1,0,0.1,0,0.1,0
                    c0-0.1,0-0.1-0.1-0.2C66.4,21.4,66.3,21.4,66.3,21.5c0-0.1,0-0.1-0.1-0.2C66.3,21.4,66.2,21.4,66.3,21.5c-0.1,0-0.1,0.1-0.1,0.1
                    C66.3,21.5,66.3,21.5,66.3,21.5z M66.2,19.4C66.2,19.4,66.2,19.3,66.2,19.4c0-0.1,0-0.1,0-0.1V19.4l-0.1,0.1
                    C66.2,19.5,66.2,19.4,66.2,19.4z M86,22.3c0.1,0,0.2-0.1,0.3-0.2c0-0.1,0.1-0.1,0.1-0.2c0.1-0.1,0.1-0.3,0.2-0.4
                    c0.1-0.2,0.1-0.4,0.1-0.7c0,0.1,0,0.1-0.1,0.2C86.5,21.5,86.2,21.9,86,22.3z M74,22.4c0,0,0.1-0.1,0.1-0.2c0,0-0.1-0.1-0.1-0.1
                    c0,0,0,0,0,0s0,0-0.1,0c0,0,0,0.1,0,0.1C73.9,22.3,73.9,22.4,74,22.4z M66.3,22.4c0,0,0.1-0.1,0.1-0.2c0-0.1,0-0.1-0.1-0.2
                    c0,0,0,0.1,0,0.1c0,0,0,0-0.1-0.1c0,0,0,0.1,0,0.2C66.2,22.3,66.2,22.4,66.3,22.4z M66.9,20.9C66.9,20.9,66.9,20.9,66.9,20.9
                    C66.9,20.9,66.9,20.9,66.9,20.9C66.9,20.9,66.9,20.9,66.9,20.9z M87,19.3c0,0.1,0,0.1,0,0.2C87,19.6,87,19.5,87,19.3z M67.3,21.7
                    c0-0.1-0.1-0.1-0.1-0.1c0.1,0.1,0.1,0.2,0,0.3c0,0,0,0,0,0.1c0,0,0,0,0.1,0C67.3,21.9,67.3,21.8,67.3,21.7z M73.7,20.1L73.7,20.1
                    c0,0.1,0,0.1,0,0.2l0,0L73.7,20.1C73.7,20.1,73.7,20.1,73.7,20.1z M60.1,37.3C60.1,37.3,60.1,37.2,60.1,37.3
                    C60,37.3,60.1,37.3,60.1,37.3z M84.8,28.8c0.1-0.1,0.2-0.3,0.2-0.4c0,0,0,0,0,0C84.9,28.5,84.8,28.6,84.8,28.8z M60.1,37.3
                    c0,0,0.1,0.1,0.1,0.1C60.2,37.4,60.2,37.3,60.1,37.3C60.1,37.3,60.1,37.3,60.1,37.3z M66.4,44.4c-0.1,0-0.1-0.1-0.2-0.1
                    C66.3,44.2,66.3,44.3,66.4,44.4C66.4,44.3,66.4,44.3,66.4,44.4z M67.7,44.9c-0.3-0.1-0.7-0.2-1-0.4C67.1,44.7,67.4,44.8,67.7,44.9z
                    M85.1,28.4c0.2-0.1,0.4-0.2,0.6-0.4v-0.4c0,0-0.1,0-0.2,0c-0.1,0.2-0.1,0.3-0.2,0.5C85.2,28.2,85.1,28.3,85.1,28.4z M64.6,42.9
                    c0.1,0.1,0.3,0.3,0.5,0.4c-0.4-0.4-0.7-0.8-1.1-1.2c-0.5-0.7-1-1.5-1.5-2.2c0.3,0.4,0.6,0.8,0.8,1.2C63.7,41.7,64.1,42.4,64.6,42.9z
                    M66.1,44.1c-0.2-0.1-0.4-0.3-0.5-0.4c0,0,0.1,0.1,0.1,0.1C65.8,43.9,65.9,44,66.1,44.1z M74.1,20.6c0,0,0.1-0.1,0.1-0.1
                    c0,0-0.1-0.1-0.1-0.1c0,0,0,0,0,0s0,0-0.1,0c0,0,0,0.1,0,0.1C73.9,20.5,74,20.5,74.1,20.6z M85.2,30C85.3,30,85.3,30,85.2,30
                    c0,0.1-0.1,0.3-0.2,0.5C85.1,30.3,85.2,30.2,85.2,30z M84.1,30.1c0.2-0.1,0.3-0.3,0.5-0.4c0.2-0.1,0.4-0.2,0.6-0.3
                    c0,0.2,0,0.4,0,0.5c0.1-0.2,0.1-0.4,0.1-0.5c0.1-0.4,0.2-0.7,0.3-1.1c-0.3,0.1-0.4,0.4-0.8,0.5c0,0,0,0,0,0
                    c-0.1,0.1-0.1,0.2-0.2,0.3C84.4,29.4,84.1,29.7,84.1,30.1z M74.2,19.8C74.3,19.8,74.3,19.8,74.2,19.8L74.2,19.8
                    c0.1-0.1,0.1-0.1,0.1-0.1C74.3,19.7,74.3,19.8,74.2,19.8z M81,37.2C81,37.2,81,37.1,81,37.2c0-0.4,0-0.7-0.1-1c0,0,0,0.1,0,0.1
                    C80.9,36.7,81,36.9,81,37.2z M67.7,44.9c0,0,0.1,0,0.1,0.1C67.8,44.9,67.8,44.9,67.7,44.9C67.7,44.9,67.7,44.9,67.7,44.9z
                    M67.8,44.9c0.1,0.1,0.2,0.1,0.3,0.2c-0.1,0-0.2-0.1-0.2-0.1C67.9,45,67.9,45,67.8,44.9z M79.9,39.9c-0.2,0.3-0.3,0.6-0.5,0.8
                    c-0.1-0.3,0-0.8,0-1s0.1-0.4,0.1-0.6c-0.2,0.5-0.3,1-0.5,1.4c-0.2,0.5-0.5,0.9-0.7,1.3c-0.1-0.1-0.1-0.4,0-0.6
                    c0.1-0.5,0.2-0.9,0.3-1.2c-0.2,0.2-0.3,0.4-0.4,0.7c-0.2,0.5-0.4,1.1-0.6,1.6c-0.1,0.3-0.2,0.5-0.4,0.7c0-0.7,0.2-1.2,0.4-1.8
                    c-0.1,0-0.1,0.1-0.1,0.2c-0.3,0.5-0.5,1-0.7,1.5c0,0.1-0.1,0.3-0.2,0.4c0.1-0.1,0.1-0.1,0.2-0.1c0,0.1,0,0.2,0.1,0.3
                    c0.1-0.1,0.3-0.2,0.3-0.3c0.2-0.2,0.4-0.5,0.5-0.8c0-0.1,0.1-0.4,0.3-0.4c0.1,0,0.1,0.3,0.2,0.3c0.1,0,0.1-0.3,0.2-0.4
                    c0.2-0.4,0.4-0.8,0.6-1.1c0.1,0,0.2,0.4,0.3,0.4s0.2-0.4,0.2-0.5c0.4-0.8,1-1.4,1.3-2.3c0.1-0.3,0.1-0.5,0.2-0.7
                    c-0.1,0.5-0.3,1-0.6,1.4C80.2,39.4,80.1,39.7,79.9,39.9z M62.2,39.6c0.1,0.1,0.2,0.2,0.3,0.3c-0.2-0.2-0.3-0.4-0.5-0.6l-1-1
                    c-0.2-0.2-0.6-0.6-0.8-0.9c0.1,0.2,0.3,0.3,0.4,0.5c0.2,0.2,0.3,0.4,0.5,0.6C61.4,38.9,61.8,39.2,62.2,39.6z M66.4,19.6
                    C66.4,19.6,66.4,19.6,66.4,19.6C66.3,19.6,66.3,19.6,66.4,19.6C66.3,19.7,66.3,19.7,66.4,19.6C66.3,19.7,66.4,19.7,66.4,19.6
                    C66.4,19.6,66.4,19.6,66.4,19.6z M67.1,21.5C67.1,21.5,67.1,21.5,67.1,21.5C67.1,21.5,67.2,21.6,67.1,21.5
                    C67.2,21.5,67.2,21.5,67.1,21.5c0.1-0.1,0.1-0.1,0.1-0.1C67.2,21.4,67.2,21.5,67.1,21.5z M86.1,24.2C86,24.3,86,24.4,86,24.5
                    c0.1,0,0.1,0,0.2-0.1c0.2-0.4,0.3-0.9,0.3-1.4c0,0-0.1,0.1-0.1,0.1c0,0,0,0,0,0C86.4,23.4,86.2,23.8,86.1,24.2z M85.8,26.4
                    c0,0.2-0.1,0.4-0.2,0.5c0,0.3-0.1,0.5-0.2,0.7h0c0.3-0.6,0.5-1.2,0.6-1.9c0,0,0,0,0,0c0,0.1-0.1,0.3-0.1,0.4
                    C85.8,26.2,85.8,26.3,85.8,26.4z M65.3,21.8C65.3,21.8,65.3,21.8,65.3,21.8C65.3,21.8,65.3,21.8,65.3,21.8c-0.1,0.1-0.1,0.1-0.1,0.1
                    L65.3,21.8z M85.7,24c0.2-0.4,0.4-0.7,0.7-0.9c0.1-0.3,0.1-0.8,0.1-1.2c0,0,0,0-0.1,0c-0.3,0.8-0.8,1.5-0.9,2.5
                    C85.6,24.3,85.7,24.2,85.7,24z M65.2,22.2c0,0,0-0.1,0-0.2l-0.1,0.1C65.1,22.2,65.1,22.3,65.2,22.2L65.2,22.2z M66.2,22.2
                    c-0.1-0.1,0-0.2,0-0.3c0,0,0-0.1,0-0.1c0-0.1,0-0.1,0-0.2c0,0,0-0.1,0-0.1c-0.1-0.1,0-0.2,0-0.3c0,0,0-0.1,0-0.1
                    c-0.1-0.1,0-0.2,0-0.2c0,0,0,0,0-0.1c-0.1-0.1,0-0.2,0-0.3c0,0,0,0,0,0c-0.1-0.1,0-0.2,0-0.3c0,0,0-0.1,0-0.1c-0.1-0.1,0-0.2,0-0.3
                    c0,0,0,0,0,0c-0.1,0.1-0.1,0.2-0.1,0.2c0,0,0,0.1-0.1,0.2c0,0,0,0,0,0.1c0,0.1,0,0.1-0.1,0.2c0,0.1-0.1,0.1-0.1,0.2v0.2
                    c-0.1,0.2-0.2,0.3-0.2,0.3c0,0,0,0,0,0.1c0,0.1,0,0.1-0.1,0.2c0,0,0,0.1-0.1,0.1c0,0.1,0,0.2,0,0.3c0,0.1-0.1,0.1-0.1,0.2v0.1
                    c-0.1,0.2-0.2,0.3-0.2,0.3h1.2C66.2,22.5,66.2,22.4,66.2,22.2z M84.6,27.4c0.1,0,0.1-0.1,0.1-0.1c0.3-0.5,0.7-1,1.1-1.4
                    c0.1-0.1,0.1-0.2,0.2-0.2c0.1-0.5,0.3-1,0.4-1.4c-0.1,0-0.2,0.1-0.2,0.1c-0.2,0.4-0.4,0.7-0.6,1.1C85.3,26.1,84.9,26.7,84.6,27.4z
                    M74,20.3C74,20.3,74,20.3,74,20.3c0,0.1,0,0.1,0,0.1C74,20.4,74.1,20.4,74,20.3C74,20.3,74,20.3,74,20.3z M74.1,19.9
                    C74.1,19.9,74.1,19.9,74.1,19.9c0-0.1,0-0.2,0-0.2c0,0,0,0.1,0,0.1s0,0-0.1-0.1c0,0,0,0.1,0,0.1C73.9,19.8,74,19.8,74.1,19.9z M79,4
                    c0.1,0.2,0.3,0.5,0.5,0.8c0.2,0.3,0.5,0.7,0.7,1c-0.5-0.7-0.9-1.4-1.4-2.1C78.9,3.9,79,3.9,79,4z M60.2,14.2
                    C60.1,14.2,60.1,14.3,60.2,14.2l-0.1,0.2l0.6,0.6c0.1-0.1,0.2-0.1,0.2-0.2c0-0.1,0-0.3-0.1-0.4C60.6,14.1,60.4,14.1,60.2,14.2z
                    M59.5,15.3c-0.2-0.3-0.4-0.3-0.6-0.1c-0.1,0-0.1,0.1-0.1,0.1v0.1l0.5,0.6c0,0,0.1,0,0.2-0.1C59.6,15.8,59.8,15.6,59.5,15.3z
                    M62.3,13.2c-0.4,0.1-0.5,0.5-0.2,1c0.2,0.5,0.6,0.8,1,0.6c0.3-0.1,0.4-0.5,0.2-1C63,13.2,62.6,13,62.3,13.2z M72.1,11.4
                    c-0.1,0.1-0.2,0.2-0.2,0.3c0,0.2,0.1,0.3,0.2,0.4c0,0,0,0,0.1,0c0.1-0.1,0.2-0.2,0.2-0.4C72.3,11.5,72.2,11.4,72.1,11.4z M77.8,13
                    C77.7,13,77.7,13,77.8,13c-0.1,0-0.1,0-0.2,0.1l-0.2,0.7c0.1,0.1,0.2,0.1,0.3,0.1c0.1,0,0.2-0.1,0.3-0.3C78.1,13.3,78,13.1,77.8,13z
                    M69.4,29.3c0-0.3-0.2-0.4-0.4-0.4c-0.1,0-0.2,0.1-0.2,0.4c0,0.2,0.2,0.4,0.4,0.4c0.1,0,0.2,0,0.2-0.1
                    C69.5,29.5,69.5,29.4,69.4,29.3z M72.3,29.5c0.1,0,0.1-0.1,0.1-0.1c0-0.1,0-0.1,0-0.2c0,0,0,0-0.1,0l-0.1,0l-0.1,0.3
                    C72.2,29.5,72.2,29.5,72.3,29.5z M73.1,28.5c-0.1-0.1-0.3-0.2-0.3,0c0.1,0.1,0.3,0.2,0.5,0.2C73.3,28.6,73.2,28.6,73.1,28.5z
                    M67.4,28.4c-0.2,0.1-0.4,0.2-0.5,0.3C67.1,28.7,67.3,28.6,67.4,28.4z M63.3,30.3c0.1-0.4-0.2-0.5-0.3-0.7c-0.3,0.3-0.5,0.5-0.8,0.8
                    c0.2,0.1,0.3,0.4,0.7,0.3C63,30.7,63.3,30.5,63.3,30.3z M65.6,34.6c0.3-0.3,0.4-0.7,0.6-1.1c0.1-0.2,0.2-0.4,0.2-0.6
                    c0.1-0.2,0.2-0.5,0.1-0.7c0-0.4-0.4-0.5-0.7-0.3c-0.2,0.1-0.4,0.6-0.4,0.7c-0.1,0.2-0.2,0.5-0.3,0.8c-0.1,0.3-0.2,0.5-0.2,0.8
                    C65,34.7,65.4,34.8,65.6,34.6z M72.4,31.3C72.4,31.3,72.4,31.3,72.4,31.3C72.5,31.3,72.5,31.4,72.4,31.3
                    C72.5,31.3,72.5,31.3,72.4,31.3z"/>
                  <path fill="#ED1C24" d="M26.2,22c0.2,0.1,0.3,0.4,0.4,0.6c0.2,0,0.2-0.2,0.4-0.2c0.3,0,0.5,0.4,0.8,0.4c0-0.5-0.3-1-0.5-1.4
                    c0-0.1,0.2,0,0.2-0.2c-0.2-0.5-0.4-0.9-0.6-1.4c-0.9,0.4-1.9,0.8-3.1,0.6c-0.5,1.2,0.1,2.5,1.1,2.8C25.2,22.7,25.6,22.2,26.2,22z
                    M29.8,23.3c0.2-0.4,0.4-0.9,0.8-1.3c0,0,0,0,0.1-0.1c0,0,0.1-0.1,0.1-0.1c0.6,0.3,0.9,0.8,1.3,1.2c0.2-0.1,0.4-0.2,0.5-0.3
                    c0.6-0.5,0.9-1.4,0.5-2.4c-1.3,0.3-2.3-0.2-3.1-0.6c0,0,0,0.1-0.1,0.1c-0.1,0.2-0.2,0.4-0.3,0.5c0,0,0,0,0,0.1
                    c-0.1,0.2-0.2,0.4-0.2,0.7c0,0.1,0.2,0.1,0.2,0.2c-0.2,0.3-0.3,0.6-0.4,0.8c-0.1,0.2-0.1,0.4-0.2,0.6c0,0,0,0,0,0
                    C29.4,23,29.6,23.2,29.8,23.3z M29.9,27.8c-0.3-0.4-0.5-0.8-0.9-1.1c-0.5,0.2-1,0.3-1.5,0.4c-0.6,0.7-1.1,1.7-2.2,2c0,0,0,0,0,0
                    c0,0.6,0.4,1.4,0.8,1.3c0.1-0.1,0.2-0.3,0.4-0.5c0.1-0.1,0.2-0.3,0.2-0.4c0.1-0.2,0.3-0.4,0.4-0.6c0.4-0.5,0.8-1,1.2-1.4
                    c0,0,0.1-0.1,0.1-0.1c0,0,0.1-0.1,0.1-0.1c0.3,0.5,0.7,1,1.1,1.5c0.3,0.5,0.6,1.1,1,1.6c0.2-0.1,0.4-0.3,0.5-0.4
                    c0.2-0.2,0.3-0.5,0.3-1C30.7,28.8,30.3,28.3,29.9,27.8z M27.6,25.5c0.1-0.1,0.2-0.1,0.3-0.2c0.7-0.4,1.8-0.3,2.8-0.4
                    c0,0,0-0.1-0.1-0.1c-0.5-1.1-1.3-1.9-2.5-2.2c-0.2,0.1-0.2,0.3-0.4,0.3c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1,0-0.1-0.1-0.2-0.1
                    c-0.1-0.1-0.2-0.1-0.3-0.1c-0.3,0.3-0.6,0.6-1,0.7c0,0.3-0.1,0.5-0.2,0.8c0,0,0,0.1,0,0.1c0.1-0.2,0.2-0.2,0.3-0.4
                    c0,0.1,0.2,0.4,0.2,0.2c0,0,0-0.1,0-0.1c0-0.1-0.1-0.1-0.1-0.2c0,0,0,0,0,0c0.5-0.4,1-0.3,1.3,0.1c0,0,0,0,0,0.1c0,0,0,0,0,0
                    c0,0,0,0,0,0c-0.1,0-0.1,0-0.2,0.1c0,0,0,0.1,0,0.1c0.1,0,0.2-0.2,0.3-0.1c0.2,0.2,0.2,0.4,0.2,0.6c0,0.3-0.2,0.6-0.4,0.8
                    c0,0,0-0.1,0-0.1c0,0,0,0,0,0c0,0-0.1,0-0.1-0.1c0,0,0,0,0,0c0,0.1,0.1,0.1,0.2,0.2c0,0,0,0.1,0,0.1c-0.5,0.3-1,0.2-1.4-0.2
                    c0,0,0,0,0.1-0.1c0.1,0,0.1,0,0.1-0.1c0,0,0,0-0.1,0c-0.1,0-0.2,0.1-0.2,0.1c0-0.2-0.1-0.3-0.2-0.4c0,0.2-0.1,0.2-0.2,0.3
                    c0,0,0,0,0,0.1c0,0.1,0.1,0.1,0.1,0.2c0,0,0,0.1,0,0.1c-0.2,0.3-0.6,0.3-0.7,0.5l0,0c-0.2,1.1,1.3,1.1,2.2,1c1-0.1,2.1-0.7,3.1-0.7
                    c1-0.1,1.6,0.4,2.5,0.6c0.1-0.2,0.2-0.4,0.1-0.6c0-0.2-0.1-0.3-0.1-0.4C32,24.8,28.7,25.2,27.6,25.5z"/>
                  <path d="M46.7,18c-1-2.1-1.6-4.3-2.4-6.6c-3.1,2.5-6.2,5.1-9.2,7.7l-0.8-0.8c2.5-3,5.2-6.1,7.7-9.2c-2.3-0.8-4.5-1.3-6.6-2.3
                    c-2-0.9-3.6-2.4-6.2-2.7h-1.1c-2.5,0.2-4.7,1.5-6.7,2.5c-2.1,1-4.3,1.6-6.6,2.5c2.6,3.1,5.1,6.2,7.8,9.2l-0.9,0.8
                    c-3-2.6-6.1-5.2-9.2-7.7C11.7,13.8,11,16,10.1,18c-0.9,2-2.3,3.7-2.7,6.3v1.1c0.3,2.7,1.5,4.6,2.5,6.7c1,2.1,1.8,4.3,2.6,6.6
                    c3.1-2.6,6.2-5.1,9.2-7.8l0.9,0.6c-2.7,3-5.2,6.1-7.8,9.2c2.3,0.9,4.5,1.6,6.6,2.6c2.1,1,4,2.3,6.7,2.5h1.2c2.5-0.3,4.2-1.7,6.2-2.7
                    c2.1-1,4.3-1.5,6.6-2.3c-2.6-3.1-5.2-6.2-7.8-9.2l0.8-0.9c3,2.7,6.1,5.3,9.2,7.8c0.9-2.3,1.6-4.5,2.6-6.6c1-2,2.3-4,2.5-6.7v-1
                    C49,21.8,47.7,20,46.7,18z M18.8,10.2c1.7-0.4,3.1-1.1,4.5-1.8c1.5-0.8,2.9-1.6,4.8-1.8c0.2,0,0.5,0,0.7,0C30.5,6.6,32,7.8,33,8.3
                    c1.6,0.8,3,1.5,4.7,2c-1.3,1.6-2.6,3.2-4,4.7c0,0-0.1,0-0.1,0c0,0,0,0,0,0c-1.4-0.6-3.3-1.2-5.3-1.2c-2,0-3.8,0.7-5.1,1.3
                    c0,0,0,0,0,0c0,0,0,0-0.1,0C21.7,13.5,20.2,11.8,18.8,10.2z M14.8,33.7c-0.4,0.3-0.8,0.8-1.2,1c0,0,0-0.1,0-0.1
                    c-0.1,0-0.1,0.1-0.2,0.1c-0.4-1.7-1.1-3.1-1.8-4.5c-0.8-1.6-2-3.2-1.8-5.6c0.1-1.7,1.2-3.1,1.9-4.4c0.8-1.5,1.6-2.9,2-4.4
                    c1.6,1.3,3.2,2.6,4.7,4c-0.7,1.5-1.4,3.6-1.3,5.8c0.1,1.8,0.8,3.5,1.4,4.8C17.3,31.5,16,32.5,14.8,33.7z M37.7,39.8
                    C37.7,39.8,37.7,39.8,37.7,39.8C37.7,39.8,37.7,39.8,37.7,39.8c-1.6,0.6-3,1.3-4.5,2.1c-1.5,0.8-2.9,2-5.1,1.9
                    c-1.8-0.1-3.2-1-4.7-1.8c-1.5-0.7-2.9-1.4-4.5-1.9c0,0,0-0.1,0-0.1c0,0,0,0,0,0c0-0.2,0.2-0.4,0.4-0.6c1.2-1.4,2.6-2.9,3.8-4.4h0.1
                    c1.4,0.6,3.2,1.3,5.2,1.3s3.9-0.6,5.3-1.2C35.1,36.5,36.5,38.2,37.7,39.8z M28.4,32.7c-4.2,0-7.6-3.4-7.6-7.6c0-4.2,3.4-7.6,7.6-7.6
                    c4.2,0,7.6,3.4,7.6,7.6C36,29.2,32.6,32.7,28.4,32.7z M45.3,30c-0.8,1.5-1.5,2.9-2,4.7c0,0-0.1,0-0.1-0.1c0,0,0,0,0,0.1
                    c-1.7-1.4-3.3-2.9-4.9-4.3c0.5-1.3,1.2-2.9,1.3-4.6c0.2-2.3-0.5-4.4-1.2-6c1.5-1.4,3.1-2.7,4.6-4c0,0,0,0,0,0.1c0,0,0.1,0,0.1-0.1
                    c0.8,2.5,2.1,4.5,3.2,6.7C46.7,23.2,47,24,47,25C47,27,46,28.5,45.3,30z M14.5,28.2h-0.6c-0.1,0.2-0.1,0.4-0.1,0.6
                    c0.2,0.1,0.6,0,0.9,0c0.1-0.3,0.1-0.6,0.2-0.9h-0.3C14.5,28,14.5,28,14.5,28.2z M14.2,26.7C14.2,26.7,14.2,26.7,14.2,26.7
                    c0.2,0,0.4,0,0.6,0c0,0.4-0.3,0.3-0.7,0.3c-0.1,0.2-0.1,0.4-0.1,0.6c0.3,0.1,0.6,0,1,0c0.1-0.3,0.1-0.6,0.2-1
                    C15,26.7,14.5,26.6,14.2,26.7z M14,27.9c0.2,0,0.4,0,0.6,0L14,27.9C14,27.9,14,27.9,14,27.9z M16,27C16,27,15.9,27,16,27
                    c0-0.2,0.2-0.6,0.2-0.9c0.1-0.3,0.1-0.6,0.2-0.9c0.3-1.4,0.6-2.7,0.9-4c0.1-0.6,0.3-1.2,0.4-1.8h-1c0,0.1-0.1,0.1-0.1,0.2
                    c0,0.1-0.1,0.3-0.1,0.4c-0.2,0-0.4,0.1-0.5,0c-0.1,0-0.1,0-0.2,0c0-0.2,0.1-0.4,0.1-0.6h-1c-0.3,1-0.5,2.1-0.9,3.1c0,0,0,0.1,0,0.1
                    c-0.4-1-0.6-2.1-1.2-2.9c0-0.1-0.1-0.1-0.1-0.2c0,0.2,0.1,0.4,0.1,0.6c-0.4,0-0.7,0.3-0.7,0.8c0.3,0,0.3-0.2,0.6-0.2
                    c0.4,0,0.5,0.8,0.7,1.2c0.2,0.5,0.5,0.9,0.5,1.4s-0.3,1.2-0.4,1.8c-0.4,1.8-0.9,3.9-1.2,5.5h1c0,0,0-0.1,0-0.1
                    c0.1-0.2,0.1-0.4,0.2-0.6h0.8c-0.1,0.2-0.1,0.5-0.1,0.6h1c0-0.1,0.1-0.3,0.1-0.4c0.1-0.4,0.2-0.8,0.3-1.2c0.1-0.4,0.2-0.8,0.3-1.2
                    c0.3,0.6,0.6,1.3,0.8,2c0,0,0,0.1,0,0.1c0,0.1,0,0.2,0.1,0.3c0.1,0.1,0.1,0.1,0.3,0.1c0,0,0,0,0,0c0-0.6-0.3-1.1-0.5-1.6
                    C16.3,28.2,16,27.4,16,27z M14.8,30h-0.4c0.1-0.3,0.2-0.7,0.2-1l-0.2,0c0,0.1-0.1,0.2-0.1,0.3h-0.8c-0.1,0.1-0.2,0.2-0.3,0.3
                    l-0.1,0.1c0,0,0,0,0-0.1c0,0.1-0.1,0.3-0.1,0.4h-0.4c0.7-3.5,1.6-6.8,2.3-10.3h0.4c0,0,0,0.1,0,0.1c0,0,0,0,0,0c0,0.1,0,0.1-0.1,0.2
                    c0,0,0,0,0,0c0,0.1-0.1,0.2-0.1,0.3h1.1v0c0.1,0.1,0,0.2,0,0.3c-0.3,0.1-0.7,0-1.1,0c-0.2,0.2-0.2,0.6-0.3,0.9c0.3,0.1,0.7,0,1.1,0
                    c0,0.1-0.1,0.1,0,0.3c0,0-0.1,0-0.1,0c0,0,0,0.1,0,0.1h-1c-0.1,0.2-0.2,0.5-0.2,0.8c0.3,0.1,0.7,0,1.1,0c0,0.1-0.1,0.2-0.1,0.2
                    c-0.1,0.2-0.5,0.2-1,0.2c-0.1,0.2-0.1,0.5-0.1,0.7c0.3,0.1,0.7,0,1.1,0c0,0.2-0.2,0.4-0.5,0.4c-0.1,0.2-0.5,0.1-0.8,0.1
                    c-0.1,0.2,0.1,0.3,0.1,0.6c0.3,0.1,0.7,0,1.1,0c0,0.3-0.2,0.4-0.5,0.4c-0.1,0.3-0.4,0.2-0.7,0.2c-0.1,0.2,0,0.4,0,0.6
                    c0.3,0.1,0.7,0,1,0c0.5-2.2,1-4.4,1.6-6.6h0.4C16.4,23.2,15.7,26.7,14.8,30z M44.4,28.7c0-0.1-0.2,0-0.2-0.1V28
                    c-0.1,0-0.3,0.1-0.3,0v-5.5h0.3v-0.7c0,0-0.1,0-0.1,0c-0.1,0-0.2,0.1-0.2,0c-0.1-0.8-0.3-1.4-1-1.6c0,0,0,0,0,0c-0.1,0-0.2,0-0.3,0
                    v-0.4h-0.7c0,0.1,0,0.2-0.2,0.4c-0.9,0-1.1,0.7-1.2,1.6h-0.4v0.7c0,0,0.1,0,0.2,0c0.1,0,0.1,0,0.2,0c0,0,0,0,0,0V28h-0.3v0.6
                    c-0.1,0-0.2,0-0.2,0.1c-0.1,0.5-0.2,1.2-0.2,1.7h4.8c0,0,0-0.1,0-0.1C44.6,29.8,44.5,29.1,44.4,28.7z M43.1,26.3V28h-0.4V28h-0.1
                    v-1.2c-0.2,0-0.4,0.1-0.6,0v1.4h-0.4c0,0,0-0.1,0-0.1h-0.1c-0.1-0.6,0.1-1.1,0-1.6c0-0.4-0.4-0.6-0.4-1.2c-0.1-0.5,0.1-0.8,0.4-1.2
                    v-1.6H42v1.2c0.1,0,0.3,0,0.4,0c0.1,0,0.1,0,0.2,0v-1.2h0.1v-0.1h0.4c0,0.2,0,0.3,0,0.5c0,0.3,0,0.5-0.1,0.8c0,0.1,0,0.2,0,0.4
                    c0,0.1,0.1,0.2,0.1,0.3c0.1,0.1,0.2,0.2,0.2,0.3C43.6,25.2,43.5,26,43.1,26.3z M42.1,24.2c-0.4,0.1-0.6,0.6-0.5,1
                    c0,0.4,0.3,0.8,0.7,0.8c0.4,0,0.6-0.5,0.6-0.9C43,24.6,42.7,24.1,42.1,24.2z M23.7,12.8l-0.3-0.9v-0.1l0.4-0.1h0.4l-0.4-1l-0.3,0.2
                    L23.1,11l-0.2-0.4l0.1-0.1l0.8-0.3l0.6-0.1l-0.7-0.8l-2.2,0.9l0.3,0.3l0.9,2.6l0.1,0.4L24,13L23.7,12.8z M25.7,12.2v0.4l1.3-0.2
                    L26.8,12l-0.4-2.7l0.1-0.4L25.1,9l0.2,0.4L25.7,12.2z M29,11.8l0.1-0.7h0.4l0.1,0.1l0.3,1.2h1.3l-0.3-0.5l-0.3-1l0.5-0.4l0.1-1
                    l-0.7-0.7l-2.4-0.2L28.2,9L28,11.7L27.8,12l1.3,0.1L29,11.8z M29.2,9.7h0.6L30,9.8l0.1,0.2V10L30,10.2l-0.2,0.1h-0.5l-0.1-0.1V9.7z
                    M34.7,12.7h-0.6l-0.9-0.4v-0.1l0.2-0.4v-0.1l0.4,0.2l0.3,0.2l0.4-1H34L33.7,11v-0.1l0.1-0.3v-0.1l1,0.4l0.4,0.3v-1l-2.3-0.8v0.4
                    L32,12.3l-0.3,0.3l2.3,0.8L34.7,12.7z M22.4,36.2v0.4l-1.1,2.5L21,39.5l2.2,1l1-0.2l0.8-2l-0.4-1L22.4,36.2z M23.8,38.2l-0.5,1.1
                    l-0.2,0.2h-0.3l-0.3-0.1v-0.1l0.7-1.7h0.1l0.3,0.1l0.2,0.2V38.2z M27.8,38.7l0.5,0.2l-0.3-1l-2.3-0.3l0.1,0.5l-0.3,2.7l-0.2,0.4
                    l2.4,0.2l0.5-0.9l-0.6,0.1l-0.9-0.1l-0.1-0.1v-0.5h0.5l0.4,0.2l0.1-1.1L27.2,39L26.8,39h-0.1l0.1-0.4L27.8,38.7z M30.9,37.5
                    l-2.4,0.4l0.2,0.4l0.5,2.7l-0.1,0.4l1.4-0.2l-0.2-0.4L30.2,40V40l1.1-0.2l0.6-0.8l-0.2-1L30.9,37.5z M30.9,39L30.7,39l-0.5,0.1h-0.1
                    L30,38.5v-0.1l0.5-0.1l0.2,0.1l0.1,0.2l0.2,0.1L30.9,39z M32.1,38.2l0.5-0.4l0.4-0.2v0.1l1,1.9v0.6l1.4-0.7l-0.5-0.4L34,37.2v-0.1
                    l0.4-0.2l0.6-0.1l-0.7-0.7L32,37.2L32.1,38.2z"/>
                  <path fill="#41489E" d="M111.8,4.2C100.3,4.2,91,13.5,91,25s9.4,20.8,20.8,20.8s20.8-9.4,20.8-20.8S123.3,4.2,111.8,4.2z M128.6,23
                    l0.6,0.1c0,0.1-0.1,0.4-0.1,0.6s0.1,0.4,0.2,0.4c0.1,0,0.2-0.2,0.3-0.5c0.2-0.5,0.4-0.8,0.8-0.8c0.5,0,1,0.3,1,1.2
                    c0,0.4-0.1,0.7-0.1,0.9l-0.5-0.2c0.1-0.2,0.2-0.5,0.1-0.8c0-0.3-0.1-0.4-0.3-0.4c-0.1,0-0.2,0.1-0.3,0.5c-0.1,0.5-0.4,0.8-0.8,0.9
                    c-0.5,0-0.9-0.4-1-1.1C128.5,23.4,128.5,23.2,128.6,23z M126.4,11.7l0.5,0.7l-0.4,0.6c-0.1,0.2-0.2,0.3-0.3,0.5
                    c0.2-0.1,0.3-0.1,0.5-0.2l0.7-0.2l0.5,0.7l-1.9,0.3l-0.9,0.7l-0.4-0.6l0.9-0.7L126.4,11.7z M122.3,10c0.6-0.8,1.5-0.7,2.2-0.2
                    c0.3,0.2,0.4,0.4,0.5,0.6l-0.5,0.4c-0.1-0.1-0.2-0.3-0.3-0.4c-0.3-0.3-0.8-0.3-1.2,0.1c-0.3,0.4-0.3,0.9,0.1,1.2
                    c0.1,0.1,0.3,0.2,0.5,0.3l-0.4,0.5c-0.1,0-0.4-0.1-0.6-0.4C121.8,11.4,121.8,10.6,122.3,10z M119.1,6.6l0.8,0.4v2.1
                    c0.1-0.4,0.3-0.7,0.5-1.1l0.3-0.6l0.6,0.3l-1.2,2.6l-0.7-0.4V7.7c-0.2,0.4-0.3,0.7-0.5,1.2l-0.3,0.6l-0.7-0.3L119.1,6.6z M115.2,5.5
                    l1.8,0.4l-0.1,0.6l-1.1-0.2l-0.1,0.4l1,0.3l-0.1,0.6l-1-0.2l-0.1,0.5l1.1,0.2l-0.2,0.6l-1.8-0.4L115.2,5.5z M112.1,5.2
                    c0.4,0,0.7,0.1,0.8,0.2L112.7,6c-0.2-0.1-0.3-0.1-0.7-0.1c-0.5,0-0.9,0.2-0.9,0.8c0,0.5,0.3,0.9,0.8,0.9c0.1,0,0.2,0,0.2,0V7.1h-0.4
                    V6.5h1.1L113,8c-0.2,0.1-0.6,0.2-1,0.1c-0.6,0-0.9-0.2-1.2-0.4c-0.3-0.3-0.4-0.6-0.4-1C110.4,5.7,111.2,5.2,112.1,5.2z M107.1,5.7
                    c0.4-0.1,0.7-0.1,1,0c0.2,0.1,0.4,0.3,0.4,0.5c0.1,0.3-0.1,0.7-0.3,0.8c0.2,0,0.3,0.2,0.5,0.4c0.2,0.3,0.3,0.6,0.4,0.7l-0.8,0.2
                    c-0.1-0.1-0.2-0.3-0.3-0.6c-0.2-0.3-0.3-0.4-0.5-0.3h-0.1l0.2,1l-0.7,0.2L106.2,6C106.4,5.9,106.7,5.8,107.1,5.7z M104.1,6.7
                    l0.3,0.6l-1,0.4l0.2,0.5l0.9-0.5l0.3,0.6l-0.9,0.4l0.2,0.5l1-0.5l0.3,0.6l-1.7,0.8l-1.3-2.6L104.1,6.7z M98.9,10l0.6,0.5
                    c0.3,0.2,0.6,0.4,0.8,0.7c-0.2-0.3-0.3-0.7-0.5-1l-0.3-0.7l0.8-0.6l1.9,2.1l-0.6,0.5l-0.6-0.9c-0.2-0.2-0.5-0.5-0.7-0.9
                    c0.2,0.3,0.4,0.8,0.5,1.1l0.4,1l-0.5,0.4l-0.8-0.6c-0.3-0.2-0.6-0.5-0.9-0.7c0.2,0.3,0.5,0.7,0.7,0.9l0.6,0.8L99.8,13l-1.7-2.3
                    L98.9,10z M96.5,12.4l0.5,0.4l-0.7,0.8l0.4,0.3l0.6-0.8l0.5,0.4l-0.6,0.8l0.4,0.3l0.7-0.9l0.5,0.3l-1.2,1.6l-2.2-1.7L96.5,12.4z
                    M92,25.7h2.1c-0.4-0.1-0.8-0.2-1.1-0.3l-1-0.3v-0.6l1-0.2c0.3-0.1,0.8-0.2,1.2-0.2c-0.4,0-0.8,0-1.2-0.1l-1-0.1v-0.7l2.9,0.2v1.1
                    l-0.8,0.2c-0.3,0.1-0.7,0.2-1.1,0.2c0.4,0.1,0.8,0.2,1.1,0.3l0.8,0.2v1L92,26.5V25.7z M92.8,30.8l-0.5-1.9l2.8-0.7l0.5,1.9L95,30.2
                    l-0.3-1.1l-0.5,0.1l0.3,1.1l-0.6,0.1l-0.3-1l-0.5,0.1l0.3,1.2L92.8,30.8z M94.9,34.8c-0.4-0.2-0.7-0.5-1-1c-0.2-0.3-0.3-0.6-0.3-0.7
                    l2.5-1.4c0.2,0.2,0.3,0.5,0.5,0.8c0.3,0.5,0.3,0.9,0.3,1.2c0,0.4-0.3,0.7-0.7,1C95.7,35,95.2,35,94.9,34.8z M96.7,37.9l-0.5-0.6
                    l2.3-1.9L99,36L96.7,37.9z M101.1,38.8c-0.3-0.3-0.8-0.3-1.2,0.1c-0.3,0.4-0.3,0.9,0.1,1.2c0.1,0.1,0.3,0.2,0.5,0.3l-0.4,0.5
                    c-0.1,0-0.4-0.2-0.6-0.4c-0.8-0.7-0.8-1.5-0.3-2.1c0.7-0.8,1.6-0.7,2.3-0.2c0.3,0.2,0.4,0.4,0.5,0.6l-0.5,0.4
                    C101.4,39.1,101.3,38.9,101.1,38.8z M104.4,43.3l-0.8-0.4l0.1-0.7l-0.6-0.2l-0.4,0.5l-0.7-0.4l2-2.3l0.9,0.5L104.4,43.3z
                    M108.5,44.5l-1.9-0.4l0.6-2.9l0.8,0.2l-0.5,2.2l1.1,0.3L108.5,44.5z M95.8,25c0-8.9,7.2-16.1,16.1-16.1s16.1,7.2,16.1,16.1
                    s-7.2,16.1-16.1,16.1S95.8,33.9,95.8,25z M114.2,44.7c-0.4,0-0.7,0-0.9-0.1l-0.1-0.6c0.2,0.1,0.5,0.1,0.8,0.1s0.4-0.1,0.4-0.3
                    c0-0.1-0.2-0.2-0.5-0.3c-0.5-0.1-0.9-0.3-0.9-0.8c-0.1-0.5,0.3-1,1.1-1.1c0.4,0,0.6,0,0.8,0.1l-0.1,0.6c-0.1,0-0.4-0.1-0.7-0.1
                    c-0.2,0-0.4,0.1-0.3,0.3c0,0.1,0.2,0.2,0.6,0.3c0.5,0.1,0.8,0.4,0.9,0.8C115.4,44.1,115,44.6,114.2,44.7z M117.5,43.9l-1-2.7
                    l1.8-0.7l0.2,0.6l-1.1,0.4l0.2,0.5l1-0.4l0.2,0.6l-1,0.4l0.2,0.5l1.1-0.4l0.2,0.6L117.5,43.9z M122.9,41.4c-0.1-0.1-0.3-0.2-0.5-0.5
                    c-0.3-0.3-0.4-0.3-0.6-0.1l-0.1,0.1l0.6,0.9l-0.7,0.4l-1.7-2.4c0.2-0.1,0.4-0.4,0.8-0.6s0.7-0.4,1-0.3c0.2,0,0.4,0.1,0.6,0.4
                    c0.2,0.3,0.1,0.7,0,0.9c0.2,0,0.4,0.1,0.6,0.2c0.2,0.2,0.5,0.5,0.7,0.6L122.9,41.4z M125.6,39.1l-2.8-1.4l0.6-0.6l1,0.6
                    c0.3,0.2,0.6,0.3,0.9,0.5c-0.2-0.3-0.4-0.6-0.6-0.9l-0.6-1l0.6-0.6l1.4,2.7L125.6,39.1z M128.2,36l-2.5-1.6l0.5-0.7l2.4,1.6
                    L128.2,36z M130.3,31.9c-0.4,1-1.2,1.2-1.9,0.9c-1-0.4-1.2-1.3-0.8-2.1c0.1-0.3,0.3-0.5,0.4-0.6l0.5,0.4c-0.1,0.1-0.2,0.2-0.3,0.5
                    c-0.2,0.4-0.1,0.9,0.5,1.1c0.5,0.2,0.9,0,1.1-0.5c0.1-0.2,0.1-0.4,0.1-0.5l0.6,0.1C130.5,31.3,130.5,31.6,130.3,31.9z M128.3,28.5
                    l0.3-1.9l0.6,0.1l-0.2,1.1l0.5,0.1l0.2-1.1l0.6,0.1l-0.2,1.1h0.6l0.1-1.1l0.7,0.1l-0.3,1.9L128.3,28.5z M103.4,41.6l0.5,0.2l0.1-0.5
                    c0-0.2,0.1-0.4,0.1-0.6c-0.1,0.1-0.3,0.3-0.4,0.5L103.4,41.6z M96.2,32.9c-0.1-0.1-0.1-0.2-0.1-0.2l-1.6,0.8c0,0,0,0.1,0.1,0.2
                    c0.2,0.5,0.7,0.7,1.2,0.3C96.3,33.7,96.4,33.3,96.2,32.9z M107.4,7c0.3-0.1,0.4-0.2,0.4-0.4c0-0.2-0.2-0.3-0.5-0.2
                    c-0.1,0-0.2,0.1-0.2,0.1l0.1,0.5H107.4z M117.8,25.4l6.5-3.9l-3-5.1l-6.7,3.9v-7.6h-5.8v7.6l-6.5-3.9l-3,5.1l6.5,3.9l-6.5,3.8l3,5.1
                    l6.5-3.9v7.8h5.9v-7.8l6.6,3.9l3-5.1L117.8,25.4z M111.7,14.8c0.3,0,0.6,0.2,0.6,0.7l0,1.6c-0.2-0.2-0.5-0.4-0.9-0.5
                    c-0.1,0-0.2,0-0.3,0l0-1.1C111.1,15,111.4,14.8,111.7,14.8z M111.2,22.6l-0.1-3.8c0,0,0.1,0,0.1,0c0.4-0.1,0.8-0.2,1-0.5l-0.1,5.7
                    c-0.2,0.3-0.5,0.6-0.9,0.9l0-2L111.2,22.6z M109.6,18.2c0.1-0.5,0.6-0.8,1.1-1c0.1,0,0.2,0,0.2,0c0.1,0,0.2,0,0.2,0c0,0,0,0,0,0
                    c0.1,0,0.1,0,0.2,0c0.2,0,0.7,0.1,0.7,0.6c0,0.3-0.3,0.4-0.9,0.6c0,0,0,0,0,0c-0.1,0-0.2,0-0.2,0.1c-0.1,0-0.2,0.1-0.2,0.1
                    c-0.3,0.1-0.6,0.3-0.7,0.6c-0.1,0.3-0.1,0.7,0.2,1.1l0.4,0.6V22C109.4,20.8,109.2,19.2,109.6,18.2z M111.9,35c0,0.2-0.1,0.4-0.1,0.5
                    l-0.1,0.5h0.2c-0.1,0.2-0.3,0.1-0.3-0.4l-0.1-2.9c0.1-0.4,0.2-0.6,0.6-0.8L111.9,35z M112.6,34.9c0,0.2-0.1,0.3-0.2,0.4
                    c0,0,0,0.1-0.1,0.1c0-0.1,0.1-0.2,0.1-0.3c0.1-0.3,0.1-0.6,0.2-0.9C112.7,34.4,112.6,34.8,112.6,34.9z M112.5,30.9
                    c-0.1,0.1-0.2,0.2-0.2,0.3c-0.1,0.1-0.2,0.1-0.2,0.2c0,0,0,0,0,0c-0.2,0.1-0.4,0.2-0.5,0.4c-0.1,0.1-0.2,0.2-0.2,0.3
                    c-0.1,0.2-0.2,0.4-0.2,0.7c0,0.1,0,0.3,0,0.4c-0.2-0.4-0.3-0.8-0.2-1.1c0-0.2,0.1-0.4,0.2-0.6c0.1-0.1,0.1-0.2,0.2-0.3
                    c0.1-0.1,0.1-0.2,0.2-0.2c0.2-0.1,0.3-0.3,0.5-0.4c0,0,0.1-0.1,0.1-0.1c0.1-0.1,0.2-0.2,0.2-0.3c0.1-0.2,0.2-0.3,0.2-0.5
                    c0.1-0.4,0.2-0.8,0.2-1.2c0.3,0.4,0.4,0.8,0.3,1.2C113,30.1,112.7,30.6,112.5,30.9z M111.3,27.6c0.2-0.4,0.4-0.6,0.8-0.8l-0.1,2.7
                    c-0.1,0.2-0.2,0.5-0.4,0.7c-0.1,0.1-0.2,0.1-0.3,0.2L111.3,27.6z M113,25.5c-0.1,0.1-0.3,0.2-0.4,0.3c-0.1,0.1-0.2,0.1-0.2,0.2
                    c-0.1,0-0.1,0.1-0.2,0.1c0,0,0,0,0,0c-0.3,0.2-0.6,0.4-0.8,0.6c-0.1,0.1-0.2,0.2-0.2,0.3c-0.1,0.1-0.2,0.3-0.2,0.4
                    c0,0.1-0.1,0.2-0.1,0.4c-0.4-0.4-0.5-1-0.5-1.3c0-0.3,0.2-0.6,0.5-0.8c0.1-0.1,0.1-0.1,0.2-0.2c0.1-0.1,0.1-0.1,0.2-0.2c0,0,0,0,0,0
                    c0.3-0.2,0.6-0.4,0.8-0.7c0.1-0.1,0.2-0.2,0.2-0.3c0.1-0.1,0.2-0.2,0.2-0.4c0.1-0.2,0.2-0.5,0.2-0.7v-1.3c0.5,0.5,0.8,1.1,0.8,1.8
                    C113.6,24.5,113.4,25.1,113,25.5z M121.1,39.6c-0.1,0.1-0.2,0.1-0.2,0.2l0.3,0.6l0.2-0.1c0.3-0.2,0.3-0.4,0.2-0.6
                    C121.5,39.5,121.3,39.5,121.1,39.6z M119.6,25.4l6-3.5l-3.9-6.7l-6.2,3.5v-6.9h-7.7v6.9l-5.9-3.5L98,21.8l6,3.5l-6,3.5l3.9,6.7
                    l5.9-3.5v7.1h7.8V32l6.1,3.5l3.9-6.7L119.6,25.4z M121.5,34.9l-6.4-3.7v7.4h-6.9v-7.4l-6.2,3.7L98.6,29l6.3-3.6l-6.3-3.7l3.4-5.9
                    l6.2,3.7v-7.2h6.8v7.2l6.5-3.7l3.4,5.9l-6.3,3.7L125,29L121.5,34.9z"/>
                  </svg>

									</span>
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
					
					<?php } ?>
						
						


					<?php 
					//
					//
					// Accessory Facts
					//
					if( $layout == 'slide_accfacts') { ?>
					  

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
					
					<?php } ?>
						

					<?php
					//
					//
					// Have you thought about?
					//
					if( $layout == 'slide_final') { 
						
						$finalSlide_title = get_sub_field('final_slide_header');
					?>
					  

					<section id="final" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-final.jpg">
						
						<?php if ($finalSlide_title) { ?>
							<h2 class="finalh2"><?php echo $finalSlide_title; ?></h2>
						<?php } else { ?>
						<h2 class="finalh2">Have you thought about?</h2>
						<?php } ?>
						
						<?php
							if( have_rows('final_slide_list') ) { ?>
							
							<ul class="haveyouthoughabout-items">
							
									<?php while ( have_rows('final_slide_list') ) : the_row();
										$finalslidelist_item = get_sub_field('final_slide_list_item');
									?>
									<li><?php echo $finalslidelist_item; ?></li>
								
									<?php endwhile; ?>
							
							</ul>
							
						<?php } else { ?>
						
							<ul class="haveyouthoughabout-items">
								<li>Window Tint</li>
								<li>Leather Interior</li>
								<li>Paint Protection Film</li>
								<li>Remote Start & Security</li>
								<li>Appearance Protection</li>
								<li>Mobile Entertainment</li>
								<li>Vehicle Safety</li>
								<li>Sunroofs</li>
								<li>& More!</li>
							</ul>
						
						<?php } ?>
						
						<?php $finalLink = get_sub_field('final_url');
							if( $finalLink ): ?>
							
							<div class="final_button">
								<a id="final_btn_link" href="<?php echo $finalLink; ?>">
									<div id="behindButton"></div>
									<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/final_button.png">
								</a>
							</div>
							
						<?php endif; ?>
						
						<?php $audioFinal = get_sub_field('final_audio');
						if( $audioFinal ): ?>
							<audio class="hiddenAudio">
								<source src="<?php echo $audioFinal['url']; ?>" type="audio/mpeg">
							</audio>
						<?php endif; ?>
					</section>
					
					<?php } ?>				


				

				<?php endwhile; ?>
				
				</div>
			</div>
			
		<?php endif; ?>
	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Presentation Not Ready.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>


<?php get_footer(); ?>
