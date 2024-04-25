<?php
/*
 * Pages Class
 * Extends the base Controller class, handles rendering different pages
 */
class recorder extends controller
{

    public function __construct()
    {
        $this->postModel = $this->model('recordermodel');
    }

    private function postRequestArcherCreate()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        print_r($_POST['DOB']);
        try {
            $this->postModel->createRow('Archer', $_POST);
            die("success");
        } catch (Exception $e) {
            die("FAILED TO ADD ARCHER $e");
        }
        
    }

    public function index()
    {
        //$posts = $this->postModel->getMenu();
        $data = [
            'title' => 'Welcome',
        ];
        $this->view('recorder/index', $data);
    }

    public function newarcher()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postRequestArcherCreate();
            return;
        }

        $clubs = $this->postModel->readTable('Club');
        $data = [
            'clubs' => $clubs
        ];
        $this->view('recorder/create_archer', $data);
    }
}
