<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Compra;
use common\models\Fav_Musica;
use common\models\LinhaCompra;
use common\models\Musica;
use common\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompraController implements the CRUD actions for Compra model.
 */
class CompraController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Compra';

    //return musicas compradas
    public function actionMusicascompradas($idcompra)
    {
        $compra=Compra::findOne($idcompra);

        $musicas=array();

        foreach ($compra->linhaCompras as $lc) {
            $musica=Musica::findOne($lc->id_musica);
            array_push($musicas,$musica);
        }
        return $musicas;
    }

    //return de compras efetivadas
    public function actionComprasuser($idutilizador)
    {
        $comprasEfetivadas=$this->getCompras($idutilizador);
        return $comprasEfetivadas;
    }

    //return compras efetivadas
    public function getCompras($id){
        $comprasEfetivadas = Compra::find()
            ->select('id')
            ->where(['and',['id_utilizador'=> $id,'efetivada'=>1]])
            ->all();

        return $comprasEfetivadas;
    }

    //return dos itens no carrinho do userlogado
    public function actionGetcarrinho($userId){

        $carrinho = Compra::find()
            ->where(['and',['id_utilizador'=> $userId,'efetivada'=>0]])
            ->with('linhaCompras')
            ->one();

        $musicas = array();

        foreach ($carrinho->relatedRecords as $lcArray){
            if(count($lcArray) > 0){
                foreach ($lcArray as $lc){
                    array_push($musicas, Musica::findOne($lc->id_musica));
                }
            }
        }

        $albuns = array();

        foreach ($musicas as $musica){
            array_push($albuns, Album::find()
                ->where(['id' => $musica->id_album])
                ->one());
        }

        return ['musicas' => $musicas, 'albuns' => $albuns];
    }

    //adicionar musica ao carrinho
    public function actionAdicionarmusicacarrinho(){
        $idUser = \Yii::$app->request->post('id_utilizador');
        $idMusica = \Yii::$app->request->post('id_musica');

        $musica = Musica::findOne($idMusica);

        if($musica != null){
            $compra = Compra::find()
            ->where(['and',['id_utilizador'=> $idUser, 'efetivada'=>0]])
            ->one();

            $linhaCompra = new LinhaCompra();
            $linhaCompra->id_compra = $compra->id;
            $linhaCompra->id_musica = $musica->id;
            $ret = $linhaCompra->save();

            return $ret;
        }

        return false;
    }

    //adicionar todas as musicas de um album ao carrinho
    public function actionAdicionaralbum($userId, $albumId){
        $album = Album::findOne($albumId);
        if($album != null){
            $compra = Compra::find()
                ->where(['and',['id_utilizador'=> $userId,'efetivada'=>0]])
                ->with('linhaCompras')
                ->one();

            $musicasCarrinho = array();

            $musicasAlbum = Musica::find()
                ->select('id')
                ->where(['id_album' => $album->id])
                ->all();

            foreach ($compra->relatedRecords as $lcArray){
                foreach ($lcArray as $lc){
                    array_push($musicasCarrinho, Musica::findOne($lc->id_musica)->id);
                }
            }

            $musicasAlbum = ArrayHelper::getColumn($musicasAlbum, 'id');

            $musicas_para_adicionar = array_diff($musicasAlbum, $musicasCarrinho);

            foreach ($musicas_para_adicionar as $musica){
                $linhaCompra = new LinhaCompra();
                $linhaCompra->id_compra = $compra->id;
                $linhaCompra->id_musica = $musica;
                $linhaCompra->save();
            }
            return true;
        }

        return false;
    }

    //remover uma musica do carrinho
    public function actionRemover($userId, $musicaId){
        $musica = Musica::findOne($musicaId);

        if($musica != null){
            $compra = Compra::find()
                ->where(['and',['id_utilizador'=> $userId,'efetivada'=>0]])
                ->with('linhaCompras')
                ->one();

            foreach ($compra->relatedRecords as $lcArray){
                foreach ($lcArray as $lc){
                    if($lc->id_musica == $musica->id){
                        $lc->delete();
                    }
                }
            }
            return true;
        }
        return false;
    }


    public function actionGetcomprasregistadas($userId){
        $compras = Compra::find()->where(['and',['id_utilizador'=> $userId,'efetivada'=>1]])->asArray()->all();

        return $compras;
    }

    public function actionCheckalbumcarrinho($userId, $albumId){
        $album = Album::findOne($albumId);
        if($album != null){
            $musicasAlbum = Musica::find()
                ->select('id')
                ->where(['id_album' => $album->id])
                ->all();

            $carrinho = Compra::find()
                ->where(['and',['id_utilizador'=> $userId,'efetivada'=>0]])
                ->with('linhaCompras')
                ->one();

            $musicasCarrinho=array();

            foreach ($carrinho->relatedRecords as $lcArray){
                foreach ($lcArray as $lc){
                    array_push($musicasCarrinho, Musica::findOne($lc->id_musica)->id);
                }
            }

            $musicasAlbum = ArrayHelper::getColumn($musicasAlbum, 'id');

            $musicas_para_adicionar = array_diff($musicasAlbum, $musicasCarrinho);

            if(count($musicas_para_adicionar)==0){
                return true;
            }

        }
        return false;
    }

    public function actionCheckmusicacarrinho($userId, $musicaId){
        $musica = Musica::findOne($musicaId);
        $check=false;
        if($musica != null) {
            $carrinho = Compra::find()
                ->where(['and', ['id_utilizador' => $userId, 'efetivada' => 0]])
                ->with('linhaCompras')
                ->one();

            foreach ($carrinho->relatedRecords as $lcArray) {
                if (count($lcArray) > 0) {
                    foreach ($lcArray as $lc) {
                        if ($lc->id_musica == $musica->id){
                            $check = true;
                        }
                    }
                }
            }
        }
        return $check;
    }





    public function actionRemovealbumcarrinho($userId, $albumId){
        $album = Album::findOne($albumId);
        if($albumId != null) {

            $musicasAlbum = Musica::find()
                ->where(['id_album' => $album->id])
                ->all();

            $carrinho = Compra::find()
                ->where(['and', ['id_utilizador' => $userId, 'efetivada' => 0]])
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

            foreach ($carrinho->relatedRecords as $lcArray){
                if(count($lcArray) > 0){
                    foreach ($musicasAlbum as $musica){
                        foreach ($lcArray as $lc){
                            if($lc->id_musica == $musica->id){
                                $lc->delete();
                            }
                        }
                    }
                }
            }

            return false;

        }
        return false;
    }

    public function actionCheckmusicasalbumfavoritos($userId, $albumId){

        $musicasAlbum = Musica::find()
            ->where(['id_album' => $albumId])
            ->all();
        $musicasFavoritos = array();
        $musicasFavAlbum = array();

        foreach ($musicasAlbum as $musica){
            $fav= Fav_Musica::find()
                ->where(['and',['id_utilizador' => $userId, 'id_musica' => $musica->id]])
                ->one();

            if($fav!=null){
                array_push($musicasFavoritos, $musica);
            }

        }
        if(count($musicasFavoritos) > 0){
            var_dump($musicasFavoritos);die();
        }
        return false;



    }
}
