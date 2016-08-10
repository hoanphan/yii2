<div id="hpage_cats">
    <?php $i = 0;
    while ($i < count($posts) - 1){
    ?>
    <?php if ($i % 2 == 0) {
    ?>
    <div class="fl_left">

        <h2><a href="#"><?= \app\models\Category::findOne($posts[$i]['category_id'])->name; ?>»</a></h2>
        <?php


        if (isset($posts[$i]))
            echo '<img src="' . $posts[$i]['picture'] . '" alt="" style="height: 100px; width: 100px">
            <p><strong><a href="' . \yii\helpers\Url::to(['site/about', 'id' =>  $posts[$i]['post_id']]) . '">' . $posts[$i]['title'] . '</a></strong></p>
            ' .  $posts[$i]['desc'] . '
        </div>'; ?>
        <?php
        }
        else{
        ?>
        <div class="fl_right">
            <h2><a href="#"><?= \app\models\Category::findOne($posts[$i+1]['category_id'])->name ?> »</a></h2>
            <?php
            if (isset($posts[$i+1]))
                echo '<img src="' . $posts[$i+1]['picture'] . '" alt="" style="height: 100px; width: 100px">
            <p><strong><a href="">' . $posts[$i+1]['title'] . '</a></strong></p>' . $posts[$i+1]['desc'] . '
        </div>'; ?>
            <br class="clear">
            <?php
            }
            ?>

            <?php $i++;
            } ?>
        </div>
    </div>
</div>
