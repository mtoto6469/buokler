<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;

$cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $product->id_category])->one(); ?>
<?php $br = \frontend\models\Tblbrand::find()->where(['id' => $product->id_brand])->one(); ?>

<div class="con" style="padding-top: 0;padding-bottom: 0;">
    <div class="row" style="background:rgba(0,0,200,.1);padding: 1%!important;">
        <div class="col-md-3"></div>
        <div class="col-md-9" style="text-align: right">
            <div class="col-md-1"></div>
            <?php $form = ActiveForm::begin(['action' => ['/product/search']]); ?>
            <div class="col-md-3" >
                <div class="form-group">
                    <?= Html::submitButton( Yii::t('app', 'جستجو <i class="fa fa-search" aria-hidden="true"></i>'), ['class' =>'btn btn-default',
                        'style'=>'width:200px;background:#00A8FF;border:1px solid #00A8FF;margin-top:10%']) ?>
                </div>
            </div>

            <div class="col-md-4"> برند
                <select class="form-control" name="brand" >
                    <option value="0">همه ی برند ها</option>
                    <?php

                    foreach ($brand as $b){?>

                        <option value="<?=$b->id?>"><?=$b->brand?></option>

                        <?php
                    }

                    ?>
                </select>
            </div>

            <div class="col-md-4"> دسته
                <select class="form-control" name="cat" >
                    <option value="0">همه ی دسته ها</option>
                    <?php

                    foreach ($cat_pro2 as $cp){?>

                        <option value="<?=$cp->id?>"><?=$cp->name?></option>

                        <?php
                    }

                    ?>
                </select>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<div class="con">
    <div class="row" >

        <div class="col-sm-12 " style="min-height:500px">
        <section id="description" >
            <div >
                <?php

                if (isset($_SESSION['message_size'])) {
                    if ($_SESSION['message_size'] != null) {
                        echo '<div class="alert aler-danger text-center">' . $_SESSION['message_size'] . '</div>';
                        $_SESSION['message_size'] = null;
                    }
                }
                ?>

                <?php

                if (isset($_SESSION['message'])) {
                    if ($_SESSION['message'] != null) {
                        echo '<div class="alert alert-success text-center">' . $_SESSION['message'] . '</div>';
                        $_SESSION['message'] = null;
                    }
                }
                ?>


                <div class="row" >

                    <div class="col-md-8 col-sm-6 col-xs-12  text-right" style="margin-top: -3%">
                        <h1 style="font-size:20px"><span class="in_sport"><?= $product->name ?></span></h1>
                        <table class="table">
                            <tbody>

                            <tr>
                                <td><span ><?php
                                        if ($br != null) {
                                            ?>
                                            <h5 ><?= $br->brand ?></h5>
                                            <?php
                                        }
                                        ?> </span></td>
                                <td> برند</td>
                            </tr>
                            <?php $form = ActiveForm::begin(); ?>
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <input value="1" type="number" min="1" name="model_count" id="model_count"
                                           style="width: 70px" onchange="fun2()"> تعداد


                                </td>
                            </tr>

                            <tr>
                                <td><span></span></td>
                                <td><?= $exist ?></td>
                            </tr>
                            </tbody>
                        </table>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="color:#3b5998">درباره محصول</h3>
                                <p style="overflow-wrap: break-word"><?= $product->text_meta ?></p>
                                <h3 style="color:#3b5998"><span> :قیمت</span></h3>
                                <h3 class="price">  <?php

                                    if ($product->takhfif != null) {
                                        ?>
                                        <s class="b"
                                           style="color: darkred;font-size: 15px"><span>تومان </span><?= number_format( $product->price) ?>
                                        </s><br>
                                        <span style="color:#4caf50 !important">تومان </span>
                                        <span style="color:#4caf50 !important"><?=number_format(  $product->takhfif) ?></span><br>
                                        <?php
                                    } else {
                                        ?>
                                       <span style="color:#4caf50 !important">تومان </span> <span  style="color:#4caf50 !important"> <?=number_format( $product->price) ?></span><br>
                                        <?php
                                    }

                                    ?></h3>

                                <?php
                                $tel = \frontend\models\TbladdresPhon::findOne(1);
                                ?>
                                <h5><span>شماره تماس :<?= $tel->tel ?></span></h5>
                            </div>
                        </div>


                        <div>
                            <button type="submit" name="btn" value="bag" class="btn btn-cart" style="width: 150px;border-radius: 6px 0 0 6px;margin-right: -4px;">
                                افزودن به سبد خرید
                            </button>
                            <button type="submit" name="btn" value="bag" class="btn btn-cart" style="background: #62b965;width: 40px;border-radius: 0 6px  6px 0;padding: 10px;">
                               <img src="<?=Yii::$app->request->hostInfo?>/upload/j.png" alt="بوکلر">
                            </button>
                        </div>

                    </div>
                    <?php ActiveForm::end(); ?>
                    <div class="col-md-4 col-sm-6 col-xs-12" >
                        <div id="carousel-custom" class="carousel slide left_img" data-ride="carousel">
                            <div class="row">

                                <div class="col-md-10 col-sm-10 ">
                                    <div class="carousel-outer">
                                        <!-- me art lab slider -->
                                        <div class="carousel-inner " >

                                            <div class="item active"><img data-image="yellow"
                                                                          src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $product->img ?>"
                                                                          alt="" style="height:40%!important;"/>
                                            </div>

                                            <?php
                                            if($product->imags_id!=null){

                                            $imag=explode('*',$product->imags_id);
                                            for($i=0;$i<2;$i++) {
                                                if($imag[$i]==null){?>
                                                    <div class="item "><img data-image="yellow"
                                                                          src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $product->img ?>"
                                                                          alt="بوکلر-عکس" style="height: 20%!important;"/>
                                            </div>
                                              <?php
                                                }
                                                ?>

                                                <div class="item"><img data-image="black"
                                                                       src="<?= Yii::$app->request->hostInfo ?>/upload/<?=$imag[$i]?>"
                                                                       alt="بوکر -عکس" style="height: 400px!important;"/></div>
                                                <?php
                                            }

                                            }
                                            ?>


                                        </div>

                                        <!--                                <!-- sag sol -->-
                                        <!--                                <a class="left carousel-control " href="#carousel-custom" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span>-->
                                        <!--                                    <a class="right carousel-control " href="#carousel-custom" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>-->
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-10 ">
                                    <ol class="carousel-indicators mCustomScrollbar meartlab disp">
                                        <li data-target="#carousel-custom" data-slide-to="0" class="active"><img
                                                data-image="yellow"
                                                src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $product->img ?>"
                                                alt=""/></li>
                                        <?php
                                        if($product->imags_id!=null){

                                            $imag=explode('*',$product->imags_id);
                                            for($i=0;$i<count($imag);$i++) {
                                                if($imag[$i]==null){?>
                                                    <li data-target="#carousel-custom" data-slide-to="0" ><img
                                                            data-image="yellow"
                                                            src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $product->img ?>"
                                                            alt="بوکلر-عکس"/></li>
                                                    <?php
                                                }

                                                ?>
                                                <li data-target="#carousel-custom" data-slide-to="1"><img data-image="black"
                                                                                                          src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $imag[$i] ?>"
                                                                                                          alt="بوکلر-عکس"/></li>

                                                <?php
                                            }
                                        }
                                        ?>

                                    </ol>
                                </div>
                            </div>

                            <!-- thumb -->

                        </div>
                    </div>
                </div>


            </div>
        </section>
            </div>
    </div>
   
  <div class="row" style="border:1px solid #e5e5e5;border-radius:10px 10px ;margin:5px 20px!important;text-align:center;padding:10px 5!important" >
        <div class=" col-sm-3 col-md-3 col-lg-3 " style="border-right:1px solid #e5e5e5;text-align:center" >
                                            <div class="content_cont">
                                                            <img src="<?=Yii::$app->request->hostInfo?>/upload/18_fa.png" class="icon img-responsive" alt="ضمانت بازگشت کالا" title="ضمانت بازگشت کالا" width="50px" height="50px " style="position:relative;left:40%;margin-bottom:10px">
                                                                    <div class="desc_cont">
                                        <div class="desc">
                                                                                            <div class="name" style="color:#848484">ضمانت بازگشت کالا</div>
                                                                                                                                        <div class="text" style="color:#9c9c9c">جهت آسودگی خاطر مشتریان</div>
                                                                                    </div>
                                    </div>
                                                                                    </div>
                                    </div>
                            
                            <div class="col-sm-3 col-md-3 col-lg-3" style="border-right:1px solid #e5e5e5">
                                            <div class="content_cont">
                                                            <img src="<?=Yii::$app->request->hostInfo?>/upload/15_fa.png" class="icon img-responsive" alt="ارسال فوق سریع" title="ارسال فوق سریع"  width="50px" height="50px " style="position:relative;left:40%;margin-bottom:10px">
                                                                    <div class="desc_cont">
                                        <div class="desc">
                                                                                            <div class="name" style="color:#848484">ارسال فوق سریع</div>
                                                                                                                                        <div class="text" style="color:#9c9c9c">ارسال کالا به سراسر ایران</div>
                                                                                    </div>
                                    </div>
                                                                                    </div>
                                    </div>
                            <div class="  col-sm-3 col-md-3 col-lg-3" style="border-right:1px solid #e5e5e5">
                                            <div class="content_cont">
                                                            <img src="<?=Yii::$app->request->hostInfo?>/upload/16_fa.png" class="icon img-responsive" alt="پرداخت در هنگام تحویل" title="پرداخت در هنگام تحویل"                      width="50px" height="50px " style="position:relative;left:40%;margin-bottom:10px">
                                                                    <div class="desc_cont">
                                        <div class="desc">
                                                                                            <div class="name" style="color:#848484">پرداخت در هنگام تحویل</div>
                                                                                                                                        <div class="text" style="color:#9c9c9c">ویژه شهر تهران</div>
                                                                                    </div>
                                    </div>
                                                                                    </div>
                                    </div>
                            <div class=" col-sm-3 col-md-3 col-lg-3" >
                                            <div class="content_cont">
                                                            <img src="<?=Yii::$app->request->hostInfo?>/upload/17_fa.png" class="icon img-responsive" alt="کالای اصلی گارانتی اصلی" title="کالای اصلی گارانتی اصلی"                    width="50px" height="50px " style="position:relative;left:40%;margin-bottom:10px">
                                                                    <div class="desc_cont">
                                        <div class="desc">
                                                                                            <div class="name" style="color:#848484">کالای اصلی گارانتی اصلی</div>
                                                                                                                                        <div class="text" style="color:#9c9c9c">ضمانت اصل بودن تمامی محصولات</div>
                                                                                    </div>
                                    </div>
                                                                                    </div>
                                    </div>
                    </div>  
</div>

 

<?php

class sub3{

    function add($cp){

        $url=Yii::$app->urlManager;
        $category=\frontend\models\TblcategoryProduct::find()->where(['id_parent'=>$cp->id])->andWhere(['enabel_view'=>1])->all();

        if($category!=null){?>


            <div class="panel panel-default" style="position: relative!important;">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#<?='c'.$cp->id?>">
                            <span class=" pull-right"><i class="fa fa-plus"></i></span>
                            <a href="<?=$url->createAbsoluteUrl(['product/category','id'=>$cp->id])?>"><?=$cp->name?></a>
                        </a>
                    </h4>
                </div>
                <div id="<?='c'.$cp->id?>" class="panel-collapse collapse">

                    <div class="panel-body">
                        <ul style="padding: 0!important;">
                            <?php foreach ($category as $c){?>
                                <li style="padding: 0!important;">
                                    <?=$this->add($c)?>

                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>


        <?php }else{?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="<?=$url->createAbsoluteUrl(['product/category','id'=>$cp->id])?>"><?=$cp->name?></a></h4>
                </div>
            </div>
        <?php }




    }
}

?>



<?php

class sub4{

    function add($t){
        $url=Yii::$app->urlManager;

        $category=\frontend\models\TbltypeProduct::find()->where(['id_parent'=>$t->id])->andWhere(['enabel_view'=>1])->all();

        if($category!=null){?>

            <div class="panel panel-default" style="position: relative!important;">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse"  href="#<?='t'.$t->id?>">
                            <span class=" pull-right"><i class="fa fa-plus"></i></span>
                            <a href="<?=$url->createAbsoluteUrl(['product/type','id'=>$t->id])?>"><?=$t->type?></a>
                        </a>
                    </h4>
                </div>
                <div id="<?='t'.$t->id?>" class="panel-collapse collapse">

                    <div class="panel-body">
                        <ul style="padding: 0!important;">
                            <?php foreach ($category as $c){?>
                                <li style="padding: 0!important;">
                                    <?=$this->add($c)?>

                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>


        <?php }else{?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="<?=$url->createAbsoluteUrl(['product/type','id'=>$t->id])?>"><?=$t->type?></a></h4>
                </div>
            </div>
        <?php }


    }
}

?>




<script type="text/javascript">
    function myFunction() {

        var size= $('#tblbag-size').val();
        var name=$('#name').text();
        var color=$('#color').text();
        var date=$('#date').val();
        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('bag/find') ?>',
            data: {size: size,name:name,color:color,date:date},
            success:function (data) {
                $('#exist').html(data);

            }
        });
    }

</script>
