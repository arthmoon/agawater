<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Command;

/**
 * CommandSearch represents the model behind the search form about `common\models\Command`.
 */
class CommandSearch extends Command
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'device_id'], 'integer'],
            [['input', 'output', 'created_at', 'executed_at'], 'safe'],
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
        $query = Command::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'device_id' => $this->device_id,
            'created_at' => $this->created_at,
            'executed_at' => $this->executed_at,
        ]);

        $query->andFilterWhere(['like', 'input', $this->input])
            ->andFilterWhere(['like', 'output', $this->output]);

        return $dataProvider;
    }
}
