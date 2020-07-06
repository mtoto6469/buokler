<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GalleryApp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-app-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelf, 'image')->fileInput()->label('آپلود عکس')?>

    <?php
    if(!$model->isNewRecord){?>

        <img id="blah" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$model->img?>" alt="your image" style="width: 200px">

    <?php  }else{
        echo '<img id="blah" src="#" alt="your image" style="width: 200px">';
    }

    ?>

    <?= $form->field($model, 'alt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
