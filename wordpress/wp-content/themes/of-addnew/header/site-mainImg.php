
<?php 

// カスタマイズから取得
$aryImg = get_the_topImgInfo();


$img_background = $aryImg["background"]; unset($aryImg["background"]);
$img_front = $aryImg["front"]; unset($aryImg["front"]); 

$className = "";
$className = "frontpage";
$sliderParentClassName = "";

if(count($aryImg) > 1){
    $className = $className . " img-ary ";
    $sliderParentClassName = "slider";
}else{
    $className = $className . " img-only textAlign-center";
}

?>
<div class="mainImg <?php echo $className; ?>">

    <img class="background" src="<?php echo $img_background; ?>" />
    <img class="front" src="<?php echo $img_front; ?>" />
    
    <ul class="<?php echo $sliderParentClassName; ?>">
        <?php 
            foreach($aryImg as $key => $imgUrl): 
            
                // urlからメディアIDを取得し、
                $postID = attachment_url_to_postid($imgUrl);
                $alt = get_post_meta($postID, '_wp_attachment_image_alt', true);

        ?>
            
            <li class=""><!--<a href="#">--><img src="<?php echo $imgUrl; ?>" alt="<?php echo $alt; ?>"><!--</a>--></li>
        <?php endforeach;?>
        
    </ul>

</div>
