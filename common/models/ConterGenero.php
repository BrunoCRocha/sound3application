<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "conter_genero".
 *
 * @property int $id_subgenero
 * @property int $id_genero
 *
 * @property Album[] $albums
 * @property Genero $genero
 * @property FavGenero[] $favGeneros
 */
class ConterGenero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conter_genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_genero'], 'required'],
            [['id_genero'], 'integer'],
            [['id_genero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['id_genero' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_subgenero' => 'Id Subgenero',
            'id_genero' => 'Id Genero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['id_subgenero' => 'id_subgenero']);
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
    public function getFavGeneros()
    {
        return $this->hasMany(FavGenero::className(), ['id_subgenero' => 'id_subgenero']);
    }
}
