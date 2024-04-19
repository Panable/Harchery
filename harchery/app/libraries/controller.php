<?php
/*
 * Base Controller
 * Loads models and views
 */
class controller
{
    // Instance variable to hold the model object
    protected $postModel;

    // Function to load a model
    public function model($model)
    {
        // Require the model file
        require_once __DIR__ . '/../models/' . $model . '.php';

        // Instantiate and return the model
        return new $model();
    }

    // Function to load a view with optional data
    public function view($view, $data = [])
    {
        // Check if the view file exists
        if (file_exists(__DIR__ . '/../views/' . $view . '.php')) {
            // Require the view file
            require_once(__DIR__ . '/../views/' . $view . '.php');
        } else {
            // Display an error message if the view does not exist
            die('View does not exist');
        }
    }
}
