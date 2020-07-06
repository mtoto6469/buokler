<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CatPro */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cat Pros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-pro-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'حدف'), ['delete', 'id' => $model->id], [
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

            ['attribute' => 'id_cat',
                'value' => function($model){
                    $cat=\backend\models\TblcategoryProduct::find()->where(['id'=>$model->id_cat])->one();
                    return $cat->name;
                },
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
        ],
    ]) ?>

</div>
