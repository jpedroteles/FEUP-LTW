PRAGMA foreign_keys = ON;

/* Delete the tables if they already exist */
drop table if exists Event;
drop table if exists Type;
drop table if exists User;
drop table if exists Attendees;
drop table if exists Guests;
/*Opcional */
drop table if exists Forum;
drop table if exists PhotoAlbum;
drop table if exists Coment;

/* Create the schema for our tables */
create table User(
	id INT NOT NULL PRIMARY KEY ,
	name TEXT NOT NULL,
	mail TEXT NOT NULL,
	mailValidation BOOLEAN NOT NULL,
	password TEXT NOT NULL
	);

create table Event(
	id INT NOT NULL PRIMARY KEY,
	name TEXT NOT NULL,
	startDate DATE NOT NULL, /*falta criar o time */
	startTime TIME NOT NULL,
	local TEXT NOT NULL,
	description TEXT NOT NULL,
	private BOOLEAN NOT NULL,
	photo TEXT NOT NULL,
	type INT REFERENCES Tipo(id),
	creator INT REFERENCES User(name)
);

create table Type(
	id INT NOT NULL PRIMARY KEY,
	name TEXT NOT NULL
);

create table Attendees(
	user INT REFERENCES User(id),
	event INT REFERENCES Event(id),
	PRIMARY KEY (user, event)
);

create table Guests(
	user INT REFERENCES User(id),
	event INT REFERENCES Event(id)
);

create table comment(
	id INT NOT NULL PRIMARY KEY,
 	commentDate DATE NOT NULL,
 	comment TEXT NOT NULL,
 	user INT REFERENCES User(id),
 	event INT REFERENCES Event(id)
);
