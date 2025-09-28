<!-- oldFahiouned:single.php -->
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
	wp_enqueue_style( $value . '-style', get_stylesheet_directory_uri() . '/single' . $value . $param , array(), wp_get_theme()->get( 'Version' ) );
}

get_header(); 
?>

<main id="main" class="site-main " role="main">

<div id="single" class="container">
	<?php if ( have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
		<h2 class="content-tittle textAlign-left"><?php the_title(); ?></h2>

		<div class="pattern-other ">
			<?php if(has_post_thumbnail()): ?>
				<?php
					$thumbnail_id = get_post_thumbnail_id(); // サムネ画像ID
					$thumbnail_url = get_the_post_thumbnail_url(); //画像のURL
					$thumbnail_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); //代替テキスト
				?>
				<?php if ($thumbnail_url != ""): ?>
					<figure>
						<?php if($thumbnail_alt != ""): ?>
							<figcaption class="thumbnail_alt" ><?php echo $thumbnail_alt; ?></figcaption>
						<?php endif; ?>
						<img class="thumbnail_img" src="<?php echo $thumbnail_url; ?>" alt="<?php echo $thumbnail_alt; ?>"/>
					</figure>
				<?php endif; ?>
			<?php endif; ?>
			<?php the_content(); ?>
		</div>
	<?php endwhile;?>
	<?php endif; ?>
	<?php the_posts_pagination(); ?>
</div>

</main>

<?php get_footer(); ?>
