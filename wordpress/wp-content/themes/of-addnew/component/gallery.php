<?php
    // ページカスタムフィールド情報
    $name = SCF::get('name', $pageId);
    $caption = SCF::get('caption', $pageId);
    $gallery = SCF::get('gallery', $pageId);
?>
<div class="content pattern02 slidein">
    <div class="side-by-side description">
        <?php if($name != ""): ?>
            <div class="clmItem">
                <h3 class="content-subtittle"><?php echo $name; ?></h3> 
            </div>
        <?php endif; ?>
        <?php if($caption != ""): ?>
            <div class="clmItem">
                <p class="content-caption textAlign-left"><?php echo $caption; ?></p>
            </div>
        <?php endif; ?>
    </div>

    <?php
        $clmCount = "clm3";
        $maxIdx = 5;
        $idx = 3;
        if(count($gallery) >= 3){
            do{
                if( (count($gallery) % $idx) == ($idx - 1)  || (count($gallery) % $idx) == 0 || $idx == $maxIdx){
                    $clmCount = "clm" . $idx;
                    break;
                }
                $idx = $idx + 1;
            }while($idx <= $maxIdx);
        }
    ?>

    <div class="side-by-side <?php echo $clmCount; ?>">
        <?php foreach($gallery as $subFields): ?>
            <div class="clmItem">
                <img src="<?php echo wp_get_attachment_url($subFields['img']); ?>" alt="<?php echo strip_tags($subFields['imgName']); ?>">
                <p><?php echo $subFields['imgName']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
