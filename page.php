<?php get_header('reveal'); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<?php if( have_rows('slides') ): ?>
		
		<?php $showAcc = get_field('showacc_btn_link');
			if( $showAcc ): ?>
			
			<div id="showAcc">
				<a href="<?php echo $showAcc; ?>" class="btn btn-audio">Show Accessories</a>
			</div>
		
		<?php endif; ?>
		
			
		<div class="reveal">
			
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
												?>
												
													<div class="warranty-wrapper">
														<h3 id="warranty-title"><?php echo $warrantybar_title; ?></h3>
														<div class="warranty-bar">
															<div class="warranty-progress"></div>
															<div class="warranty-terms"><?php echo $warrantybar_left; ?></div>
															<div class="warranty-avail"><?php echo $warrantybar_right; ?></div>
														</div>
													</div>		
												
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
							<audio class="hiddenAudio">
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
							<img class="custSat-form-body" src="<?php echo get_template_directory_uri(); ?>/img/satisfaction/custSat-form.svg">
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
									
									if($feedbackSource === "carsdotcom") {
										$feedbackLinkURL = "https://www.cars.com/";
									} elseif($feedbackSource === "dealerrater") {
										$feedbackLinkURL = "https://www.dealerrater.com/";
									} elseif($feedbackSource === "yelp") {
										$feedbackLinkURL = "https://www.yelp.com/";
									} elseif($feedbackSource === "google") {
										$feedbackLinkURL = "https://www.google.com/";
									} elseif($feedbackSource === "facebook") {
										$feedbackLinkURL = "https://www.facebook.com/";
									} elseif($feedbackSource === "cargurus") {
										$feedbackLinkURL = "https://www.cargurus.com/";
									} elseif($feedbackSource === "edmunds") {
										$feedbackLinkURL = "https://www.edmunds.com/";
									} else {
										$feedbackLinkURL = "";
									}
							  ?>
							  
								<div class="col-of col-xs-4">
									<div class="module-wrapper">
										<?php if($feedbackLinkURL !== "") { echo "<a href='".$feedbackLinkURL."' target='_blank'>"; } ?>
											<img class="feedbackImg" src="<?php echo get_template_directory_uri(); ?>/img/feedback/<?php echo $feedbackSource; ?>.png">
										<?php if($feedbackLinkURL !== "") { echo "</a>"; } ?>
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
									<div style="width: <?php echo $width_colOther; ?>%;"">$<span id="price_col<?php echo $n4; ?>_todaysprice"></span></div>
								<?php endif; 
							} ?>
						</div>
						<?php if( $discountChoosen ) { ?>
						<div id="addcov-buttons" class="row">
							<div class="discounts-hdr">Discounts:</div>
							<?php if( $discountChoosen && in_array('veterans', $discountChoosen) ) { ?>
								<button id="discount-veteran" type="button" class="btn btn-primary" data-discount="<?php echo $veteran ?>">Veteran</button>
							<?php }
								if( $discountChoosen && in_array('costcosams', $discountChoosen) ) { ?>
								<button id="discount-costcosams" type="button" class="btn btn-primary" data-discount="<?php echo $costcosams ?>">CostCo/Sam's Club</button>
							<?php }
								if( $discountChoosen && in_array('aarp', $discountChoosen) ) { ?>
								<button id="discount-aarp" type="button" class="btn btn-primary" data-discount="<?php echo $aarp ?>">AARP</button>
							<?php }
								if( $discountChoosen && in_array('aaa', $discountChoosen) ) { ?>
								<button id="discount-aaa" type="button" class="btn btn-primary" data-discount="<?php echo $aaa ?>">AAA</button>
							<?php }
								if( $discountChoosen && in_array('firstresponder', $discountChoosen) ) { ?>
								<button id="discount-firstresponder" type="button" class="btn btn-primary" data-discount="<?php echo $firstresponder ?>">First Responder</button>
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
					if( $layout == 'slide_final') { ?>
					  

					<section id="final" data-background-image="<?php echo get_template_directory_uri(); ?>/img/bgs/bg-final.jpg">
						
						<h2 class="finalh2">Have you thought about?</h2>
						
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
						
						<?php $finalLink = get_sub_field('final_url');
							if( $finalLink ): ?>
							<div class="final_button">
								<a href="<?php echo $finalLink; ?>" target="_blank">
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
