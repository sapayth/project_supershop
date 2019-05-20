use db_supershop;

drop table if exists user_role;
create table user_role(
	id int(10) primary key auto_increment,
	role_id int(2),
	role_name varchar(30)
);
insert into user_role(role_id, role_name) values(1, 'Admin');
insert into user_role(role_id, role_name) values(2, 'Standard');

drop table if exists users;
create table users(
	id int(10) primary key auto_increment,
	name varchar(45),
	email varchar(50) unique,
	password varchar(50),
	role_id int(10)
);
insert into users(name, email, password, role_id) values('Sapayth Hossain', 'safayet.qubee@gmail.com', '12345', 1);
insert into users(name, email, password, role_id) values('Waish Chowdhury', 'waish@gmail.com', '12345', 2);
insert into users(name, email, password, role_id) values('Munna Ahsan', 'munna@gmail.com', '12345', 2);