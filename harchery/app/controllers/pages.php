<?php

class pages extends controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome',
        ];
        $this->view('pages/index', $data);
    }

    public function recorder()
    {
        $data = [
            'title' => 'Welcome',
        ];
        $this->view('pages/recorder', $data);
    }

    public function archer()
    {
        $data = [
            'title' => 'Welcome',
        ];
        $this->view('pages/archer', $data);
    }
}
