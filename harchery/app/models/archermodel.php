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

    function getScores($archerID) {
        try {
            $score_sql = "SELECT * FROM ArcherRoundScores WHERE ArcherID=:archerID";

        $this->db->query($score_sql);
        $this->db->bind(":archerID", $archerID);
        $data = $this->db->resultSet();
        return $data;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
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

        foreach ($ranges as $record) {
            $range = $record['Range'];
            $roundID = $this->roundNameAndRangeToID($roundName, $range);
            $round_record_insert = [
                '`Date`' => $date,
                '`RoundID`' => $roundID,
                'Equipment' => $division,
                'ArcherID' => $archerID,
            ];
            $this->createRow('RoundRecord', $round_record_insert);
            $roundRecordID = $this->db->getLastInsertID();
            $scores = explode(',', $record['Scores']);
            foreach ($scores as $index => $score) {
                $this->createRow(
                "Arrow", [
                    'RoundRecordID' => $roundRecordID, 
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

        foreach ($ranges as $record) {
            $range = $record['Range'];
            $roundID = $this->roundNameAndRangeToID($roundName, $range);
            $round_record_insert = [
                '`Date`' => $date,
                '`RoundID`' => $roundID,
                'Equipment' => $division,
                'ArcherID' => $archerID,
            ];
            $this->createRow('RoundRecord', $round_record_insert);
            $roundRecordID = $this->db->getLastInsertID();
            $scores = explode(',', $record['Scores']);
            foreach ($scores as $index => $score) {
                $this->createRow(
                "Arrow", [
                    'RoundRecordID' => $roundRecordID, 
                    "PertainingEnd" => $index + 1, 
                    'Score' => $score, 
                ]);
            }
        }
        $this->db->commit();
    }
}
