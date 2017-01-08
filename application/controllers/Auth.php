<?php

defined('BASEPATH') OR exit('NO DIRECT SCRIPT ACCESS IS ALLOWED');

class Auth extends CI_Controller
{
    public function login()
    {
        $this->load->model('auth/login');
        if($this->login->loggedin()){
            // TRUE
        } else {

        }
    }

    public function logout()
    {

    }

    public function register()
    {
        if(isset($_POST['username']))
        {
            $this->load->model('auth/register');
            $this->register->getdats();
        }
        else
        {
            $this->load->view('templates/header');
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        }
    }
}