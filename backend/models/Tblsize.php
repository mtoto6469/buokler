<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblsize".
 *
 * @property integer $id
 * @property integer $id_pro
 * @property string $size
 * @property integer $enabel
 * @property integer $enabel_view
 * @property integer $price
 * @property integer $price_namayande
 */
class Tblsize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tblsize';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pro', 'enabel', 'enabel_view', 'price', 'price_namayande'], 'integer'],
            [['price'], 'required'],
            [['size'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pro' => Yii::t('app', 'Id Pro'),
            'size' => Yii::t('app', 'Size'),
            'enabel' => Yii::t('app', 'Enabel'),
            'enabel_view' => Yii::t('app', 'Enabel View'),
            'price' => Yii::t('app', 'Price'),
            'price_namayande' => Yii::t('app', 'Price Namayande'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblsizeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblsizeQuery(get_called_class());
    }
}
