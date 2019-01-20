<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property int $id
 * @property string $nome
 * @property string $ano
 * @property string $preco
 * @property string $caminhoImagem
 * @property int $id_artista
 * @property int $id_genero
 *
 * @property Artista $artista
 * @property Genero $genero
 * @property Comment[] $comments
 * @property FavAlbum[] $favAlbums
 * @property User[] $utilizadors
 * @property Musica[] $musicas
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'preco', 'id_artista', 'id_genero'], 'required'],
            [['ano'], 'safe'],
            [['preco'], 'number'],
            [['id_artista', 'id_genero'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['id_artista'], 'exist', 'skipOnError' => true, 'targetClass' => Artista::className(), 'targetAttribute' => ['id_artista' => 'id']],
            [['id_genero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['id_genero' => 'id']],
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
            'ano' => 'Ano Lancamento',
            'preco' => 'Preco',
            'id_artista' => 'Id Artista',
            'id_genero' => 'Id Genero',
            'caminhoImagem' => 'Caminho Imagem',
            'nMusicas' => 'Numero Musicas'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtista()
    {
        return $this->hasOne(Artista::className(), ['id' => 'id_artista']);
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
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['id_album' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavAlbums()
    {
        return $this->hasMany(FavAlbum::className(), ['id_album' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMusicas()
    {
        return $this->hasMany(Musica::className(), ['id_album' => 'id']);
    }

    /*Alterações para a API*/
    /*public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $id=$this->id;
        $nome=$this->nome;
        $ano=$this->ano;
        $preco=$this->preco;
        $nMusicas=$this->nMusicas;
        $id_artista=$this->id_artista;
        $id_genero=$this->id_genero;
        $caminhoImagem=$this->caminhoImagem;
        $myObj=new \stdClass();
        $myObj->id=$id;
        $myObj->nome=$nome;
        $myObj->ano=$ano;
        $myObj->preco=$preco;
        $myObj->nMusicas=$nMusicas;
        $myObj->id_artista=$id_artista;
        $myObj->id_genero=$id_genero;
        $myObj->caminhoImagem=$caminhoImagem;
        $myJSON = json_encode($myObj);

        if($insert)
            $this->fazPublish("INSERT",$myJSON);
        else
            $this->fazPublish("UPDATE",$myJSON);
    }*/

    /*public function afterDelete()
    {
        parent::afterDelete();
        $album_id= $this->id;
        $nome=$this->nome;
        $myObj=new \stdClass();
        $myObj->id=$album_id;
        $myObj->nome=$nome;
        $myJSON = json_encode($myObj);
        $this->fazPublish("DELETE",$myJSON);
    }*/

    public function beforeDelete()
    {

        $musicas=Musica::find()->where(['id_album' => $this->id])->all();
        //var_dump($musicas);die();
        if(count($musicas)>0){
            foreach ($musicas as $musica){
                $musica->delete();
            }
        }

        $favAlbuns=Fav_Album::find()->where(['id_album'=>$this->id])->all();
        if(count($favAlbuns)>0){
            foreach ($favAlbuns as $favAlbum){
                $favAlbum->delete();
            }
        }

        $comments=Comment::find()->where(['id_album'=>$this->id])->all();
        if(count($comments)>0){
            foreach ($comments as $comment){
                $comment->delete();
            }
        }

        return parent::beforeDelete();
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
