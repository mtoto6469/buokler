<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'اسلایدر'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-view">

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

            ['attribute'=>'img',

                'value'=>function($model){
                    return '<img src='.Yii::$app->request->hostInfo.'/upload/'.$model->img.' style="width:70px"> ';
                },
                'format'=>'html',

            ],
            'alt',
            'description',
            ['attribute'=>'enabel',
                'value'=>function($model){
                    if($model->enabel==0)
                        return 'خیر';
                    else return 'بله';
                }
            ],
        ],
    ]) ?>

</div>
