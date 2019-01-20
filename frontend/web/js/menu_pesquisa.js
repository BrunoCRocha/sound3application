function alterarTab(tipo){

}
switch (tipo) {
    case 'everything':
        document.getElementsByClassName('menu_pesquisa').style("background-color","background-color: none")
        document.getElementById('opc1').style("background-color","background-color: #DF2E28;")
        break;
    case 'artista':
        document.getElementsByClassName('menu_pesquisa').style("background-color","background-color: none")
        document.getElementById('opc5').style("background-color","background-color: #DF2E28;")
        break;
    case 'genero':
        document.getElementsByClassName('menu_pesquisa').style("background-color","background-color: none")
        document.getElementById('opc4').style("background-color","background-color: #DF2E28;")
        break;
    case 'musica':
        document.getElementsByClassName('menu_pesquisa').style("background-color","background-color: none")
        document.getElementById('opc2').style("background-color","background-color: #DF2E28;")
        break;
    case 'album':
        document.getElementsByClassName('menu_pesquisa').style("background-color","background-color: none")
        document.getElementById('opc3').style("background-color","background-color: #DF2E28;")
        break;
}