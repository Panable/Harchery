DROP VIEW IF EXISTS ArcherRoundScores;
DROP VIEW IF EXISTS CompetitionArcherScores;
DROP VIEW IF EXISTS ClubCompetitionResults;
DROP VIEW IF EXISTS StagedRounds;

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

-- From: CompetitionResult.sql by Sanya
-- Requirement?
CREATE VIEW CompetitionArcherScores AS
SELECT
    C.ID AS CompetitionID,
    C.Name AS CompetitionName,
    CONCAT(A.FirstName, ' ', A.LastName) AS ArcherFullName,
    Arr.Score AS ArcherScore
FROM
    Competition AS C
        INNER JOIN
    CompetitionDetails AS CD ON C.ID = CD.CompetitionID
        INNER JOIN
    RoundRecord AS RR ON CD.RoundID = RR.RoundID
        INNER JOIN
    Archer AS A ON RR.ArcherID = A.ID
        INNER JOIN
    Arrow AS Arr ON RR.ID = Arr.RoundRecordID
        LEFT JOIN
    Staging AS S ON RR.ID = S.RoundRecordID
WHERE
    S.RoundRecordID IS NULL
ORDER BY
    Arr.Score DESC;

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
