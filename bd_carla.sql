create database carla;
/*criando minha tabela login*/
create table login(id int primary key auto_increment not null,email varchar(50) not null,senha varchar(250) not null,pessoa_status varchar(6) not null);
insert into login
values
/*adicionar ids */
(null,"rafaelvon514@gmail.com","$2y$10$JqEL2VNe1JWKYtAZirqGleX0nUXSUKjHrA6nP5hYhmBHnOJf1u3WK","admin"),
(null,"kauanbkzin@gmail.com","$2y$10$nEyDe1Bi9RcaWXSF4QPVjudlkoA6HL/aK4kw585fX032fK8KFywXq","admin"),
(null,"gabrielvasco906@gmail.com","$2y$10$Nr8HrtMC/gq7k3Zt21sNG.JgLdyQws2xnPmWsDjrbi3tHcJKnQ4nu","admin"),
(null,"Matheushrnque@gmail.com","$2y$10$YziOo12X6W47H35X8wWoAujf4zF2Ce/mf3MpICaBdzPQWob/6diGy","admin"),
(null,"cliente@gmail.com","$2y$10$tCTGoTbev3OuaWeZIJYioecuSPti.1UH7b1CvyyzHzT0j0doGvxTW","client")
;

select * from login;

/*teste registro*/
create table reserva(id_mesa int primary key auto_increment not null,id_client int ,horario time,data_reserva date ,quantidade int ,dias varchar(50) );
insert into reserva
values
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,""),
(null,0,null,null,0,"")

;
select * from reserva where id_client = 0 limit 1;
update reserva set id_client = 0,horario = null,data_reserva = null,quantidade = 0,dias = "" where id_client = 0 limit 1; 
select count(id_client) total from reserva where id_client = 0;
delete from reserva where id_client = 5;
drop table reserva;