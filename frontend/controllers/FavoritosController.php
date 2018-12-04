<?php

namespace frontend\controllers;

use common\models\Fav_Album;

class FavoritosController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAlbum()
    {

        var_dump('ole');
        die();

        $favoritos = new Fav_Album;


        if(isset($_POST['Favorito']))
        {
            $favoritos->attributes=$_POST['Favorito'];
            if($favoritos->validate())
            {
                // form inputs are valid, do something here
                print_r($_REQUEST);
                return;
            }
        }
        $this->render('person_form',array('model'=>$model));



        return $this->render('favoritos_album');
    }

}
