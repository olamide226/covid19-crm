<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Boi;

/**
 * BoiSearch represents the model behind the search form of `app\models\Boi`.
 */
class BoiSearch extends Boi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'phone_number', 'tenure', 'bvn', 'nuban'], 'integer'],
            [['customer_name', 'association', 'member_id', 'state', 'amount', 'mou_status', 'first_due_date', 'amount_due', 'amount_re_paid', 'amount_in_default', 'sub_aggregator', 'aggregator', 'beneficiary_institution', 'date_requested', 'status', 'reason_for_rejection', 'last_change_date', 'pending_icu_confirmation_date', 'pending_customer_confirmation_date', 'pending_f_ire_confirmation_date', 'pending_approval_date', 'due_for_disbursement_date', 'loan_disbursed_successfully_date', 'offer_declined_date', 'risk_request_denied_date', 'request_denied_date', 'not_qualified_date'], 'safe'],
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
        $query = Boi::find();

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
            'phone_number' => $this->phone_number,
            'tenure' => $this->tenure,
            'bvn' => $this->bvn,
            'first_due_date' => $this->first_due_date,
            'nuban' => $this->nuban,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'association', $this->association])
            ->andFilterWhere(['like', 'member_id', $this->member_id])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'mou_status', $this->mou_status])
            ->andFilterWhere(['like', 'amount_due', $this->amount_due])
            ->andFilterWhere(['like', 'amount_re_paid', $this->amount_re_paid])
            ->andFilterWhere(['like', 'amount_in_default', $this->amount_in_default])
            ->andFilterWhere(['like', 'sub_aggregator', $this->sub_aggregator])
            ->andFilterWhere(['like', 'aggregator', $this->aggregator])
            ->andFilterWhere(['like', 'beneficiary_institution', $this->beneficiary_institution])
            ->andFilterWhere(['like', 'date_requested', $this->date_requested])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'reason_for_rejection', $this->reason_for_rejection])
            ->andFilterWhere(['like', 'last_change_date', $this->last_change_date])
            ->andFilterWhere(['like', 'pending_icu_confirmation_date', $this->pending_icu_confirmation_date])
            ->andFilterWhere(['like', 'pending_customer_confirmation_date', $this->pending_customer_confirmation_date])
            ->andFilterWhere(['like', 'pending_f_ire_confirmation_date', $this->pending_f_ire_confirmation_date])
            ->andFilterWhere(['like', 'pending_approval_date', $this->pending_approval_date])
            ->andFilterWhere(['like', 'due_for_disbursement_date', $this->due_for_disbursement_date])
            ->andFilterWhere(['like', 'loan_disbursed_successfully_date', $this->loan_disbursed_successfully_date])
            ->andFilterWhere(['like', 'offer_declined_date', $this->offer_declined_date])
            ->andFilterWhere(['like', 'risk_request_denied_date', $this->risk_request_denied_date])
            ->andFilterWhere(['like', 'request_denied_date', $this->request_denied_date])
            ->andFilterWhere(['like', 'not_qualified_date', $this->not_qualified_date]);

        return $dataProvider;
    }
}
