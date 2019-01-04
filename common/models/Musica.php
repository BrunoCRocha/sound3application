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
    /*Alterações para a API*/
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $id=$this->id;
        $nome=$this->nome;
        $duracao=$this->duracao;
        $preco=$this->preco;
        $posicao=$this->posicao;
        $id_album=$this->id_album;
        $caminhoMP3=$this->caminhoMP3;
        $myObj=new \stdClass();
        $myObj->id=$id;
        $myObj->nome=$nome;
        $myObj->duracao=$duracao;
        $myObj->preco=$preco;
        $myObj->posicao=$posicao;
        $myObj->id_album=$id_album;
        $myObj->caminhoMP3=$caminhoMP3;
        $myJSON = json_encode($myObj);

        if($insert)
            $this->fazPublish("INSERT",$myJSON);
        else
            $this->fazPublish("UPDATE",$myJSON);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $musica_id= $this->id;
        $nome=$this->nome;
        $myObj=new \stdClass();
        $myObj->id=$musica_id;
        $myObj->nome=$nome;
        $myJSON = json_encode($myObj);
        $this->fazPublish("DELETE",$myJSON);
    }

    public function fazPublish($canal,$msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = "asasas"; // set your username
        $password = "asasas"; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new \frontend\mosquitto\phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password))
        {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        else { file_put_contents('debug.output',"Time out!");}

    }
}
