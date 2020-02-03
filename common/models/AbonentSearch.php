<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Abonent;

/**
 * AbonentSearch represents the model behind the search form about `common\models\Abonent`.
 */
class AbonentSearch extends Abonent
{
    public $fio;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'limit', 'days'], 'integer'],
            [['first_name', 'last_name', 'father_name', 'phone', 'fio', 'uid', 'payment_dt'], 'safe'],
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
        $query = Abonent::find();

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
            'id'     => $this->id,
            'status' => $this->status,
            'limit'  => $this->limit,
        ]);

        $query->andFilterWhere(['OR',
            ['LIKE', 'first_name',  $this->fio],
            ['LIKE', 'last_name',   $this->fio],
            ['LIKE', 'father_name', $this->fio],
        ]);

        $query->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
