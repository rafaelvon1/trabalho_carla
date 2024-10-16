create database carla;
/*criando minha tabela login*/
create table login(id int primary key auto_increment not null,email varchar(50) not null,senha varchar(250) not null,pessoa_status varchar(6) not null);
insert into login
values
(null,"rafaelvon514@gmail.com","$2y$10$JqEL2VNe1JWKYtAZirqGleX0nUXSUKjHrA6nP5hYhmBHnOJf1u3WK","admin"),
(null,"kauanbkzin@gmail.com","$2y$10$nEyDe1Bi9RcaWXSF4QPVjudlkoA6HL/aK4kw585fX032fK8KFywXq","admin"),
(null,"gabrielvasco906@gmail.com","$2y$10$Nr8HrtMC/gq7k3Zt21sNG.JgLdyQws2xnPmWsDjrbi3tHcJKnQ4nu","admin"),
(null,"Matheushrnque@gmail.com","$2y$10$YziOo12X6W47H35X8wWoAujf4zF2Ce/mf3MpICaBdzPQWob/6diGy","admin"),
(null,"cliente@gmail.com","$2y$10$tCTGoTbev3OuaWeZIJYioecuSPti.1UH7b1CvyyzHzT0j0doGvxTW","client")
;
