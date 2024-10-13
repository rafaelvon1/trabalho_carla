create database carla;
create table login(id int primary key auto_increment not null,email varchar(50) not null,senha int not null);

insert into login
value(null,"rafaelvon514@gmail.com",12345678);


select * from login;

select * from login where email = "rafaelvon514@gmail.com" and senha = 12345678;
