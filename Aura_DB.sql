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
loginUser varchar(100) not null,
senha varchar(30) not null,
telefone char(11),
cpf char(11) not null,
email varchar(100)
);



insert into Cliente values(

);

create table Adm(
idAdm int auto_increment primary key,
loginUser varchar(100) not null,
senhaAdm varchar(30) not null

);

insert into Adm (loginUser,senhaAdm)values(
'admin','123'
);

drop table Espacos;

create table Espacos(
idEspaco int primary key auto_increment,
nomeEspaco varchar(50) not null,
enderecoEspaco varchar (255) not null,
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




select * from Reservas;