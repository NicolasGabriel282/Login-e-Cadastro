create database db_usuario;

use db_usuario;

CREATE TABLE Usuarios (
    id_Usuario INT auto_increment PRIMARY KEY ,
    email VARCHAR(60) not null,
    usuario VARCHAR(25) not null,
    senha VARCHAR(255) not null,
    UNIQUE (email, usuario)
);

CREATE TABLE Pastas (
    id_Pastas INT auto_increment PRIMARY KEY,
    nome VARCHAR(25) not null,
    numero_arquivos INT not null
);

CREATE TABLE Arquivos (
    id_arquivos INT auto_increment PRIMARY KEY,
    fk_Pastas_id_Pastas INT,
    nome VARCHAR(25) not null,
    codigo VARCHAR(255) not null,
    tipo VARCHAR(4) not null,
    UNIQUE (nome, codigo)
);

CREATE TABLE Permissao (
    fk_Usuarios_id_Usuarios INT not null,
    fk_Pastas_id_Pastas INT not null,
    id_Permssao INT auto_increment PRIMARY KEY
);
 
ALTER TABLE Arquivos ADD CONSTRAINT FK_Arquivos_2
    FOREIGN KEY (fk_Pastas_id_Pastas)
    REFERENCES Pastas (id_Pastas)
    ON DELETE CASCADE;
 
ALTER TABLE Permissao ADD CONSTRAINT FK_Permissao_1
    FOREIGN KEY (fk_Usuarios_id_Usuarios)
    REFERENCES Usuarios (id_Usuario)
    ON DELETE CASCADE;
 
ALTER TABLE Permissao ADD CONSTRAINT FK_Permissao_2
    FOREIGN KEY (fk_Pastas_id_Pastas)
    REFERENCES Pastas (id_Pastas)
    ON DELETE cascade;