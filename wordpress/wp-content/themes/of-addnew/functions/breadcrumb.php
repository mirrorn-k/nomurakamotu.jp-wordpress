<?php
/* 参考URL：https://cotodama.co/wordpress_breadcrumb/
    breadcrumbを呼ぶと、呼び出し位置にパンくずリストを出力する。(echo不要)
    投稿ページの場合の場合、内部でカスタム投稿タイプを判定する。
    カスタム投稿であればlabel名をカテゴリのように扱い表示し、アーカイブページのリンクを貼る
*/


// パンくずリスト
function breadcrumb() {
	echo "<!-- breadcrumb() -->";
    $home = '<li><a href="'.get_bloginfo('url').'" >HOME</a></li>';
  
    echo '<ul class="breadcrumb">';
    if ( is_front_page() ) {
        // トップページの場合
    }
    else if ( is_category() ) {

        // カテゴリページの場合
        $cat = get_queried_object();
        $cat_id = $cat->parent;
        $cat_list = array();
        while ($cat_id != 0){
            $cat = get_category( $cat_id );
            $cat_link = get_category_link( $cat_id );
            array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
            $cat_id = $cat->parent;
        }
        echo $home;
        foreach($cat_list as $value){
            echo $value;
        }
        the_archive_title('<li>', '</li>');

    }else if(is_tag()){

        echo $home;
        echo "<li>" . single_tag_title("", false) . "</li>";

    }
    else if ( is_archive() ) {

        // 月別アーカイブ・タグページの場合
        $cat_list = array();

        $cat_name = get_post_type_object(get_post_type())->label;
        
        // カスタム投稿タイプはここに追加
        if(get_post_type() != 'post' && get_post_type() != 'page'){
            
            $cat_name = get_post_type_object(get_post_type())->label;
            //$cat_link = get_post_type_archive_link( get_post_type() );
            //echo $cat_name . ":" . $cat_link;
            array_unshift( $cat_list, '<li><a >'.$cat_name.'</a></li>' );

        }elseif(get_post_type() == 'post'){
            $cat_name = get_the_postsInfo()['title'];
            
            array_unshift( $cat_list, '<li><a>'.$cat_name.'</a></li>' );

        }

        echo $home;
        foreach($cat_list as $value){
            echo $value;
        }
    }
    else if ( is_single() ) {
        // 投稿ページの場合
        $cat_list = array();
        
        // 投稿タイトル
        /*
        $titleName = get_post()->post_title;
        if($titleName == ""){
            $titleName = "(no title)";
        }
        array_unshift( $cat_list, '<li><a>'.$titleName.'</a></li>' );
		*/
		
        // カスタム投稿タイプはここに追加
        if(get_post_type() != 'post' && get_post_type() != 'page'){
            $cat_name = get_post_type_object(get_post_type())->label;
            $cat_link = get_post_type_archive_link( get_post_type() );
            //echo $cat_name . ":" . $cat_link;
            array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat_name.'</a></li>' );
        
        }else{

            $cat = get_the_category();
            if( isset($cat[0]->cat_ID) ) $cat_id = $cat[0]->cat_ID;
            while ($cat_id != 0){
                $cat = get_category( $cat_id );
                $cat_link = get_category_link( $cat_id );
                array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
                $cat_id = $cat->parent;
                
            }            
        }
        echo $home;
        foreach($cat_list as $value){
            echo $value;
        }
    }
    else if( is_page() ) {
        // 固定ページの場合
        echo $home;

        // タイトル
        the_title('<li>', '</li>');
    }
    else if( is_search() ) {
        // 検索ページの場合
        echo $home;
        echo '<li>「'.get_search_query().'」の検索結果</li>';
    }
    else if( is_404() ) {
        // 404ページの場合
        echo $home;
        echo '<li>ページが見つかりません</li>';
    }
    echo "</ul>";
}
 
// アーカイブの余計なタイトルを削除
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_month() ) {
        $title = single_month_title( '', false );
    }
    return $title;
});
