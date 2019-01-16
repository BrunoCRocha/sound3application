<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "artista".
 *
 * @property int $id
 * @property string $nome
 * @property string $nacionalidade
 * @property string $caminhoImagem
 * @property string $ano
 *
 * @property Album[] $albums
 * @property FavArtista[] $favArtistas
 * @property User[] $utilizadors
 */
class Artista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['ano'], 'safe'],
            [['nome'], 'string', 'max' => 50],
            [['nacionalidade'], 'string', 'max' => 25],
            [['caminhoImagem'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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
            'nacionalidade' => 'Nacionalidade',
            'ano' => 'Ano',
            'caminhoImagem' => 'Caminho Imagem',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['id_artista' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavArtistas()
    {
        return $this->hasMany(FavArtista::className(), ['id_artista' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizadors()
    {
        return $this->hasMany(User::className(), ['id' => 'id_utilizador'])->viaTable('fav_artista', ['id_artista' => 'id']);
    }

    /*Alterações para a API*/
    /*public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $id=$this->id;
        $nome=$this->nome;
        $nacionalidade=$this->nacionalidade;
        $ano=$this->ano;
        $caminhoImagem=$this->caminhoImagem;
        $myObj=new \stdClass();
        $myObj->id=$id;
        $myObj->nome=$nome;
        $myObj->nacionalidade=$nacionalidade;
        $myObj->ano=$ano;
        $myObj->caminhoImagem=$caminhoImagem;
        $myJSON = json_encode($myObj);

        if($insert)
            $this->fazPublish("INSERT",$myJSON);
        else
            $this->fazPublish("UPDATE",$myJSON);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $artista_id= $this->id;
        $nome=$this->nome;
        $myObj=new \stdClass();
        $myObj->id=$artista_id;
        $myObj->nome=$nome;
        $myJSON = json_encode($myObj);
        $this->fazPublish("DELETE",$myJSON);
    }*/

    public function fazPublish($canal,$msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = "admin"; // set your username
        $password = "adminadmin"; // set your password
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
