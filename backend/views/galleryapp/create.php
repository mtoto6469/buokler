<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\GalleryApp */

$this->title = Yii::t('app', 'Create Gallery App');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gallery Apps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-app-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelf'=>$modelf,
    ]) ?>

</div>
