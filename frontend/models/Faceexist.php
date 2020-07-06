<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "faceexist".
 *
 * @property int $id
 * @property int $id_pro
 * @property int $exist
 */
class Faceexist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faceexist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pro', 'exist'], 'integer'],
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
            'exist' => Yii::t('app', 'Exist'),
        ];
    }

    /**
     * @inheritdoc
     * @return FaceexistQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FaceexistQuery(get_called_class());
    }
}
