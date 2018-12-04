-- noinspection SqlNoDataSourceInspectionForFile

USE sound3;

DROP TABLE IF EXISTS fav_artista;
DROP TABLE IF EXISTS fav_album;
DROP TABLE IF EXISTS fav_musica;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS linha_compra;
DROP TABLE IF EXISTS musica;
DROP TABLE IF EXISTS album;
DROP TABLE IF EXISTS genero;
DROP TABLE IF EXISTS artista;
DROP TABLE IF EXISTS compra;

/*CREATE TABLE user(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	nome varchar(100) NOT NULL,
	email VARCHAR(50) NOT NULL UNIQUE,
	password CHAR(40) NOT NULL,
	telefone VARCHAR(9) UNIQUE,
	data_nascimento DATE
) ENGINE=InnoDB;*/

CREATE TABLE compra(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	data_compra DATE NOT NULL,
	valor_total float(10) NOT NULL,
	efetivada tinyint(1),
	id_utilizador int(10) NOT NULL,
	FOREIGN KEY (id_utilizador) REFERENCES user(id)
	/*FK*/
) ENGINE=InnoDB;



CREATE TABLE artista(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	nome varchar(50) NOT NULL,
	nacionalidade varchar(25),
	ano int(5),
	caminhoImagem varchar (300)
) ENGINE=InnoDB;

CREATE TABLE genero(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	nome varchar(50) NOT NULL,
	descricao varchar(250),
	caminhoImagem varchar (300)
) ENGINE=InnoDB;

CREATE TABLE album(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	nome varchar(50) NOT NULL,
	ano int(5),
	preco float(10) NOT NULL,
	id_artista int(10) NOT NULL,
	id_genero int(10) NOT NULL,
	caminhoImagem varchar(300),
	FOREIGN KEY (id_artista) REFERENCES artista(id),
	FOREIGN KEY (id_genero) REFERENCES genero(id)
) ENGINE=InnoDB;

CREATE TABLE musica(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	nome varchar(50) NOT NULL,
	duracao varchar(6) NOT NULL,
	preco float(10) NOT NULL,
	id_album int(10) NOT NULL,
	posicao int(10),
	caminhoMP3 varchar(300),
	FOREIGN KEY (id_album) REFERENCES album(id)
) ENGINE=InnoDB;

CREATE TABLE linha_compra(
	id_compra int(10) NOT NULL,
	id_musica int(10) NOT NULL,
	FOREIGN KEY (id_compra) REFERENCES compra(id),
	FOREIGN KEY (id_musica) REFERENCES musica(id),
	CONSTRAINT compra_musica PRIMARY KEY (id_compra, id_musica)
) ENGINE=InnoDB;

CREATE TABLE comment(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	conteudo varchar(250) NOT NULL,
	data_criacao DATE NOT NULL,
	id_utilizador int(10) NOT NULL,
	id_album int(10) NOT NULL,
	FOREIGN KEY (id_utilizador) REFERENCES user(id),
	FOREIGN KEY (id_album) REFERENCES album(id)
) ENGINE=InnoDB;

CREATE TABLE fav_artista(
	id_utilizador int(10) NOT NULL,
	id_artista int(10) NOT NULL,
	FOREIGN KEY (id_utilizador) REFERENCES user(id),
	FOREIGN KEY (id_artista) REFERENCES artista(id),
	CONSTRAINT utilizador_artista PRIMARY KEY (id_utilizador, id_artista)
) ENGINE=InnoDB;

CREATE TABLE fav_album(
	id_utilizador int(10) NOT NULL,
	id_album int(10) NOT NULL,
	FOREIGN KEY (id_utilizador) REFERENCES user(id),
	FOREIGN KEY (id_album) REFERENCES album(id),
	CONSTRAINT utilizador_album PRIMARY KEY (id_utilizador, id_album)
) ENGINE=InnoDB;

CREATE TABLE fav_musica(
	id_utilizador int(10) NOT NULL,
	id_musica int(10) NOT NULL,
	FOREIGN KEY (id_utilizador) REFERENCES user(id),
	FOREIGN KEY (id_musica) REFERENCES musica(id),
	CONSTRAINT utilizador_musica PRIMARY KEY (id_utilizador, id_musica)
) ENGINE=InnoDB;

CREATE TABLE fav_genero(
	id_utilizador int(10) NOT NULL,
	id_genero int(10) NOT NULL,
	FOREIGN KEY (id_utilizador) REFERENCES user(id),
	FOREIGN KEY (id_genero) REFERENCES genero(id),
	CONSTRAINT utilizador_genero PRIMARY KEY (id_utilizador, id_genero)
) ENGINE=InnoDB;


INSERT INTO `genero` (`id`, `nome`, `descricao`, `caminhoImagem`)
      VALUES(1,'Pop','Pop é um género da música popular que se originou durante a década de 1950 nos Estados Unidos e Reino Unido.' ||
       'Geralmente é visto como sinônimo de "música popular"','C:\\wamp64\\www\\sound3application\\frontend\\web\\img\\capas\\edSheeran.jpg'),
       (2,'Rock','Rock é um termo abrangente que define um gênero musical de música popular que se desenvolveu durante e após a década de 1950. Suas raízes se encontram ' ||
        'no rock and roll e no rockabilly que emergiram e se definiram nos Estados Unidos.',
        'C:\\wamp64\\www\\sound3apllication\\frontend\\web\\img\\capas\\rock.jpg');

INSERT INTO `artista` (`id`, `nome`, `nacionalidade`, `ano`, `caminhoImagem`)
      VALUES(1,'Ed Sheeran', 'Britânica', '2005','C:\\wamp64\\www\\sound3application\\frontend\\web\\img\\capas\\edSheeran.jpg'),
      (2,'Taylor Switf', 'Norte-Americana', '2006','C:\\wamp64\\www\\sound3application\\frontend\\web\\img\\capas\\taylorSwitf.jpg'),
      (3,'Linkin Park', 'Americana', '1996', 'C:\\wamp64\\www\\sound3application\\frontend\\web\\img\\capas\\linkinPark.jpg');

INSERT INTO `album` (`id`, `nome`, `ano`, `preco`, `id_artista`, `id_genero`, `caminhoImagem`)
      VALUES(1,'Divide', '2017', 12, 1, 1, 'C:\\wamp64\\www\\sound3application\\frontend\\web\\img\\capas\\divide.jpeg'),
      (2,'X','2014',12,1,1,'C:\\wamp64\\www\sound3application\\frontend\\web\\img\\capas\\x.jpg'),
      (3,'1989','2017',12,2,1,'C:\\wamp64\\www\\sound3application\\frontend\\web\\img\\capas\\1989.jpg'),
      (4,'Reputation','2017',12,2,1,'C:\\wamp64\\www\sound3application\\frontend\\web\\img\\capas\\reputation.jpg'),
      (5,'Meteora','2003',12,3,2,'C:\\wamp64\\www\\sound3application\\frontend\\web\\img\\capas\\meteora.jpg'),
      (6,'Hybrid Theory','1999',12,3,2,'C:\\wamp64\\www\\sound3apllication\\frontend\\web\\img\\capas\\hybridTheory.jpg');

INSERT INTO `musica` (`id`, `nome`, `duracao`, `preco`, `id_album`, `posicao`, `caminhoMP3`)
      VALUES(1,'Shape of You',3.53,2,1,4,NULL),
      (2,'Eraser',3.47,2,1,1,NULL),
      (3,'Photograph',4.17,2,2,6,NULL),
      (4,'Afire Love',4.58,2,2,12,NULL),
      (5,'Welcome to New York',3.35,2,3,1,NULL),
      (6,'This Love',4.10,2,3,11,NULL),
      (7,'I Did Something Bad',3.58,2,4,3,NULL),
      (8,'Dress',3.50,2,4,12,NULL),
      (9,'Easier to Run',3.24,2,5,6,NULL),
      (10,'Session',2.24,2,5,12,NULL),
      (11,'With You',3.23,2,6,3,NULL),
      (12,'Forgotten',3.14,2,6,10,NULL);


INSERT INTO `compra` (`id`, `data_compra`, `valor_total`, `efetivada`, `id_utilizador`)
      VALUES(1,'2018-12-03',12,0,2),
      (2,'2018-02-12',14,1,2),
      (3,'2018-06-23',13,0,3),
      (4,'2018-09-12',12.5,0,2),
      (5,'2018-10-12',14,1,3);


INSERT INTO `linha_compra` (`id_compra`, `id_musica`)
      VALUES(1,5),
      (2,8),
      (3,2);

INSERT INTO `comment` (`id`, `conteudo`, `data_criacao`, `id_utilizador`, `id_album`)
      VALUES(1,'Gosto imenso deste álbum. Excelente trabalho','2018-12-03',2,2);





