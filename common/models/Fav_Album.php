<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fav_album".
 *
 * @property int $id
 * @property int $id_utilizador
 * @property int $id_album
 *
 * @property User $utilizador
 * @property Album $album
 */
class Fav_Album extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fav_album';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_utilizador', 'id_album'], 'required'],
            [['id_utilizador', 'id_album'], 'integer'],
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
