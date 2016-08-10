<?php
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use app\models\Simplehtmldom;
$bundel = AppAsset::register($this);
?>

<div style="margin-top: 30px;"></div>

<div class="container">
    <?php if (count($models) > 0): ?>
        <div class="content">
            <div id="featured_slide">
                <div class="gallery" id="featurednews"
                     style="visibility: visible; padding: 0px; position: relative; width: 630px; height: 387px;">
                    <div
                        style="width: 600px; height: 280px; position: absolute; overflow: hidden; top: 15px; left: 15px; display: block; opacity: 0.934975;"
                        class="panel"><img style="height: 280px; width: 600px; position: relative; top: 0px; left: 0px;"
                                           src="<?= $models[0]->image ?>">
                        <div style="position: absolute; z-index: 999; width: 580px; left: 0px; bottom: 0px;"
                             class="panel-overlay">

                        </div>
                        <div
                            style="position: absolute; z-index: 998; width: 600px; left: 0px; opacity: 0.7; bottom: 0px;"
                            class="overlay-background"></div>
                    </div>
                    <div
                        style="position: absolute; overflow: hidden; top: 295px; left: 50px; width: 530px; height: 77px;"
                        class="strip_wrapper">
                        <ul class="filmstrip"
                            style="visibility: visible; margin: 0px; list-style: outside none none; padding: 0px; width: 535px; position: absolute; z-index: 900; top: 0px; left: 0px; height: 77px;">
                            <li style="float: left; position: relative; height: 62px; width: 102px; z-index: 901; padding: 0px; cursor: pointer; margin-top: 15px; margin-right: 5px;"
                                class="frame current">
                                <div
                                    style="height: 60px; width: 100px; position: relative; top: 0px; left: 0px; overflow: hidden;"
                                    class="img_wrap"><img
                                        style="opacity: 0.954482; height: 60px; width: 128.571px; position: relative; top: 0px; left: -14.2857px;"
                                        src="<?= $models[0]->image ?>" alt=""></div>

                            </li>
                            <li style="float: left; position: relative; height: 62px; width: 102px; z-index: 901; padding: 0px; cursor: pointer; margin-top: 15px; margin-right: 5px;"
                                class="frame">
                                <div
                                    style="height: 60px; width: 100px; position: relative; top: 0px; left: 0px; overflow: hidden;"
                                    class="img_wrap"><img
                                        style="opacity: 0.3; height: 60px; width: 128.571px; position: relative; top: 0px; left: -14.2857px;"
                                        src="<?= $models[1]->image ?>" alt=""></div>

                            </li>
                        </ul>
                    </div>

                    <div
                        style="position: absolute; z-index: 32666; opacity: 1; top: 0px; left: 0px; width: 630px; height: 387px; display: none;"
                        class="loader"></div>
                    <div
                        style="position: absolute; z-index: 1000; width: 0px; font-size: 0px; line-height: 0%; border-width: 0px; border-style: solid; top: 310px; left: 128.831px; border-top: 0px solid transparent; border-right: 0px solid transparent; border-left: 0px solid transparent;"
                        class="pointer"></div>
                    <img style="position: absolute; cursor: pointer; top: 330px; right: 23px;"
                         src="<?= $bundel->baseUrl ?>/layout/scripts/galleryviewthemes//themes/dark/next.gif"
                         class="nav-next"><img style="position: absolute; cursor: pointer; top: 330px; left: 23px;"
                                               src="<?= $bundel->baseUrl ?>/layout/scripts/galleryviewthemes//themes/dark/prev.gif"
                                               class="nav-prev"></div>
            </div>
        </div>
        <div class="column" style="float: left;margin-left: 30px">
            <ul class="latestnews">
                <?php foreach ($models as $model): ?>
                    <li><img src="<?= $model->image; ?>" alt="" style="height: 100px;width: 100px">
                            <strong>
                                <a href="<?= \yii\helpers\Url::toRoute(['view','id'=>$model->id])?>"><?= $model->title; ?></a>
                            </strong><?= $model->description; ?>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="wrapper">

                <div class="fl_left"><a href="#"><img src="<?php echo $bundel->baseUrl?>/images/demo/468x60.gif" alt=""></a></div>
                <div class="fl_right"><a href="#"><img src="<?php echo $bundel->baseUrl?>/images/demo/468x60.gif" alt=""></a></div>
                <br class="clear">
            <div id="hpage_cats">
                <?php for ($i=0;$i<count($files);$i++):?>
                    <?php if($i%2==0):?>
                    <div class="fl_left">
                        <h2><a href="#"><?= $files[$i]->topic; ?> »</a></h2>
                        <img src="<?= $files[$i]->image; ?>" style="height: 100px;width: 100px"  alt="">
                        <p><strong><a href="<?= \yii\helpers\Url::toRoute(['view','id'=> $files[$i]->id])?>"><?=  $files[$i]->title; ?></a></strong></p>
                        <p><?=  Simplehtmldom::substring($files[$i]->description); ?></p>
                    </div>
                   <? else:?>
                    <div class="fl_right">
                        <h2><a href="#"><?= $files[$i]->topic; ?> »</a></h2>
                        <img src="<?= $files[$i]->image; ?>"  style="height: 100px;width: 100px" alt="">
                        <p><strong><a href="<?= \yii\helpers\Url::toRoute(['view','id'=> $files[$i]->id])?>"><?=  $files[$i]->title; ?></a></strong></p>
                        <p><?=  Simplehtmldom::substring($files[$i]->description); ?></p>
                    </div>
                    <br class="clear">
                    <?php endif;?>
                <?php endfor;?>


            </div>
        </div>

    <?php endif; ?>

    <br class="clear">
</div>
