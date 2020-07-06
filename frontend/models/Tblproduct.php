<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblproduct".
 *
 * @property integer $id
 * @property integer $id_category
 * @property integer $id_type
 * @property integer $id_brand
 * @property integer $price
 * @property string $img
 * @property string $description
 * @property integer $enabel
 * @property integer $enabel_view
 * @property integer $price_namayande
 * @property integer $time
 *  @property string imags_id
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
            [['id_category', 'img', 'time', 'name','exist', 'time_ir','tag_meta','key_meta','title_meta','text_meta','price'], 'required'],
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
            'id_category' => Yii::t('app', 'Id Category'),
            'id_type' => Yii::t('app', 'Id Type'),
            'id_brand' => Yii::t('app', 'Id Brand'),
            'price' => Yii::t('app', 'Price'),
            'img' => Yii::t('app', 'Img'),
            'description' => Yii::t('app', 'Description'),
            'enabel' => Yii::t('app', 'Enabel'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
            'price_namayande' => Yii::t('app', 'Price Namayande'),
            'time' => Yii::t('app', 'Time'),

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
