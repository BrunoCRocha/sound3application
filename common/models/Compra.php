<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "compra".
 *
 * @property int $id
 * @property string $data_compra
 * @property string $valor_total
 * @property int $id_utilizador
 *
 * @property User $utilizador
 * @property LinhaCompra[] $linhaCompras
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_compra', 'id_utilizador'], 'required'],
            [['data_compra'], 'safe'],
            [['valor_total'], 'number'],
            [['id_utilizador'], 'integer'],
            [['id_utilizador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_utilizador' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_compra' => 'Data Compra',
            'valor_total' => 'Valor Total',
            'id_utilizador' => 'Id Utilizador',
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
    public function getLinhaCompras()
    {
        return $this->hasMany(LinhaCompra::className(), ['id_compra' => 'id']);
    }

    public function getValorTotal(){
        $lcArray = $this->linhaCompras;
        $vt = 0;

        if(count($lcArray)>0){
            foreach ($lcArray as $lc){
                    $musica = Musica::findOne($lc->id_musica);
                    $vt = $vt + $musica->preco;


            }

            $this->valor_total =$vt;

            return $vt;
        }else{
            return 0;
        }

    }
}
