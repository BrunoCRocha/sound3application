-- noinspection SqlNoDataSourceInspectionForFile

USE sound3;

DROP TABLE IF EXISTS fav_artista;
DROP TABLE IF EXISTS fav_album;
DROP TABLE IF EXISTS fav_musica;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS linha_compra;
DROP TABLE IF EXISTS musica;
DROP TABLE IF EXISTS album;
DROP TABLE IF EXISTS conter_genero;
DROP TABLE IF EXISTS genero;
DROP TABLE IF EXISTS artista;
DROP TABLE IF EXISTS compra;
DROP TABLE IF EXISTS user;

CREATE TABLE user(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	nome varchar(100) NOT NULL,
	email VARCHAR(50) NOT NULL UNIQUE,
	password CHAR(40) NOT NULL,
	telefone VARCHAR(9) UNIQUE,
	data_nascimento DATE
) ENGINE=InnoDB;

CREATE TABLE compra(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	data_compra DATE NOT NULL,
	valor_total decimal NOT NULL,
	id_utilizador int(10) NOT NULL,
	FOREIGN KEY (id_utilizador) REFERENCES user(id)
	/*FK*/
) ENGINE=InnoDB;

CREATE TABLE artista(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	nome varchar(50) NOT NULL,
	nacionalidade varchar(25),
	data_ini_carreira DATE
) ENGINE=InnoDB;

CREATE TABLE genero(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	nome varchar(50) NOT NULL,
	descricao varchar(250)
) ENGINE=InnoDB;

CREATE TABLE conter_genero(
	id_subgenero int(10) PRIMARY KEY AUTO_INCREMENT,
	id_genero int(10) NOT NULL,
	FOREIGN KEY (id_genero) REFERENCES genero(id)
) ENGINE=InnoDB;

CREATE TABLE album(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	nome varchar(50) NOT NULL,
	data_lancamento DATE,
	preco decimal(10) NOT NULL,
	id_artista int(10) NOT NULL,
	id_genero int(10) NOT NULL,
	id_subgenero int(10),
	FOREIGN KEY (id_artista) REFERENCES artista(id),
	FOREIGN KEY (id_genero) REFERENCES genero(id),
	FOREIGN KEY (id_subgenero) REFERENCES conter_genero(id_subgenero)
) ENGINE=InnoDB;

CREATE TABLE musica(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	nome varchar(50) NOT NULL,
	duracao varchar(6) NOT NULL,
	preco decimal(10) NOT NULL,
	id_album int(10) NOT NULL,
	FOREIGN KEY (id_album) REFERENCES album(id)
) ENGINE=InnoDB;

CREATE TABLE linha_compra(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	id_compra int(10) NOT NULL,
	id_musica int(10) NOT NULL,
	FOREIGN KEY (id_compra) REFERENCES compra(id),
	FOREIGN KEY (id_musica) REFERENCES musica(id)
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
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	id_utilizador int(10) NOT NULL,
	id_artista int(10) NOT NULL,
	FOREIGN KEY (id_utilizador) REFERENCES user(id),
	FOREIGN KEY (id_artista) REFERENCES artista(id)
) ENGINE=InnoDB;

CREATE TABLE fav_album(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	id_utilizador int(10) NOT NULL,
	id_album int(10) NOT NULL,
	FOREIGN KEY (id_utilizador) REFERENCES user(id),
	FOREIGN KEY (id_album) REFERENCES album(id)
) ENGINE=InnoDB;

CREATE TABLE fav_musica(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	id_utilizador int(10) NOT NULL,
	id_musica int(10) NOT NULL,
	FOREIGN KEY (id_utilizador) REFERENCES user(id),
	FOREIGN KEY (id_musica) REFERENCES musica(id)
) ENGINE=InnoDB;

CREATE TABLE fav_genero(
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	id_utilizador int(10) NOT NULL,
	id_genero int(10) NOT NULL,
	id_subgenero int(10),
	FOREIGN KEY (id_utilizador) REFERENCES user(id),
	FOREIGN KEY (id_genero) REFERENCES genero(id),
	FOREIGN KEY (id_subgenero) REFERENCES conter_genero(id_subgenero)
) ENGINE=InnoDB;