<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "musica".
 *
 * @property int $id
 * @property string $nome
 * @property string $duracao
 * @property string $preco
 * @property int $id_album
 *
 * @property FavMusica[] $favMusicas
 * @property LinhaCompra[] $linhaCompras
 * @property Album $album
 */
class Musica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'musica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'duracao', 'preco', 'id_album'], 'required'],
            [['preco'], 'number'],
            [['id_album'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['duracao'], 'string', 'max' => 6],
            [['id_album'], 'exist', 'skipOnError' => true, 'targetClass' => Album::className(), 'targetAttribute' => ['id_album' => 'id']],
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
            'duracao' => 'Duracao',
            'preco' => 'Preco',
            'id_album' => 'Id Album',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavMusicas()
    {
        return $this->hasMany(FavMusica::className(), ['id_musica' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaCompras()
    {
        return $this->hasMany(LinhaCompra::className(), ['id_musica' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Album::className(), ['id' => 'id_album']);
    }
}
