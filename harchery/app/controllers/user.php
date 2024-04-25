<?php
class user extends controller
{

    public function __construct()
    {
        $this->model = $this->newModel('usermodel');
    }

    private function postRequestSetUserID()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        setSession("UserID", $_POST['UserID']);
        status_msg("successfully set user!");
    }

    private function postRequestSetUserType()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $userType = $_POST['UserType'];
        
        setSession('UserType' , $userType);
        switch ($userType) {
            case 'Archer':
                redirect('user/archer');
                break;
            case 'Recorder':
                redirect('user/recorder');
                break;
            default:
                status_msg("failure to assign userType");
                break;
        }
    }

    public function archer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postRequestSetUserID();
            return;
        }

        $users = $this->model->readTable('Archer');
        $data = [
            'users' => $users
        ];

        $this->view('user/archer', $data);
    }

    public function recorder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postRequestSetUserID();
            return;
        }

        $clubs = $this->model->readTable('Club');
        $data = [
            'clubs' => $clubs
        ];

        $this->view('user/recorder', $data);
    }


    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postRequestSetUserType();
            return;
        }
        $this->view('user/index');
    }
}
