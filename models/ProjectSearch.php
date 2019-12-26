<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `app\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order_of', 'status'], 'integer'],
            [['location', 'square', 'price', 'client', 'plan_picture', 'poster_picture', 'some_picture'], 'safe'],
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
        $query = Project::find();

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
            'order_of' => $this->order_of,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'square', $this->square])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'client', $this->client])
            ->andFilterWhere(['like', 'plan_picture', $this->plan_picture])
            ->andFilterWhere(['like', 'poster_picture', $this->poster_picture])
            ->andFilterWhere(['like', 'some_picture', $this->some_picture]);

        return $dataProvider;
    }
}
