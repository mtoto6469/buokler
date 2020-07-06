<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblprofile */

$this->title = Yii::t('app', 'ویرایش') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblprofiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblprofile-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'date_ir'=>$date_ir,
    ]) ?>

</div>
