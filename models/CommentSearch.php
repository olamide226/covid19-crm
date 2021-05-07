<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comment;

/**
 * CommentSearch represents the model behind the search form of `app\models\Comment`.
 */
class CommentSearch extends Comment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'status'], 'integer'],
            [['comments','category_id','sla_urgency'], 'safe'],
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
        $query = Comment::find();

        // add conditions that should always apply here
        $query->innerJoin("hgsf_category b", "category_id = b.id");
        $query->innerJoin("hgsf_product c", "product_id = c.id");

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
            'b.id' => $this->category_id,
            'c.id' => $this->product_id,
            'status' => $this->status,
            'sla_urgency' => $this->sla_urgency,
        ]);

        $query->andFilterWhere(['like', 'comments', $this->comments]);
        // ->andFilterWhere(['like', 'b.id', $this->category_id]);

        return $dataProvider;
    }
}
