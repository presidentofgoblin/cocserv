<?php

defined('BASEPATH') OR exit('NO DIRECT SCRIPT ACCESS IS ALLOWED');

class Auth extends CI_Controller
{
    public function login()
    {
        $this->load->model('auth/Login');
        if($this->Login->loggedin()){
            redirect(base_url());
        } elseif(isset($_POST['username'])) {
             $this->Login->getdata();
        } else {
            $this->load->view('templates/header');
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        }
    }

    public function logout()
    {

    }

    public function register()
    {
        if(isset($_POST['username']))
        {
            $this->load->model('auth/Register');
            $this->Register->getdata();
        }
        else
        {
            $this->load->view('templates/header');
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        }
    }
}