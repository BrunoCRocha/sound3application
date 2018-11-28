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
	data_ini_carreira DATE,
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
	data_lancamento DATE,
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