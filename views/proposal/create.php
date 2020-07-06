<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblproposal */

$this->title = Yii::t('app', 'Create Tblproposal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblproposals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproposal-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'pro'=>$pro,
        'size'=>$size,
        'color'=>$color,
    ]) ?>

</div>
