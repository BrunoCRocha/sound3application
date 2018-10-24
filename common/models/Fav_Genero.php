<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fav_genero".
 *
 * @property int $id
 * @property int $id_utilizador
 * @property int $id_genero
 * @property int $id_subgenero
 *
 * @property User $utilizador
 * @property Genero $genero
 * @property ConterGenero $subgenero
 */
class Fav_Genero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fav_genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_utilizador', 'id_genero'], 'required'],
            [['id_utilizador', 'id_genero', 'id_subgenero'], 'integer'],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_utilizador' => 'id']],
            [['id_genero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['id_genero' => 'id']],
            [['id_subgenero'], 'exist', 'skipOnError' => true, 'targetClass' => ConterGenero::className(), 'targetAttribute' => ['id_subgenero' => 'id_subgenero']],
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
            'id_genero' => 'Id Genero',
            'id_subgenero' => 'Id Subgenero',
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
    public function getGenero()
    {
        return $this->hasOne(Genero::className(), ['id' => 'id_genero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubgenero()
    {
        return $this->hasOne(ConterGenero::className(), ['id_subgenero' => 'id_subgenero']);
    }
}
