<?php

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Uploadimg extends Model
{
    /**
     * @var UploadedFile
     */
    public $image1;
    public $image2;
    public $image3;
    public $image4;
  

    public function rules()
    {

        return [
            
            [['image1','image2','image3','image4'], 'file'],
        ];

        
        
    }



    public function attributeLabels()
    {
        return [
            'image1' => Yii::t('app', 'عکس 1'),
            'image2' => Yii::t('app', 'عکس 2'),
            'image3' => Yii::t('app', 'عکس 3'),
            'image4' => Yii::t('app', 'عکس 4'),
           

        ];
    }



}