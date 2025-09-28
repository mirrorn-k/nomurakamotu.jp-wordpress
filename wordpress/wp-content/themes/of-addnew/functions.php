<?php
remove_filter('the_content', 'wpautop'); // 記事の自動整形を無効にする
remove_filter('the_excerpt', 'wpautop'); // 抜粋の自動整形を無効にする

if(array_key_exists("mode", $_GET)){
	if($_GET["mode"] == "debug"){
		ini_set("display_errors", 1);
		error_reporting(E_ALL);
	}
}

	// 開発用にCSSを強制的に読ませる設定
function get_param(){

	$param = "";
	if(array_key_exists("mode", $_GET)){
		if($_GET["mode"] == "debug"){
			$param = "?" . date("YmdHis");
		}
	}
	return $param;
}


// URLをリセット
global $wp_rewrite;
$wp_rewrite->flush_rules();

if ( ! function_exists( 'OldFashioned_setup' ) ) {
	function OldFashioned_setup() {

		/* メニューを作成 */
		register_nav_menus( array(
			'top' => 'トップメニュー',
			'sidebar' => 'サイドバー',
			'footer'  => 'フッターメニュー',
		) );

		/*【表示カスタマイズ】アイキャッチ画像の有効化 */
		/* https://hirashimatakumi.com/blog/1256.html */
		add_theme_support( 'post-thumbnails' );
		
	}

}
add_action( 'after_setup_theme', 'OldFashioned_setup' );

/** jQuery読み込み
 * https://ichikawa-webdesign.com/archives/4703
 */
function theme_name_files() {
	//jQuery読み込み
	wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'theme_name_files' );


/* でフォルト画像 */
function Get_defaultImg() {
	return get_stylesheet_directory_uri() . "/default/noimage.gif";
}
function the_defaultImg() {
	echo Get_defaultImg();
}

// 存在する投稿タイプ名一覧
// 上書きできるように定義
if ( !function_exists( 'Get_posts_types' ) ) {
	function Get_posts_types(){
		return array('post', 'page', 'news');
	}
}

/* 投稿アーカイブページの作成
https://rmtmhome.com/blogs-archive-1820 */
if ( !function_exists( 'Set_archive_post' ) ) {
	function Set_archive_post( $args, $post_type ) {

		if ( 'post' == $post_type ) {
			$args['rewrite'] = true;
			$args['has_archive'] = 'archive-post'; //任意のスラッグ名
		}
		return $args;

	}
}

if ( !function_exists( 'Get_archive_post_link' ) ) {
	function Get_archive_post_link(){
		return home_url() . '/archive-post';
	}
}
add_filter( 'register_post_type_args', 'Set_archive_post', 10, 2 );

// カスタムフィールドの値を簡単に取得するための関数
function Get_aryidx0($ary, $flg_code = true){
    $res = $ary[0];
    if($flg_code == true){
        $res = str_replace("<", "&lt;", $res);
    }
    return $res;
}

include_once(get_stylesheet_directory() . "/functions/add_enqueue.php"); // CSS・script追加設定
include_once(get_stylesheet_directory() . "/functions/customizer.php");  // 外観カスタマイズ設定
include_once(get_stylesheet_directory() . "/functions/customPosts.php"); // カスタム投稿設定
include_once(get_stylesheet_directory() . "/functions/sidebar.php");     // サイドバーについて
include_once(get_stylesheet_directory() . "/functions/breadcrumb.php");     // パンクズリスト

/** カスタムフィールドを検索に含める  */
function custom_search($search, $wp_query) {
	global $wpdb;

	if (!$wp_query->is_search)
			return $search;
	if (!isset($wp_query->query_vars))
			return $search;

	$search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
	if ( count($search_words) > 0 ) {
			$search = '';
			
			$search_postType = "";
			foreach(Get_posts_types() as $type){
				if($type == "news" || $type == "page"){
					continue;
				}
				$search_postType .=  "'" . $type . "'";
			
			}
			$search_postType = str_replace("''", "','", $search_postType);
			$search .= "AND post_type in(" . $search_postType . ")";
			foreach ( $search_words as $word ) {
					if ( !empty($word) ) {
							$search_word = '%' . esc_sql( $word ) . '%';
							$search .= " AND (
								 {$wpdb->posts}.post_title LIKE '{$search_word}'
								OR {$wpdb->posts}.post_content LIKE '{$search_word}'
								OR {$wpdb->posts}.ID IN (
								SELECT distinct post_id
								FROM {$wpdb->postmeta}
								WHERE meta_value LIKE '{$search_word}'
								)
							) ";
						
					}
			}
	}
	return $search;
}
add_filter('posts_search','custom_search', 10, 2);

/**
 * カテゴリーのアーカイブページにカスタム投稿を含める
 */
if ( !function_exists( 'add_post_category_archive' ) ) {
	function add_post_category_archive( $wp_query ) {
		if ($wp_query->is_main_query() && $wp_query->is_category()) {
			$wp_query->set( 'post_type', Get_posts_types_custom());
		}
	}
}
add_action( 'pre_get_posts', 'add_post_category_archive' , 10 , 1);

/** https://techmemo.biz/wordpress/category-tag-archive-include-custompost/
 * タグのアーカイブページにカスタム投稿を含める
 */
if ( !function_exists( 'add_post_tag_archive_oldFashioned' ) ) {
	function add_post_tag_archive_oldFashioned( $wp_query ) {
		if ($wp_query->is_main_query() && $wp_query->is_tag()) {
			$wp_query->set( 'post_type', Get_posts_types_custom());
		}
	}
}
add_action( 'pre_get_posts', 'add_post_tag_archive' , 10 , 1);

//$all_widgets = wp_get_sidebars_widgets();
//var_dump($all_widgets);

/** 子テーマ作成手順に則りコピペ　:https://www.sejuku.net/blog/66461
 * CSS追加読み込み設定
 */
function theme_enqueue_styles_child() {
	
	// 開発用にCSSを強制的に読ませる設定
	$param = "";
	if(array_key_exists("mode", $_GET)){
		if($_GET["mode"] == "debug"){
			$param = "?" . date("YmdHis");
		}
	}
	
	//wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css' . $param );
	//wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' . $param, array('parent-style'));
					 
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles_child' );

/**
 * 投稿タイプ一覧取得関数を上書き
 */
function Get_posts_types(){
	return array('post', 'page', 'news');
}
function Get_posts_types_custom(){

	$post_type = Get_posts_types();

	$key = array_search('page', $post_type); // 固定ページは除く
	if(!is_bool($key)){
		unset($post_type[$key]);
	}

	$key = array_search('news', $post_type); // お知らせを除く
	if(!is_bool($key)){
		unset($post_type[$key]);
	}
	
	return $post_type;
}

include_once(get_stylesheet_directory() . "/functions/customPosts.php"); // カスタム投稿設定

function chample_latest_posts( $wp_query ) {

	if($wp_query->is_main_query() == false){ // メインクエリではない
		return;
	}elseif(is_admin()){ // 管理画面
		return;
	}

	$post_type = Get_posts_types();

	$key = array_search('page', $post_type); // 固定ページは除く
	if(!is_bool($key)){
		unset($post_type[$key]);
	}

    if ( is_home() && ! isset( $wp_query->query_vars['suppress_filters'] ) ) {

		$key = array_search('news', $post_type); // お知らせを除く
		if(!is_bool($key)){
			unset($post_type[$key]);
		}


    }elseif( is_archive()){

		$key = array_search('news', $post_type); // お知らせを除く
		if(!is_bool($key)){
			unset($post_type[$key]);
		}

		if( is_post_type_archive( 'news' ) ) {
			$post_type = array('news');
		}

	}else{
		return;
	}

	$wp_query->query_vars['post_type'] = $post_type;
}
add_action( 'parse_query', 'chample_latest_posts' );

/* wp_nav_menu関数のカスタマイズ */
// wp_nav_menuのliにclass追加
function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes['class'] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// wp_nav_menuのaにclass追加
function add_additional_class_on_a($classes, $item, $args)
{
  if (isset($args->add_a_class)) {
    $classes['class'] = $args->add_a_class;
  }
  return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);


// セッション
function my_session_start()
{
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	$_SESSION['foo'] = 'var';
}
add_action('init', 'my_session_start');

// head内にカスタム用のコードを追加する
function head_session_id()
{
	echo '<meta name="session_id" value="' . session_id() . '" />';
}
add_action('wp_head', 'head_session_id', 1);


// head内にカスタム用のコードを追加する
function head_addonem()
{
	$href = "https://central.addonem.com/embed/wdc/eventData.js?"; // . date("Y/m/d H:i:s");
	$headcustomtag = '<script type="text/javascript" id="addonem-tools.wdc" src="' . $href . ' defer"></script>';
	echo $headcustomtag;

}
add_action('wp_head', 'head_addonem', 99);
