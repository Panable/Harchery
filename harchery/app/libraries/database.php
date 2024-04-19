<?php
/*
 * Database Class
 * Handles database connections and operations using PDO
 */

class database
{
    // Database connection parameters
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    // Database handler, statement, and error variables
    private $dbh;
    public $stmt;
    private $error;

    // Constructor to establish a database connection using PDO
    public function __construct()
    {
        // Define the Data Source Name (DSN)
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        // PDO connection options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            // Create a new PDO instance
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            // Catch and display any connection errors
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Method to retrieve the last inserted ID
    public function getLastInsertID()
    {
        return $this->dbh->lastInsertId();
    }

    // Method to prepare a SQL query
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Method to bind parameters to a prepared statement
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Method to execute a prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Method to fetch a result set as an array of objects
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Method to fetch a single row as an object
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Method to get the number of affected rows
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
