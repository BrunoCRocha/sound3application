<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 12/12/2018
 * Time: 19:49
 */

use common\models\Album;
use common\models\Artista;
use common\models\Genero;
use common\models\Musica;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;



if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];

    $artistaSearch = Artista::find()
        ->where(['like', 'nome', $query])
        ->all();

    $albumSearch = Album::find()
        ->where(['like', 'nome', $query])
        ->all();

    $musicaSearch = Musica::find()
        ->where(['like', 'nome', $query])
        ->all();

    $array = array();

    foreach($artistaSearch as $artista){
        $array[] = array (
            'label' => $artista->nome,
            'value' => $artista->nome,
        );
    }

    foreach($albumSearch as $album){
        $array[] = array (
            'label' => $album->nome,
            'value' => $album->nome,
        );
    }

    foreach($musicaSearch as $musica){
        $array[] = array (
            'label' => $musica->nome,
            'value' => $musica->nome,
        );
    }

    //RETURN JSON ARRAY
    echo json_encode($array);
}