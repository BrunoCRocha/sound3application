<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "artista".
 *
 * @property int $id
 * @property string $nome
 * @property string $nacionalidade
 * @property string $caminhoImagem
 * @property string $ano
 *
 * @property Album[] $albums
 * @property FavArtista[] $favArtistas
 * @property User[] $utilizadors
 */
class Artista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['ano'], 'safe'],
            [['nome'], 'string', 'max' => 50],
            [['nacionalidade'], 'string', 'max' => 25],
            [['caminhoImagem'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'nacionalidade' => 'Nacionalidade',
            'ano' => 'Ano',
            'caminhoImagem' => 'Caminho Imagem',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['id_artista' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavArtistas()
    {
        return $this->hasMany(FavArtista::className(), ['id_artista' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizadors()
    {
        return $this->hasMany(User::className(), ['id' => 'id_utilizador'])->viaTable('fav_artista', ['id_artista' => 'id']);
    }
}
