<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fav_musica".
 *
 * @property int $id
 * @property int $id_utilizador
 * @property int $id_musica
 *
 * @property User $utilizador
 * @property Musica $musica
 */
class Fav_Musica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fav_musica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_utilizador', 'id_musica'], 'required'],
            [['id_utilizador', 'id_musica'], 'integer'],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_utilizador' => 'id']],
            [['id_musica'], 'exist', 'skipOnError' => true, 'targetClass' => Musica::className(), 'targetAttribute' => ['id_musica' => 'id']],
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
            'id_musica' => 'Id Musica',
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
    public function getMusica()
    {
        return $this->hasOne(Musica::className(), ['id' => 'id_musica']);
    }
}
