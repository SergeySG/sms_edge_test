<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SendLogAggregated;

/**
 * SendLogAggregatedSearch represents the model behind the search form of `common\models\SendLogAggregated`.
 */
class SendLogAggregatedSearch extends SendLogAggregated
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ag_log_id', 'usr_id', 'cnt_id', 'total_successful', 'total_failed'], 'integer'],
            [['date'], 'safe'],
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
        $query = SendLogAggregated::find();

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
            'ag_log_id' => $this->ag_log_id,
            'date' => $this->date,
            'usr_id' => $this->usr_id,
            'cnt_id' => $this->cnt_id,
            'total_successful' => $this->total_successful,
            'total_failed' => $this->total_failed,
        ]);

        return $dataProvider;
    }
}
