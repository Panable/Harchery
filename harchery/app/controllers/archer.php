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

    public function viewScore()
    {
        $data = [
            
        ];
        $this->view('archer/view_score', $data);
    }
    public function viewCompetitionResults()
    {
        $data = [
            
        ];
        $this->view('archer/view_competition_results', $data);
    }


}

