<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sliderapp".
 *
 * @property int $id
 * @property int $id_main
 * @property string $img
 * @property string $text
 * @property string $id_m_d_f
 * @property int $id_cat
 */
class Sliderapp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sliderapp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_main', 'img','text'], 'required'],
            [['id_main', 'id_cat'], 'integer'],
            [['text'], 'string'],
            [['img', 'id_m_d_f'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_main' => Yii::t('app', 'Id Main'),
            'img' => Yii::t('app', 'Img'),
            'text' => Yii::t('app', 'Text'),
            'id_m_d_f' => Yii::t('app', 'Id M D F'),
            'id_cat' => Yii::t('app', 'Id Cat'),
        ];
    }

    /**
     * @inheritdoc
     * @return SliderappQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SliderappQuery(get_called_class());
    }
}
