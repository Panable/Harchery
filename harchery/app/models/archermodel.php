<?php

class archermodel extends model
{
    function getRoundNames() {
        try {
            $rounds_sql = "SELECT Name From Round Group By Name";

            $this->db->query($rounds_sql);
            $data = $this->db->resultColumn();
            return $data;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    function getDivisions() {
        try {
            $rounds_sql = "SELECT Equipment From Division";

            $this->db->query($rounds_sql);
            $data = $this->db->resultColumn();
            return $data;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    function getRound($search_name)
    {
        try {
            $sql = "SELECT *
                    FROM Round WHERE Name=:name 
                    ORDER BY `Range` DESC;";

            $this->db->query($sql);
            $this->db->bind(":name", $search_name);
            $this->db->execute();
            return $this->db->resultSet();

        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    /* Hard to read function, but basically
    Queries SELECT * From Round
    But that output is hard* to use for the view
    So the first part of the function lays the data
    in a way thats easy to use then finally
    We sort in descending order so we can generate the
    table easier */
    function getRounds()
    {
        $raw_rounds = $this->readTable('`Round`');
        $processed_rounds = [];

        foreach ($raw_rounds as $round) {
            $name = $round->Name;

            // Name doesn't exist
            if (!array_key_exists($name, $processed_rounds)) {
                $processed_rounds[$name] = [
                    'Distance' => [] // Initializing an empty array for 'Distance'
                ];
            }

            $new_distance = [
                'Range' => (int)$round->Range,
                'TotalEnds' => (int)$round->TotalEnds,
                'Face' => (int)$round->Face,
            ];

            array_push($processed_rounds[$name]['Distance'], $new_distance); // Push Range
        }

        // SORT IN DESCENDING ORDER

        // Iterate over each round in processed_rounds
        foreach ($processed_rounds as &$round) {
            // Sort the 'Distance' array inside each round based on the 'Range' value in ascending order
            usort($round['Distance'], function($a, $b) {
                return $b['Range'] - $a['Range'];
            });
        }

        return $processed_rounds;
    }

    function getBaseScores($archerID) {
        try {
           
            // Database query
            $score_sql = "SELECT * FROM ArcherRoundScores WHERE ArcherID=:archerID";

            // Executes query
            $this->db->query($score_sql);

            // Bind archerID parameter
            $this->db->bind(":archerID", $archerID);

            // dw this is just for the MVC
            $data = $this->db->resultSet();

            // returns query output
            return $data;
        } catch (PDOException $e) {
            // Displays error if present
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
    

    function getScores($archerID, $formData, $sortOptions = [], $isPersonalBest = false) {
        try {
            // Database query
            $score_sql = "SELECT * FROM ArcherRoundScores WHERE ArcherID=:archerID";

            // Get additional conditions from form data
            $clauses = $this->prepareClauses($formData);

            // Append the additional conditions to the SQL query
            if (!empty($clauses)) {
                $score_sql .= " AND " . implode(" AND ", $clauses);
            }
        // Modify the query to get personal best if needed
        if ($isPersonalBest) {
            $score_sql = "
                SELECT a.* 
                FROM ArcherRoundScores a
                INNER JOIN (
                    SELECT RoundName, MAX(TotalScore) AS max_score
                    FROM ArcherRoundScores
                    WHERE ArcherID=:archerID
                    GROUP BY RoundName
                ) b
                ON a.RoundName = b.RoundName AND a.TotalScore = b.max_score
                WHERE a.ArcherID = :archerID
            ";
        }
            // Add sorting options to the SQL query
            if (!empty($sortOptions)) {
                $orderByClauses = [];
                foreach ($sortOptions as $field => $direction) {
                    $orderByClauses[] = "$field $direction";
                }
                $score_sql .= " ORDER BY " . implode(", ", $orderByClauses);
            }

            // Executes query
            $this->db->query($score_sql);

            // Bind archerID parameter
            $this->db->bind(":archerID", $archerID);

            // Bind additional parameters from formData
            foreach ($formData as $key => $value) {
                $this->db->bind(":" . $key, $value);
            }

            // dw this is just for the MVC
            $data = $this->db->resultSet();
            // returns query output
            return $data;
        } catch (PDOException $e) {
            // Displays error if present
            throw new Exception("Database error: " . $e->getMessage());
        }
    }


   function prepareClauses($formData) {
    $additionalClauses = [];

    // Loop through the form data to parse associative clauses
    foreach ($formData as $key => $value) {
        // Add the condition to the additionalClauses array
        $additionalClauses[] = "`$key` = :$key";
    }

    return $additionalClauses;
}

    function roundNameAndRangeToID($name, $range)
    {
        $sql = "SELECT ID FROM `Round` WHERE Name=:name AND `Range`=:range";

        try {
            $this->db->query($sql);
            $this->db->bind(':name', $name);
            $this->db->bind(':range', $range);
            $data = $this->db->resultColumn();
            return $data[0];
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // add this functionality
    function stageScore($data) {
        $archerID = $data['ArcherID'];
        $division = $data['Division'];
        $ranges = $data['Ranges'];
        $date = $data['Date'];
        $roundName = $data['RoundName'];

        $this->db->beginTransaction();

        $roundRecordIDS = [];

        foreach ($ranges as $record) {
            $range = $record['Range'];
            if (!array_key_exists($range, $roundRecordIDS)) {
                $roundID = $this->roundNameAndRangeToID($roundName, $range);
                $round_record_insert = [
                    '`Date`' => $date,
                    '`RoundID`' => $roundID,
                    'Equipment' => $division,
                    'ArcherID' => $archerID,
                ];
                $this->createRow('RoundRecord', $round_record_insert);
                $roundRecordID = $this->db->getLastInsertID();
                $roundRecordIDS[$range] =  $roundRecordID;
            }
            $scores = explode(',', $record['Scores']);
            foreach ($scores as $index => $score) {
                $rrid = $roundRecordIDS[$range];
                $this->createRow(
                "Arrow", [
                    'RoundRecordID' => $rrid, 
                    "PertainingEnd" => $index + 1, 
                    'Score' => $score, 
                ]);
            }
            $this->createRow(
            "Staging", [
                'RoundRecordID' => $roundRecordID, 
             ]);
        }
        $this->db->commit();
    }

    function enterScore($data) {
        $archerID = $data['ArcherID'];
        $division = $data['Division'];
        $ranges = $data['Ranges'];
        $date = $data['Date'];
        $roundName = $data['RoundName'];

        $this->db->beginTransaction();

        $roundRecordIDS = [];

        foreach ($ranges as $record) {
            $range = $record['Range'];
            if (!array_key_exists($range, $roundRecordIDS)) {
                $roundID = $this->roundNameAndRangeToID($roundName, $range);
                $round_record_insert = [
                    '`Date`' => $date,
                    '`RoundID`' => $roundID,
                    'Equipment' => $division,
                    'ArcherID' => $archerID,
                ];
                $this->createRow('RoundRecord', $round_record_insert);
                $roundRecordID = $this->db->getLastInsertID();
                $roundRecordIDS[$range] =  $roundRecordID;
            }
            $scores = explode(',', $record['Scores']);
            foreach ($scores as $index => $score) {
                $rrid = $roundRecordIDS[$range];
                $this->createRow(
                "Arrow", [
                    'RoundRecordID' => $rrid, 
                    "PertainingEnd" => $index + 1, 
                    'Score' => $score, 
                ]);
            }
        }
        $this->db->commit();
    }


    public function getClubIDByArcherID($archerID) {
        try {
            $sql = "SELECT ClubID FROM Archer WHERE ID = :archerID";
            $this->db->query($sql);
            $this->db->bind(':archerID', $archerID);
            $row = $this->db->single();
            return $row ? $row->ClubID : null;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function getClubTopScores($clubID, $limit = 10) {
        try {
            $score_sql = "SELECT ClubID, ClubName, RoundID, RoundName, ArcherID, ArcherName, TotalScore
                          FROM ClubBestScores
                          WHERE ClubID = :clubID
                          ORDER BY TotalScore DESC
                          LIMIT :limit";
            $this->db->query($score_sql);
            $this->db->bind(':clubID', $clubID);
            $this->db->bind(':limit', $limit, PDO::PARAM_INT);
            $data = $this->db->resultSet();
            return $data;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function getAllClubs() {
        try {
            $sql = "SELECT ID, Name, State FROM Club LIMIT 150";
            $this->db->query($sql);
            $data = $this->db->resultSet();
            return $data;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}

