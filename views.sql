DROP VIEW IF EXISTS ArcherScores;
CREATE VIEW ArcherScores AS
SELECT
    (a.FirstName + a.LastName) AS ArcherName,
    rr.Date AS RoundRecordDate,
    r.Range AS Range,
    ao.PertainingEnd AS PertainingEnd,
    ao.Score AS ArrowScore
FROM
    Archer AS a

