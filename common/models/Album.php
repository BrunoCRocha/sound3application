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

}
