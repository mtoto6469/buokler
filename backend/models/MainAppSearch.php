<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MainApp;

/**
 * MainAppSearch represents the model behind the search form of `backend\models\MainApp`.
 */
class MainAppSearch extends MainApp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'integer'],
            [['m_d_f', 'id_m_d_f', 'urlimg', 'img1', 'img2', 'img3', 'img4', 'id1', 'id2', 'id3', 'id4', 'headrtype', 'footertype', 'text1', 'text2', 'text3'], 'safe'],
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
        $query = MainApp::find();

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
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'm_d_f', $this->m_d_f])
            ->andFilterWhere(['like', 'id_m_d_f', $this->id_m_d_f])
            ->andFilterWhere(['like', 'urlimg', $this->urlimg])
            ->andFilterWhere(['like', 'img1', $this->img1])
            ->andFilterWhere(['like', 'img2', $this->img2])
            ->andFilterWhere(['like', 'img3', $this->img3])
            ->andFilterWhere(['like', 'img4', $this->img4])
            ->andFilterWhere(['like', 'id1', $this->id1])
            ->andFilterWhere(['like', 'id2', $this->id2])
            ->andFilterWhere(['like', 'id3', $this->id3])
            ->andFilterWhere(['like', 'id4', $this->id4])
            ->andFilterWhere(['like', 'headrtype', $this->headrtype])
            ->andFilterWhere(['like', 'footertype', $this->footertype])
            ->andFilterWhere(['like', 'text1', $this->text1])
            ->andFilterWhere(['like', 'text2', $this->text2])
            ->andFilterWhere(['like', 'text3', $this->text3]);

        return $dataProvider;
    }
}
