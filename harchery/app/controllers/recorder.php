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
        $archerData = $_POST;
        $archerData['ClubID'] = getSession('UserID');
        try {
            $this->model->createRow('Archer', $_POST);
            status_msg("Ye have successfully added yer archer~!");
        } catch (Exception $e) {
            status_msg("FAILED TO ADD ARCHER $e");
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

        $this->view('recorder/create_competition');
    }
}
