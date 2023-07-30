CREATE DATABASE pjs;
USE pjs;

set names utf8;

CREATE TABLE IF NOT EXISTS cadastro 
(
  nome varchar(100) DEFAULT NULL,
  nascimento date DEFAULT NULL, 
  email varchar(40) DEFAULT NULL,
  cd_senha varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  cd_usuario int(11) not null auto_increment,
  Primary key (cd_usuario) 
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS receitas 
(
  descricao varchar(100) DEFAULT NULL,
  comentario varchar(100) DEFAULT NULL,
  valor varchar(50) DEFAULT NULL, 
  data_receita date DEFAULT NULL,
  cd_usuario int(11) not null,
  categoria varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  cd_receita int(11) not null auto_increment,
  Primary key (cd_receita)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;

ALTER TABLE receitas
ADD CONSTRAINT fk_cd
FOREIGN KEY (cd_usuario)
REFERENCES cadastro(cd_usuario)

CREATE TABLE IF NOT EXISTS despesas 
(
  descricao varchar(100) DEFAULT NULL,
  comentario varchar(100) DEFAULT NULL,
  valor varchar(50) DEFAULT NULL, 
  data_despesa date DEFAULT NULL,
  cd_usuario int(11) not null,
  categoria varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  cd_despesa int(11) not null auto_increment,
  Primary key (cd_despesa)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;

ALTER TABLE despesas
ADD CONSTRAINT fk_cdd
FOREIGN KEY (cd_usuario)
REFERENCES cadastro(cd_usuario)
