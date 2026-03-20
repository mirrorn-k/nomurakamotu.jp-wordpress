<!-- oldFashioned/archive/view_except_postType_news.php -->
<div id="primary" class="content-area side-by-side">
<main id="main" class="site-main" role="main">
<section class="items">

	<?php if ( have_posts() ) : ?>
		<?php while( have_posts() ) : the_post(); //var_dump($post);?>

      <?php
        // アイキャッチ画像を取得
        $imgSrc = get_stylesheet_directory_uri() . '/default/noimage.gif';
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $thumb_url = wp_get_attachment_image_src($thumbnail_id, 'small');
        if ($thumb_url[0] != "") {
          $imgSrc = $thumb_url[0];
        }
        
        // 投稿タイプ情報を取得
        $postType_obj = array();
        if($post->post_type != 'post' && $post->post_type != 'page'){
          $postType_obj = get_post_type_object($post->post_type);
        }

        // タグを取得
        $tags = array();
        $tags = get_the_tags($post->ID);
        //var_dump( $tags );
        
        $categories = get_the_category( $post->ID );
        //var_dump( $categories );
        
        // ターム名を表示
        $terms = get_the_terms($post->ID, 'category'); // タームが所属するタクソノミースラッグを指定

      ?>

      <section class="item">
        <section class="title">
          <p class="date"><?php the_time('Y.m.d') ?></p>
          <h2 class="running-bottomLine from-left to-right thickness-4">
              <a href="<?php echo get_permalink($post->ID); ?>">
                  <?php echo get_the_title($post->ID); ?>
              </a>
          </h2>
        </section>
        <section class="contents side-by-side ">
          <figure class="thumbnail">
            <a href="<?php echo get_permalink($post->ID); ?>">
              <img src="<?php echo $imgSrc; ?>"alt="">
            </a>
          </figure>
          <section class="caption">
            <div class="categories">
              <h3>カテゴリ</h3>
              <ul class="side-by-side no-justify">
                <?php if ($postType_obj) : ?>
                  <li class="post-type">
                    <a href="<?php echo get_post_type_archive_link( $post->post_type ); ?>">
                    <?php echo $postType_obj->labels->name; ?>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if ( $categories ) : ?>
                  <?php foreach ( $categories as $category ) : ?>
                    <li class="category">
                      <a href="<?php echo get_category_link($category->term_id ); ?>">
                        <?php echo $category->name; ?>
                      </a>
                    </li>
                  <?php endforeach ; ?>
                <?php endif ; ?>
              </ul>
            </div>

            <div class="tags">
              <h3>タグ</h3>
              <ul class="side-by-side no-justify">
                <?php if ( $tags ) : ?>
                  <?php foreach ( $tags as $tag ) : ?>
                    <li class="tag">
                      <a href="<?php echo get_tag_link($tag->term_id ); ?>">
                        <?php echo $tag->name; ?>
                      </a>
                    </li>
                  <?php endforeach ; ?>
                <?php endif ; ?>
              </ul>
            </div>
          </section>
        </section>
			</section>

		<?php endwhile; ?>

    <?php the_posts_pagination(); ?>

	<?php else: ?>
		
		<p>申し訳ございません。<br />該当する記事がございません。</p>
	<?php endif; ?>


</section>


<?php //include(get_stylesheet_directory() . "/archive/link_previous_next.php"); // ページ送り機能 ?>

</main>
<?php get_sidebar(); ?>
</div><!-- #primary -->