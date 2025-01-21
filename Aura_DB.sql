/*config_MYSQL

Connection Name: Aura_DB
Username: root
Password: ""







*/


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

insert into Adm (loginUser,senhaAdm)values(
'admin','123'
);

drop table Espacos;

create table Espacos(
idEspaco int primary key auto_increment,
idUser int,
nomeEspaco varchar(50),
enderecoEspaco varchar (80) not null,
tipo enum ("Casa", "Salão de festas", "Apartamento","Club") ,
descricaoEspaco varchar(500),
lotacaoMax int not null,
date_Espaco date,
horario_inicio time,
horario_fim time,
foreign key(idUser) references Cliente(idUser)
);

insert into Espacos (nomeEspaco,enderecoEspaco,tipo,descricaoEspaco,lotacaoMax,date_Espaco,horario_inicio,horario_fim) values (
'Casa do João', 'rua do joão', 'Casa','a casa do joao muito legal','10','2025-01-30','17:00','21:00'
);

select * from Espacos;