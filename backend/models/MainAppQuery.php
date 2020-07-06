<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MainApp]].
 *
 * @see MainApp
 */
class MainAppQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MainApp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MainApp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
