<?php
/**
 * 
 * @package WordPress
 * @subpackage 
 * @since 
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	

	<!-- フォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Corben:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&amp;family=Zen+Antique&amp;display=swap" rel="stylesheet">

	<!-- OGP -->
	<?php get_template_part( 'header/meta' ); ?>

	<?php wp_head(); ?>
	
	<?php if(isset($post->ID)): ?>
		<?php
		$custom_fields = get_post_meta( $post->ID , 'css' , true );
		if(empty( $custom_fields ) === false){ ?>
			<style id="page-original">
				<?php echo $custom_fields; ?>
			</style>
		<?php } ?>
	<?php endif; ?>
	
	<?php
		$dir_inputFile = glob(get_stylesheet_directory() . "/header/*.css");
		foreach ($dir_inputFile as $key => $value) {
			$value = str_replace( get_stylesheet_directory() . "/header", "",  $value);
			wp_enqueue_style( $value . '-style', get_stylesheet_directory_uri() . '/header' . $value . get_param() , array(), wp_get_theme()->get( 'Version' ) );
		}
		
		$dir_inputFile = glob(get_stylesheet_directory() . "/header/*.js");
		foreach ($dir_inputFile as $key => $value) {
			$value = str_replace( get_template_directory() . "/header", "",  $value);
			wp_enqueue_script( $value . '-script', get_stylesheet_directory_uri() . '/header' . $value . get_param() , array(), wp_get_theme()->get( 'Version' ) );
		}
		
		$dir_inputFile = glob(get_stylesheet_directory() . "/component/*.css");
		foreach ($dir_inputFile as $key => $value) {
			$value = str_replace( get_stylesheet_directory() . "/component" , "",  $value);
			wp_enqueue_style( $value . '-style', get_stylesheet_directory_uri() . "/component" . $value . get_param() , array(), wp_get_theme()->get( 'Version' ) );
		}
	?>
	<?php /*
	<script src="https://www.google.com/recaptcha/api.js?render=6Ld5MwErAAAAALNm8WCRvBHBT4YoPR79Hi7eQenJ"></script>
	*/ ?>
</head>

<body <?php body_class(); ?>>

<div id="loading">
	<div id="splash_text"></div>
</div><!--/loading-->

<div id="mega-menu" class="site-top side-by-side no-justify color-set01">
	<?php get_template_part( 'header/site-branding' ); ?>
	<?php get_template_part( 'header/site-nav' ); ?>
</div>

<?php wp_body_open(); ?>

	<?php
		$wrapper_classes  = 'site-header';
		$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
		$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
		$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
	?>
	
	<header id="masthead" role="banner">

		<?php if ( is_home() || is_front_page() ) {
			get_template_part( 'header/site-mainImg' );
			//get_template_part( 'header/phone' );
		}elseif(!is_page("194") && !is_page("432")){
			get_template_part( 'header/content' );
		}?>

	</header><!-- #masthead -->
