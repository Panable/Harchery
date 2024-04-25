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

    public function recorder()
    {
        //$posts = $this->postModel->getMenu();
        $data = [
            'title' => 'Welcome',
        ];
        $this->view('pages/index', $data);
    }
}
