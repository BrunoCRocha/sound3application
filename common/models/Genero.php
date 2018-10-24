<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 *
 * @property Album[] $albums
 * @property ConterGenero[] $conterGeneros
 * @property FavGenero[] $favGeneros
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
    public function getConterGeneros()
    {
        return $this->hasMany(ConterGenero::className(), ['id_genero' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavGeneros()
    {
        return $this->hasMany(FavGenero::className(), ['id_genero' => 'id']);
    }
}
