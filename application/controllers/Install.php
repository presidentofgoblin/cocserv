<?php

defined('BASEPATH') OR exit('DIRECT SCRIPT ACCESS NOT ALLOWED');

class Install extends CI_Controller
{
    public function run()
    {
        $this->load->model('install/Database');
        $this->Database->run();
    }
}