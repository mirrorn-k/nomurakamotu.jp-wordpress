<?php 
    // ページカスタムフィールド情報
    $subData = SCF::get('data', $pageId); 
?>
<div class="content pattern-table">

    <?php foreach($subData as $val): ?>
        <?php
            // 値を改行で分割
            $str = str_replace(array("\r\n", "\r", "\n"), "\n", $val['value']);
            $values = explode("\n", $str);
        ?>
        <div class="side-by-side slidein <?php if($fieldIdx % 2 == 0){ echo $classColor2; } ?>">
            <div class="clmItem position-relative rowHead">
                <h3 class="position-absolute"><?php echo $val['head']; ?></h3>
            </div>
            <div class="clmItem textAlign-left rowDate">
                <?php foreach($values as $row): ?>
                    <p><?php echo $row; ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

</div>
