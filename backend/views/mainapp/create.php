<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MainApp */

$this->title = Yii::t('app', 'ثبت نوع جدید در صفحه اول اپلیکیشن');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'اپلیکیشن'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-app-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'type'=>$type,
        'cat1'=>$cat1,
        'cat2'=>$cat2,
        'modelf'=>$modelf,
        'modelf2' => $modelf2,
    ]) ?>

</div>
