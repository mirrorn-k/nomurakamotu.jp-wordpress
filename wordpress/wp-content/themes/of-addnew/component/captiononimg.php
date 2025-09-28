<?php 
    // ページカスタムフィールド情報
    $imgPC = SCF::get('overPC', $pageId); 
    $imgMaxWidth = SCF::get('maxWidth', $pageId); 
    $article = SCF::get('article', $pageId); 
?>
<div class="content captiononimg ">
    <div class="inner position-relative slidein">
        <div class="position-absolute centering">
            <picture class="img-centering-fullsize central">
                <source srcset="<?php echo wp_get_attachment_url($imgMaxWidth); ?>" alt="<?php echo strip_tags($tittle); ?>" media="(max-width: 600px)" >
                <img src="<?php echo wp_get_attachment_url($imgPC); ?>" alt="<?php echo strip_tags($tittle); ?>">
            </picture>
        </div>
        <div class="text position-absolute centering">
            <?php echo $article; ?>
        </div>
    </div>
</div>
