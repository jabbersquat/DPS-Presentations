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
									<div class="col-xs-4">Lifetime</div>
								</div>
								
								<!-- Row 2 -->
								<div class="table-reg">
									<div class="col-xs-4">Resists Salt & Water</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">Lifetime</div>
								</div>
								
								<!-- Row 3 -->
								<div class="table-reg">
									<div class="col-xs-4">Bonds To Metal Surfaces</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">Lifetime</div>
								</div>
								
								<!-- Row 4 -->
								<div class="table-reg">
									<div class="col-xs-4">Electronic Fogging Method</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">Lifetime</div>
								</div>
								
								<!-- Row 5 -->
								<div class="table-reg">
									<div class="col-xs-4">Meets Military Specifications</div>
									<div class="col-xs-4">Not Covered</div>
									<div class="col-xs-4">Lifetime</div>
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
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											 width="140px" height="50px" viewBox="0 0 140 50" style="enable-background:new 0 0 140 50;" xml:space="preserve">
										<style type="text/css">
											.responder0{fill:#2D3F99;stroke:#2D3F99;stroke-width:0.298;}
											.responder1{fill:#FFFFFF;stroke:#2D3F99;stroke-width:0.2338;}
											.responder2{fill:#FFFFFF;}
											.responder3{fill:none;stroke:#41489E;stroke-width:1.4029;}
											.responder4{fill:#2D3F99;stroke:#FFFFFF;stroke-width:0.4677;}
											.responder5{fill:#FFFFFF;stroke:#41489E;stroke-width:0.4677;}
											.responder6{fill:#58595B;}
											.responder7{fill:#EC2227;}
											.responder8{fill:#ED1C24;}
										</style>
										<g>
											<circle id="Oval" class="responder0" cx="114" cy="24.2" r="20.7"/>
											<circle id="Oval_1_" class="responder1" cx="114" cy="24.2" r="16.2"/>
											<path class="responder2" d="M95.1,24.9c0.3,0,0.7,0,1.2,0l0,0c-0.4-0.1-0.8-0.2-1.1-0.3l-1-0.3v-0.6l1-0.2c0.3-0.1,0.8-0.2,1.2-0.2l0,0
												c-0.4,0-0.8,0-1.2-0.1l-1-0.1v-0.7l2.9,0.2v1.1l-0.8,0.2c-0.3,0.1-0.7,0.2-1.1,0.2l0,0c0.4,0.1,0.8,0.2,1.1,0.3l0.8,0.2v1l-2.9,0.1
												v-0.8L95.1,24.9L95.1,24.9z"/>
											<polygon class="responder2" points="96.1,29.6 95.8,28.6 95.3,28.7 95.6,29.9 95,30 94.5,28.1 97.3,27.4 97.8,29.3 97.2,29.4 96.9,28.3 
												96.4,28.4 96.7,29.5 	"/>
											<path class="responder2" d="M98.3,30.9c0.2,0.2,0.3,0.5,0.5,0.8c0.3,0.5,0.3,0.9,0.3,1.2c0,0.4-0.3,0.7-0.7,1c-0.5,0.3-1,0.3-1.3,0.1
												c-0.4-0.2-0.7-0.5-1-1c-0.2-0.3-0.3-0.6-0.3-0.7L98.3,30.9L98.3,30.9z M96.7,32.7c0,0,0,0.1,0.1,0.2c0.2,0.5,0.7,0.7,1.2,0.3
												c0.5-0.3,0.6-0.7,0.4-1.1c-0.1-0.1-0.1-0.2-0.1-0.2L96.7,32.7L96.7,32.7z"/>
											<polygon class="responder2" points="101.2,35.2 98.9,37.1 98.4,36.5 100.7,34.6 	"/>
											<path class="responder2" d="M102.3,40.1c-0.1,0-0.4-0.2-0.6-0.4c-0.8-0.7-0.8-1.5-0.3-2.1c0.7-0.8,1.6-0.7,2.3-0.2
												c0.3,0.2,0.4,0.4,0.5,0.6l-0.5,0.4c-0.1-0.1-0.2-0.3-0.4-0.4c-0.3-0.3-0.8-0.3-1.2,0.1c-0.3,0.4-0.3,0.9,0.1,1.2
												c0.1,0.1,0.3,0.2,0.5,0.3L102.3,40.1L102.3,40.1z"/>
											<path class="responder2" d="M105.3,41.2l-0.4,0.5l-0.7-0.4l2-2.3l0.9,0.5l-0.5,3l-0.8-0.4l0.1-0.7L105.3,41.2L105.3,41.2z M106.1,41
												l0.1-0.5c0-0.2,0.1-0.4,0.1-0.6l0,0c-0.1,0.1-0.3,0.3-0.4,0.5l-0.3,0.4L106.1,41L106.1,41z"/>
											<polygon class="responder2" points="109.4,40.4 110.2,40.6 109.7,42.8 110.8,43.1 110.7,43.7 108.8,43.3 	"/>
											<path class="responder2" d="M115.4,43.2c0.2,0.1,0.5,0.1,0.8,0.1s0.4-0.1,0.4-0.3c0-0.1-0.2-0.2-0.5-0.3c-0.5-0.1-0.9-0.3-0.9-0.8
												c-0.1-0.5,0.3-1,1.1-1.1c0.4,0,0.6,0,0.8,0.1l-0.1,0.6c-0.1,0-0.4-0.1-0.7-0.1c-0.2,0-0.4,0.1-0.3,0.3c0,0.1,0.2,0.2,0.6,0.3
												c0.5,0.1,0.8,0.4,0.9,0.8c0.1,0.5-0.3,1-1.1,1.1c-0.4,0-0.7,0-0.9-0.1L115.4,43.2L115.4,43.2z"/>
											<polygon class="responder2" points="121,41.4 120,41.8 120.2,42.3 121.3,41.9 121.5,42.5 119.7,43.1 118.7,40.4 120.5,39.7 120.7,40.3 
												119.6,40.7 119.8,41.2 120.8,40.8 	"/>
											<path class="responder2" d="M122.1,39c0.2-0.1,0.4-0.4,0.8-0.6c0.4-0.2,0.7-0.4,1-0.3c0.2,0,0.4,0.1,0.6,0.4c0.2,0.3,0.1,0.7,0,0.9l0,0
												c0.2,0,0.4,0.1,0.6,0.2c0.2,0.2,0.5,0.5,0.7,0.6l-0.7,0.4c-0.1-0.1-0.3-0.2-0.5-0.5c-0.3-0.3-0.4-0.3-0.6-0.1l-0.1,0.1l0.6,0.9
												l-0.7,0.4L122.1,39L122.1,39z M123.4,39.6l0.2-0.1c0.3-0.2,0.3-0.4,0.2-0.6c-0.1-0.2-0.3-0.2-0.5-0.1c-0.1,0.1-0.2,0.1-0.2,0.2
												L123.4,39.6L123.4,39.6z"/>
											<path class="responder2" d="M127.8,38.3l-2.8-1.4l0.6-0.6l1,0.6c0.3,0.2,0.6,0.3,0.9,0.5l0,0c-0.2-0.3-0.4-0.6-0.6-0.9l-0.6-1l0.6-0.6
												l1.4,2.7L127.8,38.3L127.8,38.3z"/>
											<polygon class="responder2" points="128.4,32.9 130.8,34.5 130.4,35.2 127.9,33.6 	"/>
											<path class="responder2" d="M132.7,30.4c0,0.1,0,0.4-0.2,0.7c-0.4,1-1.2,1.2-1.9,0.9c-1-0.4-1.2-1.3-0.8-2.1c0.1-0.3,0.3-0.5,0.4-0.6
												l0.5,0.4c-0.1,0.1-0.2,0.2-0.3,0.5c-0.2,0.4-0.1,0.9,0.5,1.1c0.5,0.2,0.9,0,1.1-0.5c0.1-0.2,0.1-0.4,0.1-0.5L132.7,30.4L132.7,30.4
												z"/>
											<polygon class="responder2" points="132.5,26.1 132.3,27.2 132.9,27.2 133,26.1 133.7,26.2 133.4,28.1 130.5,27.7 130.8,25.8 131.4,25.9 
												131.2,27 131.7,27.1 131.9,26 	"/>
											<path class="responder2" d="M133,23.9c0.1-0.2,0.2-0.5,0.1-0.8c0-0.3-0.1-0.4-0.3-0.4c-0.1,0-0.2,0.1-0.3,0.5c-0.1,0.5-0.4,0.8-0.8,0.9
												c-0.5,0-0.9-0.4-1-1.1c0-0.4,0-0.6,0.1-0.8l0.6,0.1c0,0.1-0.1,0.4-0.1,0.6s0.1,0.4,0.2,0.4c0.1,0,0.2-0.2,0.3-0.5
												c0.2-0.5,0.4-0.8,0.8-0.8c0.5,0,1,0.3,1,1.2c0,0.4-0.1,0.7-0.1,0.9L133,23.9L133,23.9z"/>
											<polygon class="responder2" points="100,12.7 99.4,13.5 99.8,13.8 100.5,12.9 101,13.2 99.8,14.8 97.6,13.1 98.7,11.6 99.2,12 98.5,12.8 
												98.9,13.1 99.5,12.3 	"/>
											<path class="responder2" d="M103.2,9.8c-0.2-0.2-0.5-0.5-0.7-0.9l0,0c0.2,0.3,0.4,0.8,0.5,1.1l0.4,1l-0.5,0.4l-0.8-0.6
												c-0.3-0.2-0.6-0.5-0.9-0.7l0,0c0.2,0.3,0.5,0.7,0.7,0.9l0.6,0.8l-0.5,0.4l-1.7-2.3l0.8-0.7l0.6,0.5c0.3,0.2,0.6,0.4,0.8,0.7l0,0
												c-0.2-0.3-0.3-0.7-0.5-1l-0.3-0.7l0.8-0.6l1.9,2.1l-0.6,0.5L103.2,9.8L103.2,9.8z"/>
											<polygon class="responder2" points="107,7.5 106.1,7.9 106.3,8.4 107.3,7.9 107.6,8.5 105.9,9.3 104.6,6.7 106.3,5.9 106.6,6.5 105.6,6.9 
												105.8,7.4 106.7,6.9 	"/>
											<path class="responder2" d="M108.4,5.2c0.2-0.1,0.5-0.2,0.9-0.3s0.7-0.1,1,0c0.2,0.1,0.4,0.3,0.4,0.5c0.1,0.3-0.1,0.7-0.3,0.8l0,0
												c0.2,0,0.3,0.2,0.5,0.4c0.2,0.3,0.3,0.6,0.4,0.7l-0.8,0.2c-0.1-0.1-0.2-0.3-0.3-0.6c-0.2-0.3-0.3-0.4-0.5-0.3h-0.1l0.2,1l-0.7,0.2
												L108.4,5.2L108.4,5.2z M109.4,6.2h0.2c0.3-0.1,0.4-0.2,0.4-0.4s-0.2-0.3-0.5-0.2c-0.1,0-0.2,0.1-0.2,0.1L109.4,6.2L109.4,6.2z"/>
											<path class="responder2" d="M115.2,7.2c-0.2,0.1-0.6,0.2-1,0.1c-0.6,0-0.9-0.2-1.2-0.4c-0.3-0.3-0.4-0.6-0.4-1c0-1,0.8-1.5,1.7-1.5
												c0.4,0,0.7,0.1,0.8,0.2l-0.2,0.6c-0.2-0.1-0.3-0.1-0.7-0.1c-0.5,0-0.9,0.2-0.9,0.8c0,0.5,0.3,0.9,0.8,0.9c0.1,0,0.2,0,0.2,0V6.3
												h-0.4V5.7h1.1L115.2,7.2L115.2,7.2z"/>
											<polygon class="responder2" points="118.8,6.8 117.8,6.6 117.7,7.1 118.8,7.3 118.6,7.9 116.8,7.5 117.4,4.7 119.2,5.1 119.1,5.7 118,5.5 
												117.9,5.9 118.9,6.2 	"/>
											<path class="responder2" d="M120.1,8.4l1.2-2.6l0.8,0.4v1c0,0.3,0,0.7,0,1.1l0,0c0.1-0.4,0.3-0.7,0.5-1.1l0.3-0.6l0.6,0.3l-1.2,2.6
												l-0.7-0.4V8c0-0.3,0-0.8,0-1.1l0,0c-0.2,0.4-0.3,0.7-0.5,1.2l-0.3,0.6L120.1,8.4L120.1,8.4z"/>
											<path class="responder2" d="M125.4,11.7c-0.1,0-0.4-0.1-0.6-0.4c-0.8-0.7-0.8-1.5-0.3-2.1c0.6-0.8,1.5-0.7,2.2-0.2
												c0.3,0.2,0.4,0.4,0.5,0.6l-0.5,0.4c-0.1-0.1-0.2-0.3-0.3-0.4c-0.3-0.3-0.8-0.3-1.2,0.1c-0.3,0.4-0.3,0.9,0.1,1.2
												c0.1,0.1,0.3,0.2,0.5,0.3L125.4,11.7L125.4,11.7z"/>
											<path class="responder2" d="M126.9,13.4l0.9-0.7l0.8-1.8l0.5,0.7l-0.4,0.6c-0.1,0.2-0.2,0.3-0.3,0.5l0,0c0.2-0.1,0.3-0.1,0.5-0.2l0.7-0.2
												l0.5,0.7l-1.9,0.3l-0.9,0.7L126.9,13.4L126.9,13.4z"/>
											<polygon id="outline" class="responder3" points="110.7,30 110.7,37.6 117.1,37.6 117.1,30 123.6,33.8 126.8,28.3 120.4,24.6 126.8,20.8 
												123.6,15.3 117,19.1 117,11.7 110.7,11.7 110.7,19.1 104.3,15.3 101.1,20.8 107.5,24.6 101.1,28.3 104.3,33.8 	"/>
											<polygon id="inner" class="responder4" points="110.7,30 110.7,37.6 117.1,37.6 117.1,30 123.6,33.8 126.8,28.3 120.4,24.6 126.8,20.8 
												123.6,15.3 117,19.1 117,11.7 110.7,11.7 110.7,19.1 104.3,15.3 101.1,20.8 107.5,24.6 101.1,28.3 104.3,33.8 	"/>
											<path id="rod" class="responder5" d="M113.4,34.8c0,1,0.9,1,0.9,0l0.4-20.1c0-1.2-1.7-1.2-1.7,0l0.4,19.7L113.4,34.8L113.4,34.8z"/>
											<path id="body" class="responder5" d="M114.5,32.8c1,0.6,0.4,2.2-0.4,2.2C114.3,34.3,114.5,33.7,114.5,32.8L114.5,32.8z M114.6,27
												c1.5,1.3,0.6,3.2-0.4,3.8c-0.9,0.4-0.9,1-0.9,2.2c-1.3-1.5-0.6-2.8,0.6-3.5C114.6,28.9,114.6,28,114.6,27L114.6,27z M114.7,22.6
												c0,1.6-2.5,2-2.5,3.2c0,0.4,0.1,1.3,0.9,1.7c0-1.6,1.3-1.7,2.2-2.6c1-1,1-2.8-0.6-4.1C114.7,21.5,114.7,22.1,114.7,22.6L114.7,22.6
												z M113,21.8c-1.5-1.2-2-3.2-1.5-4.5c0.4-1.5,2.9-1.6,2.9-0.4c0,1.2-2.9,0.4-1.9,2.3l0.4,0.7v1.9H113z"/>
										</g>
										<g>
											<polyline id="Shape" class="responder2" points="59.5,14.7 61.9,16.6 63.9,15.3 66.2,14 68.1,13.4 70,13 73,12.8 76.2,13.3 78.3,13.9 
												81.2,15.5 83,16.9 85,14.4 82.1,12.3 80,11.4 77.4,10.4 75.7,9.9 72.8,9.7 69.9,9.8 66.6,10.6 63.4,12 61,13.4 59.5,14.6 	"/>
											<polyline id="Shape_1_" class="responder2" points="74.6,27.3 72.8,27 72.2,27 70.1,27.2 69.6,26.7 68.4,26.4 66.5,26.9 67.2,28.9 
												68.2,28.8 68.7,29.4 69,29.2 69.6,30.3 71.7,29.8 73.3,29.9 75.1,30.3 75.5,29.4 76.2,29.3 76.4,28.8 77.7,28.8 78.2,26.9 
												76.3,26.3 75.7,26.8 75.1,26.6 74.6,27.3 	"/>
											<polyline id="Shape_2_" class="responder2" points="65.1,26.9 67.4,29.3 69.1,29.8 69.9,30.5 70.9,30.2 74.5,30.1 75.1,30.4 76.5,29.2 
												78.5,28.1 80.1,26.5 83.5,30.3 80.1,33.4 78,34.4 74.1,35.5 70.1,35.4 68.3,35 66.9,34.6 62,31.3 61.3,30.5 65.1,26.9 	"/>
											<rect id="Rectangle-path" x="72.2" y="24.2" class="responder6" width="0.3" height="2.8"/>
											<path id="Shape_3_" class="responder6" d="M90.2,18.5c-0.1-1.1-0.2-2.3-0.4-3.3c-0.1-0.5-0.2-1-0.4-1.5c-0.2-0.5-0.3-0.9-0.5-1.4
												s-0.3-0.9-0.4-1.2c-0.1-0.2-0.2-0.5-0.2-0.7c-0.3-0.9-0.6-1.7-0.9-2.5c-0.4-0.8-0.8-1.5-1.3-2.2c-1-1.4-2-2.6-3.3-3.7
												c-0.6-0.5-1.3-1.1-2.1-1.4c-0.4-0.2-0.9-0.3-1.4-0.4s-1-0.1-1.5-0.1s-1,0.1-1.6,0.2c-0.2,0-0.5,0.1-0.7,0.2S75,0.6,74.9,0.7
												s-0.1,0.1-0.3,0.2c-0.2,0-0.4-0.1-0.5-0.1c-0.2,0-0.3-0.1-0.5-0.1c-0.9-0.1-1.9,0-2.7,0.3c-0.2,0.1-0.3,0.1-0.5,0.2
												c-1-0.7-2.4-1.3-4-1c-0.7,0.1-1.4,0.3-2,0.6s-1.2,0.6-1.7,0.9c-0.5,0.4-1,0.8-1.4,1.2S60.4,3.8,60,4.3c-0.4,0.5-0.8,1-1.1,1.5
												c-0.7,1-1.3,2.2-1.9,3.4c-0.5,1.2-1.1,2.4-1.5,3.7c-0.1,0.3-0.2,0.7-0.3,1s-0.2,0.7-0.3,1s-0.2,0.7-0.2,1.1
												c-0.1,0.4-0.2,0.7-0.2,1.1c-0.1,0.8-0.1,1.5-0.2,2.3c0,0.4,0,0.9,0,1.2c0,0.3,0,0.7,0.1,1.1c0.1,1.2,0.3,2.3,0.6,3.3
												c0.2,1.1,0.5,2.1,0.8,3.1c0.2,0.7,0.4,1.4,0.6,2c0.1,0.3,0.3,0.6,0.4,0.9c0.7,1.5,1.4,3,2.2,4.4c0.3,0.6,0.7,1.1,1,1.6
												s0.7,1.1,1,1.6s0.7,1,1.1,1.5c0.4,0.5,0.8,1,1.2,1.4c0.6,0.7,1.2,1.4,1.9,2.1c0.2,0.2,0.4,0.4,0.7,0.6c1.4,1.2,3.1,2.2,4.8,3
												c0.4,0.2,0.9,0.4,1.4,0.6c0.2,0.1,0.3,0.1,0.5,0.1l0,0c0.6-0.2,1.2-0.4,1.8-0.7c0.6-0.3,1.1-0.6,1.6-0.9c1-0.6,2-1.3,2.9-2.2
												c0.9-0.8,1.7-1.6,2.5-2.5c0.6-0.6,1.3-1.6,2-2.6c0.3-0.5,0.7-1,1-1.5s0.6-1.1,0.9-1.6s0.6-1.1,0.9-1.6s0.6-1.1,0.9-1.7
												c0.1-0.3,0.3-0.6,0.4-0.8c0.1-0.3,0.3-0.6,0.4-0.8c0.5-1.2,0.9-2.5,1.2-3.8c0.1-0.3,0.2-0.7,0.3-1c0.1-0.3,0.2-0.6,0.2-1v-0.1v0.1
												l0,0c0.3-1.6,0.6-3.1,0.7-4.8C90.3,19.8,90.3,19.2,90.2,18.5L90.2,18.5z M87.2,7.8L87.2,7.8L87.2,7.8L87.2,7.8L87.2,7.8z M84.8,35
												L84.8,35C84.8,34.9,84.8,34.9,84.8,35L84.8,35L84.8,35z M89.5,19.4v-0.1c0,0.6-0.2,1-0.4,1.4c0,0,0.1,0,0.1,0.1s0,0.2,0,0.3
												c0,0.3-0.1,0.6-0.1,0.9c0,0.4-0.1,0.8-0.2,1.2c0.1,0,0.1-0.1,0.3-0.1c-0.1,0.6-0.4,1.2-0.5,1.8c-0.1,0.4-0.2,0.9-0.3,1.4
												c0,0.1-0.1,0.3-0.1,0.4s0.1,0.1,0.1,0.2s0,0.3-0.1,0.5c0,0.2-0.1,0.4-0.1,0.5c-0.1,0.4-0.2,0.7-0.3,1.1c-0.2,0.8-0.6,1.2-1,1.7
												c0.1,0,0.2,0,0.3,0c-0.1,0.2-0.3,0.4-0.4,0.6s-0.2,0.5-0.2,0.7c-0.1,0.5-0.4,0.9-0.8,1.2c-0.2,0.1-0.4,0.2-0.6,0.3
												c-0.4,0.2-0.7,0.6-0.6,1.3c0,0.1,0,0.3,0.1,0.4c0,0.1,0.1,0.2,0.1,0.4s-0.2,0.5-0.4,0.7c-0.2,0.2-0.4,0.4-0.6,0.5
												c-0.1,0-0.2,0-0.2,0c-0.1,0.9-0.4,1.5-0.9,2.1c-0.3,0.4-0.6,0.9-0.9,1.4c-0.1,0.2-0.1,0.3-0.3,0.5c-0.1,0-0.2-0.2-0.3-0.2
												c-0.1,0-0.2,0.2-0.2,0.3c-0.1,0.2-0.2,0.4-0.3,0.7c0,0.1,0,0.3-0.1,0.3c-0.2,0-0.3-0.2-0.5-0.2c-0.1,0-0.2,0.3-0.3,0.4
												c-0.2,0.3-0.4,0.5-0.6,0.8c-0.1,0.1-0.2,0.3-0.3,0.4c-0.1-0.1-0.1-0.3-0.1-0.5c-0.1,0-0.1,0.1-0.2,0.2c-0.3,0.5-0.7,1-1.1,1.4
												c-0.1,0-0.1-0.1-0.1-0.1c-0.2,0.2-0.3,0.4-0.4,0.6c-0.4,0.6-0.9,1.1-1.6,1.5c-0.4,0.3-1,0.4-1.5,0.5c-0.3,0.1-0.5,0.2-0.8,0.2
												c-0.3,0.1-0.5,0.2-0.8,0.3c-0.1,0-0.3-0.1-0.4-0.1c-0.4-0.1-0.8-0.3-1.1-0.4c-0.5-0.2-1.1-0.3-1.5-0.5c-1-0.4-1.5-1.3-2-2.1
												c-0.1,0-0.1,0.1-0.1,0.1c-0.4-0.3-0.7-0.7-1.1-1.1c0-0.1-0.1-0.1-0.2-0.2c0-0.1-0.1-0.2-0.2-0.2s0,0.2-0.1,0.2s-0.3-0.3-0.4-0.3
												c-0.2-0.3-0.4-0.5-0.6-0.8c-0.1-0.1-0.2-0.3-0.3-0.4c-0.1,0.1-0.2,0.2-0.2,0.3c-0.3-0.2-0.4-0.7-0.6-1.1c-0.1-0.1-0.1-0.3-0.3-0.3
												c-0.1,0-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.2,0.2c-0.2-0.3-0.3-0.7-0.5-1c-0.6-0.8-1.2-1.7-1.5-2.9c-0.1-0.1-0.2-0.1-0.3-0.1
												s-0.1-0.1-0.2-0.2c-0.2-0.1-0.3-0.1-0.4-0.3c-0.1-0.3,0-0.8,0-1.2c0-0.9-0.7-1.1-1.2-1.5c-0.4-0.3-0.7-0.6-0.9-1.2
												c0-0.2-0.1-0.4-0.2-0.5c0-0.1,0-0.2-0.1-0.2c-0.1-0.2-0.2-0.4-0.3-0.6c0-0.1,0.1,0,0.2,0c-0.2-0.2-0.4-0.4-0.6-0.7
												c-0.3-0.5-0.5-1.2-0.7-1.9c-0.1-0.3-0.2-0.6-0.3-1c0.2,0,0.3,0.1,0.4,0.2c-0.2-0.6-0.5-1.3-0.7-2c-0.1-0.5-0.2-1.1-0.4-1.6
												c0-0.2-0.1-0.3-0.1-0.5c0.1,0,0.1,0.1,0.2,0c0-0.2-0.1-0.4-0.2-0.6c-0.1-0.5-0.3-1.1-0.2-1.7c0-0.1,0.1-0.2,0.1-0.3
												c0-0.1-0.1-0.2-0.1-0.3c-0.2-0.7-0.3-1.5-0.3-2.3c0-0.1,0.1-0.2,0.2-0.2c0-0.4,0-0.9,0.2-1.2c0.1-0.2,0.2-0.3,0.3-0.4
												s0.2-0.3,0.3-0.4c0.1-0.2,0-0.4,0-0.6c0-0.2,0-0.4,0.1-0.5c0.1-0.3,0.3-0.6,0.4-0.9c0.3-0.6,0.4-1.4,0.6-2.1
												c0.4-1.2,0.7-2.4,1.3-3.4c0.1-0.1,0.2-0.3,0.2-0.4C58.1,8.3,58,8.2,58,8s0.3-0.4,0.4-0.6c0.5-0.6,0.8-1.2,1.3-1.8
												c0.1-0.1,0.2-0.2,0.3-0.3c0.1-0.1,0.2-0.2,0.3-0.4c0-0.1,0-0.2,0.1-0.2c0.1-0.2,0.3-0.3,0.5-0.5C61,4.1,61.1,4.1,61.2,4
												s0.2-0.1,0.3-0.2c0.1-0.1,0.2-0.3,0.2-0.4c0.2-0.2,0.5-0.4,0.8-0.6c0.1-0.1,0.2-0.2,0.3-0.3s0.2-0.2,0.4-0.3c0.6-0.3,1.3-0.5,2-0.7
												c1.4-0.3,2.9,0,3.7,0.7c0.1,0.1,0.4,0.4,0.7,0.4c0.1,0,0.3-0.1,0.4-0.2c0.1-0.1,0.3-0.1,0.4-0.2C70.7,2.1,71,2,71.3,1.9
												c0.7-0.1,1.4,0,2,0.1c0.4,0.1,0.6,0.1,0.9,0.1C74.5,2,74.7,1.9,75,1.7c0.3-0.1,0.5-0.3,0.8-0.3C77.6,0.8,79,1,80,1.4
												c0.4,0.1,0.7,0.2,1.1,0.4c0.3,0.1,0.8,0.3,1,0.6c0,0.1,0.1,0.2,0.1,0.3c0.1,0.1,0.2,0.2,0.3,0.2c0.3,0.2,0.5,0.5,0.7,0.8
												c0.6,0.7,1.2,1.4,1.8,2.2c0.1,0.2,0.3,0.4,0.4,0.5c0.2,0.2,0.5,0.5,0.4,0.9c0.6,1.2,1.2,2.3,1.7,3.7c0.4,1.1,0.8,2.4,1.1,3.6
												c0,0.2,0.1,0.4,0.1,0.6c0,0.1-0.1,0.1-0.2,0.2c-0.1,0.2,0.1,0.7,0.1,0.8c0.1,0.1,0.2,0.2,0.3,0.4c0.3,0.4,0.3,0.9,0.4,1.4
												c0.1,0,0.1,0,0.2,0C89.5,18.4,89.5,18.8,89.5,19.4L89.5,19.4z M89.1,18.5c0-0.4,0.1-0.8,0-1.2C89,17,89,16.8,88.8,16.5
												c-0.2,0-0.3-0.1-0.4-0.4c-0.1-0.3-0.2-0.7-0.2-0.9h-0.1c0.1,0,0-0.2,0-0.3c0,0,0.1,0,0.2,0c0.1-0.2,0-0.5-0.1-0.7
												c-0.2-0.5-0.3-1.1-0.5-1.5c-0.2-0.7-0.4-1.4-0.7-2c-0.2-0.6-0.5-1.3-0.8-1.9c-0.2-0.4-0.5-0.9-0.7-1.3c-0.1-0.2-0.3-0.4-0.2-0.6
												c-0.2-0.4-0.6-0.8-0.9-1.1c-0.3-0.4-0.6-0.7-0.9-1.1c-0.6-0.7-1.2-1.5-1.9-2.1c-0.1-0.2-0.2-0.3-0.4-0.4c-0.9-0.5-2.1-0.8-3.2-0.9
												c-0.2,0-0.4,0-0.5,0c-0.5,0-1,0.1-1.4,0.3s-0.9,0.6-1.4,0.7c-0.3,0.1-0.6,0-0.8-0.1C73.8,2,73.6,2,73.4,1.9
												c-0.7-0.2-1.6-0.1-2.2,0.1c-0.3,0.1-0.6,0.2-0.8,0.4c0.1,0.1,0.1,0.2,0.3,0.2l0.1-0.1c0.1,0,0.2,0,0.3,0c0.1,0,0.1-0.1,0.2-0.1
												c0,0,0.1,0,0.2,0s0.1-0.1,0.2-0.1s0.1,0.1,0.2,0.1c0-0.1,0.1-0.1,0.1-0.2c0.1,0,0.2,0.1,0.2,0.1c0.1,0,0.1,0,0.1-0.1l0.1,0.1
												c0.1-0.1,0.1-0.1,0.2-0.2c0.2,0.2,0.5,0.1,0.7,0c0,0.1,0.2,0.2,0.4,0.1l0.1,0.1c0.1,0,0.2,0,0.3,0.1c0,0.2-0.1,0.3-0.2,0.4
												c-0.1,0.1-0.2,0.1-0.2,0.2c0.3,0,0.5-0.2,0.8-0.3c0.1,0,0,0.2,0,0.3c0,0,0,0.1-0.1,0.1c-0.2,0.2-0.4,0.5-0.5,0.7
												c0.2-0.1,0.4-0.2,0.5-0.4c0.1-0.1,0.3-0.2,0.3,0.1c0,0.4-0.2,0.5-0.4,0.6c0.3,0,0.5,0.2,0.3,0.4c-0.1,0.2-0.3,0.2-0.5,0.3
												c0.2,0,0.3,0.1,0.3,0.4c-0.1,0.2-0.4,0-0.6,0.1c0.1,0.1,0.3,0.2,0.3,0.4c0,0.2-0.4,0.1-0.5,0.1C73.8,5.9,73.9,6,74,6.1
												c0,0.1,0,0.1,0,0.2c-0.1,0.2-0.3,0.1-0.6,0.1c0,0.1,0.1,0.1,0.1,0.2s0,0.2-0.1,0.3c-0.1,0-0.2,0-0.3,0.1c0,0.2,0,0.3,0,0.4
												c-0.1,0.1-0.3,0-0.4-0.1c0,0.2,0,0.6-0.2,0.6c-0.3,0-0.3-0.3-0.5-0.3c-0.1,0.2-0.2,0.6-0.3,0.6c-0.1,0-0.2,0-0.3-0.1
												c-0.1,0.1-0.1,0.2-0.2,0.3c0,0,0,0-0.1-0.1c0.1-0.5,0.3-1.4-0.4-1.4c-0.1-0.1-0.1-0.1-0.2-0.2c-0.2-0.1-0.5,0-0.6,0.2
												c0,0.1,0,0.1-0.1,0.2c0,0-0.1,0-0.2,0c0-0.2,0-0.4-0.1-0.5c0-0.1,0-0.2-0.1-0.2C69.3,7,69.2,7.8,69,8.6c0,0.1,0,0.2-0.1,0.3
												C68.8,9,68.6,9,68.5,9c0.1-0.7,0.3-1.4,0.4-2.1c0.1-0.4,0.2-0.7,0.1-1c0,0,0,0.2,0,0.3c-0.3,1-0.4,2-0.8,2.9
												c-0.3,0-0.5,0.1-0.7,0.1c0.2-0.7,0.5-1.3,0.7-2s0.4-1.4,0.8-1.9c0.3,0.2,0.5,0.5,0.8,0.7s0.6,0.4,0.9,0.6c0.1,0.1,0.3,0.2,0.4,0.3
												c0.1,0.1,0.2,0.3,0.4,0.3c0-0.2,0-0.4,0.1-0.4c0.2,0,0.2,0.2,0.3,0.2c0-0.1-0.2-0.6,0-0.6c0.1,0,0.2,0.1,0.3,0.2
												c0.1,0.1,0.1,0.2,0.2,0.2c-0.1-0.1-0.1-0.2-0.2-0.4c-0.1-0.1-0.2-0.3,0-0.4c0.1,0,0.2,0.1,0.3,0.1c0.1,0.1,0.1,0.1,0.2,0.1
												c0-0.2-0.3-0.3-0.3-0.6c0.2,0,0.3,0.1,0.5,0.1c-0.1-0.2-0.4-0.2-0.4-0.5c0.2-0.1,0.4,0.1,0.6,0.1C73,5.2,72.8,5.1,72.7,5
												c0.1-0.1,0.4,0,0.5-0.1c-0.1-0.1-0.4-0.1-0.5-0.3c0.1,0,0.3,0,0.5-0.1c-0.1-0.1-0.3,0-0.3-0.1c0.2-0.1,0.5-0.1,0.7-0.2
												c-0.3-0.1-0.8-0.1-1-0.3c0.1-0.1,0.2-0.1,0.2-0.2c-0.2,0-0.3-0.2-0.2-0.3C71.8,3.5,71,3.3,70.4,3c-0.1-0.1-0.2-0.3-0.3-0.4
												c-0.1,0-0.2,0-0.3,0c-0.1,0-0.2,0-0.3-0.1c-0.6-0.8-1.5-1.4-3-1.4c-0.4,0-0.9,0.1-1.2,0.2c-0.3,0.1-0.6,0.3-1,0.4
												C64.2,1.9,64,2,63.9,2.1c-0.3,0.2-0.5,0.4-0.8,0.6C63,2.8,62.8,2.9,62.7,3c-0.1,0.1-0.1,0.2-0.1,0.3c-0.1,0.2-0.4,0.4-0.6,0.5
												c-0.1,0.1-0.6,0.3-0.6,0.5c0,0.1,0.1,0.2,0,0.3c0,0-0.1,0.1-0.2,0.2c-0.4,0.4-0.8,0.8-1.1,1.3c-0.3,0.4-0.5,0.8-0.8,1.2
												C59.2,7.4,59,7.6,59,7.7s0,0.2,0.1,0.3c-0.3,0.5-0.6,1.1-0.9,1.7c-0.3,0.6-0.5,1.2-0.7,1.9c-0.2,0.6-0.4,1.3-0.6,1.9
												c-0.2,0.6-0.5,1.3-0.7,1.9c0.3,0.3-0.1,0.9-0.2,1.2h-0.1c-0.1,0.1-0.2,0.3-0.3,0.4c-0.1,0.2-0.1,0.4-0.2,0.7c0,0.2,0,0.4,0.1,0.6
												c0,0.1,0.1,0.5,0,0.5c-0.1,0.1-0.2-0.2-0.3-0.2c0,0.8,0.1,1.5,0.4,2.2c0.2,0.4,0.4,0.7,0.5,1.2c-0.1-0.1-0.2-0.2-0.2-0.2
												c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1,0.3,0,0.6,0,0.9c0,0.2,0.1,0.5,0.2,0.7c0.1,0.4,0.3,0.8,0.4,1.2c-0.1-0.1-0.2-0.2-0.4-0.3
												c0.2,0.8,0.4,1.6,0.7,2.4c0.3,0.7,0.7,1.4,1,2c-0.3-0.1-0.5-0.3-0.8-0.4c0,0.1,0.1,0.3,0.1,0.4c0.2,0.5,0.2,1,0.4,1.4
												c0.3,0.7,0.9,1.1,1.4,1.6c0.1,0.1,0.2,0.1,0.2,0.2c-0.2,0-0.4-0.2-0.6-0.2c-0.1,0.1,0,0.2,0,0.3c0.1,0.3,0.1,0.5,0.2,0.7
												c0.1,0.2,0.2,0.4,0.3,0.6c0.2,0.2,0.5,0.4,0.7,0.5c0.3,0.2,0.6,0.3,0.7,0.5c0.3,0.4,0.1,1,0.1,1.6c0,0.1,0,0.3,0.1,0.4
												c0,0.1,0.3,0.4,0.4,0.4c0.1,0.1,0.3,0,0.3-0.1c0.1-0.1,0.1-0.3,0.1-0.5c0-0.3-0.2-0.6-0.1-0.9c0.1,0.1,0.3,0.2,0.3,0.4s0,0.3,0,0.5
												c-0.1,1.2,0.3,2,0.8,2.7c0.3,0.5,0.7,0.9,0.9,1.5c0,0.1,0.1,0.2,0.1,0.2c0.1,0,0.2-0.3,0.3-0.3s0.2,0.2,0.3,0.3
												c0.2,0.2,0.3,0.5,0.4,0.8c0,0.1,0.1,0.3,0.2,0.4c0.1-0.1,0.1-0.4,0.3-0.5c0.3,0.6,0.5,1.3,1.1,1.6c0-0.1,0-0.2,0.1-0.3
												c0.5,0.6,0.8,1.3,1.4,1.7c0,0,0-0.1,0-0.2c0.5,0.3,0.6,0.8,0.9,1.2s0.7,0.7,1.1,1s1,0.4,1.5,0.6c0.5,0.1,1,0.3,1.4,0.4
												c0.1,0,0.1,0.1,0.2,0.1s0.2-0.1,0.4-0.1c0.3-0.1,0.7-0.2,1.1-0.3c1-0.3,1.8-0.6,2.5-1.2c0.3-0.2,0.5-0.5,0.6-0.8
												c0.1-0.1,0.1-0.2,0.1-0.4c0-0.1,0.2-0.2,0.2-0.3c0.1-0.1,0.2-0.2,0.2-0.3c0.1,0,0.1,0.1,0.2,0.2c0.4-0.4,0.7-0.9,1-1.3
												c0.1-0.1,0.2-0.4,0.4-0.4c0,0.1,0,0.2,0.1,0.3c0.1-0.1,0.3-0.2,0.3-0.3c0.2-0.2,0.4-0.5,0.5-0.8c0-0.1,0.1-0.4,0.3-0.4
												c0.1,0,0.1,0.3,0.2,0.3s0.1-0.3,0.2-0.4c0.2-0.4,0.4-0.8,0.6-1.1c0.1,0,0.2,0.4,0.3,0.4c0.1,0,0.2-0.4,0.2-0.5
												c0.4-0.8,1-1.4,1.3-2.3c0.1-0.4,0.2-0.7,0.2-1.1c0-0.4-0.1-0.6-0.1-1c0-0.2,0.1-0.4,0.3-0.5c0,0.3-0.1,0.6-0.1,0.9
												c0,0.2,0.1,0.4,0.2,0.5c0.3,0,0.5-0.2,0.6-0.5c0.1-0.1,0.1-0.3,0.1-0.4c0-0.1-0.1-0.2-0.1-0.3c-0.2-0.6,0-1.3,0.4-1.6
												c0.2-0.2,0.4-0.3,0.7-0.4c0.2-0.1,0.5-0.2,0.6-0.4c0.2-0.2,0.2-0.5,0.4-0.8c0.1-0.3,0.2-0.6,0.3-0.9c-0.2-0.1-0.4,0.1-0.6,0.1
												c0.6-0.6,1.3-1.1,1.5-2c0.1-0.2,0.1-0.4,0.1-0.6c0.1-0.4,0.2-0.7,0.3-1.1c-0.3,0.1-0.4,0.4-0.8,0.5c-0.1-0.2,0.1-0.3,0.2-0.4
												c0.2-0.1,0.4-0.2,0.6-0.4c0-0.1,0-0.3,0-0.4c0,0-0.1,0-0.2,0c0.1-0.2,0.2-0.4,0.2-0.7c0.1-0.1,0.2-0.3,0.2-0.5c0-0.1,0-0.2,0.1-0.3
												c0.1-0.7,0.4-1.3,0.5-1.8c-0.2,0-0.2,0.2-0.4,0.2c0-0.1,0-0.2,0.1-0.3c0.1-0.4,0.3-0.8,0.3-1.1c0.1-0.3,0.1-0.8,0.1-1.2
												c-0.1,0-0.2,0.1-0.2,0.2c-0.1,0.1-0.2,0.2-0.3,0.2c0.2-0.4,0.5-0.8,0.6-1.3c0.2-0.5,0.3-1.3,0.2-1.9C89.2,18.5,89.2,18.6,89.1,18.5
												L89.1,18.5z M85.5,7.8c0.4,0.9,0.8,1.8,1.2,2.7c0.3,0.6,0.5,1.2,0.7,1.9c0.2,0.5,0.3,1,0.5,1.5c0,0,0.2,0.4,0,0.5
												c-0.1,0-0.3-0.2-0.4-0.2c-0.7-0.7-1.2-1.7-1.5-2.8c-0.4-1.2-0.9-2.4-1.4-3.5c-0.1-0.2-0.2-0.5-0.3-0.7c0-0.1-0.1-0.2-0.1-0.2
												c0.1,0,0.3,0,0.4,0.1c0.1,0,0.3,0,0.4,0.1C85.3,7.1,85.4,7.6,85.5,7.8L85.5,7.8z M75.6,3c0.1,0,0.3-0.1,0.4-0.1
												c0.1,0.5,0.2,1.1,0.3,1.6c0.1,0.5,0.3,1,0.6,1.4c-0.3,0.1-0.4-0.2-0.5-0.4c-0.3-0.6-0.6-1.3-0.8-2l0,0C75.7,3.4,75.6,3.1,75.6,3
												L75.6,3z M75.7,2.7c0-0.1,0.2-0.1,0.3,0C75.9,2.7,75.7,2.8,75.7,2.7L75.7,2.7z M80.3,3.3c0.4,0.8,0.8,1.7,1.3,2.4
												C81.8,6,82,6.3,82.2,6.6c-0.1,0-0.3,0-0.4,0c-0.3-0.1-0.5-0.5-0.7-0.8c-0.4-0.6-0.6-1.3-1-2c0-0.1-0.1-0.3-0.1-0.5
												c-0.1-0.2-0.2-0.4-0.1-0.5C80.2,2.7,80.2,3.1,80.3,3.3L80.3,3.3z M80.3,2.7c0.1-0.1,0.2,0,0.3,0c0.3,0.7,0.7,1.4,1.1,2
												C82,5.4,82.5,6,82.8,6.6c-0.2,0.1-0.3-0.1-0.4-0.2s-0.2-0.2-0.3-0.3c0,0,0,0-0.1,0c0-0.1-0.2-0.2-0.3-0.4c-0.5-0.6-0.8-1.3-1.2-2.1
												C80.5,3.4,80.3,3.1,80.3,2.7L80.3,2.7z M80.8,5.4C80.9,5.7,81,6,81.2,6.2c0.1,0.1,0.1,0.1,0.2,0.2c-0.3,0.1-0.5-0.2-0.7-0.4
												c-0.3-0.4-0.5-0.9-0.7-1.3c-0.3-0.7-0.5-1.3-0.7-1.9c0.3-0.2,0.4,0.2,0.5,0.4C80.1,4,80.4,4.7,80.8,5.4L80.8,5.4z M79.3,3.3
												c0.3,1,0.7,1.8,1.2,2.7c0.1,0.1,0.2,0.3,0.2,0.4c-0.2,0-0.3-0.1-0.4-0.2C80,6,79.9,5.7,79.7,5.5c-0.3-0.6-0.5-1.2-0.7-1.8
												c-0.1-0.3-0.2-0.6-0.3-1l0,0C79.2,2.6,79.2,3,79.3,3.3L79.3,3.3z M79.8,5.8C79.9,5.9,80,6.1,80,6.2c-0.2,0.1-0.3,0-0.4-0.2
												c-0.3-0.3-0.5-0.8-0.7-1.3c-0.3-0.6-0.4-1.4-0.5-2c0.1,0,0.2,0,0.3,0c0.1,0.1,0.1,0.3,0.2,0.4C79.1,4.1,79.4,5,79.8,5.8L79.8,5.8z
												 M78.3,3.7c0.2,0.7,0.5,1.4,0.8,2.1c0.1,0.1,0.2,0.3,0.1,0.4c-0.4,0-0.6-0.4-0.7-0.7C78.2,5,78,4.4,77.8,3.8c0-0.1-0.1-0.3-0.1-0.5
												s-0.1-0.4-0.1-0.5c0.1,0,0.3,0,0.4,0C78.2,3.1,78.2,3.4,78.3,3.7L78.3,3.7z M77.5,4.7c-0.2-0.4-0.3-0.9-0.5-1.4
												c0-0.2-0.1-0.4-0.1-0.5l0,0c0.2,0,0.4,0,0.6,0.1c0.2,0.9,0.4,1.7,0.7,2.5c0.1,0.3,0.2,0.5,0.3,0.8c-0.2,0.1-0.3-0.1-0.4-0.2
												C77.8,5.6,77.6,5.2,77.5,4.7L77.5,4.7z M77.6,6c-0.1,0-0.1-0.1-0.2-0.1c-0.2-0.2-0.3-0.4-0.4-0.6s-0.2-0.5-0.3-0.7
												c-0.2-0.5-0.3-1.1-0.4-1.6c0.1-0.1,0.4,0,0.5,0c0.2,0.8,0.4,1.5,0.7,2.3c0,0.1,0.1,0.2,0.2,0.3C77.7,5.7,77.9,6.1,77.6,6L77.6,6z
												 M78,2.5c0,0.1-0.3,0.1-0.4,0.1s-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.2-0.3C77.2,2,77.3,2,77.4,1.9c0.1,0.2,0.3,0.3,0.5,0.5
												C77.9,2.4,78,2.5,78,2.5L78,2.5z M77.2,2.6c-0.1,0.1-0.3,0-0.4,0s-0.3-0.2-0.2-0.3c0-0.1,0.2-0.2,0.3-0.2c0,0,0.2,0.1,0.2,0.2
												S77.2,2.5,77.2,2.6L77.2,2.6z M76.6,2.6c0,0.1-0.3,0.1-0.4,0.1S76,2.6,76,2.5c0-0.1,0.1-0.1,0.2-0.2c0.1,0,0.2,0,0.3,0.1
												C76.6,2.5,76.7,2.6,76.6,2.6L76.6,2.6z M76.6,6.2c0.2,0,0.4,0,0.5-0.1c0.1,0.1,0.1,0.2,0.1,0.4c0.1,0.4,0.1,0.8,0.3,1.3
												c0.1,0.6,0.3,1.1,0.5,1.7c-0.2,0-0.4-0.1-0.6-0.1c-0.2-0.5-0.4-1-0.5-1.5C76.7,7.3,76.6,6.8,76.6,6.2L76.6,6.2z M77.6,7.1
												c-0.1-0.3-0.1-0.6-0.1-0.8c0.1-0.1,0.1,0,0.2,0s0.3-0.2,0.5-0.1c0.1,0.1,0.1,0.4,0.1,0.5c0.1,0.5,0.2,1,0.3,1.3
												c0.2,0.6,0.3,1.2,0.5,1.7c-0.2,0-0.5-0.1-0.8-0.2C77.9,8.8,77.7,8,77.6,7.1L77.6,7.1z M78.7,8.2c-0.2-0.6-0.3-1.1-0.3-1.8
												c0.1,0,0.2-0.1,0.3-0.1h0.1C79,6.4,79,6.9,79.1,7.2c0.2,1,0.4,1.9,0.7,2.8c-0.2,0-0.4-0.1-0.6-0.2C79,9.3,78.8,8.8,78.7,8.2
												L78.7,8.2z M79.5,8.4c-0.2-0.6-0.3-1.3-0.3-1.9c0.1-0.1,0.4-0.2,0.5,0c0.1,0.1,0.1,0.4,0.1,0.5c0.1,0.5,0.1,1,0.2,1.5
												c0.1,0.7,0.3,1.3,0.5,1.9c-0.2-0.1-0.4-0.1-0.5-0.2c-0.1-0.1-0.1-0.3-0.2-0.4C79.7,9.3,79.6,8.9,79.5,8.4L79.5,8.4z M80,6.6
												c0.2-0.2,0.5-0.1,0.6,0.1c0.1,0.8,0.3,1.6,0.5,2.3s0.5,1.4,0.7,2.1c-0.3-0.1-0.5-0.2-0.8-0.4c-0.1,0-0.2-0.1-0.3-0.1
												c-0.1-0.1-0.1-0.3-0.2-0.4C80.3,9,80,7.9,80,6.6L80,6.6z M81.3,9c-0.2-0.8-0.5-1.6-0.5-2.4l0,0c0.1,0,0.2,0,0.3,0.1
												c0.2,0,0.4-0.1,0.5,0s0.1,0.4,0.2,0.6c0.1,0.6,0.2,1.3,0.4,1.8c0.2,0.9,0.4,1.6,0.5,2.4c-0.1,0-0.2-0.1-0.3-0.1
												c-0.1,0-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.3-0.3-0.5C81.7,10.2,81.5,9.6,81.3,9L81.3,9z M82,7.6c0-0.2-0.1-0.4-0.1-0.7l0,0
												c0.2,0,0.3,0,0.5,0.1c0.1,0.1,0.1,0.2,0.1,0.3c0.3,1.4,0.7,2.7,1.2,3.9c0.2,0.4,0.4,0.9,0.5,1.4c-0.3-0.1-0.6-0.4-0.9-0.6
												c-0.1-0.1-0.2-0.1-0.3-0.2c0-0.1-0.1-0.2-0.1-0.3C82.6,10.1,82.3,8.9,82,7.6L82,7.6z M83,8.5c-0.2-0.5-0.3-1-0.4-1.6
												c0.2,0,0.4,0,0.6,0c0.4,1.2,0.7,2.5,1.2,3.6c0.4,1.2,0.9,2.3,1.5,3.3c-0.4-0.3-0.8-0.7-1.2-0.9C84,11.5,83.5,10,83,8.5L83,8.5z
												 M85.7,13c-0.7-1.1-1.2-2.5-1.6-3.9c-0.2-0.7-0.4-1.4-0.6-2.1c0.2,0,0.3-0.1,0.4-0.1l0,0c0.7,1.1,1.1,2.5,1.6,3.8
												c0.2,0.6,0.5,1.3,0.8,2c0.1,0.3,0.3,0.6,0.4,0.9c0.1,0.1,0.2,0.2,0.3,0.4c0,0.1,0.3,0.3,0.1,0.4c-0.1,0.1-0.4-0.2-0.4-0.2
												C86.3,13.9,86,13.4,85.7,13L85.7,13z M81.7,2.8c0.6,0.5,1.1,1.1,1.5,1.7c0.4,0.5,0.8,1,1.2,1.6c0.1,0.2,0.3,0.3,0.3,0.6
												c-0.1,0-0.2,0-0.3,0c-0.4-0.1-0.8-0.5-1.1-0.8c-0.6-0.6-1.1-1.4-1.6-2.1c-0.2-0.3-0.4-0.6-0.5-0.8c-0.1-0.1-0.2-0.2-0.1-0.3
												C81.5,2.5,81.6,2.7,81.7,2.8L81.7,2.8z M81,2.7c0.7,0.9,1.3,2,2,3c0.2,0.3,0.5,0.6,0.7,0.9c-0.2,0.2-0.5-0.1-0.7-0.2
												c-0.7-0.7-1.3-1.5-1.8-2.5c-0.1-0.2-0.2-0.4-0.3-0.6c-0.1-0.2-0.2-0.4-0.2-0.6C80.8,2.7,80.9,2.7,81,2.7L81,2.7z M80.2,2
												c0.2,0,0.3,0.1,0.5,0.1c0.1,0.1,0.2,0.1,0.2,0.3C80.7,2.6,80.2,2.2,80.2,2L80.2,2L80.2,2z M79.7,1.9c0.2,0,0.3,0.1,0.4,0.3
												c0.1,0.1,0.2,0.2,0.2,0.2c-0.2,0.2-0.4,0-0.5-0.2C79.7,2.1,79.6,2,79.7,1.9L79.7,1.9z M79,1.8c0.3-0.1,0.4,0.2,0.5,0.4
												c0.1,0.1,0.2,0.2,0.3,0.3c-0.2,0.2-0.4-0.1-0.6-0.2C79.1,2.1,79,2,79,1.8L79,1.8z M78.7,1.8c0.1,0.1,0.2,0.3,0.3,0.4
												c0.1,0.1,0.2,0.2,0.2,0.3c-0.1,0.2-0.4,0-0.5-0.1c-0.2-0.1-0.3-0.3-0.3-0.5C78.5,1.8,78.6,1.7,78.7,1.8L78.7,1.8z M78.3,2.1
												c0.1,0.1,0.2,0.2,0.2,0.3c0,0.2-0.4,0-0.4,0c-0.1,0-0.4-0.3-0.4-0.4c0-0.1,0.1-0.1,0.2-0.2c0.1,0,0.1,0,0.2,0.1
												C78.2,2,78.3,2,78.3,2.1L78.3,2.1z M74.7,5.4C74.9,5,75,4.5,75,4s-0.1-1-0.2-1.4c0.4-0.3,0.8-0.5,1.2-0.7c0.6-0.3,1.3-0.5,2.1-0.4
												c-0.1,0.2-0.3,0.2-0.5,0.2c-0.1,0-0.1,0-0.2,0s-0.1,0.1-0.2,0.1s-0.3,0-0.4,0.1c-0.1,0-0.2,0.1-0.3,0.2c-0.1,0-0.2,0.1-0.4,0.1
												c-0.1,0-0.2,0.1-0.3,0.2c0,0-0.1,0-0.2,0.1c-0.2,0.1-0.3,0.3-0.5,0.3c0,0.1,0.1,0.1,0.2,0.2c0.1,0.2,0.1,0.5,0.2,0.8
												c0.1,0.5,0.3,1,0.4,1.5C76,5.5,76.1,5.8,76.2,6c-0.4-0.1-0.6-0.4-0.8-0.7C75.2,5,75.1,4.7,75,4.5c0,0.5,0.2,0.8,0.4,1.1
												c0.4,0.1,0.6,0.4,1,0.5c0.1,1.1,0.5,2.1,0.7,3.2c-0.2,0-0.4,0-0.5-0.2c-0.1-0.1-0.1-0.2-0.1-0.3c-0.1-0.3-0.3-0.7-0.4-1
												c-0.2-0.5-0.3-0.9-0.4-1.3c0,1,0.4,1.8,0.6,2.5c-0.2,0-0.3,0-0.5,0c-0.2-0.5-0.4-1-0.6-1.6S75,6.2,74.9,5.7c-0.1,0.4,0,0.8,0.1,1.2
												c-0.1,0-0.2,0-0.3,0c-0.1,0-0.1-0.2-0.2-0.2c-0.1-0.1-0.2-0.1-0.3-0.2C74.4,6.2,74.6,5.8,74.7,5.4L74.7,5.4z M75,7.7
												c0,0.3-0.1,0.7-0.4,0.6c0-0.3-0.1-1.1,0.2-1.1C74.9,7.1,75,7.5,75,7.7L75,7.7z M73.8,7.4c0-0.3,0-0.6,0.3-0.7
												c0.1,0,0.3,0.1,0.3,0.2s0,0.3,0,0.4c0,0.4-0.1,0.7-0.1,1.1c-0.1,0.1-0.2,0.1-0.3,0c-0.1-0.1-0.1-0.4-0.1-0.6
												C73.8,7.7,73.8,7.5,73.8,7.4L73.8,7.4z M73.3,7.6c0-0.2,0-0.5,0.2-0.5c0.1,0,0.2,0.1,0.2,0.2c0.1,0.3,0,0.7-0.1,0.9
												C73.3,8.2,73.3,7.9,73.3,7.6L73.3,7.6z M70.5,7.7c0-0.2,0-0.6,0.2-0.6s0.2,0.5,0.2,0.8c0,0.2-0.2,0.5-0.4,0.3
												C70.4,8.1,70.5,7.9,70.5,7.7L70.5,7.7z M69.9,7.6c0-0.2,0-0.3,0.1-0.4C70,7.1,70,7,70.2,7c0.3,0,0.2,0.3,0.2,0.5
												c0,0.3,0,1.1-0.3,1.2c-0.2,0.1-0.3-0.1-0.3-0.2C69.7,8.1,69.8,7.8,69.9,7.6L69.9,7.6z M69.4,7.4c0.1-0.1,0.2-0.1,0.3,0
												c0,0.4-0.1,0.6-0.1,0.9c-0.1,0.1-0.3,0-0.3-0.2C69.3,8,69.3,7.5,69.4,7.4L69.4,7.4z M69.7,9.1C70,9.1,70.4,9,70.8,9
												c1.1-0.1,2.5-0.1,3.6,0c0.8,0.1,1.5,0.2,2.2,0.4c1.5,0.3,2.7,0.8,3.9,1.3c1.8,0.8,3.4,1.8,4.8,3.1c0.2,0.2,0.5,0.4,0.7,0.6
												c0.2,0.2,0.4,0.4,0.6,0.7c-1,0.1-1.7,0.5-2.2,1c-0.6,0.5-0.9,1.3-1.1,2.2c-0.4-0.3-0.7-0.6-1-0.9c-1.1-0.9-2.3-1.7-3.6-2.3
												c-1.8-0.8-3.9-1.4-6.4-1.4c-1.9,0-3.6,0.4-5,0.9c-1,0.3-1.9,0.8-2.7,1.3c-0.4,0.3-0.8,0.5-1.2,0.8c-0.8,0.6-1.4,1.2-2.1,1.8
												c-0.3-1.9-1.4-3-3.3-3.3c0.1-0.1,0.2-0.2,0.3-0.3c0.7-0.8,1.5-1.4,2.4-2.1c1-0.7,2-1.4,3.2-1.9c0.6-0.3,1.2-0.5,1.8-0.7
												C66.8,9.6,68.2,9.3,69.7,9.1L69.7,9.1z M85.3,21.4c-1.2,0.5-2.5,1-3.8,1.4c0-0.4,0.1-0.8,0.1-1.2c1.2-0.6,2.4-1.2,3.7-1.7
												c0.1,0,0,0.1,0,0.2C85.4,20.5,85.4,21,85.3,21.4L85.3,21.4z M81.1,30.4c0.1,0.1,0.2,0.2,0.3,0.3c0.5-0.3,0.8-0.7,1.2-1.2
												c0.2,0.1,0.3,0.3,0.5,0.5c0,0.1,0.1,0.2,0.1,0.2c0,0.1-0.1,0.2-0.2,0.3c-0.5,0.5-1,1-1.5,1.5l0,0c-0.1,0.1-0.2,0.1-0.3,0.2
												c-0.3-0.3-0.5-0.6-0.8-0.9c-0.3-0.4-0.6-0.7-0.9-1s-0.6-0.7-0.9-1L78,28.7c0.7-0.6,1.3-1.2,1.9-2c0.2,0.1,0.4,0.3,0.5,0.5
												c0,0,0.1,0.1,0.2,0.2c0,0.1-0.2,0.3-0.2,0.4c-0.3,0.3-0.6,0.6-0.9,0.9c0.2,0.2,0.4,0.5,0.6,0.7c0.3-0.2,0.4-0.4,0.7-0.6
												c0,0,0,0,0-0.1c0,0,0,0,0.1-0.1c0.2,0.1,0.3,0.3,0.5,0.5c0,0,0.1,0.1,0.2,0.2c0,0.1-0.1,0.2-0.2,0.2c-0.1,0.2-0.2,0.2-0.4,0.4
												c-0.1,0.1-0.2,0.1-0.2,0.2C80.8,30.1,81,30.3,81.1,30.4L81.1,30.4z M83.1,32.5c-0.1,0.3-0.2,0.6-0.3,0.8c-0.3,0-0.3-0.4-0.3-0.8
												c0-0.3,0-0.5,0-0.6l0,0l0,0c0.2,0,0.2,0.1,0.4,0.2c0.1,0,0.2,0.1,0.2,0.2C83.2,32.2,83.1,32.4,83.1,32.5L83.1,32.5z M82.1,35
												c0,0.1-0.2,0.2-0.3,0.3c-0.3,0.2-0.6,0.5-0.8,0.7c-0.2-0.2-0.4-0.5-0.7-0.7c-0.2-0.3-0.4-0.5-0.6-0.8c0.6,0,1.2,0,1.7,0
												c0.2,0.1,0.3,0.3,0.4,0.4C82,34.9,82.1,34.9,82.1,35L82.1,35z M78.8,37.7C78.8,37.8,78.7,37.7,78.8,37.7
												C78.7,37.7,78.8,37.7,78.8,37.7S78.7,37.7,78.8,37.7L78.8,37.7z M78.7,36.8c-0.3-0.6-0.7-1.2-1-1.8c0.3-0.1,0.6-0.2,0.8-0.4
												c0.1-0.1,0.1,0.1,0.2,0.2c0.2,0.3,0.4,0.6,0.6,0.9c0.1,0.1,0.2,0.3,0.2,0.4c0,0.1-0.2,0.2-0.2,0.2C79.1,36.5,78.9,36.7,78.7,36.8
												L78.7,36.8z M64.3,30.5c-0.2-0.1-0.4-0.3-0.5-0.4c-0.5,0.4-0.9,0.9-1.4,1.2c-0.1-0.1-0.2-0.2-0.3-0.2l0,0l0,0
												C62,31,61.9,31,61.8,30.8c-0.1-0.1-0.2-0.2-0.2-0.3c0-0.1,0.1-0.2,0.2-0.2c0.8-0.8,1.5-1.5,2.3-2.3c0.2-0.2,0.4-0.4,0.6-0.6
												c0.1-0.1,0.2-0.2,0.2-0.2c0.1,0,0.2,0.2,0.3,0.2c0.3,0.3,0.5,0.5,0.8,0.8s0.5,0.5,0.7,0.9c0,0.2,0,0.6,0,0.8
												c-0.1,0.3-0.4,0.7-0.7,0.9c-0.2,0.1-0.6,0.2-1,0.2C64.7,30.8,64.5,30.6,64.3,30.5L64.3,30.5z M64.9,34.4c-0.3,0.6-0.8,1.1-1.2,1.6
												c-0.3-0.2-0.6-0.5-0.9-0.7c-0.1-0.1-0.3-0.2-0.3-0.3s0.3-0.3,0.3-0.3c0.1-0.1,0.2-0.2,0.3-0.3s0.3,0,0.5,0
												C64.1,34.4,64.5,34.4,64.9,34.4L64.9,34.4z M62.1,33.3c0,0-0.1,0.1-0.2,0.1c-0.2-0.3-0.3-0.7-0.4-1c0.2-0.2,0.4-0.3,0.6-0.4
												C62.1,32.3,62.1,32.9,62.1,33.3L62.1,33.3z M61,19c0.1,0,0.1-0.1,0.2-0.2c0.1,0,0.2,0.1,0.2,0.1c0.5,0.3,1.1,0.7,1.5,1.1
												c0,0.3,0,0.6-0.1,1c-1-0.5-1.9-1-2.9-1.6c0.1-0.4,0.1-0.9,0.3-1.2c0.3,0.1,0.5,0.3,0.7,0.4C61,18.8,60.9,19,61,19L61,19z
												 M64.6,16.3c0.2-0.4,0.4-0.6,0.8-0.7c0.2-0.1,0.3-0.2,0.5-0.2l0,0c-0.1,0.2-0.3,0.4-0.4,0.5c-0.4,0.6-0.8,1.2-1.1,1.8
												c-0.4,0.9-0.7,2-0.7,3.1c-0.1,1.9,0.3,3.3,1,4.6c0.1,0.2,0.2,0.4,0.4,0.6c0.1,0.2,0.3,0.4,0.4,0.6c-0.1,0-0.4,0.1-0.5,0.1l-0.2-0.2
												c-0.9-1.3-1.6-3.1-1.6-5.2C63.1,19.1,63.7,17.6,64.6,16.3L64.6,16.3z M63.5,16.8c0.2-0.2,0.5-0.4,0.9-0.6v0.1
												c-0.1,0.3-0.3,0.6-0.5,0.8C63.7,17.1,63.6,16.9,63.5,16.8L63.5,16.8z M80.1,16.6c0,0,0,0.1,0.1,0.1c0,0.1,0.1,0.2,0.1,0.3
												c0.9,1.5,1.4,3.9,0.9,6.1c-0.2,0.9-0.5,1.7-0.9,2.5c-0.1,0.3-0.3,0.5-0.5,0.8c-0.1,0.1-0.2,0.2-0.2,0.2c-0.1,0-0.3,0-0.5,0
												c0.1-0.2,0.2-0.4,0.4-0.6c0.6-1,1.2-2.1,1.3-3.5c0.1-1.1,0.1-2.2-0.2-3.3c-0.3-1.3-0.9-2.3-1.6-3.3c-0.1-0.2-0.3-0.4-0.4-0.6
												c0.3,0.1,0.5,0.2,0.7,0.3c0.3,0.2,0.4,0.5,0.6,0.8C80.1,16.5,80.1,16.6,80.1,16.6L80.1,16.6z M80.1,16.1c0.3,0.1,0.6,0.3,0.8,0.5
												c-0.1,0.1-0.2,0.3-0.3,0.4C80.5,16.7,80.2,16.5,80.1,16.1L80.1,16.1z M83.5,18.6c0-0.1,0.2-0.2,0.3-0.3c0.1-0.1,0.3-0.2,0.4-0.3
												c0.1,0.2,0.2,0.6,0.2,0.9c0,0.1,0.1,0.3,0.1,0.3c0,0.1-0.3,0.2-0.3,0.2c-0.6,0.3-1.2,0.7-1.8,1c-0.2,0.1-0.5,0.3-0.7,0.4
												c0-0.3,0-0.6-0.1-1c0.5-0.3,1-0.7,1.5-1.1c0.1,0,0.2-0.1,0.2-0.1c0.1,0,0.1,0.1,0.2,0.1C83.6,18.8,83.5,18.7,83.5,18.6L83.5,18.6z
												 M82.3,18.3c-0.3,0.3-0.6,0.5-0.9,0.8c-0.1-0.4-0.3-0.8-0.4-1.2c0.2-0.2,0.4-0.4,0.6-0.7c0.2,0.1,0.4,0.2,0.5,0.4
												c0.1,0.1,0.1,0.1,0.2,0.2s0.2,0.2,0.2,0.2C82.6,18.1,82.3,18.2,82.3,18.3L82.3,18.3z M83.9,22.8c0,0.4-0.1,0.8-0.1,1.2
												c-0.9,0.2-1.8,0.3-2.7,0.5c0.1-0.4,0.2-0.7,0.3-1C82.2,23.3,83.1,23,83.9,22.8L83.9,22.8z M63.5,24.7c-0.9-0.1-1.8-0.3-2.7-0.4
												c-0.1-0.4-0.1-0.8-0.1-1.3l0,0c0.9,0.2,1.7,0.5,2.5,0.7C63.3,24,63.4,24.4,63.5,24.7L63.5,24.7z M63.1,19.1c-0.5-0.3-0.8-0.7-1.3-1
												c0.2-0.3,0.6-0.6,0.9-0.8c0.2,0.2,0.5,0.5,0.7,0.7C63.4,18.4,63.3,18.8,63.1,19.1L63.1,19.1z M61,20.9c0.5,0.2,0.9,0.5,1.4,0.7
												c0.1,0.1,0.4,0.2,0.4,0.3c0,0.1,0,0.2,0,0.3c0,0.3,0.1,0.6,0.1,0.9c-0.1,0-0.2,0-0.2,0c-0.6-0.2-1.2-0.4-1.7-0.6
												c-0.7-0.2-1.3-0.5-1.9-0.8c0-0.5,0-1-0.1-1.5l0,0C59.8,20.3,60.4,20.6,61,20.9L61,20.9z M59.8,25c1,0,2.2,0.1,3.5,0.2
												c0.1,0,0.3,0,0.4,0c0.1,0,0.1,0.2,0.2,0.3c0.1,0.3,0.3,0.6,0.4,0.9c-1.5,0-3,0.1-4.4,0.2C59.9,26,59.8,25.4,59.8,25L59.8,25z
												 M67.1,30.4c0.3-0.3,0.6-0.5,1-0.6s0.8,0,1.1,0.2c0.4,0.2,0.6,0.5,0.8,0.9c0.1,0.2,0.1,0.5,0,0.8c0,0.2,0,0.3-0.1,0.4
												c-0.1,0.4-0.3,0.9-0.5,1.2c-0.3,0.6-0.7,1.2-1.5,1.2c-0.4,0-0.7-0.1-1-0.2c-0.2-0.1-0.4-0.3-0.6-0.5c-0.5-0.7-0.2-1.8,0.1-2.5
												C66.6,31,66.8,30.7,67.1,30.4L67.1,30.4z M66.1,34.7c0.3,0.1,0.6,0.2,0.9,0.4c-0.3,0.6-0.6,1.3-1,1.9c-0.4-0.2-0.6-0.5-0.9-0.8
												C65.5,35.6,65.8,35.1,66.1,34.7L66.1,34.7z M66.7,37.9L66.7,37.9c0.4-0.9,0.8-1.7,1.2-2.6l0,0c0.3,0.1,0.6,0.2,0.9,0.3
												c-0.5,1.3-0.9,2.6-1.4,3.9c-0.1,0-0.2-0.2-0.3-0.2C67,39.2,67,39.1,66.9,39c-0.2-0.2-0.3-0.3-0.5-0.5
												C66.5,38.3,66.6,38.1,66.7,37.9L66.7,37.9z M69.7,35.8C69.7,35.7,69.7,35.7,69.7,35.8c0.3,0,0.6,0.1,0.9,0.1
												c-0.3,1.5-0.5,2.9-0.8,4.3c0,0.2-0.1,0.4-0.1,0.6c-0.1,0-0.2-0.1-0.3-0.2c-0.2-0.2-0.5-0.5-0.7-0.7C69.1,38.4,69.4,37.1,69.7,35.8
												L69.7,35.8z M70.3,35.2c0.2-1.6,0.3-3.2,0.5-4.7l0,0c0.4,0,0.8,0.1,1.2,0.1c-0.1,1.2-0.3,2.5-0.4,3.8c0.4,0,1,0.1,1.5,0.1
												c0,0.3-0.1,0.7-0.1,1C72.1,35.4,71.2,35.3,70.3,35.2L70.3,35.2z M72.3,29.5c-1.1,0-1.9,0.4-2.7,0.7c-0.2-0.3-0.2-0.8-0.4-1.1
												c-0.1,0-0.2,0-0.3,0.1c-0.1,0-0.2,0.1-0.3,0.1c-0.2,0-0.2-0.4-0.3-0.6c-0.4,0-0.8,0.1-1.2,0c0.1-0.3,0.3-0.5,0.4-0.8
												c-0.3-0.1-0.5-0.3-0.8-0.5c-0.1-0.1-0.2-0.1-0.2-0.2c0.3,0,0.6-0.1,0.9-0.2s0.5-0.2,0.9-0.2c0.2,0.1,0.2,0.3,0.3,0.5
												c0.3,0,0.5-0.2,0.8-0.2c0.2,0,0.3,0.4,0.4,0.6c0.4-0.1,0.7-0.2,1.1-0.3c1.3-0.2,2.7,0,3.7,0.3c0.1-0.1,0.1-0.3,0.2-0.4
												c0-0.1,0.1-0.1,0.2-0.1s0.2,0.1,0.4,0.1c0.1,0,0.2,0.1,0.4,0.1c0-0.3,0.2-0.5,0.6-0.5c0.2,0,0.4,0.2,0.7,0.3c0.3,0.1,0.6,0,0.8,0.1
												c-0.1,0.2-0.3,0.3-0.4,0.4c-0.2,0.1-0.3,0.2-0.5,0.3c0.1,0.3,0.3,0.5,0.4,0.9c-0.1,0-0.1,0-0.2,0.1c-0.3,0-0.7-0.1-1-0.1
												c-0.1,0.2-0.1,0.4-0.2,0.6c-0.2,0-0.4-0.1-0.7-0.1c-0.1,0.4-0.2,0.8-0.4,1.2C74.2,29.8,73.4,29.5,72.3,29.5L72.3,29.5z M74.6,30.3
												L74.6,30.3c0.1,0,0.2,0.5,0.2,0.6c0.2,1.3,0.5,2.7,0.7,4.1c-0.4,0.1-0.8,0.1-1.2,0.2c-0.3-1.5-0.5-3.1-0.8-4.7
												C73.8,30.4,74.2,30.4,74.6,30.3L74.6,30.3z M74.2,35.8c0.1,0,0.3-0.1,0.5-0.1c0.1,0,0.2,0,0.2,0c0.1,0,0.1,0.2,0.1,0.2
												c0.2,0.6,0.3,1.2,0.5,1.8c0.1,0.5,0.3,1,0.4,1.5c0,0.1,0.2,0.4,0.1,0.5c0,0.1-0.2,0.2-0.2,0.2c-0.2,0.2-0.5,0.5-0.7,0.7
												c-0.3-1.3-0.5-2.4-0.7-3.8C74.3,36.6,74.2,36.2,74.2,35.8L74.2,35.8L74.2,35.8z M75.9,35.6c0.1-0.1,0.3-0.1,0.4-0.2
												c0.1,0,0.3-0.1,0.4-0.1s0.2,0.3,0.2,0.4c0.2,0.4,0.4,0.8,0.6,1.2c0.3,0.6,0.5,1.1,0.8,1.6c-0.3,0.4-0.6,0.7-1,1
												C76.9,38.2,76.4,36.9,75.9,35.6L75.9,35.6z M78.1,34.5C78.1,34.4,78.1,34.4,78.1,34.5C78.1,34.4,78.1,34.5,78.1,34.5L78.1,34.5z
												 M78.8,34c-0.4,0.3-1,0.3-1.5,0.1c-0.4-0.2-0.8-0.6-1-1.1c-0.1-0.2-0.3-0.4-0.4-0.7s-0.2-0.5-0.2-0.8s0-0.6,0-0.8
												c0-0.2,0.1-0.5,0.2-0.6c0.3-0.4,0.7-0.7,1.3-0.7c0.7,0,1.2,0.7,1.4,1.1c-0.3,0.2-0.6,0.4-0.9,0.6c-0.1-0.2-0.3-0.7-0.7-0.6
												c-0.4,0.1-0.2,0.7-0.1,1c0.1,0.2,0.2,0.3,0.2,0.5c0.2,0.4,0.3,0.7,0.5,1c0.1,0.1,0.3,0.4,0.5,0.3c0.1,0,0.2-0.1,0.3-0.2
												c0.2-0.3,0-0.6-0.1-0.9c0.3-0.2,0.5-0.4,0.8-0.5c0.1,0.1,0.2,0.3,0.3,0.5c0.1,0.2,0.1,0.4,0.1,0.6C79.6,33.3,79.2,33.8,78.8,34
												L78.8,34z M80.3,26.2c0.1-0.3,0.3-0.5,0.4-0.8c0.1-0.1,0.1-0.2,0.2-0.3c0.1,0,0.3,0,0.5-0.1c1.2-0.1,2.4-0.2,3.4-0.2
												c0,0.5,0,1-0.1,1.5C83.1,26.3,81.7,26.3,80.3,26.2L80.3,26.2z M65.3,2.8C65.2,2.8,65.3,2.7,65.3,2.8c0.1-0.1,0.3-0.4,0.4-0.6
												c0.1,0,0.2,0,0.3,0c0,0.2-0.1,0.4-0.3,0.5C65.6,2.8,65.4,2.9,65.3,2.8C65.2,2.8,65.2,2.8,65.3,2.8L65.3,2.8L65.3,2.8z M67.1,2.9
												c-0.1,0-0.2,0.1-0.3,0c0.1-0.3,0.3-0.5,0.4-0.8c0.1,0,0.2,0,0.3,0C67.4,2.4,67.3,2.8,67.1,2.9L67.1,2.9z M67.7,2.2
												c0.1,0,0.2,0,0.2,0.1c-0.1,0.3-0.2,0.6-0.6,0.6C67.5,2.7,67.7,2.5,67.7,2.2L67.7,2.2z M67.2,3.2c0,0.2-0.2,0.3-0.3,0.3
												C67,3.4,67,3.2,67.2,3.2L67.2,3.2z M64.9,6c0.1-0.4,0.2-0.8,0.3-1.2c0.1,0,0.2-0.1,0.4-0.1c0,0.4-0.1,0.8-0.2,1.2s-0.3,0.7-0.5,1
												C64.8,7,64.6,7.2,64.5,7C64.5,6.7,64.7,6.3,64.9,6L64.9,6z M63.6,7.3c-0.2-0.1,0-0.2,0.1-0.4c0.4-0.6,0.7-1.4,1-2.1
												c0.1-0.1,0.2-0.1,0.4-0.1c0,0.3-0.1,0.6-0.2,0.9c-0.1,0.2-0.2,0.4-0.2,0.6C64.4,6.7,64.2,7.3,63.6,7.3L63.6,7.3z M65.3,6.5
												c0.2-0.5,0.3-1,0.5-1.6c0.1-0.1,0.2-0.2,0.4-0.2c0.1,0.1,0,0.2,0,0.3c0,0.3-0.1,0.6-0.2,0.8c-0.1,0.4-0.2,0.8-0.5,1
												C65.4,6.9,65.2,7,65,7C65.1,6.8,65.2,6.6,65.3,6.5L65.3,6.5z M65.3,4.6c-0.1,0-0.1,0-0.2-0.1C65.4,4,65.7,3.7,66,3.2
												c0.1,0,0.2,0,0.3,0c0,0.3-0.2,0.5-0.3,0.7C65.9,4.1,65.7,4.4,65.3,4.6L65.3,4.6z M65.7,3.6c-0.2,0.3-0.4,0.5-0.6,0.7
												c-0.1,0.1-0.2,0.2-0.4,0.2c0.2-0.3,0.5-0.6,0.7-1c0.1-0.1,0.1-0.3,0.2-0.4l0,0c0.1,0,0.2,0,0.3,0C65.9,3.3,65.8,3.5,65.7,3.6
												L65.7,3.6z M65.2,3.6C65.1,3.7,65,3.9,64.9,4c-0.2,0.3-0.4,0.5-0.7,0.6c0,0-0.3,0.1-0.3,0s0.1-0.1,0.2-0.2s0.1-0.1,0.2-0.2
												C64.5,4,64.8,3.7,65,3.4c0.1-0.1,0.1-0.3,0.2-0.3s0.2,0,0.3,0C65.4,3.3,65.3,3.4,65.2,3.6L65.2,3.6z M63.9,4.9c0.1,0,0.3-0.1,0.5,0
												C64.2,5.5,64,6,63.7,6.5c-0.2,0.4-0.5,1-1.1,1.2c-0.1,0-0.3,0-0.3-0.1s0.1-0.2,0.2-0.3C62.7,7,63,6.7,63.2,6.4
												C63.5,5.8,63.6,5.3,63.9,4.9L63.9,4.9z M63.5,5.2C63.2,6,62.7,7,62,7.4c-0.1,0-0.1,0.1-0.3,0.1c-0.1,0-0.2,0.1-0.3,0
												c0-0.1,0.1-0.3,0.2-0.3c0.4-0.5,0.7-1,1-1.7c0.1-0.3,0.2-0.6,0.4-0.8c0.2,0,0.4,0,0.6,0.1C63.6,5,63.6,5.1,63.5,5.2L63.5,5.2z
												 M61.9,7.8c0,0.4-0.1,0.9-0.3,1.3c-0.3,1.2-0.7,2.3-1.1,3.4c-0.2,0.1-0.3,0.2-0.5,0.3s-0.3,0.3-0.5,0.3c0-0.3,0.1-0.5,0.2-0.7
												c0.1-0.2,0.1-0.4,0.2-0.7c0.2-0.4,0.3-0.8,0.5-1.3c0.3-0.8,0.6-1.7,0.9-2.6C61.6,7.8,61.7,7.8,61.9,7.8L61.9,7.8z M61.2,11.1
												c0.3-1.1,0.6-2.2,1-3.3l0,0c0.2,0.1,0.4,0,0.6,0c0,0.4-0.1,0.8-0.1,1.1c-0.1,0.3-0.2,0.7-0.3,1c-0.1,0.4-0.3,1-0.5,1.4
												c-0.1,0.1-0.2,0.3-0.2,0.4c-0.1,0.1-0.2,0.2-0.3,0.2C61.3,12,61.2,12,61,12.1C61,11.8,61.1,11.4,61.2,11.1L61.2,11.1z M62.7,9.6
												c0.1-0.5,0.2-0.9,0.3-1.4c0-0.3,0-0.5,0.2-0.6s0.4-0.1,0.5,0.1c-0.1,0.6-0.3,1.3-0.5,1.9c-0.2,0.4-0.4,0.9-0.6,1.3
												c-0.1,0.3-0.2,0.5-0.6,0.5C62.3,10.8,62.5,10.3,62.7,9.6L62.7,9.6z M63.1,10.2c0.4-0.8,0.6-1.7,0.9-2.7c0.1-0.1,0.3-0.2,0.4-0.2
												c-0.1,0.6-0.3,1.2-0.4,1.8c-0.2,0.6-0.4,1.1-0.6,1.7c-0.2,0.1-0.3,0.2-0.5,0.3C62.8,10.7,63,10.5,63.1,10.2L63.1,10.2z M64.4,7.9
												c0-0.1,0.1-0.3,0.1-0.4c0.1-0.1,0.4-0.3,0.6-0.3C65.1,7.5,65,7.7,65,8c-0.1,0.5-0.3,1.1-0.5,1.6c0,0.1-0.1,0.3-0.1,0.4
												c-0.1,0.2-0.1,0.4-0.2,0.4c-0.2,0.1-0.4,0.2-0.6,0.3C63.8,9.8,64.2,8.8,64.4,7.9L64.4,7.9z M65.3,7.3c0.2-0.1,0.4-0.3,0.6-0.2
												c0,0.3-0.1,0.6-0.2,0.8c-0.2,0.7-0.5,1.5-0.9,2.2c-0.1,0.1-0.3,0.2-0.5,0.2C64.7,9.3,65.1,8.3,65.3,7.3L65.3,7.3z M66,7.5
												c0-0.1,0.1-0.3,0.1-0.3c0-0.1,0.2-0.2,0.3-0.2c0,0,0.1,0,0.2,0c-0.1,0.9-0.5,1.7-0.8,2.5c0,0.1-0.1,0.2-0.1,0.3
												c-0.1,0.1-0.4,0.2-0.5,0.2C65.4,9.2,65.8,8.3,66,7.5L66,7.5z M66.7,7.3c0-0.1,0-0.3,0.1-0.3c0-0.1,0.2-0.1,0.3-0.2
												c0.1-0.1,0.2-0.2,0.4-0.1c-0.1,0.5-0.2,1-0.4,1.4c-0.1,0.2-0.2,0.5-0.2,0.7c-0.1,0.2-0.2,0.5-0.3,0.7c-0.1,0.2-0.3,0.2-0.5,0.2
												C66.2,8.9,66.5,8,66.7,7.3L66.7,7.3z M67.4,6.3c-0.1-0.1,0.1-0.3,0.1-0.4c0.1-0.4,0.2-0.9,0.4-1.2l0,0c0.2,0,0.3,0.1,0.4,0.2
												c-0.1,0.3-0.2,0.7-0.4,1c0,0.1-0.1,0.2-0.1,0.3C67.7,6.3,67.4,6.5,67.4,6.3L67.4,6.3z M67.3,5.5c-0.1,0.4-0.1,0.7-0.3,0.9
												c0,0.1-0.1,0.2-0.2,0.2s-0.2,0-0.3,0c0-0.1,0.1-0.3,0.1-0.5c0.1-0.4,0.2-0.9,0.3-1.4c0.1-0.1,0.4-0.1,0.6-0.1
												C67.5,4.9,67.4,5.2,67.3,5.5L67.3,5.5z M66.6,5.7c-0.1,0.4-0.1,0.7-0.3,0.9c-0.1,0.1-0.3,0.2-0.5,0.1c0-0.2,0.1-0.3,0.1-0.5
												c0.2-0.5,0.2-1,0.3-1.5c0.1,0,0.2-0.1,0.4-0.1C66.8,5,66.7,5.4,66.6,5.7L66.6,5.7z M66.3,4.5c0-0.2,0.1-0.3,0.2-0.4
												c0.1,0.1,0.1,0.2,0.1,0.3C66.5,4.6,66.3,4.6,66.3,4.5L66.3,4.5z M66.7,3.6c-0.2,0.2-0.3,0.4-0.5,0.7c-0.1,0.1-0.2,0.2-0.4,0.2
												c0-0.2,0.2-0.3,0.3-0.4c0.2-0.3,0.3-0.6,0.5-0.9c0.1,0,0.2,0,0.2,0C66.8,3.4,66.8,3.5,66.7,3.6L66.7,3.6z M66.3,2.9
												c0.1-0.3,0.3-0.5,0.4-0.8c0.1,0,0.2,0,0.2,0.1C66.9,2.5,66.8,2.9,66.3,2.9L66.3,2.9z M66.3,2.6c-0.1,0.1-0.3,0.3-0.5,0.3
												c0.1-0.3,0.3-0.6,0.4-0.8c0.1,0,0.2,0,0.3,0C66.5,2.3,66.5,2.5,66.3,2.6L66.3,2.6z M64.7,2.9c0.1-0.2,0.2-0.4,0.3-0.5h0.2
												C65.2,2.6,65,2.9,64.7,2.9L64.7,2.9z M64.8,3.2c-0.1,0.3-0.3,0.6-0.5,0.8s-0.5,0.5-0.8,0.6c-0.1,0-0.2,0-0.3,0
												c0.2-0.2,0.4-0.4,0.6-0.7c0.1-0.1,0.2-0.2,0.3-0.3c0.1-0.1,0.2-0.3,0.3-0.3C64.5,3.1,64.7,3.2,64.8,3.2L64.8,3.2z M64.1,3
												c0,0-0.1,0-0.2,0c0.1-0.2,0.2-0.3,0.4-0.5c0.1,0,0.2,0,0.3,0C64.6,2.7,64.4,3,64.1,3L64.1,3z M64.1,3.3c0,0.1,0,0.1,0,0.2
												c-0.1,0.2-0.3,0.4-0.5,0.6s-0.4,0.4-0.7,0.4c-0.1,0-0.3,0-0.4-0.1c0.1-0.1,0.3-0.2,0.4-0.3c0,0,0,0,0.1-0.1c0.1,0,0.1-0.1,0.2-0.2
												c0.1-0.1,0.1-0.1,0.2-0.2c0.1-0.2,0.3-0.3,0.4-0.5C63.8,3.2,63.9,3.3,64.1,3.3L64.1,3.3z M62.7,4.8c0,0.4-0.2,0.6-0.3,0.9
												c-0.3,0.5-0.6,1-0.9,1.4c-0.2,0.2-0.4,0.4-0.7,0.5c-0.2,0-0.5,0-0.5-0.2c0-0.1,0.1-0.3,0.2-0.4c0.3-0.3,0.6-0.6,0.8-0.9
												c0.2-0.2,0.3-0.5,0.4-0.7c0.1-0.3,0.2-0.5,0.4-0.8C62.4,4.7,62.5,4.8,62.7,4.8L62.7,4.8z M60.4,7.9c0.2,0.1,0.5,0,0.7,0
												c0.1,0,0,0.2,0,0.2c-0.1,0.5-0.3,1-0.5,1.6s-0.4,1.2-0.6,1.8c-0.3,0.8-0.7,1.7-1.3,2.3c-0.1,0.1-0.2,0.2-0.3,0.3s-0.2,0.2-0.4,0.2
												c0-0.6,0.3-1.2,0.5-1.7s0.4-1,0.6-1.6c0.2-0.5,0.4-1,0.6-1.6C60,8.9,60.2,8.4,60.4,7.9L60.4,7.9z M67.4,8.7c0,0.1-0.1,0.2-0.1,0.4
												c0,0.1-0.1,0.3-0.2,0.3c-0.1,0.1-0.2,0.1-0.4,0.1c0.1-0.7,0.5-1.4,0.7-2.2c0-0.1,0.1-0.2,0.1-0.4c0-0.1,0.1-0.3,0.1-0.4
												c0.1-0.1,0.4-0.2,0.5-0.1C68,7.2,67.7,7.9,67.4,8.7L67.4,8.7z M68.3,6.1c-0.1,0.1-0.3,0.2-0.4,0c0.2-0.4,0.3-0.8,0.5-1.2l0,0
												c0.1,0,0.2,0.1,0.3,0.2C68.7,5.4,68.5,5.8,68.3,6.1L68.3,6.1z M69.9,2.8c0.3,0.5,0.9,0.8,1.8,0.8c0.2,0,0.6,0,0.4,0.2
												c0,0.1,0.2,0.2,0.2,0.3s-0.1,0.1-0.2,0.1c0,0.2,0.2,0.2,0.2,0.4c0,0.1-0.2,0.1-0.3,0c0,0.1,0.2,0.2,0.1,0.3C72.1,5,71.9,5,71.8,5
												c0,0.1,0.1,0.3,0,0.4s-0.2,0-0.3,0.1c0,0.1,0.1,0.2,0.1,0.3c-0.1,0-0.2,0-0.3,0.1c0,0.1,0,0.2-0.1,0.3c-0.1,0-0.1-0.1-0.2-0.1
												c0,0,0,0.1-0.1,0.2c-0.2,0-0.4-0.1-0.5-0.2c-0.4-0.3-0.8-0.6-1.1-1c-0.2-0.2-0.5-0.4-0.8-0.6s-0.7-0.2-1.1-0.3c0.1,0,0.1,0,0.2-0.1
												c0.2,0,0.4,0,0.5,0.1c0.2,0,0.3,0.1,0.5,0.1C68.4,4.1,67.9,4,67.5,4c-0.3,0-0.5,0.2-0.6,0.4c-0.2-0.1-0.2-0.4,0-0.6
												c0.2-0.3,0.8-0.4,1.2-0.5C68.4,2.8,69.2,2.7,69.9,2.8L69.9,2.8z M65.3,1.8c0.4-0.1,0.8-0.3,1.3-0.3c0.6-0.1,1.1,0.1,1.6,0.2
												c0.2,0.1,0.4,0.2,0.6,0.3s0.3,0.3,0.4,0.5c-0.5,0.1-1,0.3-1.2,0.7c-0.1,0.1-0.3,0.2-0.5,0.1C67.6,3,67.8,2.9,68,2.8
												c0.1,0,0.2-0.1,0.3-0.1c0.1-0.1,0.2-0.1,0.3-0.2c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1-0.1-0.2-0.2-0.3-0.2c-0.1,0-0.1,0-0.2,0
												C67.7,2,67.6,2,67.6,2c-0.1,0-0.1,0-0.2,0S67.2,1.9,67,1.9c-0.3,0-0.6,0-0.8,0c-0.1,0-0.2,0-0.2,0.1c-0.1,0-0.3,0-0.4,0
												s-0.2,0.1-0.3,0.2c-0.1,0.1-0.2,0.1-0.4,0.1c-0.2,0.1-0.5,0.2-0.7,0.1C64.5,2.1,64.9,1.9,65.3,1.8L65.3,1.8z M68.3,2.5
												c0,0.1-0.1,0.1-0.2,0.1C68,2.4,68.3,2.4,68.3,2.5L68.3,2.5z M63.4,2.7c0.2-0.1,0.3-0.3,0.5-0.3c0.1,0,0.2,0,0.2,0.1S64,2.7,64,2.7
												c-0.2,0.2-0.6,0.6-1,0.4C63,2.9,63.2,2.8,63.4,2.7L63.4,2.7z M61.9,4c0.2-0.2,0.4-0.3,0.6-0.5c0.1-0.1,0.2-0.2,0.3-0.2
												c0.2,0,0.4,0,0.6,0c-0.1,0.4-0.4,0.6-0.7,0.8c-0.1,0.1-0.3,0.2-0.5,0.2c-0.1,0-0.5,0.2-0.5-0.1C61.6,4.2,61.8,4,61.9,4L61.9,4z
												 M60,6.8c0.3-0.5,0.6-1,0.9-1.5c0.2-0.3,0.4-0.6,0.7-0.7c0.1,0,0.2,0,0.2,0c0,0.4-0.2,0.7-0.3,0.9C61.3,5.8,61.1,6,61,6.3
												c-0.3,0.3-0.7,0.7-1,0.9c-0.1,0.1-0.3,0.2-0.5,0.2C59.6,7.2,59.8,7,60,6.8L60,6.8z M56.9,14.2c0.6-1.9,1.1-3.9,2.1-5.6
												c0.1-0.3,0.3-0.5,0.4-0.7c0.1-0.1,0.4-0.2,0.5-0.2c0,0,0.1,0,0.2,0c0.1,0.2,0,0.3,0,0.5c-0.4,1-0.8,2.2-1.2,3.3
												c-0.1,0.3-0.2,0.6-0.4,0.9c-0.3,0.6-0.5,1.2-0.9,1.7c-0.2,0.2-0.4,0.5-0.7,0.6C56.8,14.4,56.9,14.3,56.9,14.2L56.9,14.2z
												 M60.8,36.2c-0.1-0.1-0.2-0.1-0.3-0.2c-0.1-0.1,0-0.4,0-0.6c0-0.2,0-0.4,0-0.6c0-0.6-0.3-1-0.7-1.3c-0.2-0.1-0.4-0.2-0.7-0.4
												c-0.2-0.2-0.4-0.3-0.5-0.5s-0.2-0.5-0.3-0.8c0.3,0,0.5,0.1,0.6,0.2c0.2,0.1,0.3,0.3,0.4,0.4c0-0.1-0.1-0.3-0.1-0.4
												c-0.1-0.3-0.3-0.5-0.5-0.7c-0.3-0.3-0.7-0.6-1-1c-0.4-0.5-0.8-1-0.7-1.8c0.2,0,0.3,0.2,0.5,0.3c0.1,0.1,0.3,0.2,0.4,0.3
												c0.1,0.1,0.1,0.2,0.2,0.2c-0.3-0.8-0.8-1.4-1.2-2.1c-0.2-0.4-0.4-0.7-0.5-1.1s-0.3-0.8-0.3-1.3c0.3,0.2,0.6,0.5,0.8,0.8
												c0.1,0.2,0.2,0.3,0.3,0.5s0.2,0.3,0.3,0.5c-0.2-0.8-0.7-1.5-1.1-2.1c-0.2-0.3-0.4-0.7-0.5-1c-0.2-0.4-0.4-0.8-0.3-1.3
												c0.5,0.2,0.7,0.8,1,1.1c-0.2-1-0.7-1.7-1-2.6c-0.1-0.3-0.3-0.8-0.2-1.1c0.6,0.4,0.9,1,1.3,1.7c0-0.1,0-0.3,0-0.4
												c-0.3-1-1.2-1.6-1.1-3c0-0.3,0.1-0.5,0.2-0.8c0.2,0.2,0.3,0.5,0.5,0.8c0.1,0.1,0.1,0.3,0.2,0.4c0.1,0.1,0.1,0.3,0.2,0.4
												c0.1-0.6,0.3-1.1,0.6-1.5c0.2-0.3,0.4-0.6,0.7-0.9c0.1-0.2,0.2-0.3,0.4-0.5l0,0c0.1,0.1,0,0.2,0.1,0.3c0.1,0.7-0.1,1.4-0.3,1.9
												c-0.2,0.6-0.6,1.1-0.7,1.8c0.1-0.1,0.2-0.2,0.3-0.3c0.2-0.2,0.3-0.4,0.5-0.7c0.1-0.1,0.3-0.5,0.4-0.2c0,0.2,0,0.4,0,0.6
												c-0.1,0.4-0.3,0.9-0.5,1.4c-0.1,0.3-0.3,0.6-0.4,0.9c-0.1,0.3-0.2,0.7-0.2,1c0,0.4,0,0.7,0.1,1.1c0.1-0.1,0.1-0.3,0.1-0.4
												c0.1-0.5,0.2-1.1,0.5-1.5c0.1-0.1,0.2-0.2,0.3-0.3c0.1,0.1,0,0.3,0,0.4c0,0.4-0.1,1-0.2,1.4c-0.1,0.6-0.3,1.3-0.1,1.9
												c0.2-0.5,0.3-1,0.6-1.5c0.1-0.1,0.1-0.3,0.3-0.4c0.2,0.9,0,1.9-0.2,2.7c-0.1,0.3-0.1,0.6-0.1,0.9c-0.1,0.6,0,1.2,0.2,1.7
												c0-0.6,0.1-1.2,0.3-1.7c0-0.1,0.2-0.4,0.3-0.4s0.1,0.4,0.2,0.5c0.1,0.7,0.1,1.7,0.1,2.4c0,0.4,0,0.9,0,1.3c0,0.2,0.1,0.4,0.1,0.6
												c0.1,0.2,0.1,0.4,0.2,0.5c0-0.6,0.1-1.2,0.4-1.6c0.2,0.1,0.2,0.4,0.3,0.5c0.1,0.3,0.2,0.7,0.2,1.2c0,0.4,0,0.9,0,1.4
												c0,0.7,0,1.4,0.1,2c0,0.1,0,0.2,0.1,0.3c0,0.1,0.1,0.2,0.1,0.3C61,36,60.8,36.1,60.8,36.2L60.8,36.2z M61.2,28.3
												c-0.1-0.4-0.2-0.7-0.3-1.1c1.1-0.1,2.3-0.2,3.2-0.3c0.1,0,0.2,0,0.2,0c-0.1,0.1-0.1,0.2-0.2,0.3c-0.2,0.2-0.3,0.3-0.5,0.5
												c-0.1,0.1-0.2,0.2-0.3,0.2s-0.2,0-0.3,0.1C62.5,28.1,61.8,28.2,61.2,28.3L61.2,28.3z M70.1,44c-0.5-0.3-1.2-0.4-1.6-0.7
												c-0.7-0.4-1.2-0.9-1.7-1.4s-0.9-1.2-1.3-1.8s-0.8-1.2-1.3-1.8c-0.3-0.3-0.7-0.7-1-1s-0.7-0.7-1-1.1c0,0.1,0,0.1,0.1,0.1
												c0.1,0.2,0.3,0.4,0.5,0.6c0.2,0.2,0.3,0.4,0.5,0.6c0.3,0.4,0.7,0.7,1.1,1.1c0.7,0.7,1.2,1.7,1.8,2.5c0.5,0.6,0.9,1.2,1.6,1.7
												c0.6,0.5,1.3,0.9,2.1,1.1c0.5,0.2,0.9,0.5,1.1,1.1c-0.3-0.1-0.5-0.3-0.7-0.4c0,0.2,0.2,0.5-0.1,0.6c-0.2-0.4-0.5-0.8-0.9-1
												c0,0.2,0.1,0.4,0.1,0.6c-0.6-0.1-0.7-0.7-1.1-1c0.1,0.2,0.2,0.4,0.3,0.7c-0.4-0.2-0.8-0.4-1-0.8c-0.2-0.4-0.4-0.8-0.6-1.1
												c0.1,0.3,0.2,0.6,0.2,1c-0.3-0.1-0.4-0.4-0.6-0.6c-0.5-0.7-0.8-1.6-1.2-2.4c0.1,0.5,0.3,1,0.3,1.6c-0.2-0.1-0.4-0.4-0.5-0.6
												c-0.4-0.7-0.5-1.8-1-2.4c0.1,0.5,0.5,1.1,0.3,1.8c-0.6-0.7-0.8-1.6-1.2-2.5c-0.1,0.5,0.3,1.1,0.1,1.5c-0.4-0.5-0.7-0.9-1-1.5
												c-0.3-0.5-0.6-1.1-0.6-1.8c0-0.2,0-0.4,0-0.5c0-0.7,0.1-1.2-0.1-1.9c-0.1-0.2-0.2-0.4-0.2-0.7c0.1-0.2,0.3,0,0.4,0.2
												c0.2,0.6,0,1.4,0.3,1.9c0.4,0.7,1.6,0.6,2,1.2c-0.2,0-0.4,0-0.6,0c0.4,0.3,1,0.4,1.5,0.6c0.1,0,0.2,0.1,0.2,0.1
												c0.1,0.1,0.2,0.2,0.3,0.2c0,0.1-0.1,0.1-0.2,0.1c-0.3,0.1-0.6,0-0.9,0c0.1,0.1,0.3,0.2,0.4,0.3c0.2,0.1,0.3,0.1,0.5,0.2
												c0,0,0,0,0.1,0c0,0,0,0,0.1,0.1l0,0c0.1,0.1,0.3,0.2,0.4,0.3s0.3,0.2,0.3,0.4c-0.1,0.1-0.5,0-0.7,0c0.1,0.1,0.1,0.1,0.2,0.2
												c0.4,0.3,0.9,0.5,1.4,0.8c0.2,0.1,0.4,0.2,0.4,0.4c-0.5,0-0.9-0.1-1.3-0.3c0.3,0.3,0.7,0.5,1.1,0.7c0.2,0.1,0.4,0.2,0.6,0.3
												s0.4,0.2,0.5,0.4c-0.3,0.1-0.7,0-1,0c0.4,0.4,1,0.6,1.5,0.9c0.2,0.1,0.3,0.2,0.5,0.3c-0.2,0.1-0.5,0-0.8,0c0.5,0.4,1.2,0.6,2,0.8
												c0,0.1-0.1,0.1-0.2,0.1c0.1,0.1,0.2,0.1,0.3,0.2c0.1,0.1,0.2,0.1,0.3,0.3C70.5,44.3,70.3,44.1,70.1,44L70.1,44z M72.4,44.7
												c-0.4-0.3-0.7-0.6-1.1-1c-0.1-0.1-0.3-0.2-0.3-0.3s0-0.3,0-0.4c0.1-0.4,0.1-1,0.1-1.4c0.1-1.4,0.2-2.5,0.4-3.8
												c0.1-0.7,0.1-1.3,0.2-1.8c0.4,0,0.9,0,1.4,0c0.2,2,0.4,3.9,0.5,5.8c0.1,0.6,0.1,1.1,0.2,1.7C73.3,43.9,72.8,44.3,72.4,44.7
												L72.4,44.7z M83.2,33.9c-0.1,0.2-0.1,0.4-0.1,0.6c0,0.6,0.1,1,0.1,1.6c0,0.8-0.2,1.4-0.6,2c-0.2,0.3-0.3,0.6-0.5,0.8
												c-0.2,0.3-0.3,0.6-0.5,0.8c-0.1-0.3,0-0.8,0-1s0.1-0.4,0.1-0.6c-0.2,0.5-0.3,1-0.5,1.4c-0.2,0.5-0.5,0.9-0.7,1.3
												c-0.1-0.1-0.1-0.4,0-0.6c0.1-0.5,0.2-0.9,0.3-1.2c-0.2,0.2-0.3,0.4-0.4,0.7c-0.2,0.5-0.4,1.1-0.6,1.6c-0.1,0.3-0.2,0.5-0.4,0.7
												c0-0.7,0.2-1.2,0.4-1.8c-0.1,0-0.1,0.1-0.1,0.2c-0.3,0.5-0.5,1-0.7,1.5c-0.1,0.3-0.3,0.6-0.5,0.8c-0.2,0.3-0.3,0.5-0.6,0.7
												c0-0.5,0.2-0.9,0.3-1.3c-0.1,0.2-0.3,0.4-0.4,0.6c-0.3,0.7-0.7,1.4-1.4,1.6c0-0.4,0.2-0.6,0.3-0.9c-0.2,0.2-0.4,0.4-0.6,0.6
												c-0.2,0.2-0.4,0.4-0.7,0.5c0-0.2,0.1-0.3,0.1-0.5c-0.2,0.1-0.4,0.2-0.5,0.4c-0.1,0.1-0.3,0.3-0.3,0.5c-0.2-0.1-0.2-0.4-0.1-0.6
												c-0.3,0.1-0.4,0.3-0.7,0.4c0.2-0.5,0.7-0.8,1.2-1s1-0.4,1.5-0.7c0.9-0.6,1.6-1.4,2.2-2.2c0.3-0.4,0.6-0.9,0.9-1.3
												c0.6-0.8,1.3-1.6,2-2.4c0.2-0.2,0.4-0.4,0.5-0.6c0.2-0.2,0.4-0.4,0.4-0.7c-0.1,0-0.1,0.1-0.1,0.1c-0.3,0.3-0.6,0.7-0.9,1
												c-0.3,0.4-0.7,0.7-1,1.1c-0.7,0.8-1.2,1.6-1.8,2.5c-0.6,0.9-1.2,1.6-2.1,2.2c-0.4,0.3-0.9,0.5-1.4,0.7s-0.9,0.5-1.5,0.6
												c0.1-0.2,0.3-0.3,0.5-0.5c0-0.1-0.1,0-0.1-0.1c0.6-0.3,1.5-0.4,2-0.8c-0.2,0-0.6,0.1-0.8,0c0.1-0.2,0.3-0.3,0.5-0.4
												c0.4-0.2,0.8-0.3,1.1-0.5c0.2-0.1,0.4-0.2,0.5-0.4c-0.3,0-0.7,0.1-1,0.1c0.2-0.4,0.7-0.6,1.1-0.8s0.9-0.4,1.1-0.8
												c-0.4,0.2-0.8,0.4-1.3,0.4c0.1-0.2,0.3-0.3,0.4-0.4c0.2-0.1,0.4-0.2,0.6-0.3c0.4-0.2,0.8-0.3,1-0.8c-0.2,0-0.5,0.2-0.7,0.1
												c0-0.1,0.1-0.2,0.2-0.2c0.5-0.4,1.2-0.6,1.6-1h-0.1c-0.3,0-0.7,0-0.9-0.1c0.3-0.7,1.4-0.5,2-1c-0.2,0-0.5,0-0.7-0.1
												c0.3-0.2,0.6-0.3,0.9-0.5c0.4-0.1,0.8-0.2,1-0.6c0.3-0.4,0.2-1.1,0.2-1.7c0-0.2,0.1-0.4,0.2-0.5c0,0,0,0,0.1,0
												C83.4,33.3,83.3,33.7,83.2,33.9L83.2,33.9z M83.5,28.2c-0.5,0-1-0.1-1.5-0.2c-0.4-0.3-0.7-0.7-1-1.1c1,0,1.8,0.2,2.8,0.3
												C83.7,27.5,83.6,27.9,83.5,28.2L83.5,28.2z M88.8,20.5c-0.3,1-1,1.7-1.1,2.9c0.1-0.1,0.2-0.2,0.2-0.4c0.2-0.4,0.5-0.8,0.8-1
												c0,1-0.5,1.8-0.9,2.5c-0.3,0.6-0.7,1.2-1,1.9c0.1,0,0.1-0.1,0.1-0.1c0.3-0.5,0.7-1,1.1-1.4c0.1-0.1,0.1-0.2,0.2-0.2
												c-0.1,0.9-0.5,1.7-0.8,2.4c-0.2,0.4-0.4,0.7-0.6,1s-0.5,0.6-0.5,1c0.2-0.1,0.3-0.3,0.5-0.4s0.4-0.2,0.6-0.3c0.1,0.4,0,0.8-0.2,1.1
												c-0.2,0.3-0.4,0.6-0.7,0.8c-0.4,0.3-0.8,0.6-1.2,1.1c-0.1,0.2-0.3,0.4-0.3,0.7c0.3-0.2,0.6-0.5,1-0.6c0,0,0,0.1-0.1,0.1v0.1
												c0,0.2-0.1,0.4-0.2,0.5c-0.1,0.2-0.2,0.3-0.3,0.4c-0.2,0.1-0.3,0.3-0.5,0.4c-0.2,0.1-0.4,0.2-0.6,0.3c-0.1,0.1-0.2,0.3-0.3,0.4
												c-0.2,0.3-0.2,0.7-0.1,1.2c0,0.3,0.2,0.7-0.1,0.9l-0.2,0.1c-0.1,0-0.2-0.2-0.2-0.3c0-0.3,0.1-0.5,0.1-0.7c0-0.3,0-0.8,0-1.2
												c0-0.6,0-1,0-1.5c0-0.2,0-0.4,0-0.5v-0.1c0-0.1,0-0.3,0.1-0.4c0.1-0.4,0.2-0.8,0.4-1.2c0.3,0.2,0.3,0.8,0.3,1.4c0,0.1,0,0.2,0,0.2
												c0.1-0.1,0.1-0.3,0.1-0.4c0.2-0.9,0.2-2.1,0.2-3.4c0-0.6,0-1.1,0.2-1.6c0.4,0.3,0.4,1,0.5,1.7c0,0.1,0,0.2,0.1,0.2
												c0.1-0.1,0.1-0.2,0.1-0.3c0,0,0,0,0.1-0.1c0.1-0.8-0.1-1.7-0.2-2.5c-0.1-0.5-0.2-1.1-0.2-1.7c0-0.2,0.1-0.5,0.2-0.5
												s0.2,0.3,0.2,0.4c0.2,0.4,0.4,0.8,0.5,1.3c0.1-0.1,0-0.3,0-0.4c0-0.5-0.2-1-0.3-1.6c-0.1-0.6-0.1-1.1-0.2-1.6
												c0.2,0,0.3,0.2,0.4,0.3c0.1,0.2,0.2,0.3,0.3,0.5c0.1,0.4,0.2,0.8,0.3,1.2c0.1-0.1,0.1-0.2,0.1-0.3c0.1-0.6-0.1-1.5-0.3-2
												c-0.3-0.6-0.7-1.2-0.8-2c0-0.2,0-0.4,0.1-0.6c0.5,0.2,0.8,0.8,1.1,1.2c0-0.1,0-0.3-0.1-0.4c-0.2-0.5-0.4-0.9-0.6-1.4
												c-0.1-0.2-0.2-0.5-0.2-0.8c-0.1-0.3-0.2-1,0.1-1.2l0,0c0.3,0.4,0.7,0.8,0.9,1.2c0.3,0.5,0.4,1,0.5,1.6c0.2-0.2,0.4-0.5,0.5-0.8
												s0.3-0.6,0.4-0.9c0.4,0.6,0.3,1.6,0,2.1c-0.2,0.3-0.3,0.6-0.5,0.9s-0.3,0.6-0.4,1c0.1-0.1,0.2-0.3,0.3-0.4c0.3-0.4,0.5-0.8,0.9-1.1
												C89,19.8,88.9,20.2,88.8,20.5L88.8,20.5z M68.3,27.1h0.2c0-0.1,0-0.1-0.1-0.2C68.3,26.9,68.3,26.9,68.3,27.1L68.3,27.1z M69.6,27.4
												C69.6,27.4,69.5,27.4,69.6,27.4c-0.2,0.1-0.4,0.2-0.5,0.3C69.3,27.7,69.5,27.6,69.6,27.4C69.6,27.5,69.6,27.4,69.6,27.4L69.6,27.4z
												 M65.5,29.3c0.1-0.4-0.2-0.5-0.3-0.7c-0.3,0.3-0.5,0.5-0.8,0.8c0.2,0.1,0.3,0.4,0.7,0.3C65.2,29.7,65.5,29.5,65.5,29.3L65.5,29.3z
												 M69.4,27.1c-0.1-0.1-0.3,0-0.5,0.1s-0.4,0.1-0.6,0.1c0.1,0.5,0.3,1,0.4,1.5c0.2,0,0.3-0.1,0.5-0.1c-0.1-0.4-0.2-0.7-0.3-1.1
												C69,27.4,69.3,27.4,69.4,27.1L69.4,27.1z M68.1,27c0-0.1,0.2-0.1,0.2-0.3c-0.4,0.1-0.7,0.3-1.2,0.3c0.2,0.3,0.6,0.3,0.8,0.5
												c-0.1,0.3-0.3,0.5-0.3,0.7c0.2,0.1,0.5,0,0.7,0c0-0.3-0.2-0.7-0.2-1.1C68.1,27.2,68.1,27.1,68.1,27L68.1,27z M60.1,13.7
												c-0.5,0.3-0.9,0.7-1.3,1.1c0.6,0.3,1.2,0.5,1.7,1c0.4,0.4,0.8,1,1,1.6c0.1,0,0.2-0.1,0.3-0.2c0.3-0.2,0.5-0.4,0.8-0.6
												c1.8-1.4,3.8-2.5,6.4-3c1-0.2,2.1-0.4,3.2-0.4c1.2,0,2.3,0.1,3.4,0.3c2.1,0.5,3.8,1.2,5.3,2.2c0.7,0.4,1.3,0.9,1.9,1.4
												c0.1,0.1,0.2,0.2,0.3,0.2c0.5-1.3,1.4-2.2,2.7-2.7c-0.2-0.2-0.4-0.4-0.6-0.6c-0.2-0.2-0.4-0.4-0.7-0.5c-1.3-1-2.8-1.9-4.5-2.7
												c-1.1-0.5-2.3-0.8-3.6-1.1c-1.9-0.4-4.5-0.5-6.4-0.3c-2,0.2-3.8,0.8-5.5,1.5C62.9,11.7,61.4,12.6,60.1,13.7L60.1,13.7z M84.1,15.6
												L84.1,15.6L84.1,15.6L84.1,15.6z M81,11.8C81.1,11.8,81.1,11.8,81,11.8C81.1,11.8,81.1,11.8,81,11.8L81,11.8L81,11.8z M70.5,27.5
												c-0.5,0.1-0.8,0.3-1.3,0.5c0.2,0.6,0.4,1.2,0.5,1.9c0.3-0.1,0.7-0.3,1.1-0.4s0.8-0.2,1.3-0.2c1.1-0.1,2,0.3,2.7,0.6
												c0.2-0.6,0.4-1.2,0.5-1.9C74.2,27.3,72,27.1,70.5,27.5L70.5,27.5z M76.2,27.1c0.1-0.1,0-0.3-0.1-0.3C76.1,26.9,76.1,27,76.2,27.1
												C76.1,27.1,76.2,27.1,76.2,27.1L76.2,27.1z M76.2,28.3c0.2,0.1,0.5,0.1,0.8,0.1c-0.1-0.3-0.2-0.5-0.3-0.8c0.2-0.2,0.5-0.2,0.7-0.4
												c-0.4-0.1-0.7-0.2-1.1-0.3c0.1,0.1,0.1,0.2,0.2,0.3c-0.1,0.2-0.1,0.4-0.2,0.6C76.3,27.9,76.2,28.1,76.2,28.3L76.2,28.3z M68.8,3.7
												C68.8,3.7,68.9,3.7,68.8,3.7c0.4-0.2,0.6,0.1,0.7-0.2c-0.2,0-0.3-0.2-0.5-0.2s-0.3,0-0.5,0C68.5,3.6,68.6,3.7,68.8,3.7L68.8,3.7z
												 M75.7,27.6c0,0.1-0.1,0.2-0.1,0.3c-0.1,0.3-0.2,0.6-0.2,0.9c0.2,0,0.3,0.1,0.5,0.1c0-0.1,0.1-0.2,0-0.2l0,0
												c0.1-0.4,0.3-0.8,0.3-1.3c-0.1,0-0.3-0.1-0.5-0.2c-0.2,0-0.4-0.1-0.5-0.1h-0.1C75.2,27.4,75.7,27.3,75.7,27.6L75.7,27.6z
												 M67.8,33.6c0.3-0.3,0.4-0.7,0.6-1.1c0.1-0.2,0.2-0.4,0.2-0.6c0.1-0.2,0.2-0.5,0.1-0.7c0-0.4-0.4-0.5-0.7-0.3
												c-0.2,0.1-0.4,0.6-0.4,0.7c-0.1,0.2-0.2,0.5-0.3,0.8c-0.1,0.3-0.2,0.5-0.2,0.8C67.2,33.7,67.6,33.8,67.8,33.6L67.8,33.6z
												 M75.3,27.5c-0.1-0.1-0.3-0.2-0.3,0c0.1,0.1,0.3,0.2,0.5,0.2C75.5,27.6,75.4,27.6,75.3,27.5L75.3,27.5z"/>
											<path id="Shape_21_" class="responder2" d="M61.1,14c0.2-0.1,0.3-0.2,0.5-0.2s0.3,0.1,0.4,0.2c0.2,0.3,0.1,0.7-0.1,0.9L61.8,15l-0.2,0.1
												l0.3,0.4c0.2,0.2,0.2,0.2,0.4,0.1l0.1,0.1l-0.7,0.5l-0.1-0.1c0.2-0.2,0.2-0.2,0-0.4l-0.7-1c-0.2-0.2-0.2-0.2-0.4-0.1l-0.1-0.1
												L61.1,14L61.1,14z M61.5,15c0,0,0.1,0,0.2-0.1c0.1-0.1,0.3-0.3,0-0.6c-0.2-0.3-0.4-0.3-0.6-0.1c-0.1,0-0.1,0.1-0.1,0.1v0.1L61.5,15
												L61.5,15z"/>
											<path id="Shape_22_" class="responder2" d="M64.4,14.3L64.4,14.3c-0.4,0.2-0.5,0.2-0.7,0.1c-0.1-0.1-0.3-0.2-0.5-0.3c-0.1,0-0.2-0.1-0.3,0
												h-0.1l0.2,0.4c0.1,0.2,0.2,0.2,0.4,0.1v0.1l-0.8,0.4V15c0.2-0.1,0.2-0.2,0.1-0.4l-0.6-1c-0.1-0.2-0.2-0.2-0.4-0.1v-0.1l0.7-0.4
												c0.2-0.1,0.4-0.2,0.5-0.2s0.3,0.1,0.4,0.2c0.1,0.2,0.1,0.4-0.1,0.6c0.1,0.1,0.3,0.2,0.4,0.2c0.2,0.1,0.3,0.1,0.4,0.2
												C64.3,14.2,64.3,14.2,64.4,14.3L64.4,14.3L64.4,14.3z M62.9,14c0.1-0.1,0.2-0.1,0.2-0.2s0-0.3-0.1-0.4c-0.2-0.3-0.4-0.3-0.6-0.2
												c-0.1,0-0.1,0.1-0.1,0.1v0.1L62.9,14L62.9,14L62.9,14z"/>
											<path id="Shape_23_" class="responder2" d="M65.8,12.5c0.3,0.6,0,1.2-0.5,1.4c-0.5,0.2-1.1,0-1.4-0.5c-0.2-0.5-0.1-1.1,0.5-1.4
												C64.9,11.8,65.5,12,65.8,12.5L65.8,12.5z M64.3,13.2c0.2,0.5,0.6,0.8,1,0.6c0.3-0.1,0.4-0.5,0.2-1c-0.3-0.6-0.7-0.8-1-0.6
												C64.1,12.3,64,12.7,64.3,13.2L64.3,13.2z"/>
											<path id="Shape_24_" class="responder2" d="M67.3,11.5c-0.1-0.1-0.1-0.2-0.2-0.2c-0.1,0-0.1,0-0.3,0l-0.2,0.1l0.5,1.4
												c0.1,0.2,0.1,0.3,0.4,0.2v0.1l-0.9,0.3v-0.1c0.2-0.1,0.3-0.1,0.2-0.4l-0.5-1.4h-0.1c-0.2,0.1-0.3,0.1-0.3,0.2s0,0.2,0,0.3h-0.1
												c-0.1-0.2-0.1-0.4-0.2-0.6h0.1c0.1,0.1,0.1,0,0.2,0l1.2-0.4c0.1,0,0.1-0.1,0.1-0.1h0.1C67.2,11.1,67.3,11.3,67.3,11.5L67.3,11.5
												L67.3,11.5z"/>
											<path id="Shape_25_" class="responder2" d="M69.3,12.1c0,0.1,0,0.4,0,0.5l-1.5,0.3v-0.1c0.3-0.1,0.3-0.1,0.2-0.4l-0.3-1.2
												c-0.1-0.3-0.1-0.3-0.3-0.2v-0.1l1.4-0.3c0,0.1,0.1,0.3,0.1,0.4h-0.1c-0.1-0.1-0.1-0.2-0.2-0.2c-0.1,0-0.1,0-0.3,0h-0.2
												c-0.1,0-0.1,0-0.1,0.1l0.2,0.6l0.2-0.1c0.3-0.1,0.3-0.1,0.3-0.3h0.1l0.1,0.6h-0.1c-0.1-0.2-0.1-0.2-0.4-0.1l-0.2,0.1l0.1,0.5
												c0,0.1,0.1,0.2,0.1,0.2c0.1,0,0.2,0,0.3,0c0.2,0,0.3-0.1,0.3-0.2s0.1-0.2,0.1-0.3L69.3,12.1L69.3,12.1z"/>
											<path id="Shape_26_" class="responder2" d="M71.1,11.8c0,0.1-0.1,0.4-0.1,0.5c-0.1,0-0.3,0.1-0.5,0.2c-0.8,0.1-1.2-0.4-1.2-0.9
												c-0.1-0.6,0.3-1.1,1-1.2c0.2,0,0.5,0,0.6,0c0,0.2,0.1,0.3,0.1,0.5h-0.1c-0.1-0.3-0.4-0.4-0.6-0.4c-0.5,0.1-0.7,0.5-0.6,1
												c0.1,0.6,0.4,0.9,0.9,0.8C70.9,12.3,71,12.1,71.1,11.8L71.1,11.8L71.1,11.8z"/>
											<path id="Shape_27_" class="responder2" d="M72.8,10.8c0-0.2-0.1-0.2-0.1-0.3c-0.1-0.1-0.1-0.1-0.3-0.1h-0.2v1.5c0,0.2,0,0.3,0.3,0.3v0.1
												h-1v-0.1c0.3,0,0.3,0,0.3-0.3v-1.5h-0.1c-0.3,0-0.3,0-0.4,0.1c0,0.1-0.1,0.2-0.1,0.3h-0.1c0-0.2,0-0.4,0-0.6h0.1
												c0,0.1,0.1,0.1,0.2,0.1h1.2c0.1,0,0.1,0,0.2-0.1h0.1C72.9,10.3,72.9,10.6,72.8,10.8L72.8,10.8L72.8,10.8z"/>
											<path id="Shape_28_" class="responder2" d="M75.6,11.3c-0.2,0-0.3,0-0.4,0.2c-0.1,0.1-0.2,0.2-0.3,0.3c0.2,0.2,0.3,0.5,0.4,0.7l0,0
												c-0.3,0-0.4-0.1-0.5-0.2c0,0-0.1-0.2-0.2-0.3c-0.2,0.2-0.4,0.3-0.6,0.3c-0.4,0-0.6-0.4-0.6-0.6c0-0.3,0.2-0.4,0.5-0.5
												c-0.1-0.1-0.2-0.3-0.2-0.5c0-0.3,0.3-0.5,0.6-0.4c0.3,0,0.5,0.2,0.4,0.5c0,0.1-0.1,0.2-0.2,0.2c-0.1,0-0.2,0.1-0.3,0.1
												c0.1,0.1,0.3,0.3,0.4,0.5c0.1-0.1,0.1-0.2,0.2-0.3c0.1-0.1,0.1-0.2-0.2-0.2V11L75.6,11.3L75.6,11.3L75.6,11.3z M74.6,12
												c-0.2-0.2-0.3-0.4-0.6-0.7c-0.1,0.1-0.2,0.2-0.2,0.3c0,0.3,0.2,0.5,0.4,0.5C74.3,12.2,74.5,12.1,74.6,12L74.6,12z M74.1,10.7
												c0,0.2,0.1,0.3,0.2,0.4c0.1-0.1,0.2-0.2,0.2-0.4c0-0.2-0.1-0.3-0.2-0.3C74.2,10.5,74.1,10.6,74.1,10.7L74.1,10.7z"/>
											<path id="Shape_29_" class="responder2" d="M77.3,11.4c0-0.2-0.1-0.4-0.3-0.5c-0.2,0-0.3,0.1-0.4,0.2c0,0.2,0.1,0.3,0.3,0.5
												s0.4,0.4,0.4,0.7c-0.1,0.3-0.4,0.5-0.8,0.4c-0.1,0-0.2-0.1-0.3-0.1s-0.1-0.1-0.2-0.1c0-0.1,0-0.3,0-0.5h0.1c0,0.2,0.1,0.6,0.4,0.6
												c0.2,0,0.4-0.1,0.4-0.2c0-0.2-0.1-0.3-0.3-0.5s-0.4-0.4-0.4-0.7c0.1-0.3,0.4-0.5,0.8-0.4c0.2,0,0.3,0.1,0.4,0.2
												C77.4,11.1,77.4,11.2,77.3,11.4L77.3,11.4L77.3,11.4z"/>
											<path id="Shape_30_" class="responder2" d="M78.8,13c-0.1,0.1-0.2,0.4-0.3,0.4l-1.4-0.5v-0.1c0.3,0.1,0.3,0.1,0.4-0.2l0.4-1.1
												c0.1-0.3,0.1-0.3-0.1-0.4V11l1.3,0.5c0,0.1-0.1,0.3-0.1,0.4h-0.1c0-0.1,0-0.2,0-0.3c0-0.1-0.1-0.1-0.3-0.2l-0.2-0.1
												c-0.1,0-0.1,0-0.1,0.1L78.1,12l0.2,0.1c0.3,0.1,0.3,0.1,0.4-0.1h0.1l-0.3,0.7h-0.1c0-0.2,0-0.2-0.2-0.3L78,12.3l-0.2,0.5
												c0,0.1-0.1,0.2,0,0.3c0,0,0.1,0.1,0.3,0.1c0.2,0.1,0.3,0.1,0.4,0C78.5,13.1,78.6,13,78.8,13L78.8,13L78.8,13z"/>
											<path id="Shape_31_" class="responder2" d="M80.2,14.2L80.2,14.2c-0.4-0.2-0.5-0.3-0.5-0.5s0-0.4-0.1-0.5c0-0.1,0-0.2-0.2-0.2h-0.1
												l-0.2,0.4c-0.1,0.2-0.1,0.3,0.1,0.4v0.1l-0.8-0.4v-0.1c0.2,0.1,0.3,0.1,0.4-0.2l0.5-1.1c0.1-0.2,0.1-0.3-0.1-0.4v-0.1l0.7,0.3
												c0.2,0.1,0.4,0.2,0.4,0.3c0.1,0.1,0.1,0.3,0,0.5S80,13,79.7,13c0,0.1,0,0.3,0.1,0.5c0,0.2,0.1,0.3,0.1,0.4
												C80.2,14,80.2,14.1,80.2,14.2L80.2,14.2L80.2,14.2z M79.6,12.8c0.1,0.1,0.2,0.1,0.3,0.1s0.2-0.1,0.3-0.3c0.1-0.3,0-0.5-0.2-0.6
												c-0.1,0-0.1,0-0.1,0s0,0-0.1,0.1L79.6,12.8L79.6,12.8L79.6,12.8z"/>
											<path id="Shape_32_" class="responder2" d="M82.7,13.4c-0.2-0.1-0.2-0.1-0.5,0.1c-0.2,0.1-0.8,0.6-1.3,1.1l-0.1-0.1
												c0.1-0.6,0.2-1.3,0.3-1.7c0-0.2,0-0.3-0.1-0.4v-0.1l0.7,0.4v0.1c-0.2-0.1-0.2-0.1-0.2,0.1s-0.1,0.9-0.2,1.3l0,0
												c0.3-0.3,0.7-0.6,0.9-0.8c0.2-0.1,0.2-0.2,0-0.3V13L82.7,13.4L82.7,13.4L82.7,13.4z"/>
											<path id="Shape_33_" class="responder2" d="M83.4,15.6c-0.1,0.1-0.3,0.3-0.4,0.3L81.7,15l0.1-0.1c0.2,0.1,0.3,0.1,0.4-0.1l0.7-1
												c0.2-0.2,0.1-0.2,0-0.4l0.1-0.1l1.2,0.8c0,0.1-0.1,0.2-0.2,0.4h-0.1c0-0.1,0.1-0.2,0.1-0.3c0-0.1-0.1-0.1-0.2-0.3l-0.1-0.1
												c-0.1-0.1-0.1-0.1-0.2,0l-0.4,0.5l0.2,0.1c0.2,0.2,0.3,0.2,0.4,0l0.1,0.1L83.5,15l-0.1-0.1c0.1-0.2,0.1-0.2-0.1-0.4l-0.2-0.1
												l-0.3,0.4c-0.1,0.1-0.1,0.2-0.1,0.2c0,0.1,0.1,0.1,0.2,0.2c0.2,0.1,0.2,0.1,0.3,0.1C83.1,15.6,83.2,15.6,83.4,15.6L83.4,15.6
												L83.4,15.6z"/>
											<path id="Shape_34_" class="responder2" d="M72.3,16.2c-0.6,0-1.1,0.5-1.1,1.1h-2.4v0.2c0,0.2-0.2,0.3-0.3,0.3c-0.2,0-0.3-0.2-0.3-0.3V17
												H68v0.4c0,0.3,0.2,0.5,0.5,0.5s0.5-0.2,0.5-0.5h2.5v-0.2c0-0.5,0.4-0.8,0.8-0.8"/>
											<path id="Shape_35_" class="responder2" d="M67.1,21.5c0.1,0.2,0.2,0.3,0.2,0.5c0,0.5,0.5,0.9,1.2,0.9s1.2-0.4,1.2-0.9
												c0-0.2,0.1-0.4,0.2-0.5H67.1L67.1,21.5z"/>
											<path id="Shape_36_" class="responder2" d="M68.5,17.6c0.1,0,0.1,0.2,0.1,0.4c0,0.3-0.1,0.4-0.1,0.4c-0.1,0-0.1-0.2-0.1-0.4
												C68.3,17.7,68.4,17.6,68.5,17.6L68.5,17.6z M68.4,18c0,0.1,0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2s0-0.2-0.1-0.2S68.4,17.9,68.4,18
												L68.4,18z"/>
											<path id="Shape_37_" class="responder2" d="M68.5,18.1c0.1,0,0.1,0.1,0.1,0.3s-0.1,0.3-0.1,0.3c-0.1,0-0.1-0.1-0.1-0.3
												S68.4,18.1,68.5,18.1L68.5,18.1z M68.4,18.5c0,0.1,0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2s0-0.2-0.1-0.2S68.4,18.4,68.4,18.5L68.4,18.5
												z"/>
											<path id="Shape_38_" class="responder2" d="M68.5,18.5c0.1,0,0.1,0.1,0.1,0.3c0,0.2-0.1,0.3-0.1,0.3c-0.1,0-0.1-0.1-0.1-0.3
												C68.3,18.6,68.4,18.5,68.5,18.5L68.5,18.5z M68.4,18.8c0,0.1,0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2s0-0.2-0.1-0.2
												C68.4,18.6,68.4,18.7,68.4,18.8L68.4,18.8z"/>
											<path id="Shape_39_" class="responder2" d="M68.5,18.8c0.1,0,0.1,0.1,0.1,0.3c0,0.2-0.1,0.3-0.1,0.3c-0.1,0-0.1-0.1-0.1-0.3
												C68.3,18.9,68.4,18.8,68.5,18.8L68.5,18.8z M68.4,19.1c0,0.1,0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2s0-0.2-0.1-0.2
												C68.4,19,68.4,19,68.4,19.1L68.4,19.1z"/>
											<path id="Shape_40_" class="responder2" d="M68.5,19.2c0.1,0,0.1,0.1,0.1,0.3c0,0.2-0.1,0.3-0.1,0.3c-0.1,0-0.1-0.1-0.1-0.3
												C68.3,19.3,68.4,19.2,68.5,19.2L68.5,19.2z M68.4,19.5c0,0.1,0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2s0-0.2-0.1-0.2S68.4,19.4,68.4,19.5
												L68.4,19.5z"/>
											<path id="Shape_41_" class="responder2" d="M68.5,19.5c0.1,0,0.1,0.1,0.1,0.3c0,0.2-0.1,0.3-0.1,0.3c-0.1,0-0.1-0.1-0.1-0.3
												C68.3,19.6,68.4,19.5,68.5,19.5L68.5,19.5z M68.4,19.8c0,0.1,0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2s0-0.2-0.1-0.2
												C68.4,19.6,68.4,19.7,68.4,19.8L68.4,19.8z"/>
											<path id="Shape_42_" class="responder2" d="M68.5,19.8c0.1,0,0.1,0.1,0.1,0.3c0,0.2-0.1,0.3-0.1,0.3c-0.1,0-0.1-0.1-0.1-0.3
												C68.3,20,68.4,19.8,68.5,19.8L68.5,19.8z M68.4,20.1c0,0.1,0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2s0-0.2-0.1-0.2
												C68.4,20,68.4,20,68.4,20.1L68.4,20.1z"/>
											<path id="Shape_43_" class="responder2" d="M68.5,20.2c0.1,0,0.1,0.1,0.1,0.3c0,0.2-0.1,0.3-0.1,0.3c-0.1,0-0.1-0.1-0.1-0.3
												C68.3,20.3,68.4,20.2,68.5,20.2L68.5,20.2z M68.4,20.5c0,0.1,0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2s0-0.2-0.1-0.2S68.4,20.4,68.4,20.5
												L68.4,20.5z"/>
											<path id="Shape_44_" class="responder2" d="M68.5,20.5c0.1,0,0.1,0.1,0.1,0.3s-0.1,0.3-0.1,0.3c-0.1,0-0.1-0.1-0.1-0.3
												S68.4,20.5,68.5,20.5L68.5,20.5z M68.4,20.8c0,0.1,0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2s0-0.2-0.1-0.2C68.4,20.6,68.4,20.7,68.4,20.8
												L68.4,20.8z"/>
											<path id="Shape_45_" class="responder2" d="M68.5,20.9c0.1,0,0.1,0.1,0.1,0.3c0,0.2-0.1,0.3-0.1,0.3c-0.1,0-0.1-0.1-0.1-0.3
												C68.3,21,68.4,20.9,68.5,20.9L68.5,20.9z M68.4,21.2c0,0.1,0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2s0-0.2-0.1-0.2S68.4,21.1,68.4,21.2
												L68.4,21.2z"/>
											<path id="Shape_46_" class="responder2" d="M68.5,18.1c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C68.4,18.3,68.4,18.2,68.5,18.1L68.5,18.1z M68.5,18.5c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C68.5,18.3,68.5,18.4,68.5,18.5L68.5,18.5z"/>
											<path id="Shape_47_" class="responder2" d="M68.6,18.5c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C68.5,18.7,68.5,18.5,68.6,18.5L68.6,18.5z M68.7,18.8c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C68.6,18.6,68.6,18.7,68.7,18.8L68.7,18.8z"/>
											<path id="Shape_48_" class="responder2" d="M68.7,18.8c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												S68.7,18.9,68.7,18.8L68.7,18.8z M68.8,19.2c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1C68.7,19,68.7,19.1,68.8,19.2
												L68.8,19.2z"/>
											<path id="Shape_49_" class="responder2" d="M68.9,19.2c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C68.8,19.3,68.8,19.2,68.9,19.2L68.9,19.2z M68.9,19.5c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C68.9,19.3,68.9,19.4,68.9,19.5L68.9,19.5z"/>
											<path id="Shape_50_" class="responder2" d="M69,19.5c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C68.9,19.7,68.9,19.5,69,19.5L69,19.5z M69,19.8c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2S69,19.5,69,19.6C69,19.6,69,19.7,69,19.8
												L69,19.8z"/>
											<path id="Shape_51_" class="responder2" d="M69.1,19.8c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C69,20,69,19.9,69.1,19.8L69.1,19.8z M69.2,20.2c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C69.1,20,69.1,20.1,69.2,20.2L69.2,20.2z"/>
											<path id="Shape_52_" class="responder2" d="M69.2,20.2c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C69.2,20.3,69.2,20.2,69.2,20.2L69.2,20.2z M69.3,20.5c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C69.3,20.3,69.3,20.4,69.3,20.5L69.3,20.5z"/>
											<path id="Shape_53_" class="responder2" d="M69.4,20.5c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C69.3,20.7,69.3,20.5,69.4,20.5L69.4,20.5z M69.4,20.8c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C69.4,20.7,69.4,20.7,69.4,20.8L69.4,20.8z"/>
											<path id="Shape_54_" class="responder2" d="M69.5,20.9c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C69.4,21,69.4,20.9,69.5,20.9L69.5,20.9z M69.5,21.2c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C69.5,21,69.5,21.1,69.5,21.2L69.5,21.2z"/>
											<path id="Shape_55_" class="responder2" d="M68.5,18.5c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C68.5,18.2,68.6,18.3,68.5,18.5L68.5,18.5z M68.4,18.3l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C68.5,18.4,68.5,18.3,68.4,18.3
												L68.4,18.3z"/>
											<path id="Shape_56_" class="responder2" d="M68.4,18.8c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C68.4,18.5,68.4,18.7,68.4,18.8L68.4,18.8z M68.3,18.6l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C68.3,18.7,68.3,18.6,68.3,18.6
												L68.3,18.6z"/>
											<path id="Shape_57_" class="responder2" d="M68.2,19.2c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C68.3,18.9,68.3,19,68.2,19.2L68.2,19.2z M68.2,19l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C68.2,19.1,68.2,19,68.2,19L68.2,19z"/>
											<path id="Shape_58_" class="responder2" d="M68.1,19.5c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C68.2,19.2,68.2,19.3,68.1,19.5L68.1,19.5z M68,19.3l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C68.1,19.4,68.1,19.3,68,19.3L68,19.3z"/>
											<path id="Shape_59_" class="responder2" d="M68,19.9c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												S68,19.7,68,19.9L68,19.9z M67.9,19.6l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C68,19.7,68,19.6,67.9,19.6L67.9,19.6z"/>
											<path id="Shape_60_" class="responder2" d="M67.8,20.2c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C67.9,19.9,67.9,20,67.8,20.2L67.8,20.2z M67.8,20l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C67.8,20.1,67.8,20,67.8,20L67.8,20z"/>
											<path id="Shape_61_" class="responder2" d="M67.7,20.5c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C67.8,20.2,67.8,20.3,67.7,20.5L67.7,20.5z M67.7,20.3l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C67.7,20.4,67.7,20.3,67.7,20.3
												L67.7,20.3z"/>
											<path id="Shape_62_" class="responder2" d="M67.6,20.9c-0.1,0.2-0.2,0.3-0.2,0.3s-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												S67.7,20.7,67.6,20.9L67.6,20.9z M67.5,20.6l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C67.6,20.7,67.6,20.7,67.5,20.6L67.5,20.6z"/>
											<path id="Shape_63_" class="responder2" d="M67.5,21.2c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C67.5,20.9,67.5,21,67.5,21.2L67.5,21.2z M67.4,21l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C67.4,21.1,67.4,21,67.4,21L67.4,21z"/>
											<path id="Shape_64_" class="responder2" d="M72.3,16.2c0.6,0,1.1,0.5,1.1,1.1h2.4v0.2c0,0.2,0.2,0.3,0.3,0.3c0.2,0,0.3-0.2,0.3-0.3V17h0.2
												v0.4c0,0.3-0.2,0.5-0.5,0.5s-0.5-0.2-0.5-0.5h-2.5v-0.2c0-0.5-0.4-0.8-0.8-0.8"/>
											<path id="Shape_65_" class="responder2" d="M77.6,21.5c-0.1,0.2-0.2,0.3-0.2,0.5c0,0.5-0.5,0.9-1.2,0.9S75,22.5,75,22
												c0-0.2-0.1-0.4-0.2-0.5H77.6L77.6,21.5z"/>
											<path id="Shape_66_" class="responder2" d="M76.3,18c0,0.3-0.1,0.4-0.1,0.4S76,18.3,76,18s0.1-0.4,0.1-0.4S76.3,17.7,76.3,18L76.3,18z
												 M76.2,17.8c0,0-0.1,0.1-0.1,0.2s0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2C76.2,17.9,76.2,17.8,76.2,17.8L76.2,17.8z"/>
											<path id="Shape_67_" class="responder2" d="M76.3,18.5c0,0.2-0.1,0.3-0.1,0.3S76,18.6,76,18.5s0.1-0.3,0.1-0.3S76.3,18.3,76.3,18.5
												L76.3,18.5z M76.2,18.3c0,0-0.1,0.1-0.1,0.2s0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2S76.2,18.3,76.2,18.3L76.2,18.3z"/>
											<path id="Shape_68_" class="responder2" d="M76.3,18.8c0,0.2-0.1,0.3-0.1,0.3S76,19,76,18.8s0.1-0.3,0.1-0.3S76.3,18.6,76.3,18.8
												L76.3,18.8z M76.2,18.6c0,0-0.1,0.1-0.1,0.2s0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2C76.2,18.7,76.2,18.6,76.2,18.6L76.2,18.6z"/>
											<path id="Shape_69_" class="responder2" d="M76.3,19.1c0,0.2-0.1,0.3-0.1,0.3S76,19.3,76,19.1c0-0.2,0.1-0.3,0.1-0.3S76.3,18.9,76.3,19.1
												L76.3,19.1z M76.2,19c0,0-0.1,0.1-0.1,0.2s0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2S76.2,19,76.2,19L76.2,19z"/>
											<path id="Shape_70_" class="responder2" d="M76.3,19.5c0,0.2-0.1,0.3-0.1,0.3S76,19.7,76,19.5s0.1-0.3,0.1-0.3S76.3,19.3,76.3,19.5
												L76.3,19.5z M76.2,19.3c0,0-0.1,0.1-0.1,0.2s0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2C76.2,19.4,76.2,19.3,76.2,19.3L76.2,19.3z"/>
											<path id="Shape_71_" class="responder2" d="M76.3,19.8c0,0.2-0.1,0.3-0.1,0.3S76,20,76,19.8s0.1-0.3,0.1-0.3S76.3,19.6,76.3,19.8
												L76.3,19.8z M76.2,19.6c0,0-0.1,0.1-0.1,0.2s0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2C76.2,19.7,76.2,19.6,76.2,19.6L76.2,19.6z"/>
											<path id="Shape_72_" class="responder2" d="M76.3,20.1c0,0.2-0.1,0.3-0.1,0.3S76,20.3,76,20.1c0-0.2,0.1-0.3,0.1-0.3S76.3,20,76.3,20.1
												L76.3,20.1z M76.2,20c0,0-0.1,0.1-0.1,0.2s0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2C76.2,20,76.2,20,76.2,20L76.2,20z"/>
											<path id="Shape_73_" class="responder2" d="M76.3,20.5c0,0.2-0.1,0.3-0.1,0.3S76,20.7,76,20.5s0.1-0.3,0.1-0.3S76.3,20.3,76.3,20.5
												L76.3,20.5z M76.2,20.3c0,0-0.1,0.1-0.1,0.2s0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2C76.2,20.4,76.2,20.3,76.2,20.3L76.2,20.3z"/>
											<path id="Shape_74_" class="responder2" d="M76.3,20.8c0,0.2-0.1,0.3-0.1,0.3S76,21,76,20.8s0.1-0.3,0.1-0.3S76.3,20.6,76.3,20.8
												L76.3,20.8z M76.2,20.6c0,0-0.1,0.1-0.1,0.2s0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2C76.2,20.7,76.2,20.6,76.2,20.6L76.2,20.6z"/>
											<path id="Shape_75_" class="responder2" d="M76.3,21.2c0,0.2-0.1,0.3-0.1,0.3S76,21.3,76,21.2c0-0.2,0.1-0.3,0.1-0.3S76.3,21,76.3,21.2
												L76.3,21.2z M76.2,21c0,0-0.1,0.1-0.1,0.2s0,0.2,0.1,0.2c0,0,0.1-0.1,0.1-0.2C76.2,21.1,76.2,21,76.2,21L76.2,21z"/>
											<path id="Shape_76_" class="responder2" d="M76.2,18.5c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C76.2,18.2,76.3,18.3,76.2,18.5L76.2,18.5z M76.1,18.3L76,18.4c0,0.1,0,0.2,0,0.2l0.1-0.1C76.2,18.4,76.2,18.3,76.1,18.3L76.1,18.3
												z"/>
											<path id="Shape_77_" class="responder2" d="M76.1,18.8c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C76.1,18.5,76.1,18.7,76.1,18.8L76.1,18.8z M76,18.6l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C76,18.7,76,18.6,76,18.6L76,18.6z"/>
											<path id="Shape_78_" class="responder2" d="M75.9,19.2c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C76,18.9,76,19,75.9,19.2L75.9,19.2z M75.9,19l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C75.9,19.1,75.9,19,75.9,19L75.9,19z"/>
											<path id="Shape_79_" class="responder2" d="M75.8,19.5c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C75.9,19.2,75.9,19.3,75.8,19.5L75.8,19.5z M75.7,19.3l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C75.8,19.4,75.8,19.3,75.7,19.3
												L75.7,19.3z"/>
											<path id="Shape_80_" class="responder2" d="M75.7,19.9c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												S75.7,19.7,75.7,19.9L75.7,19.9z M75.6,19.6l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C75.6,19.7,75.6,19.6,75.6,19.6L75.6,19.6z"/>
											<path id="Shape_81_" class="responder2" d="M75.5,20.2c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C75.6,19.9,75.6,20,75.5,20.2L75.5,20.2z M75.5,20l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C75.5,20.1,75.5,20,75.5,20L75.5,20z"/>
											<path id="Shape_82_" class="responder2" d="M75.4,20.5c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C75.5,20.2,75.5,20.3,75.4,20.5L75.4,20.5z M75.4,20.3l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C75.4,20.4,75.4,20.3,75.4,20.3
												L75.4,20.3z"/>
											<path id="Shape_83_" class="responder2" d="M75.3,20.9c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												S75.4,20.7,75.3,20.9L75.3,20.9z M75.2,20.6l-0.1,0.1c0,0.1,0,0.2,0,0.2l0.1-0.1C75.3,20.7,75.3,20.7,75.2,20.6L75.2,20.6z"/>
											<path id="Shape_84_" class="responder2" d="M75.2,21.2c-0.1,0.2-0.2,0.3-0.2,0.3c-0.1,0-0.1-0.2,0-0.4c0.1-0.2,0.2-0.3,0.2-0.3
												C75.2,20.9,75.2,21,75.2,21.2L75.2,21.2z M75.1,21L75,21.1c0,0.1,0,0.2,0,0.2l0.1-0.1C75.1,21.1,75.1,21,75.1,21L75.1,21z"/>
											<path id="Shape_85_" class="responder2" d="M76.2,18.1c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C76.1,18.3,76.1,18.2,76.2,18.1L76.2,18.1z M76.2,18.5c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C76.2,18.3,76.2,18.4,76.2,18.5L76.2,18.5z"/>
											<path id="Shape_86_" class="responder2" d="M76.3,18.5c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C76.2,18.7,76.2,18.5,76.3,18.5L76.3,18.5z M76.4,18.8c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C76.3,18.6,76.3,18.7,76.4,18.8L76.4,18.8z"/>
											<path id="Shape_87_" class="responder2" d="M76.4,18.8c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												S76.4,18.9,76.4,18.8L76.4,18.8z M76.5,19.2c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1C76.4,19,76.4,19.1,76.5,19.2
												L76.5,19.2z"/>
											<path id="Shape_88_" class="responder2" d="M76.6,19.2c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4s-0.2-0.1-0.2-0.3
												C76.5,19.3,76.5,19.2,76.6,19.2L76.6,19.2z M76.6,19.5c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												S76.6,19.4,76.6,19.5L76.6,19.5z"/>
											<path id="Shape_89_" class="responder2" d="M76.7,19.5c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C76.6,19.7,76.6,19.5,76.7,19.5L76.7,19.5z M76.7,19.8c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C76.7,19.6,76.7,19.7,76.7,19.8L76.7,19.8z"/>
											<path id="Shape_90_" class="responder2" d="M76.8,19.8c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4s-0.2-0.1-0.2-0.3
												C76.7,20,76.7,19.9,76.8,19.8L76.8,19.8z M76.9,20.2c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C76.8,20,76.8,20.1,76.9,20.2L76.9,20.2z"/>
											<path id="Shape_91_" class="responder2" d="M76.9,20.2c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C76.9,20.3,76.9,20.2,76.9,20.2L76.9,20.2z M77,20.5c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2S77,20.2,77,20.3
												C77,20.3,77,20.4,77,20.5L77,20.5z"/>
											<path id="Shape_92_" class="responder2" d="M77.1,20.5c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C77,20.7,77,20.5,77.1,20.5L77.1,20.5z M77.1,20.8c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C77.1,20.7,77.1,20.7,77.1,20.8L77.1,20.8z"/>
											<path id="Shape_93_" class="responder2" d="M77.2,20.9c0.1,0,0.2,0.1,0.2,0.3c0.1,0.2,0.1,0.3,0,0.4c-0.1,0-0.2-0.1-0.2-0.3
												C77.1,21,77.1,20.9,77.2,20.9L77.2,20.9z M77.2,21.2c0,0.1,0.1,0.2,0.1,0.1c0,0,0-0.1,0-0.2s-0.1-0.2-0.1-0.1
												C77.2,21,77.2,21.1,77.2,21.2L77.2,21.2z"/>
											<ellipse id="Oval_3_" class="responder2" cx="72.3" cy="14.9" rx="0.4" ry="0.4"/>
											<rect id="Rectangle-path_1_" x="72.1" y="15.3" class="responder2" width="0.5" height="8.9"/>
											<path id="Shape_94_" class="responder2" d="M70.7,28c-0.1,0-0.1,0.1-0.1,0.2l0.2,0.5c0,0.1,0.1,0.1,0.2,0.1l0,0l-0.4,0.1l0,0
												c0.1-0.1,0.1-0.1,0.1-0.2l-0.1-0.2l-0.4,0.2l0.1,0.2c0,0.1,0.1,0.1,0.2,0.1l0,0l-0.4,0.1l0,0c0.1,0,0.1-0.1,0.1-0.2L70,28.4
												c0-0.1-0.1-0.1-0.2-0.1l0,0l0.4-0.1l0,0c-0.1,0-0.1,0.1-0.1,0.2l0.1,0.2l0.4-0.2l-0.1-0.2c0-0.1-0.1-0.1-0.2-0.1l0,0L70.7,28
												L70.7,28L70.7,28z"/>
											<path id="Shape_95_" class="responder2" d="M71.8,28.2c0,0.3-0.2,0.5-0.5,0.5s-0.6-0.1-0.6-0.4c0-0.2,0.1-0.5,0.5-0.5
												C71.5,27.8,71.8,27.9,71.8,28.2L71.8,28.2z M71,28.3c0,0.2,0.2,0.4,0.4,0.4s0.3-0.2,0.2-0.4c0-0.3-0.2-0.4-0.4-0.4
												C71.1,27.9,71,28,71,28.3L71,28.3z"/>
											<path id="Shape_96_" class="responder2" d="M72.9,27.8c-0.1,0-0.1,0-0.1,0.1c0,0,0,0.1,0,0.2v0.5h-0.1L72,27.9l0,0v0.3c0,0.1,0,0.2,0,0.2
												c0,0.1,0,0.1,0.2,0.1l0,0h-0.4l0,0c0.1,0,0.1,0,0.1-0.1c0,0,0-0.1,0-0.2v-0.3c0-0.1,0-0.1,0-0.1s-0.1,0-0.1-0.1l0,0h0.3l0.6,0.6
												l0,0V28c0-0.1,0-0.2,0-0.2c0-0.1,0-0.1-0.2-0.1l0,0L72.9,27.8L72.9,27.8L72.9,27.8z"/>
											<path id="Shape_97_" class="responder2" d="M73.9,28.4c0,0.3-0.3,0.4-0.6,0.4c-0.3-0.1-0.5-0.3-0.4-0.5c0-0.2,0.3-0.4,0.6-0.4
												S74,28.1,73.9,28.4L73.9,28.4z M73.1,28.2c0,0.2,0.1,0.4,0.3,0.5c0.2,0,0.3-0.1,0.4-0.3c0-0.3-0.1-0.4-0.3-0.5
												C73.3,27.9,73.1,28,73.1,28.2L73.1,28.2z"/>
											<path id="Shape_98_" class="responder2" d="M74.7,29.1L74.7,29.1c-0.2-0.1-0.3-0.1-0.3-0.2s0-0.2-0.1-0.2c0,0,0-0.1-0.1-0.1l0,0l-0.1,0.2
												c0,0.1,0,0.1,0.1,0.2l0,0l-0.4-0.1l0,0c0.1,0,0.1,0,0.2-0.1l0.2-0.5c0-0.1,0-0.1-0.1-0.2l0,0l0.4,0.1c0.1,0,0.2,0.1,0.2,0.1
												c0,0.1,0.1,0.1,0,0.2c0,0.1-0.1,0.1-0.3,0.1c0,0,0,0.2,0.1,0.2c0,0.1,0,0.1,0.1,0.2C74.6,29,74.7,29,74.7,29.1L74.7,29.1L74.7,29.1
												z M74.3,28.5c0.1,0,0.1,0,0.2,0c0.1,0,0.1-0.1,0.1-0.1c0-0.1,0-0.2-0.1-0.3h-0.1l0,0L74.3,28.5L74.3,28.5L74.3,28.5z"/>
											<path id="Shape_99_" class="responder2" d="M72.3,27c-1.6-1-2.6-1.3-4.4-0.7c-1.1,0.3-1.5,0.4-2.1,0.4c-0.6-0.7-1-1.6-1.3-2.5
												c1.4,0.2,1.5,0.2,3.4-0.3c1.8-0.5,2.9-0.3,4.5,0.6c1.6-0.9,2.7-1.1,4.5-0.6s2,0.5,3.4,0.3c-0.3,0.9-0.8,1.7-1.3,2.5
												c-0.6,0-0.9-0.1-2.1-0.4C74.9,25.8,73.9,26,72.3,27L72.3,27z"/>
										</g>
										<g>
											<path id="Shape_6_" class="st7" d="M23.9,30.1c-3,2.7-6.1,5.2-9.2,7.8c-0.8-2.3-1.6-4.5-2.6-6.6c-1-2.1-2.2-4-2.5-6.7v-1.1
												c0.4-2.6,1.8-4.3,2.7-6.3s1.6-4.2,2.4-6.6c3.1,2.5,6.2,5.1,9.2,7.7l0.9-0.8c-2.7-3-5.2-6.1-7.8-9.2c2.3-0.9,4.5-1.5,6.6-2.5
												c2-1,4.2-2.3,6.7-2.5h1.1C34,3.6,35.6,5.1,37.6,6c2.1,1,4.3,1.5,6.6,2.3c-2.5,3.1-5.2,6.2-7.7,9.2l0.8,0.8c3-2.6,6.1-5.2,9.2-7.7
												c0.8,2.3,1.4,4.5,2.4,6.6c1,2,2.3,3.7,2.7,6.2v1c-0.2,2.7-1.5,4.7-2.5,6.7c-1,2.1-1.7,4.3-2.6,6.6c-3.1-2.5-6.2-5.1-9.2-7.8
												l-0.8,0.9c2.6,3,5.2,6.1,7.8,9.2c-2.3,0.8-4.5,1.3-6.6,2.3c-2,1-3.7,2.4-6.2,2.7h-1.2c-2.7-0.2-4.6-1.5-6.7-2.5s-4.3-1.7-6.6-2.6
												c2.6-3.1,5.1-6.2,7.8-9.2L23.9,30.1L23.9,30.1z M35.2,7.5c-1.2-0.6-3.1-2.1-4.9-1.8c-1.9,0.2-3.3,1-4.8,1.8
												c-1.4,0.7-2.8,1.4-4.5,1.8c1.4,1.7,2.9,3.3,4.3,5c1.4-0.6,3.2-1.3,5.2-1.3s3.9,0.6,5.3,1.2c1.4-1.5,2.7-3.1,4-4.7
												C38.2,9,36.8,8.3,35.2,7.5L35.2,7.5z M13.9,19.3c-0.7,1.3-1.8,2.7-1.9,4.4c-0.2,2.4,1,4,1.8,5.6c0.7,1.4,1.4,2.8,1.8,4.5
												c0.5-0.2,0.8-0.7,1.2-1c1.3-1.1,2.5-2.2,3.7-3.3c-0.4-1.3-1.1-3-1.2-4.8c-0.1-2.2,0.6-4.3,1.3-5.8c-1.5-1.4-3.1-2.7-4.7-4
												C15.5,16.4,14.7,17.8,13.9,19.3L13.9,19.3z M40.6,18.9c0.7,1.6,1.4,3.7,1.2,6c-0.1,1.7-0.8,3.3-1.3,4.6c1.6,1.4,3.2,2.9,4.9,4.3
												c0.5-1.7,1.2-3.2,2-4.7c0.7-1.4,1.7-3,1.7-4.9c0-1-0.3-1.8-0.7-2.6c-1.1-2.3-2.4-4.2-3.2-6.7l0,0C43.7,16.2,42.1,17.5,40.6,18.9
												L40.6,18.9z M29.1,19c-0.9,0.3-1.9,0.8-3.1,0.5c-0.5,1.2,0.1,2.5,1.1,2.8c0.4-0.5,0.7-1,1.3-1.2c0.2,0.1,0.3,0.4,0.4,0.6
												c0.2,0,0.2-0.3,0.4-0.2c0.3,0.1,0.5,0.5,0.8,0.4c0-0.5-0.4-1-0.5-1.4c0-0.1,0.2,0,0.2-0.2C29.5,19.8,29.3,19.4,29.1,19L29.1,19z
												 M32.1,19c-0.2,0.4-0.4,0.9-0.6,1.4c0,0.1,0.2,0.1,0.2,0.2c-0.2,0.4-0.4,0.9-0.5,1.4c0.3,0.2,0.5,0.4,0.8,0.6
												c0.2-0.6,0.5-1.1,0.9-1.5c0.6,0.3,0.9,0.8,1.3,1.2c0.9-0.3,1.5-1.6,1-2.7C34,19.8,33,19.3,32.1,19L32.1,19z M28,23.1
												c0.1-0.1,0.3-0.2,0.3-0.4c0.1,0.1,0.2,0.3,0.2,0.2s-0.1-0.1-0.1-0.3c0.5-0.3,1.1-0.2,1.4,0.2c-0.1,0.1-0.2,0.1-0.2,0.2
												c0.1,0,0.2-0.2,0.3-0.1c0.4,0.5,0.2,1-0.2,1.4c-0.1-0.1-0.1-0.2-0.2-0.2c0,0.2,0.2,0.2,0.2,0.3c-0.5,0.3-1,0.2-1.4-0.2
												c0-0.1,0.2-0.1,0.2-0.2c-0.1-0.1-0.2,0.1-0.3,0.1c0-0.2,0-0.3-0.2-0.4c0,0.2-0.2,0.3-0.2,0.4c0,0.1,0.1,0.2,0.1,0.3
												c-0.2,0.2-0.5,0.3-0.7,0.5c-0.2,1,1.3,1,2.2,1c1-0.1,2.1-0.7,3.1-0.7c1,0,1.6,0.4,2.5,0.6c0.2-0.4,0.2-0.8,0-1
												c-0.8-1-4.1-0.6-5.2-0.2c0.7-0.6,1.9-0.5,3.1-0.6c-0.5-1.1-1.3-2-2.6-2.3c-0.1,0.1-0.2,0.2-0.4,0.3c-0.3-0.1-0.5-0.3-0.7-0.5
												c-0.3,0.3-0.6,0.5-1,0.7C28.2,22.6,28,22.9,28,23.1L28,23.1z M31.2,25.7c-0.5,0.2-1,0.3-1.5,0.4c-0.7,0.7-1.1,1.7-2.2,2
												c0,0.6,0.4,1.4,0.8,1.4c0.2,0,0.4-0.6,0.5-0.8c0.5-0.8,1.4-1.6,1.8-2.2c0.3,0.6,0.8,1,1.1,1.5c0.4,0.5,0.6,1.1,1,1.6
												c0.5-0.2,0.8-0.7,0.8-1.4C32.3,27.8,32,26.6,31.2,25.7L31.2,25.7z M21.5,38.5c-0.2,0.2-0.4,0.4-0.4,0.6c1.6,0.5,3,1.2,4.5,1.9
												c1.4,0.7,2.9,1.7,4.7,1.8c2.2,0.1,3.6-1.1,5.1-1.9c1.4-0.8,2.8-1.4,4.5-2c-1.2-1.5-2.6-3.2-4-4.7c-1.4,0.6-3.3,1.2-5.3,1.2
												s-3.8-0.7-5.2-1.3h-0.1C24.1,35.6,22.7,37.1,21.5,38.5L21.5,38.5z"/>
											<path id="Shape_7_" class="responder2" d="M39.9,9.5c-1.3,1.6-2.6,3.2-4,4.7c-1.4-0.6-3.3-1.2-5.3-1.2s-3.8,0.7-5.2,1.3
												c-1.5-1.7-3-3.3-4.4-5c1.7-0.4,3.1-1.1,4.5-1.8c1.5-0.8,2.9-1.6,4.8-1.8c1.9-0.3,3.7,1.2,4.9,1.8C36.8,8.3,38.2,9,39.9,9.5
												L39.9,9.5z"/>
											<path id="Shape_8_" class="responder2" d="M15.9,14.9c1.5,1.4,3.2,2.6,4.7,4c-0.7,1.5-1.4,3.6-1.3,5.8c0.1,1.8,0.8,3.5,1.4,4.8
												c-1.2,1.1-2.5,2.2-3.7,3.3c-0.4,0.3-0.8,0.8-1.2,1c-0.5-1.7-1.1-3-1.8-4.5c-0.8-1.6-2-3.2-1.8-5.6c0.1-1.7,1.2-3.1,1.9-4.4
												C14.7,17.8,15.5,16.4,15.9,14.9L15.9,14.9z M17,18.5c-0.3,1-0.5,2.2-0.8,3.2c-0.4-1-0.6-2.3-1.3-3.1c0,0.2,0.1,0.4,0.1,0.6
												c-0.5,0-0.8,0.3-0.7,0.7c0.2,0,0.2-0.2,0.6-0.2c0.4,0,0.6,0.8,0.7,1.2c0.2,0.5,0.5,1,0.5,1.4c0,0.5-0.3,1.2-0.4,1.8
												c-0.4,1.8-0.9,3.9-1.2,5.5h1c0-0.2,0.1-0.5,0.2-0.7h0.8c-0.2,0.3-0.2,0.6-0.2,0.8h1c0.2-0.9,0.4-1.9,0.7-2.8c0.2,0.7,0.5,1.4,0.8,2
												c0.1,0.2,0.1,0.6,0.4,0.5c0-0.6-0.3-1.1-0.5-1.6c-0.2-0.4-0.6-1.2-0.6-1.6c0-0.2,0.2-0.6,0.2-0.9c0.5-2.3,1-4.6,1.5-6.8h-1
												c-0.1,0.2-0.1,0.5-0.2,0.6c-0.2,0-0.6,0.1-0.7,0c0-0.2,0.1-0.4,0.1-0.6C17.6,18.5,17.3,18.5,17,18.5L17,18.5z"/>
											<path id="Shape_9_" class="responder2" d="M45.3,14.9L45.3,14.9c0.8,2.5,2.1,4.5,3.2,6.7c0.4,0.8,0.7,1.6,0.7,2.6c0,1.9-1,3.5-1.7,4.9
												c-0.8,1.5-1.5,2.9-2,4.7c-1.7-1.4-3.3-2.9-4.9-4.3c0.5-1.3,1.2-2.9,1.3-4.6c0.1-2.3-0.5-4.4-1.2-6C42.1,17.5,43.7,16.2,45.3,14.9
												L45.3,14.9z M44.1,19.3c-0.9,0-1.2,0.7-1.2,1.6h-0.4v0.7c0.1,0,0.3-0.1,0.4,0v5.5h-0.3v0.6c-0.1,0-0.2-0.1-0.2,0.1
												c-0.1,0.5-0.2,1.2-0.2,1.7H47c0-0.5-0.1-1.2-0.2-1.8c0-0.1-0.2,0-0.2-0.1V27c-0.1,0-0.3,0-0.3,0v-5.4h0.3v-0.7
												c-0.1,0-0.3,0.1-0.3,0c-0.1-0.9-0.4-1.5-1.3-1.6v-0.4h-0.7C44.1,19,44.1,19.1,44.1,19.3L44.1,19.3z"/>
											<path id="Shape_10_" class="st7" d="M18,18.5c0,0.2-0.1,0.4-0.1,0.6c0.2,0.1,0.5,0,0.7,0c0.1-0.2,0.1-0.4,0.2-0.6h1
												c-0.5,2.1-0.9,4.4-1.5,6.7c0,0.3-0.2,0.7-0.2,0.9c0,0.4,0.4,1.2,0.6,1.6c0.2,0.5,0.5,1,0.5,1.6c-0.4,0.1-0.4-0.3-0.4-0.5
												c-0.2-0.7-0.5-1.4-0.8-2c-0.3,0.9-0.4,1.9-0.7,2.8h-1c0-0.1,0-0.4,0.1-0.6h-0.8c-0.1,0.2-0.1,0.4-0.2,0.7h-1
												c0.3-1.6,0.8-3.7,1.2-5.5c0.1-0.6,0.4-1.3,0.4-1.8s-0.3-0.9-0.5-1.4c-0.2-0.4-0.3-1.2-0.7-1.2c-0.3,0-0.3,0.2-0.6,0.2
												c0-0.5,0.3-0.8,0.7-0.8c0-0.2-0.1-0.4-0.1-0.6c0.7,0.8,0.9,2,1.3,3.1c0.4-1,0.6-2.2,0.9-3.2H18L18,18.5z M17.2,18.9
												c-0.7,3.5-1.6,6.8-2.3,10.3h0.4c0.1-0.2,0.1-0.5,0.2-0.7h1c0-0.1,0.1-0.2,0.1-0.3c-0.3,0-0.8,0.1-1.1,0c0.1-0.3,0.1-0.7,0.2-0.9h1
												c0-0.1,0-0.2,0.1-0.3c-0.3,0-0.8,0.1-1.1,0c0.1-0.3,0.1-0.7,0.2-0.9c0.4-0.1,1.1,0.2,1.1-0.3c-0.3,0-0.8,0.1-1.1,0
												c0.1-0.3,0.1-0.7,0.2-0.9c0.4-0.1,1.1,0.2,1.1-0.3c-0.3,0-0.8,0.1-1.1,0c0.1-0.3,0.1-0.7,0.2-0.9c0.4-0.1,1.1,0.2,1.1-0.3
												c-0.3,0-0.8,0.1-1.1,0c0.1-0.3,0.1-0.7,0.2-0.9c0.8-0.3,1.5,0,1.5-0.5c-0.3,0-0.8,0.1-1.1,0c0.1-0.3,0.1-0.7,0.2-0.9
												c0.3,0,0.8,0,1.1,0c0-0.1,0.1-0.2,0-0.3c-0.3,0-0.8,0.1-1.1,0c0.2-0.4,0.2-0.8,0.4-1c0.3,0,0.8,0,1.1,0c0-0.1,0.1-0.2,0-0.3
												c-0.4,0-0.8,0-1.1,0c0-0.2,0.1-0.4,0.1-0.6C17.5,18.9,17.3,18.9,17.2,18.9L17.2,18.9z M16.6,29.2H17c0.8-3.4,1.5-6.9,2.4-10.3H19
												C18.1,22.3,17.4,25.8,16.6,29.2L16.6,29.2z"/>
											<path id="Shape_11_" class="st7" d="M44.1,18.9h0.7v0.4c0.9,0,1.2,0.7,1.3,1.6c0,0.1,0.2,0,0.3,0v0.7h-0.3v5.5c0,0.1,0.2,0,0.3,0
												v0.6c0,0.1,0.2,0,0.2,0.1c0.1,0.5,0.2,1.3,0.2,1.8H42c0-0.5,0.1-1.2,0.2-1.7c0-0.1,0.1-0.1,0.2-0.1v-0.6h0.3v-5.6
												c0-0.1-0.3,0-0.4,0v-0.7h0.4c0.1-0.9,0.3-1.6,1.2-1.6C44.1,19.1,44.1,19,44.1,18.9L44.1,18.9z M43.7,21.6v1.6
												c-0.3,0.4-0.5,0.7-0.4,1.2c0,0.6,0.4,0.8,0.4,1.2c0.1,0.5-0.1,1,0,1.6h0.4v-1.4c0.2,0.1,0.6,0,0.7,0v1.3h0.5v-1.6
												c0.4-0.4,0.5-1.2,0.3-1.8c-0.1-0.2-0.3-0.4-0.3-0.6c-0.1-0.5,0.1-1,0-1.6h-0.4v1.3c-0.2-0.1-0.6,0-0.7,0v-1.2
												C44,21.6,43.8,21.6,43.7,21.6L43.7,21.6z"/>
											<path id="Shape_12_" class="responder2" d="M17.6,18.9c0,0.2-0.1,0.4-0.1,0.6c0.3,0,0.7,0,1.1,0c0,0.1-0.1,0.1,0,0.3c-0.3,0.1-0.7,0-1.1,0
												c-0.2,0.2-0.2,0.6-0.3,0.9c0.3,0.1,0.7,0,1.1,0c0,0.1-0.1,0.1,0,0.3c-0.3,0.1-0.7,0-1.1,0c-0.1,0.2-0.2,0.6-0.2,0.9
												c0.3,0.1,0.7,0,1.1,0c0,0.5-0.7,0.2-1.1,0.3c-0.1,0.2-0.2,0.6-0.2,0.9c0.3,0.1,0.7,0,1.1,0c0,0.5-0.7,0.2-1.1,0.3
												c-0.1,0.2-0.2,0.6-0.2,0.9c0.3,0.1,0.7,0,1.1,0c0,0.5-0.7,0.2-1.1,0.3c-0.1,0.2-0.2,0.6-0.2,0.9c0.3,0.1,0.7,0,1.1,0
												c0,0.5-0.7,0.2-1.1,0.3c-0.1,0.3-0.2,0.6-0.2,0.9c0.3,0.1,0.7,0,1.1,0c-0.1,0.1,0,0.2-0.1,0.3h-1c-0.1,0.2-0.2,0.6-0.2,0.9
												c0.3,0.1,0.7,0,1.1,0c0,0.1-0.1,0.2-0.1,0.3h-1c-0.1,0.2-0.1,0.5-0.2,0.7h-0.4c0.7-3.5,1.6-6.8,2.3-10.3
												C17.3,18.9,17.5,18.9,17.6,18.9L17.6,18.9z"/>
											<path id="Shape_13_" class="responder2" d="M19,18.9h0.4c-0.8,3.4-1.5,6.9-2.4,10.3h-0.4C17.4,25.8,18.1,22.3,19,18.9L19,18.9z"/>
											<path id="Shape_14_" class="responder2" d="M44.1,21.6v1.2c0.1,0,0.5-0.1,0.7,0v-1.2h0.5c0.1,0.5-0.1,1,0,1.6c0,0.2,0.3,0.3,0.3,0.5
												c0.2,0.6,0,1.4-0.3,1.8v1.7h-0.4v-1.3c-0.1-0.1-0.5,0.1-0.7,0v1.4h-0.4c-0.1-0.6,0.1-1.1,0-1.6c-0.1-0.4-0.4-0.6-0.4-1.2
												c0-0.5,0.1-0.8,0.4-1.2v-1.7C43.8,21.6,44,21.6,44.1,21.6L44.1,21.6z M44.5,25.3c0.9,0,0.9-2.1-0.2-1.8
												C43.5,23.6,43.6,25.3,44.5,25.3L44.5,25.3z"/>
											<path id="Shape_15_" class="st7" d="M44.3,23.4c1.1-0.3,1.1,1.8,0.2,1.8C43.6,25.3,43.5,23.6,44.3,23.4L44.3,23.4z"/>
											<path id="Shape_16_" class="responder2" d="M25.3,34.2L25.3,34.2c1.5,0.6,3.3,1.3,5.3,1.3s3.9-0.6,5.3-1.2c1.3,1.5,2.8,3.2,4,4.7
												c-1.6,0.5-3,1.2-4.5,2s-2.9,2-5.1,1.9c-1.8-0.1-3.2-1-4.7-1.8c-1.5-0.7-2.9-1.4-4.5-1.9c0-0.2,0.2-0.4,0.4-0.6
												C22.7,37.1,24.1,35.6,25.3,34.2L25.3,34.2z"/>
											<circle id="Oval_2_" class="responder2" cx="30.6" cy="24.2" r="7.6"/>
											<path id="Shape_17_" class="responder8" d="M29.7,20.3c0,0.2-0.2,0.1-0.2,0.2c0.2,0.4,0.5,0.9,0.5,1.4c-0.3,0-0.5-0.4-0.8-0.4
												c-0.2,0-0.2,0.2-0.4,0.2c-0.1-0.2-0.2-0.5-0.4-0.6c-0.6,0.2-1,0.7-1.3,1.2c-1-0.3-1.6-1.6-1.1-2.8c1.2,0.2,2.2-0.2,3.1-0.6
												C29.3,19.4,29.5,19.8,29.7,20.3L29.7,20.3z"/>
											<path id="Shape_18_" class="responder8" d="M35.3,19.5c0.5,1.2-0.1,2.4-1,2.7c-0.4-0.4-0.7-0.9-1.3-1.2c-0.5,0.5-0.8,1-1,1.5
												c-0.3-0.2-0.5-0.4-0.8-0.6c0.1-0.4,0.3-0.9,0.6-1.4c0-0.1-0.2-0.1-0.2-0.2c0.1-0.5,0.3-0.9,0.6-1.4C33,19.3,34,19.8,35.3,19.5
												L35.3,19.5z"/>
											<path id="Shape_19_" class="responder8" d="M33.6,28.1c0,0.7-0.3,1.1-0.8,1.4c-0.4-0.5-0.7-1.1-1-1.6c-0.4-0.5-0.8-1-1.1-1.5
												c-0.5,0.6-1.3,1.4-1.8,2.2c-0.2,0.3-0.4,0.8-0.6,0.9c-0.4,0.1-0.8-0.7-0.8-1.3c1.1-0.3,1.6-1.3,2.2-2c0.5-0.1,1-0.2,1.5-0.4
												C32,26.6,32.3,27.8,33.6,28.1L33.6,28.1z"/>
											<path id="Shape_20_" class="responder8" d="M28.2,22.3c0.4-0.1,0.7-0.4,1-0.7c0.3,0.1,0.5,0.3,0.7,0.5c0.2,0,0.2-0.2,0.4-0.3
												c1.3,0.3,2.1,1.2,2.6,2.3c-1.2,0.1-2.4,0-3.1,0.6c1.1-0.4,4.4-0.8,5.2,0.2c0.2,0.2,0.2,0.7,0,1c-0.9-0.2-1.5-0.7-2.5-0.6
												c-1,0-2.1,0.6-3.1,0.7c-0.9,0.1-2.4,0.1-2.2-1c0.1-0.2,0.5-0.2,0.7-0.5c0-0.2-0.1-0.2-0.1-0.3c0-0.2,0.2-0.2,0.2-0.4
												c0.1,0.1,0.2,0.2,0.2,0.4c0.1,0,0.2-0.2,0.3-0.1c0,0.2-0.2,0.1-0.2,0.2c0.4,0.4,0.9,0.5,1.4,0.2c0-0.2-0.2-0.2-0.2-0.3
												c0.2,0,0.2,0.1,0.2,0.2c0.4-0.3,0.6-0.9,0.2-1.4c-0.1-0.1-0.2,0.1-0.3,0.1c0-0.2,0.1-0.2,0.2-0.2c-0.3-0.5-0.9-0.6-1.4-0.2
												c0,0.1,0.1,0.1,0.1,0.3c0,0.2-0.2-0.1-0.2-0.2C28.2,23,28.1,23,28,23.2C28,22.9,28.2,22.6,28.2,22.3L28.2,22.3z"/>
											<polygon id="Shape_101_" class="st7" points="26,9.4 25.2,9.7 25.1,9.8 25.3,10.2 25.3,10.2 25.7,10 26,9.8 26.4,10.8 26,10.8 
												25.6,10.9 25.6,11 25.9,11.9 26.2,12.2 25,12.7 24.9,12.3 24,9.7 23.7,9.4 25.9,8.5 26.6,9.3 	"/>
											<polygon id="Shape_102_" class="st7" points="27.9,11.7 27.9,11.3 27.5,8.6 27.3,8.2 28.7,8 28.6,8.4 29,11.1 29.2,11.5 	"/>
											<path id="Shape_103_" class="st7" d="M32.1,11.5l-0.3-1.2l-0.1-0.1h-0.3h-0.1l-0.1,0.7l0.1,0.4L30,11.2l0.2-0.4l0.2-2.7l-0.1-0.4
												l2.4,0.2l0.7,0.7l-0.1,1L32.8,10l0.3,1l0.3,0.5H32.1L32.1,11.5z M32.3,9.1l-0.1-0.2L32,8.8h-0.5h-0.1v0.6l0.1,0.1H32l0.2-0.1
												l0.1-0.2V9.1L32.3,9.1z"/>
											<polygon id="Shape_104_" class="st7" points="36.2,12.6 33.9,11.8 34.2,11.5 35.1,8.9 35.1,8.5 37.4,9.3 37.4,10.3 37,10 36,9.6 
												36,9.7 35.9,10 35.9,10.1 36.2,10.2 36.7,10.2 36.3,11.2 36,11 35.6,10.8 35.6,10.9 35.4,11.3 35.4,11.4 36.3,11.8 36.9,11.8 	"/>
											<path id="Shape_105_" class="st7" d="M25.4,39.6l-2.2-1l0.3-0.3l1.1-2.5v-0.4l2.2,1l0.4,1l-0.8,2L25.4,39.6L25.4,39.6z M26,37.3V37
												l-0.2-0.2l-0.3-0.1h-0.1l-0.7,1.7v0.1l0.3,0.1h0.3l0.2-0.2L26,37.3L26,37.3z"/>
											<polygon id="Shape_106_" class="st7" points="29.9,40.5 27.5,40.3 27.7,39.9 28,37.2 27.9,36.7 30.2,37 30.5,38 30,37.8 29,37.7 
												29,37.7 28.9,38.1 29,38.1 29.4,38.2 29.8,38.1 29.7,39.2 29.3,39 28.9,39 28.8,39 28.8,39.5 28.9,39.6 29.8,39.7 30.4,39.6 	"/>
											<path id="Shape_107_" class="st7" d="M33.5,38.9l-1.1,0.2v0.1l0.1,0.7l0.2,0.4l-1.4,0.2l0.1-0.4l-0.5-2.7L30.7,37l2.4-0.4l0.8,0.5
												l0.2,1L33.5,38.9L33.5,38.9z M33,37.8l-0.1-0.2l-0.2-0.1l-0.5,0.1v0.1l0.1,0.6h0.1l0.5-0.1l0.2-0.1l0.1-0.2L33,37.8L33,37.8z"/>
											<polygon id="Shape_108_" class="st7" points="36.6,36.1 36.2,36.3 36.2,36.4 37.1,38.3 37.6,38.7 36.2,39.4 36.2,38.8 35.2,36.9 
												35.2,36.8 34.8,37 34.3,37.4 34.2,36.4 36.5,35.3 37.2,36 	"/>
										</g>
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
