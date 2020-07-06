<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[CodeOff]].
 *
 * @see CodeOff
 */
class CodeOffQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CodeOff[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CodeOff|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
