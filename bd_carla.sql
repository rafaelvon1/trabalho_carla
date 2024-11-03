create database carla;

/*---------------tabelas-------------*/
/*criando minha tabela login*/
/*tabela de pessoas ja logadas*/
create table login(id int primary key auto_increment not null,email varchar(50) not null,senha varchar(250) not null,pessoa_status varchar(6) not null);
/*tabela de pessoas que fizeram uma reserva*/
create table reserva(id int primary key auto_increment not null,id_client int not null,mesa int not null,horario time not null,data_reserva date not null,quantidade int not null,dias varchar(50) not null);
/*tabela de dados de pessoas cadasatradas*/
create table dados_usuario(id int not null primary key auto_increment,id_client int not null,nome varchar(50) not null ,telefone varchar(20) not null,cpf varchar(20) not null,cep varchar(20) not null);


/*-----------------------------inserindo pessoas de teste na tabela reserva-------------------------------------*/
insert into login
values
/*adicionar ids */
(null,"rafaelvon514@gmail.com","$2y$10$JqEL2VNe1JWKYtAZirqGleX0nUXSUKjHrA6nP5hYhmBHnOJf1u3WK","admin"),
(null,"kauanbkzin@gmail.com","$2y$10$nEyDe1Bi9RcaWXSF4QPVjudlkoA6HL/aK4kw585fX032fK8KFywXq","admin"),
(null,"gabrielvasco906@gmail.com","$2y$10$Nr8HrtMC/gq7k3Zt21sNG.JgLdyQws2xnPmWsDjrbi3tHcJKnQ4nu","admin"),
(null,"Matheushrnque@gmail.com","$2y$10$YziOo12X6W47H35X8wWoAujf4zF2Ce/mf3MpICaBdzPQWob/6diGy","admin"),
(null,"cliente@gmail.com","$2y$10$tCTGoTbev3OuaWeZIJYioecuSPti.1UH7b1CvyyzHzT0j0doGvxTW","client")
;
/*para ser posivel fazer mais teste com usuario fantasma*/
insert into dados_usuario
values
/*adicionar ids */
(null,5,"cliente_teste","00","00","00")
;


/*---------------select e delete-----------------------*/
select  *from login;
select * from reserva;
select  *from dados_usuario;
drop table login;
drop table reserva;
drop table dados_usuario;
/*------------------------------------------testes-------------------------------------------*/


select d.nome,r.mesa,r.horario,r.data_reserva,r.quantidade from reserva r, dados_usuario d where r.id_client = d.id_client;


select * from reserva where id_client = 0 limit 1;

update reserva set id_client = 0,horario = null,data_reserva = null,quantidade = 0,dias = "" where id_client = 0 limit 1; 
select count(*) total from reserva;
delete from login where id = 9;
drop table login;
SELECT * FROM reserva where mesa = 5 and data_reserva = '2024-11-21' and horario >= '10:11:00' and horario <= '08:11:00' or horario >= '10:11:00' and horario <= '12:11:00' ;
SELECT * FROM reserva 
WHERE mesa = 5 
AND data_reserva = '2024-11-21' 
AND ((horario >= '10:11:00' AND horario <= '08:11:00') 
OR (horario >= '10:11:00' AND horario <= '12:11:00'));

UPDATE reserva SET quantidade = 2 WHERE id_client = 6 LIMIT 1