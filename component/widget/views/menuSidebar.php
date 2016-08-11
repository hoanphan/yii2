<?php
    use app\models\Category;
?>
<div class="wrapper col2">
    <div id="topbar">
        <div id="topnav">
            <ul>
                <li class="active"><a href="">Trang chủ</a></li>
                <?php $categories=Category::find()->where(['status'=>1])->all()?>
                <?php foreach ($categories as $category):?>
                    <li><a href="pages/style-demo.html"><?php echo $category->name?></a></li>
                <?php endforeach;?>

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