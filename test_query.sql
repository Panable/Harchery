SELECT r.Name AS round_name, rr.`Date`, CONCAT(a.FirstName, ' ', a.LastName) AS archer_name, c.Name AS club_name
FROM Staging s
JOIN RoundRecord rr ON s.RoundRecordID = rr.ID
JOIN `Round` r ON rr.RoundID = r.ID
JOIN Archer a ON rr.ArcherID = a.ID
JOIN Club c ON a.ClubID = c.ID
WHERE c.ID = 89;
