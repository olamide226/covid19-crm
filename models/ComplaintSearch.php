<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Complaint;

/**
 * EnquirySearch represents the model behind the search form of `app\models\Enquiry`.
 */
class ComplaintSearch extends Enquiry
{
  public $username;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',], 'integer'],
            [['customer_name', 'phone_no','username', 'entry_date','state_id', 'association', 'comment_id', 'other_comment', 'cc_agent_response', 'sub_category','user_id', 'entry_source_id', 'cc_agent_action','category_id','ticket_number'], 'safe'],
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
        $query = Complaint::find();

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
            'id' => $this->id,
            'entry_date' => $this->entry_date,
            'user_id' => $this->user_id,
            'ticket_number' => $this->ticket_number,
            'category_id' => 2,
            'entry_source_id' => $this->entry_source_id,
            'comment_id' => $this->comment_id,
            'sub_category' => $this->sub_category,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'user.username', $this->username])
            ->andFilterWhere(['like', 'association', $this->association])
            ->andFilterWhere(['like', 'other_comment', $this->other_comment])
            ->andFilterWhere(['like', 'cc_agent_response', $this->cc_agent_response])
            ->andFilterWhere(['like', 'cc_agent_action', $this->cc_agent_action])
	   ->orderBy(['entry_date' => SORT_DESC,]);

        return $dataProvider;
    }
}
