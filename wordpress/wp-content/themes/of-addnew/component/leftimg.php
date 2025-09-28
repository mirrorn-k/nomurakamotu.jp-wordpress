<?php
    $subContent = SCF::get('content', $pageId); //var_dump($subContent);
?>
<div class="content pattern01">
    <?php foreach($subContent as $subFields): //var_dump($subFields); ?>
        <div class="content slidein side-by-side clm2 flexDirection-rowReverse">
            <div class="cont-text clmItem">
                <h3 class="content-subtittle textAligin-left">
                    <?php echo $subFields['tittle']; ?>
                </h3>
                <?php for($idx = 1; $idx <= 3; $idx++): ?>
                    <?php if( array_key_exists('caption' . $idx, $subFields) ): ?>
                        <p class="mediaQuery min601 content-caption textAlign-left ">
                            <?php echo $subFields['caption' . $idx]; ?>
                        </p>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="cont-img clmItem">
                <img src="<?php echo wp_get_attachment_url($subFields['img']); ?>" alt="<?php echo strip_tags($subFields['tittle']); ?>">
            </div>
            <?php if( array_key_exists('link', $subFields) && $subFields['link'] != "" ) : ?>
                <div class="cont-btn clmItem position-absolute">
                    <a class="<?php echo $classColor2 ; ?> bottom position-relative" href="<?php echo $subFields['link']; ?>" >
                        <p class="label position-absolute centering"><?php echo $subFields['linkName']; ?></p>
                    </a>
                </div>
            <?php endif; ?>
        </div><!--content slidein-->
    <?php endforeach; ?>
</div>
