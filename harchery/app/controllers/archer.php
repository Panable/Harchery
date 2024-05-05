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

        if (isset($data['RoundName'])) { // Round has been selected
            $name = htmlspecialchars($data['RoundName']);
            $encoded_name = str_replace('/', '|', $name);
            redirect("archer/stageScore/{$encoded_name}");
        }

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

    public function stageScore($round)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postRequestStageScore();
            return;
        }

        $is_prompt = ($round == -1);
        
        if ($is_prompt) {
            $round_names = $this->model->getRoundNames();
            $data = [
                'prompt_round' => true,
                'round_names' => $round_names,
            ];

            $this->view('archer/stage_score', $data);
        } else {
            // Get Some Round Shit

            $decoded_name = str_replace('|', '/', $round);
            echo "<h1>$decoded_name</h1>";

            $data = [
                'prompt_round' => false,
            ];
            $this->view('archer/stage_score', $data);
        }

    }

}

