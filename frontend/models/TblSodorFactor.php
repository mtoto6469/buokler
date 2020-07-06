<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_sodor_factor".
 *
 * @property int $id
 * @property int $id_ref
 * @property int $price
 * @property string $description
 * @property int $id_user
 * @property string $data
 * @property string $data_ir
 * @property int $resive
 * @property int $visibel
 * @property string $adress
 * @property int $print
 * @property int $code_off
 * @property string $date_deliver
 * @property int $confirm
 * @property int $id_type_post
 * @property int $user_tel
 * @property string $user_name
 * @property string $atu
 */
class TblSodorFactor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_sodor_factor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ref', 'price', 'id_user', 'resive', 'visibel', 'print', 'code_off', 'confirm', 'id_type_post', 'user_tel'], 'integer'],
            [['id_user', 'id_type_post', 'user_tel', 'user_name','adress'], 'required'],
            [['data', 'date_deliver'], 'safe'],
            [['adress','atu'], 'string'],
            [['description'], 'string', 'max' => 500],
            [['data_ir', 'user_name'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_ref' => Yii::t('app', 'Id Ref'),
            'price' => Yii::t('app', 'Price'),
            'description' => Yii::t('app', 'Description'),
            'id_user' => Yii::t('app', 'Id User'),
            'data' => Yii::t('app', 'Data'),
            'data_ir' => Yii::t('app', 'Data Ir'),
            'resive' => Yii::t('app', 'Resive'),
            'visibel' => Yii::t('app', 'Visibel'),
            'adress' => Yii::t('app', 'فیلد آدرس'),
            'print' => Yii::t('app', 'Print'),
            'code_off' => Yii::t('app', 'Code Off'),
            'date_deliver' => Yii::t('app', 'Date Deliver'),
            'confirm' => Yii::t('app', 'Confirm'),
            'id_type_post' => Yii::t('app', 'نوع ارسال'),
            'user_tel' => Yii::t('app', 'شماره تماس'),
            'user_name' => Yii::t('app', 'نام کاربری'),
            // 'atu' => Yii::t('app', 'Atu),
        ];
    }

    /**
     * @inheritdoc
     * @return TblSodorFactorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblSodorFactorQuery(get_called_class());
    }
}
