<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblgallery]].
 *
 * @see Tblgallery
 */
class TblgalleryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tblgallery[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tblgallery|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
