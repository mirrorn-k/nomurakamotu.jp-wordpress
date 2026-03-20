<?php

get_header();

$dir_inputFile = glob(get_stylesheet_directory() . "/front-page/*.css");
foreach ($dir_inputFile as $key => $value) {
	$value = str_replace( get_stylesheet_directory() . "/front-page", "",  $value);
	wp_enqueue_style( $value . '-style', get_stylesheet_directory_uri() . '/front-page' . $value . get_param() , array(), wp_get_theme()->get( 'Version' ) );
}

$dir_inputFile = glob(get_template_directory() . "/front-page/*.js");
foreach ($dir_inputFile as $key => $value) {
	$value = str_replace( get_template_directory() . "/front-page", "",  $value);
	wp_enqueue_script( $value . '-script', get_template_directory_uri() . '/front-page' . $value . get_param() , array(), wp_get_theme()->get( 'Version' ) );
}
?>

<main id="main" class="site-main" role="main">

    <div id="maincatchcopy" class="container top slidein">
        <div class="inner">
            <div class="title">
                <h2>
                    <span class="main">Be In Progress</span>
                    <span class="sub">-&nbsp;私たちは進化する&nbsp;-</span>
                </h2>
            </div>
            <div class="shishin">
                <span>「閃き・行動力・努力」をモットーに</span>
                <span>お客様の荷物を安全・迅速・確実に</span>
                <span>届け続けるため、野村貨物は進化し続けます。</span>
            </div>
        </div><!--inner-->
    </div><!--container maincatchcopy-->

	<div id="news" class="container">
		<div class="inner">
        	<h2><span class="text-underline01 midashi">NEWS</span></h2>
			<ul class="list">
				<?php
					$args = array(
					'posts_per_page' => 3, // 表示する投稿数
					'post_type' => array('news'), // 取得する投稿タイプのスラッグ
					'orderby' => 'date', //日付で並び替え
					'order' => 'DESC' // 降順 or 昇順
					);
					$my_posts = get_posts($args);
				?>
				<?php foreach ($my_posts as $post) : setup_postdata($post); $tags = get_the_tags($post->ID); ?>
					<li class="item">
							<p class="date"><?php echo date('Y-m-d', strtotime($post->post_date)) ;?>
                                <?php if($tags != false): ?>
                                        <span class="tag"></span>
                                <?php endif; ?>
                            </p>
							<p>
								<?php echo $post->post_title; ?>
							</p>
							<p class="link">
								<a href="<?php echo $post->guid; ?>">
									詳しくはコチラ
								</a>
							</p>
					</li>
				<?php endforeach; ?>
			</ul>
			<p class="itiran"><a href= "<?php echo get_post_type_archive_link( 'news' ) ?>">NEWS一覧</a></p>
		</div>
    </div>

    <?php
        $service = [
            array(
                'tittle' => array('お客様のニーズに','寄り添った', '事業展開'),
                'read' => array('様々な荷物に適応した運送方法や貸し倉庫をご用意していますので、安心してお任せください。'),
                'img' => ['src'=>get_template_directory_uri() . "/img/hirameki.png", 'alt'=>'閃き'],
                'btn' => ['href'=>get_permalink( get_page_by_path('company')->ID ), 'text'=>'詳しい会社案内はコチラ'],
            ),
            array(
                'tittle' => array('幅広い輸送エリア'),
                'read' => array('愛媛と大阪に拠点を構え、お客様のご要望に合わせて様々な輸送形態に対応。', 'フェリーでの輸送や、全国の同業ネットワークを駆使し、全国各地への輸送を設計しております。'),
                'img' => ['src'=>get_template_directory_uri() . "/img/koudouryoku.png", 'alt'=>'行動力'],
                'btn' => ['href'=>get_permalink( get_page_by_path('business')->ID ), 'text'=>'詳しい事業内容はコチラ'],
            ),
            array(
                'tittle' => array('安全・迅速・確実'),
                'read' => array('私たちは創業から約70年の歴史で培ってきた経験・技術を用いて、お客様からお預かりしたあらゆる荷物を『安全・迅速・確実』に全国各地へお届けします。'),
                'img' => ['src'=>get_template_directory_uri() . "/img/doryoku.png", 'alt'=>'努力'],
                'btn' => ['href'=>get_permalink( get_page_by_path('vehicle')->ID ), 'text'=>'詳しい車両情報はコチラ'],
            ),
        ];
        

    ?>
    <div id="service" class="container color-set02">
        <h2 class="content-tittle slidein"><span style="padding:0 1em">our service -サービス内容</span></h2>

        <div class="inner content pattern01 ">
        <?php foreach($service as $content): ?>
					
            <div class="content slidein side-by-side clm2 position-relative">
                <div class="cont-text clmItem">
                    <h3 class="content-subtittle ">
                        <?php foreach($content['tittle'] as $tittle): ?>
                            <span class="textAligin-left block"><?php echo $tittle; ?></span>
                        <?php endforeach; ?>
                    </h3>
                    <p class="mediaQuery min601 content-caption">
                        <?php foreach($content['read'] as $read): ?>
                            <span class="textAligin-left"><?php echo $read; ?></span>
                        <?php endforeach; ?>
                    </p>
                </div><!--cont-text-->

                <div class="cont-img clmItem">
                    <img src="<?php echo $content['img']['src']; ?>" alt="<?php echo $content['img']['alt']; ?>">
                </div>

                <div class="cont-btn clmItem position-absolute">
                    <a class="color-set01 bottom position-relative" href="<?php echo $content['btn']['href']; ?>" >
                        <p class="label position-absolute centering"><?php echo $content['btn']['text']; ?></p>
                    </a>
                </div>
            </div><!--content slidein-->

        <?php endforeach; ?>
            
        </div><!--inner-->
    </div><!--container bgc-black service-->  

</main><!-- #main -->
	
<?php get_footer(); ?>
