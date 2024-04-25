<?php

class status extends controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'status' => getSession('statusMsg'),
        ];
        $this->view('status/index', $data);
    }
}
