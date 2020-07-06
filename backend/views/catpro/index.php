<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CatProSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cat Pros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-pro-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cat Pro'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            ['attribute' => 'id_cat',
                'value' => 'idCat.name',
            ],
            ['attribute' => 'id_pro',
                'value' => function ($model) {
                    $pro = explode(',', $model->id_pro);
                    $name='';
                    foreach ($pro as $p) {
                        $pro_name = \backend\models\Tblproduct::find()->where(['id' => $p])->one();
                        $name.=$pro_name->name.' و ';
                    }
                    return $name;
                },
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
