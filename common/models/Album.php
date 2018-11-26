<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property int $id
 * @property string $nome
 * @property string $data_lancamento
 * @property string $preco
 * @property string $caminhoImagem
 * @property int $id_artista
 * @property int $id_genero
 * @property int $id_subgenero
 *
 * @property Artista $artista
 * @property Genero $genero
 * @property ConterGenero $subgenero
 * @property Comment[] $comments
 * @property FavAlbum[] $favAlbums
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
            [['nome', 'preco', 'caminhoImagem', 'id_artista', 'id_genero'], 'required'],
            [['data_lancamento'], 'safe'],
            [['preco'], 'number'],
            [['id_artista', 'id_genero', 'id_subgenero'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['caminhoImagem'], 'string', 'max' => 250],
            [['id_artista'], 'exist', 'skipOnError' => true, 'targetClass' => Artista::className(), 'targetAttribute' => ['id_artista' => 'id']],
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
            'nome' => 'Nome',
            'data_lancamento' => 'Data Lancamento',
            'preco' => 'Preco',
            'caminhoImagem' => 'Caminho Imagem',
            'id_artista' => 'Id Artista',
            'id_genero' => 'Id Genero',
            'id_subgenero' => 'Id Subgenero',
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
    public function getSubgenero()
    {
        return $this->hasOne(ConterGenero::className(), ['id_subgenero' => 'id_subgenero']);
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
