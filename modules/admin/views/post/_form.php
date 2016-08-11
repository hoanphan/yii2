<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\User;
use \navatech\roxymce\widgets\RoxyMceWidget;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(\app\models\Category::find()->asArray()->all(),'category_id','name')) ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->asArray()->all(), 'user_id', 'fullname')) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>
    <?= RoxyMceWidget::widget([
        'name'        => 'content', //default name of textarea which will be auto generated, REQUIRED if not using 'model' section
        'value'       => isset($_POST['content']) ? $_POST['content'] : '', //default value of current textarea, NOT REQUIRED
        'action'      => Url::to(['/roxymce/default']), //default roxymce action route, NOT REQUIRED
        'options'     => [//TinyMce options, NOT REQUIRED, see https://www.tinymce.com/docs/
            'title' => 'RoxyMCE',//title of roxymce dialog, NOT REQUIRED
        ],
        'htmlOptions' => [],//html options of this widget, NOT REQUIRED
    ]);
    ?>

    <?= $form->field($model, 'picture')->textInput()->widget(FileInput::className(),[
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Select Photo'
        ],
        'options' => ['accept' => 'image/*']
    ]) ?>

    <?= $form->field($model, 'status')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
