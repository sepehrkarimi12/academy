<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Course;

/**
 * CourseSearch represents the model behind the search form of `frontend\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tid', 'capacity', 'cost'], 'integer'],
            [['cname', 'startdate', 'enddate', 'starttime', 'endtime'], 'safe'],
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
        $query = Course::find();

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
            'tid' => $this->tid,
            'capacity' => $this->capacity,
            'cost' => $this->cost,
        ]);

        $query->andFilterWhere(['like', 'cname', $this->cname])
            ->andFilterWhere(['like', 'startdate', $this->startdate])
            ->andFilterWhere(['like', 'enddate', $this->enddate])
            ->andFilterWhere(['like', 'starttime', $this->starttime])
            ->andFilterWhere(['like', 'endtime', $this->endtime]);

        return $dataProvider;
    }
}
