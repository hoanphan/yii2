<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use  yii\helpers\ArrayHelper;
use app\models\User;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\modelSeach\VideoSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'user_id',
                'filterType'=>GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Chose Name'],
                'filter'=>ArrayHelper::map(User::find()->asArray()->all(), 'user_id', 'fullname'),
                'value'=>function($data)
                {
                    return $data->getTextUser($data->user_id);
                }
            ],
            'video_title',
            [
                'width'=>'20%',
                'attribute'=>'create_date',
                'format'=>['date','php:d-m-y'],
                'filterType'=>GridView::FILTER_DATE
            ],
             [
                 'filter'=>false,
                 'attribute'=>'imager_last',
                 'format'=>'html',
                 'value'=>function($data){
                    return '<img style="width: 100px;height: 100px" src="'.$data->getUrlVideo($data->imager_last).'"  alt="" class="img_ad" onload="">';
                 }
             ],
             [
                 'attribute'=>'status',
                 'filter'=>[0=>'Inactive',1=>'Active'],
                 'value'=>function($data)
                 {
                     return $data->getTextStatus($data->status);
                 }
             ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
