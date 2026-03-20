<!-- header/ogp.php:OGP設定 -->
<?php if(is_front_page() || is_home()): ?>
	<title>株式会社野村貨物</title>
<meta content="<?php echo get_bloginfo( 'description' ); ?> -株式会社野村貨物-" name="title">
<?php else : ?>
	<title><?php the_title(); ?> -株式会社野村貨物-</title>
	<meta content="<?php the_title(); ?> -株式会社野村貨物-" name="title">
<?php endif; ?>
<meta content="株式会社野村貨物は、1953年に愛媛県西予市野村町で創業した運送会社です。創業から70年以上にわたり、荷主様や協力会社と共に歩んできました。
当社の強みは、様々な車両を保有していることにあります。一般的な運送会社が所持指定内車種も取り揃えており、様々なご要望に対応することが出来ます。またセミトレーラーは70台保有しており、大型機械や特殊な資材、大量の貨物運搬にも対応できます。
四国から本州、九州への輸送はもちろん、大阪にも事業所を持っているため四国への輸送や大阪からの輸送にも強いです。
当社は「閃き・行動力・努力」をモットーに、荷主様からのご要望に迅速かつ丁寧に対応しています。また、安全運転を徹底し、荷物を大切に運搬しています。
お客様にご満足いただける運送サービスを提供するため、今後も努力してまいります。
ご用命の際は、お気軽にお問い合わせください。" name="description">
<meta content='株式会社野村貨物, 運送, 愛媛, 大阪, 貸倉庫,トレーラー,野村貨物' name='keywords'>

<meta property="og:url" content="<?php echo home_url(); ?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="株式会社野村貨物" />
<meta property="og:description" content="<?php echo get_bloginfo( 'description' ); ?>" />
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />

<?php $aryImg = get_the_topImgInfo(); // キービジュアルを取得 ?>
<meta property="og:image" content="<?php echo $aryImg["01"]; ?>" />

<!-- Facebook用設定 -->
<meta property="fb:app_id" content="App-ID（15文字の半角数字）" />

<!-- ※Twitter共通設定 -->
<meta name="twitter:card" content="summary_large_image" />
