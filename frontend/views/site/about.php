<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';

?>
<div class="site-about" style="margin-top: 2%">

    <section id="about" class="section about-us bg white-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <img src='<?=Yii::$app->request->hostInfo?>/upload/7.jpg' class="img-responsive center-block" alt="about-us image" style="height: 250px;width: 400px">
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="section-content">
                        <header class="section-heading mt-0">
                            <h6>به گروه ما خوش امدید</h6>
                            <h4>سخن مدیریت</h4>
                        </header>
                        <div class="section-content-desc">
                            <p>
                                سخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریتسخن مدیریت
                            </p>
                        </div>
                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================================
                Level
    ========================================== -->


    <section class="section mild-bg level progressbars bg-27 " id="level">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="about">
                        <h3 class="text-center">درباره ما</h3>
                        </h5>
                    </div>
         </div>
       </div>
    </section> <!-- /.level -->
    <!-- ========================================
                team
    ========================================== -->

    <div class="container text-right">
        <div style="padding: 2%;margin-bottom: 5%">
           <?php
           if($post!=null){
               echo $post->text_web;
           }

           ?>
        </div>

    </div>

</div>
