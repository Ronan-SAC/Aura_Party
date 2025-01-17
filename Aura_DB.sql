create database Aura_party;
use Aura_party;

create table Cliente(
idUser int auto_increment primary key,
loginUser varchar(100),
senha varchar(30),
telefone char(11),
cpf char(11),
email varchar(100)
);

insert into Cliente values(

);

create table Adm(
idAdm int auto_increment primary key,
loginUser varchar(100),
senhaAdm varchar(30)

);

insert into Adm values(

);

create table Espacos(
idEspaco int primary key auto_increment,
nomeEspaco varchar(50),
enderecoEspaco varchar (80) not null,
tipo enum ("Casa", "Salão de festas", "Apartamento","Club") ,
descricaoEspaco varchar(500),
lotacaoMax int not null
);

insert into Espacos values (

);

