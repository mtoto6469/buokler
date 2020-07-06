<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "main_app".
 *
 * @property int $id
 * @property int $type
 * @property string $m_d_f
 * @property string $id_m_d_f
 * @property string $urlimg
 * @property string $img1
 * @property string $img2
 * @property string $img3
 * @property string $img4
 * @property string $id1
 * @property string $id2
 * @property string $id3
 * @property string $id4
 * @property string $headrtype
 * @property string $footertype
 * @property string $text1
 * @property string $text2
 * @property string $text3
 */
class MainApp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_app';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['position'], 'integer'],
            [['text1', 'text2', 'text3','type'], 'string'],
            [['m_d_f', 'id_m_d_f', 'urlimg', 'img1', 'img2', 'img3', 'img4', 'id1', 'id2', 'id3', 'id4', 'headrtype', 'footertype'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'm_d_f' => Yii::t('app', 'M D F'),
            'id_m_d_f' => Yii::t('app', 'Id M D F'),
            'urlimg' => Yii::t('app', 'Urlimg'),
            'img1' => Yii::t('app', 'Img1'),
            'img2' => Yii::t('app', 'Img2'),
            'img3' => Yii::t('app', 'Img3'),
            'img4' => Yii::t('app', 'Img4'),
            'id1' => Yii::t('app', 'Id1'),
            'id2' => Yii::t('app', 'Id2'),
            'id3' => Yii::t('app', 'Id3'),
            'id4' => Yii::t('app', 'Id4'),
            'headrtype' => Yii::t('app', 'Headrtype'),
            'footertype' => Yii::t('app', 'Footertype'),
            'text1' => Yii::t('app', 'Text1'),
            'text2' => Yii::t('app', 'Text2'),
            'text3' => Yii::t('app', 'Text3'),
            'position'=>Yii::t('app','position'),
        ];
    }

    /**
     * @inheritdoc
     * @return MainAppQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MainAppQuery(get_called_class());
    }
}
