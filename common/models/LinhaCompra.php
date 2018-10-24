<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linha_compra".
 *
 * @property int $id
 * @property int $id_compra
 * @property int $id_musica
 *
 * @property Compra $compra
 * @property Musica $musica
 */
class LinhaCompra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linha_compra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_compra', 'id_musica'], 'required'],
            [['id_compra', 'id_musica'], 'integer'],
            [['id_compra'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::className(), 'targetAttribute' => ['id_compra' => 'id']],
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
            'id_compra' => 'Id Compra',
            'id_musica' => 'Id Musica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompra()
    {
        return $this->hasOne(Compra::className(), ['id' => 'id_compra']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusica()
    {
        return $this->hasOne(Musica::className(), ['id' => 'id_musica']);
    }
}
