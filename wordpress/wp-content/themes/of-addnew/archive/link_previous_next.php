<!-- oldFashioned/archive/link_previous_next.php.php -->
<?php
$prev = get_previous_posts_link();
$next = get_next_posts_link();
?>
<?php if ( $prev ) : // 前のページが存在する場合 ?>
    <a href="<?php echo $prev; ?>"><pre><前頁</pre></a>
<?php endif; ?>
<?php if($next): // 次のページが存在する場合 ?>
    <a href="<?php echo $prev; ?>"><pre>前頁></pre></a>
<?php endif; ?>