<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property string $caminhoImagem
 *
 * @property Album[] $albums
 * @property FavGenero[] $favGeneros
 * @property User[] $utilizadors
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 250],
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
            'descricao' => 'Descricao',
            'caminhoImagem' => 'Caminho Imagem',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['id_genero' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavGeneros()
    {
        return $this->hasMany(FavGenero::className(), ['id_genero' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizador()
    {
        return $this->hasMany(User::className(), ['id' => 'id_utilizador'])->viaTable('fav_genero', ['id_genero' => 'id']);
    }
}
