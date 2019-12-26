<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'location',
            'square',
            'price',
            'client:html',
//            [
//                'attribute' => 'plan_picture',
//                'format' => 'html',
//                'value' => function ($data) {
//                    return Html::img('/'. $data['plan_picture'],
//                        ['width' => '120px']);
//                },
//            ],
//            [
//                'attribute' => 'poster_picture',
//                'format' => 'html',
//                'value' => function ($data) {
//                    return Html::img('/'. $data['poster_picture'],
//                        ['width' => '120px']);
//                },
//            ],
//            [
//                'attribute' => 'some_picture',
//                'format' => 'html',
//                'value' => function ($data) {
//                    return Html::img('/'. $data['some_picture'],
//                        ['width' => '120px']);
//                },
//            ],
            'order_of',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->status) {
                        return Html::a("<span class=\"glyphicon glyphicon-ok\"></span> Активен", Url::to(['status', 'id' => $data->id]), ['class' => 'btn btn-success btn-raised']);
                    } else {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span> Не активен', Url::to(['status', 'id' => $data->id]), ['class' => 'btn btn-danger btn-raised']);
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
