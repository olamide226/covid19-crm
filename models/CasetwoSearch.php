<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Casetwo;

/**
 * CasetwoSearch represents the model behind the search form of `app\models\Casetwo`.
 */
class CasetwoSearch extends Casetwo
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['customer_name', 'phone_no','ticket_status','ticket_number', 'created_date', 'association', 'comment_id', 'state_id', 'other_comment', 'cc_agent_response', 'cc_agent_action', 'user_id','username', 'entry_source_id', 'category_id','product_id', 'agent_phone_no', 'agent_name'], 'safe'],
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
        $query = Casetwo::find();

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
            'entry_date' => $this->entry_date,
            'user_id' => $this->user_id,
            'state_id' => $this->state_id,
            'ticket_number' => $this->ticket_number,
            // 'ecrm_category_id' => 3 ,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
              ->andFilterWhere(['like', 'user.username', $this->username])
            ->andFilterWhere(['like', 'association', $this->association])
            ->andFilterWhere(['like', 'comment_id', $this->comment_id])
            ->andFilterWhere(['like', 'other_comment', $this->other_comment])
            ->andFilterWhere(['like', 'cc_agent_response', $this->cc_agent_response])
            ->andFilterWhere(['like', 'cc_agent_action', $this->cc_agent_action])
            // ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['in', 'category_id', [3,2,7]])
            ->andFilterWhere(['like', 'entry_source_id', $this->entry_source_id])
            ->andFilterWhere(['like', 'agent_phone_no', $this->agent_phone_no])
            ->andFilterWhere(['like', 'agent_name', $this->agent_name])
            ->andFilterWhere(['like', 'ticket_status', $this->ticket_status]);

        return $dataProvider;
    }
}
