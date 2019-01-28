<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Artista;
use common\models\Compra;
use common\models\Fav_Musica;
use common\models\LinhaCompra;
use common\models\Musica;
use yii\filters\auth\HttpBasicAuth;

class AlbumController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Album';

    public function actionTopalbuns(){
        $compras = Compra::find()->select('id')
            ->where(['efetivada' => 1])
            ->all();

        $valores = array();

        foreach ($compras as $compra){
            foreach ($compra->linhaCompras as $lc){
                $numeroVendas = LinhaCompra::find()
                    ->where(['id_compra' => $compra->id])
                    ->count();
                $valores[$lc->id_musica] = $numeroVendas;
            }
        }

        if (isset($valores)){
            arsort($valores );//Ordena pelo valor
        }

        $maisVendidos = array_slice($valores, 0, 5, true);


        //top5 musicas + compradas
        $arrayMusicas = array();

        foreach ($maisVendidos as $idMusica => $nCompras){
            $modelMusica = Musica::findOne($idMusica);
            array_push($arrayMusicas, $modelMusica);
        }

        $albuns = array();

        foreach ($arrayMusicas as $musica){
            array_push($albuns, Album::findOne($musica->id_album));
        }

        $artistas = array();
        foreach ($albuns as $album){
            array_push($artistas, Artista::find()
                ->where(['id' => $album->id_artista])
                ->one());
        }

        return ['albuns' => $albuns, 'artistas' => $artistas];
    }

    public function actionAlbunsrecentes(){
        $albuns = Album::find()->all();

        $inverter = array_reverse($albuns);

        $albunsMaisRecentes = array_slice($inverter, 0 , 5, true);

        $artistas = array();
        foreach ($albunsMaisRecentes as $album){
            array_push($artistas, Artista::find()
                ->where(['id' => $album->id_artista])
                ->one());
        }

        return ["albuns" => $albunsMaisRecentes, "artistas" => $artistas];
    }



    public function actionFindalbumbyid($id){
        $album = Album::findOne($id);

        return ["album" => $album];
    }

    public function actionFindmusicas($id, $userId){
        $album = Album::findOne($id);

        $musicasFavoritas=array();
        foreach ($album->musicas as $musica){
            $fav = Fav_Musica::find()
                ->where(['and',['id_utilizador' => $userId, 'id_musica' => $musica->id]])
                ->one();

            if($fav != null){
                array_push($musicasFavoritas, $musica);
            }

        }
        $carrinho = Compra::find()
            ->where(['and',['id_utilizador'=> $userId,'efetivada'=>0]])
            ->with('linhaCompras')
            ->one();

        $musicasCarrinho = array();

        foreach ($carrinho->relatedRecords as $lcArray){
            if(count($lcArray) > 0){
                foreach ($lcArray as $lc){
                    array_push($musicasCarrinho, Musica::findOne($lc->id_musica));
                }
            }
        }

        return ["musica" => $album->musicas, "album" => $album, "musicasFavoritas" => $musicasFavoritas, "carrinho" => $musicasCarrinho];
    }

    public function actionFindalbumbysearch($search){
        $albumSearch = Album::find()
            ->where(['like', 'nome', $search])
            ->all();

        return $albumSearch;
    }
    public function actionArtistaalbum($albumId){
        $album = Album::findOne($albumId);

        $artista = Artista::findOne($album->id_artista);

        return ["artista" => $artista];
    }

    // Vai Buscar Albuns do Artista
    public function actionAlbunsartista($artistaId){
        $albuns = Album::find()
            ->where(['id_artista' => $artistaId])
            ->all();


        $artistas = array();

        foreach ($albuns as $album){
            array_push($artistas, Artista::find()
                ->where(['id' => $album->id_artista])
                ->one());
        }

        return ['albuns' => $albuns, 'artistas' => $artistas];
    }

}
