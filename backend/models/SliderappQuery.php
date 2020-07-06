<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Sliderapp]].
 *
 * @see Sliderapp
 */
class SliderappQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Sliderapp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Sliderapp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
