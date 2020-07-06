<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;
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

                    if($model->id1=="m-".$c2->id){

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
                    if($model->id1=="d-".$c1->id)
                        echo 'selected=""';
                }


                echo '>'.$c1->name.'</option>';
            }

            ?>
        </select>

        <div class="help-block"></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ثبت'), ['class' => 'btn btn-success','name'=>'next','value'=>1]) ?>
        <?= Html::submitButton(Yii::t('app', 'بعدی'), ['class' => 'btn btn-success','name'=>'next','value'=>2]) ?>
    </div>
<?php ActiveForm::end(); ?>

