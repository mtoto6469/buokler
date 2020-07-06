<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MainAppSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-app-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'm_d_f') ?>

    <?= $form->field($model, 'id_m_d_f') ?>

    <?= $form->field($model, 'urlimg') ?>

    <?php // echo $form->field($model, 'img1') ?>

    <?php // echo $form->field($model, 'img2') ?>

    <?php // echo $form->field($model, 'img3') ?>

    <?php // echo $form->field($model, 'img4') ?>

    <?php // echo $form->field($model, 'id1') ?>

    <?php // echo $form->field($model, 'id2') ?>

    <?php // echo $form->field($model, 'id3') ?>

    <?php // echo $form->field($model, 'id4') ?>

    <?php // echo $form->field($model, 'headrtype') ?>

    <?php // echo $form->field($model, 'footertype') ?>

    <?php // echo $form->field($model, 'text1') ?>

    <?php // echo $form->field($model, 'text2') ?>

    <?php // echo $form->field($model, 'text3') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
