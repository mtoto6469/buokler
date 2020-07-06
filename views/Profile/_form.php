<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblprofile */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-9">


<div class="tblprofile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-tblprofile-role">
        <label class="control-label" for="tblprofile-role">نام کاربری</label>

        <?php $user=\common\models\User::find()->where(['id'=>$model->user_id])->one();?>

        <input id="tblprofile-role" class="form-control" name="Tblprofile[role]" value="<?=$user->username?>" disabled="disabled" type="text">

        <div class="help-block"></div>
    </div>


    <div class="form-group field-tblprofile-role">
        <label class="control-label" for="tblprofile-role">ایمیل</label>
        
        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'role')->textInput() ?>

    <?= $form->field($model, 'tel')->textInput() ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>


    <?php
    if($model->role=='costumer'){

    echo $form->field($model, 'credit')->textInput(['value'=>''])->label('اعتبار جدید') ;?>

    <div class="form-group field-tblprofile-role">
        <label class="control-label" for="tblprofile-role">اعتبار </label>

    <input id="tblprofile-role" class="form-control" name="Tblprofile[role]" value="<?=$model->credit?>" disabled="disabled" type="text">

    <div class="help-block"></div>
</div>

      <?php  echo $form->field($model, 'mande')->textInput(['disabled' => 'disabled'])->label('مانده اعتبار') ;
?>

        <div class="control-group" style="margin-bottom: 2%">
                <div class="controls">
                    <label>تاریخ شروع اعتبار</label>
                    <br>
                    <input type="text" name="time" id="datepicker4" value="<?=$date_ir?>" />
                </div>
            </div>
       <?php


    }


    ?>



    <?= $form->field($model, 'enable_view')->radioList([0=>'خیر',1=>'بله'])->label('حذف') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ثبت') : Yii::t('app', 'ویرایش'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>