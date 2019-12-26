<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'square')->textInput(['maxlength' => true]) ?>
    <?php $categories = app\models\Category::find(["status" => 1 ])->asArray()->all();
        $data = yii\helpers\ArrayHelper::map($categories, 'id', 'name');
    ?>
    <?= $form->field($model, 'square')->dropDownList($data); ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'client')->textarea(['rows' => 6]) ?>
    <?php echo  $form->field($model, 'client')->widget(CKEditor::className(),[
        'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
        ],
    ]);
    ?>

    <?php if(!empty($model->plan_picture)){
        echo Html::img('/'.$model->plan_picture, $options = ['class' => 'postImg', 'style' => ['width' => '180px']]);
    } ?>
    <?= $form->field($model, 'filePicture')->fileInput() ?>

    <?php if(!empty($model->poster_picture)){
        echo Html::img('/'.$model->poster_picture, $options = ['class' => 'postImg', 'style' => ['width' => '180px']]);
    } ?>
    <?= $form->field($model, 'filePoster')->fileInput() ?>

    <?php if(!empty($model->some_picture)){
        echo Html::img('/'.$model->some_picture, $options = ['class' => 'postImg', 'style' => ['width' => '180px']]);
    } ?>
    <?= $form->field($model, 'fileSome')->fileInput() ?>
<!--    --><?php
//    $img = ($model->some_picture) ? $model->some_picture : '/uploads/default_thumb.png';
//    $label = Html::img($img, ['class' => 'preview_image_block', 'alt' => 'Image of ' . $model->id]) . "<span>Изображение</span>";
//    ?>
<!--    --><?//= $form->field($model, 'some_picture', ['options' => ['class' => 'img_input_block']])
//        ->fileInput(['class' => 'hidden-input img-input', 'accept' => 'image/*'])->label($label, ['class' => 'label-img']); ?>

    <?= $form->field($model, 'slider[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'order_of')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
