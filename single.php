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
				set_query_var('presentation_logo', $logo['url']);
				$name = get_field('dealer_name');
			?>
			
			
			<div class="slides">
					
			 
			<?php	while ( have_rows('slides') ) : 
					
					the_row(); 
					$layout = get_row_layout();

					if( $layout == 'generic_slide') {
						get_template_part('slides/generic_slide');
					}

					if( $layout == 'generic_table_slide') {
						get_template_part('slides/generic_table_slide');
					}

					if( $layout == 'slide_generic_fullimage') {
						get_template_part('slides/slide_generic_fullimage');
					}

					if( $layout == 'slide_fullvideo') {
						get_template_part('slides/slide_fullvideo');
					}

					if( $layout == 'slide_audio') {
						get_template_part('slides/slide_audio');
					}

					if( $layout == 'slide_language') {
						get_template_part('slides/slide_language');
					}

					if( $layout == 'slide_congrats') {
						get_template_part('slides/slide_congrats');
					}

					if( $layout == 'slide_extpro_anim') {
						get_template_part('slides/slide_extpro_anim');
					}

					if( $layout == 'slide_notcovered') {
						get_template_part('slides/slide_notcovered');
					}

					if( $layout == 'slide_warranty') {
						get_template_part('slides/slide_warranty');
					}

					if( $layout == 'slide_dealerinfo') {
						get_template_part('slides/slide_dealerinfo');
					}

					if( $layout == 'slide_dealerbene') {
						get_template_part('slides/slide_dealerbene');
					}

					if( $layout == 'slide_custsat') {
						get_template_part('slides/slide_custsat');
					}

					if( $layout == 'slide_feedback') {
						get_template_part('slides/slide_feedback');
					}

					if( $layout == 'slide_eparecs') {
						get_template_part('slides/slide_eparecs');
					}

					if( $layout == 'slide_plasticsheet') {
						get_template_part('slides/slide_plasticsheet');
					}

					if( $layout == 'slide_weartear') {
						get_template_part('slides/slide_weartear');
					}

					if( $layout == 'slide_rust') {
						get_template_part('slides/slide_rust');
					}

					if( $layout == 'slide_sound') {
						get_template_part('slides/slide_sound');
					}

					if( $layout == 'slide_intpro_pic') {
						get_template_part('slides/slide_intpro_pic');
					}

					if( $layout == 'slide_intpro_table') {
						get_template_part('slides/slide_intpro_table');
					}

					if( $layout == 'slide_extpro_table') {
						get_template_part('slides/slide_extpro_table');
					}

					if( $layout == 'slide_window') {
						get_template_part('slides/slide_window');
					}

					if( $layout == 'slide_addcov') {
						get_template_part('slides/slide_addcov');
					}

					if( $layout == 'slide_addcov_prices') {
						get_template_part('slides/slide_addcov_prices');
					}

					if( $layout == 'slide_accfacts') {
						get_template_part('slides/slide_accfacts');
					}

					if( $layout == 'slide_final') {
						get_template_part('slides/slide_final');
					}

					?>
				

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
