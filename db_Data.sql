alter user root@localhost identified with mysql_native_password by '1234';
create database autowindow;
grant all privileges on autowindow.* to cTosMaster@localhost identified by '1234';
flush privileges;
create table user_info(
	num tinyint(2) not null auto_increment,
	id char(20), 
	password varchar(20),
	name char(20),
	age int(1), 
	address char(30),
	primary key(num));
create table SensData(
	num tinyint(2) not null auto_increment,
	date varchar(20), 
	UvData varchar(30), 
	DustData varchar(30),
	primary key(num));


