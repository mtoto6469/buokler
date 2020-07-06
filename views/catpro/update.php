<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CatPro */

$this->title = Yii::t('app', 'ویرایش ') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Pros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cat-pro-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'cat'=>$cat,
        'pro'=>$pro,
    ]) ?>

</div>
