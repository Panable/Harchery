DROP VIEW IF EXISTS ArcherRoundScores;

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
GROUP BY rr.ArcherID, rr.ID;
