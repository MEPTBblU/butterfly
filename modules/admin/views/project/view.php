<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$images = $model->getImages();

//foreach($images as $img) {
//    $im[]=$img->getPath();
//}
//print_r($im);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'location',
            'square',
            'price',
            'client:html',
//            [
//                'attribute'=>'plan_picture',
//                'value'=>'/' . $model->plan_picture,
//                'format' => ['image',['width'=>'200']],
//            ],
//            [
//                'attribute'=>'poster_picture',
//                'value'=>'/' . $model->poster_picture,
//                'format' => ['image',['width'=>'200']],
//            ],
//            [
//                'attribute'=>'some_picture',
//                'value'=>'/' . $model->some_picture,
//                'format' => ['image',['width'=>'200']],
//            ],
            'order_of',
            'status',
        ],
    ]) ?>

    <?php if ($images) {
        echo '<h2>Галерея</h2><br>';
        foreach ($images as $attachment) {
            echo Html::img('/'.$attachment->getPath(), ['style' => 'width:300px;']);
        }
    }; ?>

</div>
