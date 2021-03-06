<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblprofile".
 *
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property integer $user_id
 * @property string $role
 * @property integer $tel
 * @property string $address
 * @property integer $enable_view
 * @property integer $Credit
 * @property string $date_Credit
 */
class Tblprofile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $username;
    public $password;
    public static function tableName()
    {
        return 'tblprofile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'user_id', 'tel'], 'required'],
            [['user_id', 'tel', 'enable_view', 'credit'], 'integer'],
            [['address'], 'string'],
            [['date_credit'], 'safe'],
            [['name', 'lastname', 'role'], 'string', 'max' => 300],
            ['username','string'],
            ['password', 'string', 'min' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'نام'),
            'lastname' => Yii::t('app', 'نام خانوادگی'),
            'user_id' => Yii::t('app', 'User ID'),
            'role' => Yii::t('app', 'نقش'),
            'tel' => Yii::t('app', 'شماره تماس'),
            'address' => Yii::t('app', 'آدرس'),
            'enable_view' => Yii::t('app', 'قابل نمایش'),
            'credit' => Yii::t('app', 'اعتبار'),
            'date_credit' => Yii::t('app', 'تاریخ شروع اعتبار'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblprofileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblprofileQuery(get_called_class());
    }
}
