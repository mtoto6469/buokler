
<?php
use frontend\models\TblcategoryProduct;
use frontend\models\Tblcolor;
use frontend\models\Tblproduct;
use frontend\models\Tblsize;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$url=Yii::$app->urlManager;
?>
<?php
if($bag!=null) {

    ?>


    <?php

    if (isset($_SESSION['save'])) {
        if ($_SESSION['save'] != null) {
            ?>

            <div class="alert alert-danger"><?= $_SESSION['save'] ?></div>

            <?php

            $_SESSION['save'] = null;

        }
    }


    ?>
<?php $form = ActiveForm::begin(); ?>
<section id="cart_items">
    <div class="con">
        <div class="alert alert-info" style="text-align: center">

            <p >کاربر گرامی افزودن کالا به سبد خرید به معنی رزرو کالا برای شما نیست. در صورت اتمام موجودی کالا پیش از نهایی کردن خرید، کالا از سبد خرید شما حذف خواهد شد.</p>

        </div>

        <div class="breadcrumbs">



        <div class="table-responsive cart_info">
            <table class="table table-condensed">

                <thead>
                <tr class="cart_menu">
                    <td class="image">محصول</td>
                    <td class="description"></td>
                    <td class="price">قیمت</td>
                    <td class="quantity">تعداد</td>
                    <td class="total">جمع قیمت</td>
                    <td></td>
                  


                    <td>  <input  name="all" type="text"  value="0" hidden="hidden"></td>


                </tr>
                </thead>
                <tbody>

<?php
$price_all=0;
if($bag!=null) {
    foreach ($bag as $b) {
        $product = Tblproduct::find()->where(['enabel_view' => 1])->andWhere(['id' => $b->id_pro])->one();
        $cat_pro = TblcategoryProduct::find()->where(['enabel_view' => 1])->andWhere(['id' => $product->id_category])->one();
        $brand = \frontend\models\Tblbrand::find()->where(['id' => $product->id_brand])->one();
        $type = \frontend\models\TbltypeProduct::find()->where(['enabel_view' => 1])->andWhere(['id' => $product->id_type])->one();



        ?>

        <tr>
            <td class="cart_product">
                <a href=""><img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $product->img ?>" alt=""
                                style="width: 150px"></a>
            </td>
            <td class="cart_description">
                <h4><a href=""><?= $cat_pro->name ?></a></h4>
                <?php
                if ($type != null) {
                    ?>
                    <p><?= $type->type ?></p>
                    <?php
                }
                ?>
                <?php
                if ($brand != null) {
                    ?>
                    <p><?= $brand->brand ?></p>
                    <?php
                }
                ?>

            </td>
            <td class="cart_price">
                <?php
                if($product->takhfif>0){?>
                    <p><?= $product->takhfif ?></p>
                <?php
                    
                }else{?>
                <p><?= $product->price ?></p>
<?php
                }
                ?>
                
                
            </td>

            <td class="cart_price">
                <p><?= $b->count ?></p>
            </td>
       





            <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?= $url->createAbsoluteUrl(['bag/delete', 'id' => $b->id]) ?>"><i
                        class="fa fa-times"></i></a>
            </td>
            <td></td>




        </tr>
        <?php
        $price_all += $b->price;

    }
}?>

                </tbody>
            </table>




        </div>

    </div>
</section> <!--/#cart_items-->


    <section>
        <div class="container">

            <div class="takhfif" style="text-align: right" id="res">
                <span id="price"><?= number_format($price_all) ?> : قیمت نهایی  </span><br>
                <input name="end_price" value="<?= $price_all ?>" id="endprice" hidden>
                <input type="hidden" name="code_off" id="code_off" value="0">
                <span onclick="takhfif()" class="btn btn-warning">اعمال کد تخفیف</span>
                <input type="text" id="takhfif" placeholder="کد تخفیف خود را وارد کنید">


            </div>
        </div>
        <div class="container">


            <div
                style="float: right">  <?= $form->field($factor, 'id_type_post')->radioList($deliver)->label('') ?></div>


            <div class="col-sm-12 padding-right" style="margin-bottom: 5%;text-align: right!important;">


                <div>
                    <div class="tab-pane fade active in " id="reviews">
                        <div class="col-sm-12">
                            <div class="row">


                                <?php

                                if (isset($_SESSION['error_adres'])) {
                                    if ($_SESSION['error_adres'] != null) {
                                        ?>

                                        <div class="alert alert-danger"><?= $_SESSION['error_adres'] ?></div>

                                        <?php

                                        $_SESSION['error_adres'] = null;

                                    }
                                }


                                ?>


                                <div class="col-md-6">
                                    <?= $form->field($factor, 'user_name')->textInput(['placeholder' => 'نام گیرنده را وارد کنید'])->label('') ?>

                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($factor, 'user_tel')->textInput(['placeholder' => 'تلفن گیرنده را وارد کنید'], ['style' => 'text-align:right'])->label('') ?>

                                </div>

                            </div>

                            <?= $form->field($factor, 'adress')->textarea(['placeholder' => 'آدرس گیرنده را وارد کنید'], ['style' => 'text-align:right'])->label('') ?>


                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('app', 'ثبت'), ['class' => 'btn btn-default pull-right', 'style' => 'float:left!important']) ?>
                            </div>


                        </div>

                    </div>

                </div>


            </div><!--/category-tab-->


        </div>
        </div>
    </section>
    <?php ActiveForm::end(); ?>
    <?php
}else{

    echo '<div class="container"> <div class="alert alert-danger text-center">محصولی در سبد خرید شما وجود ندارد</div></div>';

}
?>




<script>
    function myfun() {
       var all= $('#all').val();
        if(all==1){
            $('#all').val(0);


         <?php $bag=\frontend\models\Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->all();
         foreach ($bag as $b){?>
         var b="<?='#'.$b->id?>";

             $(b).css('display','none');

         <?php }

         ?>


        }else{
            $('#all').val(1);



   <?php $bag=\frontend\models\Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->all();
               foreach ($bag as $b){?>
               var b="<?='#'.$b->id?>";

               $(b).css('display','block');

           <?php }


               ?>



    }
    }
</script>
<script>
    function takhfif() {

        if($('#takhfif').val()==''){
            $('#code_off').val(0)
        }else{
            $('#code_off').val($('#takhfif').val())
        }
        var code=$('#code_off').val();
        var price=$('#endprice').val();
        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('bag/findprice') ?>',
            data: {code:code,price:price},
            success:function (data) {
                $('#res').html(data);
            }
        });
    }
</script>

