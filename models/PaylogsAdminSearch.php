<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Conversations;

/**
 * ConversationsSearch represents the model behind the search form of `app\models\Conversations`.
 */
class ConversationsAdminSearch extends Conversations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['id', 'phone_no', 'ticket_number','category_id', 'product_id','sla_urgency'], 'integer'],
          [['comment_id', 'other_comment','usergroup', 'user_id', 'entry_date', 'created_date', 'amount_paid',
          'entry_source_id', 'entry_category','state_id', 'agent_name', 'date_paid', 'member_id', 'fraud_status', 'cc_agent_action'], 'safe'],
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
        $query = Conversations::find();

            $query->innerJoin("user", "user_id = user.id");
            $query->innerJoin("hgsf_comment", "comment_id = hgsf_comment.id");

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
            'entry_date' => $this->entry_date,
            'phone_no' => $this->phone_no,
            'ticket_number' => $this->ticket_number,
            'state_id' => $this->state_id,
            'hgsf_conversations.sla_urgency' => $this->sla_urgency,
            'ticket_status' => 'open',
            // 'user_id' => $this->user_id,
            'hgsf_conversations.category_id' => 1,
            // 'user.username' => $this->user_id,
            'hgsf_conversations.category_id' => $this->category_id,
            'hgsf_conversations.product_id' => $this->product_id,
        ]);

        $query->andFilterWhere(['like', 'hgsf_comment.comments', $this->comment_id])
            ->andFilterWhere(['like', 'other_comment', $this->other_comment])
            // ->andFilterWhere(['like', 'comment_by', $this->comment_by])
            ->andFilterWhere(['like', 'created_date', $this->created_date])
            ->andFilterWhere(['like', 'amount_paid', $this->amount_paid])
            ->andFilterWhere(['like', 'entry_source_id', $this->entry_source_id])
            ->andFilterWhere(['like', 'entry_category', $this->entry_category])
            ->andFilterWhere(['like', 'agent_name', $this->agent_name])
            ->andFilterWhere(['like', 'date_paid', $this->date_paid])
            ->andFilterWhere(['like', 'member_id', $this->member_id])
            ->andFilterWhere(['like', 'user.username', $this->user_id])
            ->andFilterWhere(['like', 'fraud_status', $this->fraud_status])
            ->andFilterWhere(['like', 'cc_agent_action', $this->cc_agent_action]);
            // ->andFilterWhere(['like', 'ticket_status', $this->ticket_status]);

        return $dataProvider;
    }
}
