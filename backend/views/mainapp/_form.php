<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MainApp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-app-form" style="background: white!important;">
<div class="col-md-10">
    <?php
    if(isset( $_SESSION['imgtype1'])){
        if( $_SESSION['imgtype1']!=null){
            echo '<h3 style="color: darkred">'. $_SESSION['imgtype1'].'</h3>';
        } $_SESSION['imgtype1']=null;
    }


    if(isset( $_SESSION['header'])){
        if( $_SESSION['header']!=null){
            echo '<h3 style="color: darkred">'. $_SESSION['header'].'</h3>';
        } $_SESSION['header']=null;
    }


    if(isset( $_SESSION['fotter'])){
        if( $_SESSION['fotter']!=null){
            echo '<h3 style="color: darkred" >'. $_SESSION['fotter'].'</h3>';
        } $_SESSION['fotter']=null;
    }




    if(isset( $_SESSION['img1type2'])){
        if( $_SESSION['img1type2']!=null){
            echo '<h3 style="color: darkred">'. $_SESSION['img1type2'].'</h3>';
        } $_SESSION['img1type2']=null;
    }

    if(isset( $_SESSION['img1type2'])){
        if( $_SESSION['img1type2']!=null){
            echo '<h3 style="color: darkred">'. $_SESSION['img1type2'].'</h3>';
        } $_SESSION['img1type2']=null;
    }


    if(isset( $_SESSION['img2type2'])){
        if( $_SESSION['img2type2']!=null){
            echo '<h3 style="color: darkred">'. $_SESSION['img2type2'].'</h3>';
        } $_SESSION['img2type2']=null;
    }


    if(isset( $_SESSION['img3type2'])){
        if( $_SESSION['img3type2']!=null){
            echo '<h3 style="color: darkred">'. $_SESSION['img3type2'].'</h3>';
        } $_SESSION['img3type2']=null;
    }



    if(isset( $_SESSION['img4type2'])){
        if( $_SESSION['img4type2']!=null){
            echo '<h3 style="color: darkred">'. $_SESSION['img4type2'].'</h3>';
        } $_SESSION['img4type2']=null;
    }

    ?>

    <?php $form = ActiveForm::begin(); ?>


<?php if($type=='oneImage' || $type=='oneText' || $type=='towText') { ?>
    <?= $form->field($model, 'm_d_f')->dropDownList(['m'=>'محصولات','d'=>'دسته'],['onchange'=>'catselect()'])->label('عکس به کدام یک لینک میشوند')?>


    <div  class="col-md-12" id="cat1"


        <?php
        if(!$model->isNewRecord){
            if($model->m_d_f=='d'){
                echo 'style="display: block;';
            }else{
                echo 'style="display: none;';
            }
        }else{
            echo 'style="display: none;';
        }

        ?>


    >
    <label class="control-label" for="mainapp-id_m_d_f">دسته</label>
    <select id="mainapp-id_m_d_f" class="form-control" name="cat1" aria-invalid="false">

        <?php
        foreach ($cat1 as $c1){
            echo '<option value="'.$c1->id.'"';

            if(!$model->isNewRecord){
                if($model->id_m_d_f==$c1->id){
                    echo 'selected=""';
                }
            }


            echo'>'.$c1->name.'</option>';
        }

        ?>

    </select>

    <div class="help-block"></div>
</div>
<div class="col-md-12" id="cat2"

    <?php
    if(!$model->isNewRecord){
        if($model->m_d_f=='m'){
            echo 'style="display: block;';
        }else{
            echo 'style="display: none;';
        }
    }else{
        echo 'style="display: block;';
    }

    ?>

>
    <label class="control-label" for="mainapp-id_m_d_f">محصول</label>
    <select id="mainapp-id_m_d_f" class="form-control" name="cat2" aria-invalid="false">

        <?php
        foreach ($cat2 as $c2){
            echo '<option value="'.$c2->id.'"';

            if(!$model->isNewRecord){
                if($model->id_m_d_f== $c2->id){
                    echo 'selected=""';
                }
            }


            echo'>'.$c2->name.'</option>';
        }

        ?>
    </select>

    <div class="help-block"></div>
</div>


    <?= $form->field($modelf, 'image')->fileInput()->label('آپلود عکس')?>
    <?php
}

if($type=='oneText' || $type=='towText'|| $type=='fourImage'|| $type=='treeImage'){
    ?>

    <?= $form->field($model, 'headrtype')->textInput(['maxlength' => true]) ?>


    <?php
}if($type=='towText'|| $type=='fourImage'|| $type=='treeImage'){
    ?>

    <?= $form->field($model, 'footertype')->textInput(['maxlength' => true]) ?>



    <?php
}

if( $type=='fourImage'){
    ?>
    <?= $form->field($modelf2, 'image1')->fileInput()?>

    <?= $form->field($modelf2, 'image2')->fileInput()?>

    <?= $form->field($modelf2, 'image3')->fileInput()?>

    <?= $form->field($modelf2, 'image4')->fileInput()?>

    <div class="col-md-12" id="cat2" style="display: block">
        <label class="control-label" for="mainapp-id_m_d_f">محصول</label>

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

    <div class="col-md-12" id="cat2" style="display: block">
        <label class="control-label" for="mainapp-id_m_d_f">محصول</label>
        <select id="mainapp-id_m_d_f" class="form-control" name="id2" aria-invalid="false">


            <?php
            foreach ($cat2 as $c2){
                echo '<option value="m-'.$c2->id.'"';

                if(!$model->isNewRecord){
                    if($model->id2=="m-".$c2->id)
                        echo 'selected=""';
                }


                echo ' >'.$c2->name.'</option>';
            }

            ?>
            <?php
            foreach ($cat1 as $c1){
                echo '<option value="d-'.$c1->id.'"';

                if(!$model->isNewRecord){
                    if($model->id2=="d-".$c1->id)
                        echo 'selected=""';
                }


                echo '>'.$c1->name.'</option>';
            }

            ?>
        </select>

        <div class="help-block"></div>
    </div>

    <div class="col-md-12" id="cat2" style="display: block">
        <label class="control-label" for="mainapp-id_m_d_f">محصول</label>
        <select id="mainapp-id_m_d_f" class="form-control" name="id3" aria-invalid="false">


            <?php
            foreach ($cat2 as $c2){
                echo '<option value="m-'.$c2->id.'"';

                if(!$model->isNewRecord){
                    if($model->id3=="m-".$c2->id)
                        echo 'selected=""';
                }


                echo ' >'.$c2->name.'</option>';
            }

            ?>
            <?php
            foreach ($cat1 as $c1){
                echo '<option value="d-'.$c1->id.'"';

                if(!$model->isNewRecord){
                    if($model->id3=="d-".$c1->id)
                        echo 'selected=""';
                }


                echo '>'.$c1->name.'</option>';
            }

            ?>
        </select>

        <div class="help-block"></div>
    </div>

    <div class="col-md-12" id="cat2" style="display: block">
        <label class="control-label" for="mainapp-id_m_d_f">محصول</label>
        <select id="mainapp-id_m_d_f" class="form-control" name="id4" aria-invalid="false">


            <?php
            foreach ($cat2 as $c2){
                echo '<option value="m-'.$c2->id.'"';

                if(!$model->isNewRecord){
                    if($model->id4=="m-".$c2->id)
                        echo 'selected=""';
                }


                echo '>'.$c2->name.'</option>';
            }

            ?>
            <?php
            foreach ($cat1 as $c1){
                echo '<option value="d-'.$c1->id.'"';

                if(!$model->isNewRecord){
                    if($model->id4=="d-".$c1->id)
                        echo 'selected=""';
                }


                echo '>'.$c1->name.'</option>';
            }

            ?>
        </select>

        <div class="help-block"></div>
    </div>
    <?php
}if($type=='treeImage'){
    ?>
    <?= $form->field($modelf2, 'image1')->fileInput()?>

    <?= $form->field($modelf2, 'image2')->fileInput()?>

    <?= $form->field($modelf2, 'image3')->fileInput()?>



    <div class="col-md-12" id="cat2" style="display: block">
        <label class="control-label" for="mainapp-id_m_d_f">محصول</label>
        <select id="mainapp-id_m_d_f" class="form-control" name="id1" aria-invalid="false">

            <?php
            foreach ($cat2 as $c2){
                echo '<option value="m-'.$c2->id.'"';

                if(!$model->isNewRecord){
                    if($model->id1=="m-".$c2->id)
                        echo 'selected=""';
                }


               echo ' >'.$c2->name.'</option>';
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

    <div class="col-md-12" id="cat2" style="display: block">
        <label class="control-label" for="mainapp-id_m_d_f">محصول</label>
        <select id="mainapp-id_m_d_f" class="form-control" name="id2" aria-invalid="false">


            <?php
            foreach ($cat2 as $c2){
                echo '<option value="m-'.$c2->id.'"';

                if(!$model->isNewRecord){
                    if($model->id2=="m-".$c2->id)
                        echo 'selected=""';
                }


                echo ' >'.$c2->name.'</option>';
            }

            ?>
            <?php
            foreach ($cat1 as $c1){
                echo '<option value="d-'.$c1->id.'"';

                if(!$model->isNewRecord){
                    if($model->id2=="d-".$c1->id)
                        echo 'selected=""';
                }


                echo '>'.$c1->name.'</option>';
            }

            ?>
        </select>

        <div class="help-block"></div>
    </div>

    <div class="col-md-12" id="cat2" style="display: block">
        <label class="control-label" for="mainapp-id_m_d_f">محصول</label>
        <select id="mainapp-id_m_d_f" class="form-control" name="id3" aria-invalid="false">

            <?php
            foreach ($cat2 as $c2){
                echo '<option value="m-'.$c2->id.'"';

                if(!$model->isNewRecord){
                    if($model->id3=="m-".$c2->id)
                        echo 'selected=""';
                }


                echo ' >'.$c2->name.'</option>';
            }

            ?>
            <?php
            foreach ($cat1 as $c1){
                echo '<option value="d-'.$c1->id.'"';

                if(!$model->isNewRecord){
                    if($model->id3=="d-".$c1->id)
                        echo 'selected=""';
                }


                echo '>'.$c1->name.'</option>';
            }

            ?>
        </select>

        <div class="help-block"></div>
    </div>

        <?= $form->field($model, 'text1')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'text2')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'text3')->textarea(['rows' => 6]) ?>

    <?php
}?>







    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ثبت'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
</div>
<script>
    function catselect() {
        if($('#mainapp-m_d_f').val()=='m'){
            $('#cat2').css('display','block');
            $('#cat1').css('display','none');
        }else{
            $('#cat1').css('display','block');
            $('#cat2').css('display','none');
        }
    }
</script>