<?php

class pages extends controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->view('pages/index');
    }
}
