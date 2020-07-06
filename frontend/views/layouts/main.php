<?php

/* @var $this \yii\web\View */
/* @var $content string */

//use frontend\assets\AppAssetShop;

use backend\models\TbldisPro;
use frontend\models\Tbldiscount;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

$url = Yii::$app->urlManager;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php $addres = \frontend\models\TbladdresPhon::find()->where(['id' => 1])->one() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--<title>فروشگاه اینترنتی بوکلر<title>-->
   
    <link rel="icon" type="image/png"  href="<?=Yii::$app->request->hostInfo?>/upload/logo.png" >

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119555594-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119555594-1');
</script>
    <?php $this->head() ?>
</head><!--/head-->
<?php $this->beginBody() ?>


<div >
    <div id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="<?=$url->createAbsoluteUrl(['site/index'])?>" style="color:orange"><i class="fa fa-phone"></i><?=$addres->tel?></a></li>
                                <li><a href="<?=$url->createAbsoluteUrl(['site/index'])?>"> لوازم آشپزخانه</a></li>
                                <li><a href="https://t.me/noget">لینک  تلگرام ما</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <?php
                                if (!Yii::$app->user->isGuest) {
                                    $user = \common\models\User::findOne(Yii::$app->user->getId());

                                    ?>

                                    <li><a  href="#"
                                           class="text-uppercase" style="margin-top: 10px"><?= $user->username ?></a></li>
                                    <li><a href="<?= $url->createAbsoluteUrl(['profile/setting']) ?>"><i
                                                class="fa fa-user" style="color: orange"></i> پروفایل</a></li>
                                    <?php
                                }
                                ?>



                                <?php
                                if (!Yii::$app->user->isGuest) {
                                    ?>
                                    <li><a href="<?= $url->createAbsoluteUrl(['site/logout']) ?>"><i
                                                class="fa fa-lock" style="color: orange"></i> خروج</a></li>

                                    <?php
                                } else {
                                    ?>
                                    <li><a href="<?= $url->createAbsoluteUrl(['site/signup']) ?>"><i
                                                class="fa fa-lock" style="color: orange"></i> ثبت نام</a></li>
                                    <li><a href="<?= $url->createAbsoluteUrl(['site/login']) ?>"><i
                                                class="fa fa-lock" style="color: orange"></i> ورود</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div><!--/header_top-->
<!---->
<!--        <div class="header-middle"><!--header-middle-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-sm-4">-->
<!--                        <div class="logo pull-left">-->
<!--                            <a href="index.html"><img src="--> <!--/upload/bg_border.png"-->
<!--                                                      alt=""/></a>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                    <div class="col-sm-8">-->
<!--                        <div class="shop-menu pull-right">-->
<!--                            <ul class="nav navbar-nav">-->
<!---->
<!---->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 " >
                    <div ><a href="<?=$url->createAbsoluteUrl(['site/index'])?>"><img src="<?=Yii::$app->request->hostInfo?>/upload/logo.png" style="width: 100px;height: 30px" alt="لوگو بوکلر"></a></div>
                </div>
                <div class="col-sm-9" >
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-right" >
                        <ul class="nav navbar-nav collapse navbar-collapse new">
                            <?php
                            $i=0;
                            $price=0;
                            if(!Yii::$app->user->isGuest){
                                $bag=\frontend\models\Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->all();
                                if($bag!=null){
                                    $i=0;
                                    $price=0;
                                    foreach ($bag as $b){
                                        $price+=$b->price;
                                        $i++;
                                    }
                                }

                            }

                            ?>
                            <!--<a href="<?= $url->createAbsoluteUrl(['bag/product']) ?>" >-->
                            <!--        <i class="fa fa-shopping-cart fa-2x" style="margin: -10px!important;color:#00A8FF"></i>-->
                            <!--        <span><?=$i?></span><span style="color: red;"><?=$price?></span></a>-->
                            <li style="position:relative" ><div class="shop-cart"><a href="<?= $url->createAbsoluteUrl(['bag/product']) ?>" title="نمایش سبد خرید من" rel="nofollow">
		
			<span class="ajax_cart_quantity"><?=$price?></span>
			
			
			            
		</a></div><span class="count-cart"><?=$i?></span></li>
                            <li><a href="<?= $url->createAbsoluteUrl(['site/allpost']) ?>" > مقالات</a></li>

                            <li class="dropdown"><a href="<?= $url->createAbsoluteUrl(['site/about']) ?>"> درباره ما</a>

                            </li>

                            <li><a href="<?= $url->createAbsoluteUrl(['site/contact']) ?>">تماس با ما</a></li>


                            <li><a href="<?= $url->createAbsoluteUrl(['site/index']) ?>" class="active">صفحه اصلی</a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
</div><!--/header-bottom-->
</header><!--/header-->
<!--/slider-->


    <div class="row" style="padding: 2%!important;width: 100%">

        <div class="col-md-10" >
            <div id="carousel-main" class="carousel slide " data-ride="carousel" data-interval="5000" style="margin-left: 3%!important;">
                <!-- Carousel items -->
                <div class="carousel-inner ri-im">
                    <div class="active item">

                        <img src="<?= Yii::$app->request->hostInfo ?>/upload/Lucas-Allen-tatler-10feb14_pr_b_639x426.jpg" class="img-responsive" alt="فروشگاه اینترنتی">
                    </div>


                    <?php

                    $slider=\backend\models\Slider::find()->where(['enabel'=>1])->all();
                    if($slider!=null) {

                        foreach ($slider as $sli) {
                            ?>
                            <div class="item">

                                    <img
                                        src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $sli->img ?>"
                                        class=" img-responsive" alt="<?= $sli->alt ?>"
                                        />


                            </div>

                            <?php
                        }
                    }

                    ?>

                </div>


                <!-- Controls -->
                <a class="left carousel-control" href=".carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href=".carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-md-2 disp">
            <div id="carousel-pager" class="carousel slide " data-ride="carousel" data-interval="1000">
                <!-- Carousel items -->
                <div class="carousel-inner vertical">
                    <div class="active item le-im">
                        <img src="<?= Yii::$app->request->hostInfo ?>/upload/Lucas-Allen-tatler-10feb14_pr_b_639x426.jpg" class="img-responsive" data-target="#carousel-main" data-slide-to="0">
                    </div>


                    <?php

                    $slider=\backend\models\Slider::find()->where(['enabel'=>1])->all();
                    if($slider!=null) {
                        $i=1;
                        foreach ($slider as $sli) {
                            ?>
                            <div class="item le-im">

                                <img
                                    src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $sli->img ?>"
                                    class="img-responsive" data-target="#carousel-main" data-slide-to="<?=$i?>" alt="<?= $sli->alt ?>"
                                />


                            </div>

                            <?php
                            $i++;
                        }
                    }

                    ?>

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-pager" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-pager" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>






<div >
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>
</div>


<!--Item slider text-->

<div class="spe-cor" style=";height: 400px!important;margin-top:-10px!importent">
    <div style="padding: 2%;">
        <h4 class="title text-center">پیشنهاد ما به شما</h4>
        <div id="spe-cor" class="carousel carousel-correspondence slide" >
            <div class="carousel-inner">
                <?php
                $offer2 =\frontend\models\Tblproduct::find()->where(['enabel_view'=>1])->andWhere(['prposal'=>1])->limit(1)->orderBy(['id'=>SORT_DESC])->all();

                if($offer2!=null) {
                    foreach ($offer2 as $of) {
                        ?>
                        <div class="item active">
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                <div class="thumbnail row">
                                    <a href="<?=$url->createAbsoluteUrl(['bag/datalis','id'=>$of->id])?>">
                                        <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $of->img ?>" style="width: 120px;height: 120px" alt="
                                       <?= $of->name ?>"></a>

                                    <div class="caption text-center">
                                        <h5 class="text-center"><?= $of->name ?></h5>
                                        <?php


                                        if($of->takhfif!=null){

                                          
                                            ?>
                                            <h6> قیمت <?=$of->takhfif?>تومان </h6><br>
                                            <s class="b" style="color: orange"> قیمت <?=$of->takhfif?></s><br>

                                            <?php
                                        }else{?>
                                            <h5> قیمت <?=$of->price?>تومان </h5><br>
                                            <?php
                                        }

                                        ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
<?php
                $offer2 =\frontend\models\Tblproduct::find()->where(['enabel_view'=>1])->andWhere(['prposal'=>1])->offset(1)->orderBy(['id'=>SORT_DESC])->all();

                if($offer2!=null) {
                    foreach ($offer2 as $of) {
              ?>
                        <div class="item">
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                <div class="thumbnail row">
                                   <a href="<?=$url->createAbsoluteUrl(['bag/datalis','id'=>$of->id])?>">
                                       <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $of->img ?>" style="width: 120px;height: 120px" <?= $of->name ?>></a>

                                    <div class="caption text-center">
                                        <h5 class="text-center"><?= $of->name ?></h5>
                                        <?php


                                        if($of->takhfif!=null){

                                          
                                            ?>
                                            <h6> قیمت <?=$of->takhfif?>تومان</h6><br>
                                            <s class="b" style="color: orange"> قیمت <?=$of->takhfif?> </s><br>

                                            <?php
                                        }else{?>
                                            <h5> قیمت <?=$of->price?>تومان </h5><br>
                                            <?php
                                        }

                                        ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>


            </div>
            <div class="controls">
                <a class="left carousel-control" href="#spe-cor" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="right carousel-control" href="#spe-cor" data-slide="next"><i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
        <!-- End Carousel -->
    </div>
</div>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row text-right">

                <div class="col-sm-12">
                    <?php
                    $brand=\frontend\models\Tblbrand::find()->limit(6)->all();
                    if($brand!=null) {
                        foreach ($brand as $b) {
                            ?>
                            <div class="col-xs-6 col-sm-6 col-md-2">
                                <div class="video-gallery text-center" style="background: #F2F2F2">
                                    <a href="<?=$url->createAbsoluteUrl(['product/brand','id'=>$b->id])?>">
                                        <div class="iframe-img">
                                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?=$b->img_brand?>" alt="<?=$b->brand?>"/>
                                        </div>
                                        <div class="overlay-icon">
                                            <i ><span><?=$b->brand?></span></i>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>



                </div>
                <div class="col-sm-12">
                    <?php
                    $brand=\frontend\models\Tblbrand::find()->limit(12)->offset(6)->all();
                    if($brand!=null) {
                        foreach ($brand as $b) {
                            ?>
                            <div class="col-xs-6 col-sm-6 col-md-2">
                                <div class="video-gallery text-center" style="background: #F2F2F2">
                                    <a href="<?=$url->createAbsoluteUrl(['product/brand','id'=>$b->id])?>">
                                        <div class="iframe-img">
                                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?=$b->img_brand?>" alt="<?=$b->brand?>"/>
                                        </div>
                                        <div class="overlay-icon">
                                            <i ><span><?=$b->brand?></span></i>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>



                </div>


                <div class="col-sm-12">
                    <?php
                    $brand=\frontend\models\Tblbrand::find()->limit(18)->offset(12)->all();
                    if($brand!=null) {
                        foreach ($brand as $b) {
                            ?>
                            <div class="col-xs-6 col-sm-6 col-md-2 ">
                                <div class="video-gallery text-center" style="background: #F2F2F2">
                                    <a href="<?=$url->createAbsoluteUrl(['product/brand','id'=>$b->id])?>">
                                        <div class="iframe-img">
                                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?=$b->img_brand?>" alt="<?=$b->brand?>"/>
                                        </div>
                                        <div class="overlay-icon">
                                            <i ><span><?=$b->brand?></span></i>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>



                </div>

            </div>
        </div>




        
    </div>

    <div class="footer-widget" >
        <div class="container" style="border-bottom: 1px solid #E0E0DA;">
            <div class="row text-right">


                    <div class="col-sm-5" style="text-align: right">
                        <div class="single-widget">
                            <h2 style="color: orange">محصولات جدید</h2>
                            <ul class="nav nav-pills nav-stacked" >
                                <?php
                                $product = \frontend\models\Tblproduct::find()->where(['enabel_view'=>1])->limit(4)->orderBy(['id'=>SORT_DESC])->all();
                                foreach ($product as $p) {
                                    ?>
                                    <li><a href="<?=$url->createAbsoluteUrl(['bag/datalis','id'=>$p->id])?>"><div class="text-right" >
                                            <div style="float: right;margin: 10px">
                                                <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$p->img?>" style="width: 40px;height: 50px;padding-top: 5px" alt="<?=$p->name?>">

                                            </div>
                                            <div>
                                                <p style="font-size: 15px ;color:whitesmoke;margin-right: 10px"><?=$p->name?></p>
                                                <?php


                                                if($p->takhfif!=null){

                                                    ?>
                                                    <h5 style="color: silver"> قیمت <?=$p->takhfif?>تومان </h5>
                                                    <s class="b" style="color: darkred"> قیمت <?=$p->price?></s><br>

                                                    <?php
                                                }else{?>
                                                    <h5 style="color: silver"> قیمت <?=$p->price?>تومان </h5><br>
                                                    <?php
                                                }

                                                ?>
                                            </div>

                                        </div></a></li>
                                <?php }

                                ?>

                            </ul>
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-2" style="text-align: right">
                        <div class="single-widget">
                            <h2 style="color: orange">عضویت</h2>
                            <ul class="nav nav-pills nav-stacked">

                                <?php
                                if (!Yii::$app->user->isGuest) {
                                    ?>
                                    <li><a href="<?= $url->createAbsoluteUrl(['site/logout']) ?>"><i
                                                class="fa fa-lock"></i> خروج</a></li>

                                    <?php
                                } else {
                                    ?>
                                    <li><a href="<?= $url->createAbsoluteUrl(['site/signup']) ?>"> ثبت نام</a></li>
                                    <li><a href="<?= $url->createAbsoluteUrl(['site/login']) ?>"> ورود</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2" style="text-align: right">
                        <div class="single-widget">
                            <h2 style="color: orange">دسته بندی</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <?php
                                $cate = \frontend\models\TblcategoryProduct::find()->where(['enabel_view'=>1])->limit(10)->all();
                                foreach ($cate as $c) {
                                    ?>
                                    <li><a href="<?=$url->createAbsoluteUrl(['product/category','id'=>$c->id])?>"><?= $c->name ?></a></li>
                                <?php }

                                ?>


                            </ul>
                        </div>
                    </div>



                    


                <div class="col-sm-3" style="text-align: right">
                    <div class="single-widget">
                        <h2 style="color:orange">آدرس</h2>

                        <span style="color:grey"><?= $addres->address ?></span>
                        <h2 style="color:orange">شماره تماس</h2>
                        <span style="color:grey"><?= $addres->tel ?></span>
                    </div>
                </div>

            </div>
        </div>
       
    </div>
<div class="">
        <div class="container">
            <div class="row text-right">

                <div class="col-sm-12">
                  
                            <div class="col-xs-6 col-sm-6 col-md-2 text-right" style="float:right;">
                                <div class="video-gallery text-center" style="background: #F2F2F2">
                                    <a href="<?=$url->createAbsoluteUrl(['product/brand','id'=>$b->id])?>">
                                        <div class="iframe-img">
                                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/" alt=""/>
                                        </div>
                                     
                                    </a>

                                </div>
                            </div>
                 
  <div class="col-xs-6 col-sm-6 col-md-2 text-right" style="float:right">
                                <div class="video-gallery text-center" style="background: #F2F2F2">
                                    <a href="<?=$url->createAbsoluteUrl(['product/brand','id'=>$b->id])?>">
                                        <div class="iframe-img">
                                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/" alt=""/>
                                        </div>
                                     
                                    </a>

                                </div>
                            </div>
                              <div class="col-xs-6 col-sm-6 col-md-2 text-right" style="float:right">
                                <div class="video-gallery text-center" style="background: #F2F2F2">
                                    <a href="<?=$url->createAbsoluteUrl(['product/brand','id'=>$b->id])?>">
                                        <div class="iframe-img">
                                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/" alt=""/>
                                        </div>
                                     
                                    </a>

                                </div>
                            </div>
                            
                              <div class="col-xs-6 col-sm-6 col-md-2 text-right" style="float:right">
                                <div class="video-gallery text-center" style="background: #F2F2F2">
                                    <a href="<?=$url->createAbsoluteUrl(['product/brand','id'=>$b->id])?>">
                                        <div class="iframe-img">
                                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/" alt=""/>
                                        </div>
                                     
                                    </a>

                                </div>
                            </div>


                </div>
              

            </div>
        </div>




        
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-right">طراحی شده توسط تیم برنامه نویسی .<a href="http://no-et.com">طرح ریزان حامی</a></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


</div>
</html>

<?php $this->endBody() ?>

<?php $this->endPage() ?>
<?php

class sub
{

    function add($id_parent)
    {
        $url = Yii::$app->urlManager;
        $category = \backend\models\Tblcategory::find()->where(['id_parent' => $id_parent])->all();
        $count = \backend\models\Tblcategory::find()->where(['id_parent' => $id_parent])->count();

        echo '<ul class="dropdown dropdown-left">';
        foreach ($category as $ca) {
            echo '<li><a href="' . $url->createAbsoluteUrl(['category/post', 'id' => $ca->id_category]) . '">' . $ca->title_category . '</a>';
            $this->add($ca->id_category);
            echo '</li>';
        }
        echo ' </ul>';


    }
}

?>



<?php

class sub2
{

    function add($id_parent)
    {

        $url = Yii::$app->urlManager;
        $category = \frontend\models\TblcategoryProduct::find()->where(['id_parent' => $id_parent])->all();

        echo '<ul class="dropdown dropdown-left">';
        foreach ($category as $ca) {
            echo '<li><a href="#">' . $ca->name . '</a>';
            $this->add($ca->id);
            echo '</li>';
        }
        echo ' </ul>';


    }
}

?>
