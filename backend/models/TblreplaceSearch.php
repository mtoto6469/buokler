<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblreplace;

/**
 * TblreplaceSearch represents the model behind the search form about `backend\models\Tblreplace`.
 */
class TblreplaceSearch extends Tblreplace
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_pro', 'id_fac', 'category', 'confirm', 'post_price', 'enabel_view', 'id_bag'], 'integer'],
            [['text_user', 'text_admin'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tblreplace::find()->where(['enabel_view'=>1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_user' => $this->id_user,
            'id_pro' => $this->id_pro,
            'id_fac' => $this->id_fac,
            'category' => $this->category,
            'confirm' => $this->confirm,
            'post_price' => $this->post_price,
            'enabel_view' => $this->enabel_view,
            'id_bag' => $this->id_bag,
        ]);

        $query->andFilterWhere(['like', 'text_user', $this->text_user])
            ->andFilterWhere(['like', 'text_admin', $this->text_admin]);

        return $dataProvider;
    }
}
