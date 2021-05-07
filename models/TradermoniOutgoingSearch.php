<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TradermoniOutgoing;

/**
 * TradermoniOutgoingSearch represents the model behind the search form of `app\models\TradermoniOutgoing`.
 */
class TradermoniOutgoingSearch extends TradermoniOutgoing
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'comment_id', 'user_id'], 'safe'],
            [['customer_name', 'phone_no', 'other_comment', 'fraud_status', 'cc_agent_action', 'agent_phone_no', 'agent_name', 'payment_medium', 'entry_date', 'created_date', 'updated_date'], 'safe'],
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
        $query = TradermoniOutgoing::find();

        // add conditions that should always apply here
        $query->innerJoin("user", "user_id = user.id");

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
            // 'id' => $this->id,
            // 'ticket_number' => $this->ticket_number,
            'category_id' => 6,
            // 'comment_id' => $this->comment_id,
            // 'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'user.username', $this->user_id])
            ->andFilterWhere(['like', 'other_comment', $this->other_comment]);

        return $dataProvider;
    }
}
