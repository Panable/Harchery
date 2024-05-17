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
    Name VARCHAR(255) NOT NULL
);

CREATE TABLE Class (
    AgeGroup VARCHAR(255) NOT NULL,
    Gender VARCHAR(255) NOT NULL,
    PRIMARY KEY (AgeGroup, Gender)
);

CREATE TABLE Division (
    Equipment VARCHAR(255) PRIMARY KEY
);

CREATE TABLE `Round` (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    `Range` INT NOT NULL,
    TotalEnds INT NOT NULL,
    Face INT NOT NULL,
    UNIQUE (Name, `Range`, TotalEnds, Face)
);

CREATE TABLE Club (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    State VARCHAR(255) NOT NULL
);

CREATE TABLE Archer (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    DOB DATE NOT NULL,
    Gender VARCHAR(255) NOT NULL,
    ClubID INT NOT NULL,
    FOREIGN KEY (ClubID) REFERENCES Club(ID)
);

CREATE TABLE RoundRecord (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    `Date` DATETIME NOT NULL,
    RoundID INT NOT NULL,
    Equipment VARCHAR(255) NOT NULL,
    ArcherID INT NOT NULL,
    FOREIGN KEY (RoundID) REFERENCES `Round`(ID),
    FOREIGN KEY (Equipment) REFERENCES Division(Equipment),
    FOREIGN KEY (ArcherID) REFERENCES Archer(ID)
);

CREATE TABLE Staging (
    RoundRecordID INT NOT NULL,
    FOREIGN KEY (RoundRecordID) REFERENCES RoundRecord(ID)
);

CREATE TABLE Arrow (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    RoundRecordID INT NOT NULL,
    PertainingEnd INT NOT NULL,
    Score INT NOT NULL,
    FOREIGN KEY (RoundRecordID) REFERENCES RoundRecord(ID)
);

CREATE TABLE CompetitionDetails (
    CompetitionID INT NOT NULL,
    RoundID INT NOT NULL,
    AgeGroup VARCHAR(255) NOT NULL,
    Gender VARCHAR(255) NOT NULL,
    Equipment VARCHAR(255) NOT NULL,
    FOREIGN KEY (CompetitionID) REFERENCES Competition(ID),
    FOREIGN KEY (AgeGroup, Gender) REFERENCES Class(AgeGroup, Gender),
    FOREIGN KEY (Equipment) REFERENCES Division(Equipment),
    FOREIGN KEY (RoundID) REFERENCES `Round`(ID)
);

CREATE TABLE CompetitionRecord (
    RoundRecordID INT NOT NULL,
    CompetitionID INT NOT NULL,
    FOREIGN KEY (RoundRecordID) REFERENCES RoundRecord(ID)
);

CREATE TABLE Championship (
    ClubID INT NOT NULL,
    CompetitionID INT NOT NULL,
    FOREIGN KEY (ClubID) REFERENCES Club(ID),
    FOREIGN KEY (CompetitionID) REFERENCES Competition(ID)
);

CREATE INDEX idx_arr_rr_id ON Arrow (RoundRecordID);
CREATE INDEX idx_rr_archer_name ON RoundRecord(ArcherID);
CREATE INDEX idx_round_name ON Round(Name);
CREATE INDEX idx_round_range ON Round(`Range`);
