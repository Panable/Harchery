DROP VIEW IF EXISTS ArcherRoundScores;
DROP VIEW IF EXISTS ClubCompetitionResults;
DROP VIEW IF EXISTS CompetitionArcherScores;
DROP VIEW IF EXISTS EquivalentRounds;
DROP VIEW IF EXISTS EquivalentRoundsView;
DROP VIEW IF EXISTS SimplifiedEquivalentRoundsView;
DROP VIEW IF EXISTS StagedRounds;
DROP VIEW IF EXISTS EquivalentRound;
DROP VIEW IF EXISTS ChampionshipScores;

-- By Max
-- Requirement
CREATE VIEW ArcherRoundScores AS
-- Links Firstname and Lastname together
SELECT CONCAT(a.FirstName, ' ', a.LastName) AS ArcherName,
    -- ArcherID is needed for sessions
    rr.ArcherID,
    r.Name AS RoundName,
    r.Range AS RoundRange,
    rr.`Date`,
    -- Calculates total of all arrows within a round
    SUM(ar.Score) AS TotalScore
-- Takes the data from RoundRecord table
FROM RoundRecord rr
-- Joins relevant data from Round table
JOIN `Round` r ON rr.RoundID = r.ID
-- subquery calculates the sum of the scores for each arrow, grouped by roundRecordId
JOIN (
    SELECT RoundRecordID, SUM(Score) AS Score
    FROM Arrow
    GROUP BY RoundRecordID
) ar ON rr.ID = ar.RoundRecordID
-- Joins relevant data from Round table
JOIN Archer a ON rr.ArcherID = a.ID
-- filters out roundRecords that have staging data
LEFT JOIN Staging s ON rr.ID = s.RoundRecordID
-- Filters out rows where staging data exists
WHERE s.RoundRecordID IS NULL
-- I forgot to add a comment here :) 
GROUP BY rr.ArcherID, r.Name, r.Range, rr.`Date`;

-- Archers want to look up club competition results and see how everyone has placed and who shot what score.
-- CompetitionID = 1 for now.
CREATE VIEW ClubCompetitionResults AS
SELECT
    A.FirstName,
    A.LastName,
    CR.RoundRecordID,
    SUM(AR.score) AS TotalScores
FROM
    CompetitionRecord CR
        INNER JOIN RoundRecord RR ON CR.RoundRecordID = RR.ID
        INNER JOIN Archer A ON RR.ArcherID = A.ID
        INNER JOIN Arrow AR ON RR.ID = AR.RoundRecordID
WHERE
    CR.CompetitionID = 1
GROUP BY
    A.ID,
    CR.RoundRecordID
ORDER BY
    TotalScores DESC;

CREATE VIEW CompetitionArcherScores AS
SELECT 
    C.ID AS CompetitionID,
    C.Name AS CompetitionName,
    CONCAT(A.FirstName, ' ', A.LastName) AS ArcherFullName,
    SUM(Ar.Score) AS ArcherScore
FROM 
    Competition C
JOIN 
    CompetitionRecord CR ON C.ID = CR.CompetitionID
JOIN 
    RoundRecord RR ON CR.RoundRecordID = RR.ID
JOIN 
    Archer A ON RR.ArcherID = A.ID
JOIN 
    Arrow Ar ON RR.ID = Ar.RoundRecordID
LEFT JOIN 
    Staging S ON RR.ID = S.RoundRecordID AND S.RoundRecordID IS NULL
GROUP BY
    C.ID, C.Name, A.ID;

CREATE VIEW ChampionshipScores AS
SELECT 
    CAS.CompetitionID,
    CAS.CompetitionName,
    CAS.ArcherFullName,
    CAS.ArcherScore
FROM 
    CompetitionArcherScores CAS
JOIN 
    Championship CH ON CAS.CompetitionID = CH.CompetitionID;

CREATE VIEW StagedRounds AS
SELECT 
    Archer.FirstName,
    Archer.LastName,
    `Round`.Name AS RoundName,
    RoundRecord.`Date`,
    GROUP_CONCAT(DISTINCT RoundRecord.ID ORDER BY RoundRecord.ID ASC SEPARATOR ', ') AS PertainingRoundRecordIDs,
    Club.ID AS ClubID
FROM 
    RoundRecord
INNER JOIN 
    Staging ON RoundRecord.ID = Staging.RoundRecordID
INNER JOIN 
    Archer ON RoundRecord.ArcherID = Archer.ID
INNER JOIN 
    `Round` ON RoundRecord.RoundID = `Round`.ID
INNER JOIN 
    Club ON Archer.ClubID = Club.ID
GROUP BY 
    Archer.FirstName, Archer.LastName, `Round`.Name, RoundRecord.`Date`, Club.ID;

CREATE VIEW EquivalentRound AS
WITH RoundSets AS (
    SELECT
        Name,
        GROUP_CONCAT(CONCAT(`Range`, '-', TotalEnds, '-', Face) ORDER BY `Range`, TotalEnds, Face SEPARATOR ',') AS RoundDefinition
    FROM Round
    GROUP BY Name
),
GroupedRounds AS (
    SELECT
        RoundDefinition,
        GROUP_CONCAT(Name ORDER BY Name SEPARATOR ', ') AS EquivalentNames
    FROM RoundSets
    GROUP BY RoundDefinition
),
ExpandedRounds AS (
    SELECT
        Name AS EquivalentName,
        EquivalentNames
    FROM GroupedRounds
    JOIN RoundSets ON GroupedRounds.RoundDefinition = RoundSets.RoundDefinition
)
SELECT EquivalentName, EquivalentNames
FROM ExpandedRounds
ORDER BY EquivalentName, EquivalentNames;

CREATE OR REPLACE VIEW ClubBestScores AS
WITH ScoreSummary AS (
    SELECT 
        c.ID AS ClubID,
        c.Name AS ClubName,
        r.ID AS RoundID,
        r.Name AS RoundName,
        a.ID AS ArcherID,
        CONCAT(a.FirstName, ' ', a.LastName) AS ArcherName,
        SUM(ar.Score) AS TotalScore
    FROM 
        Club c
    JOIN 
        Archer a ON c.ID = a.ClubID
    JOIN 
        RoundRecord rr ON a.ID = rr.ArcherID
    JOIN 
        Arrow ar ON rr.ID = ar.RoundRecordID
    JOIN 
        `Round` r ON rr.RoundID = r.ID
    GROUP BY 
        c.ID, c.Name, r.ID, r.Name, a.ID, ArcherName
),
MaxScores AS (
    SELECT 
        ClubID,
        RoundID,
        MAX(TotalScore) AS MaxScore
    FROM 
        ScoreSummary
    GROUP BY 
        ClubID, RoundID
)
SELECT 
    ss.ClubID,
    ss.ClubName,
    ss.RoundID,
    ss.RoundName,
    ss.ArcherID,
    ss.ArcherName,
    ss.TotalScore
FROM 
    ScoreSummary ss
JOIN 
    MaxScores ms ON ss.ClubID = ms.ClubID AND ss.RoundID = ms.RoundID AND ss.TotalScore = ms.MaxScore;
