<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CodeOff */

$this->title = Yii::t('app', 'Create Code Off');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Code Offs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="code-off-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'new'=>$new,
    ]) ?>

</div>
