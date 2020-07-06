<?php

$url=Yii::$app->urlManager;
?>
<div style="background: white">
<h3 class="text-center" style="color: darkred">چیدمان صفحه اصلی</h3>


<ul>
    <li>

        <a href="<?=$url->createAbsoluteUrl(['mainapp/create','type'=>'oneImage'])?>">تنها یک عکس</a>
        <h4 style="color: #0000aa">توضیحات</h4>
        <span style="color:rgba(0,0,0,0.5)">به صورت تک عکس بوده و شما باید این عکس را به یک محصول یا یک دسته ای خاصی ربط بدهید</span>

    </li>
    <br>
    <li>

        <a href="<?=$url->createAbsoluteUrl(['mainapp/create','type'=>'fourImage'])?>">4 عکس</a>
        <h4 style="color: #0000aa">توضیحات</h4>
        <span style="color:rgba(0,0,0,0.5)"></span>
    </li>
    <br>
    <li>

        <a href="<?=$url->createAbsoluteUrl(['mainapp/create','type'=>'oneText'])?>"> یک نوشته و یک عکس</a>
        <h4 style="color: #0000aa">توضیحات</h4>
        <span style="color:rgba(0,0,0,0.5)"></span>
    </li>
    <br>
    <li>

        <a href="<?=$url->createAbsoluteUrl(['mainapp/create','type'=>'towText'])?>">2 نوشته و یک عکس</a>
        <h4 style="color: #0000aa">توضیحات</h4>
        <span style="color:rgba(0,0,0,0.5)"></span>
    </li>
    <br>
    <li>

        <a href="<?=$url->createAbsoluteUrl(['mainapp/create','type'=>'sllider'])?>">اسلایدر</a>
        <h4 style="color: #0000aa">توضیحات</h4>
        <span style="color:rgba(0,0,0,0.5)"></span>
    </li>

    <br>
    <li>

        <a href="<?=$url->createAbsoluteUrl(['mainapp/create','type'=>'treeImage'])?>">3 نوشته و 3 عکس</a>
        <h4 style="color: #0000aa">توضیحات</h4>
        <span style="color:rgba(0,0,0,0.5)"></span>
    </li>
    <br>

    <li>

      <a href="<?=$url->createAbsoluteUrl('mainapp/index')?>">مدیریت صفحه</a>
        <h4>توضیحات</h4>
        <span style="color:rgba(0,0,0,0.5)"></span>
    </li>


    <li>

        <a href="<?=$url->createAbsoluteUrl('galleryapp/index')?>">گالری</a>
        <h4>توضیحات</h4>
        <span style="color:rgba(0,0,0,0.5)"></span>
    </li>

    <li>

        <a href="<?=$url->createAbsoluteUrl('mainapp/position')?>">الویت بندی</a>
        <h4>توضیحات</h4>
        <span style="color:rgba(0,0,0,0.5)"></span>
    </li>
    
</ul>
</div>