<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    'css/site.css',
  'css/bootstrap.min.css',

    'css/prettyPhoto.css',
    'css/price-range.css',
    'css/animate.css',
    
   'css/main.css',
    'css/responsive.css',

        'css/font-awesome/css/font-awesome.min.css',
      

    ];
    public $js = [
//'js/sliderbot.js',
    'js/html5shiv.js',
    'js/respond.min.js',
//'js/jquery.js',
//'js/bootstrap.min.js',
'js/jquery.scrollUp.min.js',
'js/price-range.js',
'js/jquery.prettyPhoto.js',
'js/main.js',




//    'js/Scripts/jquery-3.1.0.min.js',

        'js/Scripts/bootstrap.min.js',
        'js/Scripts/datepicker.js',
    'js/Scripts/MdBootstrapPersianDateTimePicker/jalaali.js',
    'js/Scripts/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.js',
        'js/slider.js',
        'js/botslider.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
