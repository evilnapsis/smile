/**
* @author evilnapsis
* @brief Modelo de la base de datos
**/
create database smile;
use smile;

create table user(
	id int not null auto_increment primary key,
	name varchar(50),
	lastname varchar(50),
	username varchar(50),
	email varchar(255),
	password varchar(60),
	code varchar(20),
	is_active boolean default 0,
	is_admin boolean default 0,
	created_at datetime
);

/* insert into user(email,password,is_active,is_admin,created_at) value ("admin",sha1(md5("admin")),1,1,NOW()); */

create table recover (
	id int not null auto_increment primary key,
	user_id int,
	code varchar(20),
	is_used boolean default 0,
	created_at datetime,
	foreign key(user_id) references user(id)
);

create table level(
	id int not null auto_increment primary key,
	name varchar(50)
);
insert into level (name) values ("Publico"), ("Solo amigos"), ("Amigos de mis amigos");


create table country(
	id int not null auto_increment primary key,
	name varchar(50),
	preffix varchar(50)
);

insert into country(name,preffix) values ("Mexico","mx"),("Argentina","ar"),("Espa~a","es"),("Estados Unidos","eu"),("Chile","cl"),("Colombia","co"),("Peru","pe");

create table sentimental(
	id int not null auto_increment primary key,
	name varchar(50)
);

insert into sentimental(name) values ("Soltero"),("Casado");

create table profile(
	day_of_birth date ,
	gender varchar(1) ,
	country_id int ,
	image varchar(255),
	image_header varchar(255),
	title varchar(255),
	bio varchar(255),
	likes text,
	dislikes text,
	address varchar(255) ,
	phone varchar(255) ,
	public_email varchar(255) ,
	user_id int ,
	level_id int ,
	sentimental_id int ,
	foreign key (sentimental_id) references sentimental(id),
	foreign key (country_id) references country(id),
	foreign key (level_id) references level(id),
	foreign key (user_id) references user(id)
);


create table album(
	id int not null auto_increment primary key,
	title varchar(200),
	content varchar(500),
	user_id int,
	level_id int,
	created_at datetime,
	foreign key (user_id) references user(id),
	foreign key (level_id) references level(id)
);

create table image(
	id int not null auto_increment primary key,
	src varchar(255),
	title varchar(200),
	content varchar(500),
	user_id int,
	level_id int,
	album_id int,
	created_at datetime,
	foreign key (album_id) references album(id),
	foreign key (user_id) references user(id),
	foreign key (level_id) references level(id)
);

/**
* post_type_id
* 1.- status
* 2.- event
**/
create table post(
	id int not null auto_increment primary key,
	title varchar(500) ,
	content text,
	lat double ,
	lng double ,
	start_at datetime,
	finish_at datetime,
	receptor_type_id int default 1, /* 1.- user, 2.- group **/
	author_ref_id int,
	receptor_ref_id int,
	level_id int,
	post_type_id int default 1,
	created_at datetime,
	foreign key (level_id) references level(id)
);

create table post_image(
	post_id int,
	image_id int,
	foreign key (post_id) references post(id),
	foreign key (image_id) references image(id)
);

/**
* type_id:
* 1.- post
* 2.- image
**/
create table heart(
	id int not null auto_increment primary key,
	type_id int default 1,
	ref_id int,
	user_id int,
	created_at datetime,
	foreign key (user_id) references user(id)
);

create table comment(
	id int not null auto_increment primary key,
	type_id int,
	ref_id int,
	user_id int,
	content text,
	comment_id int,
	created_at datetime,
	foreign key (user_id) references user(id),
	foreign key (comment_id) references comment(id)
);

create table friend(
	id int not null auto_increment primary key,
	sender_id int,
	receptor_id int,
	is_accepted boolean default 0,
	is_readed boolean default 0,
	created_at datetime,
	foreign key (sender_id) references user(id),
	foreign key (receptor_id) references user(id)
);

create table conversation(
	id int not null auto_increment primary key,
	sender_id int,
	receptor_id int,
	created_at datetime,
	foreign key (sender_id) references user(id),
	foreign key (receptor_id) references user(id)
);

create table message(
	id int not null auto_increment primary key,
	content text,
	user_id int,
	conversation_id int,
	created_at datetime,
	is_readed boolean default 0,
	foreign key (user_id) references user(id),
	foreign key (conversation_id) references conversation(id)
);

/*
not_type_id: 
1.- like, 2.- comment
type:
1.- post, 2.- image
*/
create table notification(
	id int not null auto_increment primary key,
	not_type_id int,
	type_id int,
	ref_id int,
	receptor_id int,
	sender_id int,
	is_readed boolean default 0,
	created_at datetime,
	foreign key (sender_id) references user(id),
	foreign key (receptor_id) references user(id)
);

/* para grupos: no puedo usar la palabra reservada group, entonces uso team */
create table team (
	id int not null auto_increment primary key,
	image varchar(200),
	title varchar(200),
	description varchar(500) ,
	user_id int,
	status int default 1 /* 1.- open, 2.- closed */,
	created_at datetime,
	foreign key (user_id) references user(id)
);
