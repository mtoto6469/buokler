<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproduct */

$this->title = Yii::t('app', 'ویرایش') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblproducts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblproduct-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'name'=>$name,
        'type'=>$type,
        'brand'=>$brand,
        'img'=> $img,
        'modelf'=>$modelf,
        'modelup'=>$modelup,

    ]) ?>

</div>
