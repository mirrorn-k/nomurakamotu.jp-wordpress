<?php
/*
Template Name: お知らせアーカイブ
*/
?>

<!-- oldFashiouned:archive-news.php -->
<?php
	get_header();

	// 開発用にCSSを強制的に読ませる設定
	$param = "";
	if(array_key_exists("mode", $_GET)){
		if($_GET["mode"] == "debug"){
			$param = "?" . date("YmdHis");
		}
	}

	$dir_inputFile = glob(get_stylesheet_directory() . "/archive/*.css");
	foreach ($dir_inputFile as $key => $value) {
		$value = str_replace( get_stylesheet_directory() . "/archive", "",  $value);
		wp_enqueue_style( $value . '-style', get_stylesheet_directory_uri() . '/archive' . $value . $param , array(), wp_get_theme()->get( 'Version' ) );
	}
?>

<div id="archive" class="news container">
	<ul class="ul">
		<?php if (have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<li class="news-list">
					<a href="<?php echo $post->guid; ?>" class="side-by-side">
						<p class="text-ellipsis"><?php the_time('Y-m-d', strtotime($post->post_date)); ?></p>
						<p class="title text-ellipsis"><?php echo get_the_title($post->ID); ?></p>
					</a>
				</li>
		
			<?php endwhile; ?>
			
			<div>
				
				<?php $theme_info = wp_get_theme(); echo $theme_info->get( 'Version' ); ?>
			</div>
		
			<!-- ページネーション -->
		<div style="text-align: right">
				<?php
					$args = array(
						'mid_size' => 1,
						'prev_text' => '<',
						'next_text' => '>'
					);
					the_posts_pagination($args);
				?>
			</div>
		<?php else: ?>
			<p>申し訳ございません。<br />該当する記事がございません。</p>
		<?php endif; ?>
	</ul>
</div><!-- #archive -->

<?php get_footer(); ?>
