/*config_MYSQL

Connection Name: Aura_DB
Username: root
Password: ""







*/


drop database aura_party;

create database Aura_party;
use Aura_party;

drop table Cliente;

create table Cliente(
idUser int auto_increment primary key,
loginUser varchar(100) not null unique,
senha varchar(255) not null,
telefone char(11) unique,
cpf char(11) not null unique,
email varchar(100) unique
);




insert into Cliente values(

);


drop table Adm;

create table Adm(
idAdm int auto_increment primary key,
loginUser varchar(100) not null unique,
senhaAdm varchar(255) not null

);


insert into Adm (loginUser,senhaAdm)values(
'admin','123'
);

drop table Espacos;

create table Espacos(
idEspaco int primary key auto_increment,
nomeEspaco varchar(50) not null unique,
enderecoEspaco varchar (255) not null unique,
tipo enum ("Casa", "Salão de Festas", "Apartamento","Club") not null,
descricaoEspaco varchar(500),
lotacaoMax int not null CHECK (lotacaoMax > 0),
imagem_local varchar(255)
);

INSERT INTO Espacos (nomeEspaco,enderecoEspaco,tipo,descricaoEspaco,lotacaoMax,imagem_local) VALUES ("Ronan", "13", "Casa", "dsadasd", "1", "6797ba291cd00" );
	
create table Reservas(
idReserva int primary key auto_increment,
idUsuario int not null,
idEspaco int not null,
data_ date not null,
FOREIGN KEY (idUsuario) references Cliente(idUser),
FOREIGN KEY (idEspaco) references Espacos(idEspaco)
);

drop table Reservas;

select * from Espacos;

select * from Adm;


select * from Reservas;


SELECT idAdm,senhaAdm FROM Adm WHERE loginUser = 'Admin';