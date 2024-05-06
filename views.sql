DROP VIEW IF EXISTS ArcherRoundScores;
DROP VIEW IF EXISTS CompetitionArcherScores;
DROP VIEW IF EXISTS ClubCompetitionResults;

-- By Max
-- Requirement
CREATE VIEW ArcherRoundScores AS
SELECT CONCAT(a.FirstName, ' ', a.LastName) AS ArcherName,
       rr.ArcherID,
       rr.ID AS RoundRecordID,
       r.Name AS RoundName,
       r.Range AS RoundRange,
       rr.`Date`,
       SUM(ar.Score) AS TotalScore
FROM RoundRecord rr
JOIN `Round` r ON rr.RoundID = r.ID
JOIN Arrow ar ON rr.ID = ar.RoundRecordID
JOIN Archer a ON rr.ArcherID = a.ID
LEFT JOIN Staging s ON rr.ID = s.RoundRecordID
WHERE s.RoundRecordID IS NULL
GROUP BY rr.ArcherID, rr.ID;


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

