<?php

namespace frontend\controllers;

use common\models\Album;
use common\models\Compra;
use common\models\Fav_Musica;
use common\models\LinhaCompra;
use common\models\Musica;
use common\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Request;


class CarrinhoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $message = '';

        $userLogado = Yii::$app->user->identity;

        $compra = Compra::find()
            ->where(['and',['id_utilizador'=> $userLogado,'efetivada'=>0]])
            ->with('linhaCompras')
            ->one();

        $musicas = array();

        foreach ($compra->relatedRecords as $lcArray){

            if(count($lcArray) == 0){

                $message = 'Não possui items no seu carrinho...';
            }
            foreach ($lcArray as $lc){
                array_push($musicas, Musica::findOne($lc->id_musica));

            }
        }

        $valorTotal = $compra->getValorTotal();

        $musicasFavoritas = $this->getFavoritos($musicas);


        return $this->render('index', [
            'musicas' => $musicas,
            'message' => $message,
            'musicasFavoritas' => $musicasFavoritas,
            'valorTotal' => $valorTotal
        ]);
    }

    public function actionAdicionar($id){

        if($musica = Musica::findOne($id)){
            $userLogado = Yii::$app->user->identity;

            $compra = Compra::find()
                ->where(['and',['id_utilizador'=> $userLogado,'efetivada'=>0]])
                ->distinct()
                ->one();

            $linhaCompra = new LinhaCompra();
            $linhaCompra->id_compra = $compra->id;
            $linhaCompra->id_musica = $musica->id;
            $linhaCompra->save();
        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionAdicionarAlbum($id){

        if($album = Album::findOne($id)){
            $userLogado = Yii::$app->user->identity;

            $compra = Compra::find()
                ->where(['and',['id_utilizador'=> $userLogado,'efetivada'=>0]])
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
        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionRemover($id){
        if($musica = Musica::findOne($id)){
            $userLogado = Yii::$app->user->identity;

            $compra = Compra::find()
                ->where(['and',['id_utilizador'=> $userLogado,'efetivada'=>0]])
                ->with('linhaCompras')
                ->one();

            foreach ($compra->relatedRecords as $lcArray){
                foreach ($lcArray as $lc){
                    if($lc->id_musica == $musica->id){
                        $lc->delete();
                    }
                }
            }
        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function getFavoritos($musicas){

        $userLogado = Yii::$app->user->identity;

        //get fav_generos do user logado
        $favoritos = Fav_Musica::find()
            ->where(['id_utilizador' => $userLogado->getId()])
            ->all();

        $itemsFavoritos = array();

        foreach ($favoritos as $item){
            if(in_array($item->id_musica, ArrayHelper::getColumn($musicas,'id'))){
                array_push($itemsFavoritos, $item->id_musica);
            }
        }

        return $itemsFavoritos;
    }
}
