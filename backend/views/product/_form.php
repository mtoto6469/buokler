<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproduct */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-9">
<?php
if(isset($_SESSION['error'])){
    if($_SESSION['error']!=null){?>
        <div class="alert alert-danger">
            <?=$_SESSION['error']?>
        </div>
  <?php  }
    $_SESSION['error']=null;
}


?>

<div class="tblproduct-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'id_category')->dropDownList($name,['prompt'=>'انتخاب کنید'])->hint('دسته ی محصول را وارد کنید',['style'=>'color:#169F85']) ?>

        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'id_brand')->dropDownList($brand,['prompt'=>'انتخاب کنید'])->hint('برند محصول را وارد کنید',['style'=>'color:#169F85']) ?>

        </div>

    </div>



    <hr>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <div class="row">

        <div class="col-md-6">
            <?= $form->field($modelf, 'image')->fileInput()->label('آپلود عکس')?>

        </div>
        <div class="col-md-6">
            <?= $form->field($modelup, 'imageFiles')->fileInput(['multiple' => true])->label('آپلود عکس')?>

        </div>
    </div>



    <?php
    if(!$model->isNewRecord){?>

        <img id="blah" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$model->img?>" alt="your image" style="width: 200px">

    <?php  }else{
        echo '<img id="blah" src="#" alt="your image" style="width: 200px">';
    }

    ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'price')->textInput() ?>


        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'takhfif')->textInput()->label('قیمت تخفیف خورده')?>

        </div>

    </div>




    <?= $form->field($model, 'exist')->textInput() ?>


    <?= $form->field($model, 'text_meta')->textarea(['rows' => 6])->hint('توضیحات مربوط به کاربر',['style'=>'color:#169F85']) ?>

    <?= $form->field($model, 'title_meta')->textInput() ?>

    <?= $form->field($model, 'key_meta')->textInput() ?>

    <?= $form->field($model, 'tag_meta')->textInput() ?>


    <?= $form->field($model, 'prposal')->radio()->label('محصولات پیشنهادی')?>

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
    function mybtn6() {
//        $(".add-button").click(function () {

//                var id = $(this).val();
//                var id_pro = $('#id' ). val();
        alert('njm');
//                $.ajax({
//                    type: 'GET',
//                    url: '<?php //echo \Yii::$app->getUrlManager()->createUrl('product/size') ?>//',
//                    data: {id: id, id_pro: id_pro},
//                    success: function (data) {
//                        $('#ress').html(data);
//
//
//                    }
//                });
//            }
//        );
    }
</script>
