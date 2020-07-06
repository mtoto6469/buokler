<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[CatPro]].
 *
 * @see CatPro
 */
class CatProQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CatPro[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CatPro|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
