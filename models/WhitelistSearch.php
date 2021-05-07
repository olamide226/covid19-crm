<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Whitelist;

/**
 * WhitelistSearch represents the model behind the search form of `app\models\Whitelist`.
 */
class WhitelistSearch extends Whitelist
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['firstname', 'lastname', 'middlename', 'gender', 'dob', 'phone', 'bvn', 'tradetype', 'trade_subtype_name', 'home_address', 'date_enumerated', 'current_bank', 'account_number', 'state', 'lga', 'cluster_location', 'trademoni_id', 'batch_id', 'agent_firstname', 'agent_lastname', 'agent_middlename'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Whitelist::find();

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
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'middlename', $this->middlename])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'dob', $this->dob])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'bvn', $this->bvn])
            ->andFilterWhere(['like', 'tradetype', $this->tradetype])
            ->andFilterWhere(['like', 'trade_subtype_name', $this->trade_subtype_name])
            ->andFilterWhere(['like', 'home_address', $this->home_address])
            ->andFilterWhere(['like', 'date_enumerated', $this->date_enumerated])
            ->andFilterWhere(['like', 'current_bank', $this->current_bank])
            ->andFilterWhere(['like', 'account_number', $this->account_number])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'lga', $this->lga])
            ->andFilterWhere(['like', 'cluster_location', $this->cluster_location])
            ->andFilterWhere(['like', 'trademoni_id', $this->trademoni_id])
            ->andFilterWhere(['like', 'batch_id', $this->batch_id])
            ->andFilterWhere(['like', 'agent_firstname', $this->agent_firstname])
            ->andFilterWhere(['like', 'agent_lastname', $this->agent_lastname])
            ->andFilterWhere(['like', 'agent_middlename', $this->agent_middlename]);

        return $dataProvider;
    }
}
