<?php
use app\assets\AppAsset;
use app\models\Simplehtmldom;
use app\models\Category;
use app\models\Post;
$categories=Category::find()->where(['status'=>1])->all();
$bundel = AppAsset::register($this);
$i=0;
?>
<div class="wrapper">
    <div class="container">
        <div class="content">
            <div id="featured_slide">
                <div class="gallery" id="featurednews"
                     style="visibility: visible; padding: 0px; position: relative; width: 630px; height: 387px;">
                    <div
                        style="width: 600px; height: 280px; position: absolute; overflow: hidden; top: 15px; left: 15px; display: none;"
                        class="panel"><img style="height: 280px; width: 600px; position: relative; top: 0px; left: 0px;"
                                           src="<?= $hots[2]->image ?>">
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
                                class="frame">
                                <div
                                    style="height: 60px; width: 100px; position: relative; top: 0px; left: 0px; overflow: hidden;"
                                    class="img_wrap"><img
                                        style="opacity: 0.3; height: 60px; width: 128.571px; position: relative; top: 0px; left: -14.2857px;"
                                        src="<?=$hots[2]->image ?>" alt=""></div>

                            </li>
                            <li style="float: left; position: relative; height: 62px; width: 102px; z-index: 901; padding: 0px; cursor: pointer; margin-top: 15px; margin-right: 5px;"
                                class="frame">
                                <?php foreach ($hots as $hot): ?>
                                <div
                                    style="height: 60px; width: 100px; position: relative; top: 0px; left: 0px; overflow: hidden;"
                                    class="img_wrap"><img
                                        style="opacity: 0.3; height: 60px; width: 128.571px; position: relative; top: 0px; left: -14.2857px;"
                                        src="<?= $hot->image ?>" alt="">
                                </div>
                                <?php endforeach;?>
                            </li>
                        </ul>
                    </div>
                    <div
                        style="position: absolute; z-index: 32666; opacity: 1; top: 0px; left: 0px; width: 630px; height: 387px; display: none;"
                        class="loader"></div>
                    <div
                        style="position: absolute; z-index: 1000; width: 0px; font-size: 0px; line-height: 0%; border-width: 0px; border-style: solid; top: 310px; left: 315px; border-top: 0px solid transparent; border-right: 0px solid transparent; border-left: 0px solid transparent;"
                        class="pointer"></div>
                    <img style="position: absolute; cursor: pointer; top: 330px; right: 23px;"
                         src="<?= $bundel->baseUrl ?>/layout/scripts/galleryviewthemes//themes/dark/next.gif"
                         class="nav-next"><img style="position: absolute; cursor: pointer; top: 330px; left: 23px;"
                                               src="<?= $bundel->baseUrl ?>/layout/scripts/galleryviewthemes//themes/dark/prev.gif"
                                               class="nav-prev"></div>
            </div>
        </div>
        <div class="column">
            <ul class="latestnews">
                <?php foreach ($hots as $hot): ?>
                    <li><img src="<?= $hot->image ?>" alt="" style="height: 100px;width: 100px">
                        <p><strong><a href="#"><?= $hot->title ?>
                                    .</a></strong><?= Simplehtmldom::substring($hot->description) ?> .</p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <br class="clear">
    </div>
</div>
<div class="wrapper">
    <div id="adblock">
        <div class="fl_left"><a href="#"><img src="<?= $bundel->baseUrl ?>/images/demo/468x60.gif" alt=""></a></div>
        <div class="fl_right"><a href="#"><img src="<?= $bundel->baseUrl ?>/images/demo/468x60.gif" alt=""></a></div>
        <br class="clear">
    </div>
    <div id="hpage_cats">
        <?php for ($i=0;$i<count($categories);$i++):?>
        <?php if($i%2==0):?>
        <div class="fl_left">
            <h2><a href="#"><?= $categories[$i]->name?> »</a></h2>

            <?php
                $post=Post::getPostForCategory($categories[$i]->id);
            if($post!=null):?>
             <!--   <img src="<?/*=$post->image */?> " style="height: 100px;width: 100px" alt="">-->
                <p><strong><a href="#">Indonectetus facilis leo.</a></strong></p>
                <p>This is a W3C standards compliant free website template from <a href="http://www.os-templates.com/">OS
                        Templates</a>. For more CSS templates visit <a href="http://www.os-templates.com/">Free Website
                        Templates</a>. Condimentumfelis et amet tellent quisquet a leo lacus nec augue accumsan
                    sagittislaorem dolor sum at urna.</p>
                <?php endif;?>
        </div>
        <?php else:?>
        <div class="fl_right">
            <h2><a href="#">Technology »</a></h2>
            <img src="<?= $bundel->baseUrl ?>/images/demo/100x100.gif" alt="">
            <p><strong><a href="#">Indonectetus facilis leo.</a></strong></p>
            <p>This template is distributed using a <a href="http://www.os-templates.com/template-terms">Website
                    Template Licence</a>, which allows you to use and modify the template for both personal and
                commercial use when you keep the provided credit links in the footer.</p>
        </div>
        <br class="clear">
        <?php endif;?>
        <?php endfor;?>
    </div>
</div>