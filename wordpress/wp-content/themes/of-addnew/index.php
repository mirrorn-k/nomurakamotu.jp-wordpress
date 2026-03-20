<?php
get_header(); 

// 開発用にCSSを強制的に読ませる設定
$param = "";
if(array_key_exists("mode", $_GET)){
	if($_GET["mode"] == "debug"){
		$param = "?" . date("YmdHis");
	}
}

// テンプレート：index.php
$dir_inputFile = glob(get_stylesheet_directory() . "/index/*.css");
foreach ($dir_inputFile as $key => $value) {
	$value = str_replace( get_stylesheet_directory() . "/index", "",  $value);
	wp_enqueue_style( $value . '-style', get_stylesheet_directory_uri() . '/index' . $value . $param , array(), wp_get_theme()->get( 'Version' ) );
}
?>

<div id="content" class="site-content wide-max-width">
<div id="primary" class="content-area side-by-side">
<main id="main" class="site-main" role="main">

<?php if ( have_posts() ) : ?>
  <?php while( have_posts() ) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
  <?php endwhile;?>
<?php endif; ?>

</main>
<?php get_sidebar(); ?>
</div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>
