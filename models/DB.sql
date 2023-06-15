create database db_usuario;

use db_usuario;
create table usuario(
id int auto_increment primary key,
email varchar(100) not null unique,
usuario varchar(25) not null,
senha varchar(100) not null
);

select * from usuario;