<?php

/*
 * Base Model Class
 * Initializes a database connection for models to use
 */

class model
{
    // Database instance variable
    protected $db;

    // Constructor to initialize a database connection for the model
    public function __construct()
    {
        // Create a new database instance
        $this->db = new database;
    }

    // Method to read all records from a specified table
    public function readTable($table)
    {
        // Prepare and execute a query to select all records from the specified table
        $this->db->query("SELECT * FROM $table");

        // Initialize the result variable
        $result = '';

        try {
            // Attempt to retrieve and return the result set
            $result = $this->db->resultSet();
        } catch (PDOException $e) {
            // Catch and throw an exception for any database errors
            throw new Exception("Database error: " . $e->getMessage());
        }

        // Return the result set
        return $this->db->resultSet();
    }

    // Method to read a specific row from a specified table by ID
    public function readRow($table, $id)
    {
        try {
            // Prepare and execute a query to select a row with the specified ID from the specified table
            $this->db->query("SELECT * FROM $table WHERE ID = :id");
            $this->db->bind(':id', $id);
            $this->db->execute();

            // Check if a row was found
            if ($this->db->rowCount() == 0) {
                throw new Exception("Database error: No row was found. Row with ID $id may not exist in $table");
            }

            // Return the single result as an object
            return $this->db->single();

        } catch (PDOException $e) {
            // Catch and throw an exception for any database errors
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function disableForeignKeyChecks()
    {
        try {
            $sql = "SET foreign_key_checks = 0";
            $this->db->query($sql);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function enableForeignKeyChecks()
    {
        try {
            $sql = "SET foreign_key_checks = 1";
            $this->db->query($sql);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Method to get the column names of a specified table
    public function getColumnNames($table)
    {
        try {
            // Execute a query to show the columns from the specified table
            $sql = "SHOW COLUMNS FROM $table";
            $this->db->query($sql);

            // Get and return the result set
            $result = $this->db->resultSet();
            return $result;

        } catch (PDOException $e) {
            // Catch and throw an exception for any database errors
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Method to create a new row in a specified table with provided data
    public function createRow($table, $data)
    {
        // Remove 'id' from the data since it's auto-increment
        //unset($data['id']);

        // Generate placeholders for the columns and values
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        // Construct the SQL query for insertion
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        try {
            // Set the query in the database handler
            $this->db->query($sql);

            // Bind the data values to the placeholders
            foreach ($data as $column => $value) {
                $this->db->bind(":$column", $value);
            }

            // Execute the query
            $this->db->execute();

            // Check if a row was inserted (success)
        } catch (PDOException $e) {
            // Catch and throw an exception for any database errors
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Method to edit an existing row in a specified table with provided data
    public function editRow($table, $data)
    {
        // Generate a list of columns and values to update
        $updateData = [];
        foreach ($data as $column => $value) {
            $updateData[] = "$column = :$column";
        }

        // Construct the SQL query
        $updateColumns = implode(', ', $updateData);
        $sql = "UPDATE $table SET $updateColumns WHERE ID = :id";

        try {
            // Set the query in the database handler
            $this->db->query($sql);

            // Bind the ID
            $this->db->bind(':id', $data['id']);

            // Bind other data values
            foreach ($data as $column => $value) {
                $this->db->bind(":$column", $value);
            }

            // Execute the query
            $this->db->execute();

            // Check if any rows were affected (success)
            if ($this->db->rowCount() == 0) {
                throw new Exception("Database error: No rows were updated.");
            }
        } catch (PDOException $e) {
            // Catch and throw an exception for any database errors
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Method to delete an existing row from a specified table by ID
    public function deleteRow($table, $id)
    {
        try {
            // Prepare and execute a query to delete a row with the specified ID from the specified table
            $this->db->query("DELETE FROM $table WHERE ID = :id");
            $this->db->bind(':id', $id);
            $this->db->execute();

            // Check if any rows were affected (success)
            if ($this->db->rowCount() == 0) {
                throw new Exception("Database error: No rows were deleted. Row with ID $id may not exist in $table");
            }

        } catch (PDOException $e) {
            // Catch and throw an exception for any database errors
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}
