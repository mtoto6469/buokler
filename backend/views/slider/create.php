<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Slider */

$this->title = Yii::t('app', 'ثبت عکس جدید برای اسلایدر');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'اسلایدر'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelf' => $modelf,
    ]) ?>

</div>
