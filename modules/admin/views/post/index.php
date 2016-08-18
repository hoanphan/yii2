<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Category;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\modelSeach\PostSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [

                'attribute'=>'category_id',
                'value' => function($data){
                    return $data->getNameCategory($data->category_id);
                },
                'filter'=>ArrayHelper::map(Category::find()->asArray()->all(), 'category_id', 'name')
            ],
            [

                'attribute'=>'user_id',
                'value' => function($model){
                    return Html::textInput('', $model->user_id);
                },
                'format' => 'raw',
                'filter'=>ArrayHelper::map(\app\modules\admin\models\User::find()->asArray()->all(), 'user_id', 'fullname')
            ],

            'title:html',
            'desc',
             //'content:ntext',
             [
                 'attribute'=>'picture',
                 'format'=>'html',
                 'value'=>function($data){
                    return '<a><img style="width: 100px;height: 100px" src="'.$data->getUrlPicture($data->picture).'"></a>';
             }

             ],
            // 'status',
            // 'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
