<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Job;

/**
 * JobSearch represents the model behind the search form of `app\models\Job`.
 */
class JobSearch extends Job
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['pic', 'title', 'date', 'author', 'category', 'base_title', 'base_type', 'base_group', 'base_location', 'benefits', 'salary', 'information', 'requirement', 'responsibility'], 'safe'],
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
        $query = Job::find();

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
        ]);

        $query->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'base_title', $this->base_title])
            ->andFilterWhere(['like', 'base_type', $this->base_type])
            ->andFilterWhere(['like', 'base_group', $this->base_group])
            ->andFilterWhere(['like', 'base_location', $this->base_location])
            ->andFilterWhere(['like', 'benefits', $this->benefits])
            ->andFilterWhere(['like', 'salary', $this->salary])
            ->andFilterWhere(['like', 'information', $this->information])
            ->andFilterWhere(['like', 'requirement', $this->requirement])
            ->andFilterWhere(['like', 'responsibility', $this->responsibility])
            ->orderBy('id DESC');

        return $dataProvider;
    }
}
