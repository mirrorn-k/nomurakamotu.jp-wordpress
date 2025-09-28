<?php
    // ページカスタムフィールド情報
    $subTittle = SCF::get('tittle', $pageId); //var_dump($subContent);
    $subTableHead = SCF::get('header', $pageId); //var_dump($subContent);
    $subTableData = SCF::get('data', $pageId); //var_dump($subContent);
?>
<div class="content pattern03 slidein">
    <div class="side-by-side">
        <div class="clmItem">
            <h3 class="content-subtittle"><?php echo $subTittle; ?></h3>
        </div>
        <div class="clmItem table content-caption">
            <table>
                <thead>
                    <?php foreach($subTableHead as $head): // var_dump($subFields); ?>
                        <tr>
                            <th><p><?php echo $head["head1"]; ?></p></th>
                            <th><p><?php echo $head["head2"]; ?></p></th>
                        </tr>
                    <?php endforeach; ?>
                </thead>
                <tbody>
                    <?php foreach($subTableData as $data): // var_dump($subFields); ?>
                        <tr>
                            <td><p><?php echo $data['data1']; ?><p></td>
                            <td><p><?php echo $data['data2']; ?><p></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
