<?php
    use app\models\Category;
?>
<div class="wrapper col2">
    <div id="topbar">
        <div id="topnav">
            <ul>
                <li class="active"><a href="">Trang chủ</a></li>
                <?php $categories=\app\models\CategoryTranslate::find()->
                innerJoin('category','category.id=category_translate.category_id')->where(['status'=>1,'language'=>'vi'])->all()?>
                <?php foreach ($categories as $category):?>
                    <li><a href="pages/style-demo.html"><?php echo $category->name?></a></li>
                <?php endforeach;?>
                <li>
                     <li class=><a  href="<?=\yii\helpers\Url::toRoute(['video'])?>">Video</a></li>
                </li>
            </ul>
        </div>
        <div id="search">
            <form action="#" method="post">
                <fieldset>
                    <legend>Site Search</legend>
                    <input value="Search Our Website…" onfocus="this.value=(this.value=='Search Our Website…')? '' : this.value ;" type="text">
                    <input name="go" id="go" value="Search" type="submit">
                </fieldset>
            </form>
        </div>
        <br class="clear">
    </div>
</div>