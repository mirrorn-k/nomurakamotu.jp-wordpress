<?php

/**
 * カスタム投稿：お知らせ
 */
function create_postType_news(){
  //カスタム投稿タイプがダッシュボードの編集画面で使用する項目を配列で用意
  $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'revisions'
  );
  //カスタム投稿タイプを追加するための関数
  //第一引数は任意のカスタム投稿タイプ名
  register_post_type('news',
    array(
      'label' => 'お知らせ',
      'public' => true,        //フロントエンド上で公開する場合true
      'has_archive' => true,   //アーカイブページを表示したい場合true
      'menu_position' => 5,    //メニューを表示させる場所
      'supports' => $supports, //ダッシュボードの編集画面で使用する項目
      'show_in_rest' => true,  // ブロックエディターを使用するための必要な記述
    )
  );
}
add_action('init','create_postType_news');


// カテゴリーアーカイブにカスタム投稿タイプを含める方法
function add_post_category_archive( $wp_query ) {
  if ($wp_query->is_main_query() && $wp_query->is_category()) {
    $wp_query->set('post_type', array('post'));
  }
}
add_action( 'pre_get_posts', 'add_post_category_archive' , 10 , 1);

	
// タグアーカイブにカスタム投稿タイプを含める方法
function add_post_tag_archive( $wp_query ) {
  if ($wp_query->is_main_query() && $wp_query->is_tag()) {
    $wp_query->set( 'post_type', array('post'));
  }
}
add_action( 'pre_get_posts', 'add_post_tag_archive' , 10 , 1);


/**
 * カスタム投稿：パターン説明：左画像
 */
function create_postType_leftImg(){
  //カスタム投稿タイプがダッシュボードの編集画面で使用する項目を配列で用意
  $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'revisions'
  );
  //カスタム投稿タイプを追加するための関数
  //第一引数は任意のカスタム投稿タイプ名
  register_post_type('leftImg',
    array(
      'label' => '説明文（左画像）',
      'public' => true,        //フロントエンド上で公開する場合true
      'has_archive' => true,   //アーカイブページを表示したい場合true
      'menu_position' => 31,    //メニューを表示させる場所
      'supports' => $supports, //ダッシュボードの編集画面で使用する項目
      'show_in_rest' => true,  // ブロックエディターを使用するための必要な記述
    )
  );
}
add_action('init','create_postType_leftImg');

/**
 * カスタム投稿：パターン説明：左画像
 */
function create_postType_gallery(){
  //カスタム投稿タイプがダッシュボードの編集画面で使用する項目を配列で用意
  $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'revisions'
  );
  //カスタム投稿タイプを追加するための関数
  //第一引数は任意のカスタム投稿タイプ名
  register_post_type('gallery',
    array(
      'label' => '画像ギャラリー',
      'public' => true,        //フロントエンド上で公開する場合true
      'has_archive' => true,   //アーカイブページを表示したい場合true
      'menu_position' => 32,    //メニューを表示させる場所
      'supports' => $supports, //ダッシュボードの編集画面で使用する項目
      'show_in_rest' => true,  // ブロックエディターを使用するための必要な記述
    )
  );
}
add_action('init','create_postType_gallery');

/**
 * カスタム投稿： 右テーブル
 */
function create_postType_rightTable(){
  //カスタム投稿タイプがダッシュボードの編集画面で使用する項目を配列で用意
  $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'revisions'
  );
  //カスタム投稿タイプを追加するための関数
  //第一引数は任意のカスタム投稿タイプ名
  register_post_type('rightTable',
    array(
      'label' => '右テーブル',
      'public' => true,        //フロントエンド上で公開する場合true
      'has_archive' => true,   //アーカイブページを表示したい場合true
      'menu_position' => 33,    //メニューを表示させる場所
      'supports' => $supports, //ダッシュボードの編集画面で使用する項目
      'show_in_rest' => true,  // ブロックエディターを使用するための必要な記述
    )
  );
}
add_action('init','create_postType_rightTable');

/**
 * カスタム投稿： 画像上文章
 */
function create_postType_captionOnImg(){
  //カスタム投稿タイプがダッシュボードの編集画面で使用する項目を配列で用意
  $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'revisions'
  );
  //カスタム投稿タイプを追加するための関数
  //第一引数は任意のカスタム投稿タイプ名
  register_post_type('captiononimg',
    array(
      'label' => '画像の上文章',
      'public' => true,        //フロントエンド上で公開する場合true
      'has_archive' => true,   //アーカイブページを表示したい場合true
      'menu_position' => 34,    //メニューを表示させる場所
      'supports' => $supports, //ダッシュボードの編集画面で使用する項目
      'show_in_rest' => true,  // ブロックエディターを使用するための必要な記述
    )
  );
}
add_action('init','create_postType_captionOnImg');

/**
 * カスタム投稿： テーブルレイアウト
 */
function create_postType_tableLayout(){
  //カスタム投稿タイプがダッシュボードの編集画面で使用する項目を配列で用意
  $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'revisions'
  );
  //カスタム投稿タイプを追加するための関数
  //第一引数は任意のカスタム投稿タイプ名
  register_post_type('tablelayout',
    array(
      'label' => 'テーブルレイアウト',
      'public' => true,        //フロントエンド上で公開する場合true
      'has_archive' => true,   //アーカイブページを表示したい場合true
      'menu_position' => 35,    //メニューを表示させる場所
      'supports' => $supports, //ダッシュボードの編集画面で使用する項目
      'show_in_rest' => true,  // ブロックエディターを使用するための必要な記述
    )
  );
}
add_action('init','create_postType_tableLayout');
