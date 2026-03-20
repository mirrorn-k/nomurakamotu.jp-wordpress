<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>

	<div class="site-branding">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if ( has_custom_logo() && ! $show_title ) : ?>
				<div class="site-logo"><?php the_custom_logo(); ?></div>
			<?php elseif ( get_site_icon_url() != "" ) : ?>
				<div class="site-logo"><img src="<?php echo get_site_icon_url(100); ?>" /></div>
			<?php endif; ?>

			<?php if ( $blog_info ) : $img_src = get_template_directory_uri()."/img/header_logo_g05.jpg";  ?>
				<?php if ( is_front_page() && ! is_paged() ) : ?>
					<h1 class="<?php echo esc_attr( $header_class ); ?>">
						<img src="<?php echo $img_src; ?>" />
					</h1>
				<?php elseif ( is_front_page() && ! is_home() ) : ?>
					<h1 class="<?php echo esc_attr( $header_class ); ?>">
						<img src="<?php echo $img_src; ?>" />
					</h1>
				<?php else : ?>
					<p class="<?php echo esc_attr( $header_class ); ?>">
						<img src="<?php echo $img_src; ?>" />
					</p>
				<?php endif; ?>
			<?php endif; ?>
		</a>
	</div><!-- .site-branding -->
