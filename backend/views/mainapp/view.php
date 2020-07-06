<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MainApp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'اپلیکیشن'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-app-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'حذف'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,

        'attributes' => [
            'id',
            'type',

           'attribute'=>'m_d_f',
            'id_m_d_f',
            'urlimg',
            'img1',
            'img2',
            'img3',
            'img4',
            'id1',
            'id2',
            'id3',
            'id4',
            'headrtype',
            'footertype',
            'text1:ntext',
            'text2:ntext',
            'text3:ntext',
        ],
    ]) ?>

</div>
