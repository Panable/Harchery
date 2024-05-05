DROP VIEW IF EXISTS ArcherRoundScores;

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


-- From: CompetitionResult.sql by Sanya
-- Requirement?
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

-- Display RoundRecord and total score of the corresponding Arrow
SELECT
    RR.ID AS RoundRecordID,
    RR.`Date`,
    R.Name AS RoundName,
    RR.Equipment,
    A.FirstName,
    A.LastName,
    A.DOB,
    A.Gender,
    C.Name AS ClubName,
    SUM(Ar.Score) AS TotalScore
FROM
    RoundRecord RR
        INNER JOIN Archer A ON RR.ArcherID = A.ID
        INNER JOIN `Round` R ON RR.RoundID = R.ID
        INNER JOIN Club C ON A.ClubID = C.ID
        LEFT JOIN Arrow Ar ON RR.ID = Ar.RoundRecordID
WHERE
    A.FirstName = 'ArcherFirstName' AND A.LastName = 'ArcherLastName' -- Replace 'ArcherFirstName' and 'ArcherLastName' with the archer's actual first and last names
GROUP BY
    RR.ID, RR.`Date`, R.Name, RR.Equipment, A.FirstName, A.LastName, A.DOB, A.Gender, C.Name;
