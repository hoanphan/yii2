<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <fieldset>
        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                            <?= $form->field($model,'username')->textInput([
                                                                'class'=>'form-control',
                                                                'placeholder'=>"Username",
                                                                'type'=>'text'])->label(false);
                                                            ?>
                                                            <i class="ace-icon fa fa-user"></i>
														</span>
        </label>

        <label class="block clearfix">
            <span class="block input-icon input-icon-right">
															  <?= $form->field($model,'password')->passwordInput([
                                                                  'class'=>'form-control',
                                                                  'placeholder'=>"Password",
                                                                  ])->label(false);
                                                              ?>
															<i class="ace-icon fa fa-lock"></i>
														</span>
        </label>

        <div class="space"></div>

        <div class="clearfix">
            <label class="inline">
                <?= $form->field($model,'rememberMe')->checkbox([
                ])->label(false);
                ?>

            </label>

            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                <i class="ace-icon fa fa-key"></i>
                <span class="bigger-110">Login</span>
            </button>
        </div>

        <div class="space-4"></div>
    </fieldset>
<?php ActiveForm::end() ?>