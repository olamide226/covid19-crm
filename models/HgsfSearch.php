<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hgsf;

/**
 * HgsfSearch represents the model behind the search form of `app\models\Hgsf`.
 */
class HgsfSearch extends Hgsf
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'phone_number', 'designation'], 'integer'],
            [['customer_name', 'state', 'lga', 'last_pay_date', 'amount_paid', 'amount_due', 'status'], 'safe'],
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
        $query = Hgsf::find();

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
            'phone_number' => $this->phone_number,
            'designation' => $this->designation,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'lga', $this->lga])
            ->andFilterWhere(['like', 'last_pay_date', $this->last_pay_date])
            ->andFilterWhere(['like', 'amount_paid', $this->amount_paid])
            ->andFilterWhere(['like', 'amount_due', $this->amount_due])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}