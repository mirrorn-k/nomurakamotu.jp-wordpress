<?php // 外観カスタマイズ設定管理


/**************************************************
 トップ画
**************************************************/
function theme_customizer_topImg($wp_customize) {

	//セクション
	$wp_customize->add_section( 'key-visual', array (
	 'title' => 'キービジュアル関連',
	 'priority' => 100,
	 'description' => 'トップ画を設定します。推奨：1600 * 900<br>
	                   最大５つまで設定でき、複数指定した場合は数秒毎に自動で切り替わります。
	                   フロントページ以外では一つ目の画像が低い高さで表示します。',
	));
	
	/** 背景画像 */
    $name = "key-visual_img_background";
	//テーマ設定
	$wp_customize->add_setting( $name , array (
		$name => 'null',
	));

	//コントロール
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,  $name, array(
		'section' => 'key-visual',
		'settings' => $name,
		'label' =>'背景画像',
		'priority' => 60,
	)));

	/** 先頭画像 */
    $name = "key-visual_img_front";
	//テーマ設定
	$wp_customize->add_setting( $name , array (
		$name => 'null',
	));

	//コントロール
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,  $name, array(
		'section' => 'key-visual',
		'settings' => $name,
		'label' =>'先頭画像',
		'priority' => 60,
	)));


	/**スタイダーに設定する画像 */
	for($idx = 1; $idx <= 5; $idx++){
	
		$idx_char = str_pad( $idx , 2, 0, STR_PAD_LEFT);
		
		 //テーマ設定
		 $wp_customize->add_setting( 'key-visual_img' . $idx_char , array (
			'key-visual_img' . $idx_char => 'null',
		));
		
		//コントロール
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,  'key-visual_img' . $idx_char, array(
			'section' => 'key-visual',
			'settings' => 'key-visual_img' . $idx_char,
			'label' =>'トップ画像' . $idx_char,
			'priority' => 60,
		)));
	}
	
}
add_action('customize_register', 'theme_customizer_topImg');
function get_the_topImgInfo(){

	$ary_imgUrl = array();

	/** 背景画像とフロント画像を取得 */
	$ary_imgUrl["background"] = get_theme_mod( 'key-visual_img_background' );
	$ary_imgUrl["front"] = get_theme_mod( 'key-visual_img_front' );

	for($idx = 1; $idx <= 5; $idx++){
	
		$idx_char = str_pad( $idx , 2, 0, STR_PAD_LEFT);
		$idx_val = get_theme_mod( 'key-visual_img' . $idx_char );
		
		if($idx_val == null){
			continue;
		}
		$ary_imgUrl[$idx_char] = get_theme_mod( 'key-visual_img' . $idx_char );
	}

	if(count($ary_imgUrl) == 0){ // 一つも設定していない場合、デフォルト画像をセット
		$ary_imgUrl[0] = Get_defaultImg();
	}
	
    foreach($ary_imgUrl as $idx => $url){
        $ary_imgUrl[$idx] = str_replace("http://", "https://", $ary_imgUrl[$idx]);
    }

	return $ary_imgUrl;
}


/**************************************************
 お知らせ：トピックリンク
**************************************************/
function theme_customizer_topickInfo($wp_customize) {

	//セクション
	$wp_customize->add_section( 'topick', array (
	 'title' => 'トピック',
	 'priority' => 120,
	 'description' => 'お知らせの右横（または下）にリンク付きの画像を設定します。<br>
	                   リンク無しも可能です。',
	));
	
	for($idx = 1; $idx <= 2; $idx++){
	
		$idx_char = str_pad( $idx , 2, 0, STR_PAD_LEFT);
		$settingName = 'topick' . $idx_char . "_img";

		 //画像について
		 $wp_customize->add_setting( $settingName , array (
			$settingName => 'null',
			
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,  $settingName , array(
			'section' => 'topick',
			'settings' => $settingName,
			'label' =>'画像' . $idx_char,
			'priority' => 60,
		)));

		// 表示位置
		/*
		$ary_position = array("top", "bottom", "left", "right");
		foreach($ary_position as $key => $value){

			$settingName = 'topick' . $idx_char . "_" . $value ;
			$keyName = '画像' . $idx_char . "位置:" . $value . "(px)";

			$wp_customize->add_setting( $settingName , array (
				$settingName => 'null',
			));
			$wp_customize->add_control( $settingName, array(
				'section' => 'topick',
				'settings' => $settingName,
				'label' => $keyName,
				'type' => 'number', 
				'priority' => 60,
			));
		}
		*/

		// リンクについて
		$settingName = 'topick' . $idx_char . "_link";

		$wp_customize->add_setting( $settingName , array (
			$settingName => 'null',
		));
		$wp_customize->add_control( $settingName, array(
			'section' => 'topick',
			'settings' => $settingName,
			'label' =>'リンク' . $idx_char,
			'type' => 'url', 
			'priority' => 60,
		));

		// ホバー時のテキスト
		$settingName = 'topick' . $idx_char . "_text";

		$wp_customize->add_setting( $settingName , array (
			$settingName => 'null',
		));
		$wp_customize->add_control( $settingName, array(
			'section' => 'topick',
			'settings' => $settingName,
			'label' =>'ホバーテキスト' . $idx_char,
			'type' => 'text', 
			'priority' => 60,
		));
	}
	
}
add_action('customize_register', 'theme_customizer_topickInfo');
function get_the_topickInfo(){

	$ary_result = array();

	$ary_position = array("img", "top", "bottom", "left", "right", "link", "text");
	for($idx = 1; $idx <= 2; $idx++){
	
		$idx_char = str_pad( $idx , 2, 0, STR_PAD_LEFT);
		$keyVal = 'topick' . $idx_char . "_";

		foreach($ary_position as $key => $value){

			$settingName = $keyVal . $value;
			$idx_val = get_theme_mod( $settingName );
			if($idx_val == ""){
				continue;
			}elseif($idx_val == null){
				continue;
			}

			$ary_result[$idx][$value] = $idx_val;

		}
		
	}
	return $ary_result;
}

/**************************************************
 フロントページ
**************************************************/
function theme_customizer_postsInfo($wp_customize) {

	$sectionName = "posts";

	//セクション
	$wp_customize->add_section( $sectionName, array (
	 'title' => "フロントページ",
	 'priority' => 130,
	 'description' => 'フロントページに関すること',
	));

	$settingName = $sectionName . "_title";

	$wp_customize->add_setting( $settingName , array (
		$settingName => '投稿一覧',
		
	));
	$wp_customize->add_control($settingName , array(
		'section' => $sectionName,
		'settings' => $settingName,
		'label' =>'タイトル',
		'priority' => 60,
	));

	
	$settingName = $sectionName . "_poweredBy";

	//画像について
	$wp_customize->add_setting( $settingName , array (
		$settingName => 'null',
		
	));
	$wp_customize->add_control($settingName , array(
		'section' => $sectionName,
		'settings' => $settingName,
		'label' =>'運営元',
		'priority' => 60,
	));


}
add_action('customize_register', 'theme_customizer_postsInfo');
function get_the_postsInfo(){

	$sectionName = "posts";

	$ary_result = array();

	$keyword = 'title'; $ary_result[$keyword] = get_theme_mod( $sectionName . "_" . $keyword );
	$keyword = 'poweredBy'; $ary_result[$keyword] = get_theme_mod( $sectionName . "_" . $keyword );
	return $ary_result;
}
