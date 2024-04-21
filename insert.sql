SET FOREIGN_KEY_CHECKS = 0;

-- Insert statements for Competition table
INSERT INTO Competition (Name) VALUES 
('Summer Tournament'),
('Winter Classic'),
('Spring Cup');

-- Insert statements for Class table
INSERT INTO Class (AgeGroup, Gender) VALUES 
('Adult', 'Male'),
('Youth', 'Female'),
('Junior', 'Male'),
('Open', 'Female'),
('Open', 'Male'),
('50+',	'Female'),
('50+',	'Male'),
('60+',	'Female'),
('60+',	'Male'),
('70+',	'Female'),
('70+',	'Male'),
('Under 21', 'Female'),
('Under 21', 'Male'),
('Under 18', 'Male'),
('Under 16', 'Female'),
('Under 16', 'Male'),
('Under 14', 'Female'),
('Under 14', 'Male');

-- Insert statements for Division table
INSERT INTO Division (Equipment) VALUES 
('Recurve'),
('Compound'),
('Recurve Barebow'),
('Compound Barebow'),
('Longbow');

-- Insert statements for Round table
INSERT INTO `Round` (Name, `Range`, TotalEnds, Face) VALUES 
('WA90/1440', 90, 6, 120),
('WA90/1440', 70, 6, 120),
('WA90/1440', 50, 6, 80),
('WA90/1440', 30, 6, 80);

-- Insert statements for Club table
INSERT INTO Club (Name, State) VALUES 
('Canberra Archery Club', 'ACT'),
('Victoria Archery Club', 'VIC'),
('Box Hill City Club', 'VIC'),
('Bondi Archers Inc.', 'NSW'),
('Coast Archers', 'NSW');

-- Insert statements for Archer table
INSERT INTO Archer (FirstName, DOB, Gender, ClubID) VALUES 
('John', '1990-05-15', 'Male', 1),
('Emily', '2002-08-21', 'Female', 2),
('Michael', '1998-02-10', 'Male', 3);

-- Insert statements for RoundRecord table
INSERT INTO RoundRecord (`Date`, RoundID, Equipment, ArcherID) VALUES 
('2024-04-01', 1, 'Recurve', 1),
('2024-04-02', 2, 'Compound', 2),
('2024-04-03', 3, 'Traditional', 3);

-- Insert statements for Arrow table
INSERT INTO Arrow (RoundRecordID, PertainingEnd, Score) VALUES 
(1, 1, 10),
(1, 2, 10),
(1, 3, 10),
(1, 4, 10),
(1, 5, 10);

-- Insert statements for CompetitionDetails table
INSERT INTO CompetitionDetails (CompetitionID, RoundID, AgeGroup, Gender, Equipment) VALUES 
(1, 1, 'Open', 'Male', 'Recurve'),
(1, 1, 'Open', 'Male', 'Compound'),
(1, 1, 'Under 21', 'Male', 'Recurve'),
(1, 1, 'Under 21', 'Male', 'Compound');

-- Insert statements for CompetitionRecord table
INSERT INTO CompetitionRecord (RoundRecordID, CompetitionID) VALUES 
(1, 1),
(2, 1),
(3, 2);

INSERT INTO Championship (ClubID, CompetitionID) VALUES
(1, 1),
(2, 2),
(3, 3);

SET FOREIGN_KEY_CHECKS = 1;
