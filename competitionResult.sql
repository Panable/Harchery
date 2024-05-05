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
