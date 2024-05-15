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
            $encoded_name = str_replace(' ', '_', $encoded_name);
            redirect("archer/stageScore/{$encoded_name}");
        }

        $decoded_name = str_replace('|', '/', $data['RName']);
        $decoded_name = str_replace('_', ' ', $decoded_name);
        
        $data['RoundName'] = $decoded_name;

        try {
            $this->model->stageScore($data);
            status_msg("Ye have successfully staged yer round there bud~!");
        } catch (Exception $e) {
            status_msg("FAILED TO STAGE ROUND $e");
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome',
        ];
        $this->view('archer/index', $data);
    }
    
    public function viewScore() {
    try {
        // Check if the user is an archer
        if (!getSession('UserID') || getSession('UserType') != 'Archer') {
            status_msg("You are... uh not an archer?");
            return; // Exit the method if the user is not an archer
        }

        // Get the archer ID
        $archer_id = getSession('UserID'); 

        // Retrieve form data from POST
        $formData = $_POST;

        // Prepare array to store filter conditions
        $filters = [];

        // Loop through form data to extract filter conditions
        foreach ($formData as $key => $value) {
            // Check if the field starts with 'clause_'
            if (strpos($key, 'clause_') === 0 && !empty($value)) {
                // Extract the condition name from the key
                $conditionName = substr($key, strlen('clause_'));

                // Remove the 'clause_' prefix and store the condition in the filters array
                $filters[$conditionName] = $value;
            }
        }

        // Call the getScores method with archer ID and filter conditions
        $scores = $this->model->getScores($archer_id, $filters);
        $baseScores = $this->model->getBaseScores($archer_id);


        // Pass scores to the view
        $data = [
            'Scores' => $scores,
            'BaseScores' => $baseScores,
        ];

        $this->view('archer/view_score', $data);
    } catch (Exception $e) {
        // Handle exceptions
        echo "Error: " . $e->getMessage();
    }
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
    public function viewChampionshipResults()
    {
        $data = [
            
        ];
        $this->view('archer/view_championship_results', $data);
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
                'PromptRound' => true,
                'round_names' => $round_names,
            ];

            $this->view('archer/stage_score', $data);
        } else {
            // Get Some Round Shit

            $decoded_name = str_replace('|', '/', $round);
            $decoded_name = str_replace('_', ' ', $decoded_name);
            //echo "<h1>$decoded_name</h1>";


            if (!getSession('UserID') || getSession('UserType') != 'Archer')
                status_msg("You are... uh not an archer?");

            $round = $this->model->getRound($decoded_name);
            $division = $this->model->getDivisions();
            $archer_id = getSession('UserID');

            $data = [
                'PromptRound' => false,
                'Round' => $round,
                'Division' => $division,
                'ArcherID' => $archer_id,
            ];
            $this->view('archer/stage_score', $data);
        }

    }

}

