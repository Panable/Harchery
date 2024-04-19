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
}
