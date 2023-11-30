
CREATE DATABASE WeihnachtsEssenDB;

USE WeihnachtsEssenDB;

CREATE TABLE Guests (
	GuestID INT NOT NULL AUTO_INCREMENT,
	FirstName VARCHAR(60) NOT NULL,
	LastName VARCHAR(60) NOT NULL,
	MainDish VARCHAR(60),
	Dessert VARCHAR(60),
	PRIMARY KEY (GuestID))
	engine = innodb 
	DEFAULT charset=utf8 
	COLLATE=utf8_unicode_ci; 

INSERT INTO guests(
	FirstName,
	LastName,
	MainDish,
	Dessert
	)
VALUES (
	'Stephan',
	'Dorner',
	'Steak',
	'Pudding'
	);

INSERT INTO guests(
	FirstName,
	LastName,
	MainDish,
	Dessert
	)
VALUES (
	'Franz',
	'Mueller',
	'Schnitzel',
	'Tiramisu'
	);

INSERT INTO guests(
	FirstName,
	LastName,
	MainDish,
	Dessert
	)
VALUES (
	'Kurt',
	'Maier',
	'Pizza',
	'Fruechte'
	);