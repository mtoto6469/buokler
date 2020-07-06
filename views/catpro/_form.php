<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CatPro */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-9">
<div class="cat-pro-form">



    <?php

    if(isset($_SESSION['error33'])){
        if($_SESSION['error33']!=null){
            ?>

            <div class="alert alert-danger"><?=$_SESSION['error33']?></div>
            <?php

            $_SESSION['error33']=null;
        }
    }
?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cat')->dropDownList($cat,['prompt'=>'انتخاب کنید','onclick'=>'send()']) ?>
    <hr>
    <span style="color:darkred">محصولات مربوط به این دسته</span>
    <div id="ress">
<?php
if(!$model->isNewRecord){
    $pro=explode(',',$model->id_pro);
    foreach ($pro as $p){
        $pro_name=\backend\models\Tblproduct::find()->where(['id'=>$p])->one();?>
        <div class="form-group field-catpro-id_cat required has-success">
<label class="control-label" for="catpro-id_cat">محصول</label>
<select id="catpro-id_cat" class="form-control" name="face" onclick="send()" aria-required="true" aria-invalid="false">
<option  selected=""><?=$pro_name->name?></option>
</select>

<div class="help-block"></div>
</div>
   <?php
    }
}


?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ثبت') : Yii::t('app', 'ویرایش'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
<script type="text/javascript">
    function send() {

        var search= $('#catpro-id_cat').val();

        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('catpro/send') ?>',
            data: {search: search},
            success:function (data) {
                $('#ress').html(data);


            }
        });
    }

</script>