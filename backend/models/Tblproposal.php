<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblproposal".
 *
 * @property integer $id
 * @property integer $id_pro
 * @property integer $enabel_view
 */
class Tblproposal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'tblproposal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pro'], 'required'],
            [['id_pro', 'enabel_view','size','color'], 'integer'],
            
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
            'enabel_view' => Yii::t('app', 'Enabel View'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblpostproductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblpostproductQuery(get_called_class());
    }
}
