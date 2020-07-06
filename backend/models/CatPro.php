<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cat_pro".
 *
 * @property integer $id
 * @property integer $id_cat
 * @property integer $id_pro
 */
class CatPro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $name1;
    public $name2;
    public $name3;
    public $name4;
    public static function tableName()
    {
        return 'cat_pro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cat','id_pro'], 'required'],
            [['name1','name2','name3','name4'],'integer'],
            ['id_pro','string'],
            ['id_cat','safe'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_cat' => Yii::t('app', 'دسته'),
            'id_pro' => Yii::t('app', 'محصول'),
        ];
    }

    /**
     * @inheritdoc
     * @return CatProQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CatProQuery(get_called_class());
    }


    public function getIdCat()
    {

        return $this->hasOne(TblcategoryProduct::className(), ['id' => 'id_cat']);
        
    }
}
