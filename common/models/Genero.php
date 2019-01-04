<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property string $caminhoImagem
 *
 * @property Album[] $albums
 * @property FavGenero[] $favGeneros
 * @property User[] $utilizadors
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 250],
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
            'descricao' => 'Descricao',
            'caminhoImagem' => 'Caminho Imagem',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['id_genero' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavGeneros()
    {
        return $this->hasMany(Fav_Genero::className(), ['id_genero' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizadors()
    {
        return $this->hasMany(User::className(), ['id' => 'id_utilizador'])->viaTable('fav_genero', ['id_genero' => 'id']);
    }

    /*Alterações para a API*/
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $id=$this->id;
        $nome=$this->nome;
        $descricao=$this->descricao;
        $caminhoImagem=$this->caminhoImagem;
        $myObj=new \stdClass();
        $myObj->id=$id;
        $myObj->nome=$nome;
        $myObj->descricao=$descricao;
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
        $genero_id= $this->id;
        $nome=$this->nome;
        $myObj=new \stdClass();
        $myObj->id=$genero_id;
        $myObj->nome=$nome;
        $myJSON = json_encode($myObj);
        $this->fazPublish("DELETE",$myJSON);
    }

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
            //var_dump($mqtt->publish($canal, $msg, 0));
            //die();
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        else { file_put_contents('debug.output',"Time out!"); }
}
}
