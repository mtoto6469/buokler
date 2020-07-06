<?php
use frontend\models\Tblproduct;
use frontend\models\Tblsize;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$url = Yii::$app->urlManager;

?>


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





<section style="position: relative">
    <div class="con">

        <div class="row">
            <div class="col-sm-3" style="border:1px solid rgba(0,0,200,0.1);padding: 3%;background: rgba(0,0,200,0.1)">
                <div class="left-sidebar">
                    <h2>دسته بندی</h2>

                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php
                        $ob = new sub3();
                        foreach ($cat_pro as $cp) {
                            $ob->add($cp);
                        }

                        ?>

                    </div><!--/category-products-->


                  


                    <div class="brands_products"><!--brands_products-->
                        <h2>برند</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php foreach ($brand as $b) { ?>

                                    <li>
                                        <a href="<?= $url->createAbsoluteUrl(['product/brand', 'id' => $b->id]) ?>"><?= $b->brand ?></a>
                                    </li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div><!--/brands_products-->


                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items" id="res" ><!--features_items-->
                    <h2 class="title text-center">محصولات</h2>
                    <?php if ($product != null) {
                        
                                    foreach ($product as $p) {
                                        ?>
                                        <div class="col-sm-3">


                                            <div class="product-image-wrapper " dir="rtl">
                                                <a href="<?= $url->createAbsoluteUrl(['bag/datalis', 'id' => $p->id]) ?>"><div class="single-products">
                                                        <div class="productinfo text-center" style="height:350px!important;">
                                                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $p->img ?>"
                                                                 alt="">

                                                            <p><?= $p->name ?></p>

                                                            <?php

                                                            if($p->takhfif!=null){
                                                                echo '<span style="margin-left:30px;">'.number_format($p->takhfif).'</span><span >تومان</span><br>';
                                                                echo '<s>'.$p->price.'</s>';
                                                            }else{
                                                                echo '<span style="margin-left:30px;">'.number_format($p->price).'</span><span >تومان</span>';
                                                            }
                                                            ?>




                                                        </div>

                                                    </div></a>
                                            </div>
                                        </div>

                                        <?php
                                    }


                        
                        if ($category!= null) {

                            $obj5 = new sub5();
                            $obj5->add($category);
                        }

//                        if ($type_pro!= null) {
//                            $obj6 = new sub6();
//                            $obj6->add($type_pro);
//                        }

                        ?>

                        <?php
                    } else {?>
                        <div class="text-center">
                            <img src="<?=Yii::$app->request->hostInfo?>/upload/sory2.jpg" style="width: 400px;height: 300px">
                            <h4 style="color:rgba(0,0,0,0.7);margin-top: 20px">محصولی یافت نشد</h4>
                        </div>

                    <?php
                    } ?>


                </div><!--features_items-->

            </div>
        </div>
    </div>
</section>
<script>
    function cate(id) {


        var cate = $('#inca').val(id);

    }


  


    function typee(id) {

        var type = $('#inta').val(id);
    }


    function brande(id) {
        var brand = $('#inbr').val(id);
    }


    function search() {
        var brand = $('#inbr').val();
    
        var cate = $('#inca').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('product/find') ?>',
            data: {brand: brand, cate: cate},
            success: function (data) {
                $('#res').html(data);
            }
        });
    }
</script>


<?php

class sub3
{

    function add($cp)
    {

        $url = Yii::$app->urlManager;
        $category = \frontend\models\TblcategoryProduct::find()->where(['id_parent' => $cp->id])->andWhere(['enabel_view' => 1])->all();

        if ($category != null) {
            ?>


            <div class="panel panel-default" style="position: relative!important;">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse"  href="#<?= 'c' . $cp->id ?>">
                            <span class=" pull-right"><i class="fa fa-plus"></i></span>
                            <a href="<?= $url->createAbsoluteUrl(['product/category', 'id' => $cp->id]) ?>"><?= $cp->name ?></a>
                        </a>
                    </h4>
                </div>
                <div id="<?= 'c' . $cp->id ?>" class="panel-collapse collapse">

                    <div class="panel-body">
                        <ul style="padding: 0!important;">
                            <?php foreach ($category as $c) { ?>
                                <li style="padding: 0!important;">
                                    <?= $this->add($c) ?>

                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>


        <?php } else {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a
                            href="<?= $url->createAbsoluteUrl(['product/category', 'id' => $cp->id]) ?>"><?= $cp->name ?></a>
                    </h4>
                </div>
            </div>
        <?php }


    }
}

?>



<?php

class sub4
{

    function add($t)
    {
        $url = Yii::$app->urlManager;

        $category = \frontend\models\TbltypeProduct::find()->where(['id_parent' => $t->id])->andWhere(['enabel_view' => 1])->all();

        if ($category != null) {
            ?>

            <div class="panel panel-default" style="position: relative!important;">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse"  href="#<?= 't' . $t->id ?>">
                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                            <a href="<?= $url->createAbsoluteUrl(['product/type', 'id' => $t->id]) ?>"><?= $t->type ?></a>

                        </a>
                    </h4>
                </div>
                <div id="<?= 't' . $t->id ?>" class="panel-collapse collapse">

                    <div class="panel-body">
                        <ul style="padding: 0!important;">
                            <?php foreach ($category as $c) { ?>
                                <li style="padding: 0!important;">
                                    <?= $this->add($c) ?>

                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>


        <?php } else {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a
                            href="<?= $url->createAbsoluteUrl(['product/type', 'id' => $t->id]) ?>"><?= $t->type ?></a>
                    </h4>

                </div>
            </div>
        <?php }


    }
}

?>
<?php

class sub5
{
    public function add($parent)
    {

        $url = Yii::$app->urlManager;

        $all_category = \backend\models\TblcategoryProduct::find()->where(['id_parent' => $parent->id])->all();
        foreach ($all_category as $category) {
            ?>

            <?php $product = \frontend\models\Tblproduct::find()->where(['id_category' => $category->id])->all();



            ?>



            <?php if ($product != null) {


                            foreach ($product as $p) {
                                ?>
                               
                                <div class="col-sm-3">

                                    <div class="product-image-wrapper " dir="rtl">
                                        <a href="<?= $url->createAbsoluteUrl(['bag/datalis', 'id' => $p->id]) ?>"><div class="single-products">
                                                <div class="productinfo text-center" style="height:350px!important;">
                                                    <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $p->img ?>"
                                                         alt="">

                                                    <p><?= $p->name ?></p>

                                                    <?php

                                                    if($p->takhfif!=null){
                                                        echo '<span style="margin-left:30px;">'.number_format($p->takhfif).'</span><span >تومان</span><br>';
                                                        echo '<s>'.$p->price.'</s>';
                                                    }else{
                                                        echo '<span style="margin-left:30px;">'.number_format($p->price).'</span><span >تومان</span>';
                                                    }
                                                    ?>




                                                </div>

                                            </div></a>
                                    </div>
                                </div>

                                <?php
                            }


                if ($category != null) {

                    $this->add($category);
                }
            }
                ?>


        <?php }


    }

}

?>
<?php
class sub6{
public function add($parent){

$url = Yii::$app->urlManager;

$all_type = \backend\models\TbltypeProduct::find()->where(['id_parent' => $parent->id])->all();
foreach ($all_type as $type_pro){
?>

<?php $product = \frontend\models\Tblproduct::find()->where(['id_type' => $type_pro->id])->all() ?>
    <?php if ($product != null) {


                    foreach ($product as $p) {
                        ?>
                        <?php $cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one(); ?>
                        <?php $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one(); ?>
                        <?php $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one(); ?>
                        <div class="col-sm-3">


                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center"
                                         style="height:350px!important;">
                                        <img
                                            src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $p->img ?>"
                                            width="60%" height="55%" alt="">

                                        <p><?= $cat->name ?></p>
                                        <?php
                                        if ($ty != null) {
                                            echo '<span>' . $ty->type . '</span>';

                                        }
                                        ?>
                                        <?php
                                        if ($br != null) {
                                            echo ' ' . '<span>' . $br->brand . '</span>';

                                        } else {
                                            echo '';
                                        }
                                        echo '<br>';
                                        ?>
                                        <a href="<?= $url->createAbsoluteUrl(['bag/datalis', 'id' => $p->id]) ?>"
                                           class="btn btn-default add-to-cart"><i
                                                class="fa fa-user"></i>جزئیات
                                           </a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <p><?= $cat->name ?></p>
                                            <?php
                                            if ($ty != null) {
                                                echo '<span>' . $ty->type . '</span>';

                                            }
                                            ?>
                                            <?php
                                            if ($br != null) {
                                                echo ' ' . '<span>' . $br->brand . '</span>';

                                            } else {
                                                echo '';
                                            }
                                            echo '<br>';
                                            ?>
                                            <a href="<?= $url->createAbsoluteUrl(['bag/datalis', 'id' => $p->id]) ?>"
                                               class="btn btn-default add-to-cart"><i
                                                    class="fa fa-user"></i>جزئیات
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }


        if ($type_pro != null) {

            $this->add($type_pro);
        }
    }
    ?>

        <?php }


}

}

?>

                
