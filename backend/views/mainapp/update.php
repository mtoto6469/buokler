<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MainApp */

$this->title = Yii::t('app', ' ویرایش :').$model->type;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'اپلیکیشن'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'ویرایش');
?>
<div class="main-app-update">

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
