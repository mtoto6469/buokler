<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CatPro */

$this->title = Yii::t('app', 'ثبت دسته صفحه اصلی');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Pros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-pro-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'cat'=>$cat,
        'pro'=>$pro,
    ]) ?>

</div>
