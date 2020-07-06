<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproduct */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'محصول'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproduct-view">

    <h3><?= Html::encode($this->title) ?></h3>

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

        ['attribute'=>'id_category',
            'value'=>function($model){
                $name=\frontend\models\TblcategoryProduct::find()->where(['id'=>$model->id_category])->one();
                return Html::a(Yii::t('app',$name->name ), ['categoryproduct/view', 'id' => $name->id], ['style' => 'color:blue']) ;
            },
            'format'=>'html',
        ],

            'name',
            ['attribute'=>' id_brand',
                'value'=>function($model){
                    $name=\frontend\models\Tblbrand::find()->where(['id'=>$model->id_brand])->one();
                    if($name!=null){
                        return Html::a(Yii::t('app',$name->brand), ['view', 'id' => $name->id], ['style' => 'color:blue']) ;
                    }else{
                        return 'انتخاب نشده';
                    }
                },
                'format'=>'html',
                'label'=>'برند',
            ],

            


            ['attribute'=>'price',
              
            ],

            ['attribute'=>'img',
                'value'=>function($row){
                    return '<img src="'.Yii::$app->request->hostInfo.'/upload/'.$row->img.'" style="width:100px">';
                },
                'format'=>'html',

            ],


        ],
    ]) ?>

</div>
