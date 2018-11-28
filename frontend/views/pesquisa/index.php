<?php

use yii\helpers\Html;

?>



<div class="row">

    <span>
        <h2>Resultado da pesquisa "<?= $search?>"</h2>
    </span>

    <div class="col-sm-4" id="menu_opcoes">

        <div>
            <?= Html::a('Músicas', ['index', 'search' => $search], ['class' => 'cool-link']) ?>
            <?= Html::a('Álbuns', ['albuns', 'search' => $search], ['class' => 'cool-link']) ?>
            <?= Html::a('Género', ['genero', 'search' => $search], ['class' => 'cool-link']) ?>
            <?= Html::a('Artista', ['artista', 'search' => $search], ['class' => 'cool-link']) ?>


            <!--<button class="cool-link"><img src="../web/menu_icons/search_black.svg">Resultados</button>
            <button class="cool-link"><img src="../web/menu_icons/music-player_black.svg">Músicas</button>
            <button class="cool-link"><img src="../web/menu_icons/compact-disc_black.svg">Álbuns</button>
            <button class="cool-link"><img src="../web/menu_icons/hand_black.svg">Género</button>
            <button class="cool-link"><img src="../web/menu_icons/microphone_black.svg">Artistas</button>-->
        </div>

    </div>

    <div class="col-sm-8" id="lista">

        <ul>
            <li>

            </li>
        </ul>
    </div>

</div>

