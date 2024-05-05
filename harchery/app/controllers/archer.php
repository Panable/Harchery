<?php
class archer extends controller
{
    public function __construct()
    {
        $this->model = $this->newModel('archermodel');
    }

    function postRequestStageScore()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data = $_POST;

        print_r($data);
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

    public function viewRounds() 
    {
        $rounds = $this->model->getRounds();
        $data = [
            'Rounds' => $rounds,
        ];

        $this->view('archer/view_rounds', $data);
    }

    public function viewCompetitionResults()
    {
        $data = [
            
        ];
        $this->view('archer/view_competition_results', $data);
    }

    public function stageScore()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postRequestStageScore();
            return;
        }

        $data = [
        ];

        $this->view('archer/stage_score', $data);
    }

}

