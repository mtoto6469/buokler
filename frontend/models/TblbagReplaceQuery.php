<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[TblbagReplace]].
 *
 * @see TblbagReplace
 */
class TblbagReplaceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TblbagReplace[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblbagReplace|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
