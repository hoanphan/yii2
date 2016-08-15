<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Video */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'video_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_video')->textInput(['maxlength' => true])->fileInput()->widget(FileInput::className(),
        [
            'name' => 'attachment_51',
            'pluginOptions' => [
                'showUpload' => false,
                'browseLabel' => '',
                'removeLabel' => '',
                'mainClass' => 'input-group-lg'
            ],
            'options' => ['accept' => 'video/*']
        ]
    )  ?>
    <?= $form->field($model, 'imager_last')->textarea(['rows' => 6])->fileInput()->widget(FileInput::className(),
        [
            'name' => 'attachment_51',
            'pluginOptions' => [
                'showUpload' => false,
                'browseLabel' => '',
                'removeLabel' => '',
                'mainClass' => 'input-group-lg'
            ],
            'options' => ['accept' => 'image/*']
        ]
    ) ?>
    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
