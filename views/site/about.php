<?php
use app\assets\AppAsset;
use yii\widgets\ActiveForm;

$bundel = AppAsset::register($this);
?>

<div class="wrapper">
    <div class="container">
        <h1><?= $post->title ?></h1>

        <p><?= $post->desc ?></p>
        <p><?= $post->content ?></p>
    </div>
</div>
<div>
    <h4>Coment</h4>
    <div>
        <?php foreach ($comments as $coment)
        {
           echo "<div id='comment'><label>".$coment->name_user."</label></div>
           <div><label>".$coment->coment."</label></div>
           ";
        }?>

    </div>
</div>

<?php $form=ActiveForm::begin([
    'id' => 'coment-form',
    'options' => ['class' => 'form-horizontal'],
]);?>


    <div class="form-group">
        <div class="col-sm-10">
            <label class="">Tên</label>
        </div>
        <?= $form->field($model, 'name_user')->label(false) ?>
    </div>
    <div class="form-group">
    <div class="col-sm-10">
        <label class="">Email</label>
    </div>
    <?= $form->field($model, 'email_user')->label(false); ?>
    </div>
    <div class="form-group">
        <div class="col-sm-10">
            <label class="">Comment</label>
        </div>
        <?= $form->field($model, 'coment')->textarea()->label(false); ?>
    </div>
    <div class="col-sm-1 form-group">
        <button type="button" id="send" class="form-control">Send</button>
    </div>
    <div>

    </div>

<?php ActiveForm::end() ?>

<script src="<?= $bundel->baseUrl; ?>\layout\scripts\jquery-3.1.0.js"></script>
<script>
    $(document).ready(function () {
        $('#send').click(function () {
            $.ajax(
                {
                    url:'<?= Yii::$app->urlManager->createUrl(array('site/comment'));?>',
                    type:'POST',
                    cache:false,
                    data:$("#coment-form").serializeArray(),
                    success:function (result) {
                       $('#comment').append(result);
                    }
                }
            )
        })

    })
</script>
