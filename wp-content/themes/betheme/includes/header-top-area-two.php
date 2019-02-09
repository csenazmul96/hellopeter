<?php $translate['wpml-no'] = mfn_opts_get('translate') ? mfn_opts_get('translate-wpml-no','No translations available for this page') : __('No translations available for this page','betheme'); ?>

<?php if( mfn_opts_get('action-bar')): ?>
	<div id="Action_bar">
		<div class="container">
			<div class="column one">
			
				<ul class="contact_details">
					<?php
						if( $header_slogan = mfn_opts_get( 'header-slogan' ) ){
							echo '<li class="slogan">'. $header_slogan .'</li>';
						}
						if( $header_phone = mfn_opts_get( 'header-phone' ) ){
							echo '<li class="phone"><i class="icon-phone"></i><a href="tel:'. str_replace(' ', '', $header_phone) .'">'. $header_phone .'</a></li>';
						}					
						if( $header_phone_2 = mfn_opts_get( 'header-phone-2' ) ){
							echo '<li class="phone"><i class="icon-phone"></i><a href="tel:'. str_replace(' ', '', $header_phone_2) .'">'. $header_phone_2 .'</a></li>';
						}					
						if( $header_email = mfn_opts_get( 'header-email' ) ){
							echo '<li class="mail"><i class="icon-mail-line"></i><a href="mailto:'. $header_email .'">'. $header_email .'</a></li>';
						}
					?>
				</ul>
				
				<?php 
					if( has_nav_menu( 'social-menu' ) ){
						mfn_wp_social_menu();
					} else {
						get_template_part( 'includes/include', 'social' );						
					}
				?>

			</div>
		</div>
	</div>
<?php endif; ?>

<?php 
	if( mfn_header_style( true ) == 'header-overlay' ){
		
		// Overlay ----------
		echo '<div id="Overlay">';
			mfn_wp_overlay_menu();
		echo '</div>';
		
		// Button ----------
		echo '<a class="overlay-menu-toggle" href="#">';
			echo '<i class="open icon-menu-fine"></i>';
			echo '<i class="close icon-cancel-fine"></i>';
		echo '</a>';
		
	}
?>

<!-- .header_placeholder 4sticky  -->
<div class="header_placeholder"></div>

<div id="Top_bar" class="loading">

	<div class="container">
		<div class="column one">
		
			<div class="top_bar_left clearfix review_page_menu">
			
				<!-- Logo -->
				<?php get_template_part( 'includes/include', 'logo' ); ?>
			
				<div class="menu_wrapper review_page_menu_wrap">
					<?php 
						 mfn_wp_lang_menu();
					?>					
				</div>			
				
				<div class="secondary_menu_wrapper">
					<!-- #secondary-menu -->
					<?php mfn_wp_secondary_menu(); ?>
				</div>
				
				<div class="banner_wrapper">
					<?php mfn_opts_show( 'header-banner' ); ?>
				</div>
				
				<div class="search_wrapper">
					<!-- #searchform -->
					
					<?php get_search_form( true ); ?>
					
				</div>				
				
			</div>
			
			<?php 
				if( ! mfn_opts_get( 'top-bar-right-hide' ) ){
					get_template_part( 'includes/header', 'top-bar-right' );
				}
			?>
			
		</div>
	</div>
</div>