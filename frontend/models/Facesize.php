<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "facesize".
 *
 * @property integer $id
 * @property integer $size
 */
class Facesize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facesize';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size'], 'required'],
            [['id_size'], 'integer'],
            ['size','string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'size' => Yii::t('app', 'Size'),
        ];
    }
}
