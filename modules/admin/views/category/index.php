<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'img',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img('/'. $data['img'],
                        ['width' => '120px']);
                },
            ],
            'ord',
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
