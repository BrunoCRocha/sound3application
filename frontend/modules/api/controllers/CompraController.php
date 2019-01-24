<?php

namespace frontend\modules\api\controllers;

use common\models\Album;
use common\models\Compra;
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
        $comprasEfetivadas=Compra::find()
            ->select('id')
            ->where(['and',['id_utilizador'=> $id,'efetivada'=>1]])
            ->all();
        return $comprasEfetivadas;
    }

    //return dos itens no carrinho do userlogado
    public function actionGetCarrinho($userLogado){

        $carrinho = Compra::find()
            ->where(['and',['id_utilizador'=> $userLogado,'efetivada'=>0]])
            ->with('linhaCompras')
            ->distinct()
            ->all();

        $musicas = array();

        foreach ($carrinho[0]->relatedRecords as $lcArray){

            if(count($lcArray) > 0){
                foreach ($lcArray as $lc){
                    array_push($musicas, Musica::findOne($lc->id_musica));
                }
            }
        }

        return $musicas;
    }

    //adicionar musica ao carrinho
    public function actionAdicionar($userLogado,$musicaId){
        $musica = Musica::findOne($musicaId);
        if($musica != null){

            $compra = Compra::find()
                ->where(['and',['id_utilizador'=> $userLogado,'efetivada'=>0]])
                ->distinct()
                ->all();

            $linhaCompra = new LinhaCompra();
            $linhaCompra->id_compra = $compra[0]->id;
            $linhaCompra->id_musica = $musica->id;
            $linhaCompra->save();
            return "true";
        }

        return "false";
    }

    //adicionar todas as musicas de um album ao carrinho
    public function actionAdicionarAlbum($userLogado, $albumId){
        $album = Album::findOne($albumId);
        if($album != null){
            $compra = Compra::find()
                ->where(['and',['id_utilizador'=> $userLogado,'efetivada'=>0]])
                ->with('linhaCompras')
                ->distinct()
                ->all();

            $musicasCarrinho = array();

            $musicasAlbum = Musica::find()
                ->select('id')
                ->where(['id_album' => $album->id])
                ->all();

            foreach ($compra[0]->relatedRecords as $lcArray){
                foreach ($lcArray as $lc){
                    array_push($musicasCarrinho, Musica::findOne($lc->id_musica)->id);
                }
            }

            $musicasAlbum = ArrayHelper::getColumn($musicasAlbum, 'id');

            $musicas_para_adicionar = array_diff($musicasAlbum, $musicasCarrinho);

            foreach ($musicas_para_adicionar as $musica){
                $linhaCompra = new LinhaCompra();
                $linhaCompra->id_compra = $compra[0]->id;
                $linhaCompra->id_musica = $musica;
                $linhaCompra->save();
            }

            return "true";
        }

        return "false";
    }

    //remover uma umsica do carrinho
    public function actionRemover($userLogado, $musicaId){
        $musica = Musica::findOne($musicaId);

        if($musica != null){
            $compra = Compra::find()
                ->where(['and',['id_utilizador'=> $userLogado,'efetivada'=>0]])
                ->with('linhaCompras')
                ->distinct()
                ->all();

            foreach ($compra[0]->relatedRecords as $lcArray){
                foreach ($lcArray as $lc){
                    if($lc->id_musica == $musica->id){
                        $lc->delete();
                    }
                }
            }
            return "true";
        }
        return "false";
    }




    // OLE


    public function actionCheckalbumcarrinho($userId, $albumId){
        $album = Album::findOne($albumId);

        $musicasAlbum = array();

        if($album != null){
            foreach ($album->musicas as $musica){
                array_push($musicasAlbum, $musica);
            }

            $carrinho = Compra::find()
                ->where(['and', ['id_utilizador' => $userId,'efetivada' => 0]])
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

            $musicas_para_adicionar = array();

            $musicas_para_adicionar = array_diff($musicasAlbum, $musicasCarrinho);


            if(count($musicas_para_adicionar)== 0){
                return true;
            }else{
                return false;
            }
        }
        return "não ha";
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
}
