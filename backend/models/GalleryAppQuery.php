<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[GalleryApp]].
 *
 * @see GalleryApp
 */
class GalleryAppQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GalleryApp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GalleryApp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
