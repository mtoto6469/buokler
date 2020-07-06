<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproposal */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tblproposal',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblproposals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblproposal-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'pro'=>$pro,
        'size'=>$size,
        'color'=>$color,
    ]) ?>

</div>
