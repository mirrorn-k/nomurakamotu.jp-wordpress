<?php

	$frontWidget = array(
		'name' => 'トップページ用',
		'id' => 'front-widget_main',
	);

	$frontWidget_left = array(
		'name' => 'トップページ(左)用',
		'id' => 'front-widget_left',
	);

	$frontWidget_right = array(
		'name' => 'トップページ(右)用',
		'id' => 'front-widget_right',
	);

	$sideWidget01 = array(
		'name' => 'サイドバー用 01',
		'id' => 'wedget_sidbar01',
		'before_widget' => '<div class="widget sidebar">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	);

	$sideWidget02 = array(
		'name' => 'サイドバー用 02',
		'id' => 'wedget_sidbar02',
		'before_widget' => '<div class="widget sidebar">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	);

	$sideWidget03 = array(
		'name' => 'サイドバー用 03',
		'id' => 'wedget_sidbar03',
		'before_widget' => '<div class="widget sidebar">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	);
	
	$footerWidget01 = array(
		'name' => 'フッタ用 01',
		'id' => 'wedget_footer01',
		'before_widget' => '<div class="widget footer">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	);

	$footerWidget02 = array(
		'name' => 'フッタ用 02',
		'id' => 'wedget_footer02',
		'before_widget' => '<div class="widget footer">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	);

	if ( function_exists( 'register_sidebar' ) ) {
		register_sidebar( $frontWidget );
		register_sidebar( $frontWidget_left );
		register_sidebar( $frontWidget_right );
		register_sidebar( $sideWidget01 );
		register_sidebar( $sideWidget02 );
		register_sidebar( $sideWidget03 );
		register_sidebar( $footerWidget01 );
		register_sidebar( $footerWidget02 );
	}