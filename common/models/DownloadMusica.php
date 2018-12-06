<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class DownloadMusica extends Model
{
    /**
     * @var UploadedFile
     */
    public $musicFile;
    public $caminhoFinal;

    public function rules()
    {
        return [

        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            /*var_dump('ola');
            die();*/
            $caminho = Yii::getAlias('@musicas');
            $caminho .= "\\";

            $this->caminhoFinal = $this->musicFile->baseName . '.' . $this->musicFile->extension;

            $this->musicFile->saveAs($caminho . $this->musicFile->baseName . '.' . $this->musicFile->extension);
            return true;
        } else {
            var_dump('ola');
            die();
            return false;
        }
    }
}?>