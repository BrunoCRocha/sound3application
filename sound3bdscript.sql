-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 22-Jan-2019 às 20:56
-- Versão do servidor: 5.7.23
-- versão do PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sound3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `ano` int(5) DEFAULT NULL,
  `preco` float NOT NULL,
  `id_artista` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `caminhoImagem` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_artista` (`id_artista`),
  KEY `id_genero` (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `album`
--

INSERT INTO `album` (`id`, `nome`, `ano`, `preco`, `id_artista`, `id_genero`, `caminhoImagem`) VALUES
(1, 'Divide', 2011, 12, 1, 1, 'divide.png'),
(2, 'X', 2014, 12, 1, 1, 'x.jpg'),
(3, '1989', 2017, 12, 2, 1, '1989.png'),
(4, 'Reputation', 2017, 12, 2, 1, 'reputation.png'),
(5, 'Meteora', 2003, 12, 3, 2, 'meteora.jpg'),
(6, 'Hybrid Theory', 1999, 12, 3, 2, 'hybridTheory.jpg'),
(7, 'AClara', 2017, 11, 15, 3, 'aClara.png'),
(8, 'A Beautiful Lie', 2005, 11, 7, 2, 'aBeautifulLie.jpg'),
(9, 'America', 2018, 11, 7, 2, 'america.jpg'),
(10, 'Avici', 2017, 11, 25, 5, 'avici.png'),
(11, 'Confrontation', 1983, 11, 23, 6, 'confrontation.jpg'),
(12, '5', 2015, 11, 1, 1, '5.jpg'),
(13, 'American Idiot', 2004, 11, 8, 2, 'AmericaIdiot.jpg'),
(14, 'Evolve', 2017, 11, 10, 2, 'evolve.png'),
(15, 'Origins', 2018, 11, 10, 2, 'origins.jpg'),
(17, 'Master of Puppets', 1986, 11, 9, 2, 'MasterofPuppets.jpg'),
(18, 'Bad', 1987, 11, 6, 1, 'bad.jpg'),
(20, 'Para e Pensa', 2015, 11, 15, 3, 'paraepensa.png'),
(21, 'Augusth 26th', 2016, 11, 11, 3, 'august26th.jpg'),
(23, 'Beauty Behind The Madness', 2015, 11, 13, 3, 'beautyBehindTheMadness.jpg'),
(24, 'Filhos do Rossi', 2017, 11, 18, 3, 'filhosdoRossi.jpg'),
(25, 'IV', 2018, 11, 18, 3, 'IV.png'),
(26, 'Bang', 2015, 12, 28, 1, 'bang.png'),
(27, 'Luísa Sonza - EP', 2017, 12, 33, 7, 'ep.jpg'),
(28, 'Amor é Cego', 2016, 12, 31, 8, 'amoreCego.jpg'),
(29, 'Sweetener', 2018, 12, 5, 1, 'sweetener.jpg'),
(30, 'Love YourSelf: Tear', 2018, 12, 20, 4, 'loveYourself.jpg'),
(31, 'Invasion of Privacy', 2018, 12, 14, 1, 'invasionOfPrivacy.png'),
(32, 'Ligação', 2018, 12, 17, 3, 'ligacao.jpg'),
(33, 'Joytime II', 2018, 12, 4, 5, 'joytime2.png'),
(34, 'Yes or Yes', 2018, 12, 19, 4, 'yesoryes.jpg'),
(35, 'Augusta', 2018, 12, 30, 8, 'augusta.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `artista`
--

DROP TABLE IF EXISTS `artista`;
CREATE TABLE IF NOT EXISTS `artista` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `nacionalidade` varchar(25) DEFAULT NULL,
  `ano` int(5) DEFAULT NULL,
  `caminhoImagem` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `artista`
--

INSERT INTO `artista` (`id`, `nome`, `nacionalidade`, `ano`, `caminhoImagem`) VALUES
(1, 'Ed Sheeran', 'Britânico', 2005, 'edSheeran.jpg'),
(2, 'Taylor Switf', 'Norte-Americana', 2006, 'taylorSwitf.jpg'),
(3, 'Linkin Park', 'Americana', 1996, 'linkinPark.jpg'),
(4, 'Marshmello', 'Americano', 2015, 'marshmello.jpg'),
(5, 'Ariana Grande', 'Americana', 2008, 'arianaGrande.jpg'),
(6, 'Michael Jackson', 'Americano', 1964, 'michaelJackson.jpg'),
(7, 'Thirty Seconds to Mars', 'Americana', 1998, 'thirtySecondsToMars.jpg'),
(8, 'Green Day', 'Americana', 1986, 'greenDay.jpg'),
(9, 'Metallica', 'Americana', 1981, 'metallica.jpg'),
(10, 'Imagine Dragons', 'Americana', 2008, 'imagineDragons.jpg'),
(11, 'Post Malone', 'Americana', 2015, 'postMalone.jpg'),
(13, 'The Weenknd', 'Canadense', 2010, 'theWeeknd.jpg'),
(14, 'Cardi B', 'Americana', 2015, 'cardiB.jpg'),
(15, 'Piruka', 'Portuguesa', 2013, 'piruka.jpg'),
(17, 'Kappa Jotta', 'Portuguesa', 2004, 'kappaJotta.jpg'),
(18, 'Wet Bed Gang', 'Portuguesa', 2014, 'wbg.jpg'),
(19, 'Twice', 'Coreana', 2015, 'twice.jpg'),
(20, 'BTS', 'Coreana', 2013, 'bts.jpg'),
(23, 'Bob Marley', 'Jamaicana', 1962, 'bobMarley.jpg'),
(24, 'Martin Garrix', 'Holandesa', 2012, 'martinGarrix.jpg'),
(25, 'Avicii', 'Sueca', 2006, 'avicii.jpg'),
(28, 'Anitta', 'Brasileira', 2010, 'anitta.png'),
(30, 'Matias Damásio', 'Portuguesa', 2000, 'matiasDamasio.jpg'),
(31, 'Anselmo Ralph', 'Portuguesa', 1995, 'anselmoRalph.jpg'),
(33, 'Luísa Sonza', 'Brasileira', 2017, 'luisaSonza.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', NULL),
('cliente', '17', 1548178049),
('Moderador', '16', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1543249740, 1543249740),
('cliente', 1, NULL, NULL, NULL, 1543249740, 1543249740),
('createAlbum', 2, 'Criar Album', NULL, NULL, 1543249739, 1543249739),
('createArtista', 2, 'Criar Artista', NULL, NULL, 1543249739, 1543249739),
('createComentario', 2, 'Criar Comentário', NULL, NULL, 1543249739, 1543249739),
('createCompra', 2, 'Criar Compra', NULL, NULL, 1543249739, 1543249739),
('createFavalbum', 2, 'Criar Favalbum', NULL, NULL, 1543249739, 1543249739),
('createFavartista', 2, 'Criar Favartista', NULL, NULL, 1543249739, 1543249739),
('createFavgenero', 2, 'Criar Favgenero', NULL, NULL, 1543249739, 1543249739),
('createFavmusica', 2, 'Criar Favmusica', NULL, NULL, 1543249739, 1543249739),
('createGenero', 2, 'Criar Genero', NULL, NULL, 1543249739, 1543249739),
('createMusica', 2, 'Criar Musica', NULL, NULL, 1543249739, 1543249739),
('createUtilizador', 2, 'Criar Utilizador', NULL, NULL, 1543249739, 1543249739),
('deleteAlbum', 2, 'Apagar dados de Álbuns', NULL, NULL, 1543249739, 1543249739),
('deleteArtista', 2, 'Apagar dados de Artistas', NULL, NULL, 1543249739, 1543249739),
('deleteComentario', 2, 'Apagar dados de Comentario', NULL, NULL, 1543249739, 1543249739),
('deleteCompra', 2, 'Apagar dados de Compra', NULL, NULL, 1543249739, 1543249739),
('deleteFavalbum', 2, 'Apagar dados de Favalbum', NULL, NULL, 1543249739, 1543249739),
('deleteFavartista', 2, 'Apagar dados de Favartista', NULL, NULL, 1543249739, 1543249739),
('deleteFavgenero', 2, 'Apagar dados de Favgenero', NULL, NULL, 1543249739, 1543249739),
('deleteFavmusica', 2, 'Apagar dados de Favmusica', NULL, NULL, 1543249739, 1543249739),
('deleteGenero', 2, 'Apagar dados de Géneros', NULL, NULL, 1543249739, 1543249739),
('deleteMusica', 2, 'Apagar dados de Musica', NULL, NULL, 1543249739, 1543249739),
('deleteUtilizador', 2, 'Apagar dados de Utilizadores', NULL, NULL, 1543249739, 1543249739),
('Moderador', 1, NULL, NULL, NULL, 1543249739, 1543249739),
('readAlbum', 2, 'Ler dados de Álbuns', NULL, NULL, 1543249739, 1543249739),
('readArtista', 2, 'Ler dados de Artistas', NULL, NULL, 1543249739, 1543249739),
('readComentario', 2, 'Ler dados de Comentarios', NULL, NULL, 1543249739, 1543249739),
('readCompra', 2, 'Ler dados de Compras', NULL, NULL, 1543249739, 1543249739),
('readFavalbum', 2, 'Ler dados de Favalbum', NULL, NULL, 1543249739, 1543249739),
('readFavartista', 2, 'Ler dados de Favartista', NULL, NULL, 1543249739, 1543249739),
('readFavgenero', 2, 'Ler dados de Favgenero', NULL, NULL, 1543249739, 1543249739),
('readFavmusica', 2, 'Ler dados de Favmusica', NULL, NULL, 1543249739, 1543249739),
('readGenero', 2, 'Ler dados de Géneros', NULL, NULL, 1543249739, 1543249739),
('readMusica', 2, 'Ler dados de Musicas', NULL, NULL, 1543249739, 1543249739),
('readUtilizador', 2, 'Ler dados de Utilizadores', NULL, NULL, 1543249739, 1543249739),
('updateAlbum', 2, 'Atualizar dados de Album', NULL, NULL, 1543249739, 1543249739),
('updateArtista', 2, 'Atualizar dados de Artista', NULL, NULL, 1543249739, 1543249739),
('updateComentario', 2, 'Atualizar dados de Música', NULL, NULL, 1543249739, 1543249739),
('updateGenero', 2, 'Atualizar dados de Genero', NULL, NULL, 1543249739, 1543249739),
('updateMusica', 2, 'Atualizar dados de Musica', NULL, NULL, 1543249739, 1543249739),
('updateUtilizador', 2, 'Atualizar dados de Utilizador', NULL, NULL, 1543249739, 1543249739);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Moderador', 'createAlbum'),
('Moderador', 'createArtista'),
('cliente', 'createComentario'),
('Moderador', 'createComentario'),
('cliente', 'createCompra'),
('Moderador', 'createCompra'),
('cliente', 'createFavalbum'),
('cliente', 'createFavartista'),
('cliente', 'createFavgenero'),
('cliente', 'createFavmusica'),
('Moderador', 'createGenero'),
('Moderador', 'createMusica'),
('Moderador', 'createUtilizador'),
('Moderador', 'deleteAlbum'),
('Moderador', 'deleteArtista'),
('cliente', 'deleteComentario'),
('Moderador', 'deleteComentario'),
('admin', 'deleteCompra'),
('cliente', 'deleteFavalbum'),
('Moderador', 'deleteFavalbum'),
('cliente', 'deleteFavartista'),
('Moderador', 'deleteFavartista'),
('Moderador', 'deleteFavgenero'),
('cliente', 'deleteFavmusica'),
('Moderador', 'deleteFavmusica'),
('cliente', 'deleteGenero'),
('Moderador', 'deleteGenero'),
('Moderador', 'deleteMusica'),
('Moderador', 'deleteUtilizador'),
('admin', 'Moderador'),
('Moderador', 'readAlbum'),
('Moderador', 'readArtista'),
('cliente', 'readComentario'),
('Moderador', 'readComentario'),
('cliente', 'readCompra'),
('Moderador', 'readCompra'),
('cliente', 'readFavalbum'),
('Moderador', 'readFavalbum'),
('cliente', 'readFavartista'),
('Moderador', 'readFavartista'),
('cliente', 'readFavgenero'),
('Moderador', 'readFavgenero'),
('cliente', 'readFavmusica'),
('Moderador', 'readFavmusica'),
('Moderador', 'readGenero'),
('Moderador', 'readMusica'),
('Moderador', 'readUtilizador'),
('Moderador', 'updateAlbum'),
('Moderador', 'updateArtista'),
('cliente', 'updateComentario'),
('Moderador', 'updateGenero'),
('Moderador', 'updateMusica'),
('Moderador', 'updateUtilizador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `conteudo` varchar(250) NOT NULL,
  `data_criacao` date NOT NULL,
  `id_utilizador` int(10) NOT NULL,
  `id_album` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilizador` (`id_utilizador`),
  KEY `id_album` (`id_album`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `data_compra` date DEFAULT NULL,
  `valor_total` float DEFAULT NULL,
  `efetivada` tinyint(1) DEFAULT NULL,
  `id_utilizador` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilizador` (`id_utilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `data_compra`, `valor_total`, `efetivada`, `id_utilizador`) VALUES
(1, NULL, NULL, 0, 1),
(2, NULL, NULL, 0, 2),
(3, NULL, NULL, 0, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fav_album`
--

DROP TABLE IF EXISTS `fav_album`;
CREATE TABLE IF NOT EXISTS `fav_album` (
  `id_utilizador` int(10) NOT NULL,
  `id_album` int(10) NOT NULL,
  PRIMARY KEY (`id_utilizador`,`id_album`),
  KEY `id_album` (`id_album`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fav_artista`
--

DROP TABLE IF EXISTS `fav_artista`;
CREATE TABLE IF NOT EXISTS `fav_artista` (
  `id_utilizador` int(10) NOT NULL,
  `id_artista` int(10) NOT NULL,
  PRIMARY KEY (`id_utilizador`,`id_artista`),
  KEY `id_artista` (`id_artista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fav_genero`
--

DROP TABLE IF EXISTS `fav_genero`;
CREATE TABLE IF NOT EXISTS `fav_genero` (
  `id_utilizador` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  PRIMARY KEY (`id_utilizador`,`id_genero`),
  KEY `id_genero` (`id_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fav_musica`
--

DROP TABLE IF EXISTS `fav_musica`;
CREATE TABLE IF NOT EXISTS `fav_musica` (
  `id_utilizador` int(10) NOT NULL,
  `id_musica` int(10) NOT NULL,
  PRIMARY KEY (`id_utilizador`,`id_musica`),
  KEY `id_musica` (`id_musica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `caminhoImagem` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id`, `nome`, `descricao`, `caminhoImagem`) VALUES
(1, 'Pop', 'Pop é um género da música popular que se originou durante a década de 1950 nos Estados Unidos e Reino Unido.Geralmente é visto como sinônimo de \"música popular\"', 'pop.jpg'),
(2, 'Rock', 'Rock é um termo abrangente que define um género musical de música popular que se desenvolveu durante e após a década de 1950. Suas raízes se encontram no \'rock and roll\' e no \'rockabilly\' que emergiram e se definiram nos Estados Unidos.', 'rock.jpg'),
(3, 'Hip-Hop', 'Hip-Hop é um género musical, com uma subcultura iniciada durante a década de 1970, nas áreas centrais de comunidades jamaicanas, latinas e afro-americanas da cidade de Nova Iorque.', 'hiphop.jpg'),
(4, 'K-Pop', 'K-Pop é um género musical originado na Coreia do Sul, que se caracteriza por uma grande variedade de elementos audiovisuais. ', 'kpop.jpg'),
(5, 'Eletronic', 'Eletronic ou EDM é um género de música conhecido pela ampla gama de percussão música eletrónica.  Produzido por disc jockeys que criam seleções perfeitas.de faixas', 'eletronic.jpg'),
(6, 'Reggae', 'Reggae é um género musical desenvolvido originalmente na Jamaica do fim da década de 1960.O reggae baseia se num estilo rítmico caracterizado pela acentuação no tempo fraco.', 'reggae.jpg'),
(7, 'Funk Carioca', 'O funk carioca é um estilo musical oriundo das favelas do estado do Rio de Janeiro, no Brasil. Apesar do nome, é diferente do funk originário dos Estados Unidos. Este está ligado ao público mais jovem.', 'funk.jpg'),
(8, 'Kizomba', 'Kizomba é um género musical e um estilo de dança originários de Angola, erradamente confundido com o zouk, devido ao ritmo ser muito semelhante.', 'kizomba.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_compra`
--

DROP TABLE IF EXISTS `linha_compra`;
CREATE TABLE IF NOT EXISTS `linha_compra` (
  `id_compra` int(10) NOT NULL,
  `id_musica` int(10) NOT NULL,
  PRIMARY KEY (`id_compra`,`id_musica`),
  KEY `id_musica` (`id_musica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1542118944),
('m130524_201442_init', 1542120251),
('m140506_102106_rbac_init', 1542120284),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1542120284),
('m181022_080238_init_rbac', 1543249740);

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica`
--

DROP TABLE IF EXISTS `musica`;
CREATE TABLE IF NOT EXISTS `musica` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `duracao` varchar(6) NOT NULL,
  `preco` float NOT NULL,
  `id_album` int(10) NOT NULL,
  `posicao` int(10) DEFAULT NULL,
  `caminhoMP3` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_album` (`id_album`)
) ENGINE=InnoDB AUTO_INCREMENT=383 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `musica`
--

INSERT INTO `musica` (`id`, `nome`, `duracao`, `preco`, `id_album`, `posicao`, `caminhoMP3`) VALUES
(1, 'Shape of You', '3.53', 1.25, 1, 4, '4.shape-of-you.mp3'),
(2, 'Eraser', '3.47', 1.25, 1, 1, '1.eraser.mp3'),
(3, 'Photograph', '4.17', 1.25, 2, 6, '06.photograph.mp3'),
(4, 'Afire Love', '4.58', 1.25, 2, 12, '12.AfireLove.mp3'),
(15, 'Clara', '03.04', 1.25, 7, 1, '01.Clara.mp3'),
(16, 'Queres Falar do Quê', '03.29', 1.25, 7, 2, '02.QueresFalardoQue.mp3'),
(17, 'A Minha Pergunta', '02.59', 1.25, 7, 3, '03.AMinhaPergunta.mp3'),
(18, 'Ca Bu Fla Ma NAu', '05.42', 1.25, 7, 4, '04.CaBuFlaMaNau.mp3'),
(19, 'Não se passa Nada ', '02.34', 1.25, 7, 5, '5.NaoSePassaNada.mp3'),
(20, 'Acapella1', '00.49', 1.25, 7, 6, '06.Acapella1.mp3'),
(21, 'Família', '03.36', 1.25, 7, 7, '07.Familia.mp3'),
(22, 'Se Eu Não Acordar Amanha', '03.36', 1.25, 7, 8, '08.SeEuNaoAcordarAmanha.mp3'),
(23, 'Não Queiras Tentar', '03.34', 1.25, 7, 9, '09.NaoQueirasTentar.mp3'),
(24, 'SIrenes', '04.12', 1.25, 7, 10, '10.Sirenes.mp3'),
(25, 'Acapella2', '01.01', 1.25, 7, 11, '11.acapella2.mp3'),
(26, 'Castle On The Hills', '03.50', 1.25, 1, 2, '2.castle-on-the-hill-mp3'),
(27, 'Dive', '03.52', 1.25, 1, 3, '3.dive.mp3'),
(28, 'Perfect', '04.28', 1.25, 1, 5, '5.perfect.mp3'),
(29, 'Galway Girl', '02.52', 1.25, 1, 6, '6.galway-girl.mp3'),
(30, 'Happier', '03.21', 1.25, 1, 7, '7.happier.mp3'),
(31, 'New Man', '03.09', 1.25, 1, 8, '8.new-man.mp3'),
(32, 'Hearts Don\'t Break Round Here', '04.08', 1.25, 1, 9, '9.hearts-dont-break-round-here.mp3'),
(33, 'What do I Know', '03.57', 1.25, 1, 10, '10.what-do-i-know.mp3'),
(34, 'How Would you feel Paean', '04.40', 1.25, 1, 11, '11.how-would-you-feel-paean.mp3'),
(35, 'Supermarket Flowers', '03.41', 1.25, 1, 12, '12.supermarket-flowers.mp3'),
(36, 'Barcelona', '03.06', 1.25, 1, 13, '13.barcelona.mp3'),
(37, 'Biblia Be Ye Ye', '02.56', 1.25, 1, 14, '14.bibia-be-ye-ye.mp3'),
(38, 'Nancy Mulligan', '02.59', 1.25, 1, 15, '15.nancy-mulligan.mp3'),
(39, 'Save Myself', '04.07', 1.25, 1, 16, '16.save-myself.mp3'),
(40, 'One', '03.57', 1.25, 2, 1, '01.One.mp3'),
(41, 'I\'m a Mess', '04.04', 1.25, 2, 2, '02.I\'mAMess.mp3'),
(42, 'Sing', '03.55', 1.25, 2, 3, '03.Sing.mp3'),
(43, 'Don\'t', '03.36', 1.25, 2, 4, '04.Dont.mp3'),
(44, 'Nina', '28.55', 1.25, 2, 5, '05.nina.mp3'),
(45, 'Bloodstream', '05.14', 1.25, 2, 7, '07.Bloodstream.mp3'),
(46, 'Tenerife Sea', '05.58', 1.25, 2, 8, '08.TenerifeSea.mp3'),
(47, 'Runaway', '26.35', 1.25, 2, 9, '09.Runaway.mp3'),
(48, 'The Man', '06.40', 1.25, 2, 10, '10.TheMan.mp3'),
(49, 'Thinking Out Loud', '36.58', 1.25, 2, 11, '11.ThinkingOutLoud.mp3'),
(50, 'The a Team', '07.55', 1.25, 12, 1, '01TheATeam.mp3'),
(51, 'Drunk', '04.55', 1.25, 12, 2, '02.Drunk.mp3'),
(52, 'U.N.I', '04.51', 1.25, 12, 3, '03.UNI.mp3'),
(53, 'Grade 8', '07.55', 1.25, 12, 4, '04.Grade8.mp3'),
(54, 'Wake Me Up', '09.23', 1.25, 12, 5, '05.WakeMeUp.mp3'),
(55, 'Small Bump', '21.44', 1.25, 12, 6, '06.SmallBump.mp3'),
(56, 'This', '05.10', 1.25, 12, 7, '07.This.mp3'),
(57, 'The City', '07.45', 1.25, 12, 8, '08.TheCity.mp3'),
(58, 'Lego House', '04.51', 1.25, 12, 9, '09.LegoHouse.mp3'),
(59, 'You Need Me, I Don\'t Need You', '29.34', 1.25, 12, 10, '10.YouNeedMeIDontNeedYou.mp3'),
(60, 'Kiss Me', '04.13', 1.25, 12, 11, '11.KissMe.mp3'),
(61, 'Give Me Love ', '04.23', 1.25, 12, 12, '12.GiveMeLove.mp3'),
(62, 'Autumn Leaves', '14.27', 1.25, 12, 13, '13.AutumnLeaves.mp3'),
(63, 'Attack', '03.12', 1.25, 8, 1, '01.Attack.mp3'),
(64, 'A Beautiful Lie', '04.08', 1.25, 8, 2, '02.ABeautifulLie.mp3'),
(65, 'The Kill', '03.54', 1.25, 8, 3, '03.The Kill.mp3'),
(66, 'Was It a Dream', '04.19', 1.25, 8, 4, '04.WasItADream.mp3'),
(67, 'The Fantasy', '04.32', 1.25, 8, 5, '05.TheFantasy.mp3'),
(68, 'Savior', '03.27', 1.25, 8, 6, '06.Savior.mp3'),
(69, 'From Yesterday', '04.11', 1.25, 8, 7, '07.From Yesterday.mp3'),
(70, 'The Story', '03.58', 1.25, 8, 8, '08.The Story.mp3'),
(71, 'R-Evolve', '04.02', 1.25, 8, 9, '09.R-Evolve.mp3'),
(72, 'Modern Myth', '04.52', 1.25, 8, 10, '10AModern Myth.mp3'),
(73, 'Battle Of One', '02.50', 1.25, 8, 11, '11.BattleOfOne.mp3'),
(74, 'Hunter', '03.58', 1.25, 8, 12, '12.Hunter.mp3'),
(75, 'Walk on Water', '03.05', 1.25, 9, 1, '01.WalkOnWater.mp3'),
(76, 'Dangerous Night', '03.09', 1.25, 9, 2, '02.DangerousNight.mp3'),
(77, 'Rescue Me', '03.38', 1.25, 9, 3, '03.RescueMe.mp3'),
(78, 'One Track Mind', '04.20', 1.25, 9, 4, '04.OneTrackMind.mp3'),
(79, 'Monolith', '01.38', 1.25, 9, 5, '05.Monolith.mp3'),
(80, 'Love Is Madness', '03.54', 1.25, 9, 6, '06.LoveIsMadness.mp3'),
(81, 'Graet Wide Open', '04.49', 1.25, 9, 7, '07.GreatWideOpen.mp3'),
(82, 'Hail To The Victor', '03.22', 1.25, 9, 8, '08.HailToTheVictor.mp3'),
(83, 'Dawn Will Rise', '03.57', 1.25, 9, 9, '09.DawnWillRise.mp3'),
(84, 'Remedy', '03.17', 1.25, 9, 10, '10.Remedy.mp3'),
(85, 'Live Like a Dream', '04.06', 1.25, 9, 11, '11.LiveLikeADream.mp3'),
(86, 'Rider', '02.58', 1.25, 9, 12, '12.Rider.mp3'),
(87, 'Friend Of Mine', '25.31', 1.25, 10, 1, '01.FriendOfMine.mp3'),
(88, 'Lonely Together', '24.48', 1.25, 10, 2, '02.LonelyTogether.mp3'),
(89, 'You Be Love', '27.26', 1.25, 10, 3, '03.YouBeLove.mp3'),
(90, 'Without You', '24.56', 1.25, 10, 4, '04.WithoutYou.mp3'),
(91, 'What Would I Change It To', '25.06', 1.25, 10, 5, '05.WhatWouldIChangeItTo.mp3'),
(92, 'So Much Better ', '20.44', 6, 10, 6, '06.SoMuchBetter.mp3'),
(93, 'Chant Down Babylon', '02.12', 1.25, 11, 1, '01.ChantDownBabylon.mp3'),
(94, 'Buffalo Soldier', '05.30', 1.25, 11, 2, '02.BuffaloSoldier.mp3'),
(95, 'Jump Nyabingi', '15.23', 1.25, 11, 3, '03.JumpNyabingi.mp3'),
(96, 'Give Thanks ', '23.51', 1.25, 11, 5, '05.GiveThanks.mp3'),
(97, 'Blackman Redemption', '07.23', 1.25, 11, 6, '06.BlackmanRedemption.mp3'),
(98, 'Trench Town', '14.29', 1.25, 11, 7, '07.TrenchTown.mp3'),
(99, 'Stiff Neckend Fools ', '06.17', 1.25, 11, 8, '08.StiffNeckendFools.mp3'),
(100, 'I Know', '03.25', 1.25, 11, 9, '09.IKnow.mp3'),
(102, 'American Idiot', '03.00', 1.25, 13, 1, '01.American Idiot.mp3'),
(103, 'Jesus Of Suburdia', '09.14', 1.25, 13, 2, '02.JesusOfSuburbia.mp3'),
(104, 'Holiday', '03.58', 1.25, 13, 3, '03.Holiday.mp3'),
(105, 'Boulevard Of Broken Dreams', '04.27', 1.25, 13, 4, '04.BoulevardOfBrokenDreams.mp3'),
(106, 'Are We The Waiting ', '02.49', 1.25, 13, 5, '05.AreWeTheWaiting.mp3'),
(107, 'St. Jimmy', '03.01', 1.25, 13, 6, '06.StJimmy.mp3'),
(108, 'Give Me Novoaine', '03.32', 1.25, 13, 7, '07.GiveMeNovoaine.mp3'),
(109, 'Shes a Rebel', '02.06', 1.25, 13, 8, '08.ShesARebel.mp3'),
(110, 'Extraordinary Girl ', '03.40', 1.25, 13, 9, '09.ExtraordinaryGirl.mp3'),
(111, 'Letterbomb', '04.12', 1.25, 13, 10, '10.Letterbomb.mp3'),
(112, 'Wake Me Up When September Ends', '04.51', 1.25, 13, 11, '11.WakeMeUpWhenSeptemberEnds.mp3'),
(113, 'Home Coming ', '09.24', 1.25, 13, 12, '12.Homecoming.mp3'),
(114, 'Whatsername', '04.18', 1.25, 13, 13, '13.Whatsername.mp3'),
(115, ' I Don\'t Know Why ', '03.10', 1.25, 14, 1, '01.I Don\'tKnowWhy.mp3'),
(116, 'Whatever It Takes', '03.21', 1.25, 14, 2, '02.WhateverItTakes.mp3'),
(117, 'Believer', '03.24', 1.25, 14, 3, '03.Believer.mp3'),
(118, 'Walking The Wire', '03.52', 1.25, 14, 4, '04.WalkingTheWire.mp3'),
(119, 'Rise Up', '03.51', 1.25, 14, 5, '05.RiseUp.mp3'),
(120, 'I\'ll Make It Up To You ', '04.22', 1.25, 14, 6, '06.I\'llMakeItUpToYou.mp3'),
(121, 'Yesterday', '03.25', 1.25, 14, 7, '07.Yesterday.mp3'),
(122, 'Mouth Of The River', '03.41', 1.25, 14, 8, '08.MouthOfTheRiver.mp3'),
(123, 'Thunder', '03.07', 1.25, 14, 9, '09.Thunder.mp3'),
(124, 'Start Over', '03.06', 1.25, 14, 10, '10.StartOver.mp3'),
(125, 'Dancing In The Dark', '03.55', 1.25, 14, 11, '11.DancingInTheDark.mp3'),
(126, 'Levitate', '03.18', 1.25, 14, 12, '12.Levitate.mp3'),
(127, 'Not Today', '04.20', 1.25, 14, 13, '13.NotToday.mp3'),
(128, 'Believer', '03.10', 1.25, 14, 14, '14.Believer.mp3'),
(129, 'Natural', '03.09', 1.25, 15, 1, '01.Natural.mp3'),
(130, 'Boomerang', '03.07', 1.25, 15, 2, '02.Boomerang.mp3'),
(131, 'Machine', '03.01', 1.25, 15, 3, '03.Machine.mp3'),
(132, 'Cool Out', '03.37', 1.25, 15, 4, '04.CoolOut.mp3'),
(133, 'Bad Liar', '04.20', 1.25, 15, 5, '05.BadLiar.mp3'),
(134, 'West Coast', '04.20', 1.25, 15, 6, '06.WestCoast.mp3'),
(135, 'Zero', '03.30', 1.25, 15, 7, '07.Zero.mp3'),
(136, 'Bulletina Gun', '03.24', 1.25, 15, 8, '08.BulletinaGun.mp3'),
(137, 'Digital', '03.21', 1.25, 15, 9, '09.Digital.mp3'),
(138, 'Only', '03.00', 1.25, 15, 10, '10.Only.mp3'),
(139, 'Stuck', '03.10', 1.25, 15, 11, '11.Stuck.mp3'),
(140, 'Love', '02.46', 1.25, 15, 12, '12.Love.mp3'),
(141, 'Birds', '03.39', 1.25, 15, 13, '13.Birds.mp3'),
(142, 'Burn Out', '04.33', 1.25, 15, 14, '14.BurnOut.mp3'),
(143, 'Real Life', '04.07', 1.25, 15, 15, '15.Real Life.mp3'),
(144, 'Born To Be Yours', '03.13', 1.25, 15, 16, '16.BornToBeYours.mp3'),
(145, 'Papercut', '03.13', 1.25, 6, 1, '01.Papercut.mp3'),
(147, 'One Step Closer ', '02.44', 1.25, 6, 2, '02.OneStepCloser.mp3'),
(148, 'With You ', '03.31', 1.25, 6, 3, '03.WithYou.mp3'),
(149, 'Points Of Authority', '03.28', 1.25, 6, 4, '04.PointsOfAuthority.mp3'),
(150, 'Crawling', '03.37', 1.25, 6, 5, '05.Crawling.mp3'),
(151, 'Runaway', '03.12', 1.25, 6, 6, '06.Runaway.mp3'),
(152, 'By Myself', '03.18', 1.25, 6, 7, '07.ByMyself.mp3'),
(153, 'In The End ', '03.44', 1.25, 6, 8, '08.InTheEnd.mp3'),
(154, 'A Place For My Head', '03.13', 1.25, 6, 9, '09.A PlaceForMyHead.mp3'),
(155, 'Forgotten', '03.22', 1.25, 6, 10, '10.Forgotten.mp3'),
(156, 'Cure For The Itch', '02.45', 1.25, 6, 11, '11.CureForTheItch.mp3'),
(157, 'Pushing Me Away', '03.19', 1.25, 6, 12, '12.PushingMeAway.mp3'),
(158, 'Foreword', '00.16', 1.25, 5, 1, '01.Foreword.mp3'),
(159, 'Don\'t Stay', '03.10', 1.25, 5, 2, '02.Don\'t Stay.mp3'),
(160, 'Somewhere I Belong', '03.36', 1.25, 5, 3, '03.SomewhereIBelong.mp3'),
(161, 'Lying From You', '02.47', 1.25, 5, 4, '04.LyingFromYou.mp3'),
(162, 'Hit The Floor', '02.47', 1.25, 5, 5, '05.HitTheFloor.mp3'),
(163, 'Easier To Run', '03.27', 1.25, 5, 6, '06.EasierToRun.mp3'),
(164, 'Faint', '02.45', 1.25, 5, 7, '07.Faint.mp3'),
(165, 'Figura 09', '03.20', 1.25, 5, 8, '08.Figure.09.mp3'),
(166, 'Breaking The Habit', '03.19', 1.25, 5, 9, '09.BreakingTheHabit.mp3'),
(167, 'From Te Inside', '02.58', 1.25, 5, 10, '10.FromTheInside.mp3'),
(168, 'Nobody\'s Listening', '03.01', 1.25, 5, 11, '11.Nobody\'sListening.mp3'),
(169, 'Session', '02.27', 1.25, 5, 12, '12.Session.mp3'),
(170, 'Numb', '03.10', 1.25, 5, 13, '13.Numb.mp3'),
(171, 'My December', '04.22', 1.25, 5, 14, '14.MyDecember.mp3'),
(172, 'Leave Out All The REs', '03.21', 1.25, 5, 15, '15.LeaveOutAllTheRes.mp3'),
(173, 'New Divide', '04.32', 1.25, 5, 16, '16.NewDivide.mp3'),
(174, 'Battery', '05.13', 1.25, 17, 1, '01.Battery.mp3'),
(175, 'Master Of Puppets', '08.34', 1.25, 17, 2, '02.MasterofPuppets.mp3'),
(176, 'The Thing That Should Not Be', '06.35', 1.25, 17, 3, '03.TheThingThatShouldNotBe.mp3'),
(177, 'Welcome Home', '06.28', 1.25, 17, 4, '04.WelcomeHome.mp3'),
(178, 'Disposable Heroes', '08.16', 1.25, 17, 5, '05.DisposableHeroes.mp3'),
(179, 'Leper Messiah', '05.40', 1.25, 17, 6, '06.LeperMessiah.mp3'),
(180, 'Orion', '08.26', 1.25, 17, 7, '07.Orion.mp3'),
(181, 'Damage', '05.33', 1.25, 17, 8, '08.Damage.mp3'),
(182, 'Bad', '04.30', 1.25, 18, 1, '01.Bad.mp3'),
(183, 'The Way You Make Me Feel', '06.22', 1.25, 18, 2, '02.TheWayYouMakeMeFeel.mp3'),
(184, 'Speed Demon', '05.41', 1.25, 18, 3, '03.SpeedDemon.mp3'),
(185, 'Liberian Girl', '04.35', 1.25, 18, 4, '04.LiberianGirl.mp3'),
(186, 'Just Good Friends', '04.26', 1.25, 18, 5, '05.JustGoodFriends.mp3'),
(187, 'Another Part Of Me', '04.29', 1.25, 18, 6, '06.AnotherPartOfMe.mp3'),
(188, 'Man In The Mirror', '42.25', 1.25, 18, 7, '07.ManInTheMirror.mp3'),
(189, 'I Just Can\'t Stop Loving You', '04.30', 1.25, 18, 8, '08.IJustCantStopLovingYou.mp3'),
(190, 'Dirty Diana', '42.34', 1.25, 18, 9, '09.DirtyDiana.mp3'),
(192, 'Smooth Criminal ', '04.40', 1.25, 18, 10, '10.SmoothCriminal.mp3'),
(193, 'Leave Me Alone', '40.05', 1.25, 18, 11, '11.LeaveMeAlone.mp3'),
(194, 'Por Isso', '04.21', 1.25, 7, 12, '12.PorIsso.mp3'),
(195, 'Meu Delize', '03.52', 1.25, 7, 13, '13.MeuDeslize.mp3'),
(196, 'AClara', '03.04', 1.25, 7, 14, '14.AClara.mp3'),
(197, 'Never Understand', '04.38', 1.25, 21, 1, '01.NeverUnderstand.mp3'),
(198, 'Money Made Me Do It', '04.25', 1.25, 21, 2, '02.MoneyMadeMeDoIt.mp3'),
(199, 'Git Wit U', '02.20', 1.25, 21, 3, '03.GitWitU.mp3'),
(200, 'God Man', '03.28', 1.25, 21, 4, '04.GodMan.mp3'),
(201, 'Fuck', '03.44', 1.25, 21, 5, '05.Fuck.mp3'),
(202, '40Funk', '05.24', 1.25, 21, 6, '06.40Funk.mp3'),
(203, 'Monte', '03.30', 1.25, 21, 7, '07.Monte.mp3'),
(204, 'Hollywood Dreams', '05.04', 1.25, 21, 8, '08.HollywoodDreams.mp3'),
(205, 'Lonely', '04.23', 1.25, 21, 9, '09.Lonely.mp3'),
(206, 'Oh God', '03.05', 1.25, 21, 10, '10.OhGod.mp3'),
(207, 'Welcome To New York', '02.38', 1.25, 3, 1, '1.welcome-to-new-york-lyrics.mp3'),
(208, 'Blank Space', '04.06', 1.25, 3, 2, '2.blank-space.mp3'),
(209, 'Style', '03.48', 1.25, 3, 3, '3.style-lyrics.mp3'),
(210, 'Out Of The Woods ', '03.22', 1.25, 3, 4, '4.out-of-the-woods-lyrics.mp3'),
(211, 'All You Had To Do Was Stay', '03.43', 1.25, 3, 5, '5.all-you-had-to-do-was-stay-lyrics-video-hd-cover.mp3'),
(212, 'Shake It Off', '03.47', 1.25, 3, 6, '6.shake-it-off.mp3'),
(213, 'I Wish You Would ', '03.34', 1.25, 3, 7, '7.i-wish-you-would-lyrics.mp3'),
(214, 'Bad Blood', '03.20', 1.25, 3, 8, '8.bad-blood.mp3'),
(215, 'Wildest Dream ', '03.23', 1.25, 3, 9, '9.wildest-dream-lyrics.mp3'),
(216, 'How You Get The Girl', '03.51', 1.25, 3, 10, '10.how-you-get-the-girl-lyrics.mp3'),
(217, 'This Love', '04.10', 1.25, 3, 11, '11.this-love-.mp3'),
(218, 'I Know Places ', '03.42', 1.25, 3, 12, '12.i-know-places-lyrics-video-cover.mp3'),
(219, 'Clean ', '03.25', 1.25, 3, 13, '13.clean-lyrics-video-hd-cover.mp3'),
(220, 'Real Life', '03.39', 1.25, 23, 1, '01.RealLife.mp3'),
(221, 'Losers', '04.16', 1.25, 23, 2, '02.Losers.mp3'),
(222, 'Tell Your Friends', '04.03', 1.25, 23, 3, '03.TellYourFriends.mp3'),
(223, 'Acquanited', '06.07', 1.25, 23, 6, '06.Acquainted.mp3'),
(224, 'Can\'t Feel My Face', '04.12', 1.25, 23, 7, '07.Can´tFeelMyFace.mp3'),
(225, 'Shameless', '19.52', 1.25, 23, 8, '08.Shameless.mp3'),
(226, 'Earned It', '05.17', 1.25, 23, 9, '09.EarnedIt.mp3'),
(227, 'In The Night', '10.21', 1.25, 23, 10, '10.InTheNight.mp3'),
(228, 'As You Are ', '08.57', 1.25, 23, 11, '11.AsYouAre.mp3'),
(229, 'Drak Times', '06.57', 1.25, 23, 12, '12.DrakTimes.mp3'),
(230, 'Prisioner', '06.39', 1.25, 23, 13, '13.Prisoner.mp3'),
(231, 'Angel', '04.25', 1.25, 23, 14, '14.Angel.mp3'),
(232, 'Intro', '02.14', 1.25, 24, 1, '01 - Intro.mp3'),
(233, 'Todos Olham', '03.55', 1.25, 24, 2, '02 - Todos Olham.mp3'),
(234, 'Essa Life é Good', '04.04', 1.25, 24, 3, '03 - Essa Life é Good.mp3'),
(235, 'Não Sinto', '05.09', 1.25, 24, 4, '04 - Não Sinto.mp3\r\n'),
(236, 'Kill\'em All', '04.14', 1.25, 24, 5, '05 - Kill\'em All.mp3'),
(237, 'Pagode', '03.36', 1.25, 24, 6, '06 - Pagode.mp3'),
(238, 'Não Tens Visto', '05.28', 1.25, 24, 7, '07 - Não Tens Visto.mp3'),
(239, 'Bang', '03.13', 1.25, 26, 1, '01.Bang.mp3'),
(240, 'Deixa Ele Sofrer', '02.34', 1.25, 26, 2, '02.DeixaEleSofrer.mp3'),
(241, 'Cravo e Canela', '03.20', 1.25, 26, 3, '03.CravoECanela.mp3'),
(242, 'Parei', '02.34', 1.25, 26, 4, '04.Parei.mp3'),
(243, 'Essa Mina É Louca', '02.36', 1.25, 26, 5, '05.EssaMinaELouca.mp3'),
(244, 'Atenção', '02.56', 1.25, 26, 6, '06.Atencao.mp3'),
(245, 'Gosto Assim', '03.19', 1.25, 26, 7, '07.GostoAssim.mp3'),
(246, 'Show Completo', '02.36', 1.25, 26, 8, '08.ShowCompleto.mp3'),
(247, 'Volta Amor', '02.36', 1.25, 26, 9, '09.VoltaAmor.mp3'),
(249, 'Sim', '03.10', 1.25, 26, 10, '10.Sim.mp3'),
(250, 'Pode Chegar', '03.10', 1.25, 26, 11, '11.PodeChegar.mp3'),
(251, 'Eu Sou Do Tipo', '02.18', 1.25, 26, 12, '12.EuSouDoTipo.mp3'),
(252, 'Deixa A Onda Te Levar', '02.28', 1.25, 26, 13, '13.DeixaAOndaTeLevar.mp3'),
(253, 'Me Leva A Sério', '02.50', 1.25, 26, 14, '14.MeLevaASerio.mp3'),
(254, 'Good Vibes', '03.17', 1.25, 27, 1, '01.GoodVibes.mp3'),
(255, 'Olhos Castanhos', '03.24', 1.25, 27, 2, '02.OlhosCastanhos.mp3'),
(256, 'Não Preciso de Você Pra Nada', '03.20', 1.25, 27, 3, '03.NaoPrecisoDeVocePraNada.mp3'),
(257, 'O Meu Sabor', '03.02', 1.25, 27, 4, '04.OMeuSabor.mp3'),
(258, 'Rebolar', '03.44', 1.25, 27, 5, '05.Rebolar.mp3'),
(259, 'Não Vou Contar', '03.14', 1.25, 28, 1, '01.NaoVouContar.mp3'),
(260, 'Virou Amor', '04.07', 1.25, 28, 2, '02.VirouAmor.mp3'),
(261, 'Casa Comigo', '03.37', 1.25, 28, 3, '03.CasaComigo.mp3'),
(262, 'O Pedido', '04.29', 1.25, 28, 4, '04.OPedido.mp3'),
(263, 'O Nosso Amor Não Acaba Aqui', '04.09', 1.25, 28, 5, '05.ONossoAmorNaoAcabaAQui.mp3'),
(264, 'Vem Só Ver', '03.59', 1.25, 28, 6, '06.VemSoVer.mp3'),
(265, 'Tá Ver', '03.31', 1.25, 28, 7, '07.TaVer.mp3'),
(266, 'Chin - Chin', '03.39', 1.25, 28, 8, '08.ChinChin.mp3'),
(267, 'Como Doí', '04.14', 1.25, 28, 9, '09.ComoDOi.mp3'),
(268, 'Provei e Gostei', '03.09', 1.25, 28, 10, '10.ProveiEGostei.mp3'),
(269, 'Money', '07.49', 1.25, 28, 11, '11.Money.mp3'),
(270, 'Por Favor DJ', '03.38', 1.25, 28, 12, '12.PorFavorDj.mp3'),
(271, 'Todo teu', '03.58', 1.25, 28, 13, '13.TodoTeu.mp3'),
(272, 'Espera De Um Erro Dele', '04.28', 1.25, 28, 14, '14.EsperaDeUmErroDele.mp3'),
(273, 'Ensina-me A Amar', '03.28', 1.25, 28, 15, '15.Ensina-meAAmar.mp3'),
(274, 'Raindrops', '00.38', 1.25, 29, 1, '01.Raindrops.mp3'),
(275, 'Blazed', '03.17', 1.25, 29, 2, '02.Blazed.mp3'),
(276, 'The Light is Coming', '03.52', 1.25, 29, 3, '03.TheLightIsComing.mp3'),
(277, 'R.E.M', '04.06', 1.25, 29, 4, '04.R.E.M.mp3'),
(278, 'God Is Woman', '04.01', 1.25, 29, 5, '05.GodIsAWoman.mp3'),
(279, 'Sweetener', '03.29', 1.25, 29, 6, '06.Sweetener.mp3'),
(280, 'Successful', '03.48', 1.25, 29, 7, '07.Successful.mp3'),
(281, 'Everytime', '02.53', 1.25, 29, 8, '08.Everytime.mp3'),
(282, 'Breathin', '03.16', 1.25, 29, 9, '09.Breathin.mp3'),
(283, 'No Tears Left To Cry', '03.29', 1.25, 29, 10, '10.NoTearsLeftToCry.mp3'),
(284, 'Bordeline', '02.58', 1.25, 29, 11, '11.Bordeline.mp3'),
(285, 'Better Offf', '02.52', 1.25, 29, 12, '12.BetterOff.mp3'),
(286, 'Goodnight N Go', '03.10', 1.25, 29, 13, '13.GoodnightNGo.mp3'),
(287, 'PeteDavidson', '01.14', 1.25, 29, 14, '14.PeteDavidson.mp3'),
(289, 'Get Well Soon', '05.23', 1.25, 29, 15, '15.GetWellSoon.mp3'),
(290, 'Intro:Singularity', '03.17', 1.25, 30, 1, '01.Intro.Singularity.mp3'),
(291, 'Fake Love', '05.18', 1.25, 30, 2, '02.FakeLove.mp3'),
(292, 'The Truth Untold', '04.10', 1.25, 30, 3, '03.TheTruthUntold.mp3'),
(293, '134340', '03.50', 1.25, 30, 4, '04.134340.mp3'),
(294, 'Paradise', '03.31', 1.25, 30, 5, '05.Paradise.mp3'),
(295, 'Love Maze', '03.41', 1.25, 30, 6, '06.LoveMaze.mp3'),
(296, 'Magic Shop', '04.35', 1.25, 30, 7, '07.MagicShop.mp3'),
(297, 'Airplane pt2', '03.38', 1.25, 30, 8, '08.Airplanept2.mp3'),
(298, 'Anpanman', '03.53', 1.25, 30, 9, '09.Anpanman.mp3'),
(299, 'So What', '04.41', 1.25, 30, 10, '10.SoWhat.mp3'),
(300, 'Ready For It ', '03.28', 1.25, 4, 1, '1.ready-for-it-audio.mp3'),
(301, 'End Game', '04.11', 1.25, 4, 2, '2.end-game-ft-ed-sheeran-future.mp3'),
(302, 'I Did Something Bad', '04.01', 1.25, 4, 3, '3.i-did-something-bad-lyric-video.mp3'),
(303, 'Dont Blame me', '04.15', 1.25, 4, 4, '4.dont-blame-me-lyrics.mp3'),
(304, 'Delicate', '04.18', 1.25, 4, 5, '5.delicate-lyrics.mp3'),
(305, 'Look What You Made Me Do', '03.35', 1.25, 4, 6, '6.look-what-you-made-me-do-lyric-video.mp3'),
(306, 'So It Goes ', '03.43', 1.25, 4, 7, '7.so-it-goes-lyrics.mp3'),
(307, 'Gorgeous', '03.31', 1.25, 4, 8, '8.gorgeous-lyric-video.mp3'),
(308, 'Getaway Car', '03.37', 1.25, 4, 9, '9.getaway-car-lyrics.mp3'),
(309, 'King of My Heart', '03.16', 1.25, 4, 10, '10.king-of-my-heart-lyrics.mp3'),
(310, 'Dancing With Our Hands Tied', '03.09', 1.25, 4, 11, '11.dancing-with-our-hands-tied-lyrics.mp3'),
(311, 'Dress', '03.55', 1.25, 4, 12, '12.dress.mp3'),
(312, 'This Is Why We Cant Have Nice Things', '03.27', 1.25, 4, 13, '13.this-is-why-we-cant-have-nice-things-lyric-video.mp3'),
(313, 'Call It What You Want ', '03.30', 1.25, 4, 14, '14.call-it-what-you-want-lyrics.mp3'),
(314, 'New Years Day', '03.12', 1.25, 4, 15, '15.new-years-day-lyrics.mp3'),
(315, 'Intro', '02.41', 1.25, 20, 1, '01.Intro.mp3'),
(316, 'A Vida Não É Só Chorar', '03.07', 1.25, 20, 2, '02.A VidaNãoésóchorar.mp3'),
(317, 'Mais Um', '03.37', 1.25, 20, 3, '03.Mais um.mp3'),
(318, 'Temos de Pensar', '03.09', 1.25, 20, 4, '04.TemosdePensar.mp3'),
(319, 'Não Quero Acordar', '04.03', 1.25, 20, 5, '05.NãoqueroAcordar.mp3'),
(320, 'Vim Para Ficar', '04.11', 1.25, 20, 6, '06.Vimparaficar.mp3'),
(321, 'Música', '04.37', 1.25, 20, 7, '07.Musica.mp3'),
(322, 'Escrevo Para SI', '03.47', 1.25, 20, 8, '08.Escrevoparasi.mp3'),
(323, 'Escuta-me e Pensa', '03.56', 1.25, 20, 9, '09.Escuta-meepensa.mp3'),
(324, 'Histórias e Vidas', '03.29', 1.25, 20, 10, '10.HistóriaseVidas.mp3'),
(325, 'Chaminé', '02.42', 1.25, 25, 1, '01.Chamine.mp3'),
(326, 'Grillz', '03.44', 1.25, 25, 2, '02.Grillz.mp3'),
(327, 'Voar', '04.12', 1.25, 25, 3, '03.Voar.mp3'),
(328, 'Hot Boyz', '03.07', 1.25, 25, 4, '04.HotBoyz.mp3'),
(329, 'Get Up Ten', '03.51', 1.25, 31, 1, '01.GetUp10.mp3'),
(330, 'Drip', '04.23', 1.25, 31, 2, '02.Drip.mp3'),
(331, 'Bickenhead', '04.23', 1.25, 31, 3, '03.Bickenhead.mp3'),
(332, 'Boday Yellow', '03.42', 1.25, 31, 4, '04.BodayYellow.mp3'),
(333, 'Be Careful', '04.09', 1.25, 31, 5, '05.BeCareful.mp3'),
(334, 'Best Life', '04.09', 1.25, 31, 6, '06.BestLife.mp3'),
(335, 'I Like It', '04.13', 1.25, 31, 7, '07.ILikeIt.mp3'),
(336, 'Ring', '02.57', 1.25, 31, 8, '08.Ring.mp3'),
(337, 'Money Bag', '03.49', 1.25, 31, 9, '09.MoneyBag.mp3'),
(338, 'Bartier', '03.49', 1.25, 31, 10, '10.Bartier.mp3'),
(339, 'She Bad', '03.51', 1.25, 31, 11, '11.SheBad.mp3'),
(340, 'Thru Your Phone', '03.08', 1.25, 31, 12, '12.ThruYourPhone.mp3'),
(341, 'I Do', '03.20', 1.25, 31, 13, '13.IDo.mp3'),
(342, 'Movs', '02.55', 1.25, 32, 1, '01.Movs.mp3'),
(343, 'Agora Ou Nunca', '02.42', 1.25, 32, 2, '02.AgoraOuNunca.mp3'),
(344, 'Homie', '04.16', 1.25, 32, 3, '03.Homie.mp3'),
(345, 'Quarta Ligação', '04.28', 1.25, 32, 4, '04.QuartaLigação.mp3'),
(346, 'Overdose', '02.36', 1.25, 32, 5, '05.Overdose.mp3'),
(347, 'Fumar os Vidros', '04.21', 1.25, 32, 6, '06.FumarOsVidros.mp3'),
(348, 'Amanhã', '05.03', 1.25, 32, 7, '07.Amanha.mp3'),
(349, 'Tanto Por Dizer', '04.25', 1.25, 32, 8, '08.TantoPorDizer.mp3'),
(350, 'Arás do Mesmo', '05.04', 1.25, 32, 9, '09.AtrásDoMesmo.mp3'),
(351, 'Hustle', '03.49', 1.25, 32, 10, '10.Hustle.mp3'),
(352, 'Chama', '04.54', 1.25, 32, 11, '11.Chama.mp3'),
(353, 'Pela Cidade', '04.05', 1.25, 32, 12, '12.PelaCidade.mp3'),
(354, 'Brincas', '03.44', 1.25, 32, 13, '13.Brincas.mp3'),
(355, 'DPDC', '05.19', 1.25, 32, 14, '14.DPCD.mp3'),
(356, 'Stars', '03.29', 1.25, 33, 1, '01.Stars.mp3'),
(357, 'Together', '03.48', 1.25, 33, 2, '02.Together.mp3'),
(358, 'Rooftops', '02.58', 1.25, 33, 3, '03.Rooftops.mp3'),
(359, 'Check This Out', '03.12', 1.25, 33, 4, '04.CheckThisOut.mp3'),
(360, 'Flashbacks', '02.45', 1.25, 33, 5, '05.Flashbacks.mp3'),
(361, 'Tell Me', '02.38', 1.25, 33, 6, '06.TellMe.mp3'),
(362, 'Paralyzed', '03.40', 1.25, 33, 7, '07.Paralyzed.mp3'),
(363, 'power', '03.42', 1.25, 33, 8, '08.Power.mp3'),
(364, 'Iamgine', '03.52', 1.25, 33, 9, '09.Imagine.mp3'),
(365, 'Yes or Yes', '04.28', 1.25, 34, 1, '01.YesorYes.mp3'),
(366, 'Say You Love Me', '03.33', 1.25, 34, 2, '02.SayYouLoveMe.mp3'),
(367, 'LALALA', '03.06', 1.25, 34, 3, '03.LaLaLa.mp3'),
(368, 'Young & Wild', '03.01', 1.25, 34, 4, '04Young&Wild.mp3'),
(369, 'Sunset', '03.43', 1.25, 34, 5, '05.Sunset.mp3'),
(370, 'After Soon', '03.24', 1.25, 34, 6, '06.AfterMoon.mp3'),
(371, 'BDZ', '03.22', 1.25, 34, 7, '07.BDZ.mp3'),
(372, '7 Chaves', '04.03', 1.25, 35, 1, '01.7Chaves.mp3'),
(373, 'Teu Olhar', '04.01', 1.25, 35, 2, '02.TeuOlhar.mp3'),
(374, 'Juro Por Tudo', '03.45', 1.25, 35, 3, '03JuroPorTudo.mp3'),
(375, 'Só Para Te Abraçar', '04.06', 1.25, 35, 4, '04.SoParaTeAbracar.mp3'),
(376, 'Alma Gêmea', '03.53', 1.25, 35, 5, '05.AlmaGemea.mp3'),
(377, 'Fecha a Porta', '03.20', 1.25, 35, 6, '06.FechaaPorta.mp3'),
(378, 'Semba do Pé', '03.53', 1.25, 35, 7, '07.SembaDoPe.mp3'),
(379, 'Voltei Com Ela', '04.20', 1.25, 35, 8, '08.VolteiComEla.mp3'),
(380, 'Faltou Coragem', '04.05', 1.25, 35, 9, '09.FaltouCoragem.mp3'),
(381, 'meu Vício', '04.16', 1.25, 35, 10, '10.MeuVicio.mp3'),
(382, 'Nada Mudou ', '04.02', 1.25, 35, 11, '11.NadaMudou.mp3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '_JiRXYULZbag6_o8Gqg5Li_Hrym1J-JL', '$2y$13$VVyOF9ZiwLGHKZKzSj209urO5zaAVXp1ML5S0qRnOv4FR8suI1dHG', NULL, 'adminadmin@gmail.com', 10, 1547549997, 1548108483),
(2, 'joao', 'jB--6AZpBPm9IWJJCgZKD8o_gg684nfn', '$2y$13$Ms8VsnEaeomtaO0sXq95AOBHnq6FXbyNfbQe4JV2AP8MJFtS9eG0C', NULL, 'joao@joao.pt', 10, 1548177889, 1548177889),
(3, 'clementina', 'HlOh8MHOlaGUDD3lYegN5jh8HAVmE_9a', '$2y$13$i2oH5TgPA0bLXI8n2HPOj.jbYmjsIvqi8wrsrIkuxUY4FAclFo5CG', NULL, 'clementina@clementina.pt', 10, 1548178049, 1548178049);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id`),
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`);

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_album`) REFERENCES `album` (`id`);

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `fav_album`
--
ALTER TABLE `fav_album`
  ADD CONSTRAINT `fav_album_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fav_album_ibfk_2` FOREIGN KEY (`id_album`) REFERENCES `album` (`id`);

--
-- Limitadores para a tabela `fav_artista`
--
ALTER TABLE `fav_artista`
  ADD CONSTRAINT `fav_artista_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fav_artista_ibfk_2` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id`);

--
-- Limitadores para a tabela `fav_genero`
--
ALTER TABLE `fav_genero`
  ADD CONSTRAINT `fav_genero_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fav_genero_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`);

--
-- Limitadores para a tabela `fav_musica`
--
ALTER TABLE `fav_musica`
  ADD CONSTRAINT `fav_musica_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fav_musica_ibfk_2` FOREIGN KEY (`id_musica`) REFERENCES `musica` (`id`);

--
-- Limitadores para a tabela `linha_compra`
--
ALTER TABLE `linha_compra`
  ADD CONSTRAINT `linha_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `linha_compra_ibfk_2` FOREIGN KEY (`id_musica`) REFERENCES `musica` (`id`);

--
-- Limitadores para a tabela `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `musica_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
