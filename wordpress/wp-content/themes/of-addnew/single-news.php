<?php
/**
 * Template Name: お知らせ
 */
?>
<!-- oldFahiouned:single-news.php -->
<?php

// 開発用にCSSを強制的に読ませる設定
$param = "";
if(array_key_exists("mode", $_GET)){
	if($_GET["mode"] == "debug"){
		$param = "?" . date("YmdHis");
	}
}


// テンプレート：single.php
$dir_inputFile = glob(get_stylesheet_directory() . "/single/*.css");
foreach ($dir_inputFile as $key => $value) {
	$value = str_replace( get_stylesheet_directory() . "/single", "",  $value);
	wp_enqueue_style( $value . '-style', get_stylesheet_directory_uri() . '/single' . $value . $param , array('style'), wp_get_theme()->get( 'Version' ) );
}

get_header(); 
?>

<main id="main" class="site-main " role="main">

<div id="single" class="container">
	<?php if ( have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
		<h2 class="content-tittle textAlign-left"><?php the_title(); ?></h2>

		<div class="pattern-other ">
			<?php the_content(); ?>
		</div>
		<div class="imgs">
	<?php
	$imgs = SCF::get('imgs');
	if (is_array($imgs) && !empty($imgs)) {
		foreach ($imgs as $img) :
			if (empty($img['img'])) {
				continue; // Skip if 'img' field is empty
			}
			?>
			<div class="img">
				<img src="<?php echo wp_get_attachment_url($img['img']); ?>" />
			</div>
		<?php endforeach;
	} else {
		// Handle case where $imgs is not an array or is empty
		echo 'No images found.'; // Display a message when no images are available
	}
	?>
</div>
	<?php endwhile;?>
	<?php endif; ?>
	<?php the_posts_pagination(); ?>
</div>

</main>
<style>.origin-img{ object-fit:cover;max-width: 450px;/* text-align: center; */margin: auto; margin-bottom: 1rem;}</style>
<?php get_footer(); ?>
