<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproduct */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-9">


<div class="tblproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_category')->dropDownList($name,['prompt'=>'انتخاب کنید'])->hint('دسته ی محصول را وارد کنید',['style'=>'color:#169F85']) ?>

    <?= $form->field($model, 'id_type')->dropDownList($type,['prompt'=>'انتخاب کنید'])->hint('جنس محصول را انتخاب کنید',['style'=>'color:#169F85'])?>

    <?= $form->field($model, 'id_brand')->dropDownList($brand,['prompt'=>'انتخاب کنید'])->hint('برند محصول را وارد کنید',['style'=>'color:#169F85']) ?>
    <hr>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelf, 'image')->fileInput()->label('آپلود عکس')?>



    <?php
    if(!$model->isNewRecord){?>

        <img id="blah" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$model->img?>" alt="your image" style="width: 200px">

    <?php  }else{
        echo '<img id="blah" src="#" alt="your image" style="width: 200px">';
    }

    ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->hint('توضیحات مربوط به کاربر',['style'=>'color:#169F85']) ?>


    <?php

    if(!$model->isNewRecord){?>

        <div class="control-group" style="margin-bottom: 2%">
            <div class="controls">
                <label>تاریخ تولید</label>
                <br>
                <input type="text" name="time" id="datepicker4" value="<?=$model->time_ir?>" />
            </div>
        </div>

    <?php }else{?>


        <div class="control-group" style="margin-bottom: 2%">
            <div class="controls">
                <label>زمان ارسال</label>
                <input type="text" name="time" id="datepicker4" />
            </div>
        </div>

    <?php }

    ?>

<hr>
    <div class="row">  <h3 style="color:#4F0800;text-align: center">سایزهای مربوط به محصول و قیمت ها</h3></div>
<div class="row">

    <br>
    <div class="col-md-3">
        <input id="size" class="form-control" name="Tblproduct[size]" placeholder="سایز" aria-required="true" aria-invalid="true" type="text"></div>
    <div class="col-md-3">
        <input id="price" class="form-control" name="Tblproduct[price]" placeholder="قیمت برای کاربر عادی" aria-required="true" aria-invalid="true" type="text">

    </div>
    <div class="col-md-3">
        <input id="price_namayande" class="form-control" name="Tblproduct[price_namayande]" placeholder="قیمت برای نماینده" aria-required="true" aria-invalid="true" type="text">

        </div>
    <div class="col-md-3">

         <input class="btn btn-danger" value="ثبت و افزودن سایز جدید" onclick="mybtn()">
    </div>


</div>

    <div class="row">
<?php
if($model->isNewRecord){?>

    <div class="col-md-3"><?= $form->field($model, 'size')->hiddenInput(['placeholder'=>'سایز'])->label('') ?></div>
    <div class="col-md-3"><?= $form->field($model, 'price')->hiddenInput(['placeholder'=>'قیمت برای کاربر عادی'])->label('')?></div>
    <div class="col-md-3"><?= $form->field($model, 'price_namayande')->hiddenInput(['placeholder'=>'قیمت برای نماینده'])->label('') ?></div>
<?php
}else{
    ?>

<div class="col-md-3"><?= $form->field($model, 'size')->hiddenInput(['value'=>''])->label('') ?></div>
    <div class="col-md-3"><?= $form->field($model, 'price')->hiddenInput(['value'=>''])->label('')?></div>
    <div class="col-md-3"><?= $form->field($model, 'price_namayande')->hiddenInput(['value'=>''])->label('') ?></div>
<?php
}


?>
    </div>
    <div class="row" style="padding: 2%">

        <div  id="size3"> سایز:</div>
        <div  id="price3">قیمت:</div>
        <div id="price_namayande3">قیمت نماینده:</div>
    </div>



    <div class="row" style="padding: 2%" id="ress">
        <?php
        $size=\backend\models\Tblsize::find()->where(['id_pro'=>$model->id])->andWhere(['enabel_view'=>1])->all();
        foreach ($size as $s){?>
            <span>سایز: <?=$s->size?>قیمت:  <?=$s->price?>قیمت نماینده:    <?=$s->price_namayande?> </span>
            <input id="id" hidden value="<?=$s->id_pro?>">
            <button type="button" class="btn btn-default add-button"   value="<?=$s->id?>">
             <i class="fa fa-trash-o" style="color:red" ></i>
            </button>
            <br>
        <?php
        }


        ?>

    </div>




<br><br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', ' ثبت مجصول') : Yii::t('app', 'ویرایش'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


<script>
    function mybtn() {

        var size1= $('#size').val();
        var price1= $('#price').val();
        var price_namayande1= $('#price_namayande').val();

        var size2= $('#tblproduct-size').val();
        var price2= $('#tblproduct-price').val( );
        var price_namayande2= $('#tblproduct-price_namayande').val();



        var size= $('#tblproduct-size').val(size2+size1+',');
        var price= $('#tblproduct-price').val(price2 + price1+' , ');
        var price_namayande= $('#tblproduct-price_namayande').val(price_namayande2+price_namayande1+' , ');


        var size3= $('#size3').text('سایز:'+size2+size1+',');
        var price3= $('#price3').text('قیمت:'+ price2+ price1+',');
        var price_namayande3= $('#price_namayande3').text('قیمت نماینده:'+ price_namayande2+price_namayande1+' , ');


        var size1= $('#size').val(' ');
        var price1= $('#price').val(' ');
        var price_namayande1= $('#price_namayande').val(' ');


    }
</script>

<script>

    $(".add-button").click( function()
        { var id=$(this).val();
            var id_pro=$(#id).val();
            $.ajax({
                type: 'GET',
                url: '<?php echo \Yii::$app->getUrlManager()->createUrl('product/size') ?>',
                data: {id: id,id_pro:id_pro},
                success:function (data) {
                    $('#ress').html(data);


                }
            });
        }
    );
</script>