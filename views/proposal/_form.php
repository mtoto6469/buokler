<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproposal */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-9">
<div class="tblproposal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php

    if(isset($_SESSION['error'])){
        if($_SESSION['error']!=null){
            ?>

            <div class="alert alert-danger"><?=$_SESSION['error']?></div>
       <?php

            $_SESSION['error']=null;
        }
    }


    if($model->isNewRecord){?>
        <?= $form->field($model, 'id_pro')->dropDownList($pro,['prompt'=>'انتخاب کنید','onclick'=>'send()']) ?>
        <div id="res">
            <?= $form->field($model, 'size')->dropDownList($size,['prompt'=>'انتخاب کنید'])?>
            <?= $form->field($model, 'color')->dropDownList($color,['prompt'=>'انتخاب کنید']) ?>
        </div>
        <div id="ress">

        </div>
  <?php  }else{?>
        <?= $form->field($model, 'size')->dropDownList($size)?>
        <?= $form->field($model, 'color')->dropDownList($color) ?>
        <?php $img=\backend\models\Tblproduct::find()->where(['id'=>$model->id_pro])->one()?>
        <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$img->img?>" width="300px">
   <?php }
    ?>


    <?= $form->field($model, 'enabel_view')->radioList([0=>'خیر',1=>'بله']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>


<script type="text/javascript">
    function send() {

        var name= $('#tblproposal-id_pro').val();
        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('proposal/send') ?>',
            data: {name: name},
            success:function (data) {
                $('#ress').html(data);
                $('#res').css('display','none')
            }
        });
    }

</script>