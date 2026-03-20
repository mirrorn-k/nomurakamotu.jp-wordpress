<?php
/*
Template Name: 固定ページ：問い合わせ
*/
$templateName = "page";
?>
<!-- of-addnew:<?php echo $templateName; ?> -->
<?php
	get_header(); 

	$dir_inputFile = glob(get_stylesheet_directory() . "/" . $templateName . "/*.css");
	foreach ($dir_inputFile as $key => $value) {
		$value = str_replace( get_stylesheet_directory() . "/" . $templateName , "",  $value);
		wp_enqueue_style( $value . '-style', get_stylesheet_directory_uri() . "/" . $templateName . $value . get_param() , array(), wp_get_theme()->get( 'Version' ) );
	}

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

<div id="contact">
		
	<div class="container">

		<div>
			<h2 class="content-tittle">
				CONTACT US
			</h2>
			<h3 class="sub">お問い合わせフォーム</h3>
		</div>

		<div class="content description ">
			<p class="textAlign-left">
				<span>お仕事のご依頼やご質問がある方はこちらからお問い合わせ頂くと、後ほど担当者からご連絡をさせていただきます。</span>
				<span>電話またはファックスでのお問い合わせは下記よりお願いします。</span>
			</p>
			<div class="side-by-side no-justify">
				<a class="clmItem tell">0894-75-0303</a>
				<a class="clmItem fax" >0894-75-0800</a>
			</div>
		</div>
	</div>

	<div class="container ">
		<?php echo do_shortcode('[mwform_formkey key="356"]'); ?>
	</div>

</div>

	<?php endwhile;?>
	<?php endif; ?>

</main><!-- #main -->
	
<?php get_footer(); ?>

