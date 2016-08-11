<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\component\widget\TopNavigation;
use app\component\widget\MenuSidebar;
use app\component\widget\Footer;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div>
    <?=TopNavigation::widget()?>
    <?=MenuSidebar::widget()?>
    <?php echo $content?>
    <?=Footer::widget()?>
</div>
<div></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

