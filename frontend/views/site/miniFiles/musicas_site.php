<?php



?>

<div class="row">
    <div class="col-sm-4" id="menu_opcoes">

        <div>
            <button class="cool-link"><img src="../web/menu_icons/search_black.svg">Resultados</button>
            <button class="cool-link"><img src="../web/menu_icons/music-player_black.svg">Músicas</button>
            <button class="cool-link"><img src="../web/menu_icons/compact-disc_black.svg">Álbuns</button>
            <button class="cool-link"><img src="../web/menu_icons/hand_black.svg">Género</button>
            <button class="cool-link"><img src="../web/menu_icons/microphone_black.svg">Artistas</button>
        </div>

    </div>

    <div class="col-sm-8" id="lista">

        <ul>
            <li>
                <div id="artista">
                    <div id="artista_imagem">
                        <a href=""><img src="../web/imagens/eminem.jpg"></a>
                    </div>
                    <div id="artista_body">
                        <a href=""><h3>Eminem</h3></a>
                        <a href=""><h5>5 Álbuns</h5></a>
                        <div id="imagem_favoritos">
                            <button></button>
                            <span class="tooltiptext">Seguir</span>
                        </div>
                    </div>
                </div>
            </li>


            
            <li>
                <div id="album">
                    <div id="imagem_album">
                        <a href=""><img src="../web/imagens/kamikaze.jpg"></a>
                    </div>
                    <div id="album_body">
                        <a href=""><h3>Kamikaze - Eminem</h3></a>
                        <a href=""><h5>13 Tracks</h5></a>
                        <h5>5 Comentários</h5>
                        <div id="imagem_favoritos">
                            <button></button>
                            <span class="tooltiptext">Seguir</span>
                        </div>
                    </div>
                </div>
            </li>



            <li>
                <div class="musica" id="objeto_musica">
                    <div class="ole" id="imagem_musica">
                        <img src="../web/imagens/kamikaze.jpg">
                    </div>
                    <div id="media_body">
                        <h4 class="media-heading">Venom - Eminem</h4>
                        <p><h5>Kamikaze</h5></p>
                        <div id="butoes_menu">
                            <p>
                                <button class="butao_opcoes">Add Favoritos</button>
                                <button class="butao_opcoes">Add Carrinho</button>
                            </p>
                        </div>
                    </div>
                    <div id="musica_tempo">
                        <h5>00:00</h5>
                    </div>
                    <div id="media_buttons">
                        <div>
                            <button class="media_button" id="butao_play"></button>
                        </div>
                    </div>
                </div>
            </li>

            <hr width="600px" align="left">




        </ul>
    </div>

</div>
