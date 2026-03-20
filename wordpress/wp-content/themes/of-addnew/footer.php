<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$dir_inputFile = glob(get_stylesheet_directory() . "/footer/*.css");
foreach ($dir_inputFile as $key => $value) {
	$value = str_replace( get_stylesheet_directory() . "/footer", "",  $value);
	wp_enqueue_style( $value . '-style', get_stylesheet_directory_uri() . '/footer' . $value . get_param() , array(), wp_get_theme()->get( 'Version' ) );
}
		
$dir_inputFile = glob(get_template_directory() . "/footer/*.js");
foreach ($dir_inputFile as $key => $value) {
	$value = str_replace( get_template_directory() . "/footer", "",  $value);
	wp_enqueue_script( $value . '-script', get_template_directory_uri() . '/footer' . $value . get_param() , array(), wp_get_theme()->get( 'Version' ) );
}
?>
	<footer id="footer" >
        <?php if(!is_page("432")) :?>
            <div class="container">
                <div class="logo img-centering-fullsize central">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/blackLOGO.jpg" alt="野村貨物ロゴ" width="300px" height="35px">
                </div>
                <div class="companyInfo mediaQuery min601 cont-caption">
                    <div class="office">
                        <div>
                            <p class="officeName">本社</p>
                        </div>
                        <div>
                            <p class="address">
                                <span class="post-no">797-1104</span>
                                <span>愛媛県西予市野村町河西1166-6</span>
                            </p>
                            <div class="phone-no">
                                <span class="tell">0894-75-0303</span>
                                <span class="fax">0894-75-0800</span>
                            </div>
                        </div>
                    </div>
                    <div class="office">
                        <div>
                            <p class="officeName">大阪営業所</p>
                        </div>
                        <div>
                            <p class="address">
                                <span class="post-no">551-0013</span>
                                <span>大阪市大正区小林西1-25-13</span>
                                <span>大正内港海運ビル1階</span>
                            </p>
                            <div class="phone-no">
                                <span class="tell">06-6105-1677</span>
                                <span class="fax">06-6105-1678</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="color-set02" id="copyright">
            <div class="inner">
                <p class="font-white">Copyright (c) 2022 NOMURA KAMOTSU.Co,.ltd.All Rights Rsesrved.</p>
            </div>
        </div>
    </footer>  

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script> -->
	<script src="<?php echo get_stylesheet_directory_uri();?>/js/jquery-migrate-1.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/js/slick/slick.css"/>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/slick/slick.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/progressbar.js-master/dist/progressbar.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>
