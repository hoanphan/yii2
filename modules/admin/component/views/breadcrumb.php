<?php use navatech\language\widgets\LanguageWidget;

?>
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#"><?php echo yii::$app->controller->id?></a>
        </li>
        <li class="active"><?php echo yii::$app->controller->action->id?></li>
    </ul><!-- /.breadcrumb -->

    <div class="nav-search" id="nav-search">
        <form class="form-search">
								<?php echo LanguageWidget::widget([
                                    //TODO type of widget ("selector" or "classic")
                                    'type'     => 'selector',
                                    //TODO uncommented to change size, default: 30, means width 30px & height 30px for every flag, from 10 to 300
                                    //'size'     => 30,
                                    //TODO uncommented to customize widget view
                                    //'viewDir' => '@vendor/navatech/yii2-multi-language/src/views/LanguageWidget',
                                ]);?>
        </form>
    </div><!-- /.nav-search -->
</div>