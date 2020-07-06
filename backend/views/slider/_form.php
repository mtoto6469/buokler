<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-10" style="height: 100vh">
<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelf, 'image')->fileInput()->label('عکس')?>


    <?php
    if(!$model->isNewRecord){?>

        <img id="blah" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$model->img?>" alt="your image" style="width: 200px">

    <?php  }else{
        echo '<img id="blah" src="#" alt="" style="width: 200px">';
    }

    ?>

    <?= $form->field($model, 'alt')->textInput() ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?= $form->field($model, 'enabel')->radioList([0=>'خیر',1=>'بله'])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>