<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Comment;

/**
 * CommentSearch represents the model behind the search form of `common\models\Comment`.
 */
class CommentSearch extends Comment
{
    /**
     * {@inheritdoc}
     */

    public $nome_utilizador;
    public $nome_album;


    public function rules()
    {
        return [
            [['id', 'id_utilizador', 'id_album'], 'integer'],
            [['conteudo', 'data_criacao'], 'safe'],
            [['nome_utilizador', 'nome_album'], 'safe'],
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
        $query = Comment::find()->joinWith(['utilizador', 'album']);

        //$query->joinWith(['user', 'album']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /**$dataProvider->sort->attributes['nome_utilizador'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['user.nome' => SORT_ASC],
            'desc' => ['user.nome' => SORT_DESC],
        ];
        // Lets do the same with country now
        $dataProvider->sort->attributes['nome_album'] = [
            'asc' => ['album.nome' => SORT_ASC],
            'desc' => ['album.nome' => SORT_DESC],
        ];*/
        // No search? Then return data Provider
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'data_criacao' => $this->data_criacao,
            'id_utilizador' => $this->id_utilizador,
            'id_album' => $this->id_album,
        ]);

        $query->andFilterWhere(['like', 'conteudo', $this->conteudo]);

        /*$query->andFilterWhere(['like', 'user.nome', $this->nome_utilizador]);
        $query->andFilterWhere(['like', 'album.nome', $this->nome_album]);*/

        return $dataProvider;
    }


}
