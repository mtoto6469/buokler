<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gallery_app".
 *
 * @property int $id
 * @property string $img
 * @property string $alt
 */
class GalleryApp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_app';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img', 'alt'], 'required'],
            [['img', 'alt'], 'string', 'max' => 300],
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
        ];
    }

    /**
     * @inheritdoc
     * @return GalleryAppQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GalleryAppQuery(get_called_class());
    }
}
