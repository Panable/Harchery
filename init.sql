Drop Table if exists Competition;
Drop Table if exists Class;
Drop Table if exists Division;
Drop Table if exists `Round`;
Drop Table if exists Arrow;
Drop Table if exists RoundRecord;
Drop Table if exists Archer;
Drop Table if exists Club;

CREATE TABLE Competition (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255)
);

CREATE TABLE Class (
	AgeGroup VARCHAR(255),
	Gender VARCHAR(255),
	CONSTRAINT Category PRIMARY KEY (AgeGroup, Gender)
);
CREATE TABLE Division (
	Equipment VARCHAR(255) PRIMARY KEY
);

CREATE TABLE `Round` (
	ID INT PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR(255),
	`Range` INT,
	TotalEnds INT,
	Face INT
);

CREATE TABLE Arrow (
	ID INT PRIMARY KEY AUTO_INCREMENT,
	PertainingEnd INT,
	Score INT
);

CREATE TABLE RoundRecord (
	ID INT PRIMARY KEY AUTO_INCREMENT,
	`Date` DATETIME
);

CREATE TABLE Archer (
	ID INT PRIMARY KEY AUTO_INCREMENT,
	FirstName VARCHAR(255),
	DOB DATE,
	Gender VARCHAR(255)
);

CREATE TABLE Club (
	ID INT PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR(255),
	State VARCHAR(255)
);

