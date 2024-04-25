<?php
class archer extends controller
{
    public function __construct()
    {
        //$this->postModel = $this->model('menumodel');
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome',
        ];
        $this->view('archer/index', $data);
    }

}

