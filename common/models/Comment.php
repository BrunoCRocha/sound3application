<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $conteudo
 * @property string $data_criacao
 * @property int $id_utilizador
 * @property int $id_album
 *
 * @property User $utilizador
 * @property Album $album
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conteudo', 'data_criacao', 'id_utilizador', 'id_album'], 'required'],
            [['data_criacao'], 'safe'],
            [['id_utilizador', 'id_album'], 'integer'],
            [['conteudo'], 'string', 'max' => 250],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_utilizador' => 'id']],
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
            'conteudo' => 'Conteudo',
            'data_criacao' => 'Data Criacao',
            'id_utilizador' => 'Id Utilizador',
            'id_album' => 'Id Album',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizador()
    {
        return $this->hasOne(User::className(), ['id' => 'id_utilizador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Album::className(), ['id' => 'id_album']);
    }
}
