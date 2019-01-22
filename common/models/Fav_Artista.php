<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "favartista".
 *
 * @property int $id
 * @property int $id_utilizador
 * @property int $id_artista
 *
 * @property User $utilizador
 * @property Artista $artista
 */
class Fav_Artista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fav_artista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_utilizador', 'id_artista'], 'required'],
            [['id_utilizador', 'id_artista'], 'integer'],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_utilizador' => 'id']],
            [['id_artista'], 'exist', 'skipOnError' => true, 'targetClass' => Artista::className(), 'targetAttribute' => ['id_artista' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_utilizador' => 'Id Utilizador',
            'id_artista' => 'Id Artista',
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
    public function getArtista()
    {
        return $this->hasOne(Artista::className(), ['id' => 'id_artista']);
    }
}
