<?php

use yii\db\Migration;

/**
 * Class m181022_080238_init_rbac
 */
class m181022_080238_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181022_080238_init_rbac cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $auth = Yii::$app->authManager;

        // add "create utilizador" permission
        $createUtilizador = $auth->createPermission('createUtilizador');
        $createUtilizador->description = 'Criar Utilizador';
        $auth->add($createUtilizador);

        // add "read utilizador" permission
        $readUtilizador = $auth->createPermission('readUtilizador');
        $readUtilizador->description = 'Ler dados de Utilizadores';
        $auth->add($readUtilizador);

        // add "update utilizador" permission
        $updateUtilizador = $auth->createPermission('updateUtilizador');
        $updateUtilizador->description = 'Atualizar dados de Utilizador';
        $auth->add($updateUtilizador);

        // add "delete utilizador" permission
        $deleteUtilizador = $auth->createPermission('deleteUtilizador');
        $deleteUtilizador->description = 'Apagar dados de Utilizadores';
        $auth->add($deleteUtilizador);

        // add "create Género" permission
        $createGenero = $auth->createPermission('createGenero');
        $createGenero->description = 'Criar Genero';
        $auth->add($createGenero);

        // add "read Género" permission
        $readGenero = $auth->createPermission('readGenero');
        $readGenero->description = 'Ler dados de Géneros';
        $auth->add($readGenero);

        // add "update Género" permission
        $updateGenero = $auth->createPermission('updateGenero');
        $updateGenero->description = 'Atualizar dados de Genero';
        $auth->add($updateGenero);

        // add "delete Género" permission
        $deleteGenero = $auth->createPermission('deleteGenero');
        $deleteGenero->description = 'Apagar dados de Géneros';
        $auth->add($deleteGenero);

        // add "create Artista" permission
        $createArtista = $auth->createPermission('createArtista');
        $createArtista->description = 'Criar Artista';
        $auth->add($createArtista);

        // add "read Artista" permission
        $readArtista = $auth->createPermission('readArtista');
        $readArtista->description = 'Ler dados de Artistas';
        $auth->add($readArtista);

        // add "update Artista" permission
        $updateArtista = $auth->createPermission('updateArtista');
        $updateArtista->description = 'Atualizar dados de Artista';
        $auth->add($updateArtista);

        // add "delete Artista" permission
        $deleteArtista = $auth->createPermission('deleteArtista');
        $deleteArtista->description = 'Apagar dados de Artistas';
        $auth->add($deleteArtista);

        // add "create Álbum" permission
        $createAlbum = $auth->createPermission('createAlbum');
        $createAlbum->description = 'Criar Album';
        $auth->add($createAlbum);

        // add "read Album" permission
        $readAlbum = $auth->createPermission('readAlbum');
        $readAlbum->description = 'Ler dados de Álbuns';
        $auth->add($readAlbum);

        // add "update Album" permission
        $updateAlbum= $auth->createPermission('updateAlbum');
        $updateAlbum->description = 'Atualizar dados de Album';
        $auth->add($updateAlbum);

        // add "delete Album" permission
        $deleteAlbum = $auth->createPermission('deleteAlbum');
        $deleteAlbum->description = 'Apagar dados de Álbuns';
        $auth->add($deleteAlbum);

        // add "create Música" permission
        $createMusica = $auth->createPermission('createMusica');
        $createMusica->description = 'Criar Musica';
        $auth->add($createMusica);

        // add "read Música" permission
        $readMusica = $auth->createPermission('readMusica');
        $readMusica->description = 'Ler dados de Musicas';
        $auth->add($readMusica);

        // add "update Música" permission
        $updateMusica = $auth->createPermission('updateMusica');
        $updateMusica->description = 'Atualizar dados de Musica';
        $auth->add($updateMusica);

        // add "delete Musica" permission
        $deleteMusica = $auth->createPermission('deleteMusica');
        $deleteMusica->description = 'Apagar dados de Musica';
        $auth->add($deleteMusica);

        // add "create Comentario" permission
        $createComentario = $auth->createPermission('createComentario');
        $createComentario->description = 'Criar Comentário';
        $auth->add($createComentario);

        // add "read Comentario" permission
        $readComentario = $auth->createPermission('readComentario');
        $readComentario->description = 'Ler dados de Comentarios';
        $auth->add($readComentario);

        // add "update Comentario" permission
        $updateComentario = $auth->createPermission('updateComentario');
        $updateComentario->description = 'Atualizar dados de Música';
        $auth->add($updateComentario);

        // add "delete Comentario" permission
        $deleteComentario = $auth->createPermission('deleteComentario');
        $deleteComentario->description = 'Apagar dados de Comentario';
        $auth->add($deleteComentario);

        // add "create Compra" permission
        $createCompra = $auth->createPermission('createCompra');
        $createCompra->description = 'Criar Compra';
        $auth->add($createCompra);

        // add "read Compra" permission
        $readCompra = $auth->createPermission('readCompra');
        $readCompra->description = 'Ler dados de Compras';
        $auth->add($readCompra);

        // add "delete Compra" permission
        $deleteCompra = $auth->createPermission('deleteCompra');
        $deleteCompra->description = 'Apagar dados de Compra';
        $auth->add($deleteCompra);

        // add "create Fav_Genero" permission
        $createFavgenero = $auth->createPermission('createFavgenero');
        $createFavgenero->description = 'Criar Favgenero';
        $auth->add($createFavgenero);

        // add "read Favgenero" permission
        $readFavgenero = $auth->createPermission('readFavgenero');
        $readFavgenero->description = 'Ler dados de Favgenero';
        $auth->add($readFavgenero);

        // add "delete Favgenero" permission
        $deleteFavgenero = $auth->createPermission('deleteFavgenero');
        $deleteFavgenero->description = 'Apagar dados de Favgenero';
        $auth->add($deleteFavgenero);

        // add "create Favartista" permission
        $createFavartista = $auth->createPermission('createFavartista');
        $createFavartista->description = 'Criar Favartista';
        $auth->add($createFavartista);

        // add "read Favartista" permission
        $readFavartista = $auth->createPermission('readFavartista');
        $readFavartista->description = 'Ler dados de Favartista';
        $auth->add($readFavartista);

        // add "delete Favartista" permission
        $deleteFavartista = $auth->createPermission('deleteFavartista');
        $deleteFavartista->description = 'Apagar dados de Favartista';
        $auth->add($deleteFavartista);

        // add "create Favalbum" permission
        $createFavalbum = $auth->createPermission('createFavalbum');
        $createFavalbum->description = 'Criar Favalbum';
        $auth->add($createFavalbum);

        // add "read Favalbum" permission
        $readFavalbum = $auth->createPermission('readFavalbum');
        $readFavalbum->description = 'Ler dados de Favalbum';
        $auth->add($readFavalbum);

        // add "delete Favalbum" permission
        $deleteFavalbum = $auth->createPermission('deleteFavalbum');
        $deleteFavalbum->description = 'Apagar dados de Favalbum';
        $auth->add($deleteFavalbum);

        // add "create Favmusica" permission
        $createFavmusica = $auth->createPermission('createFavmusica');
        $createFavmusica->description = 'Criar Favmusica';
        $auth->add($createFavmusica);

        // add "read Favmusica" permission
        $readFavmusica = $auth->createPermission('readFavmusica');
        $readFavmusica->description = 'Ler dados de Favmusica';
        $auth->add($readFavmusica);

        // add "delete Favgenero" permission
        $deleteFavmusica = $auth->createPermission('deleteFavmusica');
        $deleteFavmusica->description = 'Apagar dados de Favmusica';
        $auth->add($deleteFavmusica);



        // add "moderador" role
        $mod = $auth->createRole('Moderador');
        $auth->add($mod);
        // give this role the CRUD permissions for the USERS table
        $auth->addChild($mod, $createUtilizador);
        $auth->addChild($mod, $deleteUtilizador);
        $auth->addChild($mod, $readUtilizador);
        $auth->addChild($mod, $updateUtilizador);

        // give this role the CRUD permissions for the GÉNEROS table
        $auth->addChild($mod, $createGenero);
        $auth->addChild($mod, $readGenero);
        $auth->addChild($mod, $updateGenero);
        $auth->addChild($mod, $deleteGenero);
        // give this role the CRUD permissions for the ARTISTAS table
        $auth->addChild($mod, $createArtista);
        $auth->addChild($mod, $readArtista);
        $auth->addChild($mod, $updateArtista);
        $auth->addChild($mod, $deleteArtista);
        // give this role the CRUD permissions for the ÁLBUNS table
        $auth->addChild($mod, $createAlbum);
        $auth->addChild($mod, $readAlbum);
        $auth->addChild($mod, $updateAlbum);
        $auth->addChild($mod, $deleteAlbum);
        // give this role the CRUD permissions for the MÚSICAS table
        $auth->addChild($mod, $createMusica);
        $auth->addChild($mod, $readMusica);
        $auth->addChild($mod, $updateMusica);
        $auth->addChild($mod, $deleteMusica);
        // give this role the CRUD permissions for the COMENTÁRIOS table
        $auth->addChild($mod, $createComentario);
        $auth->addChild($mod, $readComentario);
        $auth->addChild($mod, $deleteComentario);
        // give this role the CRUD permissions for the COMPRAS table
        $auth->addChild($mod, $createCompra);
        $auth->addChild($mod, $readCompra);
        // give this role the CRUD permissions for the Fav_genero table
        $auth->addChild($mod, $readFavgenero);
        $auth->addChild($mod, $deleteFavgenero);
        // give this role the CRUD permissions for the Fav_artista table
        $auth->addChild($mod, $readFavartista);
        $auth->addChild($mod, $deleteFavartista);
        // give this role the CRUD permissions for the Fav_album table
        $auth->addChild($mod, $readFavalbum);
        $auth->addChild($mod, $deleteFavalbum);
        // give this role the CRUD permissions for the Fav_musica table
        $auth->addChild($mod, $readFavmusica);
        $auth->addChild($mod, $deleteFavmusica);

        //add admin role and give it moderador permissions and more
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        //add delete compra permission
        $auth->addChild($admin, $deleteCompra);

        //add cliente role
        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        //add CRUD permissions for comments
        $auth->addChild($cliente, $createComentario);
        $auth->addChild($cliente, $readComentario);
        $auth->addChild($cliente, $updateComentario);
        $auth->addChild($cliente, $deleteComentario);
        //add CR permissions for compras
        $auth->addChild($cliente, $createCompra);
        $auth->addChild($cliente, $readCompra);
        // give this role the CRD permissions for the Fav_genero table
        $auth->addChild($cliente, $createFavgenero);
        $auth->addChild($cliente, $readFavgenero);
        $auth->addChild($cliente, $deleteGenero);
        // give this role the CRD permissions for the Fav_artista table
        $auth->addChild($cliente, $createFavartista);
        $auth->addChild($cliente, $readFavartista);
        $auth->addChild($cliente, $deleteFavartista);
        // give this role the CRD permissions for the Fav_album table
        $auth->addChild($cliente, $createFavalbum);
        $auth->addChild($cliente, $readFavalbum);
        $auth->addChild($cliente, $deleteFavalbum);
        // give this role the CRD permissions for the Fav_musica table
        $auth->addChild($cliente, $createFavmusica);
        $auth->addChild($cliente, $readFavmusica);
        $auth->addChild($cliente, $deleteFavmusica);

        $auth->addChild($admin,$mod);

        $auth->assign($admin, 1);

    }


    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
