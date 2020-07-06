<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "code_off".
 *
 * @property int $id
 * @property string $code
 * @property string $price
 */
class CodeOff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'code_off';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code','enabel_view'],'integer'],
            [[ 'price'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * @inheritdoc
     * @return CodeOffQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CodeOffQuery(get_called_class());
    }
}
