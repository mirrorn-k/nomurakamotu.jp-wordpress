<?php
/*
Template Name: 固定ページ：THANKSページ
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

<div id="thanks">
		
	<div class="container description">

		<h2 class="content-tittle">
			THANK YOU!!
		</h2>
		<h3 class="sub">お問い合わせが送信されました</h3>

        <div class="content thanks-message">
            <div>
                <p>
                    この度は<span class="fontWeight-bold">株式会社野村貨物</span>へお問合せ頂き誠にありがとうございます。
                </p>
            </div>
            <div>
                <p>
                    お送り頂きました内容を確認の上、折り返しご連絡させて頂きます。
                </p>
                <p>
                    また、
                    <span class="fontWeight-bold">
                        ご記入頂いたメールアドレスへ、自動返信の確認メールをお送りしております。
                    </span>
                </p>
            </div>
            <div>
                <p>
                    しばらく経っても確認メールが届かない場合は、入力頂いたメールアドレスが間違っているか、
                    迷惑メールフォルダに振り分けられている可能性がございます。
                </p>
                <p>
                    また、ドメイン指定をされている場合は、「@nomurakamotsu.jp」からのメールが受信できるようあらかじめ設定をお願い致します。
                </p>
                <p>
                    ご確認の上、再度フォームよりお問い合わせ頂きますようお願い致します。
                </p>
            </div>
            <div>
                <p>
                    なお、お急ぎの場合は電話でもご相談を受け付けております。
                </p>
                <p>
                    下記の連絡先までご遠慮なくご相談ください。
                </p>
            </div>

            <div class="" id="tell">
                <div class="eigyosyo">
                    <div class="name">
                        <p class="mediaQuery min1025">株式会社野村貨物</p>
                        <p>本社</p>
                    </div>
                    <div class="number">
                        <p><img src="<?php echo get_template_directory_uri(); ?>/img/tell_black.svg">0894-75-0303</p>
                    </div>
                </div>
            </div>
        </div>
	</div>

	<div class="container">

        <div class="cont-btn color-set02">
            <a class="bottom position-relative" href="<?php echo home_url(); ?>" >
                <p class="label position-absolute centering">トップページへ戻る</p>
            </a>
        </div>

    </div>

</div>

	<?php endwhile;?>
	<?php endif; ?>

</main><!-- #main -->
	
<?php get_footer(); ?>

