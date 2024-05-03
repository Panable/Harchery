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
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $recs = $_POST['records'];
        print_r($recs);

            echo "<br>";
            echo "<br>";
        foreach ($recs[0] as $key => $value) {
            echo "<br>";
            printf("Category -> [%s] ", $key);
            echo "<br>";
            printf("Equipment -> ", $key);
            echo "<br>";
            foreach($value as $val) {
                printf("____%s", $val);
                echo "<br>";
            }
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
