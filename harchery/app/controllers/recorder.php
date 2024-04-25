<?php
/*
 * Pages Class
 * Extends the base Controller class, handles rendering different pages
 */
class recorder extends controller
{
    /*
     * Constructor method
     * Initializes the model for handling menu data
     */
    public function __construct()
    {
        $this->postModel = $this->model('recordermodel');
    }

    /*
     * Method to handle the index page
     * Renders either the control panel or the welcome page based on user login status
     */
    public function index()
    {
        //$posts = $this->postModel->getMenu();
        $data = [
            'title' => 'Welcome',
        ];
        $this->view('recorder/index', $data);
    }

    public function newarcher()
    {
        $clubs = $this->postModel->getClubs();
        $data = [
            'clubs' => $clubs
        ];
        $this->view('recorder/create_archer', $data);
    }
}
