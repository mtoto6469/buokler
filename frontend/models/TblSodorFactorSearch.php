<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblSodorFactor;

/**
 * TblSodorFactorSearch represents the model behind the search form about `frontend\models\TblSodorFactor`.
 */
class TblSodorFactorSearch extends TblSodorFactor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_ref', 'price', 'id_user', 'resive', 'visibel', 'print', 'code_off', 'off', 'confirm'], 'integer'],
            [['description', 'data', 'data_ir', 'adress', 'date_deliver','atu'], 'safe'],
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
    public function search($params,$flag)
    {
        $query = TblSodorFactor::find()->where(['id_user'=>Yii::$app->user->getId()]);
        
        
        if($flag==0){
            $query=$query->where(['resive'=>1]);
            
        }elseif($flag==1){

            $query=$query->where(['resive'=>0]);


        }elseif($flag==2){
            $query=$query->where(['confirm'=>0]);

        }

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
            'id_ref' => $this->id_ref,
            'price' => $this->price,
            'id_user' => $this->id_user,
            'data' => $this->data,
            'resive' => $this->resive,
            'visibel' => $this->visibel,
            'print' => $this->print,
            'code_off' => $this->code_off,
            'off' => $this->off,
            'date_deliver' => $this->date_deliver,
            'confirm' => $this->confirm,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'data_ir', $this->data_ir])
            ->andFilterWhere(['like', 'atu', $this->atu])
            ->andFilterWhere(['like', 'adress', $this->adress]);

        return $dataProvider;
    }
}
