<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$url=Yii::$app->urlManager;
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



    <section>
        <div class="con">
            <div class="row">
                <div class="col-sm-3" style="border:1px solid rgba(0,0,200,0.1);padding: 3%;background: rgba(0,0,200,0.1)">
                    <div class="left-sidebar">
                        <h2>دسته بندی</h2>

                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <?php
                            $ob=new sub3();
                            foreach ($cat_pro as $cp){
                                $ob->add($cp);
                            }

                            ?>

                        </div><!--/category-products-->





                        <div class="brands_products"><!--brands_products-->
                            <h2>برند</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <?php foreach ($brand as $b){?>

                                        <li><a href="<?=$url->createAbsoluteUrl(['product/brand','id'=>$b->id])?>"><?=$b->brand?></a></li>

                                    <?php  }?>
                                </ul>
                            </div>
                        </div><!--/brands_products-->

             

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h1 class="title text-center">برند<?=$brand_pro->brand?></h1>
                        <?php $product=\frontend\models\Tblproduct::find()->where(['id_brand'=>$brand_pro->id])->all()?>
                        <?php foreach ($product as $p) { ?>
                          
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
                        }?>

                    </div><!--features_items-->
                

                </div>
            </div>
        </div>
    </section>






<?php

class sub3{

    function add($cp){

        $url=Yii::$app->urlManager;
        $category=\frontend\models\TblcategoryProduct::find()->where(['id_parent'=>$cp->id])->andWhere(['enabel_view'=>1])->all();

        if($category!=null){?>


            <div class="panel panel-default" style="position: relative!important;">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse"  href="#<?='c'.$cp->id?>">
                            <span class="pull-right"><i class="fa fa-plus"></i></span>
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
                            <span class="pull-right"><i class="fa fa-plus"></i></span>
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
<?php
