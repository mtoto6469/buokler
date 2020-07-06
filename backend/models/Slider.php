<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $img
 * @property string $alt
 * @property string $description
 * @property int $enabel
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img', 'alt'], 'required'],
            [['enabel'], 'integer'],
            [['img', 'description'], 'string', 'max' => 300],
            [['alt'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img' => Yii::t('app', 'Img'),
            'alt' => Yii::t('app', 'Alt'),
            'description' => Yii::t('app', 'Description'),
            'enabel' => Yii::t('app', 'Enabel'),
        ];
    }

    /**
     * @inheritdoc
     * @return SliderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SliderQuery(get_called_class());
    }
}
