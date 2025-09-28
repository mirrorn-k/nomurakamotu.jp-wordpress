<div class="mainImg no-frontpage stack-caption img-centering-fullsize central color-set02">
    <?php 
        $thubnailImgUrl = get_the_post_thumbnail_url();
        if($thubnailImgUrl == null || $thubnailImgUrl == ""){
            $thubnailImgUrl = "https://nomurakamotsu.jp/wp-content/uploads/2023/02/4b048632b26f346eef15c19fcc4d4094.jpg";
        }
	
		function getTitle($wp_query, $post){
			if ( is_category() ) {
                    echo "カテゴリー：";
                    echo get_queried_object()->name;

                }elseif(is_tag()){
                    echo "タグ：";
                    echo get_queried_object()->name;

                }elseif( is_archive() ) {
                    /*echo "記事一覧：";*/
                    if(count($wp_query->query_vars['post_type']) == 1){
                        echo get_queried_object()->label;
                    }else{
                        echo "全て";
                    }
                    
                }else if( is_search() ) {
                    echo get_search_query() . "の検索結果 : " . $wp_query->found_posts . "件";

                }else if( is_404() ) {
                    // 404ページの場合
                    echo "404:Not Found";
                
                }else if( get_post_type( $post ) == "news" ) {
                    // 404ページの場合
                    echo "お知らせ";
                
                }else{
                    the_title();
                }
		}
    ?>
    <img src="<?php echo $thubnailImgUrl; ?>" alt="<?php the_title(); ?>" />

    <div class="mask">
        <title><?php echo getTitle($wp_query, $post); ?></title>
		<h1 class="caption"><span><?php echo getTitle($wp_query, $post); ?></span></h1>
    </div>
</div>
