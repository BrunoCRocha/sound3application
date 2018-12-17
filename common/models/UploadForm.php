<?php namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $caminhoFinal;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload($tipo)
    {
        if ($this->validate()) {

            if($tipo == 'artista'){
                $caminho = Yii::getAlias('@artistas');
            }
            if($tipo == 'album'){
                $caminho = Yii::getAlias('@albuns');
            }
            if($tipo == 'genero'){
                $caminho = Yii::getAlias('@generos');
            }

            $caminho .= "\\";

            $this->caminhoFinal = $this->imageFile->baseName . '.' . $this->imageFile->extension;

            $this->imageFile->saveAs($caminho . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}?>