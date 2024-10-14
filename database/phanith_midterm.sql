create table users (
	id char(20),
	username char(50),
	password char(50),
	role char(20)
);

create table role (
	id char(20),
	role char(50)
);

select * from role;