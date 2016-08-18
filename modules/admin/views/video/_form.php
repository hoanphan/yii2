<?php

use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Video */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'video_title')->textInput(['maxlength' => true]) ?>

    <?php
    if($model->url_video==null)
    {
        echo $form->field($model, 'url_video')->textInput(['maxlength' => true])->fileInput()->widget(FileInput::className(),
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
    ) ;}else{
        echo  $form->field($model, 'url_video')->textInput(['maxlength' => true])->fileInput()->widget(FileInput::className(),
            [
                'name' => 'attachment_51',
                'pluginOptions' => [
                    'showUpload' => false,
                    'browseLabel' => '',
                    'removeLabel' => '',
                    'mainClass' => 'input-group-lg',
                     'mainClass' => 'input-group-lg',
                    'initialPreview'=>[
                        BaseUrl::home().Yii::$app->params['uploadVideo'].$model->url_video
                    ],
                    'initialPreviewAsData'=>true,
                    'initialCaption'=> $model->url_video,
                    'initialPreviewConfig' => [
                        ['caption' => $model->url_video, 'size' => '873727'],
                    ],
                    'overwriteInitial'=>false,
                    'maxFileSize'=>2800
                ],
                'options' => ['accept' => 'video/*']
            ]
        );
    }

    ?>

    <?php
    if ($model->imager_last == null) {
        echo $form->field($model, 'imager_last')->textarea(['rows' => 6])->widget(FileInput::className(),
            [
                'name' => 'attachment_51',
                'pluginOptions' => [
                    'showUpload' => false,
                    'browseLabel' => '',
                    'removeLabel' => '',
                    'mainClass' => 'input-group-lg',

                ],
                'options' => ['accept' => 'image/*']
            ]


        );
    } else {
        echo $form->field($model, 'imager_last')->textarea(['rows' => 6])->widget(FileInput::className(),
            [
                'name' => 'attachment_51',
                'pluginOptions' => [
                    'showUpload' => false,
                    'browseLabel' => '',
                    'removeLabel' => '',
                    'mainClass' => 'input-group-lg',
                    'initialPreview'=>[
                        BaseUrl::home().Yii::$app->params['uploadImageVideo'].$model->imager_last
                    ],
                    'initialPreviewAsData'=>true,
                    'initialCaption'=> $model->imager_last,
                    'initialPreviewConfig' => [
                        ['caption' => $model->imager_last, 'size' => '873727'],
                    ],

                    'maxFileSize'=>2800
                ],
                'options' => ['accept' => 'image/*']
            ]


        );
    } ?>
    <?= $form->field($model, 'status')->textInput()->dropDownList([0=>'Inactive',1=>'Active']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
