<?php
class recorder extends controller
{

    public function __construct()
    {
        $this->model = $this->newModel('recordermodel');
    }

    private function postRequestArcherCreate()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $archerData = $_POST;
        $archerData['ClubID'] = getSession('UserID');
        try {
            $this->model->createRow('Archer', $_POST);
            status_msg("Ye have successfully added yer archer~!");
        } catch (Exception $e) {
            status_msg("FAILED TO ADD ARCHER $e");
        }
        
    }

    private function postRequestCompetitionCreate()
    {
        if (!isset($_POST['records']) || in_array('', $_POST['records'], true)) {
            status_msg("YOU DIDN'T SELECT A RECORD!");
            return;
        }

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $recs = $_POST['records'];

        $name = $_POST['CompetitionName'];

        $data = [
            'CompetitionDetails' => [],
            'CompetitionName' => $name,
        ];

        foreach ($recs[0] as $key => $value) {
            $pieces = explode(",", $key);

            $round_name = $pieces[0];
            $age_group = $pieces[1];
            $gender = $pieces[2];
            foreach($value as $val) {
                $atomic_detail = [
                    'RoundName' => $round_name,
                    'AgeGroup' => $age_group,
                    'Gender' => $gender,
                    'Equipment' => $val,
                ];
                array_push($data['CompetitionDetails'], $atomic_detail);
            }
        }

        try {
            $this->model->createCompetition($data);
            status_msg("Ye have successfully created ye competition~!");
        } catch (Exception $e) {
            status_msg("FAILED TO CREATE COMPETITION $e");
        }

    }

    public function index()
    {
        $this->view('recorder/index');
    }

    public function createArcher()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postRequestArcherCreate();
            return;
        }

        $this->view('recorder/create_archer');
    }


    public function createCompetition()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postRequestCompetitionCreate();
            return;
        }
        
        $equipment = $this->model->getEquipment();
        $rounds = $this->model->getRounds();
        $categories = $this->model->getCategories();

        $data = [
            'categories' => $categories,
            'equipment' => $equipment,
            'rounds' => $rounds,
        ];

        $this->view('recorder/create_competition', $data);
    }
}
