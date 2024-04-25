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
        print_r($_POST['DOB']);
        try {
            $this->model->createRow('Archer', $_POST);
            status_msg("success");
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

        $clubs = $this->model->readTable('Club');
        $data = [
            'clubs' => $clubs
        ];
        $this->view('recorder/create_archer', $data);
    }
}
