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

}
