<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ConterGenero;

/**
 * ConterGeneroSearch represents the model behind the search form of `common\models\ConterGenero`.
 */
class ConterGeneroSearch extends ConterGenero
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_subgenero', 'id_genero'], 'integer'],
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
        $query = ConterGenero::find();

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
            'id_subgenero' => $this->id_subgenero,
            'id_genero' => $this->id_genero,
        ]);

        return $dataProvider;
    }
}
