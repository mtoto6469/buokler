<?php
$url=Yii::$app->urlManager;
?>

<section class="datalis-sec text-center">
    <h3>تمام مقالات</h3>
    <div class="container">

        <?php
        if($allpost!=null){
        foreach ($allpost as $a){
            $img=\frontend\models\Tblgallery::findOne($a->id_img_web );

            ?>
                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3" style="margin: 20px">
                    <div class="box-g" style="background: #f7f7f7;width: 100%;">
                        <?php
                        if($img!=null){?>

                            <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$img->address?>" alt="<?=$img->alert?>" style="width:100%;height: 100px;background:rgba(0,0,0,0.3)" >

                            <?php
                        }
                        ?>

                        <div class="into-box-g text-right" style="padding: 15px">
                            <h4><a href="<?=$url->createAbsoluteUrl(['site/post','id'=>$a->id])?>"><?=$a->title?></a></h4>

                        </div>


                    </div>
                </div>

        <?php   }
        }


        ?>



    </div>

</section>