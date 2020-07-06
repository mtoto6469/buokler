<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$url=Yii::$app->urlManager;

?>


    <div class="con" style="padding-top: 0;padding-bottom: 0;margin-bottom: -20px">
        <div class="row" >
            <div class="col-md-3"></div>
            <div class="col-md-9" style="text-align: right">
                <div class="col-md-2"></div>
                <?php $form = ActiveForm::begin(['action' => ['/product/search']]); ?>
                <div class="col-md-2">
                    <div class="form-group">
                        <?= Html::submitButton( Yii::t('app', 'جستجو <i class="fa fa-search" aria-hidden="true"></i>'), ['class' =>'btn btn-primary']) ?>
                    </div>
                </div>

                <div class="col-md-2"> برند
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
                <div class="col-md-2"> جنس

                    <select class="form-control" name="type" >
                        <option value="0">همه جنس ها</option>
                        <?php

                        foreach ($type2 as $t){?>

                            <option value="<?=$t->id?>"><?=$t->type?></option>

                            <?php
                        }

                        ?>
                    </select>
                </div>
                <div class="col-md-2"> دسته
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
                <div class="col-sm-3">
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
                            <h2>جنس</h2>
                            <div class="brands-name">
                                <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                    <?php
                                    $ob=new sub4();
                                    foreach ($type as $t){

                                        $ob->add($t);
                                    }

                                    ?>

                                </div><!--/category-products-->
                            </div>
                        </div><!--/brands_products-->


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
                        <h2 class="title text-center"> جنس  <?=$type_pro->type?></h2>
                        <?php $product=\frontend\models\Tblproduct::find()->where(['id_type'=>$type_pro->id])->all()?>
                        <?php foreach ($product as $p) { ?>
                            <?php $cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one(); ?>
                            <?php $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one(); ?>
                            <?php $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one(); ?>
                            <div class="col-sm-3">
                                

                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center" style="height:350px!important;">
                                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $p->img ?>"
                                                 width="60%" height="55%" alt="">
                                          
                                            <?php $cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one(); ?>
                                            <?php $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one(); ?>
                                            <?php $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one(); ?>
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
                                               class="btn btn-default add-to-cart"><i class="fa fa-user"></i>جزئیات
                                                </a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">


                                                <?php $cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one(); ?>
                                                <?php $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one(); ?>
                                                <?php $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one(); ?>
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
                                                   class="btn btn-default add-to-cart"><i class="fa fa-user"></i>جزئیات
                                                  </a>


                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php

                        }?>
                        <?php $obj5= new sub5();
                        $obj5->add($type_pro);
                        ?>


                    </div><!--features_items-->
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">»</a></li>
                    </ul>
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


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#<?='c'.$cp->id?>">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
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

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#<?='t'.$t->id?>">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
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
                    <h4 class="panel-title"> <a href="<?=$url->createAbsoluteUrl(['product/type','id'=>$t->id])?>"><?=$t->type?></a></h4>

                </div>
            </div>
        <?php }




    }
}

?>
<?php
class sub5{
    public function add($parent){
       
$url=Yii::$app->urlManager;


        $all_type=\backend\models\TbltypeProduct::find()->where(['id_parent'=>$parent->id])->all();
        foreach ($all_type as $type_pro){?>

            <?php $product=\frontend\models\Tblproduct::find()->where(['id_type'=>$type_pro->id])->all()?>
            <?php foreach ($product as $p) { ?>
                <?php $cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one(); ?>
                <?php $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one(); ?>
                <?php $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one(); ?>
                <div class="col-sm-3">
                  

                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center" style="height:350px!important;">
                                <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $p->img ?>"
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
                                <a href="<?= $url->createAbsoluteUrl(['bag/pro_color', 'id' => $p->id]) ?>"
                                   class="btn btn-default add-to-cart"><i class="fa fa-user"></i>رنگ
                                    بندی</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <?php $cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one(); ?>
                                    <?php $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one(); ?>
                                    <?php $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one(); ?>
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
                                       class="btn btn-default add-to-cart"><i class="fa fa-user"></i>جزئیات
                                    </a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

            }?>


            <?php $this->add($type_pro)?>
        <?php }


    }

}

?>