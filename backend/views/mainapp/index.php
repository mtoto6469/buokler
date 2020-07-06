<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MainAppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'اپلیکیشن');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-app-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'ثبت نوع جدید'), ['main'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'm_d_f',
            'id_m_d_f',
            'urlimg',
            //'img1',
            //'img2',
            //'img3',
            //'img4',
            //'id1',
            //'id2',
            //'id3',
            //'id4',
            //'headrtype',
            //'footertype',
            //'text1:ntext',
            //'text2:ntext',
            //'text3:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
