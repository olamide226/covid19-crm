<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wlist;

/**
 * WlistSearch represents the model behind the search form of `app\models\Wlist`.
 */
class WlistSearch extends Wlist
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id', 'batch_id', 'disbursement', 'is_callable', 'call_not_reachable', 'is_applied', 'wallet_map_id', 'senatorial_id', 'geopolitical_id'], 'integer'],
            // [['enumerator', 'agentname', 'rejection_reason', 'firstname', 'lastname', 'middlename', 'gender', 'dob', 'phone', 'bvn', 'tradetype', 'tradesubtype', 'state', 'lga', 'home_address', 'current_bank', 'account_number', 'gps', 'cluster_location', 'picture', 'facial_picture', 'certificate_picture', 'current_status', 'date_submission', 'date_disbursement', 'createdon', 'date_called', 'call_description', 'date_applied', 'is_disbursed', 'trademoni_id', 'smile_reference', 'date_enumerated', 'date_batch_verify', 'wallet_name', 'agent_id', 'is_cashedout', 'date_cashout', 'region'], 'safe'],
            // [['amount_due', 'amount_repaid', 'amount_default'], 'number'],
            ['phone','safe']
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
        $query = Wlist::find();

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
         $query->andFilterWhere(['phone' => $this->phone]);
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'batch_id' => $this->batch_id,
        //     'dob' => $this->dob,
        //     'date_submission' => $this->date_submission,
        //     'disbursement' => $this->disbursement,
        //     'date_disbursement' => $this->date_disbursement,
        //     'amount_due' => $this->amount_due,
        //     'amount_repaid' => $this->amount_repaid,
        //     'amount_default' => $this->amount_default,
        //     'createdon' => $this->createdon,
        //     'is_callable' => $this->is_callable,
        //     'date_called' => $this->date_called,
        //     'call_not_reachable' => $this->call_not_reachable,
        //     'is_applied' => $this->is_applied,
        //     'date_applied' => $this->date_applied,
        //     'date_enumerated' => $this->date_enumerated,
        //     'date_batch_verify' => $this->date_batch_verify,
        //     'wallet_map_id' => $this->wallet_map_id,
        //     'senatorial_id' => $this->senatorial_id,
        //     'geopolitical_id' => $this->geopolitical_id,
        //     'date_cashout' => $this->date_cashout,
        // ]);

        // $query->andFilterWhere(['like', 'phone', $this->phone]);
            // ->andFilterWhere(['like', 'agentname', $this->agentname])
            // ->andFilterWhere(['like', 'rejection_reason', $this->rejection_reason])
            // ->andFilterWhere(['like', 'firstname', $this->firstname])
            // ->andFilterWhere(['like', 'lastname', $this->lastname])
            // ->andFilterWhere(['like', 'middlename', $this->middlename])
            // ->andFilterWhere(['like', 'gender', $this->gender])
            // ->andFilterWhere(['like', 'phone', phone])
            // ->andFilterWhere(['like', 'bvn', $this->bvn])
            // ->andFilterWhere(['like', 'tradetype', $this->tradetype])
            // ->andFilterWhere(['like', 'tradesubtype', $this->tradesubtype])
            // ->andFilterWhere(['like', 'state', $this->state])
            // ->andFilterWhere(['like', 'lga', $this->lga])
            // ->andFilterWhere(['like', 'home_address', $this->home_address])
            // ->andFilterWhere(['like', 'current_bank', $this->current_bank])
            // ->andFilterWhere(['like', 'account_number', $this->account_number])
            // ->andFilterWhere(['like', 'gps', $this->gps])
            // ->andFilterWhere(['like', 'cluster_location', $this->cluster_location])
            // ->andFilterWhere(['like', 'picture', $this->picture])
            // ->andFilterWhere(['like', 'facial_picture', $this->facial_picture])
            // ->andFilterWhere(['like', 'certificate_picture', $this->certificate_picture])
            // ->andFilterWhere(['like', 'current_status', $this->current_status])
            // ->andFilterWhere(['like', 'call_description', $this->call_description])
            // ->andFilterWhere(['like', 'is_disbursed', $this->is_disbursed])
            // ->andFilterWhere(['like', 'trademoni_id', $this->trademoni_id])
            // ->andFilterWhere(['like', 'smile_reference', $this->smile_reference])
            // ->andFilterWhere(['like', 'wallet_name', $this->wallet_name])
            // ->andFilterWhere(['like', 'agent_id', $this->agent_id])
            // ->andFilterWhere(['like', 'is_cashedout', $this->is_cashedout])
            // ->andFilterWhere(['like', 'region', $this->region]);

        return $dataProvider;
    }
}
