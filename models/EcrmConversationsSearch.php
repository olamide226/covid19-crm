<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EcrmConversations;

/**
 * EcrmConversationsSearch represents the model behind the search form of `app\models\EcrmConversations`.
 */
class EcrmConversationsSearch extends EcrmConversations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ticket_number', 'user_id', 'ecrm_category_id'], 'integer'],
            [['ticket_status', 'customer_name', 'phone_no', 'member_id', 'entry_category', 'association', 'amount_paid', 'date_paid', 'comment', 'other_comment', 'cc_agent_response', 'fraud_status', 'cc_agent_action', 'entry_source', 'agent_phone_no', 'agent_name', 'payment_medium', 'entry_date', 'created_date'], 'safe'],
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
        $query = EcrmConversations::find();

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
            'ticket_number' => $this->ticket_number,
            'user_id' => $this->user_id,
            'ecrm_category_id' => $this->ecrm_category_id,
            'entry_date' => $this->entry_date,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'ticket_status', $this->ticket_status])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'member_id', $this->member_id])
            ->andFilterWhere(['like', 'entry_category', $this->entry_category])
            ->andFilterWhere(['like', 'association', $this->association])
            ->andFilterWhere(['like', 'amount_paid', $this->amount_paid])
            ->andFilterWhere(['like', 'date_paid', $this->date_paid])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'other_comment', $this->other_comment])
            ->andFilterWhere(['like', 'cc_agent_response', $this->cc_agent_response])
            ->andFilterWhere(['like', 'fraud_status', $this->fraud_status])
            ->andFilterWhere(['like', 'cc_agent_action', $this->cc_agent_action])
            ->andFilterWhere(['like', 'entry_source', $this->entry_source])
            ->andFilterWhere(['like', 'agent_phone_no', $this->agent_phone_no])
            ->andFilterWhere(['like', 'agent_name', $this->agent_name])
            ->andFilterWhere(['like', 'payment_medium', $this->payment_medium]);

        return $dataProvider;
    }
}
