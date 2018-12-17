<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "musica".
 *
 * @property int $id
 * @property string $nome
 * @property string $duracao
 * @property double $preco
 * @property int $id_album
 * @property int $posicao
 * @property string $caminhoMP3
 *
 * @property FavMusica[] $favMusicas
 * @property User[] $utilizadors
 * @property LinhaCompra[] $linhaCompras
 * @property Compra[] $compras
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
            [['nome', 'duracao', 'preco', 'id_album', 'posicao'], 'required'],
            [['preco'], 'number'],
            [['id_album', 'posicao'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['duracao'], 'string', 'max' => 6],
            [['caminhoMP3'], 'string', 'max' => 300],
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
            'posicao' => 'Posicao',
            'caminhoMP3' => 'Caminho Mp3',
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
    public function getUtilizadors()
    {
        return $this->hasMany(User::className(), ['id' => 'id_utilizador'])->viaTable('fav_musica', ['id_musica' => 'id']);
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
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['id' => 'id_compra'])->viaTable('linha_compra', ['id_musica' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Album::className(), ['id' => 'id_album']);
    }
}
