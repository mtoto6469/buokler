<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CodeOff */

$this->title = Yii::t('app', 'Update Code Off: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Code Offs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="code-off-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'new'=>$new,
    ]) ?>

</div>
