<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GalleryAppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Gallery Apps');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-app-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Gallery App'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute'=>'img',
                'value'=>function($row){

                    return '<img src="'.Yii::$app->request->hostInfo.'/upload/'.$row->img.'" style="width:100px">';
                },
                'format'=>'html',

            ],
            'alt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
