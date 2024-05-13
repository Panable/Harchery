<?php
/*
 * MenuModel Class
 * Extends the base Model class, handles database operations related to menus and generic table operations
 */

class recordermodel extends model
{
    // Get all Age Groups
    // SELECT AgeGroup From Class GROUP BY AgeGroup;
    
    // Get all Genders on AgeGroup
    // SELECT Gender FROM Class Where AgeGroup="Open"


    // [Categories] -> ['Name'], '[Gender'] => ['Male, 'Female']
    
    function getEquipment() {
        try {
            $equipment_sql = "SELECT Equipment From Division;";

            $this->db->query($equipment_sql);
            $data = $this->db->resultColumn();
            return $data;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
    
    function getCategories() {
        try {
            $age_group_sql = "SELECT AgeGroup From Class GROUP BY AgeGroup;";

            $this->db->query($age_group_sql);
            $data = $this->db->resultSet();
            foreach ($data as $row) {
                $gender_sql = "SELECT Gender FROM Class Where AgeGroup=\"{$row->AgeGroup}\"";
                $this->db->query($gender_sql);
                $genders = $this->db->resultColumn();
                $row->Genders = $genders;
            }
            return $data;

        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    function getRounds() {
        try {
            $rounds_sql = "SELECT Name From Round Group By Name";

            $this->db->query($rounds_sql);
            $data = $this->db->resultColumn();
            return $data;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    function createCompetition($data) {

        // Create Competition Table Record.
        $competitionName = $data['CompetitionName'];
        try {
            $this->createRow('Competition', ['Name' => $competitionName]);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }

        // Get Competition ID
        $competitionID = $this->db->getLastInsertID();
        
        // Create Competition Details.
        foreach($data['CompetitionDetails'] as $details) {
            $roundIDs = $this->roundNameToID($details['RoundName']);
            $ageGroup = $details['AgeGroup'];
            $gender = $details['Gender'];
            $equipment = $details['Equipment'];

            foreach ($roundIDs as $roundID) {
                $competitionDetails = [
                    'CompetitionID' => $competitionID,
                    'RoundID' => $roundID,
                    'AgeGroup' => $ageGroup,
                    'Gender' => $gender,
                    'Equipment' => $equipment,
                ];
                try {
                    $this->createRow('CompetitionDetails', $competitionDetails);
                } catch (PDOException $e) {
                    throw new Exception("Database error: " . $e->getMessage());
                }
            }
        }
        return $competitionID;
    }

    function createChampionship($data)
    {
        try {
            $this->disableForeignKeyChecks();
            $competitionID = $this->createCompetition($data);
            $clubID = $data['ClubID'];
            $this->createRow('Championship', ['ClubID' => $clubID, 'CompetitionID' => $competitionID]);
            $this->enableForeignKeyChecks();
        } catch (PDOException $e) {
            $this->enableForeignKeyChecks();
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    function createRound($data) {
        $roundName = $data['RoundName'];
        foreach ($data['distances'] as $round) {
            $distance = $round['distance'];
            $totalEnds = $round['ends'];
            $face = $round['face'];

            try {
                $sqltest = "INSERT INTO `Round` (Name, `Range`, TotalEnds, Face) VALUES (:Name, :`Range`, :TotalEnds, :Face)";

                $this->createRow(
                "`Round`", [
                    'Name' => $roundName, 
                    "`Range`" => $distance, 
                    'TotalEnds' => $totalEnds, 
                    'Face' => $face,
                ]);
            } catch (PDOException $e) {
                throw new Exception("Database error: " . e->getMessage());
            }

        }
    }

    function roundNameToID($name)
    {
        $sql = "SELECT ID FROM Round WHERE Name = :name";

        try {
            $this->db->query($sql);
            $this->db->bind(':name', $name);
            return $data = $this->db->resultColumn();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    function viewStagedScores($club_id)
    {
        $sql = "SELECT * FROM StagedRounds WHERE ClubID=:clubID";

        try {
            $this->db->query($sql);
            $this->db->bind(':clubID', $club_id);
            return $data = $this->db->resultSet();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    function acceptStagedScore($stageData)
    {
        // where stagedata = 
        $sql = "DELETE FROM Staging WHERE RoundRecordID IN ($stageData)";
        try {
            $this->db->query($sql);
            $this->db->execute();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    function denyStagedScore($stageData)
    {
        try {
            $sql = "DELETE FROM Staging WHERE RoundRecordID IN ($stageData)";
            $this->db->query($sql);
            $this->db->execute();
            $sql = "DELETE FROM Arrow WHERE RoundRecordID IN ($stageData)";
            $this->db->query($sql);
            $this->db->execute();
            $sql = "DELETE FROM RoundRecord WHERE ID IN ($stageData)";
            $this->db->query($sql);
            $this->db->execute();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}
