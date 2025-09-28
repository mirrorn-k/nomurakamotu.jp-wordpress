<?php
/*
Template Name: 固定ページ：事業紹介
*/
$templateName = "page";
?>
<!-- of-addnew:<?php echo $templateName; ?> -->
<?php
get_header(); 
/*
$dir_inputFile = glob(get_stylesheet_directory() . "/" . $templateName . "/*.css");
foreach ($dir_inputFile as $key => $value) {
	$value = str_replace( get_stylesheet_directory() . "/" . $templateName , "",  $value);
	wp_enqueue_style( $value . '-style', get_stylesheet_directory_uri() . "/" . $templateName . $value . get_param() , array(), wp_get_theme()->get( 'Version' ) );
}
*/

$dir_inputFile = glob(get_template_directory() . "/page/*.js");
foreach ($dir_inputFile as $key => $value) {
	$value = str_replace( get_template_directory() . "/" . $templateName , "",  $value);
	wp_enqueue_script( $value . '-script', get_template_directory_uri() . "/" . $templateName . $value . get_param() , array(), wp_get_theme()->get( 'Version' ) );
}
?>
<main id="main" class="site-main" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while( have_posts() ) : the_post(); ?>
			<?php // the_content(); ?>
			<?php require(get_stylesheet_directory() . "/component/main.php"); ?>
		<?php endwhile;?>
	<?php endif; ?>

</main><!-- #main -->
	
<?php get_footer(); ?>

