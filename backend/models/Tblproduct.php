<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblproduct".
 *
 * @property integer $id
 * @property integer $id_category
 * @property integer $id_type
 * @property integer $id_brand
 * @property string $img
 * @property string $description
 * @property integer $enabel
 * @property integer $enabel_view
 * @property string $time
 * @property string $name
 * @property string $time_ir
 * @property int exist
 * @property string tag_meta
 * @property string key_meta
 * @property string title_meta
 * @property string text_meta
 * @property string imags_id
 */
class Tblproduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
   
    public static function tableName()
    {
        return 'tblproduct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'img', 'name','exist','tag_meta','key_meta','title_meta','text_meta','price'], 'required'],
            [['id_category', 'id_type', 'id_brand', 'enabel', 'enabel_view','pak','exist','prposal','takhfif'], 'integer'],
            [['description','imags_id'], 'string'],
            [['time'], 'safe'],
            [['img', 'name', 'time_ir','tag_meta','key_meta','title_meta','text_meta','price'], 'string', 'max' => 300],
            
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_category' => Yii::t('app', 'نام دسته'),
            'id_type' => Yii::t('app', 'نام جنس'),
            'id_brand' => Yii::t('app', 'نام برند'),
            'img' => Yii::t('app', 'عکس محصول'),
            'description' => Yii::t('app', 'توضیحات محصول'),
            'enabel' => Yii::t('app', 'قابل نمایش'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
            'time' => Yii::t('app', 'زمان ارسال'),
            'name' => Yii::t('app', 'نام محصول'),
            'time_ir' => Yii::t('app', 'زمان ایران'),
            'price'=>'قیمت محصول',
            'exist'=>Yii::t('app','موجودی انبار'),
            'tag_meta'=>Yii::t('app','تگ توضیحات محصول'),
            'key_meta'=>Yii::t('app','کلمات کلیدی'),
            'title_meta'=>Yii::t('app','عنوان توضیحات'),
            'text_meta'=>Yii::t('app','توضیحات'),
            'imags_id'=>Yii::t('app','عکس های بیشتر'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblproductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblproductQuery(get_called_class());
    }
}
