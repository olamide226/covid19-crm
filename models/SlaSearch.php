<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sla;

/**
 * SlaSearch represents the model behind the search form of `app\models\Sla`.
 */
class SlaSearch extends Sla
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'category_id', 'is_fraud', 'is_urgent', 'duration', 'level'], 'integer'],
            [['user_group'], 'safe'],
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
        $query = Sla::find();

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
            'product_id' => $this->product_id,
            'category_id' => $this->category_id,
            'is_fraud' => $this->is_fraud,
            'is_urgent' => $this->is_urgent,
            'duration' => $this->duration,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'user_group', $this->user_group]);

        return $dataProvider;
    }
}
