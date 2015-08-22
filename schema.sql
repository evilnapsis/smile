/**
* @author evilnapsis
* @brief Modelo de la base de datos
**/
create database smile2;
use smile2;

create table user(
	id int not null auto_increment primary key,
	name varchar(50) not null,
	lastname varchar(50) not null,
	username varchar(50),
	email varchar(255) not null,
	password varchar(60) not null,
	code varchar(20),
	is_active boolean not null default 0,
	is_admin boolean not null default 0,
	created_at datetime not null
);

insert into user(email,password,is_active,is_admin,created_at) value ("admin",sha1(md5("admin")),1,1,NOW());

create table recover (
	id int not null auto_increment primary key,
	user_id int not null,
	code varchar(20) not null,
	is_used boolean not null default 0,
	created_at datetime not null,
	foreign key(user_id) references user(id)
);