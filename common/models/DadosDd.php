<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dados_dd".
 *
 * @property int $id
 * @property string $name
 * @property int $id_chave
 */
class DadosDd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dados_dd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_chave'], 'required'],
            [['id_chave'], 'integer'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_chave' => 'Id Chave',
        ];
    }
}
