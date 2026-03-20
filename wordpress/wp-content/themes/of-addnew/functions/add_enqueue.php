<?php

/** 
 * CSS追加読み込み設定
 */
function theme_enqueue_styles() {
	
	// 開発用にCSSを強制的に読ませる設定
	$param = "";
	if(array_key_exists("mode", $_GET)){
		if($_GET["mode"] == "debug"){
			$param = "?" . date("YmdHis");
		}
	}
	
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css' . $param  , array(), wp_get_theme()->get( 'Version' ));
	
	// 共通
    $dir_inputFile = glob(get_template_directory() . "/css/*.css");
	foreach ($dir_inputFile as $key => $value) {
		$value = str_replace( get_template_directory() . "/css", "", $value);
		wp_enqueue_style( $value . '-style', get_template_directory_uri() . '/css' . $value . $param  , array(), wp_get_theme()->get( 'Version' ));
	}
	
	// slickスライダー
	$dir_inputFile = glob(get_template_directory() . "/slick/*.css");
	foreach ($dir_inputFile as $key => $value) {
		$value = str_replace( get_template_directory() . "/slick", "",  $value);
		wp_enqueue_style( $value . '-style', get_template_directory_uri() . '/slick' . $value . $param , array(), wp_get_theme()->get( 'Version' ) );
	}
		
	$dir_inputFile = glob(get_template_directory() . "/js/*.js");
	foreach ($dir_inputFile as $key => $value) {
		$value = str_replace( get_template_directory() . "/js", "",  $value);
		wp_enqueue_script( $value . '-script', get_template_directory_uri() . '/js' . $value . get_param() , array(), wp_get_theme()->get( 'Version' ) );
	}

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


/** 
 * script追加読み込み設定
 */
function theme_enqueue_script() {

	// 開発用に強制的に読ませる設定
	$param = "";
	if(array_key_exists("mode", $_GET)){
		if($_GET["mode"] == "debug"){
			$param = "?" . date("YmdHis");
		}
	}
	
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_script' );

