<?php if(post_custom('pageCaption') != ""): ?>
    <div class="container" id="zigyou-text">
        <div class="description">
            <?php
                // 値を改行で分割
                $str = str_replace(array("\r\n", "\r", "\n"), "\n", post_custom('pageCaption'));
                $values = explode("\n", $str);
            ?>
            <p>
                <?php foreach($values as $row): ?>
                    <span><?php echo $row; ?></span>
                <?php endforeach; ?>
            </p>
        </div>
    </div><!--container zigyou-text-->
<?php endif; ?>

<?php
    $fieldNameInit = "content"; 
    $fieldIdx = 1;
?>
<?php while(post_custom($fieldNameInit . $fieldIdx . "Tittle") != ""): ?>
    <?php

        // コンテンツ名
        $tittle = post_custom($fieldNameInit . $fieldIdx . "Tittle");
        if($tittle == ""){
            break;
        }

        // 偶数コンテナでは色斑点クラスを付与
        $classColor1 = "color-set01"; 
        if($fieldIdx % 2 == 0){
            $classColor1 = "color-set02";
        }
        $classColor2 = "color-set02"; 
        if($fieldIdx % 2 == 0){
            $classColor2 = "color-set01";
        }

    ?>
    <div class="container <?php if($fieldIdx % 2 == 0){ echo $classColor1; } ?>">

        <h2 class="content-tittle slidein">
            <?php echo $tittle; ?>
        </h2>

        <?php $contents = SCF::get($fieldNameInit . $fieldIdx); //var_dump($contents); ?>
        <?php foreach ($contents as $content ) : ?>
            <?php
                // カスタム投稿タイプを取得
                $pageId = $content[$fieldNameInit . $fieldIdx . 'PageId'];
                $page = get_post($pageId);
                $postType = $page->post_type;

                //echo $page->post_content;

                // コンポーネント読み込み
                require(get_stylesheet_directory() . '/component/' . $postType . ".php");
            ?>

        <?php endforeach; ?>

        <?php
            $caption = post_custom($fieldNameInit . $fieldIdx . "Caption");
        ?>
        <?php if($caption != "") :?>
            <div class="content description">
                <p class="textAlign-left">
                    <?php echo $caption; ?>
                </p>
            </div>
        <?php endif; ?>

    </div><!-- container -->
    <?php $fieldIdx++; ?>
<?php endwhile; ?>
