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
}
