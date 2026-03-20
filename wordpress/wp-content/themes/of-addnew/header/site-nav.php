<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<?php if ( has_nav_menu( 'top' ) ) : ?>
	<nav id="site-navigation" class="primary-navigation" role="navigation">
		<div class="topMenu mobile hamburger-menu">
			<input type="checkbox" id="topMenu-btn-check">
			<label for="topMenu-btn-check" class="menu-btn"><span></span></label>
			<div class="menu-content">
				
				<?php //get_template_part( 'header/site-branding' ); ?>
				<ul>
					<?php wp_nav_menu ( 
						array(
							'theme_location'=>'top', 
							'container'=>false, 
							'items_wrap'=>'%3$s', 
							'fallback_cb'=>false
						)
					); ?>
				</ul>
			</div>
    	</div>
		<div class="topMenu pc">
			<ul class="side-by-side">
			
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'top',
					'container'       => '',
					'items_wrap'      => '%3$s',
					'fallback_cb'     => false,
					'add_a_class'     => "running-bottomLine from-left to-left thickness-2",
				)
			);
			?>
			</ul>
		</div>
	</nav><!-- #site-navigation -->
<?php endif; ?>
