SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS CompetitionRecord;
DROP TABLE IF EXISTS CompetitionDetails;
DROP TABLE IF EXISTS Competition;
DROP TABLE IF EXISTS Class;
DROP TABLE IF EXISTS Division;
DROP TABLE IF EXISTS `Round`;
DROP TABLE IF EXISTS Arrow;
DROP TABLE IF EXISTS RoundRecord;
DROP TABLE IF EXISTS Archer;
DROP TABLE IF EXISTS Club;
DROP TABLE IF EXISTS Championship;
DROP TABLE IF EXISTS Staging;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE Competition (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255)
);

CREATE TABLE Class (
    AgeGroup VARCHAR(255),
    Gender VARCHAR(255),
    PRIMARY KEY (AgeGroup, Gender)
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

CREATE TABLE Club (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255),
    State VARCHAR(255)
);

CREATE TABLE Archer (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    DOB DATE,
    Gender VARCHAR(255),
    ClubID INT,
    FOREIGN KEY (ClubID) REFERENCES Club(ID)
);

CREATE TABLE RoundRecord (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    `Date` DATETIME,
    RoundID INT,
    Equipment VARCHAR(255),
    ArcherID INT,
    FOREIGN KEY (RoundID) REFERENCES `Round`(ID),
    FOREIGN KEY (Equipment) REFERENCES Division(Equipment),
    FOREIGN KEY (ArcherID) REFERENCES Archer(ID)
);

CREATE TABLE Staging (
    RoundRecordID INT,
    FOREIGN KEY (RoundRecordID) REFERENCES RoundRecord(ID)
);

CREATE TABLE Arrow (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    RoundRecordID INT,
    PertainingEnd INT,
    Score INT,
    FOREIGN KEY (RoundRecordID) REFERENCES RoundRecord(ID)
);

CREATE TABLE CompetitionDetails (
    CompetitionID INT,
    RoundID INT,
    AgeGroup VARCHAR(255),
    Gender VARCHAR(255),
    Equipment VARCHAR(255),
    FOREIGN KEY (CompetitionID) REFERENCES Competition(ID),
    FOREIGN KEY (AgeGroup, Gender) REFERENCES Class(AgeGroup, Gender),
    FOREIGN KEY (Equipment) REFERENCES Division(Equipment),
    FOREIGN KEY (RoundID) REFERENCES `Round`(ID)
);

CREATE TABLE CompetitionRecord (
    RoundRecordID INT,
    CompetitionID INT,
    FOREIGN KEY (RoundRecordID) REFERENCES RoundRecord(ID)
);

CREATE TABLE Championship (
    ClubID INT,
    CompetitionID INT,
    FOREIGN KEY (ClubID) REFERENCES Club(ID),
    FOREIGN KEY (CompetitionID) REFERENCES Competition(ID)
);
