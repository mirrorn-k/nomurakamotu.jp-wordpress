<?php
/*
Template Name: 固定ページ：採用情報
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
			<?php //the_content(); ?>
			<?php require(get_stylesheet_directory() . "/component/main.php"); ?>

			<div class="container color-set02 ">
				
				<h2 class="content-tittle">
					<span style="padding:0 1em">Apply-求人応募-</span>
				</h2>

				<div class="content description">
					
					<!--
					<p class="textAlign-left">
						<span>現在、全ての募集ポジションの応募を一時的に締め切っております。ご興味をお持ちいただいた皆様には深く感謝申し上げます。</span>
						<span>次回の募集開始時期については、当WEBサイトにてお知らせいたしますので、引き続きご確認ください。</span>
					</p> 
					<div class="content description">
						<p class="textAlign-left">
							<span>今後とも、どうぞよろしくお願い申し上げます。</span>
						</p> 
					</div>
-->
					
					<p class="textAlign-left">
						<span>野村貨物の求人応募やご質問がある方はこちらからお問い合わせ頂くと、後ほど担当者からご連絡をさせていただきます。</span>
						<span>電話またはファックスでのお問い合わせは下記よりお願いします。</span>
					</p> 
					<div class="side-by-side no-justify">
						<a class="clmItem tell" >0894-75-0303</a>
						<a class="clmItem fax" >0894-75-0800</a>
					</div>

					<div class="page-description">
						<p class="textAlign-left">
							<span>お問い合わせには以下のフォームにご入力ください。</span>
							<span>(必須マークが付いている項目は必ずご入力よくお願い致します)</span>
						</p> 
					</div>
					

					<div class="container">
						<?php echo do_shortcode('[mwform_formkey key="437"]'); ?>
					</div>
				</div>
			</div>

		<?php endwhile;?>
	<?php endif; ?>

</main><!-- #main -->
	
<?php get_footer(); ?>

