<?php

defined('BASEPATH') OR exit('NO DIRECT SCRIPT ACCESS IS ALLOWED');

class Server extends CI_Controller
{
    public function add()
    {
        $this->load->model('auth/Login');
        if($this->Login->loggedin()){
            $this->load->model('server/Add_server');
            $this->Add_server->add();
        } else {
            show_error('You are not logged in. Login to create a server', '500');
        }
    }
}