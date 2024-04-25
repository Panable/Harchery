<?php
/*
 * Pages Class
 * Extends the base Controller class, handles rendering different pages
 */
class pages extends controller
{
    /*
     * Constructor method
     * Initializes the model for handling menu data
     */
    public function __construct()
    {
        //$this->postModel = $this->model('menumodel');
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
        $this->view('pages/index', $data);
    }

    /*
     * Method to handle the about page
     * Renders the about us page
     */
    public function about()
    {
        $data = ['title' => 'About Us'];
        $this->view('pages/about', $data);
    }

    /*
     * Method to handle the status page
     * Renders the status page
     */
    public function status()
    {
        $this->view('pages/status');
    }
}
