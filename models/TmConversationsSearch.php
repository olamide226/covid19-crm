<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TmConversations;

/**
 * TmConversationsSearch represents the model behind the search form of `app\models\TmConversations`.
 */
class TmConversationsSearch extends TmConversations
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'phone'], 'integer'],
            [['name', 'address', 'cluster_location', 'gender', 'state', 'region'], 'safe'],
            [['amount_default', 'amount_paid', 'amount_due'], 'number'],
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
        $query = TmConversations::find();

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
            'phone' => $this->phone,
            'amount_default' => $this->amount_default,
            'amount_paid' => $this->amount_paid,
            'amount_due' => $this->amount_due,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'cluster_location', $this->cluster_location])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'region', $this->region]);

        return $dataProvider;
    }
}
