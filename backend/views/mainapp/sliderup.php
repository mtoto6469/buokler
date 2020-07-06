<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;
$url=Yii::$app->urlManager;
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($modelf, 'image')->fileInput()->label('آپلود عکس')?>
<?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
<div class="col-md-12" id="cat2" style="display: block">
    <label class="control-label" for="mainapp-id_m_d_f">محصول یا دسته</label>

    <select id="mainapp-id_m_d_f" class="form-control" name="id1" aria-invalid="false">

        <?php

        foreach ($cat2 as $c2){
            echo '<option value="m-'.$c2->id.'"';

            if(!$model->isNewRecord){

                if($model->id_m_d_f=="m-".$c2->id){

                    echo 'selected=""';

                }

            }


            echo '>'.$c2->name.'</option>';
        }

        ?>
        <?php
        foreach ($cat1 as $c1){
            echo '<option value="d-'.$c1->id.'"';

            if(!$model->isNewRecord){
                if($model->id_m_d_f=="d-".$c1->id)
                    echo 'selected=""';
            }


            echo '>'.$c1->name.'</option>';
        }

        ?>
    </select>

    <div class="help-block"></div>
</div>




<?php
if($model->id_cat==0){?>



    <div class="container">
        <h2>Basic Table</h2>

        <table class="table">
            <thead>
            <tr style="text-align: right">
                <td >عکس</td>
                <td >متن</td>
                <td >محصول</td>
                <td ></td>
                <td ></td>
            </tr>
            </thead>

            <?php
            if($sub!=null){
                foreach ($sub as $s){

                    ?>
            <tbody>
            <tr>
                    <td><img src="<?=$s->img?>" style="width: 100px;height: 100px"></td>
                    <td><?=$s->text?></td>
                    <td><?=$s->id_m_d_f?></td>
                    <td ><a href="<?=$url->createAbsoluteUrl(['mainapp/deletslider','id'=>$s->id])?>">حذف</a></td>
                    <td ><a href="<?=$url->createAbsoluteUrl(['mainapp/sliderup','id'=>$s->id])?>">ویرایش</a></td>

            </tr>

            </tbody>
                <?php
                }
            }
            
            ?>
            
          

        </table>
    </div>

<?php
}



?>

<div class="form-group">
    <?php
    if($model->id_cat ==0){?>
        <?= Html::submitButton(Yii::t('app', 'بعدی'), ['class' => 'btn btn-success','name'=>'next','value'=>2]) ?>

    <?php }

    ?>
    <?= Html::submitButton(Yii::t('app', 'ویرایش'), ['class' => 'btn btn-success','name'=>'next','value'=>1]) ?>

</div>
<?php ActiveForm::end(); ?>


