/*config_MYSQL

Connection Name: Aura_DB
Username: root
Password: ""







*/


drop database aura_party;

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
nomeEspaco varchar(50),
enderecoEspaco varchar (80) not null,
tipo enum ("Casa", "Salão de festas", "Apartamento","Club") ,
descricaoEspaco varchar(500),
lotacaoMax int not null
);

drop table Reservas;

create table Reservas(
idReserva int primary key auto_increment,
idUser int,
idEspaco int,
data_reserva date unique,
FOREIGN KEY (idUser) references Cliente(idUser),
FOREIGN KEY (idEspaco) references Espacos(idEspaco)
);

insert into Reservas (idUser,idEspaco,data_reserva)values(
'1','1','2025-01-24'
);

select * from Espacos;