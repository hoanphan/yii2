<?php

use yii\helpers\Html;

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\modelSeach\UserSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
$title='export';

?>

<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

       'toolbar'=> [
           '{export}',
           '{toggleData}',
       ],
    // set export properties
        'export'=>[
           'fontAwesome'=>true
       ],
       'columns' => [
           ['class'=>'kartik\grid\SerialColumn'],

           [
               'attribute'=>'user_id',
                'format'=>'html',
                'value'=>function($data)
                {
                      return '<button>aaaa</button>';
                }
           ],
           'username',
           'email:email',
           'fullname',
           'phone',
           [
               'attribute'=>'status',

               'filter'=>[0=>'Inactive',1=>'Active'],
               'class' => '\kartik\grid\BooleanColumn',
               'trueLabel' => 1,
               'falseLabel' => 0
           ],

       ]
        , 'pjax'=>true,

       'panel'=>[
           'type'=>GridView::TYPE_PRIMARY,
           'heading'=>'user',
       ],
        'exportConfig' => [
       GridView::CSV => ['label' => 'Save as CSV'],
       GridView::HTML => ['label' => 'Save as HTML'],
           GridView::PDF => ['label' => 'Save as PDF'],
           ],
    ]); ?>
</div>
